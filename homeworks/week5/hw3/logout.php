<?php
  unset($_COOKIE);
  echo '登出中<br>導入登入頁面';
  setcookie('username', '', time() - 3600); 
  header("refresh:3;url=./login.php");
?>



