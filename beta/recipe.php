<?php
// Step 1: Open a connection to DB
require '../include/db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>IDM 232: Beta Build phase</title>
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
      <h1><a href="index.php">FOOD THAT'S GOOD</a></h1>
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
    <br>
    <br>
    What You'll Need for This Meal
    <div class="recipeingredient"><img class="ingredientspic" src="../images/<?php echo $row['ingredients_img']; ?>" alt="Ingredients">
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
    </div>

  
  <div class="stepcontainer"><img class="steps" src="../images/<?php echo $row['steps_imgs']; ?>" alt="Steps">
  <?php
        $stepStr = $row['step_imgs'];
      // echo $stepStr;
      // convert string into an array 
        $stepArray = explode("*", $stepStr);
      // print_r($stepArray);
        for ($lp = 0; $lp < count($stepArray); $lp++) {
          $oneStep = $stepArray[$lp];
          echo "<li>". $oneStep. "<li>";
        }
      ?>
    <div class="stepinst">
    <?php
        $instStr = $row['all_steps'];
      // echo $instStr;
      // convert string into an array 
        $instArray = explode("*", $instStr);
      // print_r($instArray);
        for ($lp = 0; $lp < count($instArray); $lp++) {
          $oneInst = $instArray[$lp];
          $oneStep = $stepArray[$lp];
          echo "<li>". $oneInst . "<li>";
        }
      ?>
    </div>
  </div>


  
  <div id="mySidenav" class="sidenav">
    <a href="#modal-one" id="help">Help</a>
    <a href="#modal-two" id="searchfield">Search</a>

  </div>
  <div class="modal" id="modal-one">
    <div class="modal-content">
      <p>Click the logo at the top to go back to the homepage. Click any recipe image to get info about that recipe. To search for a recipe, type a keyword into the search bar and click Search.</p>
      <a href="#close" class="btn closebtn">Back</a>
    </div>
  </div>
  <div class="modal" id="modal-two">
    <div class="modal-content">
      <form class="search-container">
        <a href="#search-bar" id="search"></a>
        <input type="text" id="search-bar" placeholder="Search">
      </form>
      <a href="#" title="Close" class="modal-close">Close</a>
    </div>
  </div>


  <div class="bottombar">
  </div>
</body>

</html>