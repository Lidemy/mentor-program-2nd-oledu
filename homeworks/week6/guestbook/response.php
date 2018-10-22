<?php
require_once('./conn.php');
echo 'yyyy';

if(isset($_POST['response']) && isset($_COOKIE['username'])){

  $username = $_COOKIE['username'];
  $content = $_POST['response'];
  $parent_id = $_POST['post_id'];

  $sql__response = "INSERT INTO oledu_post (username, content, parent_id) VALUE ('$username', '$content',$parent_id)";
  $conn->query($sql__response);
  echo $sql__response;
  header("refresh:0;url=./guestbook.php");
}
?>