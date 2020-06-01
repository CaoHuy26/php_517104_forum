<?php
  include ('../controller/connect.php');
?>

<?php
  include ('./header.php');
?>

<style>
  a {
    text-decoration: none
  }
</style>

<div class="container mt-4">
  <div class="row">

    <!-- POST -->
    <div class="col-9">
      <?php
        include ('../controller/post/viewPosts.php');
        while ($rowPost = mysqli_fetch_array($runQueryPost)) {
      ?>
        <div class="pt-3 pl-3 pr-3 mb-3" style="background-color: #f7f7f7">
          <div>
            <div>
              <div>
                <h5>
                  <!-- $rowPost[0]: postId -->
                  <a style="color: black" href="http://localhost:8888/php_forum/src/view/post.php?id=<?php echo $rowPost[0]?>">
                    <?php echo $rowPost['title']?>
                  </a>
                </h5>
                
                <div style="display: flex; justify-content: space-between;">
                  <!-- Category Badge -->
                  <a href="#" class="btn badge badge-info" style="font-size: 11; padding-top: 5px;">
                    <?php echo $rowPost['name']?>
                  </a>
                  <!-- Edit & Delete -->
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
            </div>

            <hr>
            <!-- Description -->
            <p>
              <?php echo $rowPost['description']?>
            </p>
            
            <div style="display: flex">
              <svg color="rgb(120, 124, 126)" class="bi bi-person-fill mr-1 mt-1" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
              <!-- Caculate time -->
              <?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $currentTime = date("Y-m-d H:i:s");
                $currentTime = strtotime($currentTime);
                # Upload time
                $uploadTime = $rowPost[7];
                $uploadTime = strtotime($uploadTime);
                # Caculate time
                $diff = abs($currentTime - $uploadTime);
                $years = floor($diff / (365 * 60 * 60 * 24));  
                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));  
                $days = floor(($diff - $years * 365 * 60 * 60 *24 - $months * 30 * 60 * 60 * 24)/ (60 * 60 * 24)); 
              ?>
              <p class="mt-1" style="color: rgb(120, 124, 126); font-size: 12">
                <?php echo $rowPost['username']?>,
                <span style="font-size: 11">
                  <?php
                    if ($days >= 1) {
                      echo $days. ' Ngày trước';
                    }
                    else {
                      echo "Hôm nay";
                    }
                  ?>
                </span>
              </p>
            </div>

            <!-- Comment -->
            <div style="display: flex">
              <svg class="bi bi-chat" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
              </svg>
              <!-- Count Comment of post -->
              <?php
                $queryNumberOfComment = "SELECT COUNT(*) AS numberOfComment FROM comment WHERE postId = $rowPost[0]";
                $runQueryNumberOfComment = mysqli_query($conn, $queryNumberOfComment);
                $countComment = mysqli_fetch_assoc($runQueryNumberOfComment);
              ?>
              <p class="ml-2" style="font-size: 12px">
                <?php echo $countComment['numberOfComment'];?> Bình luận
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
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
          <a href="http://localhost:8888/php_forum/src/view/index.php?category=<?php echo $rowCategory['id']?>" class="btn badge badge-info" style="font-size: 14">
            <?php echo $rowCategory['name']?>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>