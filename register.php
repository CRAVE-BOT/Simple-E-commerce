<?php
session_start();
require_once('inc/validation.php');
require_once('inc/db.php');
if(isset($_POST['submit'])){
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    $pass = trim(filter_input(INPUT_POST, 'pass'));
    if (empty_form($email)) $_SESSION['empty_email'] = 'Email is required';
    if (empty_form($pass)) $_SESSION['empty_pass'] = 'Password is required';
    if (empty_form($name)) $_SESSION['empty_name'] = 'name is required';
    if (empty_form($phone)) $_SESSION['empty_phone'] = 'phone is required';
    if(vaild_Email($email))$_SESSION['vaild_email']='vaild_email';
    if(empty($_SESSION)){
     $check=insert_user($name,$email,$pass,$phone);   
     if($check)header('location:login.php');
     else $_SESSION['wrong_email']="this email is used";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php  ">
                Zay
            </a>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Register </h1>
            <p>
                Hello my Friend welcome in my php progect
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form" action="register.php">
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputname">Name</label><br>
                        <?php if(isset($_SESSION['empty_name']))echo$_SESSION['empty_name'];
                        unset($_SESSION['empty_name']);?>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputemail">Email</label><br>
                        <?php if(isset($_SESSION['vaild_email']))echo $_SESSION['vaild_email'];
                        else if(isset($_SESSION['empty_email']))echo$_SESSION['empty_email'];
                        else if(isset($_SESSION['wrong_email']))echo$_SESSION['wrong_email'];
                        unset($_SESSION['empty_email']);
                        unset($_SESSION['vaild_email']);
                        unset($_SESSION['wrong_email']);
                        ?>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputemail">password</label><br> <?php if(isset($_SESSION['empty_pass']))echo$_SESSION['empty_pass'];
                        unset($_SESSION['empty_pass']);?>
                        <input type="password" class="form-control mt-1" id="pass" name="pass" placeholder="password">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputemail">phone</label><br>
                        <?php if(isset($_SESSION['empty_phone']))echo$_SESSION['empty_phone'];
                        unset($_SESSION['empty_phone']);?>
                        <input type="text" class="form-control mt-1" id="phone" name="phone" placeholder="phone">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3" name="submit">submit</button>
                    </div>

                    <?php session_destroy(); ?>
                </div>
            </form>
        </div>
    </div>