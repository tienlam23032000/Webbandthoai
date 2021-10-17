<?php 
$name =  "";
if(isset($_GET['id']))
	$id = $_GET['id'];
	$sql = "SELECT * FROM types WHERE id='$id'";
	$result = mysqli_query($conn,$sql);
	if($result == false){
		echo "Error:".mysqli_error($conn);
	}
	else if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_array($result);
		$name = $row['name'];
		}
		if(isset($_POST['btn'])){
			$name = $_POST['name'];
			$sql = "UPDATE types SET name = '$name' WHERE id = '$id'";
			$result =mysqli_query($conn,$sql);
			if($result == false){
				echo "Error".mysql_errno($conn);
			}
			else{
				header("location:index.php?module=types&action=list");
			}
	}
 ?> 

<?php  
$title = "Thay đổi loại điện thoại";
require_once("layout/header.php");
 ?>
 <style type="text/css">
 	.edit-types table,tr,th,td {
 		margin: 1px;
 		font-size: large;
 		background-color: #ADD8E6;
 		height: 10px;
 	}

 	}
 </style>
<div class="edit-types"> 
	<table border="1" >
<form method="POST" > 
<tr>
	<th>Loại điện thoại:</th> 
	<td><input type="text" name="name" required placeholder="Nhập loại:" value="<?php echo $name ?>" ></td>
</tr>
<tr>
<th><button type="submit" name="btn">Lưu thông tin</button></th>
</tr>
</form>
</table>
 </div> 
	
 <?php 
require_once("layout/footer.php");
  ?>