 <?php
$title = "Danh sách hóa đơn";
require_once("layout/header.php");
 ?>

 <style type="text/css">
 	.inovices-list table{
 		width: 90%;
 		background-color: #EEE;
 		margin: auto;
 		padding: 16px;
 	}
 	table,tr,td,th{
 		border: 1px solid black;
 		border-collapse: collapse;
 	}

 </style>

<div class="invoice-list">
	<table>
		<tr>
		<th>Stt</th>
		<th>Mã đơn hàng</th>
		<th>Ngày mua</th>
		<th>Tổng tiền</th>
		<th>Tình trạng</th>
		</tr>
	
	<?php
		$id_customer = $_SESSION['user']['id'];
		$sql = "SELECT * FROM invoices WHERE id_customer = '$id_customer'";
		$result = mysqli_query($conn, $sql);
		if ($result == false) {
		    echo "error:" . mysqli_error($conn);
		} elseif (mysqli_num_rows($result) == 0) {
		    echo "<tr><th colspan='5'>Chưa có đơn hàng nào</th></tr>";
		} else {
		    $count = 0;
    // co don hang->duyet
		    foreach ($result as $row) {
		        echo "<tr>";
		        echo "<th>" . $count++ . "</th>";
		        echo "<th>";
		        $id = $row['id'];
		        echo "<a title='Click de xem chi tiet' href='index.php?module=invoice&action=details&id=$id'>" . $id . "</a>";

		        echo "</th>";
		        echo "<th>" . $row['created_at'] . "</th>";
		        echo "<th>" . number_format($row['total_amounts']) . "</th>";
		        echo "<th>";
		        $arrStatus = [-1 => "Hủy", 2 => "Thành công", 1 => "Đã duyệt", 0 => "Chưa duyệt"];
		        $status = $row['status'];
		        echo $arrStatus[$status];
		        echo "</th>";
		        echo "</tr>";
		    }
		}

?>

	 </table>
</div>

 <?php 
require_once("layout/footer.php");
  ?>