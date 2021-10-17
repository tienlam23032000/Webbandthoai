<?php
$title = "Điện thoại";
require_once("layout/header.php");
 ?>

<style type="text/css">
	.product-details table{
		width: 80%;
		margin: auto;
		background-color: #EEE;
	}
	table,tr,td,th{
		border-collapse: collapse;
		border: 1px solid black;
	}
</style>

<div class="product-details">
	<?php 
		if (isset($_GET['id'])) {
			$id= $_GET['id'];
			$sql = "SELECT * FROM products WHERE id = '$id'";
			$result = mysqli_query($conn,$sql);
			if ($result == false) {
				echo "error:".mysqli_error($conn);
			}
			else if (mysqli_num_rows($result)==1) {
				$row = mysqli_fetch_assoc($result);
				$name = $row['name'];
				$price = $row['price'];
				$url = $row['url'];
				$description = $row['description'];
			}	
		}
		else{
			header("location:index.php?module=home&action=home");
			die();
		}
	 ?>


	 <table>
	 	<tr>
	 		<th style="width: 270px;"> <?php echo $name; ?></th>
	 		<td><?php echo "Gia:".$price."VNĐ"; ?></td>
	 	</tr>
	 	<tr>
	 		<th>
	 			<img src=" <?php echo $url; ?>" width="250px">
	 		</th>
	 		<td>
	 			<b>Thông số máy:</b>
	 			<?php echo $description; ?>
	 		</td>
	 	</tr>
	 	<tr>
	 		<td></td>
	 		<th>
	 			<a  href="index.php?module=invoice&action=cart&id=<?php echo $id  ?>">
	 			<button>Thêm vào giỏ hàng</button>
	 			</a>
	 		</th>
	 	</tr>
	 </table>
</div>

  <?php 
require_once("layout/footer.php");
  ?>