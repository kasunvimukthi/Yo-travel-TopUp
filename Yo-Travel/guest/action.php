<?php


    require_once "db_conn.php";

    // ================================= Send Enquiry =====================================
    if($_POST["action"] == "enquiry_send")
    {
        $name = $_POST['enquiry_name'];
        $email = $_POST['enquiry_email'];
        $subject = $_POST['enquiry_subject'];
        $msg = $_POST['enquiry_msg'];

        $date = date('Y-m-d');
        $status = 2;

        $query = "INSERT INTO enquiry (Name, Date, E_mail, Subject, Body, Status) VALUES ('$name', '$date', '$email', '$subject','$msg','$status')";
   
       if(mysqli_query($conn, $query))
       {
            echo 'Sent';       
       }else
       {
           echo 'Not_Sent';
       }
    }


// ================================= Send Msg For Chat-Bot =====================================
    if($_POST["action"] == "Chat_Bot")
    {
        $getMesg = $_POST['text'];

        
        $check_data = "SELECT Answers FROM chat_bot WHERE Questions LIKE '%$getMesg%'";
        $run_query = mysqli_query($conn, $check_data) or die("Error");


        if(mysqli_num_rows($run_query) > 0){

            $fetch_data = mysqli_fetch_assoc($run_query);

            $replay = $fetch_data['Answers'];
            echo $replay;
        }else{
            echo "Sorry can't be able to understand you!";
        }
    }

    if($_POST["action"] == "loging_form")
    {
        $login_email = $_POST["login_email"];
        $login_password = $_POST["login_password"];

        $pass = md5($login_password);

        $sql = "SELECT * FROM users WHERE Email_Address='$login_email' AND Password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Email_Address'] === $login_email && $row['Password'] === $pass) {

                $data[0]=$row['User_Name'];
                $data[1]=$row['Name'];
                $data[2]=$row['User_ID'];
                $data[3]=$row['Age'];
                $data[4]=$row['Address'];
                $data[5]=$row['Email_Address'];
                $data[6]=$row['Phone_Number'];

                echo json_encode($data);
				
		        exit();
            }else{
				$_SESSION['status'] = "Incorect User name or password";
				$_SESSION['status_code'] ="error";
            	header("Location: ../guest/index.php");
				
		        exit();
			}
		}else{
			$_SESSION['status'] = "Incorect User name or password";
				$_SESSION['status_code'] ="error";
            	header("Location: ../guest/index.php");
			
	        exit();
		}
    }
// ============================================== FILLTER =============================================

    if($_POST["action"] == "fetch_data"){

        $minimum_price = $_POST["minimum_price"];
        $maximum_price = $_POST["maximum_price"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $category = $_POST["category"];

        $status = 1;

        if($category == 0){
            $sqlQuery = "SELECT * FROM package WHERE T_Start_Date BETWEEN '$start_date' AND '$end_date' && T_End_Date BETWEEN '$start_date' AND '$end_date' && T_Adult_Cost BETWEEN '$minimum_price' AND '$maximum_price' && Status = $status ORDER BY Travel_ID ";
            $result = mysqli_query($conn,$sqlQuery);
        }else
        if($category != 0){
            $sqlQuery = "SELECT * FROM package WHERE T_Start_Date BETWEEN '$start_date' AND '$end_date' && T_End_Date BETWEEN '$start_date' AND '$end_date' && T_Adult_Cost BETWEEN '$minimum_price' AND '$maximum_price' && Status = $status && C_ID = $category ORDER BY Travel_ID ";
            $result = mysqli_query($conn,$sqlQuery);
        }
        

        $output = '
        ';

        if(mysqli_num_rows($result) > 0){
            foreach($result as $row)
            {
              
              $db_date = $row['T_Start_Date'];
              $date1 = strtotime($db_date);
         
              $cut_date = $row['T_End_Date'];
              $date2 = strtotime($cut_date);
         
              $closing = $date2 - $date1;
         
              $date3 = $closing / (60*60*24);
              
              $output .= '
              <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm mb-3 imgbox ">
              <div class="col-auto d-lg-block image">
              <img src="data:image/jpeg;base64,'.base64_encode($row['T_Image'] ).'" width="100%" height="100%" />
         
              </div>
            <div class="col mt-3  position-static row box_details">
              <div class="details">
                <dt>'. $row['T_Name'] .'</dt>
                <p class="mb-0 card-text text-dark"><dt>Locations - </dt><p class="small ">'. $row['T_Locations'] .'</p></p>
                <div class="mb-1 text-muted">'. $row['T_Details'] .'</div>

                    <dt>'. $date3 .'Days.</dt>
                    <dt>Starting from Rs. '. $row['T_Adult_Cost'] .' per person</dt>
                    <dt>Date '. $row["T_Start_Date"] .'</dt>
         
                    </div>
                    <div class="more">
                    <a href="selectpackage.php?id='. $row["Travel_ID"] .' ">
                    <button class="btn btn-success col-md-4">More Info</button></a>
                    </div>
                    </div>
                    </div>
                    
                ';
            }
        
        }else
        {
            $output .= '<h3 style="color: black;">No Data Found</h3>';
        }
        $output .= '</div>';
        echo $output;
    }
