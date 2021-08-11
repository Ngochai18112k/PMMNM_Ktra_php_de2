<!doctype html>
<?php session_start();
header('Content-Type: text/html; charset=UTF-8');
?>
<html lang="en">

<head>
  <title>Hệ thống quản lý</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../../../assets/css/material-kit.css?v=2.1.1" rel="stylesheet" />
  <!-- SweetAlert2 -->
  <script src="../../../assets/js/sweetalert2.all.min.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primary sticky-top">
    <div class="container">
      <a class="navbar-brand">HỆ THỐNG QUẢN LÝ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav col-auto mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../employee/employee.php">Người đăng ký</a>
          </li>
        </ul>
        <ul class="navbar-nav col-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php
              include('../../database/sql_conn.php');
              if (isset($_SESSION['account']) && $_SESSION['account']) { //Kiểm tra session
                $name = "SELECT * FROM users WHERE account = '" . $_SESSION['account'] . "'";
                $queryName = mysqli_query($conn, $name); //Thực hiện câu truy vấn
                if ($queryName->num_rows > 0) { //Kiểm tra số dòng
                  while ($row = mysqli_fetch_assoc($queryName)) { //Nếu có kết quả thì đưa tất cả vào bảng
                    echo "Xin chào " . $row['fullname'];
                  }
                }
              } else {
                header('Location: ../auth/login.php');
              }
              ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../auth/logout.php">Đăng xuất</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main role="main" class="container md">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-danger">
          <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#employee" data-toggle="tab"><i class="material-icons">face</i>Người đăng ký</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#salary" data-toggle="tab"><i class="material-icons">assignment</i>Lịch tiêm</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-center">
            <div class="tab-pane active" id="employee">
              <section name="addEmployee">
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Người đăng ký</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thên người đăng ký</li>
                  </ol>
                </nav>
                <form method="get" action="../employee/add_emp.php" onsubmit="return validateEmp()">
                  <div class="form-row">
                    <div class="col-4">
                      <label class="bmd-label-static">Họ tên*</label>
                      <input type="text" name="fullname" id="fullname" class="form-control">
                    </div>
                    <div class="col-2">
                      <label class="bmd-label-static">Số điện thoại*</label>
                      <input type="text" name="phone" id="phone" class="form-control" pattern="\d{10,10}">
                    </div>
                    <div class="col">
                      <label class="bmd-label-static">Số CMND*</label>
                      <input type="text" name="id_num" id="id_num" class="form-control" pattern="\d{9,12}">
                    </div>
                    <div class="col">
                      <label class="bmd-label-static">Địa chỉ*</label>
                      <input type="text" name="address" id="address" class="form-control">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-2">
                      <label class="bmd-label-static">Tài khoản*</label>
                      <input type="text" name="account" id="account" class="form-control" pattern="^[a-z0-9_-]{3,15}$">
                    </div>
                    <div class="col-2">
                      <label class="bmd-label-static">Mật khẩu*</label>
                      <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="col-3">
                      <select class="selectpicker show-tick" data-style="select-with-transition" name="job" id="job">
                        <option disabled selected>Công việc*</option>
                        <option value="Phục vụ">Phục vụ</option>
                        <option value="Chế biến">Chế biến</option>
                        <option value="Order">Order</option>
                      </select>
                    </div>
                    <div class="col">
                      <label class="bmd-label-static">Năm vào làm*</label>
                      <input type="text" name="start" id="start" class="form-control" pattern="\d{4,4}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-auto mr-auto"> </div>
                    <div class="col-auto">
                      <button class="btn btn-success" type="submit"><i class="material-icons">add</i>Thêm người đăng ký</button>
                    </div>
                  </div>
                </form>
                <script type="text/javascript">
                  function validateEmp() {
                    var fullname = document.getElementById('fullname').value;
                    var account = document.getElementById('account').value;
                    var password = document.getElementById('password').value;
                    var id_num = document.getElementById('id_num').value;
                    var address = document.getElementById('address').value;
                    var phone = document.getElementById('phone').value;
                    var job = document.getElementById('job').value;
                    var start = document.getElementById('start').value;

                    if (fullname != "" && account != "" && password != "" && id_num != "" && address != "" && phone != "" && job != "" && start != "") {
                      Swal.fire({
                        type: 'success',
                        title: 'Đã thêm Người đăng ký',
                        showConfirmButton: false,
                        timer: 1500
                      });
                      return true;
                    } else {
                      alert("Vui lòng điền đủ thông tin có dấu *");
                      return false;
                    }
                    return false;
                  }
                </script>
                <hr>
              </section>

              <section name="listEmployee">
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Người đăng ký</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách người đăng ký</li>
                  </ol>
                </nav>
                <div class="row">
                  <div class="col-auto mr-auto" id="numberOfEmployee">
                    <?php
                    include('../../database/sql_conn.php');
                    $numberOfEmployee = "SELECT COUNT(id) as total FROM registers";
                    $sqlCount = mysqli_query($conn, $numberOfEmployee); //Thực hiện truy vấn đếm dựa vào id
                    $data = mysqli_fetch_assoc($sqlCount); //Đưa tất cả dữ liệu select được vào mảng
                    echo "<h4>Có tất cả " . $data['total'] . " người đăng ký</h4>";
                    ?>
                  </div>

                  <!-- Bảng hiển thị danh sách Người đăng ký -->
                  <table class="table table-hover table-bordered" name="employeeTable">
                    <thead>
                      <tr>
                        <th>Mã</th>
                        <th class="text-left">Họ tên</th>
                        <th>Tuổi</th>
                        <th>Số CMND</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Nhóm ưu tiên</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $select_emp = "SELECT * FROM registers";
                      $result_emp = mysqli_query($conn, $select_emp);
                      if ($result_emp->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result_emp)) {
                      ?>
                          <tr>
                            <td><?php echo $row['id']; ?></td>
                            <th class="text-left"><?php echo $row['name']; ?></th>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['id_card']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['prioritized']; ?></td>
                            <td>
                              <form method="get" action="./delete_emp.php">
                                <button type="submit" class="btn btn-sm btn-danger" name="delete" value="<?php echo $row['id']; ?>" onclick="return del()"><i class="material-icons">delete</i></button>
                              </form>
                            </td>
                          </tr>
                          <script type="text/javascript">
                            function del() {
                              var del = confirm("Bạn có thực sự muốn xóa người đăng ký này?");
                              if (del) {
                                return true
                              } else {
                                return false
                              }
                              return false
                            }
                          </script>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </section>
            </div>

            <div class="tab-pane" id="salary">
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Lịch tiêm</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Lương Người đăng ký</li>
                </ol>
              </nav>
              <hr>
              <?php
              include '../../database/sql_conn.php';
              error_reporting(E_PARSE);

              echo '<table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">STT</th>
                                  <th scope="col">Địa điểm</th>
                                  <th scope="col">Ngày tiêm</th>
                                </tr>
                              </thead>
                              <tbody>';

              $select_cal = "SELECT * FROM calendar";
              $result_cal = mysqli_query($conn, $select_cal);
              if ($result_cal->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result_cal)) {
                  echo '<tr>
                        <th>' . $row['id'] . '</th>
                        <td>' . $row['address'] . '</td>
                        <td>' . $row['time'] . '</td>
                        </tr>';
                }
              }
              echo  '</tbody>
                            </table>';
              ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
</body>
<!--   Core JS Files   -->
<script src="../../../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../../../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../../../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="../../../assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="../../../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../../../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../../../assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../../../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../../assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="../../../assets/js/material-kit.js?v=2.1.1" type="text/javascript"></script>
</body>

</html>