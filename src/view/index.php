<?php
  include ('../controller/connect.php');
?>

<?php
  include ('./header.php');
?>

<style>
  a {
    text-decoration: none;
    color: black;
  }
</style>

<div class="container mt-4">
  <div class="row">

    <!-- POST -->
    <div class="col-9">
      <?php
        $categoryId = $_GET['category'];
        if (empty($categoryId)) {
          include ('../controller/post/viewPosts.php');
          while ($rowPost = mysqli_fetch_array($runQueryPost)) {
            include ('./components/Post.php');
          }
        }
        else {
          $queryPostByCategory = 
            " SELECT * FROM post
              INNER JOIN category ON post.categoryId = category.id
              INNER JOIN user ON post.userId = user.id
              WHERE categoryId = $categoryId
              ORDER BY post.createdAt DESC
            ";
          $runQueryPostByCategory = mysqli_query($conn, $queryPostByCategory);
          while ($rowPost = mysqli_fetch_array($runQueryPostByCategory)) {
            include ('./components/Post.php');
          }
        }
      ?>
    </div>

    <!-- CATEGORY -->
    <div class="col-3"> 
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Tìm kiếm">
      </div>
      <p class="text-secondary mt-3">Danh mục</p>
      <?php
        include ('../controller/post/viewCategories.php');
        while ($rowCategory = mysqli_fetch_array($runQueryCategory)) {
      ?>
        <div class="mt-2">
          <a href="http://localhost:8888/php_forum/src/view?category=<?php echo $rowCategory['id']?>" class="btn badge badge-info" style="font-size: 14">
            <?php echo $rowCategory['name']?>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>