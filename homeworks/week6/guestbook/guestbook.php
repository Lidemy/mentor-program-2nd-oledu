<?php
require_once('./conn.php');

if(isset($_COOKIE['session'])){
  $session = $_COOKIE['session'];
  // $sql__cookie = " SELECT * FROM `oledu_user_session` WHERE session = '$session'";
  $sql__cookie = " SELECT * FROM `oledu_user_session` WHERE session = ?";
  $stmt = $conn->prepare($sql__cookie);
  $stmt->bind_param('s',$session);
  $stmt->execute();
  $result = $stmt->get_result();
  $login = false;
  if($result->num_rows>0){
    $username = $result->fetch_assoc()['username'];
    $login = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>guestbook</title>
  <style>
    *{
    }


    .block{
      margin-top:30px;
      margin-bottom:30px;
    }

    body{
    background-color:#F6FFCA;
    }

    .container{
      width: 500px;
      padding: 20px;
      margin: 0 auto;
      background-color: #f7edf0;
      border-radius: 10px;
      position:relative;
    }

    .block{
      padding:30px;
      background-color:#bbd5ed;
      border-radius:10px;
    }

    .block:hover{
      box-shadow:3px 3px 9px grey;
    }

    .topic{
      background-color: #f4eea9;
      border-radius: 10px;
      padding:10px;
    }

    .topic__self{
      background-color: #adc698;
      border-radius: 10px;
      padding:10px;

    }

    .response{
      background-color: #adc698;
      border-radius: 10px;
      padding:10px;
      margin-bottom:0px;
      margin-left:20px;
      margin-right:20px;

    }

    .self{
      font-size: 16px;
      background-color:#adc698;
      padding:10px;
      border-radius: 10px;
      margin-left:20px;
      margin-right:20px;
    }


    .info{
      display: flex;
      justify-content: space-between;
      margin:10px auto;
      font-size: 20px;
      font-weight: 900;
    }

    .time{
      margin-right: 0px;
    }

    .contents{
      margin-bottom: 20px;
      font-size: 16px;
    }

    .button{
      padding-left: 20px;
      padding-right: 20px; 
      border-radius: 5px;
      border: 0px;
      font-size: 20px;
      background-color: #F19722;
    }

    div.submit{
      text-align: center;
      margin-top: 10px;
    }

    .textarea{
      width: 100%;
      height: 100px;
      resize: none;
      box-sizing: border-box;
      border: 3px solid #cccccc;
      padding: 5px;
      outline: none;
      font-size: 16px;
    }

    
    .notself{
      font-size: 16px;
      background-color:#9d8420;
      padding:10px;
      border-radius: 10px;
      margin-left:20px;
      margin-right:20px;
    }

    .sbutton{
      padding-left: 15px;
      padding-right: 15px;
      border-radius: 5px;
      border: 0px;
      font-size: 16px;
      background-color: #F19722;
    }

    li.buttonList{
      display: inline-block;
      margin-left: 10px;
    }


    ul.nav{
      padding: 0px;
    }

    .leaveMessage{
      background-color: #adc698;
      border-radius: 10px;
      padding:10px;
    }

    .leaveMessage:hover{
      box-shadow:3px 3px 9px grey;
    }


    .unlogin{
      background-color: #e63462;
      border-radius: 10px;
      padding:1px;
      margin-bottom: 10px;
      text-align: center;
    }

    .logout{
      padding-left: 25px;
      padding-right: 25px;
      padding-top: 25px;
      padding-bottom: 25px;
      border-radius: 100%;
      border: 0px;
      font-size: 16px;
      background-color: #F19722;
      position:absolute;
      top: 300px;      
    }

    .hidden{
      display:none;
    }

    .edit{
    color:gray;
    }

    .page{
      text-align:center;
    }
  </style>
</head>
<body>
    <?php 
  if($login){
    ?>
  <div>
    <input type="button" value="<?php echo htmlspecialchars($username);?> 登出" class="logout" onclick='window.location=`./logout.php`'>
  </div>
  <?php
  }
  ?>
  <div class="container">
  <h1>留言板</h1>
  <?php 
  if($login){
    ?>
    <form action="./leaveMessage.php" method="POST" class="leaveMessage">
      <div class="info">
        <div class="username"><?php echo htmlspecialchars($username);?></div>
      </div>
      <textarea class="textarea" name="content" placeholder="請輸入留言～"></textarea>
      <input name= 'username' class="hidden" type="text" value=' <?php echo htmlspecialchars($username) ?> '> 
      <div class="submit"><input type="submit" value="留言" class="button"></div>
    </form>
    <?php
  }else{
    ?>
    <div class="unlogin">
      <h2>請<a href="./login.php">登入</a>留言</h2>
    </div>
    <?php
  }
  ?>
  
  <?php
  $sql__content = "SELECT * FROM oledu_post WHERE parent_id = 0 and is_delete = 0 ORDER BY `post_id` DESC ";
  $content = $conn->query($sql__content);
  $page = $content->num_rows;
  $per = 10;
  $pages = ceil($page/$per);
  if (!isset($_GET["page"])){
      $page=1; 
  } else {
      $page = intval($_GET["page"]); 
  }
  $start = ($page-1)*$per; 

  $sql__currentPage = $sql__content.' LIMIT '.$start.', '.$per;
  $result__currentPage = $conn->query($sql__currentPage);
  if($result__currentPage->num_rows>0){
  while($row = $result__currentPage->fetch_assoc()){
    if($username==trim($row['username'])&&$login){
  ?>
    <div class="block">
    <div class="topic__self">
      <div class="info">
        <div class="username"> <?php echo htmlspecialchars($row['username']);?> </div>
        <div class="time"> <?php echo $row['daytime']; ?> </div>
      </div>
      <div class="contents"> <?php echo htmlspecialchars($row['content']); ?> </div>
      <?php if($row['is_edited']) echo "<div class='edit' >edited</div>";?>
      <ul class="nav">
      <li class="buttonList"><form action="edit.php" method='POST'><input name="post_id" type="text" value = "<?php echo $row['post_id']; ?>" class='hidden'><input type="submit" value="編輯" class="sbutton"></form></li>
      <li class="buttonList"><form action="delete.php" method='POST'><input name="post_id" type="text" value = "<?php echo $row['post_id']; ?>" class='hidden'><input type="submit" value="刪除" class="sbutton"></form></li>
      </ul>
    </div>
    <?php
    }else{
    ?>
    <div class="block">
      <div class="topic">
        <div class="info">
          <div class="username"> <?php echo htmlspecialchars($row['username']);?> </div>
          <div class="time"> <?php echo $row['daytime']; ?> </div>
        </div>
        <div class="contents"> <?php echo htmlspecialchars($row['content']); ?> </div>
        <?php if($row['is_edited']) echo "<div class='edit' >edited</div>";?>
      </div>  
    <?php
    }
    $sql__response = "SELECT * FROM oledu_post WHERE parent_id = $row[post_id] and is_delete = 0 ORDER BY `post_id` DESC";
    $response = $conn->query($sql__response);
    if($response->num_rows>0){
    while($row2 = $response->fetch_assoc()){
      if($username==trim($row2['username'])&&$login){
    ?>
        <div class="self">
          <div class="info">
            <div class="username"><?php echo htmlspecialchars($row2['username']);?></div>
            <div class="time"><?php echo $row2['daytime'];?></div>
          </div>
          <div class="contents"><?php echo htmlspecialchars($row2['content']); ?></div>
          <?php if($row2['is_edited']) echo "<div class='edit' >edited</div>";?>

          <ul class="nav">
            <li class="buttonList"><form action="edit.php" method='POST'><input name="post_id" type="text" value = "<?php echo $row2['post_id']; ?>" class='hidden'><input type="submit" value="編輯" class="sbutton"></form></li>
            <li class="buttonList"><form action="delete.php" method='POST'><input name="post_id" type="text" value = "<?php echo $row2['post_id']; ?>" class='hidden'><input type="submit" value="刪除" class="sbutton"></form></li>
          </ul>
        </div>
        <?php
      }else{
        ?>
        <div class="notself">
          <div class="info">
            <div class="username"><?php echo htmlspecialchars($row2['username']);?></div>
            <div class="time"><?php echo $row2['daytime'];?></div>
          </div>
          <div class="contents"><?php echo htmlspecialchars($row2['content']); ?></div>
          <?php if($row2['is_edited']) echo "<div class='edit' >edited</div>";?>

        </div>
        <?php
      }
    ?>
    <?php
    }
  }
    if($login){
    ?>
    <form action="./response.php" method="POST" class="response">
      <div class="info">
        <div class="username"><?php echo htmlspecialchars($username); ?></div>
      </div>
      <div class='hidden'><input name='username' type="text" value='<?php echo $username; ?>'></div>
      <div class='hidden'><input name='post_id' type="text" value='<?php echo $row['post_id']; ?>'></div>
      <textarea class="textarea" name="response" placeholder="請輸入回覆～"></textarea>
      <div class="submit"><input type="submit" value="回覆" class="button"></div>
    </form>
    <?php
    }

    ?>
    </div>
    <?php
  }
}
  ?>
  <div class='page'>
  <?php
  for( $i=1 ; $i<=$pages ; $i++ ) {
    if ( $page-3 < $i && $i < $page+3 ) {
      echo "<a href=?page=".$i.">".$i."</a> ";
    }
  } 
  ?>
  </div>
  
</div>



</body>
</html>