<?php
	$name = $location = "";
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	}
	$sql = "SELECT * FROM brands WHERE id='" . $id . "'";
	$result = mysqli_query($conn, $sql);
	if ($result == false) {
	    echo "Error:" . mysqli_error($conn);
	} elseif (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_array($result);
	    $name = $row['name'];
	    $location = $row['location'];
	}
	if (isset($_POST['btn'])) {
	    $name = $_POST['name'];
	    $location = $_POST['location'];
	    $edit = "UPDATE `brands` SET `name`= '$name', `location`= '$location' WHERE id = '$id'";
	    $result = mysqli_query($conn, $edit);
	    if ($result == false) {
	        echo "Error:" . mysqli_error($conn);
	    } else {
	        header("location:index.php?module=brands&action=list");
	    }
	}
?> 

<?php
	$title = "Quản lý hãng";
	require_once "layout/header.php";
?>

 <style type="text/css">
 	.edit-brands{
 		margin: 1px;
		border: 1px solid black;
 		font-size: large;
 		background-color: #ADD8E6;
 		height: 100px;
 	}
 </style>
<div class="edit-brands"> 
	<table border="1" >
<form method="POST" > 
<tr>
	<th>Tên hãng:</b></th>
	<td><input type="text" name="name" required placeholder="Nhập tên:" value="<?php echo $name ?>" ></td>
</tr>
<tr>
	<th>Xuất xứ:</th>
	<td><input type="text" name="location" required placeholder="Xuất xứ:" value="<?php echo $location ?>" ></td>
</tr>
<tr>
<td><button type="submit" name="btn">Lưu thông tin</button></td>
</td>
</form>
</table>
 </div> 
	
 <?php 
require_once("layout/footer.php");
  ?>