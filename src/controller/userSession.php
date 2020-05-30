<?php
  session_start();
  include('../controller/connect.php');
  $username = $_SESSION['username'];
  
  $queryUser = "SELECT * FROM user WHERE username = '$username'";
  $runQuery = mysqli_query($conn, $queryUser);
  $userSession = mysqli_fetch_array($runQuery);
?>