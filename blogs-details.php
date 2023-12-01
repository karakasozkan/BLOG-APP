<?php

  require "libs/vars.php";
  require "libs/functions.php";


  if (!isset($_GET["id"]) or !is_numeric($_GET["id"]) ) {

        header("Location: index.php");
    }

    $result=getblogById($_GET["id"]);
    $item = mysqli_fetch_assoc($result);
    
    if (!$item) {
        header("Location: index.php");
    }
?>

  <?php include "views/_header.php"; ?>  
 <?php include "views/_navbar.php"; ?> 
    
    <div class="container my-5">    
        <div class="row">
            <div class="col-12">
                <div class="card p-1">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img class="img-fluid" src="img/<?php echo $item["imageUrl"];?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $item["title"];?></h5>
                                <p class="card-text">   <?php echo htmlspecialchars_decode($item["description"]);?></p>
                              
                            </div>
                        </div>
                    </div>
                </div>             
        </div>    
    </div>


    <?php include "views/_footer.php"; ?>

