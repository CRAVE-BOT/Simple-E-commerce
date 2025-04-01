<?php

 require_once('../inc/db.php');
if($_SERVER['REQUEST_METHOD']=="GET")header('location:http://localhost/Project_2/ecommerce/admin/dash_board.php');
if(isset($_POST['delete_brand'])){
    $id=$_POST['id'];
    $delete=delete_card('brands','id',$id);
    if(mysqli_affected_rows($conn)>0)header("location:view_brands.php");
    else echo "erorr";
   }
if(isset($_POST['delete_product'])){
    $id=$_POST['id'];
    $delete=delete_card('products','id',$id);
    if(mysqli_affected_rows($conn)>0)header("location:view_products.php");
    else echo "erorr";
   }