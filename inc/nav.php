<?php
// Start Session
session_start();
$type =$_SESSION['user_type'];

// التحقق من تسجيل الدخول
if (!isset($_SESSION['user_login'])) header('location:login.php');

require_once('inc/db.php');
?>

<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none"
                    href="mailto:info@company.com">info@company.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                        class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                        class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">Zay</a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="navbar align-self-center d-flex">
                <!-- عرض الأيقونة فقط إذا كان المستخدم User -->
                <?php if ($type == "user" && count_card($_SESSION['user_id']) > 0): ?>
                <a class="nav-icon position-relative text-decoration-none" href="card.php">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span
                        class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        <?= count_card($_SESSION['user_id']); ?>
                    </span>
                </a>
                <?php endif; ?>

                <?php if($type=='user'):?>
                <a class="nav-icon position-relative text-decoration-none" href="order.php">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <?php else:?>
                    <a class="nav-icon position-relative text-decoration-none" href="admin/dash_board.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    </a>
                    <?php endif;?>

                    <!-- زر تسجيل الخروج يظهر للجميع -->
                    <a class="nav-icon position-relative text-decoration-none" href="logout.php">
                        <i class="fa fa-fw fa-sign-out-alt text-dark mr-3"></i>
                    </a>
            </div>
        </div>

    </div>
</nav>