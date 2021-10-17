<?php 
$name = $address = $phone_no = $pass = $email = $error = "";
if(isset($_POST['btn'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone_no = $_POST['phone_no'];
	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$sql = "INSERT INTO customers VALUES (NULL,'$name','$address','$phone_no','$email','$password')";
	$result = mysqli_query($conn,$sql);
	if($result == false){
		$error= "error: ".mysqli_error($conn);
	}
	else{
		mysqli_close($conn);
		header("Location:index.php?module=common&action=login");
	}
}

	?>
<head>
<?php 
$title = "Trang chủ";
require_once("layout/header.php");
 ?>

<style type="text/css">
	.register{
		padding: 16px;
	}
	.register form{
		background-color: #eee;
		margin: auto;
		width: 400px;
		padding: 16px;
		margin-top: 100px;
		font-size: larger;
	}

</style>
</head>
<body>
<div class="register">
	<h2 style="color: red"><?php echo $error; ?></h2>
	<form method="POST" autocomplete="off">
		<h3>Đăng kí</h3>
		<br>
		<input type="text" name="name" placeholder="Nhập tên:" required >
		<br><br>
		<input type="text" name="address" placeholder="Địa chỉ:" required >
		<br><br>
		<input type="number" name="phone_no" placeholder="Nhập số điện thoại:"required>
		<br><br>
		<input type="email" name="email" placeholder="Nhập email:"required>
		<br><br>
		<input type="password" name="password" placeholder="Nhập mật khẩu:"required>
		<br><br>
		<button type="submit" name="btn">Đăng kí </button>
	</form>
</div>

 <?php 
require_once("layout/footer.php");
  ?>
</body>