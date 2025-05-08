<?php 
session_start();
include "../views/navbar.php";
include "../models/assosModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $asso_id = $_GET['asso_id'];
    move_uploaded_file($_FILES['image']['tmp_name'], '../img/events/'.$_FILES['image']['full_path']);
    $img = $_FILES['image']['full_path'];
    echo '<script>alert("L\'évènement a été créé avec succès!")</script>';
    createEvent($asso_id,$titre,$description,$date,$img);
    header("Location:/asso_admin/".$_GET['url']);
}

include "../views/event_createView.php";