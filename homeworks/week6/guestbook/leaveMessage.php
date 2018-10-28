<?php
require_once('./conn.php');
$username = $_POST['username'];
$content = $_POST['content'];

// $sql__leaveMessage = "INSERT INTO oledu_post (username, content) VALUE ('$username', '$content')";
$sql__leaveMessage = "INSERT INTO oledu_post (username, content) VALUE (?,?)";
$stmt = $conn->prepare($sql__leaveMessage);
$stmt->bind_param('ss',$username, $content);
$stmt->execute();
// $conn->query($sql__leaveMessage);
header("refresh:0;url=./guestbook.php");
?>