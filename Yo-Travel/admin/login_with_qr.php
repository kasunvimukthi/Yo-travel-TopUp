<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['qr_email'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['qr_email']);
	$status = 0;

	$sql1 = "SELECT * FROM admin WHERE concat(A_Email,A_Password)='$uname' AND A_Status > '$status'";
	$result1 = mysqli_query($conn, $sql1);
	
	if (mysqli_num_rows($result1) === 1) {
        
		$sql = "SELECT * FROM admin WHERE concat(A_Email,A_Password)='$uname'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            
			$_SESSION['A_Name'] = $row['A_Name'];
			$_SESSION['A_Email'] = $row['A_Email'];
			$_SESSION['A_ID'] = $row['A_ID'];
			$_SESSION['A_Number'] = $row['A_Number'];
			$_SESSION['A_Status'] = $row['A_Status'];

			$_SESSION['status'] = "Welcom Admin Dashboard";
			$_SESSION['status_code'] ="success";
			header('location: ../admin/home.php');
			exit();
            
		}else{
			$_SESSION['status'] = "Incorect User name or password";
			$_SESSION['status_code'] ="info";
			header('location: ../admin/index.php');
			exit();
		}
	}else{
		$_SESSION['status'] = "Your Admin Account has been Deactivated OR Incorect QR Code";
		$_SESSION['status_code'] ="info";
		header('location: ../admin/index.php');
		exit();
	}
	
}else{
	$_SESSION['status'] = "Database Error";
	$_SESSION['status_code'] ="error";
	header('location: ../admin/index.php');
	exit();
}

?>

