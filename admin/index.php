<?php 
// Nhiệm vị định tuyến
// URL = localhost:81/project1/admin/index.php?module=login&action=login

$module = $action = "";
if(isset($_GET['module'])){
	$module = $_GET['module'];
}
if(isset($_GET['action'])){
	$action = $_GET['action'];
}
// Mặc  định khi module hoặc action rỗng -> chạy vào đăng nhập
if($module =="" || $action ==""){
	$module = "common";
	$action = "login";
}

// Trường hợp có mudule và action -> kiểm tra xem file có hợp lệ hay không
$path = "modules/$module/$action.php";

if(file_exists($path)){
 // duong dan ton tai
	require_once("config/session.php");
	require_once("config/connectDB.php");
	require_once($path);
	require_once("config/closeDB.php");
}
else{
	require_once("modules/common/404.php");
}


 ?>

