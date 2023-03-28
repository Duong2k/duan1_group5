<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style>
		@font-face {
    		font-family: "Pattaya-Regular";
    		src: url(Pattaya/Pattaya-Regular.ttf);
		}
	</style>
</head>
<body>
<?php
	if(isset($_GET['huydon'])&& isset($_GET['magiaodich'])){
		$huydon = $_GET['huydon'];
		$magiaodich = $_GET['magiaodich'];
	}else{
		$huydon = '';
		$magiaodich = '';
	}
	$sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
	$sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
?>
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3"  style="font-family: Pattaya-Regular">Xem đơn hàng</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						
							<div class="row">
								<div class="donhang" style="margin-left: 20px; font-family: Pattaya-Regular">
									<?php
										if(isset($_SESSION['dangnhap_home'])){
										echo 'Đơn hàng : '.$_SESSION['dangnhap_home'];
										} 
									?>
								</div>
							<div class="col-md-12">
								
								<?php
								if(isset($_GET['khachhang'])){
									$id_khachhang = $_GET['khachhang'];
								}else{
									$id_khachhang = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM tbl_giaodich WHERE tbl_giaodich.khachhang_id='$id_khachhang' GROUP BY tbl_giaodich.magiaodich"); 
								?> 
								<table class="table table-hover" border="0.5" style="margin-top: 20px">
									<tr style="font-family: Pattaya-Regular">
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
										<th>Ngày đặt</th>
										<th>Quản lý</th>
										<th>Tình trạng</th>
										<th>Yêu cầu</th>
									</tr>
									<?php
									$i = 0;
									while($row_donhang = mysqli_fetch_array($sql_select)){ 
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row_donhang['magiaodich']; ?></td>
				
										<td><?php echo $row_donhang['ngaythang'] ?></td>
										<td><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>">Xem chi tiết</a></td>
										<td><?php 
										if($row_donhang['tinhtrangdon']==0){
											echo '<span class="badge bg-info">Chờ xử lý</span>';
										}else if($row_donhang['tinhtrangdon']==1){
											echo '<span class="badge bg-success">Đã xử lý</span>';
										}else if($row_donhang['tinhtrangdon']==2){
											echo '<span class="badge bg-warning">Đang giao</span>';
										}else{
											echo '<span class="badge bg-success">Hoàn thành</span>';
										}
										?></td>
										<td>
											<?php
											if($row_donhang['huydon']==0){ 
											?>
											<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1">Yêu cầu hủy</a>
											<?php
										}elseif($row_donhang['huydon']==1){											
											?>
											<p>Đang chờ hủy...</p>
											<?php
											}else{
												echo 'Đã hủy';
											}
											?>
										</td>
									</tr>
									 <?php
									} 
									?> 
								</table>
							</div>


							<div class="col-md-12">
								<h5 style="margin-top: 20px; font-family: Pattaya-Regular">Chi tiết đơn hàng</h5><br>
								<?php
								if(isset($_GET['magiaodich'])){
									$magiaodich = $_GET['magiaodich'];
								}else{
									$magiaodich = '';
								}
								$sql_select = mysqli_query($con,"SELECT * FROM tbl_giaodich,tbl_khachhang,tbl_sanpham WHERE tbl_giaodich.sanpham_id=tbl_sanpham.sanpham_id AND tbl_khachhang.khachhang_id=tbl_giaodich.khachhang_id AND tbl_giaodich.magiaodich='$magiaodich' ORDER BY tbl_giaodich.giaodich_id DESC"); 
								?> 
								<table class="table table-hover" border="0.5">
									<tr style="font-family: Pattaya-Regular">
										<th>STT</th>
										<th>Mã giao dịch</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Ngày đặt</th>
										<th>Khách Hàng</th>
										<th>Số ĐT</th>
										<th>Địa Chỉ</th>
										<th>Email</th>
										
									</tr>
									<?php
									$i = 0;
									while($row_donhang = mysqli_fetch_array($sql_select)){ 
										$i++;
									?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['magiaodich']; ?></td>
									
										<td><?php echo $row_donhang['sanpham_name']; ?></td>

										<td><?php echo $row_donhang['soluong']; ?></td>
										
										<td><?php echo $row_donhang['ngaythang'] ?></td>
									
										<td><?php echo $row_donhang['name'] ?></td>

										<td><?php echo $row_donhang['phone'] ?></td>

										<td><?php echo $row_donhang['address'] ?></td>

										<td><?php echo $row_donhang['email'] ?></td>
									</tr>
									 <?php
									} 
									?> 
								</table>
							</div>
							</div>

						
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				
			</div>
		</div>
	</div>
	<!-- //top products -->
</body>
</html>
