<?php session_start(); ?>
<?php
  unset($_COOKIE);
  echo '登出中\n導入登入頁面';
  setcookie('username', '', time() - 3600); 
  header("refresh:0;url=./login.php");     

    
?>



