<?php

@include 'config.php';

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is your employee page</p>
      <a href="dashboard.php" class="btn">dashboard</a>
      <a href="recipe_pool.php" class="btn">recipe</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>