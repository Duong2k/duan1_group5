<?php
include '../db/connect.php';
$sql_bieudo = mysqli_query($con, "SELECT tbl_category.*, COUNT(tbl_sanpham.sanpham_id) AS 'number_cate' FROM tbl_sanpham
INNER JOIN tbl_category ON tbl_sanpham.category_id = tbl_category.category_id GROUP BY tbl_sanpham.category_id");
$data = [];
while ($row_bieudo = mysqli_fetch_array($sql_bieudo)) {
  $data[] = $row_bieudo;
}

// echo "<prev>";
// var_dump($data);
// echo "</prev>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bảng Điều Khiển</title>
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
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--Left-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small primary coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <h4>Tổng Sản Phẩm</h4>
                <?php
                $sql_select_sp = mysqli_query($con, "SELECT COUNT(sanpham_soluong) FROM tbl_sanpham");
                $row_sp = mysqli_fetch_array($sql_select_sp);

                echo '<b>Tổng:</b> ' . '<b>' . $row_sp[0] . '</b>' . '<b> Sản Phẩm</b>';
                ?>

                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
              <div class="info">
                <h4>Tổng Khách Hàng</h4>
                <?php
                $sql_select_kh = mysqli_query($con, "SELECT COUNT(khachhang_id) FROM tbl_khachhang");
                $row_kh = mysqli_fetch_array($sql_select_kh);

                echo '<b>Tổng:</b> ' . '<b>' . $row_kh[0] . '</b>' . '<b> Khách Hàng</b>';
                ?>

                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
              <div class="info">
                <h4>Tổng Đơn Hàng</h4>
                <?php
                $sql_select_dh = mysqli_query($con, "SELECT COUNT(donhang_id) FROM tbl_donhang");
                $row_dh = mysqli_fetch_array($sql_select_dh);

                echo '<b>Tổng:</b> ' . '<b>' . $row_dh[0] . '</b>' . '<b> Đơn Hàng</b>';
                ?>

                <p class="info-tong">Tổng số đơn hàng được quản lý.</p>
              </div>
            </div>
          </div>



          <!-- col-12 -->
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Tình Trạng Đơn Hàng</h3>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h5 style="margin-top: 50px">Liệt Kê Đơn Hàng</h5>
                <?php
                $sql_select = mysqli_query($con, "SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id GROUP BY mahang ");
                ?>
                <table class="table table-hover" border="0.5" style="margin-top: 30px">
                  <tr>
                    <th>Thứ tự</th>
                    <th>Mã hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Số lượng</th>
                  </tr>
                  <?php
                  $i = 0;
                  while ($row_donhang = mysqli_fetch_array($sql_select)) {
                    $i++;
                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>

                      <td><?php echo $row_donhang['mahang']; ?></td>
                      <td><?php echo $row_donhang['name']; ?></td>
                      <td><?php
                          if ($row_donhang['tinhtrang'] == 0) {
                            echo '<span class="badge bg-info">Chờ xử lý</span>';
                          } else if ($row_donhang['tinhtrang'] == 1) {
                            echo '<span class="badge bg-success">Đã xử lý</span>';
                          } else if ($row_donhang['tinhtrang'] == 2) {
                            echo '<span class="badge bg-warning">Đang giao</span>';
                          } else {
                            echo '<span class="badge bg-success">Hoàn thành</span>';
                          }
                          ?></td>
                      <td><?php echo $row_donhang['soluong']; ?></td>
                    <?php
                  }
                    ?>
                </table>
              </div>
              <!-- / div trống-->
            </div>
          </div>
          <!-- / col-12 -->
        </div>
      </div>
      <!--END left-->

      <div class="col-md-6 col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Dữ Liệu Thống Kê</h3>
              <html>

              <head>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load("current", {
                    packages: ["corechart"]
                  });
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['category_name', 'number_cate'],
                      <?php
                      foreach ($data as $key) {
                        echo "['" . $key['category_name'] . "' , " . $key['number_cate'] . "],";
                      } ?>
                    ]);

                    var options = {
                      title: 'Biểu Đồ Thống Kê',
                      is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                  }
                </script>
              </head>

              <body>
                <div id="piechart_3d" style="width: 650px; height: 590px;"></div>
              </body>

              </html>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>

  </main>
  <script src="../js/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="../js/popper.min.js"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="../js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="../js/main.js"></script>
  <!--===============================================================================================-->
  <script src="../js/plugins/pace.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="../js/plugins/chart.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
          label: "Dữ liệu đầu tiên",
          fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
          strokeColor: "rgb(255, 212, 59)",
          pointColor: "rgb(255, 212, 59)",
          pointStrokeColor: "rgb(255, 212, 59)",
          pointHighlightFill: "rgb(255, 212, 59)",
          pointHighlightStroke: "rgb(255, 212, 59)",
          data: [20, 59, 90, 51, 56, 100]
        },
        {
          label: "Dữ liệu kế tiếp",
          fillColor: "rgba(9, 109, 239, 0.651)  ",
          pointColor: "rgb(9, 109, 239)",
          strokeColor: "rgb(9, 109, 239)",
          pointStrokeColor: "rgb(9, 109, 239)",
          pointHighlightFill: "rgb(9, 109, 239)",
          pointHighlightStroke: "rgb(9, 109, 239)",
          data: [48, 48, 49, 39, 86, 10]
        }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
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
  </script>
</body>

</html>