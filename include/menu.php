<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		#danhmuc{
			width: 160px;
			text-align: center;
			font-weight: bold;
			color: #4c5156;
			border: 1px solid #ced4da;
			display: block;
		}
		#danhmuc:focus{
			color: #495057;
  			background-color: #fff;
  			border-color: #80bdff;
  			outline: 0;
			box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
		}
		.nav-link{
			font-weight: bold;
			color: #4c5156;
			
		}
	</style>
</head>
<body>
<?php 
	$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
?>
<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search">
					<div class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link dropdown-toggle" href="#" id="danhmuc">Danh Mục</a>
							<div class="dropdown-menu">
								<?php
									while($row_category = mysqli_fetch_array($sql_category)) {
								?>
								<a class="dropdown-item" href="?quanly=danhmuc&id=<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name'] ?></a>
								<?php
							 	}
							?>
						</div>
					</div>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php">Trang Chủ
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<?php 
							$sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
							while($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){
						?>
						<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">

							<a class="nav-link " href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>" role="button"  aria-haspopup="true" aria-expanded="false">
								<?php echo $row_category_danhmuc['category_name'] ?>
							</a>
							
						</li>
						<?php
						} 
						?>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<?php
							$sql_danhmuctin = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC"); 

							?>
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Tin Tức
							</a>
							<div class="dropdown-menu">
								<?php
								while($row_danhmuctin = mysqli_fetch_array($sql_danhmuctin)){ 
								?>
								<a class="dropdown-item" href="?quanly=tintuc&id_tin=<?php echo $row_danhmuctin['danhmuctin_id'] ?>"><?php echo $row_danhmuctin['tendanhmuc'] ?></a>
								<?php
								} 
								?>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Liên Hệ</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
</body>
</html>
