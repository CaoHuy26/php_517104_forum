<?php
  include ('../connect.php');
  include ('../userSession.php');
  
  $postId = $_GET['id'];

  $queryPost = "SELECT * FROM post WHERE id = $postId";
  $runQueryPost = mysqli_query($conn, $queryPost);
  $rowPost = mysqli_fetch_array($runQueryPost);

  # Admin hoặc người tạo ra bài viết mới có quyền xoá bài
  if ($userSession['username'] == 'admin' || $userSession['id'] == $rowPost['userId']) {
    # Delete comment
    $deleteComment = "DELETE FROM comment WHERE postId = $postId";
    $runDeleteComment = mysqli_query($conn, $deleteComment);
    # Then delete reaction
    $deleteReaction = "DELETE FROM reaction WHERE postId = $postId";
    $runDeleteReaction = mysqli_query($conn, $deleteReaction);
    # Finally delete post
    $deletePost = "DELETE FROM post WHERE id = $postId";
    $runDeletePost = mysqli_query($conn, $deletePost);
    
    if ($runDeleteComment && $runDeleteReaction && $runDeletePost) {
      echo "Xoá bài viết thành công";
      header("location: http://localhost:8888/php_forum/src/view/index.php");
    }
    else {
      echo "Xoá bài viết thất bại";
    }
  }
  else {
    echo "Bạn không có quyền xoá bài viết";
  }
?>