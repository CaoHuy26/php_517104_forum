<?php
  include ('../controller/connect.php');
  include ('../controller/userSession.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Forum</a>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost:8888/php_forum/src/view/">Trang chủ</a>
        </li>
        <?php
          if ($userSession['username'] == 'admin') {
            echo '
              <li class="nav-item">
                <a class="nav-link" href="#">Thêm bài viết</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
            ';
          }
        ?>
      </ul>
      
      <?php
        if ($userSession['username'] == '') {
          echo '
            <a href="http://localhost:8888/php_forum/src/controller/auth/login.php" class="btn my-2 my-sm-0">Đăng nhập</a>
            <a href="http://localhost:8888/php_forum/src/controller/auth/register.php" class="btn btn-outline-success my-2 my-sm-0">Đăng ký</a>
          ';
        }
        else {
          echo '<p class="my-2 my-sm-0 mr-4">Hello ' .$userSession['username']. '</p>';
          echo '<a href="http://localhost:8888/php_forum/src/controller/auth/logout.php" class="btn btn-outline-success my-2 my-sm-0">Đăng xuất</a>';
        }
      ?>
      
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>