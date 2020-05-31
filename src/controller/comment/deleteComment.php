<?php
  include ('../connect.php');
  include ('../userSession.php');
  
  $commentId = $_GET['id'];

  $queryComment = "SELECT * FROM comment WHERE id = $commentId";
  $runQueryComment = mysqli_query($conn, $queryComment);
  $rowComment = mysqli_fetch_array($runQueryComment);

  # Admin hoặc người tạo ra bài viết mới có quyền xoá bài
  if ($userSession['username'] == 'admin' || $userSession['id'] == $rowPost['userId'] || $userSession['role'] == 1) {
    $deletePost = "DELETE FROM comment WHERE id = $commentId";
    $runDeletePost = mysqli_query($conn, $deletePost);
    
    if ($runDeletePost) {
      echo "Xoá bình luận thành công";
      header('location: http://localhost:8888/php_forum/src/view/post.php?id=' .$rowComment['postId']);
    }
    else {
      echo "Xoá bình luận thất bại";
    }
  }
  else {
    echo "Bạn không có quyền xoá bình luận này";
  }
?>