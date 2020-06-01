<?php
  session_start();
?>

<?php
  include('../connect.php');
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' || $password == '') {
      echo "Không được để trống";
    }
    else {
      $queryUser = "SELECT * FROM user WHERE username = '$username'";
      $runQueryUser = mysqli_query($conn, $queryUser);
      if (mysqli_num_rows($runQueryUser) <= 0) {
        echo "Tài khoản $username không tồn tại";
      }
      else {
        $rowUser = mysqli_fetch_array($runQueryUser);
        if ($rowUser['password'] == $password) {
          $_SESSION['username'] = $username;
          header('location: http://localhost:8888/php_forum/src/view/index.php');
        }
        else {
          echo "Sai mật khẩu";
        }
      }
    }
  }
?>