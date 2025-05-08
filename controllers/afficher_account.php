<?php
session_start();
include "../views/navbar.php";
include "../models/authModel.php";
$user = $_SESSION['user'];
include "../views/accountView.php";