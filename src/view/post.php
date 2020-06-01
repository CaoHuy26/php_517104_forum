<?php
  include ('./header.php');
?>

<?php
  include ('../controller/connect.php');
  include ('../controller/userSession.php');

  $postId = $_GET['id'];

  $queryPost = 
    " SELECT * FROM post
      INNER JOIN category ON post.categoryId = category.id
      INNER JOIN user ON post.userId = user.id
      WHERE post.id = $postId;
    ";
  $runQueryPost = mysqli_query($conn, $queryPost);
  $rowPost = mysqli_fetch_array($runQueryPost);
  if ($runQueryPost) {
?>

<div class="container mt-4">
  <div class="row">
    
    <!-- POST -->
    <div class="col-9">
       <!-- Category -->
      <a href="#" class="btn badge badge-info" style="font-size: 11">
        <?php echo $rowPost['name']?>
      </a>
      <!-- Title -->
      <div style="display: flex">
        <div class="mt-2">
          <h3>
            <?php echo $rowPost['title']?>
          </h3>
        </div>
        <div class="ml-4 mt-2">
          <?php
            include ('./components/PostAction.php'); # Action
          ?>
        </div>
      </div>
      <!-- Description -->
      <?php echo $rowPost['description']?>
      <!-- Creator & Time -->
      <div style="display: flex">
        <svg color="rgb(120, 124, 126)" class="bi bi-person-fill mr-1 mt-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
        <p class="mt-1" style="color: rgb(120, 124, 126); font-size: 12">
          <?php echo $rowPost['username']?>,
          <span style="font-size: 11">
            <?php echo $rowPost[7]?>
          </span>
        </p>
      </div>
      
      <!-- Content -->
      <?php echo htmlspecialchars_decode($rowPost['content'])?> 
      <!-- END POST -->

      <!-- Comment -->
      <div class="m-4" style="text-align: center">
        <?php
          if ($userSession['username'] == '') {
            echo '
              <a
                href="http://localhost:8888/php_forum/src/controller/auth/login.php"
                class="btn btn-info text-white"
              >
                Đăng nhập để bình luận
              </a>
            ';
          }
          else {
            echo '
            <form method="POST" action="http://localhost:8888/php_forum/src/controller/comment/addComment.php?postId='.$postId.'" >
              <div class="input-group mb-3">
                <input type="text" name="comment" class="form-control shadow-none" placeholder="Viết bình luận..." aria-describedby="button-addon2" />
                <div class="input-group-append">
                  <input type="submit" name="addComment" value="Bình luận" class="btn btn-outline-info shadow-none" id="button-addon2" />
                </div>
              </div>
            </form>
            ';
          }
        ?>
      </div>
      <!-- Load comment -->
      <?php
        $queryComment = 
          "SELECT * 
          FROM comment
          INNER JOIN user
          ON comment.userId = user.id
          WHERE postId = $postId
          ";
        $runQueryComment = mysqli_query($conn, $queryComment);
        while ($rowComment = mysqli_fetch_array($runQueryComment)) {
      ?>  
          <div class="mt-3" style="display: flex">
            <div class="avatar-user mr-2">
              <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            </div>
            <div class="ml-2" style="flex: 1">
              <span style="color: #177fd2"><?php echo $rowComment['username']?></span>
              <div style="display: flex; flex-direction: row">
                <p class="mt-2"><?php echo $rowComment['comment']?></p>
                <!-- Delete Comment Button -->
                <?php
                  # Admin hoặc chủ bình luận mới có quyền xoá bình luận
                  if ($userSession['username'] == 'admin' || $userSession['role'] == 1 || $rowComment['userId'] == $userSession['id']) {
                    # $rowComment[0]: commentId
                    echo '
                    <a href="http://localhost:8888/php_forum/src/controller/comment/deleteComment.php?id=' .$rowComment[0]. '">
                      <svg style="margin-top: 14" color="red" class="bi bi-backspace ml-2" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6.603 2h7.08a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-7.08a1 1 0 0 1-.76-.35L1 8l4.844-5.65A1 1 0 0 1 6.603 2zm7.08-1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08z"/>
                        <path fill-rule="evenodd" d="M5.83 5.146a.5.5 0 0 0 0 .708l5 5a.5.5 0 0 0 .707-.708l-5-5a.5.5 0 0 0-.708 0z"/>
                        <path fill-rule="evenodd" d="M11.537 5.146a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708-.708l5-5a.5.5 0 0 1 .707 0z"/>
                      </svg>
                    </a>
                    ';
                  }
                ?>
              </div>
              <span style="color: rgb(120, 124, 126); font-size: 11">
                <!-- rowComment[4]: Time comment -->
                <?php echo $rowComment[4]?>
              </span>
              <hr>
            </div>
          </div>
        <?php } ?>

    </div>

    <!-- TODO: Change to rank -->
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
          <a href="#" class="btn badge badge-info" style="font-size: 14">
            <?php echo $rowCategory['name']?>
          </a>
        </div>
      <?php } ?>
    </div>

  </div>
</div>

<?php } ?> 