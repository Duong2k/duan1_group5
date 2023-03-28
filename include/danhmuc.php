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
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_cate = mysqli_query($con,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");	
	$sql_category = mysqli_query($con,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");		

	$row_title = mysqli_fetch_array($sql_category);
	$title = $row_title['category_name'];		
	?>
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3" style="font-family: Pattaya-Regular"><?php echo $title ?></h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								<?php
								while($row_sanpham = mysqli_fetch_array($sql_cate)){ 
								?>
								<div class="col-md-3 product-men mt-4">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/<?php echo $row_sanpham['sanpham_image'] ?>" alt="" width="180px">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart">Xem sản phẩm</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4" style="font-family: Pattaya-Regular">
											<h4 class="pt-1" style="font-family: Pattaya-Regular">
												<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'<span> VNĐ</span>' ?></span>
												<del><?php echo number_format($row_sanpham['sanpham_gia']).'<span> VNĐ</span>' ?></del><br>
												<span class="item_gift"><?php echo $row_sanpham['sanpham_gift'] ?></span>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
												<fieldset>
													<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
													<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
													<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
													<input type="hidden" name="sanpham_gift" value="<?php echo $row_sanpham['sanpham_gift'] ?>" />
													<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
													<input type="hidden" name="soluong" value="1" />			
													<input type="submit" name="themgiohang" value="Thêm Vào Giỏ Hàng" class="button" />
												</fieldset>
											</form>
											</div>
										</div>
									</div>
								</div>
								<?php
								} 
								?>
							</div>
						</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
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
	<!-- //top products -->
</body>
</html>