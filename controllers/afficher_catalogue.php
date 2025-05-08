<?php 
session_start();
include_once "../views/navbar.php";
include "../models/assosModel.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {$search = $_GET['search']; $selectCampus = $_GET['campus'];}
if(!isset($_GET['page'])){$_GET['page']=1;}
if(!isset($selectCampus)){$selectCampus="Tous";}
$pages_number = getPagesNumber($selectCampus,$search);
if(!isset($search)){$search='';}
$AllAssos = getAllAssos($selectCampus,$search,$_GET['page']);
include_once "../views/catalogueView.php";