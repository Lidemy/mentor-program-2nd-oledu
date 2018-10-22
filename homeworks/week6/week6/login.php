<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Page</title>
  <style>
    * {
      font-family: "微軟正黑體";
    }

    body{
      background-color:#F6FFCA;
    }

    .contour {
    height: 500px;
    width: 600px;
    margin: 0 auto;
    }

    .container {
    width:500px;
    margin: 0 auto;
    margin-top: 50px;
    background-color: #adc698;
    border-radius: 10px;
    padding-top: 20px;
    transition: ease-in-out 0.3s;
    }

    .container:hover{
      box-shadow:3px 3px 9px grey;
    }

    h1{
      text-align: center;
    }

    form{
      margin-top: 40px;
      width:180px;
      margin: 50px auto;
      padding-bottom: 30px;
    }

    .input{
      margin-top: 30px;
      border-top: 0px;
      border-right: 0px;
      border-left: 0px;
      border-bottom: solid 2px #93DFCB;
    }

    .submit{
      margin:30px 60px;
      padding-left: 20px;
      padding-right: 20px;
      border-radius: 5px;
      border: 0px;
      font-size: 20px;
      background-color: #F19722;
    }

    .link{
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="contour">
    <div class="container">
      <h1>登入留言板</h1>
      <form action="./login.php" method="POST">
        帳號：<input name="username" type="text" class="input" onKeyUp="value=value.replace(/[^\d|a-z]/g,'')" oninvalid="setCustomValidity('必須輸入');" oninput="setCustomValidity('');" required>
        <br>
        密碼：<input name="password" type="password" class="input" onKeyUp="value=value.replace(/[^\d|a-z]/g,'')" oninvalid="setCustomValidity('必須輸入');" oninput="setCustomValidity('');" required>
        <input type="submit" value="送出" class="submit">
        <p class="link"><a href="./register.php">還沒註冊？</a></p>
        <p class="link"><a href="./guestbook.php">不登入直接進入</a></p>
      </form>
    </div>

  </div>
</body>

</html>

<?php
require_once('./conn.php');

if(isset($_POST['username'])&&isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql_password = "SELECT password from oledu_user WHERE username = " . "'$username'";
  $result = $conn->query($sql_password);

  $hash = $conn->query($sql_password)->fetch_assoc()['password'];

  if($result->num_rows>0){
    if(password_verify($password, $hash)){
      $session = session_id();
      // $sql__session = "UPDATE `user_session` SET `session`= '$session' WHERE username = '$username'";
      setcookie("session", $session,  time()+3600*24);    
      setcookie("username", $username,  time()+3600*24);    
      // $conn->query($sql__session);
      $sql__session = "INSERT INTO oledu_user_session (username,session) VALUE ('$username','$session')";
      $conn->query($sql__session);

      header("refresh:0;url=./guestbook.php");          
      echo '<script type="text/javascript">alert("登入成功\n即將進入留言板");</script>';
    }else{
      header("refresh:0;url=./login.php");          
      echo '<script type="text/javascript">alert("帳號｜密碼錯誤 重新登入");</script>';
    }
  }
}
?>
