<?php 
$error = "Đăng nhập để tiếp tục!";
if(isset($_POST['btn'])){
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM admins WHERE email='".$email."' AND password='".$password."'";
	$result = mysqli_query($conn,$sql);

	if($result==false){
		$error = mysqli_error($conn);
	}
	else{
		//Đúng cú pháp
		if(mysqli_num_rows($result)==1){
			// Đăng nhập thành công
			// Chuyển hướng sang quản lý
			// lưu lại session
			$row = mysqli_fetch_array($result);
			$_SESSION['admins']['id'] = $row['id'];
			$_SESSION['admins']['name'] = $row['name'];
			header("location:index.php?module=products&action=list");
		}
		else{
			$error = "Thông tin tài khoản không chính xác!";
		}
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
            background:#000;
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
        .login input[type="email"], input[type="password"] {
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
            background: #fb2525;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }
        .login input[type="submit"]:hover{
            cursor: pointer;
            background: #ffc107;
            color: #000;
        }


	</style>
</head>
<body>
	<div class="login" >
	<h1>Đăng nhập</h1>
	<h2 style="color: red"> <?php echo $error; ?> </h2>
	<form method="POST" >
        <p>Nhập email</p>
		<input type="email" name="email" placeholder="Email:" required >
		<p>Nhập mật khẩu</p>
		<input type="password" name="password" placeholder="Mật khẩu:" required=> 
		<br><br>
		<input type="submit" name="btn" value="Đăng nhập">
	</form>
    </div>
</body>
</html>