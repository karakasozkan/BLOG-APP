<?php
    require "libs/vars.php"; 
    require "libs/functions.php";  

    $id=$_GET["id"];
    if (deleteCategory($id))
    {
        $_SESSION["message"]=$id." ID Category deleted";
        $_SESSION["type"] = "danger";
        header('Location: admin-categories.php');  
    }
    else
    {
        echo "Error:";
    }
    
    

     
?>
