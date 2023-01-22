<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>GROWTH</title>
  </head>
  <body>
    <div>
      <h1 class="text-3xl font-bold underline">GROWTH</h1>
      <div class = "functions">
        <a href="./meditate.html">meditate</a>
        <a href="https://seedsurvivor.com/just-for-kids/games/">game</a>
      </div>
      <select name="plants" id="cars">
        <option value="succulent">Succulent</option>
        <option value="spider">Spider Plant</option>
        <option value="swiss">Swiss Chess Plant</option>
        <option value="orchid">Orchid</option>
      </select>
      <div class="plant">
        <div class="plant-status">
          <img class="water" src="water.jpeg" />
          <img class="sunlight" src="sun.png" />
        </div>
        <img src="cute_plant.gif" />
      </div>
      <table>
        <thead>
          <tr>
            <th> water level </th>
            <th> sunlight level </th>
          </tr>
        </thead>
        <tbody>
        <?php

          if(isset($_GET["rate"])) {
            $temperature = $_GET["rate"]; // get temperature value from HTTP GET

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database_name = "plant_status";

            // Create MySQL connection fom PHP to MySQL server
            $connection = new mysqli($servername, $username, $password, $database_name);
            // Check connection
            if ($connection->connect_error) {
                die("MySQL connection failed: " . $connection->connect_error);
            }

            $sql = "INSERT INTO status (heart_beat) VALUES ($rate)";

            if ($connection->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . " => " . $connection->error;
            }

            $connection->close();
          } else {
            echo "temperature is not set in the HTTP request";
          }
          ?>

        <?php
        require_once 'connect.php';
            
            $sql = "SELECT * FROM `status`";
            
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));

            if($result->num_rows >0)
            {
              while($row = $result ->fetch_assoc())
              {
                  echo "<tr><td?>".$row["water_level"]."</td></td>".$row["sunlight_level"]."</td></tr>";

                  $heart = $row["heart_beat"];
                  echo $heart;
                  if($heart<"60")
                  {
                    echo "Start watering";
                    $verz="1.0";
                    $comPort = "/dev/cu.usbserial-0001"; /*change to correct com port */
                    $fp =fopen($comPort, "w");
                    fwrite($fp, "water"); /* this is the number that it will write */
                    fclose($fp);

                  }
              }
            }
          
            else
            {
              echo "No Results";
            }
            
            
        ?>
        </tbody>
      </table>

    </div>
  </body>
</html>
