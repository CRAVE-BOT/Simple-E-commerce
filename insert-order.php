<?php
if($_SERVER['REQUEST_METHOD']=='GET')header('location:index.php');
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['check_out'])){?>
<?php
session_start();
require_once('inc/db.php');
$result = selection_id('card', 'user_id', $_SESSION['user_id']);
$result = mysqli_fetch_all($result);
$total_price = 0;

if (count($result) > 0) {
?>
<?php foreach ($result as $x){ 
     insert_order($x[2],$x[1],$x[3],$x[4],$x[5],$x[6],$_SESSION['user_id']);   
}?>
<?php }  ?>
<?php 
delete_card('card','user_id',$_SESSION['user_id']);?>
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
            <p>Your order has been received successfully.</p>
            <hr>
            <p class="mb-0">You will be redirected shortly...</p>
        </div>
    </div>

    <!-- JavaScript for redirection after 5 seconds -->
    <script>
    setTimeout(function() {
        window.location.href = 'index.php'; // الصفحة التي سيتم الانتقال إليها
    }, 1000); // 5000 ميلي ثانية = 5 ثواني
    </script>

</body>

</html>



<?php }?>