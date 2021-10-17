<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM phukien WHERE id = '$id' ";
	$result = mysqli_query($conn,$sql);
	if($result == false){
		echo "Error:".mysqli_error($conn);
	}
}
        header("location:index.php?module=products&action=list-phukien");
 ?>
