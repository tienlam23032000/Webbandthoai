<?php 
$title = "Danh sách sản phẩm" ;
require_once("layout/header.php") 
?>
<style type="text/css">
	.list-products{
 		padding:16px;
 	}
 	.list-products table{
 		width: 100%
 		text: center;
 		font-size: larger;
 	}
 	.list-products table,tr,td,th{
 		border: 1px solid black;
 		border-collapse: collapse ;
 	}
 	a{
 		text-decoration: none;
 	}
</style>

<div class="list-products" >
	<a href="index.php?module=products&action=insert"> <i class="fa fa-plus" ></i> Thêm điện thoại:</a>
	<br><br>
	<table>
		<tr>
			<th>ID</th>
			<th>Sản phẩm</th>
			<th>Giá</th>
			<th>Tình trạng</th>
			<th colspan="2" >Thao tác</th>
		</tr>
		<?php 
			$sql = "SELECT id,name,price,status,url FROM products";
			$result = mysqli_query($conn,$sql);
			if($result ==false){
				echo "Error:".mysqli_error($conn);
			}
			else if(mysqli_num_rows($result)==0){
				echo "<tr><th conspan='6' >Chưa có sản phẩm</th></tr>";
			}
			else{
				foreach ($result as $row ) {
					echo "<tr>";
						$id = $row['id'];
						echo "<td>".$row['id']."</td>";
						echo "<td>";
							echo "<b>".$row['name']."</b><br>";
							$url = $row['url'];
							echo "<img src='$url' width='100px' >";
						echo "</td>";
						echo "<td>".number_format($row['price'])."VNĐ</td>";
						echo "<td>";
							echo $row['status'];
						echo "</td>";
						echo "<td>";
							echo "<a href='index.php?module=products&action=edit&id=$id'>  <i class='fa fa-crop' ></i> Sửa</a>";
						echo "</td>";
						echo "<td>";
							echo "<a href='index.php?module=products&action=delete&id=$id'> <i class='fa fa-times' ></i> Xóa</a>";
						echo "</td>";
					echo "</tr>";
				}
			}
			?>
	</table>
</div>
 <?php require_once("layout/footer.php")
  ?>