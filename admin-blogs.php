<?php

  require "libs/vars.php";
  require "libs/functions.php";


?>

  <?php include "views/_header.php"; ?>  
 <?php include "views/_navbar.php"; ?> 
    
    <div class="container my-5">    
        <div class="row">
        <div class="col-12">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width:80px;" >Image</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th style="width:30px;" >Likes</th>
                        <th style="width:40px;" >Comment</th>
                        <th style="width:100px;" >is-Active</th>
                        <th style="width:150px;" ></th>
                    </tr>

                </thead>
                <tbody>
                    <?php  foreach (getData()["movies"] as $movies) :?>
                        
                        <tr>
                            <td>
                                <img src="img/<?php echo $movies["image-url"]?>" alt="" class="img-fluid">
                            </td>
                            <td>
                                <?php echo $movies["title"]?>
                            </td>
                            <td>
                                <?php echo $movies["url"]?>
                            </td>
                            <td>
                                <?php echo $movies["likes"]?>
                            </td>
                            <td>
                                <?php echo $movies["comments"]?>
                            </td>
                            <td>
                                <?php if ($movies["is-active"]):?>
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
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>    
    </div>


    <?php include "views/_footer.php"; ?>

