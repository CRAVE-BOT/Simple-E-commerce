<?php 

 require_once('nav-admin.php');
      require_once("../inc/db.php");
      $select="SELECT 
    p.id,
    p.title,
    p.sub_title,
    p.image,
    p.price,
    p.size,
    p.rate,
    p.review,
    p.gender,
    c.name AS category_name,
    b.name AS brand_name
FROM 
    products p
JOIN 
    catg c ON p.catg_id = c.id
JOIN 
    brands b ON p.brand_id = b.id;
";
$result=mysqli_query($conn,$select);
?>




<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Rate</th>
            <th scope="col">Review</th>
            <th scope="col">Price</th>
            <th scope="col">Size</th>
            <th scope="col">Category Name</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <!-- Displaying image -->
            <td><img src="http://localhost/Project_2/ecommerce/public/products/image/<?=$row['image']; ?>"
                    alt="Product Image" width="50" height="50"></td>

            <!-- Displaying other product data -->
            <td><?= $row['title']; ?></td>
            <td><?= $row['rate']; ?></td>
            <td><?= $row['review']; ?></td>
            <td><?= $row['price']; ?></td>
            <td><?= $row['size']; ?></td>
            <td><?= $row['category_name']; ?></td>
            <td><?= $row['brand_name']; ?></td>
            <td><?= $row['gender']; ?></td>

            <!-- Actions: Update & Delete -->
            <td>
                <div class="d-flex justify-content-start">
                    <form method="POST" action="delete.php" class="me-2">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_product">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>

                    <form method="POST" action="update_pro.php">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" class="btn btn-primary btn-sm" name="update">
                            <i class="fas fa-edit"></i> Update
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>