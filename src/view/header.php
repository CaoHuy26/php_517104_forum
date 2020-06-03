<?php
  include ('../controller/connect.php');
  include ('../controller/userSession.php');
?>

<style>
  .avatar-user {
    border-radius: 50%; 
    background-color: #d3d9dc;
    width: 25px;
    height: 25px;
    text-align: center;
    padding-top: 3px;
  }
</style>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
<link rel="stylesheet" href="../public/css/bootstrap.min.css">


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand ml-2" href="http://localhost:8888/php_forum/src/view/">Forum</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost:8888/php_forum/src/view/">Trang chủ</a>
      </li>
      <?php
        if ($userSession['username'] != '') {
          echo '
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8888/php_forum/src/view/addPost.php">Thêm bài viết</a>
            </li>
          ';
        }
        if ($userSession['username'] == 'admin' || $userSession['role'] == 1) {
          echo '
            <li class="nav-item">
              <a class="nav-link" href="#">Quản lý bài viết</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Quản lý người dùng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Thống kê trang</a>
            </li>
          ';
        }
      ?>
    </ul>
    
    <?php
      if ($userSession['username'] == '') {
        echo '
          <a href="http://localhost:8888/php_forum/src/view/login.php" class="btn my-2 my-sm-0">Đăng nhập</a>
          <a href="http://localhost:8888/php_forum/src/view/register.php" class="btn btn-outline-info my-2 my-sm-0">Đăng ký</a>
        ';
      }
      else {
        echo '
          <div class="avatar-user mr-2">
            <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
          </div>
        ';
        echo '<p class="my-2 my-sm-0 mr-4">' .$userSession['username']. '</p>';
        echo '<a href="http://localhost:8888/php_forum/src/controller/auth/logout.php" class="btn btn-outline-info my-2 my-sm-0">Đăng xuất</a>';
      }
    ?>
  
  </div>
</nav>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

<script type="text/javascript" src="../public/js/jquery-3.5.1.min.js"> </script>
<script type="text/javascript" src="../public/js/bootstrap.min.js"> </script>