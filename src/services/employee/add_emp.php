<?php 
	session_start();
	error_reporting(E_PARSE);
	include '../../database/sql_conn.php';
	if (isset($_SESSION['account'])) { //Kiểm tra có login hay chưa, nếu có thì biết $_SESSION sẽ có giá trị là tài khoản vừa nhập
	  $add="INSERT INTO employees(fullname, account, password, id_num, address, phone, job, start, user_group) VALUES('".trim($_GET['name'])."', '".trim($_GET['account'])."', '".sha1($_GET['password'])."', '".trim($_GET['id_num'])."', '".trim($_GET['address'])."', '".trim($_GET['phone'])."', '".trim($_GET['job'])."', '".trim($_GET['start'])."', '".$user_group."')";
      $add_query = mysqli_query($conn, $add);
	  header('Location: ./employee.php');
		// echo $add;
	} else {
		header('Location: ../auth/login.php'); //Nếu không phải tài khoản admin thì chuyển về trang login.php
	}
 ?>