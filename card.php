<?php
require_once('inc/header.php');
require_once('inc/nav.php');
require_once('inc/db.php');

$result = selection_id('card', 'user_id', $_SESSION['user_id']);
$result = mysqli_fetch_all($result);
$id=1;
$total_price = 0;
if (count($result) > 0): 
?>
<div class="container my-5">
    <div class="row">
        <!-- عرض الجدول -->
        <div class="col-lg-8 mb-4">
            <table class="table table-hover shadow-sm rounded table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Size</th>
                        <th scope="col">Color</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $x): ?>
                    <tr>
                        <td><?=$id++;?></td>
                        <td><img src="<?="public/products/image/".$x[1];?>" alt="<?=$x[2];?>" width="100"
                                class="rounded">
                        </td>
                        <td><?=$x[2];?></td>
                        <td><?=$x[3] * $x[6];?> EGP</td>
                        <td><?=$x[4];?></td>
                        <td><?=$x[5];?></td>
                        <td><?=$x[6];?></td>
                        <td>
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="id" value="<?=$x[0];?>">
                                <button type="submit" class="btn btn-danger btn-sm" name="delete">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php 
                            // حساب الإجمالي
                            $total_price += $x[3] * $x[6];
                        endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Order Summary</h5>
                    <hr>
                    <p class="card-text d-flex justify-content-between">
                        <span><i class="fas fa-shopping-cart"></i> Total Items:</span>
                        <strong><?= count($result); ?></strong>
                    </p>
                    <p class="card-text d-flex justify-content-between">
                        <span><i class="fas fa-dollar-sign"></i> Total Price:</span>
                        <strong><?= $total_price; ?> EGP</strong>
                    </p>
                    <hr>
                    <form action="insert-order.php" method="POST">
                        <input type="submit" class="btn btn-success btn-block" name="check_out"
                            value="Proceed to Checkout">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
else:  
?>
<div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="text-center">
        <h1 class="display-4 text-muted">Cart is empty</h1>
        <p class="lead">You have no items in your cart.</p>
        <a href="shop.php" class="btn btn-primary">Continue Shopping</a>
    </div>
</div>
<?php
endif;

require_once('inc/footer.php');
?>