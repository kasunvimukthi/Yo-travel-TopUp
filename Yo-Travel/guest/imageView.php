<?php
    require_once "db_conn.php";
    if(isset($_GET['image_id'])) {
        $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` WHERE `C_ID` = " . $_GET['image_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["C_Name"]);
        echo $row["C_Image"];
	}
	mysqli_close($conn);
?>