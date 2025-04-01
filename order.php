<?php
require_once('inc/header.php');
require_once('inc/nav.php');
require_once('inc/db.php');
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM `orders` WHERE `user_id` = '$user_id' ORDER BY `order_date` DESC";
$result = mysqli_query($conn, $query);
$orders = [];
$total_price = 0;

// تنظيم البيانات في مصفوفة حسب order_date
while ($row = mysqli_fetch_assoc($result)) {
    $order_date = $row['order_date'];
    if (!isset($orders[$order_date])) {
        $orders[$order_date] = [];
    }
    $orders[$order_date][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Your Orders</h2>

        <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order_date => $order_items): ?>
        <div class="card my-4">
            <div class="card-header bg-light text-success">
                <h5>Order Date: <?= date("d-m-Y H:i:s", strtotime($order_date)); ?></h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total_price = 0;
                            foreach ($order_items as $item): 
                                $total_price += $item['price'];
                            ?>
                        <tr>
                            <td><img src="public/products/image/<?= $item['image']; ?>" alt="<?= $item['name']; ?>"
                                    width="100"></td>
                            <td><?= $item['name']; ?></td>
                            <td><?= $item['size']; ?></td>
                            <td><?= $item['color']; ?></td>
                            <td><?= $item['quantity']; ?></td>
                            <td><?= number_format($item['price'], 2); ?> EGP</td>
                            <td> <?php if($item['status'] == "complete"): ?>
                                <span class="badge bg-success">Completed</span>
                                <?php else: ?>
                                <?= $item['status']; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="text-right">
                    <h5><strong>Total Price: <?= number_format($total_price, 2); ?> EGP</strong></h5>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="alert alert-info text-center">
            No orders found.
        </div>
        <?php endif; ?>
    </div>

</body>

</html>
<?php
    require_once('inc/footer.php');
    ?>