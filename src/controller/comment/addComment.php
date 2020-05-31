<?php
  include ('../connect.php');
  include ('../userSession.php');
?>

<?php
  if (isset($_POST['addComment'])) {
    $userId = $userSession['id'];
    $postId = $_GET['postId'];
    $comment = $_POST['comment'];

    if ($comment == '') {
      echo "Bình luận không được để trống";
    }
    else {
      $insertComment = 
        " INSERT INTO comment(userId, postId, comment)
          VALUES('$userId', '$postId', '$comment')";
      $runInsertComment = mysqli_query($conn, $insertComment);
      if ($runInsertComment) {
        echo "Thêm bình luận thành công";
        header('location: http://localhost:8888/php_forum/src/view/post.php?id=' .$postId);
      }
      else {
        echo "Thêm bình luận thất bại";
      }
    }
  }
?>