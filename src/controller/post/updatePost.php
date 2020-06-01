<?php
  include ('../connect.php');
?>

<?php
  if (isset($_POST['updatePost'])) {
    $postId = $_GET['id'];
    $categoryId = $_POST['category'];
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
      $updatePost = 
      " UPDATE post 
        SET categoryId = $categoryId, description = '$description', title = '$title', content = '$content'
        WHERE id = $postId";
      $runUpdatePost = mysqli_query($conn, $updatePost);
      if ($runUpdatePost) {
        echo "Chỉnh sửa bài viết thành công";
        header('location: http://localhost:8888/php_forum/src/view/post.php?id=' .$postId);
      }
      else {
        echo "Chỉnh sửa bài viết thất bại";
        echo "<br>";
        echo $updatePost;
      }
    }
  }
?>