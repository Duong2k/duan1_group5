<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
	<style>
		@font-face {
    		font-family: "Pattaya-Regular";
    		src: url(Pattaya/Pattaya-Regular.ttf);
		}
	</style>
</head>
<body>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'"); 

	if(isset($_GET['xoa'])){
		$id = $_GET['xoa'];
		$sql_delete = mysqli_query($con, "DELETE FROM tbl_comment WHERE comment_id = '$id'");
	}

	if (isset($_SESSION['dangnhap_home']) && isset($_POST['comment'])) {
		$date = date("Y/m/d");
		$ten = $_POST['ten'];
		$user = $_SESSION['dangnhap_home'];
		$content = $_POST['commentPro'];
		$sql_binhluan = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email = '$user'");
		while($row_binhluan = mysqli_fetch_array($sql_binhluan)){
			$khachhang_id = $row_binhluan['id'];
		}
		$sql = mysqli_query($con, "INSERT INTO tbl_comment (content,ten,sanpham_id,date_add) VALUES ('$content','$ten','$id','$date')");
	}elseif (isset($_SESSION['dangnhap_home']) && isset($_POST['comment'])) {
		$date = date("Y/m/d");
		$user = $_SESSION['dangnhap_home'];
		$content = $_POST['commentPro'];
		$sql_binhluan = mysqli_query($con, "SELECT * FROM tbl_khachhang WHERE email = '$user'");
		while($row_binhluan = mysqli_fetch_array($sql_binhluan)){
			$khachhang_id = $row_binhluan['id'];
		}
		$sql = mysqli_query($con, "INSERT INTO tbl_comment (content,ten,sanpham_id,date_add) VALUES ('$content','$ten','$id','$date')");
	
	} elseif (!isset($_SESSION['dangnhap_home']) && isset($_POST['comment'])) {
		echo "<script>alert('Vui lòng đăng nhập trước khi bình luận!')</script>";
	}

