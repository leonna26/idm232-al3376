<?php 

// Step 1: Open a connection to DB

require '../include/db.php';

// Step 2: Perform a DB table query

$table = 'recipes'; 
$query = "SELECT * FROM {$table} ";
$result = mysqli_query($connection, $query);

// Check for errors in SQL statement 

if (!$result) {
    die ('Database query failed');

}
    

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>IDM 232: Beta Build phase</title>
  <meta charset="UTF-8">
  <!--META TAG VIEWPORT IMPORTANT FOR RESPONSIVENESS-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../alpha/normalize.css">
  <link rel="stylesheet" href="../alpha/build.css">
</head>
<body>

    <div class="topbar">
    </div>
<header>
    <div class="title">      
      <h1><a href="../beta/index03_integration.php">FOOD THAT'S GOOD</a></h1>
    </div>
<div class="divider">
</div>
</header>

<div class="feature"><img class="feature" src="../alpha/graphics/featuredrecipe3.jpg" alt="Featured recipe">
</div>
<div class="divider2">
</div>
<div class="filter">
  <div class="subtitle2">
    Explore recipes:
  </div>
<button class="fbutton button2">All Recipes</button>
<button class="fbutton button2">Chicken</button>
<button class="fbutton button2">Beef</button>
<button class="fbutton button2">Vegetarian</button>
</div>
<div class="divider3">
</div>
<!--RECIPE CARDS-->
<div id="content">

    <?php
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
<!-- Recipe Start -->
<div class="recipe"> 
      <div class="image">
        <a href="recipe.html">
              <img src="../images/<?php echo $row['main_img']; ?>" alt="Top Chef Seared Grassfed Steaks">
            </a>
            <div class="name">
            <h2>
                <?php echo $row['tle']; ?>
             </h2>
            <p class="subtitle">
            <?php echo $row['subtitle']; ?>
            </p>
            </div>
            
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
          <form class="search-container">
              <a href="#search-bar" id="search"></a>
              <input type="text" id="search-bar" placeholder="Search">
            </form>
            <a href="#" title="Close" class="modal-close">Close</a>      
          </div>
    </div>

</body>
</html>
