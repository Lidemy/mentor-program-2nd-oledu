<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
  </head>
  <body>
    <div class="container">
      <h1>註冊</h1>
      <div class="form">
        <form action="./register.php" method="POST" >
        <input type="text" placeholder="帳號" name="username">
        <br>
        <input type="password" placeholder="密碼" name="password" >
        <br>
        <input type="text" placeholder="暱稱" name="nickname" >
        <br>
        <input type="submit" value="提交"> 
      </form>
      <h1>已經有帳號直接<a href="./login.php">登入</a></h1>
    </div>
  </div>
  
</body>

</html>

<?php
  require_once('./conn.php');

  if(isset($_POST['username'])&&isset($_POST['password'])){

    $username__register = $_POST['username'];
    $password__register = $_POST['password'];
    $nickname__register = $_POST['nickname'];

    $sql__username = "SELECT * from oledu__users WHERE username=" . "'$username__register'";

    if($conn->query($sql__username)->num_rows>0){
        header("refresh:0;url=./login.php");
        echo '<script type="text/javascript">alert("此帳號已經註冊過ㄌ\n導入登入頁面");</script>';
    }else{
      $sql__register = "INSERT INTO oledu__users (username, password_hash, nickname) VALUE ('$username__register', '$password__register','$nickname__register ')";
      $conn->query($sql__register);
      header("refresh:0;url=./login.php");
      echo '<script type="text/javascript">alert("請登入後使用\n導入登入頁面");</script>';
    }
  }
?>