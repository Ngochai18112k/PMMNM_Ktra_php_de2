<?php 
	session_start();
	include '../../database/sql_conn.php';
	if (isset($_SESSION['account'])) {
		if (isset($_GET['cshift']) && isset($_GET['cday'])) {
			foreach ($_GET['cday'] as $key) {
				foreach ($_GET['cshift'] as $value) {
					$sel = "SELECT shiftName, dayOfShift FROM shifts WHERE empAccount = '".$_SESSION['account']."'";
					$sel_query = mysqli_query($conn, $sel);
					if ($sel_query->num_rows > 0) {
						while ($row = mysqli_fetch_assoc($sel_query)) {
							$del = "DELETE FROM shifts WHERE empAccount = '".$_SESSION['account']."' AND shiftName = '".$value."' AND dayOfShift = '".$key."'";
						  	mysqli_query($conn, $del);
						}
					}				
				}
			}
		}
		else
			header('Location: ../employee/emp.php');
	}else
	  	header('Location: ../auth/login.php');
	header('Location: ../employee/emp.php');
 ?>