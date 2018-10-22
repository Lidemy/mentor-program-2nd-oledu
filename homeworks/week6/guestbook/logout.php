<?php 
require_once('./conn.php');
$username = $_COOKIE["username"];
$sql__session = "DELETE FROM `oledu_user_session` WHERE username ='$username' ";
$conn->query($sql__session);
echo $sql__session;
header("refresh:0;url=./guestbook.php");
echo '<script type="text/javascript">alert("登出成功！");</script>';  
?>