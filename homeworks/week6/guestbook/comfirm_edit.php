<?php
require_once('./conn.php');

$sql__edit__comfirm = "UPDATE `oledu_post` SET `content`= '$_POST[content]',`is_edited`= 1 WHERE post_id=$_POST[post_id]";
$conn->query($sql__edit__comfirm);
header("refresh:0;url=./guestbook.php");
echo '<script type="text/javascript">alert("編輯成功！");</script>';  
?>