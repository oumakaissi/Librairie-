<?php
session_start();
if (empty($_SESSION["lecnum"])) {
    header("Location: ./login.php");
}
require_once("Livre.php");
$livre = new Livre();
if (!empty($_GET["livcode"])) {
    $livre_item = $livre->getLivreByCode($_GET["livcode"]);
    if (!empty($_GET["action"]) && $_GET["action"] == "reserve") {
        $reserve = new Reserver();
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $empnum = substr(str_shuffle($permitted_chars), 0, 16);

        $reserve->reserver($empnum, $_GET["livcode"], $_SESSION["lecnum"]);
        header("Location: ./index.php");
    }
} else {
    header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <H1>
        Réserver un livre
    </H1>
    <?php
    if (!empty($livre_item)) {
    ?>
        <h4>
            vous désirez réserver le livre suivant
        </h4>
        <table>
            <tr>
                <td>code du livre:</td>
                <td>
                    <?php echo $livre_item[0]["livcode"]; ?>
                </td>
            </tr>
            <tr>
                <td>Nom de l'auteur:</td>
                <td>
                    <?php echo $livre_item[0]["livnomaut"]; ?>
                </td>
            </tr>
            <tr>
                <td>Prenom de l'auteur:</td>
                <td>
                    <?php echo $livre_item[0]["livprenomaut"]; ?>
                </td>
            </tr>
            <tr>
                <td>Titre:</td>
                <td>
                    <?php echo $livre_item[0]["livtitre"]; ?>
                </td>
            </tr>
            <tr>
                <td>Categorie:</td>
                <td>
                    <?php echo $livre_item[0]["livcategorie"]; ?>
                </td>
            </tr>
            <tr>
                <td>ISBN:</td>
                <td>
                    <?php echo $livre_item[0]["livISBN"]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="adresse.php?action=reserve&livcode=<?php echo $livre_item[0]["livcode"]; ?>">confirmer</a>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
</body>

</html>
<?php

?>