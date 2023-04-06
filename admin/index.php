<?php
session_start();
include('../db/connect.php');
?>
<?php
// session_destroy();
// unset('dangnhap');
if (isset($_POST['dangnhap'])) {
	$taikhoan = $_POST['taikhoan'];
	$matkhau = md5($_POST['matkhau']);
	if ($taikhoan == '' || $matkhau == '') {
		echo '<p>Vui lòng nhập đủ</p>';
	} else {
		$sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_admin WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
		$count = mysqli_num_rows($sql_select_admin);
		$row_dangnhap = mysqli_fetch_array($sql_select_admin);
		if ($count > 0) {
			$_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
			$_SESSION['admin_id'] = $row_dangnhap['admin_id'];
			header('Location: dashboard.php');
		} else {
			echo '<p>Tài khoản hoặc mật khẩu sai</p>';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Đăng nhập Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<script src="public/js/jquery.min.js"></script>
	<style>
		h2 {
			margin-top: 30px;
			font-family: sans-serif;
			font-weight: bold;
			box-shadow: 5px 5px 5px -5px gray;
		}

		#form {
			margin-left: 550px;
		}

		#taikhoan {
			margin-top: 30px;
			font-family: sans-serif;
		}

		#dangnhap {
			margin-left: 170px;
		}

		#quaylai {
			margin-left: 20px;
		}

		@font-face {
			font-family: "Pattaya-Regular";
			src: url(../Pattaya/Pattaya-Regular.ttf);
		}
	</style>
</head>

<body>
	<h2 align="center" style="font-family: Pattaya-Regular">Đăng Nhập Admin</h2>
	<div class="col-md-8">
		<div class="form-group" style="font-family: Pattaya-Regular">
			<form action="" method="POST" id="form">
				<label id="taikhoan" style="font-family: Pattaya-Regular">Tài Khoản</label>
				<input type="text" name="taikhoan" placeholder="Điền Email" class="form-control" required=""><br>
				<label>Mật Khẩu</label>
				<input type="password" name="matkhau" placeholder="Điền mật khẩu" class="form-control" required=""><br>
				<input type="submit" name="dangnhap" id="dangnhap" class="btn btn-success" value="Đăng nhập">
				<a href="../index.php" id="quaylai" class="btn btn-primary">Quay lại</a>
			</form>
		</div>
	</div>
</body>

</html>