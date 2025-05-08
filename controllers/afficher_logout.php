<?php
session_start();
include "../views/navbar.php";
session_destroy();
include_once "../views/logoutView.php";