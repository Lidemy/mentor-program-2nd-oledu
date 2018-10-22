<?php
require_once('./conn.php');
$username = $_POST['username'];
$content = $_POST['content'];

$sql__leaveMessage = "INSERT INTO oledu_post (username, content) VALUE ('$username', '$content')";
$conn->query($sql__leaveMessage);
echo $sql__leaveMessage;
header("refresh:0;url=./guestbook.php");
?>