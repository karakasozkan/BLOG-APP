<?php
    require "libs/vars.php";
    require "libs/functions.php";  

    $id=$_GET["id"];
    $selectedMovie=getblogId($id);
    

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $image_url = $_POST["image_url"]; 
        $url = $_POST["url"];
        $isActive = isset($_POST["isActive"])? true : false;

       // echo "<script>alert('$isActive');</script>"; 

        editBlog( $id, $title,  $description,  $image_url, $url,$isActive);
        header('Location: admin-blogs.php');
    }
?>

<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>

<div class="container my-3">

    <div class="row">

     
        <div class="col-12">

           <div class="card">
           
                <div class="card-body">
                    <form  method="POST">

                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $selectedMovie["title"];?>">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea name="description" id="description" class="form-control"  ><?php echo $selectedMovie["description"];?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image_url" class="form-label">Resim</label>
                            <input type="text" class="form-control" name="image_url" id="image_url" value="<?php echo $selectedMovie["image-url"];?>">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">url</label>
                            <input type="text" class="form-control" name="url" id="url" value="<?php echo $selectedMovie["url"];?>">
                        </div>

                        <div class="form-check mb-3">
                            <label for="isActive" class="form-check-label">is active</label>
                            <input type="checkbox" class="form-check-input" name="isActive" id="isActive" <?php if ($selectedMovie["is-active"]) {echo "checked";}?>>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">

                    
                    </form>
                </div>
            </div>

        </div>    
    
    </div>

</div>

<?php include "views/_footer.php" ?>

