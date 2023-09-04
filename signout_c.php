<?php
session_start();
setcookie('emailcookie', $email,time()-(time()*100));
setcookie('passwordcookie', $password,time()-(time()*100));
session_unset();
session_destroy();
header('Location: homeNew.php');
?>