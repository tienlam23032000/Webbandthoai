<?php 
//khach hang phai dang ki truoc khi thanh toan
if (!isset($_SESSION['user'])) {
	//yeu cau nguoi dung dang nhap
	header("location:index.php?module=common&action=login");
}
// Xu li them san pham 
if (isset($_POST['btn'])) {
	$receiver = $_POST['receiver'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	if (isset($_SESSION['total_amount'])) $total_amount = $_SESSION['total_amount'];
	$id_customer = $_SESSION['user']['id'];
	$sql = "INSERT INTO invoices VALUES(NULL,current_timestamp(),'$total_amount','$receiver','$address','$phone',0,NULL,'$id_customer')";
	$result = mysqli_query($conn,$sql);
	if ($result == false) {
		echo "Error:".mysqli_error($conn);
	}
	else{
		//lay ra hoa don vua tao
		$id_invoice = mysqli_insert_id($conn);
		// them luon hoa don chi tiet
		foreach ($_SESSION['cart'] as $id_product => $id_quantity) {
			$sql = "INSERT INTO invoice_details VALUES('$id_invoice','$id_product','$id_quantity')";
			$result = mysqli_query($conn,$sql);
			if ($result == false) {
				echo "error:".mysqli_query($conn);
			}
		}
		unset($_SESSION['cart]']);
		//sau khi them thanh cong -> chuyen huwowng sang hoa don chi tiet
		header("location:index.php?module=invoice&action=details&id=$id_invoice");
		die();
	}
}
 ?>


<?php
$title = "Thanh toán";
require_once("layout/header.php");
 ?>
<style type="text/css">
	.checkout form{
		width: 60%;
		margin: auto;
		background-color: #EEE;
		font-size: large;
		padding: 16px;
	}
</style>
<script type="text/javascript">
	function orderConfirm() {
		return confirm ("Bạn có xác nhận thanh toán!");
	}
</script>
 <div class="checkout" >
 	<?php 
 		// lay ra thong tin ng dang nhap
 	$id = $_SESSION['user']['id'];
 	$sql = "SELECT name,phone_no,address FROM customers WHERE id= '$id'";
 	$result = mysqli_query($conn,$sql);
 	if ($result == false) {
 		echo "error:".mysqli_error($conn);
 	}
 	else if(mysqli_num_rows($result) == 1){
 		$row = mysqli_fetch_assoc($result);
 		$name = $row['name'];
 		$phone = $row['phone_no'];
 		$address = $row['address'];
 	}

 	 ?>
 	<form method="POST">
 		<input type="text" name="receiver" value="<?php echo $name; ?>" placeholder="Người nhận:" required>
 		<br>
 		<input type="tel" name="phone" value="<?php echo $phone; ?>" placeholder="Số điện thoại:" required>
 		<br>
 		<input type="text" name="address" value="<?php echo $address; ?>" required placeholder="Địa chỉ:">
 		<br>
 		<p>Thanh toán</p>
 		<p>Ship Cod</p>
 		<p>Tổng tiền: 
 			<?php 
 			if (isset($_SESSION['total_amount'])) {
 				echo $_SESSION['total_amount']."VNĐ";
 			}
 				
 			 ?>
 		</p>
 		<button type="submit" name="btn" onclick="return orderConfirm()">Xác nhận</button>
 	</form>
 </div>


<?php 
require_once("layout/footer.php");
?>