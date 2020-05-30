<?php
  session_start();
  include('../controller/connect.php');
  $username = $_SESSION['username'];
  if (empty($username)) {
    header('location: http://localhost:8888/php_forum/src/view/index.php');
  }
  else {
    $queryUser = "SELECT * FROM user WHERE username = '$username'";
    $runQuery = mysqli_query($conn, $queryUser);
    $userSession = mysqli_fetch_array($runQuery);
  }
?>