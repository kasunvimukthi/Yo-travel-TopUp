<?php 
	require 'DbConnect.php';

	if(isset($_POST['aid'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT `T_Name`, `Travel_ID` FROM package WHERE C_ID = " . $_POST['aid']);
		$stmt->execute();
		$package = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($package);
	}

	if(isset($_POST['accid'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT `T_Name`, `Travel_ID` FROM package WHERE C_ID = " . $_POST['accid']);
		$stmt->execute();
		$accpackage = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($accpackage);
	}

	if(isset($_POST['actid'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT `T_Name`, `Travel_ID` FROM package WHERE C_ID = " . $_POST['actid']);
		$stmt->execute();
		$actpackage = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($actpackage);
	}

	if(isset($_POST['action'])) {

		if($_POST["action"] == "fetch_gps_tracking_package"){
		
		$today = date('Y-m-d');
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM guider");
		$stmt->execute();
		$tracking = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($tracking);
		}

		if($_POST["action"] == "tracking_vehical_fetch"){
		
			$ID = $_POST["id"];
			$db = new DbConnect;
			$conn = $db->connect();
	
			$stmt = $conn->prepare("SELECT * FROM guider_alocate WHERE P_ID = '$ID' ");
			$stmt->execute();
			$vehicals = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			echo json_encode($vehicals);
			}
	}

	// function loadAuthors() {
	// 	$db = new DbConnect;
	// 	$conn = $db->connect();

	// 	$stmt = $conn->prepare("SELECT * FROM catogory");
	// 	$stmt->execute();
	// 	$catogory = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// 	return $catogory;
	// }

// ========================================== OTHER METHOD ===================================================
	// require 'db_conn.php';


	// if(!empty($_POST["aid"])){ 
	// 	// Fetch state data based on the specific country 
	// 	$query = "SELECT `T_Name`, `Travel_ID` FROM package WHERE C_ID = ".$_POST['aid']; 
	// 	$result = $conn->query($query); 
		 
	// 	// Generate HTML of state options list 
	// 	if($result->num_rows > 0){ 
	// 		echo '<option value="">Select Package</option>'; 
	// 		while($row = $result->fetch_assoc()){  
	// 			echo '<option value="'.$row['Travel_ID'].'">'.$row['T_Name'].'</option>'; 
	// 		} 
	// 	}else{ 
	// 		echo '<option value="">Package not available</option>'; 
	// 	}
	// }
 ?>
 