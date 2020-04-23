<?php
session_start();

if (!empty($_SESSION["lecnum"])) {

    // echo "test";
    if (!empty($_GET["livcode"]) && !empty($_GET["action"]) && $_GET["action"] == "reserve") {
        require_once("Reserver.php");
        $reserve = new Reserver();
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $empnum = substr(str_shuffle($permitted_chars), 0, 16);

        $reserve->reserver($empnum, $_GET["livcode"], $_SESSION["lecnum"]);
        require_once("Livre.php");
        $livreCont = new Livre();
        $livreCont->reserve($_GET["livcode"]);
        header("Location: ./valideReserve.php?empnum=" . $empnum);
    }
} else {

    header("Location: ./login.php");
}
