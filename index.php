<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>GROWTH</title>
  </head>
  <body>
    <div>
      <h1>GROWTH</h1>
      <div class="plant">
        <div class="plant-status">
          <img class="water" src="water.jpeg" />
          <img class="sunlight" src="sun.png" />
        </div>
        <img src="cute_plant.gif" />
      </div>
      <?php
          require_once 'connect.php';
          //$sql = "SELECT * FROM goals";
          //$result = mysqli_query($link, $sql) or die(mysqli_error($link));
          print("<h2>Incomplete Goals</h2>");
        ?>
    </div>
  </body>
</html>
