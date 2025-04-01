<?php
 require_once('nav-admin.php');
 require_once '../inc/db.php';
 $query = "SELECT * FROM `catg`";
 $result = mysqli_query($conn, $query); 
 $query1 = "SELECT * FROM `brands`";
 $result1 = mysqli_query($conn, $query1);
?>

<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="POST" role="form" action="add_pro.php">
            <div class="row">
                <!-- Name Input -->

                <!-- Image Input -->
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" class="form-control" id="image" name="image" placeholder="Enter Image URL">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                </div>

                <!-- Rate Input -->
                <div class="col-md-6 mb-3">
                    <label for="rate" class="form-label">Rate</label>
                    <input type="text" class="form-control" id="rate" name="rate" placeholder="Enter Rate">
                </div>

                <!-- Review Input -->
                <div class="col-md-6 mb-3">
                    <label for="review" class="form-label">Review</label>
                    <input type="text" class="form-control" id="review" name="review" placeholder="Enter Review">
                </div>

                <!-- Title Input -->

                <!-- Sub Title Input -->
                <div class="col-md-6 mb-3">
                    <label for="sub_title" class="form-label">Sub Title</label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title"
                        placeholder="Enter Sub Title">
                </div>

                <!-- Price Input -->
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                </div>

                <!-- Size Input -->
                <div class="col-md-6 mb-3">
                    <label for="size" class="form-label">Size</label>
                    <input type="text" class="form-control" id="size" name="size" placeholder="Enter Size">
                </div>

                <!-- Category Select -->
                <div class="col-md-6 mb-3">
                    <label for="catg_id" class="form-label">Category</label>
                    <select class="form-select" id="catg_id" name="catg_id">
                        <option value="">Select Category</option>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Brand Select -->
                <div class="col-md-6 mb-3">
                    <label for="brand_id" class="form-label">Brand</label>
                    <select class="form-select" id="brand_id" name="brand_id">
                        <option value="">Select Brand</option>
                        <?php while($row = mysqli_fetch_assoc($result1)): ?>
                        <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Gender Input -->
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter Gender">
                </div>

                <!-- Submit Button -->
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success btn-lg" name="add_product">Add Product</button>
                </div>
            </div>
        </form>
    </div>
</div>