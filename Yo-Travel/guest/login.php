<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['login_email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['login_email']);
	$pass = validate($_POST['password']);

	if (empty($uname))  {
			$_SESSION['status'] = "Please Enter User Name";
			$_SESSION['status_code'] ="info";
			header("Location: ../guest/index.php");
	    exit();
	}else if(empty($pass)){
			$_SESSION['status'] = "Please Enter User Password";
			$_SESSION['status_code'] ="info";
			header("Location: ../guest/index.php");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);
		$status = 0;
        
		$sql = "SELECT * FROM users WHERE Email_Address='$uname' AND Password='$pass' AND U_Status > '$status'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Email_Address'] === $uname && $row['Password'] === $pass) {
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
			$_SESSION['status'] = "Your Account Has Been Deactivated";
				$_SESSION['status_code'] ="error";
            	header("Location: ../guest/index.php");
			
	        exit();
		}
	}
	
}else{
	$_SESSION['status'] = "Database Error";
				$_SESSION['status_code'] ="error";
            	header("Location: index.php");
	exit();
}

?>

