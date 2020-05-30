<?php
  include ('../connect.php');
  include ('../userSession.php');

  $postId = $_GET['id'];

  $queryPost = "SELECT * FROM post WHERE id = '$postId'";
  $runQueryPost = mysqli_query($conn, $queryPost);
  $rowPost = mysqli_fetch_array($runQueryPost);
  if ($runQueryPost) {
    echo "Title: " .$rowPost['title'];
    echo "Content:"; 
    echo htmlspecialchars_decode($rowPost['content']);

    //  Admin hoặc người tạo ra bài viết mới có quyền sửa, xoá bài viết
    if ($rowPost['userId'] == $userSession['id'] || $userSession['username'] == 'admin1') {
      echo "Sửa";
      echo "Xoá";
    }
  }
?>