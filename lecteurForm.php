<?php
session_start();
require_once("Member.php");




if (!empty($_POST["lecture"])) {


    if (!empty($_POST["lecnom"]))
        $lecnom = filter_var($_POST["lecnom"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["lecprenom"]))
        $lecprenom = filter_var($_POST["lecprenom"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["lecadresse"]))
        $lecadresse = filter_var($_POST["lecadresse"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["lecville"]))
        $lecville = filter_var($_POST["lecville"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["leccodepostal"]))
        $leccodepostal = filter_var($_POST["leccodepostal"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["lecmotdepasse"]))
        $lecmotdepasse = filter_var($_POST["lecmotdepasse"], FILTER_SANITIZE_STRING);

    /* Form Required Field Validation */
    $member = new Member();
    try {
        $errorMessage = $member->validateMember();
    } catch (\Throwable $th) {
        throw $th;
    }
    if (empty($errorMessage)) {
        $memberCount = $member->isMemberExists($lecnom);

        if ($memberCount == 0) {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $lecnum = substr(str_shuffle($permitted_chars), 0, 16);
            $insertId = $member->insertMemberRecord($lecnum, $lecnom, $lecprenom, $lecadresse, $lecville, $leccodepostal, $lecmotdepasse);
            header("Location: ./valideLecteur.php?lecnum=" . $lecnum);
        } else {
            $errorMessage[] = "User already exists.";
        }
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>

<body>








    <div class="container">
        <div class="formDiv">
            <h2>
                Enregistrement d'un lecteur:
            </h2>
            <p>
                si vous etes un nouveau lecteur ,veuillez vous enregistrer en remplissant le formulaire ci-dessous:
            </p>
            <form name="frmRegistration" method="post" action="lecteurForm.php">

                <?php
                if (!empty($errorMessage) && is_array($errorMessage)) {
                ?>
                    <div class="error-message">
                        <?php
                        foreach ($errorMessage as $message) {
                            echo $message . "<br/>";
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <div class="form-group">
                    <label for="fullNameInput">Nom:</label>
                     <input type="text" class="form-control" id="lecnom" name="lecnom" placeholder="Nom" value="<?php if (isset($_POST['lecnom'])) echo $_POST['lecnom']; ?>" required>
                </div> 
                <div class="form-group">
                    <label for="fullNameInput">Prenom:</label>
                 <input type="text" value="<?php if (isset($_POST['lecprenom'])) echo $_POST['lecprenom']; ?>" class="form-control" id="lecprenom" name="lecprenom" placeholder="Prenom" required>
                 </div>
                <div class="form-group">
                    <label for="lecadresse">Adresse:</label>
                    <input type="text" class="form-control" aria-describedby="lecadresse" id="lecadresse" name="lecadresse" placeholder="num,rue " value="<?php if (isset($_POST['lecadresse'])) echo $_POST['lecadresse']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="leccodepostal">
                        Code Postal:
                    </label>
                    <input type="leccodepostal" class="form-control" aria-describedby="leccodepostal" id="leccodepostal" name="leccodepostal" placeholder="Code Postal" value="<?php if (isset($_POST['leccodepostal'])) echo $_POST['leccodepostal']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="lecvilleInput">
                        Ville:
                    </label>
                    <input type="text" class="form-control" aria-describedby="lecville" id="lecville" name="lecville" placeholder="Ville" value="" required>
                </div>

                <div class="form-group">
                    <label for="lecvilleInput">
                        Mot de pass:
                    </label>
                    <input type="password" class="form-control" id="lecmotdepasse" name="lecmotdepasse" placeholder="Mot de pass" value="<?php if (isset($_POST['lecmotdepasse'])) echo $_POST['lecmotdepasse']; ?>" required>
                </div>

                <div class="form-group">

                    <div class="btn btn-primary active">
                        <input type="checkbox" name="terms"> J'accepte les termes et les conditions
                      
                    </div>

                </div>
                <div class="form-group">
                    <input class="btn btn-info active" type="submit" name="lecture" value="Enregister" class="btnRegister">
                </div>
            </form>
        </div>
    </div>

</body>

</html>