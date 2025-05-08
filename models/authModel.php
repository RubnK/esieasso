<?php 

function getUserByMail($mail){
    include "../models/connexion_db.php";
    $requete = $db->prepare('SELECT id,prenom,nom,email,password,active FROM users WHERE email=?');
    $requete->execute(array($mail));
    return $requete->fetch();
}
function createAccount($prenom,$nom,$mailAdress,$password,$password2){
    include "../models/connexion_db.php";
    $activation_code = rand(111111,999999);
        $hashed_password = hash("sha256", $password);
    $hashed_activation_code = hash("sha256", $activation_code);
    $requete = $db->prepare("CALL createUser(:prenom, :nom, :email, :password, :activationCode, @error)");
    $requete->execute(array(':prenom' => $prenom, ':nom' => $nom, ':email' => $mailAdress, ':password' => $hashed_password, ':activationCode' => $hashed_activation_code));
    $requete = $db->query("SELECT @error as error");
    $result = $requete->fetch();
    $error = $result['error'];
    if ($error == "no_error"){
        echo "<p>Votre compte a bien été créé</p>";
        include '../models/mailValidation.php';
        sendActivationMail($activation_code,$mailAdress,$prenom,$nom);
        header('Location:/validate');
    }
    else if($error == "already_exists"){
        echo "Un compte existe déjà avec cette adresse mail";
    }
    else{
        echo "Une erreur est survenue";
    }
}
function validateAccount($activation_code,$mail){
    include "../models/connexion_db.php";
    $error = "";
    $hashed_activation_code = hash("sha256", $activation_code);
    $requete = $db->prepare("CALL activateAccount(:email, :activationCode, @error)");
    $requete->execute(array(':email' => $mail, ':activationCode' => $hashed_activation_code));
    $requete = $db->query("SELECT @error as error");
    $result = $requete->fetch();
    $error = $result['error'];
    return $error;
}
function isAccountValidated($mail){
    include "../models/connexion_db.php";
    $requete = $db->prepare("SELECT active FROM users WHERE email = ?;");
    $requete->execute(array($mail));
    $account = $requete->fetch();
    if(!isset($account[0])){
        return False;
    }
    return $account[0];
}
function userActive($user){
    return (int)$user['active'] === 1;
}
function userConnect($mail,$password){
    include "../models/connexion_db.php";
    $user = getUserByMail($mail);
    if($user && hash('sha256',$password) == $user['password']){
        if(userActive($user)){
            $_SESSION['user'] = $user;
            header('Location:/');
        }
        else{
            echo "Votre compte n'a pas encore été activé. Veuillez cliquer sur le lien de confirmation envoyé par mail.<br>";
        }
    }
    else{
        echo "Adresse mail ou mot de passe incorrect<br>";
    }
}

function deleteAccount($user_id, $user_password){
    include "../models/connexion_db.php";
    $requete = $db->prepare("CALL deleteAccount(?,?);");
    $requete->execute(array($user_id, $user_password));
}
?>