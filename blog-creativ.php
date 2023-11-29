<?php
    require "libs/vars.php";
    require "libs/functions.php";  
    
    $title=$description="";
    $title_err=$description_err="";



    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        //validate title
        
        $input_title = trim($_POST["title"]);
        
        if(empty($input_title))
        {
            $title_err="title bos";
        } 
        else if (strlen($input_title)>150)
        {
            $title_err="title 150 den büyük";

        }
        else {
                $title=control_input($input_title);
            }
            
            $input_description = trim($_POST["description"]);
            
            if(empty($input_description))
            {
                $description_err="description bos";
            } 
            else if (strlen($input_description)<10)
            {
                $description_err="description 10 den kucuk";    
            }
            else {
                $description=control_input($input_description);                
            }

          
            $image_url = $_POST["image_url"];
            $url = $_POST["url"];

            if ( empty($title_err) && empty($description_err) )
            {
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
                            <input type="text"  name="title" id="title"  class="form-control <?php echo(!empty($title_err)) ? 'is-invalid':"" ?>" value="<?php echo $title;?>">
                            <span class="invalid-feedback"><?php echo $title_err ?></span>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea name="description" id="description" class="form-control <?php echo(!empty($description_err)) ? 'is-invalid':"" ?>"><?php echo $description;?></textarea>
                            <span class="invalid-feedback"><?php echo $description_err ?></span>
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

