<?php 
if (isset($_POST['btn'])){
	$name = $_POST['name'];
	$price = $_POST['price'];
	$status = $_POST['status'];
	$description = $_POST['description'];
	$id_brand = $_POST['brand'];
	$id_type = $_POST['type'];
//up load anh
	if($_FILES['url']['size'] >0){
	$folder = "../public/images/";
	$img = $_FILES['url']['name'];
	$url = $_folder.$img;
	//up anh tu thu muc tam thoi
	move_uploaded_file($_FILES['url']['tmp_name'], $url);
	}
	$sql = "INSERT INTO phukien VALUES (NULL,'name','url','price','$description','status','$id_type','$id_brand')";
	$result = mysqli_query($conn,$sql);
	if($result == false){
		echo "Error:".mysqli_error($conn);
	}
	else{
		header("location:index.php?module=products&action=list-phukien");
	}
}
?>

<?php 
$title = "Thêm sản phẩm";
require_once("layout/header.php");
 ?>
 <style type="text/css">
 	.insert-products table,tr,th,td {
 		margin: 100px;
		border: 1px solid black;
 		font-size: large;
 		background-color: #ADD8E6;
 	}
 	
 </style>
<div class="insert-products" >
	<table border="1" >
	<form method="POST" enctype="mutinpart/form-data">
	<tr>
		  <th>Sản phẩm:</th>
		<td><input type="text" name="name" placeholder="Tên sản phẩm" required > </td>
	</tr>
		<tr>
		<th>Giá:</th>
		<td><input type="text" name="price" placeholder="Giá sản phẩm" required ></td>
		</tr>
		<tr>
		<th>Trạng thái:</th>
		<td><select name="status">
			<option value="1" >Còn hàng</option>
			<option value="0" >Hết hàng</option>
			<option value="2" >Sắp về</option>
			<option value="-1">Không kinh doanh</option>
		</select>
		</td>
		</tr>
		<tr>
		<th>Hãng:</th>
		<td>
		<select name="brand" >
		<?php 
		$sql = "SELECT id,name FROM brands";
		$result = mysqli_query($conn,$sql);
		if($result == false){
			echo "Error:".mysqli_error($conn);
		}	
		else if(mysqli_num_rows($result)>0){
			foreach ($result as $row){
				$id_brand = $row['id'];
				echo "<option value='$id_brand'>".$row['name']."</option>";
		}
	}
		?>
		</select>
	</td>
		</tr>
	<tr>
		<th>Loại:</th>
		<td>
		<select name="type" >
		<?php 
		$sql = "SELECT * FROM types";
		$result = mysqli_query($conn,$sql);
		if($result == false){
			echo "Error:".mysqli_error($conn);
		}	
		else if(mysqli_num_rows($result)>0){
			foreach ($result as $row){
				$id_types = $row['id'];
				echo "<option value='$id_types>".$row['name']."</option>";
		}
	}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<th>Ảnh:</th>
		<td><input type="file" name="url" accept="*/images" required ></td>
	</tr>
	<tr>
		<th>Mô tả:</th>
		<td> <textarea name="Description" cols="40" rows="5"></textarea></td>
	</tr>
	<td><button name="btn" type="submit">Lưu thông tin</button></td>
	</tr>
	</form>
	</table>
</div>

<?php 
require_once("layout/footer.php");
?>