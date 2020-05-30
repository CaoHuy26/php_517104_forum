<?php 
  include('./header.php');
?>

<div class="m-4">
  <div class="row">
    <div class="col-9">
      <?php
        include ('../controller/post/viewPosts.php');
        while ($rowPost = mysqli_fetch_array($runQueryPost)) {
      ?>
        <h4><?php echo $rowPost['title']?></h4>
        <hr>
        <p><?php echo htmlspecialchars_decode($rowPost['content'])?></p>
        <h5><span class="glyphicon glyphicon-time"></span> Post by <?php echo $rowPost['username']?>, Sep 27, 2015.</h5>
      <?php } ?>
    </div>

    <div class="col-3"> 
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Tìm kiếm">
      </div>
      <p>Danh mục</p>
      <?php
        include ('../controller/post/viewCategories.php');
        while ($rowCategory = mysqli_fetch_array($runQueryCategory)) {
      ?>
        <p> <?php echo $rowCategory['name'] ?></p>
      <?php } ?>
    </div>
  </div>
</div>