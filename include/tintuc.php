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
	if(isset($_GET['id_tin'])){
		$id_danhmuc = $_GET['id_tin'];
	}else{
		$id_danhmuc = '';
	}
?>
<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short" style="font-family: Pattaya-Regular">
					<li>
						<a href="index.php">Trang chủ</a>
						<i>|</i>
					</li>
					<?php
					$sql_tendanhmuc = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin WHERE danhmuctin_id='$id_danhmuc'");
					$row_danh = mysqli_fetch_array($sql_tendanhmuc); 
					?>		
					<li><?php echo $row_danh['tendanhmuc'] ?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<?php
					$sql_tendanhmuc1 = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin WHERE danhmuctin_id='$id_danhmuc'");
					$row_danh1 = mysqli_fetch_array($sql_tendanhmuc1); 
					?>
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3" style="font-family: Pattaya-Regular">
				<?php echo $row_danh1['tendanhmuc'] ?></h3>
			<!-- //tittle heading -->
			<?php 
			$sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin,tbl_baiviet WHERE tbl_danhmuc_tin.danhmuctin_id = tbl_baiviet.danhmuctin_id AND tbl_danhmuc_tin.danhmuctin_id='$id_danhmuc'");
			while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
			?>
			<div class="row">
				<div class="col-lg-4 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="images/<?php echo $row_baiviet['baiviet_image'] ?>" class="img-fluid" alt=" ">
				</div>
				<div class="col-lg-8 welcome-left">
					<h5 style="font-family: Pattaya-Regular"><a href="index.php?quanly=chitiettin&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>"><?php echo $row_baiviet['tenbaiviet'] ?></a></h5>
					<h4 class="my-sm-3 my-2" style="font-family: Pattaya-Regular"><?php echo $row_baiviet['tomtat'] ?></h4>
				</div>
			</div><br>
			<?php
			} 
			?>


		</div>
	</div>
	<!-- //about -->
</body>
</html>