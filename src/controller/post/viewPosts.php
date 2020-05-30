<?php
  include ('../connect.php');

  $queryPost = 
    " SELECT * FROM post
      INNER JOIN category ON post.categoryId = category.id
      INNER JOIN user ON post.userId = user.id
    ";
  $runQueryPost = mysqli_query($conn, $queryPost);
  while ($rowPost = mysqli_fetch_array($runQueryPost)) {
?>
    <h3>Title: <?php echo $rowPost['title']?></h3>
    <p>Content: <?php echo htmlspecialchars_decode($rowPost['content']) ?></p>
    <p>Category: <?php echo $rowPost['name']?></p>
    <p>User: <?php echo $rowPost['username'] ?></p>
  <?php } ?>
  