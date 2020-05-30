<?php
  session_start();
  session_destroy();
  header('location: http://localhost:8888/php_forum/src/view/index.php');
?>