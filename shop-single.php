<?php
if($_SERVER['REQUEST_METHOD']!='POST')header('location:index.php');
?>
<?php
ob_start();
require_once('inc/header.php');
require_once('inc/nav.php');
$result=mysqli_fetch_assoc(selection_ids('products','id',$_POST['id_image']));
$_SESSION['title']=$result['title'];
$_SESSION['image']=$result['image'];
$_SESSION['price']=$result['price'];    
?>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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



<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?="public/products/image/".$result['image'];?>"
                        alt="Card image cap" id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?=$result['title']?></h1>
                        <p class="h3 py-2"><?=$result['price']."$"?></p>
                        <p class="py-2">
                            <?= str_repeat("<i class='text-warning fa fa-star'></i>", $result['rate']); ?>
                            <?= str_repeat("<i class='text-muted fa fa-star'></i>", 5 - $result['rate']); ?>
                            <span class="list-inline-item text-dark"><?=ROUND($result['rate']/1.5);?> |
                                <?=$result['review']?>
                                Comments</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?=$result['brand_name']?></strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p><?=$result['sub_title']?></p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>White / Black</strong></p>
                            </li>
                        </ul>

                        <h6>Specification:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>Lorem ipsum dolor sit</li>
                            <li>Amet, consectetur</li>
                            <li>Adipiscing elit,set</li>
                            <li>Duis aute irure</li>
                            <li>Ut enim ad minim</li>
                            <li>Dolore magna aliqua</li>
                            <li>Excepteur sint</li>
                        </ul>

                        <form action="insert-cart.php" method="POST">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Size:</li>
                                        <li class="list-inline-item">
                                            <span class="btn btn-success btn-size" onclick="selectSize('S')">S</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="btn btn-success btn-size" onclick="selectSize('M')">M</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="btn btn-success btn-size" onclick="selectSize('L')">L</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="btn btn-success btn-size" onclick="selectSize('XL')">XL</span>
                                        </li>

                                        <!-- Hidden input field to store selected size -->
                                        <input type="hidden" name="product-size" id="product-size" required>

                                        <script>
                                        function selectSize(size) {
                                            // Set the selected size in the hidden input field
                                            document.getElementById('product-size').value = size;

                                            // Remove active class from all size buttons
                                            const buttons = document.querySelectorAll('.btn-size');
                                            buttons.forEach(button => button.classList.remove('active'));

                                            // Add active class to the selected button
                                            event.target.classList.add('active');
                                        }
                                        </script>

                                        <style>
                                        .btn-size.active {
                                            background-color: #0d6efd;
                                            /* Color when selected */
                                            color: white;
                                        }
                                        </style>

                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success"
                                                id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary"
                                                id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success"
                                                id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="buy"
                                        value="buy">Buy</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="cart"
                                        value="addtocard">Add To Cart</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Article -->



<?php
require_once('inc/footer.php');
?>