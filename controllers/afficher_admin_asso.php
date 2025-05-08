<?php
session_start();
include "../views/navbar.php";
include "../models/assosModel.php";
$link = $_GET['url'];
if(!array_key_exists($link,getAllLinks())){
    header("location: http://localhost/404");
}
$asso_id=getAllLinks()[$link];
$asso_info = getAssoById($asso_id);
$users = getUsersByAsso($asso_id);
$roles = getAllAssoRoles($asso_id);
$candidats = getAllCandidats($asso_id);
if(isset($_SESSION['user'])){
    $user_id = $_SESSION['user']['id'];
    $isAdmin = isAssoAdmin($user_id,$asso_id);
    if(!$isAdmin){
        header("location: /associations/".$link);
    }
}
else{
    header("location: /associations/".$link);
}
if(isset($_POST['del_user_id'])){
    deleteFromAsso($_POST['del_user_id'], $_POST['del_role_id']);
}
if(isset($_POST['change_user_id'])){
    changeUserRole($_POST['change_user_id'], $_POST['change_user_role']);
}
if(isset($_POST['change_user_id'])){
    changeUserRole($_POST['change_user_id'], $_POST['change_user_role']);
    echo $_POST['change_user_id']."<br>";
    echo $_POST['change_user_role']."<br>";
}
if(isset($_POST['accept_candidat'])){
    if($_POST['accept_candidat'] == "True"){
        acceptUser($_POST['candidat_id'],$asso_id,$_POST['role_candidat']);
    }
    else{
        refuseUser($_POST['candidat_id'],$asso_id);
    }
}
if(isset($_POST['asso_name'])){
    var_dump($_FILES);
    move_uploaded_file($_FILES['asso_logo']['tmp_name'], '../img/assos/'.$link.'.png');
    editAsso($asso_id,$_POST['asso_name'],$_POST['asso_description'],$_POST['asso_mail'],$_POST['asso_site'],$_POST['asso_instagram'],$_POST['asso_discord'],$_POST['asso_linkedin'],$_POST['asso_twitter'],$_POST['asso_youtube']);
}
include_once "../views/assoAdminView.php";