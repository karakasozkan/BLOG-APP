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
                    <a href="blog-creativ.php" class="btn btn-primary">New Blog</a>
                </div>    
            </div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width:80px;" >Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Url</th>
                        <th>Category</th>
                        <th style="width:100px;" >is-Active</th>
                        <th style="width:150px;" ></th>
                    </tr>

                </thead>
                <tbody>
                    <?php   $result= getBlogs(); while($movies=mysqli_fetch_assoc($result)):?>
                        <tr>
                            <td>
                                <img src="img/<?php echo $movies["imageUrl"]?>" alt="" class="img-fluid">
                            </td>
                            <td>
                                <?php echo $movies["title"]?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars_decode($movies["description"]);?>
                            </td>
                            <td>
                                <?php echo $movies["url"]?>
                            </td>
                            <td>
                                <?php echo $movies["name"]?>
                            </td>
                            <td>
                                <?php if ($movies["isActive"]):?>
                                    <i class="fas fa-check"></i>
                                <?php else:?>
                                    <i class="fas fa-times"></i>
                                <?php endif;?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="blog-edit.php?id=<?php echo $movies["id"] ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="blog-delete.php?id=<?php echo $movies["id"] ?>">Delete</a>
                            </td>

                        </tr>
                    <?php endwhile;?>
                </tbody>
            </table>

        </div>    
    </div>


    <?php include "views/_footer.php"; ?>

