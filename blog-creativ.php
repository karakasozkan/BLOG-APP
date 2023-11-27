<?php
    require "libs/vars.php";
    require "libs/functions.php";  

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $image_url = $_POST["image_url"];
        $url = $_POST["url"];

        if (creatBlog( $title,  $description,  $image_url, $url))
        {
            $_SESSION["message"]=$title." isimli Blog eklendi";
            $_SESSION["type"] = "success";
            header('Location: admin-blogs.php');

        }
        else
        {
            echo "Error";
        }
  
    }
?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">

     
        <div class="col-12">

           <div class="card">
           
                <div class="card-body">
                    <form action="blog-creativ.php" method="POST">

                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image_url" class="form-label">Resim</label>
                            <input type="text" class="form-control" name="image_url" id="image_url">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">url</label>
                            <input type="text" class="form-control" name="url" id="url">
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">

                    
                    </form>
                </div>
            </div>

        </div>    
    
    </div>

</div>

<?php include "views/_footer.php" ?>

