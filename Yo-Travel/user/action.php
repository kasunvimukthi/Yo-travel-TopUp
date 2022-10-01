<?php
require_once('./includes/check_login.php');
if(isset($_POST["action"]))
{
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
// ================================= Create QR Code =====================================
    if($_POST["action"] == "Create_QR-Code") 
    {
        require ('../vendor-QR/autoload.php');
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $targetPath = "qr-code/";
        $invoice = $_POST["ID"];
        $user_ID = $_SESSION["User_ID"];

        $qr_detail = $user_ID.$invoice;

        $output = '

        ';
        
        if (! is_dir($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $bobj = $barcode->getBarcodeObj('QRCODE,H', $qr_detail, - 16, - 16, 'black', array(
            - 2,
            - 2,
            - 2,
            - 2
        ))->setBackgroundColor('#f0f0f0');
        
        $imageData = $bobj->getPngData();
        
        $output .= '
        <div class="text-center">
            <img src="data:image/jpeg;base64,'.base64_encode($imageData).'" width="150px"
            height="150px"> 
            </div>
        ';

        $output.= '
        ';
        echo $output;


    }

// ================================= Cancel Invoice =====================================
    if($_POST["action"] == "invoice_cancel") 
    {
        $status = 'Canceled';
        $invoice = $_POST["ID"];

        $query = "UPDATE invoice SET Status='$status' WHERE Invoice_Number = '$invoice'";
     
        if(mysqli_query($conn, $query))
        {
           
            echo 'cancel';
                        
        }else
        echo 'not_cancel';
        
    }

// ================================= Payment Cancel =====================================
if($_POST["action"] == "payment_cancel") 
{
    $status = 'Payment Canceled';
    $invoice = $_POST["ID"];

    $query = "UPDATE invoice SET Status='$status' WHERE Invoice_Number = '$invoice'";
 
    if(mysqli_query($conn, $query))
    {
        $query3 = "SELECT * FROM `invoice` WHERE Invoice_Number = '$invoice'";
        $result = mysqli_query($conn, $query3);
        while($row = mysqli_fetch_array($result))
        {
            
            
            $T_Date = $row['T_start_date'];
            $Child = $row['U_children'];
            $Adult = $row['U_adults'];
            $t_code = $row["T_ID"];

            $child_cost = $row["U_child_cost"];
            $adult_cost = $row["U_adult_cost"];

            $actual_child_cost = $row["A_Child_Cost"];
            $actual_adult_cost = $row["A_Adult_Cost"];

            $child_profit = $child_cost -  $actual_child_cost;
            $adult_profit = $adult_cost - $actual_adult_cost;

            $date = $row["I_Date"];

            $sub_total = $child_profit + $adult_profit;
            $Pacengers = $Adult+$Child;

            $query1 = "SELECT * FROM profit_loss WHERE Date = '$date'";
                    $result1 = mysqli_query($conn, $query1);
                    while($row2 = mysqli_fetch_array($result1))
                    {
                        $current_profit = $row2["Profit_Loss"];

                        $total_sub_profit = $current_profit - $sub_total;

                        $query2 = "UPDATE profit_loss SET Profit_Loss='$total_sub_profit' WHERE Date = '$date'";
                        $query_run2 = mysqli_query($conn, $query2);

                        
                            $query6 = "SELECT * FROM prediction WHERE P_Start_Date = '$T_Date' && P_ID ='$t_code'";
                            $result6 = mysqli_query($conn, $query6);

                            while($row6 = mysqli_fetch_array($result6))
                            {
                                $CurrentP = $row6['No_of_pacenger'];
                                $NewPacenge = $CurrentP-$Pacengers;

                                $query7 = "UPDATE prediction SET No_of_pacenger='$NewPacenge' WHERE P_Start_Date='$T_Date' && P_ID ='$t_code'";
                                if(mysqli_query($conn, $query7))
                                {
                                    echo 'cancel';
                                }else{
                                    echo 'not_cancel';
                                }
                            }
                        
                        
                        
                    }
        
        }
    }else
    echo 'not_cancel';
    
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

    // =============================================== USER UPLOADE SLIP ================================================
    if($_POST["action"] == "PaymentSlip_Upload")
    {
    $IID = $_POST['ID'];
    
    $check_data = "SELECT * FROM payment WHERE I_ID = '$IID'";
    $run_query = mysqli_query($conn, $check_data) or die("Error");


    if(mysqli_num_rows($run_query) > 0){

    }else{
        $sql2 = "INSERT INTO payment(I_ID)VALUES('$IID')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {

        }
    }
    

    }

    if($_POST["action"] == "Upload_Payment_Slip")
    {
    $IID = $_POST['I_ID'];
    $file = addslashes(file_get_contents($_FILES["payment_slip_file"]["tmp_name"]));
  
    $query = "UPDATE payment SET Payment_Slip='$file' WHERE I_ID='$IID' ";
    $query_run = mysqli_query($conn, $query);
    if($query_run){

        $query1 = "UPDATE invoice SET Status='Proccessing' WHERE Invoice_Number='$IID' ";
        $query_run1 = mysqli_query($conn, $query1);
        if($query_run1){

            $check_data4 = "SELECT * FROM invoice WHERE Invoice_Number = '$IID' ";
            $run_query4 = mysqli_query($conn, $check_data4);
        
            
            while($row4 = mysqli_fetch_array($run_query4)){
                $IT_ID = $row4['T_ID'];
        
                $check_data3 = "SELECT * FROM package WHERE Travel_ID = '$IT_ID' ";
                $run_query3 = mysqli_query($conn, $check_data3);
        
                while($row3 = mysqli_fetch_array($run_query3)){
        
                    $T_ID = $row3['Travel_ID'];
                    $T_Name = $row3['T_Name'];
                    $T_Start_Date = $row3['T_Start_Date'];
                    
                    $check_data2 = "SELECT * FROM prediction WHERE P_Start_Date = '$T_Start_Date' && P_ID ='$T_ID'";
                    $run_query2 = mysqli_query($conn, $check_data2);
        
                    if($row2 = mysqli_fetch_array($run_query2)){
        
                    }else{
                        $No_of = "0";
                        $sql3 = "INSERT INTO prediction (P_ID,P_Name,P_Start_Date,No_of_pacenger) VALUES('$T_ID','$T_Name','$T_Start_Date','$No_of')";
                        $result3 = mysqli_query($conn, $sql3);
                        if ($result3) {
                            
                        }
                    }
                    echo 'Done';
                }
            }
            
        }else{
            echo 'Error';
        }
    }else{
        echo 'Error';
    }
    
    }
}?>