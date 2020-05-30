<?php
  include ('../connect.php');

  $queryCategory = "SELECT * FROM category";
  $runQueryCategory = mysqli_query($conn, $queryCategory);
?>