<?php
session_start();
require_once("./Member.php");
$lecCont = new Member();
if (!empty($_GET["lecnum"])) {
    $lectuer = $lecCont->getMemberById($_GET["lecnum"]);
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Lecteur</title>
</head>

<body>
    <h4>
        Validation d’un lecteur
    </h4>
    <table class="table">
        <tbody>
            <tr>
                <td scope="row">Nom :</td>
                <td>
                    <?php
                    echo $lectuer[0]["lecnom"]
                    ?>
                </td>
            </tr>
            <tr>
                <td scope="row">Prenom :</td>
                <td>
                    <?php
                    echo $lectuer[0]["lecprenom"]
                    ?>
                </td>
            </tr>
            <tr>
                <td scope="row">Adresse :</td>
                <td>
                    <?php
                    echo $lectuer[0]["lecadresse"]
                    ?>
                </td>
            </tr>
            <tr>
                <td scope="row">Ville :</td>
                <td>
                    <?php
                    echo $lectuer[0]["lecville"]
                    ?>
                </td>
            </tr>
            <tr>
                <td scope="row">Code Postal :</td>
                <td>
                    <?php
                    echo $lectuer[0]["leccodepostal"]
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        <a href="index.php">Cliquer içi pour s'identifier</a>
    </p>
</body>

</html>