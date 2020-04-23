<?php
session_start();

if (!empty($_GET["empnum"])) {
    require_once("./Reserver.php");
    $resCont = new Reserver();
    $restuer = $resCont->getReserverByCode($_GET["empnum"]);
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation reserver</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Validation resteur</title>
    </head>

    <body>
        <h2>
            Confirmation de votre réservation
        </h2>
        <table class="table">
            <tbody>
                <tr>
                    <td scope="row">Votre réservation est confirmée sous le numéro :</td>
                    <td>
                        <?php
                        echo $restuer[0]["empnum"];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td scope="row">Date Reservation : </td>
                    <td>
                        <?php
                        echo $restuer[0]["empdate"];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td scope="row">Date Return :</td>
                    <td>
                        <?php
                        echo $restuer[0]["empdateret"];
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>
            <td>Vous pouvez revenir à la liste des livres disponible à la réservation en cliquant</td>
            <a href="index.php">içi</a>
        </p>
    </body>

    </html>
</body>

</html>