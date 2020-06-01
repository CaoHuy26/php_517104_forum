<?php
  include ('../connect.php');
  include ('../userSession.php');
?>

<?php
  if (isset($_POST['addPost'])) {
    $categoryId = $_POST['category'];
    $userId = $userSession['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    
    // Encode content to html
    $content = trim($content);
    $content = stripslashes($content);
    $content = htmlspecialchars($content);

    if ($title == '' || $content == '') {
      echo "Không được để trống";
    }
    else {
      $insertPost =
        " INSERT INTO post(categoryId, userId, title, description, content)
          VALUES('$categoryId', '$userId', '$title', '$description', '$content')";
      $runInsertPost = mysqli_query($conn, $insertPost);
      if ($runInsertPost) {
        echo "Thêm bài viết thành công";
        header('location: http://localhost:8888/php_forum/src/view/');
      }
      else {
        echo "Thêm bài viết thất bại";
        echo $insertPost;
      }
    }
  }
?>