<?php
session_start();
include '../views/navbar.php';
include '../models/authModel.php';
$mailError = ""; $passwordError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail=$_POST["mail"];
    $password=$_POST["password"];
    $validate = true;
    if(empty($mail)){
        $mailError = "Veuillez entrer votre adresse mail.";
        $validate = false;
    }
    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $mailError = "Veuillez entrer une adresse mail valide.";
        $validate = false;
    }
    if(empty($password)){
        $passwordError = "Veuillez entrer votre mot de passe.";
        $validate = false;
    }
    if($validate){
        userConnect($mail,$password);
    }
}
include_once "../views/connexionView.php";