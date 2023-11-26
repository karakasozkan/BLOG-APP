<?php

  require "libs/vars.php";
  require "libs/functions.php";



  if (isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $email = $_POST["email"];

        

        if (empty($username) or empty($name) or empty($password) or empty($email))
        {
            echo "<div class'alert alert-danger mb-0 text-center>Zorunlu alanlari doldurunuz</div>'";
            return;
        }
        
        $user = getUser($username);

        if (!is_null($user) )
        {
            echo "<div class'alert alert-danger mb-0 text-center>Username daha önce alinmis</div>'";
            return;
        }

        createUser($username,$password,$name,$email);
        header('location: login.php');

       
    }


?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>
    

<div class="container my-3">    
        <div class="row">
                <div class="col-12">
                              
                        <div class="card">
                                <div class="card-body">
                                        <form action="register.php" method="post">

                                                <div class="mb-3">                                                        
                                                        <label for="name" class="form-label">name</label>
                                                        <input type="text" class="form-control" name="name" id="name">
                                                </div>

                                                <div class="mb-3">                                                        
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" name="username" id="username">
                                                </div>

                                                <div class="mb-3">                                                        
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password" id="password">                                                        
                                                </div>

                                                <div class="mb-3">                                                        
                                                        <label for="email" class="form-label">E Mail</label>
                                                        <input type="text" class="form-control" name="email" id="email">                                                        
                                                </div>

                                                <input type="submit" value="Login" class="btn btn-primary" name="register">
                                        
                                        </form>
                                </div>
                        </div>
                        

                </div>                
                   
    </div>
</div>


<?php include "views/_footer.php"; ?>