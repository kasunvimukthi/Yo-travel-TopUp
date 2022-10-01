<?php
    require_once "db_conn.php";
    if(isset($_GET['image_id'])) {
        $sql = "SELECT * FROM `t_image` WHERE `ID` = " . $_GET['image_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["ID"]);
        echo $row["T_Image"];
	}
	mysqli_close($conn);
?>