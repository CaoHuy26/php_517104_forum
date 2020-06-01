<?php
  include ('../connect.php');
  include ('../userSession.php');
?>

<?php
  $userId = $userSession['id'];
  $postId = $_GET['postId'];
  $action = 1; # 1: Like

  $insertReaction = 
    " INSERT INTO reaction(userId, postId, action)
      VALUES($userId, $postId, $action)";
  $queryInsertReaction = mysqli_query($conn, $insertReaction);
  if ($queryInsertReaction) {
    echo "Like: " .$postId;
    header('location: http://localhost:8888/php_forum/src/view/');
  }
  else {
    echo "Lỗi";
    echo $insertReaction;
  }
?>