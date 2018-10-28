<?php
require_once('./conn.php');
$post_id = $_POST['post_id'];
// $sql_delete = "UPDATE `oledu_post` SET `is_delete`= 1 WHERE post_id = $_POST[post_id]";
$sql_delete = "UPDATE `oledu_post` SET `is_delete`= ? WHERE post_id = ?";
$stmt = $conn->prepare($sql_delete);
$is_delete = 1;
$stmt->bind_param("is",$is_delete,$post_id);
// $conn->query($sql_delete);
$stmt->execute();
header("refresh:0;url=./guestbook.php");
echo '<script type="text/javascript">alert("刪除成功！");</script>';  
?>

