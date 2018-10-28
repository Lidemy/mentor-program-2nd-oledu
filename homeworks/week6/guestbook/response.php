<?php
require_once('./conn.php');

if(isset($_POST['response']) && isset($_POST['username'])){

  $username = $_POST['username'];
  $content = $_POST['response'];
  $parent_id = $_POST['post_id'];

  // $sql__response = "INSERT INTO oledu_post (username, content, parent_id) VALUE ('$username', '$content',$parent_id)";
  $sql__response = "INSERT INTO oledu_post (username, content, parent_id) VALUE (?,?,?)";
  $stmt = $conn->prepare($sql__response);
  $stmt->bind_param('sss',$username, $content,$parent_id);
  $stmt->execute();
  // $conn->query($sql__response);
  header("refresh:0;url=./guestbook.php");
}
?>