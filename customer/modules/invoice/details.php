
<?php 
if (isset($_GET['id'])) {
	$id_invoice = $_GET['id'];
}
else{
	header("location:index.php?module=home&action=home");
	die();
}


 ?>



 <?php
$title = "Chi tiết đơn hàng";
require_once("layout/header.php");
 ?>

 <style type="text/css">
 .invoice-details table,tr,th,td{
 	background-color: #ADD8E6;
 	padding: 16px;
 	border: 1px solid black;
 }
 .invoice-details{
 	background-color: #ADD8E6;
 	width: auto;
 	height: 70%;
 	margin: 70px;
 	padding: 10px;
 }

 </style>


<div class="invoice-details">

	<?php

	$sql =  "SELECT * FROM invoices WHERE id='$id_invoice'";
		$result = mysqli_query($conn,$sql);
		if ($result == false) {
			echo "error".mysqli_error($conn);
		}
		else if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$created_at = $row['created_at'];
			$receiver = $row['receiver'];
			$address = $row['address'];
			$status = $row['status'];
			$phone = $row['phone'];
			$total_amounts = $row['total_amounts'];

		}

	 ?>

	<h3>Mã đơn hàng: <?php echo $id_invoice; ?> </h3>
	<h3>Ngày đặt hàng: <?php echo $created_at; ?> </h3>
	<h3>Người nhận: <?php echo $receiver; ?> </h3>
	<h3>Địa chỉ nhận: <?php echo $address; ?> </h3>
	<h3>Số điện thoại: <?php echo $phone; ?> </h3>

	<h3>Tình trạng:
		<?php 
			$arrStatus = array(-1=> "Hủy",2=>"Thành công",1=>"Đã duyệt",0=>"Chưa duyệt");
					$status = $row['status'];
					echo $arrStatus[$status];

		 ?>

	</h3>

	<?php 
		if ($status == 0) {
			echo "<a href='index.php?module=invoice&action=cancel&id=$id_invoice' >Hủy đơn hàng</a>";
		}

	 ?>

	<h3>Danh sách sản phẩm có trong đơn hàng</h3>
	<table border="1" >
		<tr>
			<th>Stt</th>
			<th>Tên sản phẩm</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
		</tr>

		<?php
			$sql = "SELECT products.name,products.id,products.price,invoice_details.quantity 
							FROM products 
							INNER JOIN invoice_details ON products.id=invoice_details.id_product 
							WHERE invoice_details.id_invoice = '$id_invoice'";
			//
			$result = mysqli_query($conn, $sql);
			if ($result == false) {
			    echo "error:" . mysqli_error($conn);
			} 
			else if (mysqli_num_rows($result) == 0) {
			    echo "Không có sản phẩm!";
			} else {
			    //co sp-> hien thi san pham
			    $count = 0;
			    foreach ($result as $row) {
			        echo "<tr>";
			        echo "<td>" . $count++ . "</td>";
			        echo "<td>";
			        $id_product = $row['id'];
			        echo "<a href='index.php?module=products&product_detalis&id=$id_product' >" . $row['name'] . "</a>";
			        echo "</td>";
			        echo "<td>" . number_format($row['price']) . "</td>";
			        echo "<td>" . $row['quantity'] . "</td>";
			        echo "</tr>";
			    }
			}

		?>


		 <tr>
		 	<th colspan="3">Tổng tiền:</th>
		 	<th> <?php echo number_format($total_amounts); ?></th>
		 </tr>

	</table>

</div>

 <?php 
require_once("layout/footer.php");
  ?>