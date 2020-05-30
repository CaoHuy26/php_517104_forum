<?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "12345678";
  $database = 'php_forum';

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected successfully";
?>