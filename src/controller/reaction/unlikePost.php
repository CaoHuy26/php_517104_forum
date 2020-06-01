<?php
  include ('../connect.php');
  include ('../userSession.php');
?>

<?php
  $userId = $userSession['id'];
  $postId = $_GET['postId'];

  $deleteReaction = "DELETE FROM reaction WHERE userId = $userId AND postId = $postId";
  $queryDeleteReaction = mysqli_query($conn, $deleteReaction);
  if ($queryDeleteReaction) {
    echo "Unlike: " .$postId;
    header('location: http://localhost:8888/php_forum/src/view/');
  }
  else {
    echo "Lỗi";
    echo $deleteReaction;
  }
?>