<?php 
$error = "";
if(isset($_POST['btn'])) {
	$user = $_POST['user'];
	$password = md5($_POST['password']);
	$sql = "SELECT id,name FROM customers WHERE (email='$user' OR phone_no='$user') AND password = '$password' ";
	$result = mysqli_query($conn,$sql);
	if($result == false){
	echo "Error:".mysqli_error($conn);
	}
	else if(mysqli_num_rows($result) == 1){
		//dang nhap thanh cong
		$row = mysqli_fetch_array($result);
		$_SESSION['user']['id'] = $row['id'];
		$_SESSION['user']['name'] = $row['name'];
		header("location:index.php");
	}
	else{
		// dang nhap that bai
		$error = "Thông tin không chính xác!";
	} 
}

	?>
<head>
<?php 
$title = "Trang chủ";
require_once("layout/header.php");
 ?>

<style type="text/css">
<style type="text/css">
        body{
            margin: 0;
            padding: 0;
            background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20190221/ourmid/pngtree-black-friday-black-gold-black-technology-float-image_18646.jpg');
            background-size: cover;
            background-position: center;
            font-family: sans-serif;
        }
        .login{
            width: 320px;
            height: 420px;
            background-image: url('https://png.pngtree.com/thumb_back/fw800/back_our/20190628/ourmid/pngtree-gradient-smudged-hand-drawn-powder-cloud-sky-background-image_274314.jpg ');
            color: #fff;
            top: 50%;
            left:50%;
            position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: border-box;
            padding: 70px 30px;
        }
      
        h1,h2{
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
        }
        .login p{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .login input[type="text"], input[type="password"] {
            border: none;
            border-bottom: 1px solid #fff;
            background-color: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .login input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
            background: #00BFFF;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        .login input[type="submit"]:hover{
            cursor: pointer;
            background: #FFB6C1;
            color: #000;
        }


	</style>

</style>
</head>
<body>
<div class="login" >
	<h1>Đăng nhập</h1>
	<h2 style="color: red"> <?php echo $error; ?> </h2>
	<form method="POST" >
        <p>Nhập email hoặc số điện thoại</p>
		<input type="text" name="user" placeholder="Email or phone:" required >
		<p>Nhập mật khẩu</p>
		<input type="password" name="password" placeholder="Mật khẩu:" required=> 
		<br><br>
		<input type="submit" name="btn" value="Đăng nhập">
	</form>
    </div>

 <?php 
require_once("layout/footer.php");
  ?>
</body>