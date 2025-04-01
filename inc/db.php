<?php
 $conn=mysqli_connect('localhost','root','','Zay');
  function selection($table){
    global $conn;
    $select="SELECT * FROM `$table`";
    $selectdone=mysqli_query($conn,$select);
    return $selectdone;
  }
  function selection_id($table,$col,$id){
    global $conn;
    $select="SELECT * FROM `$table` where `$col`='$id'";
    $selectdone=mysqli_query($conn,$select);
    return $selectdone;
  }
  function insert_user($name,$email,$pass,$phone){
    global $conn;
    $insert = "INSERT INTO `user`(`name`, `email`, `pass`, `phone`) 
                   VALUES('$name', '$email', '$pass', '$phone')";
try {
$insertdone = mysqli_query($conn, $insert);
return true;
} catch (mysqli_sql_exception $e) {
if ($e->getCode() == 1062) { // "Duplicate Entry"
 return false;
} else {
 
 return false;
}
}
  }
  function selection_ids($table,$col,$id){
    global $conn;
    $select=" SELECT 
            p.*,  
            b.name AS brand_name  
        FROM 
            products p
        JOIN 
            brands b
        ON 
            p.brand_id = b.id  
        WHERE 
            p.$col = $id";
    $selectdone=mysqli_query($conn,$select);
    return $selectdone;
  }
  function insert_contact($name, $email, $phone, $sub, $message) {
    global $conn;
    $insert = "INSERT INTO `contact`(`name`, `email`, `phone`, `subject`, `message`) 
               VALUES('$name', '$email', '$phone', '$sub', '$message')";
    $insertdone = mysqli_query($conn, $insert);
    
    if ($insertdone) {
        return true;  
    } else {
        return false; 
    }
}
function insert_card($name,$image,$price,$size,$color,$quantity,$user_id){
  global $conn;
  $insert="INSERT INTO `card` (`name`,`image`,`price`,`size`,`color`,`Quantity`,`user_id`)
                        VALUES('$name','$image','$price','$size','$color','$quantity','$user_id')";
  $insertdone=mysqli_query($conn,$insert);   
  if($insertdone)return true;
  else return false;                   
}
function count_card($id){
  global $conn;
  $query = "SELECT COUNT(*) AS total_rows FROM `card` WHERE `user_id` = '$id'";
$result = mysqli_query($conn, $query);
$result=mysqli_fetch_assoc($result);
return $result['total_rows'];
}
function insert_order($name,$image,$price,$size,$color,$quantity,$user_id){
  global $conn;
  $insert="INSERT INTO `orders` (`name`,`image`,`price`,`size`,`color`,`Quantity`,`user_id`)
  VALUES('$name','$image','$price','$size','$color','$quantity','$user_id')";
$insertdone=mysqli_query($conn,$insert);   
}
function delete_card($table,$col,$id){
  global $conn;
  $select="DELETE  FROM `$table` where `$col`='$id'";
  $selectdone=mysqli_query($conn,$select);
  return $selectdone;
}
function getRows($table)
{
    global $conn;
    $sql = "SELECT * FROM `$table` ";
    
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo mysqli_error($conn);
    }
    $rows = [];
    if(mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $rows[] = $row;
        }
    }
   return $rows;
}