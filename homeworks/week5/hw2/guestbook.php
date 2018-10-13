<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- <link rel="stylesheet" href="./guestbook.css"> -->
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
    background-color: yellow;
  }
  </style>
</head>


<body>
  <div class="container">
    <div class="container__leaveMessage">
      <form action="./leavaMessage.php" method="POST">
        <p class="guestbook__content">暱稱：<input type="name" name="username"></p>
        <textarea rows="4" cols="60" name="content" class="guestbook__content" placeholder="請留言"></textarea>
        <input type="submit" value="send" class="guestbook__submit">
      </form>
  </div>
</body>

</html>


<?php

if($_SESSION['username'] == null){
  echo 'aaadskc kdsn jdnvnviwenirenviernviuernviueraaaaaa';
}


require_once('./conn.php');

class Db {
  public function __construct($sql){
    $this->sql = $sql;  
    $this->conn = new mysqli('localhost', 'root', '', 'mentor');
    $this->result = $this->conn->query($this->sql);
  }
}

$sql__contents = "SELECT * FROM contents WHERE parentid = 0 ORDER BY `contents`.`daytime` DESC ";
$contents = new Db($sql__contents);
$contents__result = $contents->result;
$page__result = $contents__result->num_rows;


$per = 10;
$pages = ceil($page__result/$per);

if (!isset($_GET["page"])){
    $page=1; 
} else {
    $page = intval($_GET["page"]); 
}
$start = ($page-1)*$per; //每一頁開始的資料序號

$final__sql = $sql__contents.' LIMIT '.$start.', '.$per;
$final = new Db($final__sql);
$final__result = $final->result;




if($final__result->num_rows>0){
  while($row=$final__result->fetch_assoc()){
      echo "<div class='container__showMessage'>";
      echo "#".$row['id']."  ".$row['username']."<br>";
      echo $row['daytime']."<br>";
      echo '<h2>'.$row['contents'].'</h2>';
      echo '<form action="./response.php" method="POST">';
      echo '<p class="guestbook__content">暱稱：<input type="name" name="username__response"></p>';
      echo '<input type="text" style="display:none" name = "id" value='.$row['id'].'>';
      echo '<textarea rows="4" cols="60" name="content__response" class="guestbook__content" placeholder="請留言"></textarea>';
      echo '<input type="submit" value="send" class="guestbook__submit">';
      echo '</form>';
      
      $sql__response = "SELECT * FROM contents WHERE parentid ="  . $row['id'] . " ORDER BY `contents`.`daytime` DESC";
      $response = new Db($sql__response);
      $response__result = $response->result;
      

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