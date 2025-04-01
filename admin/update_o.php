<?php
 require_once('nav-admin.php');
 require_once('../inc/db.php');
 if(isset($_POST['update'])){
$id=$_POST['id'];
 $select=selection_id('Orders','order_id',$id);
 $select=mysqli_fetch_assoc($select);
?>

<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="POST" role="form" action="updatee_o.php">
            <div class="row">
                <div class="form-group col-md-8 mb-3 d-flex">
                    <input type="text" class="form-control me-2" id="name" name="name" value="<?=$select['status']?>">
                    <input type="hidden" name="id" value="<?= $select['order_id'] ?>">
                    <button type="submit" class="btn btn-success" name="update">update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php } ;?>