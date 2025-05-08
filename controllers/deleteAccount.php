<?php
session_start();
echo "<script>alert('Votre compte a été supprimé avec succès!')</script>";
include "../models/authModel.php";
$user = $_SESSION['user'];
deleteAccount($user['id'],$user['password']);
session_destroy();
header("location: /register");