<?php 
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if (isset($_SESSION['cart'][$id])) {
		if (isset($_GET['up'])) $_SESSION['cart'][$id] += 1;
		if (isset($_GET['down'])) {
			$_SESSION['cart'][$id] -= 1;
			if($_SESSION['cart'][$id] < 0) $_SESSION['cart'][$id] = 0;
			
			
		}
	}
	else{
		$_SESSION['cart'][$id] = 1;
	}
	header("location:index.php?module=invoice&action=cart"); 
}
//echo var_dump($_SESSION['cart']);
	
 ?>


 <?php
$title = "Giỏ hàng";
require_once("layout/header.php");
 ?>

<style type="text/css">
	.cart table{
		width: 100%;
	}
	table,tr,td,th{
		border: 1px solid black;
		border-collapse: collapse; 
	}
</style>
<div class="cart">

<table>	
	<tr>
		<th>Stt</th>
		<th>Sản phẩm</th>
		<th>Đơn giá</th>
		<th>Số lượng</th>
		<th>Thành tiền</th>
	</tr>
<?php 
	$stt = 0;
	//tong tien
	$total = 0;
	foreach ($_SESSION['cart'] as $id => $quantity) {
		$stt ++;
		$sql = "SELECT name,price,url FROM products WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		if ($result == false) echo "error:".mysqli_error($conn);
		else {
			$row = mysqli_fetch_assoc($result);
			$name = $row['name'];
			$price = $row['price'];
			$url = $row['url'];
		
			echo "<tr>";
				echo "<td>".$stt."</td>";
				echo "<td>";
					echo $name."<br>";
					$url = $row['url'];
					echo "<img src='$url' width='50px'>";
				echo "</td>"; 
				echo "<td>".number_format($price)."VNĐ</td>";
				echo "<th>";
					//so luong
				echo "<a style='margin-right=16px;' href='index.php?module=invoice&action=cart&id=$id&down'>";
					echo "<button><i class='fa fa-arrow-down' ></i> </button>";
				echo"</a>";

				echo $quantity;
				echo "<a style='margin-left=16px;' href='index.php?module=invoice&action=cart&id=$id&up'>";
					echo "<button> <i class='fa fa-arrow-up' ></i> </button>";
				echo"</a>";
				echo "</th>";
				echo "<td>". number_format($price*$quantity)."VNĐ</td>";
			echo "</tr>";
			$total += $price*$quantity;
	}
}
// luu tong tien trong session
	$_SESSION['total_amount'] = $total;

	echo "<tr>";
		echo "<th colspan='4' >Tổng tiền</th>";
		echo "<td>".number_format($total)."VNĐ</td>";
	echo "</tr>";

 ?>

</table>
	<a href="index.php?module=invoice&action=checkout">
		<button style="padding: 4px;background-color: black;color: white;" >Thanh toán</button>
	</a>
</div>

 <?php 
require_once("layout/footer.php");
  ?>