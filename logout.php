<?php 
session_start();
$_SESSION["lecnum"] = "";
session_destroy();
header("Location: index.php");