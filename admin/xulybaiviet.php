<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../admin/js/jquery.min.js"></script>
</head>

<body>
  <?php
  include('../db/connect.php');
  ?>
  <?php
  if (isset($_POST['thembaiviet'])) {
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';

    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $sql_insert_product = mysqli_query($con, "INSERT INTO tbl_baiviet(tenbaiviet,tomtat,noidung,danhmuctin_id,baiviet_image) values ('$tenbaiviet','$mota','$chitiet','$danhmuc','$hinhanh')");
    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
  } elseif (isset($_POST['capnhatbaiviet'])) {
    $id_update = $_POST['id_update'];
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../uploads/';
    if ($hinhanh == '') {
      $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$chitiet',tomtat='$mota',danhmuctin_id='$danhmuc' WHERE baiviet_id='$id_update'";
    } else {
      move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
      $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$chitiet',tomtat='$mota',danhmuctin_id='$danhmuc',baiviet_image='$hinhanh' WHERE baiviet_id='$id_update'";
    }
    mysqli_query($con, $sql_update_image);
  }

  ?>
  <?php
  if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con, "DELETE FROM tbl_baiviet WHERE baiviet_id='$id'");
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Quản Trị Bài Viết</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  </head>

  <body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
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
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../images/anh3.jpg" width="50px" height="70" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><b> Dương</b></p>
          <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
        </div>
      </div>
      <hr>
      <ul class="app-menu">
        <li><a class="app-menu__item haha" href="xulybieudo.php"><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>

        <li><a class="app-menu__item " href="xulynhanvien.php"><i class='app-menu__icon bx bx-id-card'></i> <span class="app-menu__label">Quản lý nhân viên</span></a></li>

        <li><a class="app-menu__item" href="xulykhachhang.php"><i class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>

        <li><a class="app-menu__item" href="xulysanpham.php"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a></li>

        <li><a class="app-menu__item" href="xulydonhang.php"><i class='app-menu__icon bx bx-cart-alt'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>

        <li><a class="app-menu__item" href="xulybinhluan.php"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý bình luận</span></a></li>

        <li><a class="app-menu__item" href="xulydanhmuc.php"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý danh mục
            </span></a></li>

        <li><a class="app-menu__item" href="xulydanhmucbaiviet.php"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý danh mục bài viết
            </span></a></li>

        <li><a class="app-menu__item" href="xulybaiviet.php"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý bài viết
            </span></a></li>

      </ul>
    </aside>

    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item active"><a href="#"><b>Danh sách bài viết</b></a></li>
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
                  <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
                </div>

                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
                </div>

                <div class="col-sm-2">
                  <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
                </div>
                <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i> Xóa tất cả </a>
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <?php
                  if (isset($_GET['quanly']) == 'capnhat') {
                    $id_capnhat = $_GET['capnhat_id'];
                    $sql_capnhat = mysqli_query($con, "SELECT * FROM tbl_baiviet WHERE baiviet_id='$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    $id_category_1 = $row_capnhat['danhmuctin_id'];
                  ?>
                    <div class="col-md-12">
                      <h4 style="margin-top: 20px">Cập Nhật Bài Viết</h4>

                      <form action="" method="POST" enctype="multipart/form-data">
                        <label>Tên bài viết</label>
                        <input type="text" class="form-control" name="tenbaiviet" value="<?php echo $row_capnhat['tenbaiviet'] ?>"><br>
                        <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['baiviet_id'] ?>">
                        <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="hinhanh"><br>
                        <img src="../uploads/<?php echo $row_capnhat['baiviet_image'] ?>" height="80" width="80"><br><br>


                        <label>Mô tả</label>
                        <textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['tomtat'] ?></textarea><br>
                        <label>Chi tiết</label>
                        <textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['noidung'] ?></textarea><br>
                        <label>Danh mục</label>
                        <?php
                        $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");
                        ?>
                        <select name="danhmuc" class="form-control">
                          <option value="0">-----Chọn danh mục-----</option>
                          <?php
                          while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                            if ($id_category_1 == $row_danhmuc['danhmuctin_id']) {
                          ?>
                              <option selected value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                            } else {
                            ?>
                              <option value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                          <?php
                            }
                          }
                          ?>
                        </select><br>
                        <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-success">
                        <a href="xulybaiviet.php" class="btn btn-danger">Quay lại</a>
                      </form>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="col-md-12">
                      <h4 style="margin-top: 20px">Thêm bài viết</h4>

                      <form action="" method="POST" enctype="multipart/form-data" style="margin-top: 30px">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="tenbaiviet" placeholder="Tên bài viết"><br>
                        <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="hinhanh"><br>

                        <label>Mô tả</label>
                        <textarea class="form-control" name="mota"></textarea><br>
                        <label>Chi tiết</label>
                        <textarea class="form-control" name="chitiet"></textarea><br>
                        <label>Danh mục</label>
                        <?php
                        $sql_danhmuc = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");
                        ?>
                        <select name="danhmuc" class="form-control">
                          <option value="0">-----Chọn danh mục-----</option>
                          <?php
                          while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                          ?>
                            <option value="<?php echo $row_danhmuc['danhmuctin_id'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                          <?php
                          }
                          ?>
                        </select><br>
                        <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-success">
                      </form>
                    </div>
                  <?php
                  }

                  ?>
                  <div class="col-md-12">
                    <h4 style="margin-top: 60px">Liệt Kê Bài Viết</h4>
                    <?php
                    $sql_select_bv = mysqli_query($con, "SELECT * FROM tbl_baiviet,tbl_danhmuc_tin WHERE tbl_baiviet.danhmuctin_id=tbl_danhmuc_tin.danhmuctin_id ORDER BY tbl_baiviet.baiviet_id DESC");
                    ?>
                    <table class="table table-hover" border="0.5">
                      <tr>
                        <th>Thứ tự</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
                        <th>Quản lý</th>
                      </tr>
                      <?php
                      $i = 0;
                      while ($row_bv = mysqli_fetch_array($sql_select_bv)) {
                        $i++;
                      ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $row_bv['tenbaiviet'] ?></td>
                          <td><img src="../uploads/<?php echo $row_bv['baiviet_image'] ?>" height="100" width="80"></td>

                          <td><?php echo $row_bv['tendanhmuc'] ?></td>

                          <td>
                            <a href="?xoa=<?php echo $row_bv['baiviet_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">Xóa</a>
                            <a href="xulybaiviet.php?quanly=capnhat&capnhat_id=<?php echo $row_bv['baiviet_id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
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
    <script type="text/javascript">
      $('#sampleTable').DataTable();
    </script>
    <script>
      function deleteRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("myTable").deleteRow(i);
      }
      jQuery(function() {
        jQuery(".trash").click(function() {
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
      $('#all').click(function(e) {
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
      var myApp = new function() {
        this.printTable = function() {
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
      $("#show-emp").on("click", function() {
        $("#ModalUP").modal({
          backdrop: false,
          keyboard: false
        })
      });
    </script>
  </body>

  </html>