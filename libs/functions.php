<?php 


function getData()
{
    $myfile= fopen("db.json","r");
    $size = filesize("db.json");
    $result = json_decode( fread($myfile, $size),true);

    fclose($myfile);

    return $result;
}


function getUser(string $username) {
    $users = getData()["users"];

    foreach($users as $user) {
        if($user["username"] == $username) {
            return $user;
        }
    }
    return null;
}

function createUser(string $username,string $password,string $name,string $email)
{
    $db=getData();
    

    array_push($db["users"], 
    
    array(
        "id"=> count($db["users"])+1,
        "username"=>$username,
        "password"=>$password,
        "name"=>$name,
        "email"=>$email
    ));

    $myfile=fopen("db.json","w");

    fwrite($myfile,json_encode($db,JSON_PRETTY_PRINT));

    fclose($myfile);


}

function getBlogs()
{
    include "ayar.php";
    $query="SELECT b.id,b.title,b.description,b.url,b.imageUrl,b.isActive, c.name FROM blogs b  inner join categories c on b.category_id=c.id ";
    $result = mysqli_query($connection,$query);
    mysqli_close($connection);
    
    return $result;
}


function editBlog( int $id, string $title,string  $description, string $imageUrl, string $url, int $isActive)
{
    
    include "ayar.php";
    
    $query = "UPDATE blogs SET title='$title', description='$description',imageUrl='$imageUrl', url='$url',isActive=$isActive WHERE id=$id";
    $result = mysqli_query($connection,$query);
    echo mysqli_error($connection);
    return $result;

}


function deleteblog($id)
{

    include "ayar.php";

    $query = "DELETE FROM blogs WHERE id=$id";

    $result= mysqli_query($connection,$query);
    $count=mysqli_affected_rows($connection);
    
    echo mysqli_error($connection);
   
    //mysqli_close($connection);
    return $result;

}

function getCategories()
{
    include "ayar.php";
    $query="SELECT * FROM categories";
    $result = mysqli_query($connection,$query);
    mysqli_close($connection);
    
    return $result;
}

function getblogById(int $movieid)
{
    include "ayar.php";
    $query= "SELECT * FROM blogs WHERE id='$movieid'";
    $result=mysqli_query($connection,$query);
    mysqli_close($connection);
    
    return $result;

}


function creatBlog(string $title, string $description, string $image_url,string $url, int $isActive=0) {
    //mysqli metodu
    
    include "ayar.php";
   //sorgu
   $query = $connection->prepare("INSERT INTO blogs(title, description, imageUrl, url, isActive) VALUES (?,?,?,?,?)");
   $query->bind_param("ssssi",$title,$description, $image_url, $url, $isActive );
    
   $result=$query->execute();

   $query->close();
   $connection->close();
   
   return $result;
}


function creatCategory (string $categryname)//mysqli_stat_prapare yöntemi
{   include "ayar.php";

  
    $query = $connection->prepare("INSERT INTO categories(name) VALUES(?)");
    $query->bind_param("s", $categryname);
    
    $result=$query->execute();
 
    $query->close();
    $connection->close();
        
    return $result;
 
}


function getCategoryById(int $CategoryId)
{
    include "ayar.php";
    $query= "SELECT * FROM categories WHERE id='$CategoryId'";
    $result=mysqli_query($connection,$query);
    mysqli_close($connection);
    
    return $result;

}

function editCategory( int $id, string $categoryName, int $isActive)
{
    
    include "ayar.php";
    
    $query = "UPDATE categories SET name='$categoryName',isActive=$isActive WHERE id=$id";
    $result = mysqli_query($connection,$query);
    echo mysqli_error($connection);
    return $result;

}

function deleteCategory($id)
{

    include "ayar.php";

    $query = "DELETE FROM categories WHERE id=$id";

    $result= mysqli_query($connection,$query);
    $count=mysqli_affected_rows($connection);
    
    echo mysqli_error($connection);
   
    //mysqli_close($connection);
    return $result;

}



function control_input($data)
{
    //  $data= strip_tags($data,"<b><br>"); //taglari siliyor. Haric tutmak istediklerini yaziyorsun
    //  $data= strip_tags($data);
    //$data= htmlspecialchars($data); //text sadece text olarak cevirir.
    $data= htmlentities($data);     //text sadece text olarak cevirir.  
    $data= stripslashes($data);     //sql injection korunmak icin
 
    return $data;
}


function kisaAciklama($aciklama, $limit) {
    if (strlen($aciklama) > $limit) {
        echo substr($aciklama,0,$limit)."...";
    } else {
        echo $aciklama;
    };
}
?>