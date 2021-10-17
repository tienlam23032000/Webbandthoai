 
<?php 
//sua lai tinh trang don hang ->quay ve danh sach hoa don
if (isset($_GET['id'])) {
	// echo "Run herer";
	$id = $_GET['id'];
	$sql = "UPDATE invoices SET status = 1 WHERE id='$id'";
	$result = mysqli_query($conn,$sql);
	if ($result == false) {
		echo "error:".mysqli_error($conn);
	}
	else{
		header("location:index.php?module=invoice&action=list");
	}
}
else{
	header("location:index.php?module=products&action=list");
}


 ?>

