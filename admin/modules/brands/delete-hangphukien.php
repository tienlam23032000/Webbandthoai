<?php 
// xoa xong quay ve list phu kien
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM hangphukien WHERE id = '$id'";
	$result = mysqli_query($conn,$sql);
	if($result == false){
		echo "Error:".mysqli_error($conn);
	}
	else{
		header("lcation:index.php?module=brands&action=list-hangphukien");
	}
}

 ?>