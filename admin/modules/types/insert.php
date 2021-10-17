<?php 
if(isset($_POST['btn'])){
		$name = $_POST['name'];
		$location =  $_POST['location'];
		$sql =  "INSERT INTO types VALUES (NULL,'$name')";
		$result = mysqli_query($conn,$sql);
		if($result == false){
			echo "Error:".mysqli_error($conn);
		}
		else{	
			header("location:index.php?module=types&action=list");

		}
}
?>

<?php 
$title = "Thêm loại Sản phẩm";
require_once("layout/header.php");
 ?>
 <style type="text/css">
 	.insert-types table,th,tr,td {
 		margin: 100px;
 		padding: 10px;
 		font-size: large;
 		background-color: #ADD8E6;
 	}

 </style>
 <div class="insert-types"> 
 	<table border="1">
<form method="POST" > 
	<tr>
	<th>Tên loại sản phẩm:</th>
	<td><input type="text" name="name" required placeholder="Nhập loại:" > </td>
</tr>
<tr>
<th><button type="submit" name="btn" >Lưu thông tin</button></th>
</tr>
</form>
</table>
 </div>

 <?php 
require_once("layout/footer.php");
 ?>