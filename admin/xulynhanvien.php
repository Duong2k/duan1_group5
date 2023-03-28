<?php
	include('../db/connect.php');
?>
<?php
	if(isset($_POST['themnhanvien'])){
		$tennhanvien = $_POST['tennhanvien'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$ngaysinh = $_POST['ngaysinh'];
		$noisinh = $_POST['noisinh'];
		$gender = $_POST['gender'];
		$chucvu = $_POST['chucvu'];
		$bangcap = $_POST['bangcap'];
		$socc = $_POST['socc'];
    $lydo = $_POST['lydo'];
    $tinhtrang = $_POST['tinhtrang'];
    $sanpham = $_POST['sanpham_id'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_staff = mysqli_query($con,"INSERT INTO tbl_nhanvien(nhanvien_name,images,email,phone,ngaysinh,noisinh,gender,chucvu,bangcap,socc,lydo,tinhtrang,sanpham_id) values 
        ('$tennhanvien','$hinhanh','$email','$phone','$ngaysinh','$noisinh','$gender','$chucvu','$bangcap','$socc','$lydo','$tinhtrang','$sanpham')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatnhanvien'])) {
		$id_update = $_POST['id'];
		$tennhanvien = $_POST['tennhanvien'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$ngaysinh = $_POST['ngaysinh'];
		$noisinh = $_POST['noisinh'];
		$gender = $_POST['gender'];
		$chucvu = $_POST['chucvu'];
		$sanpham = $_POST['sanpham_id'];
		$bangcap = $_POST['bangcap'];
		$socc = $_POST['socc'];
    $lydo = $_POST['lydo'];
    $tinhtrang = $_POST['tinhtrang'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_nhanvien SET nhanvien_name='$tennhanvien',email='$email',phone='$phone',ngaysinh='$ngaysinh',noisinh='$noisinh',gender='$gender',chucvu='$chucvu',bangcap='$bangcap',
      socc='$socc',lydo='$lydo',tinhtrang='$tinhtrang',sanpham_id='$sanpham' WHERE nhanvien_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_nhanvien SET nhanvien_name='$tennhanvien',images='$hinhanh',email='$email',phone='$phone',ngaysinh='$ngaysinh',noisinh='$noisinh',gender='$gender',chucvu='$chucvu',bangcap='$bangcap',
      socc='$socc',lydo='$lydo',tinhtrang='$tinhtrang',sanpham_id='$sanpham' WHERE nhanvien_id='$id_update'";
		}
		mysqli_query($con,$sql_update_image);
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_nhanvien WHERE nhanvien_id='$id'");
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Quản Trị Nhân Viên</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
</head>
<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="index.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../images/anh3.jpg" width="50px"
        height= "70" alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Văn Dương</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="xulybieudo.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>

      <li><a class="app-menu__item " href="xulynhanvien.php"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Quản lý nhân viên</span></a></li>

      <li><a class="app-menu__item" href="xulykhachhang.php"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Quản lý khách hàng</span></a></li>

      <li><a class="app-menu__item" href="xulysanpham.php"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span 
            class="app-menu__label">Quản lý sản phẩm</span></a></li>

      <li><a class="app-menu__item" href="xulydonhang.php"><i class='app-menu__icon bx bx-cart-alt'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>

      <li><a class="app-menu__item" href="xulybinhluan.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý bình luận</span></a></li>

      <li><a class="app-menu__item" href="xulydanhmuc.php"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý danh mục
          </span></a></li>

      <li><a class="app-menu__item" href="xulydanhmucbaiviet.php"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý danh mục bài viết
          </span></a></li>

      <li><a class="app-menu__item" href="xulybaiviet.php"><i class='app-menu__icon bx bx-run'></i><span
            class="app-menu__label">Quản lý bài viết
          </span></a></li>

    </ul>
  </aside>

  <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhân viên</b></a></li>
        </ul>
        <div id="clock"></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="row element-button">
                <div class="col-sm-2">
  
                  <a class="btn btn-add btn-sm" href="form-add-don-hang.html" title="Thêm"><i class="fas fa-plus"></i>
                    Tạo mới đơn hàng</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                      class="fas fa-file-upload"></i> Tải từ file</a>
                </div>
  
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                      class="fas fa-print"></i> In dữ liệu</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                      class="fas fa-copy"></i> Sao chép</a>
                </div>
  
                <div class="col-sm-2">
                  <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                      class="fas fa-file-pdf"></i> Xuất PDF</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                      class="fas fa-trash-alt"></i> Xóa tất cả </a>
                </div>
              </div>

	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_nhanvien WHERE nhanvien_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
        $id_sanpham_1 = $row_capnhat['sanpham_id'];
				?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4 style="margin-top: 20px">Cập Nhật Nhân Viên</h4>
				
				<form action="" method="POST" enctype="multipart/form-data"  style="margin-top: 30px">
					<label>Tên nhân viên</label>
					<input type="text" class="form-control" name="tennhanvien" value="<?php echo $row_capnhat['nhanvien_name'] ?>"><br>
					<input type="hidden" class="form-control" name="id" value="<?php echo $row_capnhat['nhanvien_id'] ?>">
					<label>Email</label><br>
					<input type="text" class="form-control" name="email" value="<?php echo $row_capnhat['email'] ?>"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../uploads/<?php echo $row_capnhat['images'] ?>" height="80" width="80"><br><br>
					<label>Số điện thoại</label>
					<input type="number" class="form-control" name="phone" value="<?php echo $row_capnhat['phone'] ?>"><br>
					<label>Ngày sinh</label>
					<input type="date" class="form-control" name="ngaysinh" value="<?php echo $row_capnhat['ngaysinh'] ?>"><br>
					<label>Nơi sinh</label>
					<input type="text" class="form-control" name="noisinh" value="<?php echo $row_capnhat['noisinh'] ?>"><br>
					<label>Giới tính</label>
					<input type="text" class="form-control" name="gender" value="<?php echo $row_capnhat['gender'] ?>"><br>
					<label>Chức vụ</label>
					<input type="text" class="form-control" name="chucvu" value="<?php echo $row_capnhat['chucvu'] ?>"><br>
					<label>Bằng cấp</label>
					<input type="text" class="form-control" name="bangcap" value="<?php echo $row_capnhat['bangcap'] ?>"><br>
          <label>Lý do</label>
					<input type="text" class="form-control" name="lydo" value="<?php echo $row_capnhat['lydo'] ?>"><br>
          <label>Tình trạng</label>
					<input type="text" class="form-control" name="tinhtrang" value="<?php echo $row_capnhat['tinhtrang'] ?>"><br>
          <label>Số CCCD</label>
					<input type="number" class="form-control" name="socc" value="<?php echo $row_capnhat['socc'] ?>"><br>
					<label>Sản phẩm</label>
					<?php
					$sql_sanpham = mysqli_query($con,"SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC"); 
					?>
					<select name="sanpham_id" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
						while($row_sanpham = mysqli_fetch_array($sql_sanpham)){
							if($id_sanpham_1==$row_sanpham['sanpham_id']){
						?>
						<option selected value="<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></option>
						<?php 
							}else{
						?>
						<option value="<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></option>
						<?php
							}
						}
						?>
					</select><br>
					<input type="submit" name="capnhatnhanvien" value="Cập nhật nhân viên" class="btn btn-success">
          <a href="xulynhanvien.php" class="btn btn-danger">Quay lại</a>
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4 style="margin-top: 20px">Thêm nhân viên</h4>
				
				<form action="" method="POST" enctype="multipart/form-data" style="margin-top: 30px">
					<label>Tên nhân viên</label>
					<input type="text" class="form-control" name="tennhanvien" placeholder="Tên nhân viên"><br>
					<label>Email</label><br>
					<input type="text" class="form-control" name="email" placeholder="Email nhân viên"><br>

					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Số điện thoại</label>
					<input type="number" class="form-control" name="phone" placeholder="Số điện thoại"><br>
					<label>Ngày sinh</label>
					<input type="date" class="form-control" name="ngaysinh" placeholder="Ngày sinh"><br>
					<label>Nơi sinh</label>
					<input type="text" class="form-control" name="noisinh" placeholder="Nơi sinh"><br>
					<label>Giới tính</label>
					<input type="text" class="form-control" name="gender" placeholder="Giới tính"><br>     
					<label>Chức vụ</label>
					<input type="text" class="form-control" name="chucvu" placeholder="Chức vụ"><br>       
					<label>Bằng cấp</label>
					<input type="text" class="form-control" name="bangcap" placeholder="Bằng cấp"><br>       
          <label>Số CCCD</label>
					<input type="number" class="form-control" name="socc" placeholder="Số CCCD"><br>
          <label>Lý do</label>
					<input type="text" class="form-control" name="lydo" placeholder="Lý do"><br>
          <label>Tình trạng</label>
					<input type="text" class="form-control" name="tinhtrang" placeholder="Tình trạng"><br>
					<label>Sản phẩm</label>
					<?php
					$sql_sanpham = mysqli_query($con,"SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC"); 
					?>
					<select name="sanpham_id" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
						while($row_sanpham = mysqli_fetch_array($sql_sanpham)){
						?>
						<option value="<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<input type="submit" name="themnhanvien" value="Thêm nhân viên" class="btn btn-success">
				</form>
				</div>
				<?php } ?>
        
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4 style="margin-top: 60px">Liệt Kê Nhân Viên</h4>
				<?php
				$sql_select_nhanvien = mysqli_query($con,"SELECT * FROM tbl_nhanvien,tbl_sanpham WHERE tbl_nhanvien.sanpham_id=tbl_sanpham.sanpham_id ORDER BY tbl_nhanvien.nhanvien_id DESC"); 
				?> 
				<table class="table table-hover" border="0.5">
					<tr>
						<th>STT</th>
						<th>Tên nhân viên</th>
						<th>Hình ảnh</th>
						<th>Email</th>
						<th>SĐT</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
						<th>Giới tính</th>
						<th>Chức vụ</th>
            <th>Bằng cấp</th>
					</tr>
					<?php
					$i = 0;
					while($row_nhanvien = mysqli_fetch_array($sql_select_nhanvien)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_nhanvien['nhanvien_name'] ?></td>
						<td><img src="../uploads/<?php echo $row_nhanvien['images'] ?>" height="100" width="80"></td>
						<td><?php echo $row_nhanvien['email'] ?></td>
						<td><?php echo $row_nhanvien['phone'] ?></td>
						<td><?php echo $row_nhanvien['ngaysinh'] ?></td>
						<td><?php echo $row_nhanvien['noisinh'] ?></td>
						<td><?php echo $row_nhanvien['gender'] ?></td>
						<td><?php echo $row_nhanvien['chucvu'] ?></td>
						<td><?php echo $row_nhanvien['bangcap'] ?></td>

					</tr>
				<?php	} ?> 
				</table>
			</div>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4 style="margin-top: 60px">Quản Lý Nội Bộ</h4>
				<?php
				$sql_select_nhanvien = mysqli_query($con,"SELECT * FROM tbl_nhanvien,tbl_sanpham WHERE tbl_nhanvien.sanpham_id=tbl_sanpham.sanpham_id ORDER BY tbl_nhanvien.nhanvien_id DESC"); 
				?> 
				<table class="table table-hover" border="0.5">
					<tr>
						<th>STT</th>
						<th>Tên nhân viên</th>
            <th>Ngày sinh</th>
						<th>Chức vụ</th>
            <th>Lý do</th>
            <th>Tình trạng</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_nhanvien = mysqli_fetch_array($sql_select_nhanvien)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_nhanvien['nhanvien_name'] ?></td>
						<td><?php echo $row_nhanvien['ngaysinh'] ?></td>
						<td><?php echo $row_nhanvien['chucvu'] ?></td>
						<td><?php echo $row_nhanvien['lydo'] ?></td>
            <td><?php
              if($row_nhanvien['tinhtrang'] == 0){
                echo '<span class="badge bg-success">Làm việc</span>';
              }elseif($row_nhanvien['tinhtrang'] == 1){
                echo '<span class="badge bg-warning">Khóa tài khoản</span>';
              }elseif($row_nhanvien['tinhtrang'] == 2){
                echo '<span class="badge bg-danger">Sa thải</span>';
              } ?></td>

						<td>
							<a href="?xoa=<?php echo $row_nhanvien['nhanvien_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">Xóa</a>
							<a href="xulynhanvien.php?quanly=capnhat&id=<?php echo $row_nhanvien['nhanvien_id'] ?>" class="btn btn-primary" style="background: orange; color: #FFFDFF">Sửa</a></td>
					    </tr>
				<?php	} ?> 
				</table>
			</div>
		</div>
	</div>
</main>
	
	<!-- Essential javascripts for application to work-->
	<script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../js/jquery.table2excel.js"></script>
  <script src="../js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="../js/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <!-- Data table plugin-->
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/textarea.js"></script>

  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <script>
    function deleteRow(r) {
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("myTable").deleteRow(i);
    }
    jQuery(function () {
      jQuery(".trash").click(function () {
        swal({
          title: "Cảnh báo",
         
          text: "Bạn có chắc chắn là muốn xóa đơn hàng này?",
          buttons: ["Hủy bỏ", "Đồng ý"],
        })
          .then((willDelete) => {
            if (willDelete) {
              swal("Đã xóa thành công.!", {
                
              });
            }
          });
      });
    });
    oTable = $('#sampleTable').dataTable();
    $('#all').click(function (e) {
      $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
      e.stopImmediatePropagation();
    });

    //EXCEL
    // $(document).ready(function () {
    //   $('#').DataTable({

    //     dom: 'Bfrtip',
    //     "buttons": [
    //       'excel'
    //     ]
    //   });
    // });


    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
    //In dữ liệu
    var myApp = new function () {
      this.printTable = function () {
        var tab = document.getElementById('sampleTable');
        var win = window.open('', '', 'height=700,width=700');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();
      }
    }
    //     //Sao chép dữ liệu
    //     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

    // copyTextareaBtn.addEventListener('click', function(event) {
    //   var copyTextarea = document.querySelector('.js-copytextarea');
    //   copyTextarea.focus();
    //   copyTextarea.select();

    //   try {
    //     var successful = document.execCommand('copy');
    //     var msg = successful ? 'successful' : 'unsuccessful';
    //     console.log('Copying text command was ' + msg);
    //   } catch (err) {
    //     console.log('Oops, unable to copy');
    //   }
    // });


    //Modal
    $("#show-emp").on("click", function () {
      $("#ModalUP").modal({ backdrop: false, keyboard: false })
    });
  </script>
	
</body>
</html>