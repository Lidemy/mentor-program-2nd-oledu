<?php
require_once('./conn.php');

// $sql__edit__comfirm = "UPDATE `oledu_post` SET `content`= '$_POST[content]',`is_edited`= 1 WHERE post_id=$_POST[post_id]";
$sql__edit__comfirm = "UPDATE `oledu_post` SET `content`= ?,`is_edited`= ? WHERE post_id=?";
$stmt = $conn->prepare($sql__edit__comfirm);
$is_edited =1;
$stmt->bind_param("sis", $_POST['content'], $is_edited, $_POST['post_id']);
$stmt->execute();
// $conn->query($sql__edit__comfirm);
header("refresh:0;url=./guestbook.php");
echo '<script type="text/javascript">alert("編輯成功！");</script>';  
?>