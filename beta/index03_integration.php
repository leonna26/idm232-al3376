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
      <h1><a href="build.html">FOOD THAT'S GOOD</a></h1>
    </div>
<div class="divider">
</div>
</header>
<!--<div id="images">
    <img id="image1" src="./graphics/featuredrecipe.jpg" />
    <img id="image2" src="https://i.imgur.com/qASVX.jpg" />
    <img id="image3" src="https://i.imgur.com/fLuHO.jpg" />
    <img id="image4" src="https://i.imgur.com/5Sd3Q.jpg" />
  </div>
  <div id="slider">
    <a href="#image1">.</a>
    <a href="#image2">.</a>
    <a href="#image3">.</a>
    <a href="#image4">.</a>
  </div>-->
<div class="feature"><img class="subtitle" src="../alpha/graphics/featuredrecipe3.jpg" alt="Featured recipe">
</div>
<!--<div class="subtitletext">
    <p><strong>Meal of the Day</strong></p>
</div>
<div class="underline">
</div>
<div class="paragraph">
    <p><i>Spanish Paella - 2hr 20min</i>
        <br>
            A seasonal salad of striped Chioggia beet, juicy orange, and peanuts is a fresh pairing for these zesty quesadillas. We’re seasoning the chicken filling with both jalapeño pepper and Mexican spices—balanced by a layer of melty white cheddar. Mexican crema brightened up with lime juice is perfect for dipping.
    </p>
</div>
<button class="button button1" href="recipe.html">START COOKING</button>-->
<div class="divider2">
</div>
<div class="filter">
  <div class="subtitle2">
    <p><i>Explore recipes:</i></p>
  </div>
<button class="fbutton button2">Pasta</button>
<button class="fbutton button2">Lunch</button>
<button class="fbutton button2">Dinner</button>
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
            <h2 class="name">
            <?php echo $row['tle']; ?>
            </h2>
            <p class="subtitle">
            <?php echo $row['subtitle']; ?>
            </p>
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
<!-- Recipe End -->
<!-- <div class="pageb">
  <div class="previous">&lt;</div>
  <div class="next">&gt;</div>
</div> -->
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
