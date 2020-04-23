<?php
session_start();
if (empty($_SESSION["lecnum"])) {
    header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div>
        <h2> Gestion du lecteur</h2>
        <h4>Voici la liste des ouvrages disponbles à la réservation</h4>
        <table  border=7 style="width:100%">
            <tr>
                <th>Code Livre</th>
                <th>Nom Auteur</th>
                <th>Prenom Auteur</th>
                <th>Titre</th>
                <th>Categorie</th>
                <th>ISBN</th>
                <th>link</th>
            </tr>
            <?php
            require_once("Livre.php");
            $livre = new Livre();
            $livres = $livre->getLivres();
            try {
                if (!empty($livres)) {
                    foreach ($livres as $key => $value) {
                        # code...
                        if ($livres[$key]["livdejareserve"] == 0) {
            ?>
                            <tr>
                                <td><?php echo $livres[$key]["livcode"] ?> </td>
                                <td><?php echo $livres[$key]["livnomaut"] ?> </td>
                                <td><?php echo $livres[$key]["livprenomaut"] ?> </td>
                                <td><?php echo $livres[$key]["livtitre"] ?> </td>
                                <td><?php echo $livres[$key]["livcategorie"] ?> </td>
                                <td><?php echo $livres[$key]["livISBN"] ?> </td>
                                <td>
                                    <!-- <input type="submit" value="reserver" /> -->
                                    <a type="submit" href="reserve.php?livcode=<?php echo $livres[$key]["livcode"]; ?>">reserve</a>
                                </td>
                            </tr>
            <?php
                        }
                    }
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            ?>
        </table>
    </div>

    <div>
        <h4>Voici la liste de vos reservations</h4>
        <table border=6 style="width:100%" >

            <tr>
                <th>Code Livre</th>
                <th>Nom Auteur</th>
                <th>Prenom Auteur</th>
                <th>Titre</th>
                <th>Categorie</th>
                <th>ISBN</th>
                <th></th>
            </tr>
            <?php
            require_once("Livre.php");
            $livre = new Livre();
            require_once("Reserver.php");
            $reserver = new Reserver();
            $reservedLivre = $reserver->getReserverByLecteur($_SESSION["lecnum"]);
            if (!empty($reservedLivre)) {
                try {
                    foreach ($reservedLivre as $key => $value) {
                        # code...
                        $livres = $livre->getLivreByCode($reservedLivre[$key]["empcodelivre"]);
                        # code...

            ?>
                        <tr>
                            <td><?php echo $livres[0]["livcode"] ?> </td>
                            <td><?php echo $livres[0]["livnomaut"] ?> </td>
                            <td><?php echo $livres[0]["livprenomaut"] ?> </td>
                            <td><?php echo $livres[0]["livtitre"] ?> </td>
                            <td><?php echo $livres[0]["livcategorie"] ?> </td>
                            <td><?php echo $livres[0]["livISBN"] ?> </td>

                        </tr>
            <?php
                    }
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
            ?>
        </table>
    </div>

</body>

</html>