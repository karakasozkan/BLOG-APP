<?php
     
    require "libs/functions.php";  

    $id=$_GET["id"];
    deleteblog($id);
    
    header('Location: admin-blogs.php');

     
?>
