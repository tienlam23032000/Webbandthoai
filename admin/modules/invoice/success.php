<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "UPDATE invoices SET status = 2 WHERE id='$id'";
	$result = mysqli_query($conn,$sql);
	if ($result == false) {
		echo "error:".mysqli_error($conn);
	}
	else{
		header("location:index.php?module=invoice&action=list");
	}
}
else{
	header("location:index.php");
}


 ?>