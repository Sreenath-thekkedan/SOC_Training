<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Recipe Pool</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<div class="recipe_container">
   <div class="recipe_content">
      <h1>Welcome to the Recipe Pool</h1>
      <p>Below are some delicious recipes:</p>
      <div class="recipes">
         <div class="recipe-group">
            <div class="recipe-widget">
               <h3>Burger Recipe</h3>
               <a href="generate_recipe.php?recipe=burger" class="btn">Download Recipe</a>
            </div>
            <div class="recipe-widget">
               <h3>Spaghetti Recipe</h3>
               <a href="generate_recipe.php?recipe=spaghetti" class="btn">Download Recipe</a>
            </div>
         </div>
         <div class="recipe-group">
            <div class="recipe-widget">
               <h3>Chicken Curry Recipe</h3>
               <a href="generate_recipe.php?recipe=chicken_curry" class="btn">Download Recipe</a>
            </div>
            <div class="recipe-widget">
               <h3>Veggie Stir-Fry Recipe</h3>
               <a href="generate_recipe.php?recipe=veggie_stir_fry" class="btn">Download Recipe</a>
            </div>
         </div>
      </div>
      <a href="user_page.php" class="btn">Back to Dashboard </a>
      <a href="logout.php" class="btn">Logout</a>
   </div>
</div>

</body>
</html>
