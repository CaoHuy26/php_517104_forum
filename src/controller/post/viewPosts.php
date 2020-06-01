<?php
  include ('../connect.php');

  $queryPost = 
    " SELECT * FROM post
      INNER JOIN category ON post.categoryId = category.id
      INNER JOIN user ON post.userId = user.id
      ORDER BY post.createdAt DESC
    ";
  $runQueryPost = mysqli_query($conn, $queryPost);
?>
  