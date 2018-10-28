<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register Page</title>
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
      <h1>註冊帳號</h1>
      <form action="" method="POST">
        帳號：<input name="username" type="text" class="input" onKeyUp="value=value.replace(/[^\d|a-z]/g,'')" oninvalid="setCustomValidity('必須輸入');" oninput="setCustomValidity('');" required>
        <br>
        密碼：<input name="password" type="password" class="input" onKeyUp="value=value.replace(/[^\d|a-z]/g,'')" oninvalid="setCustomValidity('必須輸入');" oninput="setCustomValidity('');" required>
        <br>
        暱稱：<input name="nickname" type="text" class="input" oninvalid="setCustomValidity('必須輸入');" oninput="setCustomValidity('');" required>
        <input type="submit" value="送出" class="submit" >
        <p class="link"><a href="./login.php">已經有帳號？</a></p>
      </form>
    </div>
  </div>
</body>

</html>

<?php
require_once('./conn.php');

if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['nickname'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $nickname = $_POST['nickname'];

  // $sql__username = "SELECT * from oledu_user WHERE username=" . "'$username'";
  $sql__username = "SELECT * from oledu_user WHERE username=?";
  $stmt = $conn->prepare($sql__username);
  $stmt->bind_param('s',$username);
  $stmt->execute();
  $result = $stmt->get_result();
  $rows = $result->num_rows;
  if($rows>0){
    // header("refresh:0;url=./login.php");
    echo '<script type="text/javascript">alert("此帳號已經註冊過ㄌ\n導入登入頁面");</script>';
  }else{
    // $sql__register = "INSERT INTO oledu_user (username, nickname, password) VALUE ('$username','$nickname','$hash')";
    $sql__register = "INSERT INTO oledu_user (username, nickname, password) VALUE (?,?,?)";
    $stmt2 = $conn->prepare($sql__register);
    $stmt2->bind_param('sss',$username,$nickname,$hash);
    $stmt2->execute();
    // $conn->query($sql__register);
    header("refresh:0;url=./login.php");
    echo '<script type="text/javascript">alert("註冊成功\n請登入後使用");</script>';
  }
}
?>