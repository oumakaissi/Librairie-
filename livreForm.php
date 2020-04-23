<!DOCTYPE html>
<html>

<body>

    <div class="col-md-6 offset-md-3 mt-5">
        <h2>
            Enregistrement d'un livre:
        </h2>
        <form accept-charset="UTF-8" action="./insert.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td> <label>Nom de l'auteur :</label></td>
                    <td><input type="text" name="livnomaut"></td>
                </tr>
                <tr>
                    <td><label>Prenom de l'auteur :</label></td>
                    <td><input type="text" name="livprenomaut"></td>
                </tr>
                <tr>
                    <td> <label>Titre :</label></td>
                    <td><input type="text" name="livtitre"></td>
                </tr>
                <tr>
                    <td><label for="categorie">Categorie :</label></td>
                    <td><select id="livcategorie" name="livcategorie">
                            <option value="Roman">Roman</option>
                            <option value="Science-fiction">Science-fiction</option>
                            <option value="Policier">Policier</option>
                            <option value="Poesie">Poesie</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Numero ISBN :</label></td>
                    <td><input type="text" name="livISBN"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Enregistrer"></td>
                </tr>
            </table>
        </form>
</body>

</html>