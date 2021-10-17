<?php 
$title = "Quản lý loai";
require_once("layout/header.php");
 ?>
 <style type="text/css">
 	.list-types{
 		padding:16px;
 	}
 	.list-types table{
 		width: 100%
 		text: center;
 		font-size: larger;
 	}
 	.list-types table,tr,td,th{
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
 <div class="list-types">
 	<a href="index.php?module=types&action=insert"> <i class="fa fa-plus" ></i> Thêm loại điện thoại:</a>
 	<br><br>
 	<table>
 		<tr>
 			<th>ID</th>
 			<th>Tên loại mặt hàng</th>
 			<th colspan="2" >Thao tác</th>
 		</tr>
 		<a href=""></a>
 		<?php 
 			$sql = "SELECT * FROM types";
 			$result = mysqli_query($conn,$sql);
 			if($result == false){
 				echo "Error: ".mysqli_error($conn);
 			}
 			else{
 				// co ban ghi
 				foreach ($result as $row ) {
 					echo "<tr>";
	 					echo"<td>".$row['id']."</td>";
	 					echo"<td>".$row['name']."</td>";
	 					echo "<td>";
		 					$id = $row['id'];
		 					echo "<a href='index.php?module=types&action=edit&id=$id'> <i class='fa fa-crop' ></i> Sửa</a>";
	 					echo "</td>";
	 					echo "<td>";
		 					$id = $row['id'];
		 					echo "<a onclick = 'return confirmDelete()' href='index.php?module=types&action=delete&id=$id'> <i class='fa fa-times' ></i> Xóa</a>";
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