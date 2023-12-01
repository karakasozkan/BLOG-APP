<?php

  require "libs/vars.php";
  require "libs/functions.php";


?>

  <?php include "views/_header.php"; ?> 
 
  <?php include "views/_navbar.php"; ?> 
  <?php include "views/_message.php"; ?> 
  
    <div class="container my-5">    
        <div class="row">
        <div class="col-12">

            <div class="card mb-1">
                <div class="card-body">
                    <a href="category-create.php" class="btn btn-primary">New Category</a>
                </div>    
            </div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width:80px;" >ID</th>
                        <th>Category name</th>
                        <th style="width:100px;" >is-Active</th>
                        <th style="width:130px;" ></th>
                    </tr>

                </thead>
                <tbody>
                    <?php   $result= getCategories(); while($item=mysqli_fetch_assoc($result)):?>
                        <tr>
                            <td>
                                <?php echo $item["id"]?>
                            </td>
                            <td>
                                <?php echo $item["name"]?>
                            </td>
                            <td>
                                <?php if ($item["isActive"]):?>
                                    <i class="fas fa-check"></i>
                                <?php else:?>
                                    <i class="fas fa-times"></i>
                                <?php endif;?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="category-edit.php?id=<?php echo $item["id"] ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="category-delete.php?id=<?php echo $item["id"] ?>">Delete</a>
                            </td>

                        </tr>
                    <?php endwhile;?>
                </tbody>
            </table>

        </div>    
    </div>


    <?php include "views/_footer.php"; ?>

