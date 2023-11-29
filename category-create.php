<?php
    require "libs/vars.php";
    require "libs/functions.php";  
    
    $categryname="";
    $categryname_err="";



    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        //validate categryname
        
        $input_categryname = trim($_POST["categryname"]);
        
        if(empty($input_categryname))
        {
            $categryname_err="categryname bos";
        } 
        else if (strlen($input_categryname)>150)
        {
            $categryname_err="categryname 150 den büyük";

        }
        else {
                $categryname=control_input($input_categryname);
            }


            if ( empty($categryname_err) )
            {
                if (creatCategory ($categryname))
                {
                    $_SESSION["message"]=$categryname." isimli categryname eklendi";
                    $_SESSION["type"] = "success";
                    header('Location: admin-categories.php');

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
                    <form action="category-create.php" method="POST">

                        <div class="mb-3">
                            <label for="categryname" class="form-label">categryname</label>
                            <input type="text"  name="categryname" id="categryname"  class="form-control <?php echo(!empty($categryname_err)) ? 'is-invalid':"" ?>" value="<?php echo $categryname;?>">
                            <span class="invalid-feedback"><?php echo $categryname_err ?></span>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">

                    
                    </form>
                </div>
            </div>

        </div>    
    
    </div>

</div>

<?php include "views/_footer.php" ?>

