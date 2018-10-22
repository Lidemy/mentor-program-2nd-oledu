<?php
require_once('./conn.php');
$sql_edit = "SELECT * from oledu_post WHERE post_id = $_POST[post_id] ";
$post = $conn->query($sql_edit)->fetch_assoc();
$username = $post['username'];
$content = $post['content'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit</title>
  <style>
  
  body{
  background-color:#F6FFCA;
  }

  .leaveMessage{
    background-color: #adc698;
    border-radius: 10px;
    padding:10px;
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

  .container{
    width: 500px;
    height: 100%;
    padding: 20px;
    margin: 0 auto;
    background-color: #f7edf0;
    border-radius: 10px;
    margin-top: 200px;
  }
    
  .hidden{
    display:none;
  }

  .button{
    padding-left: 20px;
    padding-right: 20px; 
    border-radius: 5px;
    border: 0px;
    font-size: 20px;
    background-color: #F19722;
  }

  li.buttonList{
    display: inline-block;
    margin-left: 10px;
  }
  .sbutton{
    padding-left: 15px;
    padding-right: 15px;
    border-radius: 5px;
    border: 0px;
    font-size: 16px;
    background-color: #F19722;
  }

  ul{
    padding:0px;
    text-align:center;
  }

  h1{
    margin-top:0px;
  }


  </style>
  
</head>
<body>
  <div class="container">
    <h1>編輯留言</h1>
    <form action="./comfirm_edit.php" method="POST" class="leaveMessage">
      <div class="info">
        <div class="username"><?php echo htmlspecialchars($username);?></div>
      </div>
      <textarea class="textarea" name="content"><?php echo htmlspecialchars($content) ?></textarea>
      <input name= 'username' class="hidden" type="text" value=' <?php echo htmlspecialchars($username) ?> '> 
      <ul class="nav">
        <li class="buttonList"><form action="edit.php" method='POST'><input name="post_id" type="text" value = "<?php echo $post['post_id']; ?>" class='hidden'><input type="submit" value="確定" class="sbutton"></form></li>
        <li class="buttonList"><form action="delete.php" method='POST'><input type="submit" value="取消" class="sbutton"></form></li>
      </ul>
    </form>
  </div>
</body>
</html>

