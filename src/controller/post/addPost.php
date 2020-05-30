<?php
  include('../userSession.php');
  include('../connect.php');
?>

<script src="../../../ckeditor/ckeditor.js"></script>

<h2>Thêm bài viết</h2>
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
  <input type="text" name="title"/>
  <br>
  
  Nội dung
  <textarea id="editor1" name="content" cols="80" rows="10">
  </textarea>
  <br>

  <input type="submit" name="addPost" value="Đăng bài"/>

  <script>CKEDITOR.replace('editor1');</script> 
</form>

<?php
  if (isset($_POST['addPost'])) {
    $categoryId = $_POST['category'];
    $userId = $userSession['id'];
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
      $insertPost =
        " INSERT INTO post(categoryId, userId, title, content)
          VALUES('$categoryId', '$userId', '$title', '$content')";
      $runInsertPost = mysqli_query($conn, $insertPost);
      if ($runInsertPost) {
        echo "Thêm bài viết thành công";
      }
      else {
        echo "Thêm bài viết thất bại";
      }
    }
  }
?>