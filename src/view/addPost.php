<?php
  include ('./header.php');
?>

<script src="../../ckeditor/ckeditor.js"></script>

<div class="container mt-4">
  <h3>Thêm bài viết mới</h3>
  
  <form action="http://localhost:8888/php_forum/src/controller/post/addPost.php" method="post">
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
      <input class="col-6" type="text" name="title"/>
    </div>
  
    <br>

    <div class="row">
      <span class="col-2">Mô tả</span>
      <input class="col-6" type="text" name="description"/>
    </div>
  
    <br>
  
    <div class="row">
      <span class="col-2">Nội dung</span>
      <textarea class="col-6" id="editor1" name="content" cols="80" rows="10">
      </textarea>
    </div>
    <br>

    <div class="text-center" style="display:flex">
      <input class="btn btn-info" type="submit" name="addPost" value="Đăng bài"/>
    </div> 

    <script>CKEDITOR.replace('editor1');</script> 
  </form>
</div>