    <?php
 require_once('nav-admin.php');
      require_once('../inc/db.php');
?>
    <div class="content">
        <h2 id="dashboard" class="text-center my-4">Dashboard</h2>
        <div class="container">
            <div class="row justify-content-center text-center mb-4">
                <!-- Total Orders -->
                <div class="col-md-5 mb-3">
                    <a href="orders.php" class="text-decoration-none">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5>Total Orders</h5>
                                <h2><?=count(getRows('orders'))?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Total Brands -->
                <div class="col-md-5 mb-3">
                    <a href="view_brands.php" class="text-decoration-none">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5>Total Brands</h5>
                                <h2><?=count(getRows('brands'))?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <!-- Total Products -->
                <div class="col-md-5 mb-3">
                    <a href="view_products.php" class="text-decoration-none">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5>Total Products</h5>
                                <h2><?=count(getRows('products'))?></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- New Metric -->
                <div class="col-md-5 mb-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5>Catgeory</h5>
                                <h2><?=count(getRows('catg'))?></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </body>

    </html>