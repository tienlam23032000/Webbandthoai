<?php 
if(isset($_POST['btn'])){
		$name = $_POST['name'];
		$location =  $_POST['location'];
		$sql =  "INSERT INTO brands VALUES (NULL,'$name','$location')";
		$result = mysqli_query($conn,$sql);
		if($result == false){
			echo "Error:".mysqli_error($conn);
		}
		else{	
			header("location:index.php?module=brands&action=list");

		}
}	

?>

<?php 
$title = "Thêm hãng sản phẩm";
require_once("layout/header.php");
 ?>
 <style type="text/css">
 	.insert-brands table,tr,th,tr{
 		padding: 10px;
 		margin: 100px;
 		background-color: #ADD8E6;
 		
 	}

 </style>
 <div class="insert-brands">
 <table border="1">
<form method="POST" > 
<tr>
	<th>Tên hãng sản phẩm:</th>
	<td><input type="text" name="name" required placeholder="Nhập hãng:" ></td>
</tr>
<tr>
	<th>Xuất Xứ:</th>
	<td><input type="text" name="location" required placeholder="Xuất xứ:" ></td>
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