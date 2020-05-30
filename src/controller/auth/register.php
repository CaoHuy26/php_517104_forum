<form method="POST">
    Tài khoản: <input type="text" name="username">
    <br>
    Mật khẩu: <input type="password" name="password">
    <br>
    Nhập lại mật khẩu: <input type="password" name="re_password">
    <br>
    <input type="submit" name="register" value="Đăng ký">
</form>

<?php
  include('../connect.php');
  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    $queryUser = "SELECT * FROM user WHERE username = '$username'";
    $runQueryUser = mysqli_query($conn, $queryUser);
    if (mysqli_num_rows($runQueryUser) > 0) {
      echo "Tài khoản $username đã tồn tại";
    }
    else {
      if ($password != $re_password) {
        echo "Mật khẩu nhập lại không đúng";
      }
      else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)) {
        echo "Tài khoản không được chứa ký tự đặc biệt";
      }
      else if (strlen($password) < 8) {
        echo "Mật khẩu phải > 8 ký tự";
      }
      else {
        $insertUser = 
          "INSERT INTO user(username, password)
          VALUES('$username', '$password')";
        $runInsertUser = mysqli_query($conn, $insertUser);
        if ($runInsertUser) {
          echo "Đăng ký thành công";
          header('location:login.php');
        }
        else {
          echo "Đăng ký thất bại";
        }
      }
    }
  }
?>