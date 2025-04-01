<?php
ob_start(); 

require_once('inc/header.php');
require_once('inc/nav.php');
$id = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['catg_id'])) {
        $id = $_POST['id']; 
    }
} else {
   
    header('Location: index.php');
    exit; 
}
?>

<!-- محتوى الصفحة -->
<div class="container py-5">
    <div class="row">
        <div class="row">
            <?php
            $count = 0; 
            $select = selection_id("products", "catg_id", $id);
            
            while ($row = mysqli_fetch_assoc($select)): 
                $count++;
            ?>
            <div class="col-md-4">
                <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid"
                            src="<?= "public/products/image/" . $row['image']; ?>">
                        <div
                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
                                <form action="shop-single.php" method="POST" class="mt-2">
                                    <button type="submit" class="btn btn-success text-white" name="id_image"
                                        value="<?=$row['id']?>">
                                        <i class="far fa-eye"></i>
                                    </button>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="shop-single.html" class="h3 text-decoration-none"><?= $row['title'] ?></a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li><?= $row['Size'] ?></li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-center mb-1">
                            <li>
                                <?= str_repeat("<i class='text-warning fa fa-star'></i>", $row['rate']); ?>
                                <?= str_repeat("<i class='text-muted fa fa-star'></i>", 5 - $row['rate']); ?>
                            </li>
                        </ul>
                        <p class="text-center mb-0"><?= $row['price']; ?></p>
                    </div>
                </div>
            </div>
            <?php 
           
            if ($count % 3 == 0): ?>
        </div>
        <div class="row">
            <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
</div>
</div>
<!-- End Content -->

<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Brands</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example"
                            data-bs-ride="carousel">
                            <div class="carousel-inner product-links-wap" role="listbox">
                                <!--Slides-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png"
                                                    alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png"
                                                    alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png"
                                                    alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png"
                                                    alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Brands-->

<?php
ob_end_flush();
require_once('inc/footer.php');
?>