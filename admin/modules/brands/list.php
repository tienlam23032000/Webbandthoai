<?php 
$title = "Quản lý hãng";
require_once("layout/header.php");
 ?>
 <style type="text/css">
 	.list-brands{
 		padding:16px;
 	}
 	.list-brands table{
 		width: 100%
 		text: center;
 		font-size: larger;
 	}
 	.list-brands table,tr,td,th{
 		border: 1px solid black;
 		border-collapse: collapse ;
 	}
 	a{
 		text-decoration: none;
 	}
 </style>
 <script type="text/javascript">
 	function confirmDelete(){
 		return confirm("Thao tác này sẽ xóa toàn bộ thông tin sản phẩm của bạn!");
 	}
 </script>
 <div class="list-brands">
 	<a href="index.php?module=brands&action=insert"> <i class="fa fa-plus" ></i> Thêm hãng điện thoại:</a>
 	<br><br>
 	<table>  
 		<tr>
 			<th>ID</th>
 			<th>Tên hãng</th>
 			<th>Xuất xứ</th>
 			<th colspan="2">Thao tác</th>
 		</tr>
 		<?php 
 			$sql = "SELECT * FROM brands";
 			$result = mysqli_query($conn,$sql);
 			if($result == false){
 				echo "Error: ".mysqli_error($conn);
 			}
 			else if(mysqli_num_rows($result)==0){
 				echo "<tr><th colspan='5'>Danh sách rỗng!</th></tr>";
 			}
 			else{
 				// co ban ghi
 				foreach ($result as $row ) {
 					echo "<tr>";
 					echo"<td>".$row['id']."</td>";
 					echo"<td>".$row['name']."</td>";
 					echo"<td>".$row['location']."</td>";
 					echo "<td>";
 						$id = $row['id'];
 						echo "<a href='index.php?module=brands&action=edit&id=$id'> <i class='fa fa-crop' ></i>Sửa</a>";
 					echo "</td>";
 					echo "<td>";
 						$id = $row['id'];
 						echo "<a onclick = 'return confirmDelete()' href='index.php?module=brands&action=delete&id=$id'>  <i class='fa fa-times' ></i> Xóa</a>";
 					echo "</td>";
 					echo "</tr>";
 				}
 			}
 		 ?>
 		 
 	</table>
 </div>

 <?php 
require_once("layout/footer.php");
  ?>