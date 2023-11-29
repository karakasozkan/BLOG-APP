<?php
    require "libs/vars.php"; 
    require "libs/functions.php";  

    $id=$_GET["id"];
    if (deleteblog($id))
    {
        $_SESSION["message"]=$id." ID Blog deleted";
        $_SESSION["type"] = "danger";
        header('Location: admin-blogs.php');  
    }
    else
    {
        echo "Error:";
    }
    
    

     
?>
