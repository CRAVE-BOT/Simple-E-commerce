<?php
 require_once('nav-admin.php');
?>

<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="POST" role="form" action="add_b.php">
            <div class="row">
                <div class="form-group col-md-8 mb-3 d-flex">
                    <input type="text" class="form-control me-2" id="name" name="name" placeholder="Name">
                    <button type="submit" class="btn btn-success" name="add_brand">Add Brand</button>
                </div>
            </div>
        </form>
    </div>
</div>