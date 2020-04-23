<?php
session_start();
if (!empty($_SESSION["lecnum"])) {
    header("Location: ./index.php");
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <!-- Form Validation
 -->
    <script>
        function validate() {
            var $valid = true;
            document.getElementById("lecnom").innerHTML = "";
            document.getElementById("lecmotdepasse").innerHTML = "";

            var userName = document.getElementById("lecnom").value;
            var lecmotdepasse = document.getElementById("lecmotdepasse").value;
            if (userName == "") {
                document.getElementById("lecnom").innerHTML = "required";
                $valid = false;
            }
            if (lecmotdepasse == "") {
                document.getElementById("lecmotdepasse").innerHTML = "required";
                $valid = false;
            }
            return $valid;
        }
    </script>
    <a href="lecteurForm.php" target="_blank" rel="noopener noreferrer">sign up</a>
    


    <div class="container">
        <div class="formDiv">
              <form action="login-action.php" method="post" id="frmLogin" onSubmit="return validate();">
                <div class="form-head">
                    Login
                </div>

            <h3>Authentification du lecteur </h3>

                <?php
                if (isset($_SESSION["errorMessage"])) {
                ?>
                    <div class="error-message"><?php echo $_SESSION["errorMessage"]; ?></div>
                <?php
                    unset($_SESSION["errorMessage"]);
                }
                ?>

                <div class="form-group">
                    <label for="usernameInput">
                        Nom du lecteur:
                    </label>
                    <span id="" class="error-info"></span>
                    <input type="text" class="form-control" aria-describedby="Username" id="lecnom" name="lecnom" placeholder="Nom du lecteur">
                </div>
                <div class="form-group">
                    <label for="lecmotdepasseInput">
                        le mot de passe:
                    </label>
                    <span id="lecmotdepasse" class="error-info"></span>
                    <input type="lecmotdepasse" class="form-control" aria-describedby="lecmotdepasse" id="lecmotdepasse" name="lecmotdepasse" placeholder="le mot de passe">
                </div>
                <input type="submit" class="btn btn-outline-success" value="Login" name="login">
            </form>
        </div>
    </div>

</body>

</html>