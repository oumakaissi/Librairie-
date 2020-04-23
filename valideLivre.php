<?php
session_start();
require_once("Livre.php");
$livCont = new Livre();
if (!empty($_GET["livcode"])) {
    $livre = $livCont->getLivreByCode($_GET["livcode"]);
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation d'un Livre</title>
</head>

<body>
    <h3>
        Validation d'un Livre
    </h3>
    <table class="table">
        <tbody>
            <tr>
                <td scope="row">Nom de l'Auteur :</td>
                <td>
                    <?php
                    echo $livre[0]["livnomaut"]
                    ?>
                </td>
            </tr>
            <tr>
                <td scope="row">prenom de l'Auteur :</td>
                <td>
                    <?php
                    echo $livre[0]["livprenomaut"]
                    ?>
                </td>
            </tr>
            <tr>
                <td scope="row">titre :</td>
                <td>
                    <?php
                    echo $livre[0]["livtitre"]
                    ?>
                </td>
            </tr>
            <tr>
                <td scope="row">categorie :</td>
                <td>
                    <?php
                    echo $livre[0]["livcategorie"]
                    ?>
                </td>
            </tr>
            <tr>
                <td scope="row">Numéro ISBN :</td>
                <td>
                    <?php
                    echo $livre[0]["livISBN"]
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>