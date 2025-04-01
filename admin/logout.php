<?php
session_start();
unset($_SESSION['user_login']);
header('location:http://localhost/Project_2/ecommerce/login.php');