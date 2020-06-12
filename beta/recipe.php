<?php
// Step 1: Open a connection to DB
require '../include/db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Food that's Good! Recipe page</title>
  <meta charset="UTF-8">
  <!--META TAG VIEWPORT IMPORTANT FOR RESPONSIVENESS-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="normalize.css">
  <link rel="stylesheet" href="build.css">
  <link rel="stylesheet" href="recipe.css">

</head>

<body>
  <div class="topbar">
  </div>
  <header>
    <div class="title">
      <h1><a href="index.php">FOOD THAT'S GOOD!</a></h1>
    </div>
    <div class="divider">
    </div>
  </header>


  <?php
  // Get the ID number passed to this page

  $id = $_GET['id'];

  // Query for the number
  // Step 2: Perform a DB table query

  $table = 'recipes';
  $query = "SELECT * FROM {$table} WHERE id={$id}";
  $result = mysqli_query($connection, $query);

  // Check for errors in SQL statement 
  if (!$result) {
    die('Database query failed');
  } else {
    $row = mysqli_fetch_assoc($result);
  // print_r($row);
  }
  // Extract record information

  ?>

  <div class="info">
    <?php echo $row['tle'];?>
  </div>
  <div class="recsubtitle">
    <?php echo $row['subtitle'];?>
  </div>

  <div class="desc">
    <?php echo $row['description']; ?>
  </div>
  
  <div class="feature"><img class="mainimg" src="../images/<?php echo $row['main_img']; ?>" alt="Featured recipe" width="50" height="50">
  </div>
  
  <div class="ingredients">
    What You'll Need for This Meal
  </div>
    <div class="recipeingredient">
    <img src="../images/<?php echo $row['ingredients_img'];?>" class="ingredientspic">

    <ul class="list">


      <?php
        $ingredStr = $row['all_ingredients'];
      // echo $ingredStr;
      // convert string into an array 
        $ingredArray = explode("*", $ingredStr);
      // print_r($ingredArray);
        for ($lp = 0; $lp < count($ingredArray); $lp++) {
          $oneIngred = $ingredArray[$lp];
          echo "<li>". $oneIngred . "<li>";
        }
      ?>
      </ul>
      </div>

    <div class="startcooking">
    <br>
    <br>
        Let's Start Cooking! 
      </div>
     <?php 
            $stepImgs = $row['step_imgs'];
            $allSteps = $row['all_steps'];
            $allHeaders = $row['all_steps'];
    
            
            // Convert string into an array
            // all step array has twice as much lines as all images array
            $stepImgsArray = explode("*", $stepImgs);
    
            $allStepsArray = explode("*", $allSteps);
    
            $allHeadersArray = explode("*", $allHeaders);
            
            
            for($i = 0; $i < count($stepImgsArray); $i++){
                $oneImg = $stepImgsArray[$i];
                $oneStep = $allStepsArray[$i*2+1];
                $oneHeader = $allHeadersArray[$i*2];
               // echo $oneImg . "<br>";
                echo "<div class=\"step_parent\">";
                echo "<img src=\"../images/" . $oneImg . "\" class=\"step_child step_img\">";
                
                echo "<div class=\"step_child step_childtxt\">";
                
                echo "<h4> $oneHeader </h4>";
                echo "<p> $oneStep </p>";
                
                echo "</div>";
                
                echo "</div>";
                
    }
    ?>


  <div class="bottombar">
  </div>
</body>

</html>