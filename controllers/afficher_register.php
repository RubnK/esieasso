<?php 
session_start();
include_once "../views/navbar.php";
include_once "../models/authModel.php";
$validate;
$nom=""; $prenom=""; $mail=""; $password=""; $password2="";
$nameError = ""; $mailError = ""; $passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $mail=$_POST["mail"];
    $password=$_POST["password"];
    $password2=$_POST["password2"];
    $validate = true;


    if(empty($prenom) || empty($nom)){
        $nameError = "Veuillez entrer votre prénom et votre nom.";
        $validate = false;
    }
    else if(!preg_match('/[A-Z]/',$prenom[0]) || !preg_match('/[A-Z]/',$nom[0])){
        $nameError = "Votre prénom et votre nom doivent commencer par une majuscule.";
        $validate = false;
    }
    if(empty($mail)){
        $mailError = "Veuillez entrer votre adresse mail.";
        $validate = false;
    }
    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $mailError = "Adresse mail invalide.";
        $validate = false;
    }
    else if(!str_contains($mail,'@et.esiea.fr') && !str_contains($mail,'@et.intechinfo.fr') && !str_contains($mail,'@esiea.fr') && !str_contains($mail,'@intechinfo.fr')){
        $mailError = "Veuillez vous inscrire à l'aide de votre mail ESIEA.";
        $validate = false;
    }
    if(empty($password)){
        $passwordError = "Veuillez entrer un mot de passe.";
        $validate = false;
    }
    else if(strlen($password)<8){
        $passwordError = "Mot de passe trop court.";
        $validate = false;
    }
    else if(!preg_match('@[a-z]@', $password)){
        $passwordError = "Le mot de passe doit contenir au moins une lettre minuscule.";
        $validate = false;
    }
    else if(!preg_match('@[0-9]@', $password)){
        $passwordError = "Le mot de passe doit contenir au moins un chiffre.";
        $validate = false;
    }
    else if(!preg_match('@[A-Z]@', $password)){
        $passwordError = "Le mot de passe doit contenir au moins une lettre majuscule.";
        $validate = false;
    }
    else if(!preg_match('@[^\w]@', $password)){
        $passwordError = "Le mot de passe doit contenir au moins un caractère spécial.";
        $validate = false;
    }
    else if($password!=$password2){
        $passwordError = "Les mots de passes ne correspondent pas.";
        $validate = false;
    }
    if($validate){
        createAccount($prenom,$nom,$mail,$password,$password2);
    }
}

include_once "../views/registerView.php";
