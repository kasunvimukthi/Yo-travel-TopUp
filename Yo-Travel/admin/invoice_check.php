<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['qr_invoice'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$invoice = validate($_POST['qr_invoice']);
	

	$sql1 = "SELECT * FROM invoice WHERE concat(User_ID,Invoice_Number)='$invoice'";
	$result1 = mysqli_query($conn, $sql1);
	
	if (mysqli_num_rows($result1) === 1) {
		$row = mysqli_fetch_assoc($result1);

		if ($row['Status'] == 'Active')
		{
			$_SESSION['status'] = "This Invoice Is Active Now";
			$_SESSION['status_code'] ="success";
			header('location: ../admin/user_invoice_view.php');
			exit();
		}else
		if ($row['Status'] == 'Canceled')
		{
			$_SESSION['status'] = "This Invoice Is Canceled";
			$_SESSION['status_code'] ="info";
			header('location: ../admin/user_invoice_view.php');
			exit();
		}else
		if ($row['Status'] == 'Expired')
		{
			$_SESSION['status'] = "This Invoice Is Expired";
			$_SESSION['status_code'] ="info";
			header('location: ../admin/user_invoice_view.php');
			exit();
		}

            
		}else{
			$_SESSION['status'] = "This Invoice Details Not Match with Databes";
			$_SESSION['status_code'] ="error";
			header('location: ../admin/user_invoice_view.php');
			exit();
		}
	}
	


?>
<script>
	function Active()
	{
		swal('This Invoice Is Active Now','','success');
	}
</script>

