<?php 
	$sql = "SELECT id,name,url,price FROM products";
	// kiem tra nguoi dung tim kiem khong
	if (isset($_GET['keywork'])){
		$keywork = $_GET['keywork'];
		$sql = $sql." WHERE name LIKE '%$keywork%' ";
	} 

	$result = mysqli_query($conn,$sql);
	if ($result == false) {
		$error = "error:".mysqli_error($conn);
		mysqli_close($conn);
		die($error);
	}
?>

<?php
$title = "Điện thoại";
require_once("layout/header.php");
 ?>
<style type="text/css">
	.list-phone{
	padding: 16px;
	}
	.list-phone form{
		width: 360px;
		margin: auto;
		text-align: center;
	}
	.list-phone table{
		margin-top: 16px;
	}	
	.list-phone .item{
		min-width: 200px;
		text-align: center;
		box-shadow: 12px 12px 2px 1px rgba(0, 0, 255, .2);
	}
	.list-phone .item:hover{
		background-color: pink;
	}


</style>
<div class="list-phone">
	<form>
		<input type="hidden" name="module" value="products">
		<input type="hidden" name="action" value="list-phone">
		<input type="text" name="keywork" placeholder="Thông tin mà bạn muốn tìm ?" size="30">
		<button type="submit">Tìm kiếm</button>
	</form>
	<table >
<?php 
	$total = mysqli_num_rows($result);
	if (isset($keywork)) {
		echo "<h2 style='color:red'>Có tất cả $total kết quả cho: $keywork</h2>";
	}
	$count = 0;
	$n = 4;
	// 1 dong in toi da 4 sp
	while($count != $total){
		echo "<tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				$count++;
				echo "<td class='item' >";
					$url = $row['url'];
					$id = $row['id'];
					echo "<a href='index.php?module=products&action=product-details&id=$id'>";
					echo "<img src=".$url." width='180px'><br>";
					echo "</a>";
					echo "<b>" .$row['name']."</b><br>";
					echo "<b style='color:red'>" .number_format($row['price'])."VNĐ</b><br>";
				echo "</td>";
				if ($count % 4 == 0) break;
			
			}
		echo "</tr>";
	}
 ?>

	</table>
</div>

 <?php 
require_once("layout/footer.php");
  ?>