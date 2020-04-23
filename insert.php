
<?php

require_once("Livre.php");
$productObject = new Livre();
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$livcode = substr(str_shuffle($permitted_chars), 0, 15);
$insertId = $productObject->insertLivreRecord($livcode, $_POST["livnomaut"], $_POST["livprenomaut"], $_POST["livtitre"], $_POST["livcategorie"], $_POST["livISBN"], 0);
echo "It's In";
header("Location: ./valideLivre.php?livcode=" . $livcode);
