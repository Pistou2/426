<?php
/*ETML
Author  : Merk Yann
Date    : 27.03.2017
Summary :
*/
//TODO (This page is only a copy paste from another project of mine
$pageId = 1;
require_once("before.php");

//check if the user is already connected
if ($isConnected) {
    // redirect to the index page
    header("location: accueil");

}

//check if there's an attempt to login
if (isset($_POST["email"]) && isset($_POST["pswd"])) {

    //check if the log is successfull or no
    $userID = FormValidator::checkLogin($_POST["email"], $_POST["pswd"]);

    if ($userID != null) {
        $_SESSION["userID"] = $userID;

        // redirect to the index page

        header("location: accueil");

    } else {
        //if not, display an error
        ?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong>Erreur !</strong> Email ou mot de passe incorrect.</p>
        </div>
        <?php

    }
}
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-push-3">
                <form method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="text" class="form-control" name="email"
                               placeholder="Email"
                            <?php
                            //Set the email back if it was already previously inputed
                            echo(isset($_POST["email"]) && $_POST["email"] != "" ? 'value="' . $_POST["email"] . '"' : "") ?>
                               required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="pswd" type="password" class="form-control" name="pswd"
                               placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div>
        </div>
    </div>
<?php
require_once("after.php");