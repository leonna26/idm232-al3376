<?php 

// Step 1: Open a connection to DB

require '../include/db.php';

// Get filter info if passed in URL
$filter = $_GET['filter'];

$table = 'recipes'; 

if (isset($_POST['submit'])) {
// echo "User clicked on submit button";
$search = $_POST['search'];
$search = htmlspecialchars($_POST['search']);


$query = "SELECT * FROM {$table} WHERE tle LIKE '%{$search}%' OR subtitle LIKE '%{$search}%' OR description LIKE '%{$search}%' OR all_ingredients LIKE '%{$search}%'";
$result = mysqli_query($connection, $query);

if (!$result) {
  die ('Search query failed');
  } 
} else if (isset($filter)) {
  $query = "SELECT * FROM {$table} WHERE proteine LIKE '%{$filter}%'";
  $result = mysqli_query($connection, $query);

if (!$result) {
  die ('Filter query failed');
    } 

} else {
// Step 2: Perform a DB table query
$query = "SELECT * FROM {$table} ";
$result = mysqli_query($connection, $query);

// Check for errors in SQL statement 

if (!$result) {
    die ('Database query failed');

}
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Home: Food That's Good!</title>
  <meta charset="UTF-8">
  <!--META TAG VIEWPORT IMPORTANT FOR RESPONSIVENESS-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../alpha/normalize.css">
  <link rel="stylesheet" href="build.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet">

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

<div class="feature"><img class="feature" src="../images/banner.jpg" alt="Featured recipe">
</div>

<div class="divider2">
</div>
<div class="filter">
  <div class="subtitle2">
    <?php
    if (isset($_POST['submit'])){
      if ($result->num_rows== 0){
        echo "Sorry, no recipes found:";

      } else {
        echo "Here are your recipe results:";
      }

    } else if (isset($filter)) {
      echo "Here are your recipe results:";
      } else {
      echo "Explore recipes:";
    }
  
    ?>
  </div>

  <form class="filter-container">
        <a href="index.php" class="filter"><button type="button" class="fbutton button2">All Recipes</button></a>
        <a href="index.php?filter=Chicken" class="filter"><button type="button" class="fbutton button2">Chicken</button></a><a href="index.php?filter=Beef" class="filter"><button type="button" class="fbutton button2">Beef</button></a>
        <a href="index.php?filter=Vegetarian" class="filter"><button type="button" class="fbutton button2">Vegetarian</button></a>
    </form>

<!--RECIPE CARDS-->
<div id="content">

    <?php
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
<!-- Recipe Start -->
<div class="recipe"> 
      <?php
      $id = $row['id'];
      echo "<a href=\"recipe.php?id={$id}\">";
      ?>
      <div class="image">
        <!--<a href="recipe.php">-->
        
      
              <img src="../images/<?php echo $row['main_img']; ?>" alt="Top Chef Seared Grassfed Steaks">
            
            <div class="name">
            <h2>
                <?php echo $row['tle']; ?>
             </h2>
            <p class="subtitle">
            <?php echo $row['subtitle']; ?>
            </p>
            </div>
            </a>
      </div>
  </div>
<!-- Recipe End -->
    <?php
    } // END php while loop



    // Step 4: Relesase returned data 
    
    mysqli_free_result($result);

    // Step 5: Close the database connection 

    mysqli_close($connection);
    ?>
    

  
</div>

<div class="bottombar">
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
          <form class="search-container" action="index.php" method="POST">
              <a href="#search-bar" id="search"></a>
              <input type="text" id="search-bar" name= "search" placeholder="Search">
              <input type="submit" name="submit" value="Submit" class="searchsubmit">
          </form>
            <a href="index.php" title="Close" class="modal-close">Close</a>      
          </div>
    </div>

</body>
</html>
