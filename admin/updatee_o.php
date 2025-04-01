<?php
if($_SERVER['REQUEST_METHOD']=="GET")header('location:http://localhost/Project_2/ecommerce/admin/dash_board.php');
 require_once('../inc/db.php');
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $id =$_POST['id'];
$insert="UPDATE `orders` SET `status`='$name' WHERE `order_id`=$id";
$inserdone=mysqli_query($conn,$insert);?>
<?php
if($inserdone){?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .alert-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 500px;
        width: 100%;
        text-align: center;
    }
    </style>
</head>

<body>

    <div class="alert-container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success!</h4>
            <p>The order is Upadted Successful.</p>
        </div>
    </div>

    <!-- JavaScript for redirection after 5 seconds -->
    <script>
    setTimeout(function() {
        window.location.href = 'orders.php'; // الصفحة التي سيتم الانتقال إليها
    }, 1000); // 5000 ميلي ثانية = 5 ثواني
    </script>

</body>

</html>
<?php   
}
} ?>