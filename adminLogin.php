<?php

@include 'config.php';
if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
     $select = " SELECT * FROM admin WHERE email = '$email' && password = '$pass'  ";

    $result = mysqli_query($conn, $select);

    if(!mysqli_num_rows($result) > 0){

       $error[] = 'user doesn\'t exist!';

    }else{

     header("location:admin_home.php");
    }

 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>
   <link rel="stylesheet" href="style.css">
 <style>

 </style>
</head>
<body>
<div class="nav">
   <br>
   <br>
        <a href="adminLogin.php">Admin</a>
        <a href="login.php">User</a>
      </div>

<div class="form-container">

   <form action="" method="post">
      <h3> Admin Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="Login" class="form-btn">
        </form>

</div>

</body>
</html>