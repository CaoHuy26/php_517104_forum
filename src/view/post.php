<?php
  include ('./header.php');
?>

<?php
  include ('../controller/connect.php');
  include ('../controller/userSession.php');

  $postId = $_GET['id'];

  $queryPost = "SELECT * FROM post WHERE id = '$postId'";
  $runQueryPost = mysqli_query($conn, $queryPost);
  $rowPost = mysqli_fetch_array($runQueryPost);
  if ($runQueryPost) {
?>
<div class="container mt-4">
  <!-- POST -->
  <div style="display: flex">
    <div>
      <h3>
        <?php echo $rowPost['title']?>
      </h3>
    </div>
    <div class="ml-4 mt-1">
      <?php
        if ($rowPost['userId'] == $userSession['id'] || $userSession['username'] == 'admin') {
          echo '
            <div>
              <a class="mr-3"
                href="http://localhost:8888/php_forum/src/view/updatePost.php?id=' .$rowPost[0]. '"
              >
                <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                </svg>
              </a>
              <a
                id="delete-post"
                href="http://localhost:8888/php_forum/src/controller/post/deletePost.php?id=' .$rowPost[0]. '"
              >
                <svg color="red" class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </a>
            </div>
          ';
        }
      ?>
    </div>
  </div>
  <!-- Content -->
  <?php echo htmlspecialchars_decode($rowPost['content'])?> 
  <!-- END POST -->

  <!-- Comment -->
  <?php
    if ($userSession['username'] == '') {
      echo '<p>Đăng nhập để bình luận</p>';
    }

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
      <div>
        <p>User: <?php echo $rowComment['username']?></p>
        <p>Comment: <?php echo $rowComment['comment']?></p>
      </div>
    <?php } ?>
  
</div>

<?php } ?> 