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

	$sql1 = "SELECT * FROM users WHERE concat(Email_Address,Password)='$uname' AND U_Status > '$status'";
	$result1 = mysqli_query($conn, $sql1);
	
	if (mysqli_num_rows($result1) === 1) {


        
		$sql = "SELECT * FROM users WHERE concat(Email_Address,Password)='$uname'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            
            	$_SESSION['User_Name'] = $row['User_Name'];
            	$_SESSION['Name'] = $row['Name'];
            	$_SESSION['User_ID'] = $row['User_ID'];
				$_SESSION['Age'] = $row['Age'];
				$_SESSION['Address'] = $row['Address'];
				$_SESSION['Email_Address'] = $row['Email_Address'];
				$_SESSION['Phone_Number'] = $row['Phone_Number'];
				$_SESSION['status'] = "Hi " .$row['Name']. " Your now login to the Yo-travel";
				$_SESSION['status_code'] ="success";
            	header("Location: ../user/index.php");
				
		        exit();
            
		}else{
			$_SESSION['status'] = "Incorect User name or password";
				$_SESSION['status_code'] ="error";
            	header("Location: ../guest/index.php");
			
	        exit();
		}
	}else{
		$_SESSION['status'] = "Your Account has been Deactivated OR Incorect QR Code";
		$_SESSION['status_code'] ="info";
		header("Location: ../guest/index.php");
		exit();
	}
	
}else{
	$_SESSION['status'] = "Database Error";
				$_SESSION['status_code'] ="error";
            	header("Location: index.php");
	exit();
}

?>

