<?php
require_once('./conn.php');

if(isset($_POST['username']) && isset($_POST['content'])){
  $username__leaveMessage = $_POST['username'];
  $content__leaveMessage = $_POST['content'];
  
  $sql__leaveMessage = "INSERT INTO contents (username, contents) VALUE ('$username__leaveMessage', '$content__leaveMessage')";
  $result2 = $conn->query($sql__leaveMessage);
  header("refresh:0;url=./guestbook.php");
}

?>