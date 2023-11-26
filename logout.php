            
<?php
    // setcookie("username",$username,time()-(60*60));
    // setcookie("login","true",time()-(60*60));
    // header('Location: index.php');

    setcookie("auth[username]","" ,time()-(60*60));
    // setcookie("username",$username,time()+(60*60));
     setcookie("auth[name]","",time()-(60*60));
      header('Location: index.php');

?>