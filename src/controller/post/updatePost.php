<?php
  include('../connect.php');
  include('../userSession.php');

  $postId = $_GET['id'];

  $queryPost = "SELECT * FROM post WHERE id = '$postId'";
  $runQueryPost = mysqli_query($conn, $queryPost);
  $rowPost = mysqli_fetch_array($runQueryPost);
?>

<script src="../../../ckeditor/ckeditor.js"></script>

<h2>Sửa bài viết (id: <?php echo $rowPost['id']?>)</h2>
<form action="" method="post">
  Chuyên mục
  <select type="text" name="category">
    <?php
      $queryCategory = "SELECT * FROM category";
      $runQueryCategory = mysqli_query($conn, $queryCategory);
      if ($runQueryCategory) {
        while ($rowCategory = mysqli_fetch_array($runQueryCategory)) {
    ?>
          <option value="<?php echo $rowCategory["id"]?>">
            <?php echo $rowCategory["name"]?>
          </option>
    <?php }
      } ?>
  </select>
  
  <br>
  
  Tiêu đề
  <input type="text" name="title" value="<?php echo $rowPost['title']?>"/>
  <br>
  
  Nội dung
  <textarea id="editor1" name="content" cols="80" rows="10">
    <?php echo $rowPost['content']?>
  </textarea>
  <br>

  <input type="submit" name="updatePost" value="Sửa bài viết"/>

  <script>CKEDITOR.replace('editor1');</script> 
</form>

<?php
  if (isset($_POST['updatePost'])) {
    $categoryId = $_POST['category'];
    $title = $_POST['title'];
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
        SET categoryId = $categoryId, title = '$title', content = '$content'
        WHERE id = $postId";
      $runUpdatePost = mysqli_query($conn, $updatePost);
      if ($runUpdatePost) {
        echo "Chỉnh sửa bài viết thành công";
      }
      else {
        echo "Chỉnh sửa bài viết thất bại";
        echo "<br>";
        echo $updatePost;
      }
    }
  }
?>