<?php 

require_once('nav-admin.php');
      require_once("../inc/db.php");
      $result=selection('brands');
?>




<table class="table table-bordered=5">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row=mysqli_fetch_assoc($result)):?>
        <tr>
            <td><?=$row['name']?></td>
            <td>
                <div class="d-flex justify-content-start">
                    <form method="POST" action="delete.php" class="me-2">
                        <input type="hidden" name="id" value="<?=$row['id'];?>">
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_brand">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>

                    <form method="POST" action="update_b.php">
                        <input type="hidden" name="id" value="<?=$row['id'];?>">
                        <button type="submit" class="btn btn-primary btn-sm" name="update">
                            <i class="fas fa-edit"></i> Update
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endwhile?>
    </tbody>
</table>