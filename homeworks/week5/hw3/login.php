
<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login</title>
    </head>
    <body>
      <div class="container">
        <h1>登入</h1>
        <div class="form">
          <form action="./login.php" method="POST" >
          <input type="text" placeholder="帳號" name="username">
          <br>
          <input type="password" placeholder="密碼" name="password">
          <br>
          <input type="submit" value="提交"> 
        </form>
        <h1>還沒有帳號先<a href="./register.php">註冊</a></h1>
      </div>
    </div>
    
  </body>
  
  </html>


  <?php
    require_once('./conn.php');

    class Db {
      public function __construct($sql){
        $this->sql = $sql;  
        $this->conn = new mysqli('166.62.28.131', 'student2nd', 'mentorstudent123', 'mentor_program_db');
        $this->result = $this->conn->query($this->sql);
      }
    }

    if(isset($_POST['username'])&&isset($_POST['password'])){
      $username__login = $_POST['username'];
      $password__login = $_POST['password'];

      $sql__username = "SELECT * from oledu__users WHERE username = ". "'$username__login'";
      $sql__password = "SELECT * from oledu__users WHERE username = " . "'$username__login'" . " and " . "password =" ."'$password__login'";      
      
      $result__username = new Db($sql__username);
      $result__password = new Db($sql__password);

      if($result__username->result->num_rows>0){
        if($result__password->result->num_rows>0){
          setcookie("username", $username__login, time()+3600*24);
          header("refresh:0;url=./guestbook.php");          
          echo '<script type="text/javascript">alert("登入成功\n即將進入留言板");</script>';
        }else{
          header("refresh:0;url=./login.php");
          echo '<script type="text/javascript">alert("密碼錯誤 重新登入");</script>';
        }
      }else{
        header("refresh:0;url=./register.php");
        echo '<script type="text/javascript">alert("查無帳號 先註冊\n導入註冊頁面");</script>';  
      }
    }
  ?>