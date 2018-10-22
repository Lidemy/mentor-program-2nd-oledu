<?php
session_start();
echo password_hash("test", PASSWORD_DEFAULT);
//输出值为$2y$10$/ZpSqQs4jcOXwKEZI07WzuYo/liepLJQctmzmRrTr0HvrL8TX7gwa
//每次输出结果都不一致
$hash = '$2y$10$UQFuSe6stL/bzu/vi4oX5OCyjecDD7CM4VUj4H5M4bzLtc2l0/y2m';
$result=password_verify("test",$hash);
var_dump($result);

require_once('./conn.php');
$sql_password = "SELECT password from user WHERE username ='oledu' ";
$result = $conn->query($sql_password)->fetch_assoc()['password'];
echo "<br>".$result."<br>";
if(password_verify('oledu','$2y$10$MEJbb5UItfiTeDpBhtvCF.Mp1/59lQmZmsgtc/RcwR23t5WuQYSTK')){
  echo 'ya';
}else{
  echo "no";
}

echo "<br>";


echo session_id();
?>
