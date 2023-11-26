<?php
    require "libs/vars.php"; 
    require "libs/functions.php";  

    $id=$_GET["id"];
    deleteblog($id);
    
    
    $_SESSION["message"]=$id." ID Blog silindi";
    $_SESSION["type"] = "danger";
    header('Location: admin-blogs.php');

     
?>
