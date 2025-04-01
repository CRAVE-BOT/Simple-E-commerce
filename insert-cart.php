<?php
if($_SERVER['REQUEST_METHOD']!='POST')header('location:index.php');
session_start();
require_once('inc/db.php');?>
<?php
if(isset($_POST['cart'])){
 
$insert=insert_card($_SESSION['title'],$_SESSION['image'],$_SESSION['price'],$_POST['product-size'],"White",$_POST['product-quanity'],$_SESSION['user_id']);
header('location:shop.php');

}
if(isset($_POST['buy'])){
 
    $insert=insert_card($_SESSION['title'],$_SESSION['image'],$_SESSION['price'],$_POST['product-size'],"White",$_POST['product-quanity'],$_SESSION['user_id']);
    header('location:card.php');
    
 }