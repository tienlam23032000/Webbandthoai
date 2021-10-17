<?php 
// xoa xong quay ve list
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM types WHERE id = '$id'";
	$result = mysqli_query($conn,$sql);
	if($result == false){
		echo "Error:".mysqli_error($conn);
	}
	else{
		header("location:index.php?module=types&action=list");
	}
}

 ?>