?>
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short" style="font-family: Pattaya-Regular">
				<li>
					<a href="index.php">Trang Chủ</a>
					<i>|</i>
				</li>
				<li>Sản Phẩm</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<?php
	while($row_chitiet = mysqli_fetch_array($sql_chitiet)){ 
	?>
<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->

		<!-- //tittle heading -->
		<div class="row">
			<div class="col-lg-5 col-md-8 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="images/<?php echo $row_chitiet['sanpham_image'] ?>">
								<div class="thumb-image">
									<img src="images/<?php echo $row_chitiet['sanpham_image'] ?>" data-imagezoom="true"
										class="img-fluid" alt="">
								</div>
							</li>


						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			<div class="col-lg-7 single-right-left simpleCart_shelfItem">
				<h3 class="mb-3" style="font-family: Pattaya-Regular; color: green">
					<?php echo $row_chitiet['sanpham_name'] ?>
				</h3>
				<p class="mb-3">
					<span class="item_price" style="font-family: Pattaya-Regular; font-weight: bold; font-size: 30px">
						<?php echo number_format($row_chitiet['sanpham_giakhuyenmai']).'<span> VNĐ</span>' ?>
					</span>
					<span class="mx-3 font-weight-bold" style="font-family: Pattaya-Regular; text-decoration: line-through; font-size: 20px">
						<?php echo number_format($row_chitiet['sanpham_gia']).'<span> VNĐ</span>' ?>
					</span><br><br>
					<span style="font-family: Pattaya-Regular; font-weight: bold; color: black">
						<?php echo $row_chitiet['sanpham_gift'] ?>
					</span><br>
					<label style="font-family: Pattaya-Regular; color: #007AFF; font-weight: bold">Miễn Phí Vận Chuyển</label>
				</p>
				
				<div style="font-family: Pattaya-Regular">
					<h4 style="font-family: Pattaya-Regular">Chọn Size</h4><br>
						<select name="size" id="size" class="controls form-group" style="width: 150px; margin-right: 50px">
							<option value="M">Size M</option>
							<option value="L">Size L</option>
							<option value="XL">Size XL</option>
							<option value="XXL">Size XXL</option>
						</select>
						Tình trạng: <?= $tt = $row_chitiet['sanpham_soluong'] != 0 ? "Còn hàng" : "Hết hàng" ?>
				</div>

				<div class="product-single-w3l"><br>
					<p style="font-size: 15px; font-family: Pattaya-Regular">
						<?php echo $row_chitiet['sanpham_mota'] ?>
					</p><br>
					<p style="font-size: 15px; font-family: Pattaya-Regular">
						<?php echo $row_chitiet['sanpham_chitiet'] ?>
					</p><br>
				</div>
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="?quanly=giohang" method="post">
							<fieldset>
								<input type="hidden" name="tensanpham"
									value="<?php echo $row_chitiet['sanpham_name'] ?>" />
								<input type="hidden" name="sanpham_id"
									value="<?php echo $row_chitiet['sanpham_id'] ?>" />
								<input type="hidden" name="giasanpham"
									value="<?php echo $row_chitiet['sanpham_gia'] ?>" />
								<input type="hidden" name="hinhanh"
									value="<?php echo $row_chitiet['sanpham_image'] ?>" />
								<input type="hidden" name="sanpham_gift"
									value="<?php echo $row_chitiet['sanpham_gift'] ?>" />
								<input type="hidden" name="size" value="<?php echo $row_chitiet['sanpham_size'] ?>" />
								<input type="hidden" name="soluong" value="1" />
								<input type="submit" name="themgiohang" value="Thêm Vào Giỏ Hàng" class="button" style="font-family: Pattaya-Regular"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

		<div class="col-md-8 col-md-9 col-md-12">
			<div class="information-wrapper" style="font-family: Pattaya-Regular">
				<h3 style="font-family: Pattaya-Regular; color: #D60404">Đánh giá sản phẩm</h3><br><br>
					<form action="" method="post" style="padding-bottom: 200px">
						<div class="controls form-group">
							<label for="">Tên khách hàng</label><br>
							<input type="text" name="ten" class="form-control" required="required" style="margin-top:5px">
						</div>
						<div class="controls form-group">
							<label for="">Nội dung</label><br>
							<textarea name="commentPro" id="inputcommentPro" class="form-control" style="margin-top:5px" required="required"></textarea> <br>
						</div>
						<button type="submit" name="comment" class="btn btn-danger">Bình luận</button>
					</form>
				<?php
				$sql_binhluan = mysqli_query($con, "SELECT * FROM tbl_comment WHERE sanpham_id = '$id'");
					while($row_binhluan = mysqli_fetch_array($sql_binhluan)){ ?>
						<div style="border-bottom:1px solid #cdcdcd">
							<b><?= $row_binhluan['ten'] ?></b> <span style="float:right;font-size:10px"><?= $row_binhluan['date_add'] ?></span>
							<p class="m_text" style="font-family: Pattaya-Regular"><?= $row_binhluan['content'] ?></p>
							<a href="?quanly=chitietsp&xoa=<?php echo $row_binhluan['comment_id'] ?>" style="font-size:10px">Xóa</a>
						</div>
				<?php } ?>
			</div>
		</div>
		
		<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
		<h3 style="font-family: Pattaya-Regular">Sản Phẩm Tương Tự</h3>
			<div class="row">
				<?php
					$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sanpham ORDER BY RAND() LIMIT 5"); 
				 	while($row_chitiet = mysqli_fetch_array($sql_chitiet)){ ?>
						<div class="col-md-3 product-men mt-4" style="font-family: Pattaya-Regular">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
								<a href="?quanly=chitietsp&id=<?php echo $row_chitiet['sanpham_id'] ?>">
									<img src="images/<?= $row_chitiet['sanpham_image'] ?>" alt="" width="150px" height="150px">	
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="?quanly=chitietsp&id=<?php echo $row_chitiet['sanpham_id'] ?>"
											class="link-product-add-cart">Xem sản phẩm</a>
										</div>
									</div>
								</a>
								<div class="item-info-product text-center border-top mt-4">
								<h4 class="pt-1" style="font-family: Pattaya-Regular">
								<a href=""><?php echo $row_chitiet['sanpham_name'] ?></a></h4>
									<div class="info-product-price my-2">
										<span class="item_price">
											<a href="" class="price-mar mt-2"><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']).'VNĐ' ?></a>
										</span>
										<span style="text-decoration: line-through">
											<?php echo number_format($row_chitiet['sanpham_gia']).'VNĐ' ?>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
			
		<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
			<h3 style="font-family: Pattaya-Regular">Sản Phẩm Bán Chạy</h3>
			<div class="row">
				<?php
					$sql_product_sidebar = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_hot='0' ORDER BY sanpham_id DESC"); 
					while($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)){ ?>
						<div class="col-md-3 product-men mt-4" style="font-family: Pattaya-Regular">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="images/<?php echo $row_sanpham_sidebar['sanpham_image'] ?>" alt="" class="img-fluid" width="180px">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="?quanly=chitietsp&id=<?php echo $row_sanpham_sidebar['sanpham_id'] ?>"
													class="link-product-add-cart">Xem sản phẩm</a>
											</div>
										</div>
									</div>
							<div class="item-info-product text-center border-top mt-4">
								<h4 class="pt-1" style="font-family: Pattaya-Regular">
								<a href=""><?php echo $row_sanpham_sidebar['sanpham_name'] ?></a></h4>
									<div class="info-product-price my-2">
										<span class="item_price">
											<a href="" class="price-mar mt-2"><?php echo number_format($row_sanpham_sidebar['sanpham_giakhuyenmai']).'VNĐ' ?></a>
										</span>
										<span style="text-decoration: line-through">
											<?php echo number_format($row_sanpham_sidebar['sanpham_gia']).'VNĐ' ?>
										</span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<!-- //Single Page -->

</body>
</html>
