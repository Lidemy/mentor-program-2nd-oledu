<?php
require_once('./conn.php');
$sql_delete = "UPDATE `oledu_post` SET `is_delete`= 1 WHERE post_id = $_POST[post_id]";
$conn->query($sql_delete);
header("refresh:0;url=./guestbook.php");
echo '<script type="text/javascript">alert("刪除成功！");</script>';  
?>

