<?php
require_once('inc/headerlogin.php'); 
require_once('inc/validation.php');
$conn=mysqli_connect('localhost','root','','Zay');
session_start();
if(isset($_POST['login'])){
$email= $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$pass=trim(filter_input(INPUT_POST, 'pass'));
if (empty_form($email)) $_SESSION['empty_email'] = 'Email is required';
if (empty_form($pass)) $_SESSION['empty_pass'] = 'Password is required';
if(vaild_Email($email))$_SESSION['vaild_email']='vaild_email';
else{
$select="SELECT * FROM `user` WHERE `email`='$email' ";
$selectdone=mysqli_query($conn,$select);
$selectdone=mysqli_fetch_assoc($selectdone);
if($email==$selectdone['email']){
    if($pass==$selectdone['pass']){
    $_SESSION['user_login']=$selectdone['name'];
       $_SESSION['user_email']=$selectdone['email'];
       $_SESSION['user_phone']=$selectdone['phone'];
       $_SESSION['user_id']=$selectdone['id'];
       $_SESSION['user_type']=$selectdone['type'];

    }
    else $_SESSION['wrong_pass']="the pass is incorrected";
}
else $_SESSION['wrong_email']="this email is wrong";    
}

    
}
if(isset($_SESSION['user_login']))header('location:index.php');




?>

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
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Login </h1>
            <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputemail">Email</label>
                        <?php if(isset($_SESSION['vaild_email']))echo $_SESSION['vaild_email'];
                        else if(isset($_SESSION['empty_email']))echo$_SESSION['empty_email'];
                        else if(isset($_SESSION['wrong_email']))echo$_SESSION['wrong_email'];
                        unset($_SESSION['empty_email']);
                        unset($_SESSION['vaild_email']);
                        unset($_SESSION['wrong_email']);?>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputname">Pass</label>
                        <?php if(isset($_SESSION['empty_pass']))echo$_SESSION['empty_pass'];
                               else if(isset($_SESSION['wrong_pass']))echo $_SESSION['wrong_pass'];
                        unset($_SESSION['empty_pass']);
                        unset($_SESSION['wrong_pass']);?>
                        <input type="password" class="form-control mt-1" id="name" name="pass" placeholder="pass">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3" name="login">lgoin</button>
                        <a href="register.php" class="d-block mt-2 text-decoration-none text-success">I don't have an
                            email</a>
                    </div>
                </div>
            </form>
        </div>
    </div>