<?php     
  require_once('./conn.php');

  // class Db {
  //   public function __construct($sql){
  //     $this->sql = $sql;  
  //     $this->conn = new mysqli('166.62.28.131', 'student2nd', 'mentorstudent123', 'mentor_program_db');
  //     $this->$conn->query("SET NAMES 'UTF8'"); 
  //     $this->result = $this->conn->query($this->sql);
  //   }
  // }
    
  if(isset($_COOKIE["username"])){
    $username__cookie = $_COOKIE['username'];
    $sql__cookie =  "SELECT nickname from oledu__users WHERE username = '". $username__cookie."'";
    // $cookie = new Db($sql__cookie);
    $cookie = $conn->query($sql__cookie);
    $cookie__result = $cookie;
    $nickname = $cookie__result->fetch_assoc()['nickname'];
    echo $nickname;
  }
?>


<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body {
      margin: 0px;
    }
    
    .container {
      width:500px;
      margin :50px auto;
    }
    
    .container__leaveMessage{
      background-color: green;
    }
    
    .container__showMessage{
      background-color: red;
      margin-top:60px;
    }
    
    .response{
      background-color: green;
    }
    </style>
</head>

<body>
</body>

</html>


<?php

$sql__contents = "SELECT * FROM oledu__contents WHERE parentid = 0 ORDER BY `oledu__contents`.`daytime` DESC ";
$contents__result = $conn->query($sql__contents);
$page__result = $contents__result->num_rows;


$per = 10;
$pages = ceil($page__result/$per);

if (!isset($_GET["page"])){
    $page=1; 
} else {
    $page = intval($_GET["page"]); 
}
$start = ($page-1)*$per; 

$sql__final = $sql__contents.' LIMIT '.$start.', '.$per;
$final__result = $conn->query($sql__final);

if(isset($_COOKIE['username'])){
  echo "<input type='submit' value='登出' onclick='window.location=`./logout.php`'>";
  echo "<div class='container'>";
  echo "<div class='container__leaveMessage'>";
  echo '<form action="./leaveMessage.php" method="POST">';
  echo '<p class="guestbook__content">暱稱：'.$nickname.'</p>';
  echo '<input type="text" style="display:none" name = "username" value='.$nickname.'>';
  echo '<textarea rows="4" cols="60" name="content" class="guestbook__content" placeholder="請留言"></textarea>';
  echo '<input type="submit" value="send" class="guestbook__submit">';
  echo "</form>";
  echo "</div>";
}else{
  echo "<div class='container'>";
  echo '<h1>請<a href="./login.php">登入</a>留言</h1>';
}


if($final__result->num_rows>0){
  while($row=$final__result->fetch_assoc()){
    echo "<div class='container__showMessage'>";
    echo "#".$row['id']."  ".$row['username']."<br>";
    echo $row['daytime']."<br>";
    echo '<h2>'.$row['contents'].'</h2>';
    if(isset($_COOKIE['username'])){
      echo '<form action="./response.php" method="POST">';
      echo '<p class="guestbook__content">暱稱：'.$nickname.'</p>';
      echo '<input type="text" style="display:none" name = "username__response" value='.$nickname.'>';
      echo '<input type="text" style="display:none" name = "id" value='.$row['id'].'>';
      echo '<textarea rows="4" cols="60" name="content__response" class="guestbook__content" placeholder="請留言"></textarea>';
      echo '<input type="submit" value="send" class="guestbook__submit">';
      echo '</form>';

    }else{
      echo '<h1>請<a href="./login.php">登入</a>留言</h1>';
    }


    $sql__response = "SELECT * FROM oledu__contents WHERE parentid ="  . $row['id'] . " ORDER BY `oledu__contents`.`daytime` DESC";
    $response__result = $conn->query($sql__response);      

    if($response__result->num_rows>0){
      while($row2 = $response__result->fetch_assoc()){
        echo "<div class='response'>";
        echo $row2['username'].'  '.$row2['daytime'].'<br>';
        echo "<h2>".$row2['contents']."</h2>".'<br>';
        echo "</div>";
      }
    }
    echo"</div>";
}

    for( $i=1 ; $i<=$pages ; $i++ ) {
      if ( $page-3 < $i && $i < $page+3 ) {
          echo "<a href=?page=".$i.">".$i."</a> ";
      }
  } 

}
?>

