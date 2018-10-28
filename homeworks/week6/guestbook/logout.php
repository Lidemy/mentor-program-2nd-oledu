<?php 
require_once('./conn.php');
$session = $_COOKIE["session"];
// $sql__session = "DELETE FROM `oledu_user_session` WHERE session ='$session' ";
$sql__session = "DELETE FROM `oledu_user_session` WHERE session =?";
$stmt = $conn->prepare($sql__session);
$stmt->bind_param('s',$session);
$stmt->execute();
// $conn->query($sql__session);
header("refresh:0;url=./guestbook.php");
echo '<script type="text/javascript">alert("登出成功！");</script>';  
?>