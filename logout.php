<?php
$id = $_COOKIE['user'];
setcookie('user',$username,time()-3600);
header('Location: login.php');
?>