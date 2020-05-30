<?php
  session_start();

  $user = $_SESSION['username'];
  if (empty($user)) {
    echo "Hello World";
  }
  else {
    echo "Hello $user";
  }
?>