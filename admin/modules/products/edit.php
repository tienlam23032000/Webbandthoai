<?php 
	$id = $name = $price = $description = $id_type = $id_brand = $url = $status = "";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "SELECT * FROM products WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		if($result == false){
			echo "Error:".mysqli_error($conn);
		}
		else if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$name = $row['name'];
			$price = $row['price'];
			$url = $row['url'];
			$description= $row['description'];
			$status = $row['status'];
			$type = $row['id_type'];
			$brand = $row['id_brand'];
		}
	}
	else{
	header("location:index.php?module=products&action=list");
	}

	if(isset($_POST['btn'])){
		$name = $_POST['name'];
		$price = $_POST['price'];
		$status = $_POST['status'];
		$description = $_POST['description'];
		$id_brand = $_POST['brand'];
		$id_type = $_POST['type'];
		//Up anh     
		if($_FILES['url']['size'] >0){
		$folder = "../public/images/";
		$img = $_FILES['url']['name'];
		$url = $folder.$img;
		//up anh tu thu muc tam thoi
		move_uploaded_file($_FILES['url']['tmp_name'], $url);
		}
		$sql = "UPDATE products SET name='$name',url='$url',price='$price',description='$description',status='$status',id_type='$id_type',id_brand='$id_brand' WHERE id='$id'";
		$result = mysqli_query($conn,$sql);
		echo $result;
		if($result == false){
			echo "Error:".mysqli_error($conn);
		}
		else{
			header("location:index.php?module=products&action=list");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<?php
	$title = "Cập nhật sản phẩm";
	require_once("layout/header.php");
?>
	<style type="text/css">
	.edit-products table,tr,th,td {
 		margin: 100px;
		border: 1px solid black;
 		font-size: large;
 		background-color: #ADD8E6;
 	}
	</style>
</head>
<body>
<div class="edit-product" >
	<table border="1" >
	<form method="POST" enctype="multipart/form-data">
	<tr>
		<th>Sản phẩm:</th>
	<td><input type="text" name="name" placeholder="Tên sản phẩm:" required value=" <?php echo $name ?> "></td>
	</tr>
	<tr>
		<th>Giá:</th>
		<td><input type="text" name="price" placeholder="Giá sản phẩm:" required value=" <?php echo $price ?> "></td>
	</tr>
	<tr>
		<th>Trạng thái:</th>
		<td><select name="status">
			<option value="1" <?php if ($status==1) echo "selected"; ?> >Còn hàng</option>
			<option value="0" <?php if ($status==0) echo "selected"; ?> >Hết hàng</option>
			<option value="2" <?php if ($status==2) echo "selected"; ?> >Sắp về</option>
			<option value="-1"<?php if ($status==-1) echo "selected";?> >Không kinh doanh</option>
		</select>
		</td>
	</tr>
		<tr>
		<th>Hãng:</th>	
			<td><select name="brand" >
			<?php
				$result = mysqli_query($conn, "SELECT * FROM brands");
				if ($result == false) {
				    echo "Error:" . mysqli_error($conn);
				} elseif (mysqli_num_rows($result) > 0) {
				    foreach ($result as $row) {
				        $id_brand = $row['id'];
				        if ($id_brand == $brand) {
				            $selected = "selected";
				        } else {
				            $selected = "";
				        }
				        echo "<option value='$id_brand' >" . $row['name'] . "</option>";
				    }
				}
			?>
		</select>
		</td>
		</tr>
	<tr>
	<label>
		<th>Loại:</th>
		<td><select name="type" >
		<?php
			$result = mysqli_query($conn, "SELECT * FROM types");
			if ($result == false) {
			    echo "Error:" . mysqli_error($conn);
			}
			 else if (mysqli_num_rows($result) > 0) {
			    foreach ($result as $row) {
			        $id_types = $row['id'];
			        if ($id_type == $type) {
			            $selected = "selected";
			        } else {
			            $selected = "";
			        }
			        echo "<option value='$id_types' >" . $row['name'] . "</option>";
			    }
			}
		?>
		</select>
		</td>
	</tr>
	<tr>
		<th>Ảnh:</th>
		<td><input type="file" name="url" accept="*/images/<?php echo $url ?>"></td>
	</tr>
	<tr>
		<th>Mô tả:</th>		
		<td><textarea name="description" cols="40" rows="5"><?php echo $description; ?></textarea></td>
	</tr>
	<tr>
	<th><button name="btn" type="submit">Lưu thông tin</button></th>
	</tr>
	</form>
</table>
</div>
 <?php 
 require_once("layout/footer.php") ;
 ?>
