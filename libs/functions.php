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


function creatBlog(string $title, string $description, string $image_url,string $url) {
        

    include "ayar.php";

    # sorgu
    $query = "INSERT INTO blogs(title, description, imageUrl, url, isActive) VALUES ('$title', '$description', '$imageUrl', '$url', 1)";
    $result = mysqli_query($connection,$query);
 
    mysqli_close($connection);
 
    return $result;

    // Json dan cekilen verilere dizi mantigiyla veri ekleme ve dosyaya tekrar yazdirma.
    // $db = getdata();
    // array_push($db["movies"],
    //     array(
    //         "id"=> count($db["movies"])+1,
    //         "title"=>$title,
    //         "description"=> $description,
    //         "url"=> $url,
    //         "image-url"=> $image_url,
    //         "likes"=> $likes,
    //         "comments"=>  $comments,
    //         "is-active"=> false
    //     ));


    // $myfile=fopen("db.json","w");
    // fwrite($myfile,json_encode($db,JSON_PRETTY_PRINT));
    // fclose($myfile);


}

function getblogId(int $movieid)
{
    $movies=getData()["movies"];

    foreach ($movies as $movie) {
         if($movie["id"]==$movieid)
         {
            return $movie;
         }
          
    }
    return null;

}

function editBlog( $id, $title,  $description,  $image_url, $url, bool $isActive)
{
    
    $db=getData();
    
    foreach ($db["movies"] as &$movie) {
         if($movie["id"]==$id)
         {
            
            $movie["title"]= $title;
            $movie["description"]= $description;
            $movie["image_url"]= $image_url;
            $movie["url"]= $url;
            $movie["is-active"]= $isActive;

            $myfile=fopen("db.json","w");
            fwrite($myfile,json_encode($db,JSON_PRETTY_PRINT));
            fclose($myfile);

            break;
         }
          
    }
    return null;
}


function deleteblog($id)
{

    $db=getData();
    
    foreach ($db["movies"] as $key => $movie) {
         if($movie["id"]==$id)
         {           
            array_splice($db["movies"],$key,1);  
         }
          
    }
            $myfile=fopen("db.json","w");
            fwrite($myfile,json_encode($db,JSON_PRETTY_PRINT));
            fclose($myfile);
   

}

function kisaAciklama($aciklama, $limit) {
    if (strlen($aciklama) > $limit) {
        echo substr($aciklama,0,$limit)."...";
    } else {
        echo $aciklama;
    };
}
?>