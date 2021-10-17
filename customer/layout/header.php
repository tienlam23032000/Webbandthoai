<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $title; ?> </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		a{
			text-decoration: none;
			color: black;
		}
		body{
			background-color: gray;
		}
		.container{
			width: 1000px;
			height: 100vh;
			overflow: auto;
			margin: auto;
			background-color: white;
		}
		.header{
			background-image: url('https://vanninh.vn/wp-content/uploads/2016/10/header-background.png'  );
			height: 10vh;
			line-height: 70px;
			padding-left: 16px;
			padding-right: 16px;
			/*border-bottom: 1px solid red; */
		}
		
		.content{
			background-color: #E0FFFF;
			height: 80vh;
		}
		.main-menu{
			background-image: url('http://3.bp.blogspot.com/-OsjCmHixX1g/UjKUjqNQ08I/AAAAAAAAFhQ/0rF8ec0e28M/s1600/anh-nen-2.jpg');
			height: 10vh;
		}
		.main-menu ul{
			list-style:none;
		}
		.main-menu li{
			display: inline-block; 
			width: 243px;
		}
		.main-menu li a{
			display: block;
			line-height: 10vh;
			text-align: center;
			font-size: larger;
			color: white;
		}
		.main-menu li a:hover{
			background-color: #F08080;
		}

		.active{
			background-color: #87CEFA;
		}
		.header span{
			color:#300000;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="header">
	 	<img src="https://scontent.xx.fbcdn.net/v/t1.15752-0/p206x206/153129311_344907223407919_4124755635290873386_n.png?_nc_cat=100&ccb=3&_nc_sid=58c789&_nc_ohc=ylMqk8anj8AAX-DI-Zi&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&_nc_tp=30&oh=e40246bbdc9b76b8a9a9bb1e68f015b4&oe=605B5DB8" width="10%" height="100%" >
		<a  href="index.php?module=invoice&action=cart" style="float: right;"> <i class="fa fa-shopping-cart" ></i>Giỏ hàng</a>
		<span style="float: right;">
		<?php 
		if (isset($_SESSION['user'])) {
			echo "<span style='margin-right:8px' > Xin chào!!".$_SESSION['user']['name']."</span>";
			echo "<a href='index.php?module=common&action=logout'>Đăng xuất</a>";
		}
		else{
			echo "<a style='margin-right:8px' href='index.php?module=common&action=login'>Đăng nhập</a>";
			echo "<a style='margin-right:8px' href='index.php?module=common&action=register'>Đăng kí</a>";
		}

		?>
		</span>
	</div>
	<div class="main-menu">
		<ul>
			<li>
				<a  class=" <?php if($action == 'home') echo 'active' ?> " href="index.php?module=home&action=home"> <i class="fa fa-home" ></i> Trang chủ</a>
			</li>
			<li>
				<a class=" <?php if($action == 'list-phone') echo 'active' ?> " href="index.php?module=products&action=list-phone"> <i class="fa fa-mobile" ></i> Điện thoại</a>
			</li>
			<li>
				<a class=" <?php if($action == 'list-phukien') echo 'active' ?>" href="index.php?module=products&action=list-phukien"> <i class="fa fa-headphones" ></i> Phụ kiện</a>
			</li>
			
			<?php 
				if (isset($_SESSION['user'])) {
					echo "<li>";
						echo "<a href='index.php?module=invoice&action=list'> <i class='fa fa-history' ></i> Lịch sử mua hàng</a>";

					echo "</li>";
				}

			 ?>
		
		</ul>

	</div>
	<div class="content">