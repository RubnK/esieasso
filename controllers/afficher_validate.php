<?php 
session_start();
include_once "../views/navbar.php";
include_once "../models/authModel.php";
$error = "";
if(isset($_GET["activation_code"]) && isset($_GET["mail"])){
    $validateError = validateAccount($_GET["activation_code"],$_GET["mail"]);
}
if(isset($validateError)){
    if($validateError == "no_error"){
        $error = "Votre compte a bien été activé";
    }
    else if($validateError == "wrong_code"){
        $error = "Le code de confirmation est incorrect";
    }
    else if($validateError == "code_expired"){
        $error = "Le code de confirmation a expiré";
    }
    else if($validateError == "already_active"){
        $error = "Le compte a déjà été activé";
    }
    else if($validateError == "not_found"){
        $error = "Le compte n'existe pas";
    }
    else{
        $error = "Une erreur est survenue";
    }
}
include_once "../views/validateView.php";