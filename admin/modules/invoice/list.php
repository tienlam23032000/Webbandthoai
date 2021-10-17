<?php
$title = "Danh sách hóa đơn" ;
require_once("layout/header.php") 
?>


	<?php 
		$sql = "SELECT * FROM invoices ORDER BY `invoices`.`total_amounts` DESC";
		$result = mysqli_query($conn,$sql);
		if($result == false){
		die ("error:".mysqli_error($conn));
		}
	 ?>

	<style type="text/css">
		.invoices{
			padding: 16px;
		}
		.invoices table{
			width: 100%;
			text-align: center;
		}

		table,tr,th,td{
			border-collapse: collapse;
			border: 1px solid black;
		}
	</style> 


<div class="invoices">
	
		<!--in ra danh sach hoa don -->
		<table>
			<tr>
				<th>Mã hóa đơn</th>
				<th>Ngày đặt hàng</th>
				<th>Người nhận</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<th>Tổng tiền</th>
				<th>Tình trạng</th>
			</tr>


<?php 
if (mysqli_num_rows($result) == 0 ) {
	echo "<h2>Không có hóa đơn</h2>";
	}
	else{
		//co hoa don -> in ra
		foreach ($result as $row ) {
		echo "<tr>";
			$id_invoice = $row['id'];
			echo "<td>";
			echo "<a href='index.php?module=invoice&action=details&id=$id_invoice'>$id_invoice</a>";
			echo "</td>";
			echo "<td>".$row['created_at']."</td>";
			echo "<td>".$row['receiver']."</td>";
			echo "<td>".$row['phone']."</td>";
			echo "<td>".$row['address']."</td>";
			echo "<td>".$row['total_amounts']."</td>";
			echo "<td>";
				// 0: chua duyet, 1:da duyet, 2:thanh cong, -1:da huy
				$arrayStatus = array(0=>"Chưa duyệt",1=>"Đã duyệt",2=>"Thành công",-1=>"Đã hủy");
				echo $arrayStatus[$row['status']];
			echo "</td>";
			echo "</a>";
		echo "<tr>";
	}

}

 ?>
</table>
</div>


 <?php 
 require_once("layout/footer.php"); 
 ?>