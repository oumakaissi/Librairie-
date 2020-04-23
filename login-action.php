<?php



if (!empty($_POST["login"])) {
    session_start();
    $username = filter_var($_POST["lecnom"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["lecmotdepasse"], FILTER_SANITIZE_STRING);
    require_once("Member.php");
    $member = new Member();
    $isLoggedIn = $member->processLogin($username, $password);
    if (!$isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
    } else {
    header("Location: ./index.php");

    }
    header("Location: ./login.php");

    exit();
}
