<?php
setcookie('userId', '', time() - 3600, "/");
setcookie('userType', '', time() - 3600, "/");
setcookie('userNumber', '', time() - 3600, "/");
setcookie('fName', '', time() - 3600, "/");
setcookie('lName', '', time() - 3600, "/");
header('Location:../login.php');
