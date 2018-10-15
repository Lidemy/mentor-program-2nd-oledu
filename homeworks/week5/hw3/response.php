<?php
require_once('./conn.php');

if(isset($_POST['username__response']) && isset($_POST['content__response'])){

  $username__response = $_POST['username__response'];
  $content__response = $_POST['content__response'];
  $id__response = $_POST['id'];

  $sql__response = "INSERT INTO oledu__contents (username, contents, parentid) VALUE ('$username__response', '$content__response',$id__response)";
  $result3 = $conn->query($sql__response);
  header("refresh:0;url=./guestbook.php");
}
?>