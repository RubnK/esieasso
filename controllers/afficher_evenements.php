<?php 
session_start();
include "../views/navbar.php";
include "../models/assosModel.php";
$events = getAllEvents();
include "../views/eventView.php";
?>