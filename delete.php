<?php
 $conn=mysqli_connect('localhost','root','','Zay');
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['delete'])){
 $id=$_POST['id'];
 $delete="DELETE  FROM `card` WHERE `id`='$id'";
 $deletedone=mysqli_query($conn,$delete);
 if(mysqli_affected_rows($conn)>0)header("location:card.php");
 else echo "erorr";


}