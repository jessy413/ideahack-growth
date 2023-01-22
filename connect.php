<?php
$user = 'root';
$password = 'root';
$db = 'plant_status';
$host = '127.0.0.1';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);

?>