<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: index.php');
	 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<script src="../admin/js/jquery.min.js"></script>
</head>
<body>
	<p style="margin-left: 25px">Xin chào : <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat" onclick="return confirm('Bạn chắc chắn muốn đăng xuất chứ?')">Đăng Xuất</a></p>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">Đơn Hàng</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydanhmuc.php">Danh Mục</a>
	      </li>
		  <li class="nav-item active">
	        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh Mục Bài Viết</a>
	      </li>
		  <li class="nav-item active">
	        <a class="nav-link" href="xulybaiviet.php">Bài Viết</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="xulysanpham.php">Sản Phẩm</a>
	      </li>
	       <li class="nav-item active">
	        <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav>
</body>
</html>