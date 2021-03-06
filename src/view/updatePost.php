<?php 
  include('./header.php');
?>

<?php
  $postId = $_GET['id'];

  $queryPost = "SELECT * FROM post WHERE id = '$postId'";
  $runQueryPost = mysqli_query($conn, $queryPost);
  $rowPost = mysqli_fetch_array($runQueryPost);
?>

<script src="../../ckeditor/ckeditor.js"></script>

<div class="container mt-4">
  <h3>Sửa bài viết (<?php echo $rowPost['id']?>)</h3>
  
  <form action="http://localhost:8888/php_forum/src/controller/post/updatePost.php?id=<?php echo $rowPost['id']?>" method="post">
    <div class="row">
      <span class="col-2">Chuyên mục<span>
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
    </div>
    <br>
    
    <div class="row">
      <span class="col-2">Tiêu đề</span>
      <input class="col-6" type="text" name="title" value="<?php echo $rowPost['title']?>"/>
    </div>
    
    <br>

    <div class="row">
      <span class="col-2">Mô tả</span>
      <input class="col-6" type="text" name="description" value="<?php echo $rowPost['description']?>"/>
    </div>
    
    <br>
    
    <div class="row">
      <span class="col-2">Nội dung</span>
      <textarea class="col-6" id="editor2" name="content" cols="80" rows="10">
        <?php echo $rowPost['content']?>
      </textarea>
    </div>
    <br>

    <div class="text-center" style="display:flex">
      <input class="btn btn-info" type="submit" name="updatePost" value="Sửa bài viết"/>
    </div> 

    <script>CKEDITOR.replace('editor2');</script> 
  </form>
</div>