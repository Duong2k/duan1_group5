<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		html,
		body {
			position: relative;
			height: 100%;
		}

		body {
			background: #eee;
			font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
			font-size: 14px;
			color: #000;
		}

		.swiper {
			width: 73%;
			height: 100%;
		}


		.swiper-slide {
			text-align: center;
			font-size: 18px;

			/* Center slide text vertically */
			display: -webkit-box;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			-webkit-justify-content: center;
			justify-content: center;
			-webkit-box-align: center;
			-ms-flex-align: center;
			-webkit-align-items: center;
			align-items: center;
		}

		.swiper-slide img {
			display: block;
			width: 150px;
			height: 220px;
		}

		@font-face {
			font-family: "Pattaya-Regular";
			src: url(Pattaya/Pattaya-Regular.ttf);
		}
	</style>
</head>

<body>
	<!-- Swiper -->
	<div class="swiper mySwiper">
		<div class="swiper-wrapper" style="margin-top: 35px">
			<?php
			$sql_product_sidebar = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_hot='0' ORDER BY sanpham_id DESC");
			while ($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)) {
			?>
				<div class="swiper-slide">
					<div class="">
						<a href="?quanly=chitietsp&id=<?php echo $row_sanpham_sidebar['sanpham_id'] ?>"><img src="images/<?php echo $row_sanpham_sidebar['sanpham_image'] ?>" alt="" style="width: 140px; height: 200px"></a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- Swiper -->

	<!-- Swiper JS -->
	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper(".mySwiper", {
			centeredSlides: true,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			slidesPerView: 5,
			slidesPerGroup: 1,
			loop: true,
			loopFillGroupWithBlank: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
	</script>
	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<?php
						$sql_cate_home = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id DESC");
						while ($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
							$id_category = $row_cate_home['category_id'];
						?>
							<!-- first section -->
							<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
								<h3 class="heading-tittle text-center" style="font-family: Pattaya-Regular">
									<?php echo $row_cate_home['category_name'] ?>
								</h3>
								<div class="row">
									<?php
									$sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC");
									while ($row_sanpham = mysqli_fetch_array($sql_product)) {
										if ($row_sanpham['category_id'] == $id_category) {
									?>
											<div class="col-md-3 product-men mt-4" style="font-family: Pattaya-Regular">
												<div class="men-pro-item simpleCart_shelfItem">
													<div class="men-thumb-item text-center">
														<img src="images/<?php echo $row_sanpham['sanpham_image'] ?>" alt="" width="180px">
														<div class="men-cart-pro">
															<div class="inner-men-cart-pro">
																<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart">Xem sản phẩm</a>
															</div>
														</div>
													</div>
													<div class="item-info-product text-center border-top mt-4">
														<h4 class="pt-1" style="font-family: Pattaya-Regular">
															<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>">
																<?php echo $row_sanpham['sanpham_name'] ?>
															</a>
														</h4>
														<div class="info-product-price my-2">
															<span class="item_price">
																<?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) . '<span> VNĐ</span>' ?>
															</span>
															<del>
																<?php echo number_format($row_sanpham['sanpham_gia']) . '<span> VNĐ</span>' ?>
															</del><br>
															<span class="item_gift">
																<?php echo $row_sanpham['sanpham_gift'] ?>
															</span>
														</div>
														<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
															<form action="?quanly=giohang" method="post">
																<fieldset>
																	<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
																	<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
																	<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
																	<input type="hidden" name="gift" value="<?php echo $row_sanpham['sanpham_gift'] ?>" />
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
									}
									?>
								</div>
							</div>
							<!-- //first section -->
						<?php
						}
						?>

					</div>
				</div>
				<!-- //product left -->
			</div>
		</div>
	</div>
	</div>
	<!-- //top products -->

</body>

</html>