<?php 
setcookie('islogin', '', time()-(3600 * 24));

header('location:index.php');
exit;
 ?>
 