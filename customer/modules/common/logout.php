<?php 
unset($_SESSION['user']);
// ve login
header("Location:index.php?module=common&action=login");

 ?>