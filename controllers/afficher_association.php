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
$message="";
if(isset($_SESSION['user'])){
    $user_id = $_SESSION['user']['id'];
    $isAdmin = isAssoAdmin($user_id,$asso_id);
    $inAsso = isInAsso($user_id,$asso_id);
}
if (isset($_POST['join'])){
    joinAsso($user_id,$asso_id);
    echo "<script>alert('Vous avez postulé pour l\'association ".$asso_info['nom'].".')</script>";
    header("Refresh:0");
}
if (isset($_POST['leave'])){
    leaveAsso($user_id,$asso_id);
    echo "<script>alert('Vous avez quitté l\'association ".$asso_info['nom'].".')</script>";
    header("Refresh:0");
}
include_once "../views/associationView.php";