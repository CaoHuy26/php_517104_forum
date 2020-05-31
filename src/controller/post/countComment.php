<?php
  include ('../connect.php');

  $postId = $_GET['id'];

  $queryNumberOfComment = "SELECT COUNT(*) AS numberOfComment FROM comment WHERE postId = $postId";
  $runQueryNumberOfComment = mysqli_query($conn, $queryNumberOfComment);
  $countComment = mysqli_fetch_assoc($runQueryNumberOfComment);
  
  echo $countComment['numberOfComment'];
?>