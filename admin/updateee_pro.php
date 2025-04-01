<?php
if($_SERVER['REQUEST_METHOD']=="GET")header('location:http://localhost/Project_2/ecommerce/admin/dash_board.php');
 require_once('../inc/db.php');
if(isset($_POST['update_product'])){
   $id=$_POST['id'];
   $title=$_POST['title'];
    $sub_title=$_POST['sub_title'];
    $image=$_POST['image'];
    $price=$_POST['price'];
    $rate=$_POST['rate'];
    $review=$_POST['review'];
    $size=$_POST['size'];
    $catg_id=$_POST['catg_id'];
    $brand_id=$_POST['brand_id'];
    $gender=$_POST['gender']; 
$insert="UPDATE `products` SET
`image`='$image',
`rate`='$rate',
`review`='$review',
`title`='$title',
`sub_title`='$sub_title',
`price`='$price',
`Size`='$size',
`catg_id`='$catg_id',
`brand_id`='$brand_id',
`gender`='gender' WHERE `id`='$id'";
$inserdone=mysqli_query($conn,$insert);?>
<?php
if($inserdone){?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Success</title>

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
            <p>The Product is Upadted Successful.</p>
        </div>
    </div>

    <!-- JavaScript for redirection after 5 seconds -->
    <script>
    setTimeout(function() {
        window.location.href = 'view_products.php'; // الصفحة التي سيتم الانتقال إليها
    }, 1000); // 5000 ميلي ثانية = 5 ثواني
    </script>

</body>

</html>
<?php   
}
} ?>