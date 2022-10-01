<?php

use Com\Tecnick\Color\Model;

  include ('includes/check_login.php');

if(isset($_POST["action"]))
{
    require_once "db_conn.php";
// ============================================== ADMIN FETCH==============================================
if($_POST["action"] == "admin_fetch")
{
    $query = "SELECT * FROM admin";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable1" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Admin Name</th>
        <th>Email</th>
        <th>Comntact Number</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID</th>
        <th>Admin Name</th>
        <th>Email</th>
        <th>Comntact Number</th>
        <th width="15%">Action</th>
    </tr>
</tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        <td>'.$row["A_ID"].'</td>
        <td>'.$row["A_Name"].'</td>
        <td>'.$row["A_Email"].'</td>
        <td>'.$row["A_Number"].'</td>

        ';
                    $status = $row['A_Status'];

                    if($status == 2){
                        $status1 = '<button type="button" class=" btn-success bt-xs super_admin" id="'.$row["A_ID"].'" title="Super Admin"><i class="fas fa-shield-alt"></i></button>';
                    }else 
                    if($status == 0){
                        $status1 = '<button type="button" class=" btn-secondary bt-xs admin_deactive" id="'.$row["A_ID"].'" title="Deactive"><i class="fas fa-lock"></i></button>';
                    }else 
                    if($status == 1){
                        $status1 = '<button type="button" class=" btn-info bt-xs admin_active" id="'.$row["A_ID"].'" title="Active"><i class="fas fa-unlock"></i></button>';
                    }

                $output.='

        <td>'. $status1.'
        <button type="button" name="admin_update" class=" btn-success bt-xs admin_update" id="'.$row["A_ID"].'" title="Edit"><i class="fa fa-edit"></i></button>
        <button type="button" name="admin_delete" class=" btn-danger bt-xs admin_delete" id="'.$row["A_ID"].'" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }

// ============================================== GUIDER FETCH==============================================
if($_POST["action"] == "guider_fetch")
{
    $query = "SELECT * FROM guider";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable14" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Guider Name</th>
        <th>Email</th>
        <th>Comntact Number</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ID</th>
        <th>Guider Name</th>
        <th>Email</th>
        <th>Comntact Number</th>
        <th width="15%">Action</th>
    </tr>
</tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        <td>'.$row["ID"].'</td>
        <td>'.$row["G_Name"].'</td>
        <td>'.$row["G_Email"].'</td>
        <td>'.$row["G_Contact_No"].'</td>

        

        <td>
        <button type="button" name="guider_update" class=" btn-success bt-xs guider_update" id="'.$row["ID"].'" title="Edit"><i class="fa fa-edit"></i></button>
        <button type="button" name="guider_delete" class=" btn-danger bt-xs guider_delete" id="'.$row["ID"].'" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }

// ============================================== PREDICTION FETCH==============================================
if($_POST["action"] == "prediction_fetch")
{
        $Current_date = date('Y-m-d'); // User Current Date
        
        $previous_Mo_Start = date('Y-m-01',strtotime($Current_date."-1 month")); // Previous Month Start Date
        $previous_Mo_End = date('Y-m-t',strtotime($Current_date."-1 month")); // Previous Month End Date
    
        $previous_Mo_Start1 = date('Y-m-01',strtotime($previous_Mo_Start."-1 month")); // Month Befor previous Month Start Date
        $previous_Mo_End1 = date('Y-m-t',strtotime($previous_Mo_Start."-1 month")); // Month Befor previous Month End Date
    
        $Next_Mo_Start1 = date('Y-m-01',strtotime($Current_date."+1 month")); // Next Month Start Date
        $Next_Month = date('Y-M',strtotime($Next_Mo_Start1."+0 month")); // Get Month Name

    $query = "SELECT * FROM `prediction` WHERE P_Start_Date BETWEEN '$previous_Mo_Start' AND '$previous_Mo_End'";
    $result = mysqli_query($conn, $query);

    $output = '
    <div class="table-responsive small">
    <table class="table table-bordered" id="datatable44" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>Package Name</th>
        <th class="text-center">'.$previous_Mo_Start1.' To '.$previous_Mo_End1.'</th>
        <th class="text-center">'.$previous_Mo_Start.' To '.$previous_Mo_End.'</th>
        <th class="text-center">Next Month ('.$Next_Month.')</th>
      </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Package Name</th>
        <th class="text-center">'.$previous_Mo_Start1.' To '.$previous_Mo_End1.'</th>
        <th class="text-center">'.$previous_Mo_Start.' To '.$previous_Mo_End.'</th>s
        <th class="text-center">Next Month ('.$Next_Month.')</th>
    </tr>
</tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $P_Name = $row["P_Name"];
        $No_of_pacenger2 = 0;
        $No_of_pacenger3 = 0;

        $output .= '
        <tr>
        <td>'.$row["P_Name"].'</td>
        ';
        
        $query1 = "SELECT * FROM `prediction` WHERE P_Start_Date BETWEEN '$previous_Mo_Start' AND '$previous_Mo_End' && P_Name = '$P_Name'";
        $result1 = mysqli_query($conn, $query1);
        if($row1 = mysqli_fetch_array($result1))
        {
            $No_of_pacenger2 = $row1["No_of_pacenger"];
        
        }else{
            $No_of_pacenger2 = 0;
        }

        $query2 = "SELECT * FROM `prediction` WHERE P_Start_Date BETWEEN '$previous_Mo_Start1' AND '$previous_Mo_End1' && P_Name = '$P_Name'";
        $result2 = mysqli_query($conn, $query2);
        if($row2 = mysqli_fetch_array($result2))
        {
            $No_of_pacenger3 = $row2["No_of_pacenger"];
        
        }else{
            $No_of_pacenger3 = 0;
        }

        $devide = $No_of_pacenger2/$No_of_pacenger3; // Get Precentage Count
        $average = ($No_of_pacenger2+$No_of_pacenger3)/2; // Get Avarage Count
        $prediction = $average*$devide; // Multiply Precentage and Avarage
        
        $round = round($prediction, 0);
        $output .= '
        <td class="text-center">'.$No_of_pacenger3.'</td>
        <td class="text-center">'.$No_of_pacenger2.'</td>';

        if($devide > 1 ){
            $output .= '
                <td class="text-center">'.round($prediction, 0).'<i class="icofont-swoosh-up text-success fa-2x"></i></td>
            ';
        }if($devide < 1 ){
            $output .= '
                <td class="text-center">'.round($prediction, 0).'<i class="icofont-swoosh-down text-warning fa-2x"></i></td>
            ';
        }
        if($devide == 1 ){
            $output .= '
                <td class="text-center">'.round($prediction, 0).'<i class="icofont-sort-alt fa-2x"></i></td>
            ';
        }

        $query3 = "SELECT * FROM `prediction_chart` WHERE P_Name = '$P_Name'";
        $result3 = mysqli_query($conn, $query3);
        if($row3 = mysqli_fetch_array($result3))
        {
            $query4 = "UPDATE prediction_chart SET P_Name='$P_Name', M_B_Month_C='$No_of_pacenger3', P_Month_C='$No_of_pacenger2', N_Month_C='$prediction' WHERE P_Name= '$P_Name'";
     
            if(mysqli_query($conn, $query4))
            {}
        
        }else{
            $query5 = "INSERT INTO prediction_chart (P_Name,M_B_Month_C,P_Month_C,N_Month_C) VALUES ('$P_Name','$No_of_pacenger3','$No_of_pacenger2','$prediction')";

            if(mysqli_query($conn, $query5))
            {}
        }
        $output .= '
        
        </tr>
    ';
        
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// ============================================== GUIDER LIST FETCH==============================================
if($_POST["action"] == "guider_list_fetch")
{
    $query = "SELECT * FROM guider";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable17" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>Guider Name</th>
        <th>Next Journey Start Date</th>
        <th class="text-center">No Of Guide for Next</th>
        <th width="15%" class="text-center">Action</th>
      </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Guider Name</th>
        <th>Next Journey Start Date</th>
        <th class="text-center">No Of Guide for Next</th>
        <th width="15%" class="text-center">Action</th>
    </tr>
    </tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $G_ID = $row["ID"];
        $G_Name = $row["G_Name"];

        $query1 = "SELECT * FROM guider_alocate WHERE G_ID = $G_ID";
        $result1 = mysqli_query($conn, $query1);
        if(mysqli_num_rows($result1) > 0)
            {
                
                while($row1 = mysqli_fetch_array($result1))
                {
                    $row3 = mysqli_num_rows($result1);
                    $no1 = $row3;
                    $P_ID = $row1["P_ID"];

                    $query2 = "SELECT * FROM package WHERE Travel_ID = $P_ID ORDER BY T_Start_Date LIMIT 1";
                    $result2 = mysqli_query($conn, $query2);
                    if(mysqli_num_rows($result2) > 0)
                        {
                        while($row2 = mysqli_fetch_array($result2))
                        {
                            $T_S_D = $row2["T_Start_Date"];
                        }
                    }else{
                        $T_S_D = "";
                    }

                }
                  
            }else{
                $T_S_D = "No Any Jorney";
                $no1 = "0";
            }
        

    $output .= '

        <tr>
        <td>'.$G_Name.'</td>
        <td>'.$T_S_D.'</td>
        <td class="text-center">'.$no1.'</td>
        

        <td class="text-center">
        <button type="button" name="guider_list_view" class=" btn-success bt-xs guider_list_view" id="'.$row["ID"].'" title="Edit"><i class="fa fa-eye"></i></button>
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// ============================================== EVENT TABLE FETCH==============================================
if($_POST["action"] == "event_table_fetch")
{
    $status = 1;
    $query = "SELECT * FROM package WHERE Status='$status' ORDER BY T_Start_Date ";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable2" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Travel Name</th>
        <th>Place to Visit</th>
        <th width="100px">Travel Start Date</th>
        <th width="100px">Travel End Date</th>
        <th>Number of Day</th>
        
      </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Category Name</th>
        <th>Travel Name</th>
        <th>Place to Visit</th>
        <th width="100px">Travel Start Date</th>
        <th width="100px">Travel End Date</th>
        <th>Number of Day</th>
        
    </tr>
</tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $query1 = "SELECT * FROM catogory WHERE C_ID= {$row['C_ID']}";
                $query_run1 = mysqli_query($conn ,$query1);

                if(mysqli_num_rows($query_run1) > 0)
            {
              while($row1 = mysqli_fetch_assoc($query_run1))
              {
    $output .= '

        <tr>
        <td>'.$row1["C_Name"].'</td>
        ';
              }
            }
            $db_date = $row['T_Start_Date'];
            $date1 = strtotime($db_date);

            $cut_date = $row['T_End_Date'];
            $date2 = strtotime($cut_date);

            $closing = $date2 - $date1;

            $date3 = $closing / (60*60*24);
        $output .= '
        <td>'.$row["T_Name"].'</td>
        <td>'.$row["T_Locations"].'</td>
        <td>'.$row["T_Start_Date"].'</td>
        <td>'.$row["T_End_Date"].'</td>
        <td>'.$date3.' days</td>

       </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// ============================================== USER FETCH==============================================
if($_POST["action"] == "user_fetch")
{
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable3" width="100%" celllspacing="0">
    <thead>
      <tr>
        
        <th>User ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Action</th>
      </tr>
    </thead>
    <tfoot>
    <tr>
    
        <th>User ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Action</th>
    </tr>
</tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        
        <td>'.$row["User_ID"].'</td>
        <td>'.$row["Name"].'</td>
        <td>'.$row["Age"].'</td>
        <td>'.$row["Address"].'</td>
        <td>'.$row["Email_Address"].'</td>
        <td>'.$row["Phone_Number"].'</td>


        ';
                    $status = $row['U_Status'];

                    if($status == 0){
                        $status1 = '<button type="button" class=" btn-secondary bt-xs user_deactive" id="'.$row["User_ID"].'" title="Deactive"><i class="fas fa-lock"></i></button>';
                    }else 
                    if($status == 1){
                        $status1 = '<button type="button" class=" btn-info bt-xs user_active" id="'.$row["User_ID"].'" title="Active"><i class="fas fa-unlock"></i></button>';
                    }

                $output.='

        <td class="text-center">'. $status1.'
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }

// ============================================== USER INVOICE VIEW FETCH==============================================
if($_POST["action"] == "user_invoice_view_fetch")
{
    $id =$_POST["IID"];
    $query = "SELECT * FROM invoice WHERE Invoice_Number = $id";
    $result = mysqli_query($conn, $query);
    $output = '
    
    ';
    if(mysqli_num_rows($result) > 0)
        {
    
    while($row = mysqli_fetch_array($result))
    {
        $User_ID = $row['User_ID'];
        $I_Time = $row['I_Time'];
        $I_Date = $row['I_Date'];
        $T_end_date = $row['T_end_date'];
        $T_start_date = $row['T_start_date'];
        $U_children = $row['U_children'];
        $U_adults = $row['U_adults'];
        $U_child_cost = $row['U_child_cost'];
        $U_adult_cost = $row['U_adult_cost'];
        $A_Adult_Cost = $row['A_Child_Cost'];
        $P_type = $row['P_type'];
        $T_Cost = $row['T_Cost'];
        $Request = $row['Request'];
        $Status = $row['Status'];
        
        $Adult_Total_Cost = $U_adults * $U_adult_cost;
        $Child_Total_Cost = $U_children * $U_child_cost;

        $query1 = "SELECT * FROM t_image WHERE T_ID = ".$row['T_ID']."";
        $result1 = mysqli_query($conn, $query1);

        while($row1 = mysqli_fetch_array($result1)){
            $img = $row1['T_Image'];
        }
        
        $query2 = "SELECT * FROM package WHERE Travel_ID = ".$row['T_ID']."";
        $result2 = mysqli_query($conn, $query2);

        while($row2 = mysqli_fetch_array($result2)){
            $C_ID = $row2['C_ID'];
            $T_Name = $row2['T_Name'];
            $T_Locations = $row2['T_Locations'];
            $T_Details = $row2['T_Details'];
            
        }

        $query3 = "SELECT * FROM users WHERE User_ID  = ".$User_ID."";
        $result3 = mysqli_query($conn, $query3);

        while($row3 = mysqli_fetch_array($result3)){
            $Name = $row3['Name'];
            $Email_Address = $row3['Email_Address'];
            $Phone_Number = $row3['Phone_Number'];
            
        }

        $output.= '
        <div class="row col-md-12 border-bottom pb-2">
              <div class="col-md-4">
                <img src="data:image/jpeg;base64,'.base64_encode($img).'" alt="" width="100%" height="100%">
              </div>

              <div class="col-md-8">
                <h4 class="font-weight-bold text-dark">'.$T_Name.'</h4>
                <p>'.$T_Locations.'</p>
                <p>'.$T_Details.'</p>

                <div class="col-md-12 row">
                <div class="col-md-5 row">
                    <p class="font-weight-bold text-dark">Start Date '.$T_start_date.'</p>
                </div>
                <div class="col-md-5 row">
                    <p class="font-weight-bold text-dark">End Date '.$T_end_date.'</p>
                </div>
                    
                    
                </div>
              </div>
              
        </div>

        <div class="row col-md-12 pt-2 ">

        <h5 class="col-sm-12 font-weight-bold text-dark">Rider Details</h5>

        <div class="pl-4 col-md-12 row border-bottom pb-2">
          <div class="col-sm-4 pt-1">
            <label for="" class="form-label">Full Name</label>
          </div>
          <div class="col-sm-8 pt-1">
            <input type="text" class="form-control" id="" name=""  value="'.$Name.'" readonly>
          </div>

          <div class="col-sm-4 pt-1">
            <label for="" class="form-label">Email Address</label>
          </div>
          <div class="col-sm-8 pt-1">
            <input type="text" class="form-control" id="" name=""  value="'.$Email_Address.'" readonly>
          </div>

          <div class="col-sm-4 pt-1">
            <label for="" class="form-label">Contact Number</label>
          </div>
          <div class="col-sm-8 pt-1">
            <input type="text" class="form-control" id="" name=""  value="'.$Phone_Number.'" readonly>
          </div>

          </div>

          <h5 class="col-sm-12 font-weight-bold text-dark pt-2">Booking Details</h5>

        <div class="pl-4 col-md-12 row pb-2 ">
          <div class="col-sm-4 pt-1">
            <label for="" class="form-label">Number of Adults</label>
          </div>
          <div class="col-sm-1 pt-1">
            <input type="text" class="form-control text-right" id="" name=""  value="'.$U_adults.'" readonly>
          </div>

          <div class="col-sm-2 pt-1">
            <label for="" class="form-label">Price for 1 Adult</label>
          </div>
          <div class="col-sm-2 pt-1">
            <input type="text" class="form-control text-right" id="" name=""  value="'.$U_adult_cost.'" readonly>
          </div>

          <div class="col-sm-1 pt-1">
            <label for="" class="form-label">Total</label>
          </div>
          <div class="col-sm-2 pt-1">
            <input type="text" class="form-control text-right" id="" name=""  value="'.$Adult_Total_Cost.'" readonly>
          </div>

          </div>

          <div class="pl-4 col-md-12 row border-bottom pb-2">
          <div class="col-sm-4 pt-1">
            <label for="" class="form-label">Number of Childern</label>
          </div>
          <div class="col-sm-1 pt-1">
            <input type="text" class="form-control text-right" id="" name=""  value="'.$U_children.'" readonly>
          </div>

          <div class="col-sm-2 pt-1">
            <label for="" class="form-label">Price for 1 Child</label>
          </div>
          <div class="col-sm-2 pt-1">
            <input type="text" class="form-control text-right" id="" name=""  value="'.$U_child_cost.'" readonly>
          </div>

          <div class="col-sm-1 pt-1">
            <label for="" class="form-label">Total</label>
          </div>
          <div class="col-sm-2 pt-1">
            <input type="text" class="form-control text-right" id="" name=""  value="'.$Child_Total_Cost.'" readonly>
          </div>

          <div class="col-sm-10 pt-2">
            <label for="" class="form-label">Sub Total</label>
          </div>
          <div class="col-sm-2 pt-2">
            <input type="text" class="form-control text-right" id="" name=""  value="'.$T_Cost.'" readonly>
          </div>

          <div class="col-sm-4 pt-2">
            <label for="" class="form-label">Additional Request</label>
          </div>
          <div class="col-sm-8 pt-2">
            <input type="text" class="form-control" id="" name=""  value="'.$Request.'" readonly>
          </div>

          </div>

          
          
        </div>
    ';
    }
    $output.= '
    ';
    echo $output;
    }else{
        echo "No Record Found";
    }
        
} 
// ============================================== USER INVOICE FETCH==============================================
if($_POST["action"] == "user_invoice_fetch")
{
    $from =$_POST["from"];
    $to =$_POST["to"];
    $pid =$_POST["p_id"];
    $I_S =$_POST["I_S"];

    if ($pid == 'all_package'){
        $query = "SELECT * FROM invoice WHERE User_ID && Status = '$I_S' && I_Date BETWEEN '$from' AND '$to' ORDER BY Invoice_Number desc";
    }else
    {
        $query = "SELECT * FROM invoice WHERE User_ID && Status = '$I_S' && I_Date BETWEEN '$from' AND '$to' && T_ID = '$pid' ORDER BY Invoice_Number desc";
    }
    
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable4" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>Invoice No</th>
        <th>User ID</th>
        <th>Package ID</th>
        <th>Invoice Date</th>
        <th>Package Start Date</th>
        <th>Package End Date</th>
        <th>No of Child</th>
        <th>No of Adults</th>
        <th>Child Cost</th>
        <th>Adult Cost</th>
        <th>Payment Type</th>
        <th>Total Cost</th>
        <th>Request</th>
        <th>Status</th>
        <th>Action</th>


      </tr>
    </thead>
    <tfoot>
    <tr>
    
        <th>Invoice No</th>
        <th>User ID</th>
        <th>Package ID</th>
        <th>Invoice Date</th>
        <th>Package Start Date</th>
        <th>Package End Date</th>
        <th>No of Child</th>
        <th>No of Adults</th>
        <th>Child Cost</th>
        <th>Adult Cost</th>
        <th>Payment Type</th>
        <th>Total Cost</th>
        <th>Request</th>
        <th>Status</th>
        <th>Action</th>


    </tr>
</tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        <td>'.$row["Invoice_Number"].'</td>
        <td>'.$row["User_ID"].'</td>
        <td>'.$row["T_ID"].'</td>
        <td>'.$row["I_Date"].'</td>
        <td>'.$row["T_start_date"].'</td>
        <td>'.$row["T_end_date"].'</td>
        <td>'.$row["U_children"].'</td>
        <td>'.$row["U_adults"].'</td>
        <td>'.$row["U_child_cost"].'</td>
        <td>'.$row["U_adult_cost"].'</td>
        <td>'.$row["P_type"].'</td>
        <td>'.$row["T_Cost"].'</td>
        <td>'.$row["Request"].'</td>
        <td>'.$row["Status"].'</td>
        <td class="text-center">
        <a target="_blank" href="invoice.php?id= '.$row['Invoice_Number'].'"><button class=" btn-success bt-xs" title="Print"><i class="fa fa-print"></i></button></a>
        <br></br>
        <button id= "'.$row['Invoice_Number'].'" class=" btn-primary bt-xs user_invoice_view" title="View"><i class="fa fa-eye"></i></button>
        </td>
        </tr>



        
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }

// ============================================== USER JORNEY FETCH==============================================
if($_POST["action"] == "user_journey_fetch")
{
    $query = "SELECT * FROM package WHERE Status = 1 ORDER BY T_Start_Date ";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable15" width="100%" celllspacing="0">
    <thead>
      <tr>

        <th>Start Date</th>
        <th>End Date</th>
        <th>Package Name</th>
        <th>Guider Name</th>
        <th>No of Adults</th>
        <th>No of Child</th>
        <th>No of Pacenger</th>
        <th>Action</th>

      </tr>
    </thead>
    <tfoot>
    <tr>
    
        <th>Start Date</th>
        <th>End Date</th>
        <th>Package Name</th>
        <th>Guider Name</th>
        <th>No of Adults</th>
        <th>No of Child</th>
        <th>No of Pacenger</th>
        <th>Action</th>

    </tr>
</tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $T_ID = $row['Travel_ID'];
        $S_Date = $row['T_Start_Date'];
        $E_Date = $row['T_End_Date'];

    $output .= '

        <tr>
        <td>'.$row["T_Start_Date"].'</td>
        <td>'.$row["T_End_Date"].'</td>
        <td>'.$row["T_Name"].'</td>

                
    ';

    $query1 = "SELECT SUM(`U_adults`) AS `U_adults` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']} AND `T_start_date` = '".$S_Date."' AND `T_end_date` = '".$E_Date."' AND `Status` = 'Full Paid'";
    $query_run1 = mysqli_query($conn ,$query1);

    if(mysqli_num_rows($query_run1) > 0)
    {
      while($row2 = mysqli_fetch_assoc($query_run1))
      {
    
         $book1 =  $row2['U_adults']; 
       
      }
    }else
        {
            $book1 = 0;
        }

        $query2 = "SELECT SUM(`U_children`) AS `U_children` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']} AND `T_start_date` =  '".$S_Date."' AND `T_end_date` = '".$E_Date."' AND `Status` = 'Full Paid'";
        $query_run2 = mysqli_query($conn ,$query2);

        if(mysqli_num_rows($query_run2) > 0)
        {
          while($row2 = mysqli_fetch_assoc($query_run2))
          {
    
            $book2 =  $row2['U_children']; 
        
          }
        }else
            {
                $book2 = 0;
            }


            $total = $book1 + $book2;
            $book3 = $row['Available_Seat'];

        if($book3 > $total)
        {
            $seats1 = "$total / $book3";
        }else
          {
          $seats1 = "Booking Full";
          
          }

          $query3 = "SELECT * FROM guider_alocate WHERE P_ID = {$row['Travel_ID']} ";
          $query_run3 = mysqli_query($conn ,$query3);
  
          if(mysqli_num_rows($query_run3) > 0)
          {
            while($row3 = mysqli_fetch_assoc($query_run3))
            {
      
              $G_ID1 =  $row3['G_ID']; 
          
              $query4 = "SELECT * FROM guider WHERE ID = $G_ID1 ";
              $query_run4 = mysqli_query($conn ,$query4);
      
              if(mysqli_num_rows($query_run4) > 0)
              {
                while($row4 = mysqli_fetch_assoc($query_run4))
                {
                    $G_ID =  $row4['G_Name']; 

                }
            }
            }
          }else
              {
                  $G_ID = "No Guider Allocate";
              }

          $output .= '
          <td class="text-center">'.$G_ID.'</td>
          <td class="text-center">'.$book1.'</td>
          <td class="text-center">'.$book2.'</td>
          <td class="text-center">'.$seats1.'</td>
          <td class="text-center">
            <button id= "'.$row['Travel_ID'].'" class=" btn-success bt-xs pacenger_list_by_joutney" title="Pacenger list"><i class="fa fa-user"></i></button>
            <button id= "'.$row['Travel_ID'].'" class=" btn-primary bt-xs Guider_to_journey" title="Alocate Guider"><i class="fa fa-user"></i></button>
        </td>
        </tr>
          ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// ============================================== CHECK GUIDER IS FREE ==============================================
if($_POST["action"] == "Check_Guider_Is_Free")
{
    $G_ID =$_POST["G_ID"];
    $P_ID =$_POST["P_ID"];
    $A = (int)0;
    $B = (int)0;
    $C = (int)0;
    $D = (int)0;
    $E = (int)0;
    $F = (int)0;

    $query = "SELECT * FROM guider_alocate WHERE G_ID = '".$G_ID."'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $Pack_ID = $row['P_ID'];

            $query1 = "SELECT * FROM package WHERE Travel_ID = '".$Pack_ID."'";
            $result1 = mysqli_query($conn, $query1);

            if(mysqli_num_rows($result1) > 0)
            {
                while($row1 = mysqli_fetch_array($result1))
                {
                    $S_Date = $row1['T_Start_Date'];
                    $E_Date = $row1['T_End_Date'];

                    //SELECT * FROM `invoice` WHERE User_ID = {$_SESSION['User_ID']} && `T_start_date` BETWEEN '{$row["T_Start_Date"]}' AND '{$row["T_End_Date"]}' && `T_end_date` BETWEEN '{$row["T_Start_Date"]}' AND '{$row["T_End_Date"]}' && Status = 'Active'"
                    $query2 = "SELECT * FROM package WHERE Travel_ID = '".$P_ID."' && `T_Start_Date` BETWEEN '".$S_Date."' AND '".$E_Date."' && Status = '1'";
                    $result2 = mysqli_query($conn, $query2);

                    if(mysqli_num_rows($result2) > 0)
                    {
                        while($row2 = mysqli_fetch_array($result2))
                        {
                            // echo '1';
                             $A = (int)1;
                        }
                    }else{
                        // echo '0';
                        $B = (int)0;
                    }

                    $query3 = "SELECT * FROM package WHERE Travel_ID = '".$P_ID."' && `T_End_Date` BETWEEN '".$S_Date."' AND '".$E_Date."' && Status = '1'";
                    $result3 = mysqli_query($conn, $query3);

                    if(mysqli_num_rows($result3) > 0)
                    {
                        while($row3 = mysqli_fetch_array($result3))
                        {
                            // echo '1';
                        $C = (int)1;

                        }
                    }else{
                        // echo '0';
                        $D = (int)0;

                    }
                }
            }else{
                // echo '0';
                $E = (int)0;

            }
        }
    }else{
        // echo '0';
        $F = (int)0;

    }
    $G = $A+$B+$C+$D+$E+$F;
    echo '0'+$G;

}

// ==============================================  GUIDER ALOCATE ==============================================
if($_POST["action"] == "Guider_Alocate")
{
    $G_ID =$_POST["G_ID"];
    $P_ID =$_POST["P_ID"];

    $query = "SELECT * FROM guider_alocate WHERE P_ID = '".$P_ID."'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
        {
        while($row = mysqli_fetch_assoc($result))
        {
            echo 'alocated';
        }
    }else{
        $query1 = "INSERT INTO guider_alocate (G_ID,P_ID) VALUES ('$G_ID','$P_ID')";

            if(mysqli_query($conn, $query1))
            {
            echo 'alocate';

            }else{
                echo 'not_alocate';
            }
    }
}

// ==============================================  GUIDER UNALOCATE ==============================================
if($_POST["action"] == "Guider_Alocate_Delete")
{
    $ID =$_POST["ID"];

    $query = "DELETE FROM guider_alocate WHERE ID = '".$ID."'";

     
     if(mysqli_query($conn, $query))
     {
        echo 'Delete';

     }else{
        echo 'Not_Delete';
    }
   
    
}

// ==============================================  FETCH GUIDER ALOCATE ==============================================
if($_POST["action"] == "Guider_Alocated_Fetch")
{
    $P_ID =$_POST["P_ID"];

    $query = "SELECT * FROM guider_alocate WHERE P_ID = '".$P_ID."'";
    $result = mysqli_query($conn, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0)
        {
        while($row = mysqli_fetch_assoc($result))
        {
            $G_ID = $row['G_ID'];
            $ID = $row['ID'];

            $query1 = "SELECT * FROM guider WHERE ID = '".$G_ID."'";
            $result1 = mysqli_query($conn, $query1);

            if(mysqli_num_rows($result1) > 0)
            {
                while($row1 = mysqli_fetch_assoc($result1))
                {
                    $G_Name = $row1['G_Name'];
                }
            }
            $output .= '
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="text" name="" id="CG_ID" value="'.$G_Name.'" class="form-control" >
                </div>
                <button class="btn btn-danger G_Delete" name="G_Delete" value="Edit" id="'.$ID.'">Delete</button>
            </div>
            ';
           
        }
    
    }else{
        $output .= '
        <label for="">Guider Not Allocate Yet</label>
        ';
    }
    $output .= '';
    echo $output;
}

// ============================================== PACENGER LIST BY JORNEY FETCH==============================================
if($_POST["action"] == "pacenger_list_by_joutney_fetch")
{
    $id =$_POST["IID"];
    $query = "SELECT * FROM package WHERE Travel_ID = '".$id."'";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable16" width="100%" celllspacing="0">
    <thead>
      <tr>

        <th>Pacenger Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>No of Adults</th>
        <th>No of Child</th>
        <th>Total Pacenger</th>

      </tr>
    </thead>
    <tfoot>
    <tr>
    
        <th>Pacenger Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>No of Adults</th>
        <th>No of Child</th>
        <th>Total Pacenger</th>

    </tr>
</tfoot>
    <tbody>
    ';
    
    while($row = mysqli_fetch_array($result))
    {
        $S_Date = $row['T_Start_Date'];
        $E_Date = $row['T_End_Date'];
        
        $query5 = "SELECT * FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']} AND `T_start_date` = '".$S_Date."' AND `T_end_date` = '".$E_Date."' AND `Status` = 'Full Paid'";
            $query_run5 = mysqli_query($conn ,$query5);

            if(mysqli_num_rows($query_run5) > 0)
            {
            while($row5 = mysqli_fetch_assoc($query_run5))
            {
                $User_ID = $row5['User_ID'];

            
                $query1 = "SELECT SUM(`U_adults`) AS `U_adults` FROM `invoice` WHERE `User_ID` = $User_ID AND `T_start_date` = '".$S_Date."' AND `T_end_date` = '".$E_Date."' AND `Status` = 'Full Paid'";
            $query_run1 = mysqli_query($conn ,$query1);

            if(mysqli_num_rows($query_run1) > 0)
            {
            while($row2 = mysqli_fetch_assoc($query_run1))
            {
            
                $book1 =  $row2['U_adults']; 
            
            }
            }else
                {
                    $book1 = 0;
                }

            $query2 = "SELECT SUM(`U_children`) AS `U_children` FROM `invoice` WHERE `User_ID` = $User_ID AND `T_start_date` =  '".$S_Date."' AND `T_end_date` = '".$E_Date."' AND `Status` = 'Full Paid'";
            $query_run2 = mysqli_query($conn ,$query2);

            if(mysqli_num_rows($query_run2) > 0)
            {
            while($row2 = mysqli_fetch_assoc($query_run2))
            {
        
                $book2 =  $row2['U_children']; 
            
            }
            }else
                {
                    $book2 = 0;
                }


                $total = $book1 + $book2;
                $book3 = $row['Available_Seat'];

                $query4 = "SELECT * FROM `users` WHERE `User_ID` = '".$User_ID."' ";
                $query_run4 = mysqli_query($conn ,$query4);
    
                if(mysqli_num_rows($query_run4) > 0)
                {
                while($row4 = mysqli_fetch_assoc($query_run4))
                {
                
                    $Name =  $row4['Name'];
                    $Email_Address =  $row4['Email_Address']; 
                    $Phone_Number =  $row4['Phone_Number']; 
    
                    
                
                }
                
                }else{
                    $output .= 'No Records Found';
                }
        
     $output .= '

            <tr>
              <td>'.$Name.'</td>
              <td>'.$Email_Address.'</td>
              <td>'.$Phone_Number.'</td>
              <td class="text-center">'.$book1.'</td>
              <td class="text-center">'.$book2.'</td>
              <td class="text-center">'.$total.'</td>
              
            </tr>
              ';
            
            }

            
           
            
            }else{
                $output .= '<tr><td>No Records Found</td></tr>';
            }

            
    }
    
    
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// ============================================= USER SELECT AND GET INVOICE ============================
    if($_POST["action"] == "user_select")
    {
    $id =$_POST["ID"];
    $from =$_POST["from"];
    $to =$_POST["to"];
    $I_S =$_POST["I_S"];
    $pid =$_POST["p_id"];

    if ($pid == 'all_package'){
        $query = "SELECT * FROM invoice WHERE User_ID = $id && Status = '$I_S' && I_Date BETWEEN '$from' AND '$to' ORDER BY Invoice_Number desc ";
    }else
    {
        $query = "SELECT * FROM invoice WHERE User_ID = $id && Status = '$I_S' && I_Date BETWEEN '$from' AND '$to' && T_ID = '$pid' ORDER BY Invoice_Number desc";
    }

    
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>Invoice No</th>
        <th>User ID</th>
        <th>Package ID</th>
        <th>Invoice Date</th>
        <th>Package Start Date</th>
        <th>Package End Date</th>
        <th>No of Child</th>
        <th>No of Adults</th>
        <th>Child Cost</th>
        <th>Adult Cost</th>
        <th>Payment Type</th>
        <th>Total Cost</th>
        <th>Request</th>
        <th>Status</th>
        <th>Action</th>


      </tr>
    </thead>
    <tfoot>
    <tr>
    
        <th>Invoice No</th>
        <th>User ID</th>
        <th>Package ID</th>
        <th>Invoice Date</th>
        <th>Package Start Date</th>
        <th>Package End Date</th>
        <th>No of Child</th>
        <th>No of Adults</th>
        <th>Child Cost</th>
        <th>Adult Cost</th>
        <th>Payment Type</th>
        <th>Total Cost</th>
        <th>Request</th>
        <th>Status</th>
        <th>Action</th>


    </tr>
</tfoot>
    <tbody>
    ';
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        <td>'.$row["Invoice_Number"].'</td>
        <td>'.$row["User_ID"].'</td>
        <td>'.$row["T_ID"].'</td>
        <td>'.$row["I_Date"].'</td>
        <td>'.$row["T_start_date"].'</td>
        <td>'.$row["T_end_date"].'</td>
        <td>'.$row["U_children"].'</td>
        <td>'.$row["U_adults"].'</td>
        <td>'.$row["U_child_cost"].'</td>
        <td>'.$row["U_adult_cost"].'</td>
        <td>'.$row["P_type"].'</td>
        <td>'.$row["T_Cost"].'</td>
        <td>'.$row["Request"].'</td>
        <td>'.$row["Status"].'</td>
        <td class="text-center">
        <a target="_blank" href="invoice.php?id= '.$row['Invoice_Number'].'"><button class=" btn-success bt-xs" title="Print"><i class="fa fa-print"></i></button></a>
        <br></br>
        <button id= "'.$row['Invoice_Number'].'" class=" btn-primary bt-xs user_invoice_view" title="View"><i class="fa fa-eye"></i></button>
        </td>
        </tr>



        
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    }else{
        $output = 'No Data Found';
    }
    
    echo $output;
    }
// ========================================================
    if($_POST["action"] == "SelectedUserSub")
    {
    $id =$_POST["ID"];
    $from =$_POST["from"];
    $to =$_POST["to"];
    $I_S =$_POST["I_S"];
    $pid =$_POST["p_id"];

    if ($pid == 'all_package'){
        $query = "SELECT SUM(`U_children`) AS `U_children`, SUM(`U_adults`) AS `U_adults`, SUM(`U_child_cost`) AS `U_child_cost`
        , SUM(`U_adult_cost`) AS `U_adult_cost`, SUM(`T_Cost`) AS `T_Cost`, SUM(`A_Child_Cost`) AS `A_Child_Cost`, SUM(`A_Adult_Cost`) 
        AS `A_Adult_Cost` FROM `invoice` WHERE User_ID = $id && Status = '$I_S' && I_Date BETWEEN '$from' AND '$to' ";
    }else
    {
        $query = "SELECT SUM(`U_children`) AS `U_children`, SUM(`U_adults`) AS `U_adults`, SUM(`U_child_cost`) AS `U_child_cost`
        , SUM(`U_adult_cost`) AS `U_adult_cost`, SUM(`T_Cost`) AS `T_Cost`, SUM(`A_Child_Cost`) AS `A_Child_Cost`, SUM(`A_Adult_Cost`) 
        AS `A_Adult_Cost` FROM `invoice` WHERE User_ID = $id && Status = '$I_S' && I_Date BETWEEN '$from' AND '$to' && T_ID = '$pid'";
    }

    
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable21" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>No of Child</th>
        <th>No of Adults</th>
        <th>Child Cost</th>
        <th>Adult Cost</th>
        <th>Actual Child Cost</th>
        <th>Actual Adult Cost</th>
        <th>Total Cost</th>
        <th>Actual Cost</th>
        <th>Total Profit</th>


      </tr>
    </thead>
    <tfoot>
    <tr>
    
        <th>No of Child</th>
        <th>No of Adults</th>
        <th>Child Cost</th>
        <th>Adult Cost</th>
        <th>Actual Child Cost</th>
        <th>Actual Adult Cost</th>
        <th>Total Cost</th>
        <th>Actual Cost</th>
        <th>Total Profit</th>


    </tr>
</tfoot>
    <tbody>
    ';
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result))
    {
        
            $c_cost = $row["A_Child_Cost"];

            $a_cost = $row["A_Adult_Cost"];
           
            $total = $c_cost+$a_cost;

            $cost = $row["T_Cost"];
            $profi = $cost-$total;
    $output .= '

        <tr>
        <td>'.$row["U_children"].'</td>
        <td>'.$row["U_adults"].'</td>
        <td>'.$row["U_child_cost"].'</td>
        <td>'.$row["U_adult_cost"].'</td>
        <td>'.$row["A_Child_Cost"].'</td>
        <td>'.$row["A_Adult_Cost"].'</td>
        <td>'.$row["T_Cost"].'</td>
        <td>'.$total.'</td>
        <td>'.$profi.'</td>
        
        </tr>



        
    ';
  
        
    }
    $output .= '</tbody>
    </table>
    </div>';
    }else{
        $output = 'No Data Found';
    }
    
    echo $output;
    }
// ============================================== ALL SELECT & SUB TOTAL ============================
if($_POST["action"] == "allUserSubTotal")
    {
    $from =$_POST["from"];
    $to =$_POST["to"];
    $pid =$_POST["p_id"];
    $I_S =$_POST["I_S"];

    if ($pid == 'all_package'){
        $query = "SELECT SUM(`U_children`) AS `U_children`, SUM(`U_adults`) AS `U_adults`, SUM(`U_child_cost`) AS `U_child_cost`
        , SUM(`U_adult_cost`) AS `U_adult_cost`, SUM(`T_Cost`) AS `T_Cost`, SUM(`A_Child_Cost`) AS `A_Child_Cost`, SUM(`A_Adult_Cost`) 
        AS `A_Adult_Cost` FROM `invoice` WHERE User_ID && Status = '$I_S' && I_Date BETWEEN '$from' AND '$to' ";
    }else
    {
        $query = "SELECT SUM(`U_children`) AS `U_children`, SUM(`U_adults`) AS `U_adults`, SUM(`U_child_cost`) AS `U_child_cost`
        , SUM(`U_adult_cost`) AS `U_adult_cost`, SUM(`T_Cost`) AS `T_Cost`, SUM(`A_Child_Cost`) AS `A_Child_Cost`, SUM(`A_Adult_Cost`) 
        AS `A_Adult_Cost` FROM `invoice` WHERE User_ID && Status = '$I_S' && I_Date BETWEEN '$from' AND '$to' && T_ID = '$pid'";
    }

    
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable20" width="100%" celllspacing="0">
    <thead>
      <tr>
        <th>No of Child</th>
        <th>No of Adults</th>
        <th>Child Cost</th>
        <th>Adult Cost</th>
        <th>Actual Child Cost</th>
        <th>Actual Adult Cost</th>
        <th>Total Cost</th>
        <th>Actual Cost</th>
        <th>Total Profit</th>


      </tr>
    </thead>
    <tfoot>
    <tr>
    
        <th>No of Child</th>
        <th>No of Adults</th>
        <th>Child Cost</th>
        <th>Adult Cost</th>
        <th>Actual Child Cost</th>
        <th>Actual Adult Cost</th>
        <th>Total Cost</th>
        <th>Actual Cost</th>
        <th>Total Profit</th>


    </tr>
</tfoot>
    <tbody>
    ';
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result))
    {
        
            $c_cost = $row["A_Child_Cost"];

            $a_cost = $row["A_Adult_Cost"];
           
            $total = $c_cost+$a_cost;

            $cost = $row["T_Cost"];
            $profi = $cost-$total;
    $output .= '

        <tr>
        <td>'.$row["U_children"].'</td>
        <td>'.$row["U_adults"].'</td>
        <td>'.$row["U_child_cost"].'</td>
        <td>'.$row["U_adult_cost"].'</td>
        <td>'.$row["A_Child_Cost"].'</td>
        <td>'.$row["A_Adult_Cost"].'</td>
        <td>'.$row["T_Cost"].'</td>
        <td>'.$total.'</td>
        <td>'.$profi.'</td>
        
        </tr>



        
    ';
        
    
        
    
        
        
        
    }
    $output .= '</tbody>
    </table>
    </div>';
    }else{
        $output = 'No Data Found';
    }
    
    echo $output;
    }
// ============================================== ALERTS FETCH ==============================================
    if($_POST["action"] == "fetch_alerts")
    {
        $query = "SELECT * FROM alerts ORDER BY ID desc LIMIT 3 ";
        $result = mysqli_query($conn, $query);
        $output = '

    ';
    while($row = mysqli_fetch_array($result))
    {
    
        $status = $row['Status'];
        if($status == 1)
        {
            $output .= '
            <a class="dropdown-item d-flex align-items-center">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-eye text-white"></i>
                </div>
            </div>
            <div>
            <div class="small text-gray-500">'.$row["Date"].'</div>
            '.$row["Details"].'
            </div>
            </a>
        
                ';
        }else
        if($status == 2)
        {
            $output .= '
            <a class="dropdown-item d-flex align-items-center">
            <div class="mr-3">
                <div class="icon-circle bg-secondary">
                    <i class="fas fa-eye-slash text-white"></i>
                </div>
            </div>
            <div>
            <div class="small text-gray-500">'.$row["Date"].'</div>
            <div class="font-weight-bold">'.$row["Details"].'</div>
            </div>
            </a>
        
                ';
        }
 
    }
    $output .= '';
    echo $output;
    }

    if($_POST["action"] == "show_all_alerts")
    {
    $query = "SELECT * FROM alerts ORDER BY ID desc";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive">
        <table class="table table-bordered" id="datatable" width="100%" celllspacing="0" style="font-size: 12px;">
          <thead>
            <tr>
              <th width="15%">Date</th>
              <th>Alert</th>
              <th width="15%">Action</th>
            </tr>
          </thead>
          <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        
        <td>'.$row["Date"].'</td>
        <td>'.$row["Details"].'</td>

        ';
                    $status = $row['Status'];

                    if($status == 1){
                        $status1 = '<button type="button" class=" btn-success bt-xs read" id="'.$row["ID"].'" title="Read"><i class="fas fa-eye"></i></button>';
                    }else 
                    if($status == 2){
                        $status1 = '<button type="button" class=" btn-secondary bt-xs un_read" id="'.$row["ID"].'" title="Un-reade"><i class="fas fa-eye-slash"></i></button>';
                    }

                $output.='

        <td  style="text-align: center;">'. $status1.'
        <button type="button" class=" btn-danger bt-xs alert_delete" id="'.$row["ID"].'" title="Delete"><i class="fas fa-trash"></i></button>
        </td>
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// Alert read -> Un-read
    if($_POST["action"] == "unreade_alert")
    {
    $status = 2;


     $query = "UPDATE alerts SET Status='$status' WHERE ID= '".$_POST["ID"]."'";
     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// Alert Un-read -> Read
    if($_POST["action"] == "reade_alert")
    {
    $status = 1;


     $query = "UPDATE alerts SET Status='$status' WHERE ID= '".$_POST["ID"]."'";
     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// Alert Delete
    if($_POST["action"] == "delete_alert")
    {

    $query = "DELETE FROM alerts WHERE ID = '".$_POST["ID"]."'";

     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// Alert Read
    if($_POST["action"] == "all_alerts_read")
    {
    $status = 1;


     $query = "UPDATE alerts SET Status='$status' WHERE Status= 2";
     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// All Read Alert Delete
    if($_POST["action"] == "all_alerts_delete")
    {

    $query = "DELETE FROM alerts WHERE Status = 1";

     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// ============================================== ALERTS COUNT FETCH ==============================================
    if($_POST["action"] == "fetch_alerts_count")
    {
        $query = "SELECT ID FROM alerts WHERE Status=2";
        $result = mysqli_query($conn, $query);


        $row = mysqli_num_rows($result);


    echo $row;
    }
// ============================================== EVENT COUNT FETCH ==============================================
    if($_POST["action"] == "fetch_event_count")
    {
        $query="SELECT * FROM package WHERE Status = '1' ORDER BY T_Start_Date LIMIT 1";
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($query_run);

        if($row > 0){ 
            $next_event_date = $row['T_Start_Date'];
            

            $query1="SELECT * FROM package WHERE Status = '1' && T_Start_Date = '$next_event_date' ";
            $query_run1 = mysqli_query($conn, $query1);
            $row1 = mysqli_num_rows($query_run1);

            $count = $row1;

            echo $count;
                }else
                {
                echo '0';
                }
    }

// ============================================== Upcoming EVENT COUNT FETCH ==============================================
    if($_POST["action"] == "fetch_upcoming_event")
    {
        $query="SELECT * FROM package WHERE Status = '1' ORDER BY T_Start_Date LIMIT 1";
        $query_run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($query_run);

        if($row > 0){ 
            $next_event_date = $row['T_Start_Date'];
            

            $query1="SELECT * FROM package WHERE Status = '1' && T_Start_Date = '$next_event_date' ";
            $query_run1 = mysqli_query($conn, $query1);
            $row1 = mysqli_num_rows($query_run1);

            $count = $row1;

            echo 'Next  '.$count.' upcoming event on '.$next_event_date.'';
                }else
                {
                echo 'No Any Upcoming Event';
                }
    }
    // ============================================== ENQUIRY FETCH ==============================================
    if($_POST["action"] == "fetch_enquiry")
    {
        $query = "SELECT * FROM enquiry ORDER BY ID desc LIMIT 3 ";
        $result = mysqli_query($conn, $query);
        $output = '

    ';
    while($row = mysqli_fetch_array($result))
    {
    
        $status = $row['Status'];
        if($status == 1)
        {
            $output .= '
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-secondary">
                        <i class="fas fa-envelope-open-text text-white"></i>
                        
                    </div>
                </div>
                <div class="">
                    <div class="text-truncate">'.$row["Subject"].'</div>
                    <div class="small text-gray-500">'.$row["Date"].'</div>
                </div>
            </a>
        
                ';
        }else
        if($status == 2)
        {
            $output .= '
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-envelope text-white"></i>
                    </div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate">'.$row["Subject"].'</div>
                    <div class="small text-gray-500">'.$row["Date"].'</div>
                </div>
            </a>
        
                ';
        }
 
    }
    $output .= '';
    echo $output;
    }

    if($_POST["action"] == "show_all_enquiry")
    {
    $query = "SELECT * FROM enquiry ORDER BY ID desc";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive">
        <table class="table table-bordered" id="datatable" width="100%" celllspacing="0" style="font-size: 12px;">
          <thead>
            <tr>
              <th width="15%">Date</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Subject</th>
              <th>Message</th>
              <th width="15%">Action</th>
            </tr>
          </thead>
          <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        
        <td>'.$row["Date"].'</td>
        <td>'.$row["Name"].'</td>
        <td>'.$row["E_mail"].'</td>
        <td>'.$row["Subject"].'</td>
        <td>'.$row["Body"].'</td>


        ';
                    $status = $row['Status'];

                    if($status == 1){
                        $status1 = '<button type="button" class=" btn-success bt-xs read_email" id="'.$row["ID"].'" title="Read"><i class="fas fa-eye"></i></button>';
                    }else 
                    if($status == 2){
                        $status1 = '<button type="button" class=" btn-secondary bt-xs un_read_email" id="'.$row["ID"].'" title="Un-reade"><i class="fas fa-eye-slash"></i></button>';
                    }

                $output.='

        <td  style="text-align: center;">'. $status1.'
        <button type="button" class=" btn-danger bt-xs enquiry_delete" id="'.$row["ID"].'" title="Delete"><i class="fas fa-trash"></i></button>
        </td>
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// Enquiry read -> Un-read
    if($_POST["action"] == "unreade_enquiry")
    {
    $status = 2;


     $query = "UPDATE enquiry SET Status='$status' WHERE ID= '".$_POST["ID"]."'";
     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// Enquiry Un-read -> Read
    if($_POST["action"] == "reade_enquiry")
    {
    $status = 1;


     $query = "UPDATE enquiry SET Status='$status' WHERE ID= '".$_POST["ID"]."'";
     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// Enquiry Delete
    if($_POST["action"] == "delete_enquiry")
    {

    $query = "DELETE FROM enquiry WHERE ID = '".$_POST["ID"]."'";

     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// Enquiry Read
    if($_POST["action"] == "all_enquiry_read")
    {
    $status = 1;


     $query = "UPDATE enquiry SET Status='$status' WHERE Status= 2";
     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// All Read Enquiry Delete
    if($_POST["action"] == "all_enquiry_delete")
    {

    $query = "DELETE FROM enquiry WHERE Status = 1";

     
     if(mysqli_query($conn, $query))
     {

            echo 'change';

     }else
     echo 'notchange';
    }
// ============================================== ENQUIRY COUNT FETCH ==============================================
    if($_POST["action"] == "fetch_enquiry_count")
    {
        $query = "SELECT ID FROM enquiry WHERE Status=2";
        $result = mysqli_query($conn, $query);


        $row = mysqli_num_rows($result);


    echo $row;
    }
// ============================================== CHAT-BOT FETCH =============================================================
    if($_POST["action"] == "fetch_chat_bot")
    {
    $query = "SELECT * FROM chat_bot ORDER BY ID desc";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">
        <table class="table table-bordered" id="datatable12" width="100%" celllspacing="0" style="font-size: 12px;">
          <thead>
            <tr>
              <th>Questions</th>
              <th>Answers</th>
              <th width="15%">Action</th>
            </tr>
          </thead>
          <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        
        <td>'.$row["Questions"].'</td>
        <td>'.$row["Answers"].'</td>

        <td  style="text-align: center;">
        <button type="button" class=" btn-success bt-xs bot_edit" id="'.$row["ID"].'" title="Edit"><i class="fas fa-edit"></i></button>
        <button type="button" class=" btn-danger bt-xs bot_delete" id="'.$row["ID"].'" title="Delete"><i class="fas fa-trash"></i></button>
        </td>
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// ============================================== ICONS FETCH =============================================================
    if($_POST["action"] == "fetch_icons")
    {
    $query = "SELECT * FROM all_icons ORDER BY ID desc";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">
        <table class="table table-bordered" id="datatable13" width="100%" celllspacing="0" style="font-size: 12px;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Icon</th>
              <th>Title</th>
              <th width="100px">Action</th>
            </tr>
          </thead>
          <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        
        <td>'.$row["ID"].'</td>
        <td><i class="'.$row["Icons"].'" style="font-size: 20px;"></i></td>
        <td>'.$row["Title"].'</td>


        <td  style="text-align: center;">
        <button type="button" class=" btn-success bt-xs icons_edit" id="'.$row["ID"].'" title="Delete"><i class="fas fa-edit"></i></button>
        <button type="button" class=" btn-danger bt-xs icons_delete" id="'.$row["ID"].'" title="Delete"><i class="fas fa-trash"></i></button>
        </td>
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }
// ============================================== CATEGORY FETCH==============================================
    if($_POST["action"] == "category_fetch")
    {
        $query = "SELECT * FROM catogory";
        $result = mysqli_query($conn, $query);
        $output = '
        <div class="table-responsive small">  
        <table class="table table-bordered" id="datatable5" width="100%" celllspacing="0" style="font-size: 12px;">
        <thead>
          <tr>
            
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Category Details</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
        
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Category Details</th>
            <th>Action</th>
        </tr>
    </tfoot>
        <tbody>
        ';
        while($row = mysqli_fetch_array($result))
        {
        $output .= '

            <tr>
            
            <td>'.$row["C_Name"].'</td>
            
            
            <td><img src="data:image/jpeg;base64,'.base64_encode($row['C_Image'] ).'" height="100" width="100"/></td>
            
            <td>'.$row["C_Details"].'</td>
            
            <td><button type="button" name="update" class="btn btn-success bt-xs cat_update" id="'.$row["C_ID"].'"><i class="fa fa-edit"></i>Edit</button>
            <button type="button" name="delete" class="btn btn-danger bt-xs cat_delete" id="'.$row["C_ID"].'"><i class="fa fa-been"></i>Delete</button></td>
            </tr>
        ';
        }
        $output .= '</tbody>
        </table>
        </div>';
        echo $output;
        }
// ============================================== PACKAGE OVERVIEW FETCH==============================================
    if($_POST["action"] == "package_overview")
    {
        $query = "SELECT * FROM package";
        $result = mysqli_query($conn, $query);

        $output = '
        <div class="table-responsive small">  
        <table class="table table-bordered" id="datatable6" width="100%" celllspacing="0" style="font-size: 12px;">
        <thead>
        <tr>
            
            <th>Category Name</th>
            <th>Package Name</th>
            <th>Adult Cost</th>
            <th>Selling Price (Adult)</th>
            <th>Child Cost</th>
            <th>Selling Price (Child)</th>
            <th>Image</th>
            <th>Overview</th>
            <th>Locations</th>
            <th>Map</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Number Of Day</th>
            <th>Number Of Booking</th>
            <th>Action / Status</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        
            <th>Category Name</th>
            <th>Package Name</th>
            <th>Adult Cost</th>
            <th>Selling Price (Adult)</th>
            <th>Child Cost</th>
            <th>Selling Price (Child)</th>
            <th>Image</th>
            <th>Overview</th>
            <th>Locations</th>
            <th>Map</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Number Of Day</th>
            <th>Number Of Booking</th>
            <th>Action / Status</th>
        </tr>
    </tfoot>
        <tbody>
        ';
        while($row = mysqli_fetch_array($result))
        {
            $S_Date = $row['T_Start_Date'];
            $E_Date = $row['T_End_Date'];

            $query1 = "SELECT * FROM catogory WHERE C_ID= {$row['C_ID']}";
            $query_run1 = mysqli_query($conn,$query1);

            if(mysqli_num_rows($query_run1) > 0)
            {
            while($row1 = mysqli_fetch_assoc($query_run1))
            {

                $output .= '
            <tr>


            <td>'.$row1['C_Name'].'</td>
            '; }
            }
        $output .= '

            
            
            <td>'.$row["T_Name"].'</td>
            <td>'.$row["T_Adult_Cost"].'</td>
            <td>'.$row["T_Adult_S_Price"].'</td>

            <td>'.$row["T_Child_Cost"].'</td>
            <td>'.$row["T_Child_S_Price"].'</td>


            
            <td><img src="data:image/jpeg;base64,'.base64_encode($row['T_Image'] ).'" height="100" width="100"/></td>
            
            <td>'.$row["T_Details"].'</td>
            <td>'.$row["T_Locations"].'</td>
            <td>'.$row["T_Map"].'</td>
            <td>'.$row["T_Start_Date"].'</td>
            <td>'.$row["T_End_Date"].'</td>

            '; 
                            $db_date = $row['T_Start_Date'];
                            $date1 = strtotime($db_date);

                            $cut_date = $row['T_End_Date'];
                            $date2 = strtotime($cut_date);

                            $closing = $date2 - $date1;

                            $date3 = $closing / (60*60*24);
                            $output.='
                        

            <td>'. $date3.'</td>
            ';
            // SELECT SUM(`U_children`) AS `U_children` FROM `invoice` WHERE `T_ID` = 8 AND `T_start_date` = "2023-01-03" AND `T_end_date` = "2023-01-10"
                $query1 = "SELECT SUM(`U_adults`) AS `U_adults` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']} AND `T_start_date` = '".$S_Date."' AND `T_end_date` = '".$E_Date."' AND `Status` = 'Full Paid'";
                $query_run1 = mysqli_query($conn ,$query1);

                if(mysqli_num_rows($query_run1) > 0)
                {
                  while($row2 = mysqli_fetch_assoc($query_run1))
                  {
                
                     $book1 =  $row2['U_adults']; 
                   
                  }
                }else
                    {
                        $book1 = 0;
                    }
            
                    $query2 = "SELECT SUM(`U_children`) AS `U_children` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']} AND `T_start_date` =  '".$S_Date."' AND `T_end_date` = '".$E_Date."' AND `Status` = 'Full Paid'";
                    $query_run2 = mysqli_query($conn ,$query2);

                    if(mysqli_num_rows($query_run2) > 0)
                    {
                      while($row2 = mysqli_fetch_assoc($query_run2))
                      {
                
                        $book2 =  $row2['U_children']; 
                    
                      }
                    }else
                        {
                            $book2 = 0;
                        }


                        $total = $book1 + $book2;
                        $book3 = $row['Available_Seat'];

                    if($book3 > $total)
                    {
                        $seats1 = "$total / $book3";
                    }else
                      {
                      $seats1 = "Booking Full";
                      
                      }

                $query4 = "SELECT SUM(`U_adults`) AS `U_adults` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']} && `Status` = 'Full Paid'";
                $query_run4 = mysqli_query($conn ,$query4);

                if(mysqli_num_rows($query_run4) > 0)
                {
                  while($row4 = mysqli_fetch_assoc($query_run4))
                  {
                
                     $book4 =  $row4['U_adults']; 
                   
                  }
                }else
                    {
                        $book4 = 0;
                    }
            
                    $query5 = "SELECT SUM(`U_children`) AS `U_children` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']} && `Status` = 'Full Paid'";
                    $query_run5 = mysqli_query($conn ,$query5);

                    if(mysqli_num_rows($query_run5) > 0)
                    {
                      while($row5 = mysqli_fetch_assoc($query_run5))
                      {
                
                        $book5 =  $row5['U_children']; 
                    
                      }
                    }else
                        {
                            $row5 = 0;
                        }


                        $total5 = $book4 + $book5;

                      $query3 = "UPDATE no_of_travelers SET No_of_Travelers='$total5' WHERE T_ID = {$row['Travel_ID']}";
                      $query_run2 = mysqli_query($conn ,$query3);

            $output.='
            <td>'. $seats1.'</td>
            ';
                    $status = $row['Status'];

                    if($status == 1){
                        $status1 = '<button type="button" class="btn btn-success bt-xs pack_status_active" id="'.$row["Travel_ID"].'">Active</button>';
                    }else 
                    if($status == 0){
                        $status1 = '<button type="button" class="btn btn-secondary bt-xs pack_status_deactive" id="'.$row["Travel_ID"].'">Deactive</button>';
                    }else 
                    if($status == 2){
                        $status1 = '<button type="button" class="btn btn-info bt-xs pack_status_proccess" id="'.$row["Travel_ID"].'">Proccess</button>';
                    }else 
                    if($status == 3){
                        $status1 = '<button type="button" class="btn btn-danger bt-xs pack_status_bookfull" id="'.$row["Travel_ID"].'">Booking Full</button>';
                    }else 
                    if($status == 4){
                        $status1 = '<button type="button" class="btn btn-danger bt-xs pack_status_expired" id="'.$row["Travel_ID"].'">Expired</button>';
                    }

                $output.='
                <td>
            
            <button type="button" name="update" class="btn btn-success bt-xs pack_over_update" id="'.$row["Travel_ID"].'"><i class="fa fa-edit"></i> Edit</button>
            '. $status1.'
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_over_high" id="'.$row["Travel_ID"].'">Highlights</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_over_accommodation" id="'.$row["Travel_ID"].'">Accommodation</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_over_activity" id="'.$row["Travel_ID"].'">Activity</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_over_include" id="'.$row["Travel_ID"].'">Includes</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_over_tc" id="'.$row["Travel_ID"].'">T&C</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_over_img" id="'.$row["Travel_ID"].'">Image</button>
            <button type="button" name="delete" class="btn btn-danger bt-xs pack_over_delete" id="'.$row["Travel_ID"].'"><i class="fa fa-trash"></i> Delete</button></td>
            
                

            </tr>
        ';
        }
        $output .= '</tbody>
        </table>
        </div>';
        echo $output;
        }        
// ============================================== PACKAGE ITINERARY FETCH==============================================
    if($_POST["action"] == "package_itinerary")
    {
        $id =$_POST["ID"];
        $query = "SELECT * FROM t_itinerary WHERE T_ID = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
            {
        $output = '
        <div class="table-responsive small">  
        <table class="table table-bordered" id="datatable10" width="100%" celllspacing="0" style="font-size: 12px;">
        <thead>
        <tr>
            
            <th>Package Name</th>
            <th>Itinerary Date</th>
            <th>Locations</th>
            <th>Details</th>
            <th>Accommodations</th>
            <th>Activities</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Package Name</th>
            <th>Itinerary Date</th>
            <th>Locations</th>
            <th>Details</th>
            <th>Accommodations</th>
            <th>Activities</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </tfoot>
        <tbody>
        ';
        while($row = mysqli_fetch_array($result))
        {
            
            $query1 = "SELECT * FROM package WHERE Travel_ID= {$row['T_ID']}";
            $query_run1 = mysqli_query($conn,$query1);

            if(mysqli_num_rows($query_run1) > 0)
            {
            while($row1 = mysqli_fetch_assoc($query_run1))
            {

                $output .= '
            <tr>


            <td>'.$row1['T_Name'].'</td>
            '; }
            }
        $output .= '

            
            
            <td>'.$row["I_Date"].'</td>
            <td>'.$row["I_Locations"].'</td>
            <td>'.$row["I_Details"].'</td>
            <td>'.$row["I_Accommodations"].'</td>
            <td>'.$row["I_Activities"].'</td>
            
            <td><img src="data:image/jpeg;base64,'.base64_encode($row['I_Image'] ).'" height="100" width="100"/></td>
            
            
            <td><button type="button" name="update" class="btn btn-success bt-xs pack_itinerary_update" id="'.$row["ID"].'"><i class="fa fa-edit"></i>Edit</button>
            <button type="button" name="delete" class="btn btn-danger bt-xs pack_itinerary_delete" id="'.$row["ID"].'"><i class="fa fa-been"></i>Delete</button></td>
            </tr>
        ';
        }
    
        $output .= '</tbody>
        </table>
        </div>';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    }
// ============================================== PACKAGE ACCOMMODATION FETCH==============================================
    if($_POST["action"] == "package_accommodation")
    {
        // $id =$_POST["ID"];
        $query = "SELECT * FROM t_accommodation";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
            {
        $output = '
        <div class="table-responsive small">  
        <table class="table table-bordered" id="datatable7" width="100%" celllspacing="0" style="font-size: 12px;">
        <thead>
        <tr>
            
            
            <th>Accommodation Name</th>
            <th>Locations</th>
            <th>summary</th>
            <th>Details</th>
            <th>Link</th>
            <th>Image</th>
            <th>Style</th>
            <th>No of Rooms</th>
            <th>Key Features</th>
            <th>Action</th>
            
        </tr>
        </thead>
        <tfoot>
        <tr>
            
            <th>Accommodation Name</th>
            <th>Locations</th>
            <th>summary</th>
            <th>Details</th>
            <th>Link</th>
            <th>Image</th>
            <th>Style</th>
            <th>No of Rooms</th>
            <th>Key Features</th>
            <th>Action</th>

        </tr>
    </tfoot>
        <tbody>
        ';
        while($row = mysqli_fetch_array($result))
        {
            
           
        $output .= '

            
            
            <td>'.$row["A_Name"].'</td>
            <td>'.$row["A_Location"].'</td>
            <td>'.$row["A_summary"].'</td>

            <td>'.$row["A_Details"].'</td>
            <td>'.$row["A_Link"].'</td>
            
            
            <td><img src="data:image/jpeg;base64,'.base64_encode($row['A_Image'] ).'" height="100" width="100"/></td>
            <td>'.$row["Style"].'</td>
            <td>'.$row["No_of_rooms"].'</td>
            <td>'.$row["Key_features"].'</td>
            
            
            <td><button type="button" name="update" class="btn btn-success bt-xs pack_accommodation_update" id="'.$row["ID"].'"><i class="fa fa-edit"></i>Edit</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_accommodation_img" id="'.$row["ID"].'">Image</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_accommodation_icon" id="'.$row["ID"].'">Icons</button>
            <button type="button" name="delete" class="btn btn-danger bt-xs pack_accommodation_delete" id="'.$row["ID"].'"><i class="fa fa-been"></i>Delete</button></td>
            </tr>
        ';
        }

        $output .= '</tbody>
        </table>
        </div>';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    }
    // ============================================== PACKAGE ACCOMMODATION ICON FETCH==============================================
    if($_POST["action"] == "pack_accommodation_icon_fetch")
    {
        
        $query2 = "SELECT * FROM all_icons INNER JOIN icons ON all_icons.ID = icons.Icon WHERE icons.Acc_ID = {$_POST["UserID"]} ";
        $result2 = mysqli_query($conn, $query2);
        if(mysqli_num_rows($result2) > 0)
        {
            {
                $output = '';
                while($row2 = mysqli_fetch_array($result2))
                {
                    
                        $output .= '
                    <button class="btn btn-success deactive_icon '.$row2["Icons"].' " id="'.$row2["ID"].'" title="'.$row2["Title"].'"></button>
                    ';
                    
                    $icon_id = $row2["Icon"];
                }
                
            }
            
            echo $output;

            $query3 = "SELECT * FROM all_icons";
            $result3 = mysqli_query($conn, $query3);
            if(mysqli_num_rows($result3) > 0)
            $output = '
            <div class="form-group">
            <label>All Icons</label>
          </div>
            <div style="height: 40vh; overflow-y: scroll;">';
                {
                    
                    while($row3 = mysqli_fetch_array($result3))
                    {
                        
                        
                            $icon = '
                            <button class="btn btn-secondary active_icon '.$row3["Icons"].' " id="'.$row3["ID"].'" title="'.$row3["Title"].'"></button>
                            ';
                            $output .= ''.$icon.'';
                        

                    }
                    
                }
                $output .= '</div>';
                echo $output;
            }else
            {
                $query4 = "SELECT * FROM all_icons ";
                $result4 = mysqli_query($conn, $query4);
                if(mysqli_num_rows($result4) > 0)
                
                    {$output = '<h2>No Any Icons Active Now</h2>
                        <p>Choose Below Icons for Active</p>';
                        
                        while($row4 = mysqli_fetch_array($result4))
                        {

                                $output .= '
                                
                                <button class="btn btn-secondary active_icon '.$row4["Icons"].' " id="'.$row4["ID"].'" title="'.$row4["Title"].'"></button>
                                ';
  
                        }
                        
                    }echo $output;
            }

                
        }
// De-active => Active
    if($_POST["action"] == "active_accomo_icon")
    {
        $Act_ID = '0';
        $Acc_ID = $_POST["accomo"];
        $Icon = $_POST["UserID"];

        $query3 = "SELECT * FROM icons WHERE Icon = $Icon && Acc_ID = $Acc_ID";
        $result3 = mysqli_query($conn, $query3);
        if(mysqli_num_rows($result3) > 0)

            {
                echo 'duplicate';
            }
            else{
                    $query = "INSERT INTO icons (Act_ID,Acc_ID,Icon) VALUES ('$Act_ID','$Acc_ID','$Icon')";
                    if(mysqli_query($conn, $query))
                    {
                    echo 'active';

                    }else{
                        echo 'not_active';
                    }
                }
    }

    // Active => dective
    if($_POST["action"] == "deactive_accomo_icon")
    {

        $Icon = $_POST["UserID"];
        $query = "DELETE FROM icons WHERE ID = '".$_POST["UserID"]."'";
        if(mysqli_query($conn, $query))
        {
        echo 'deactive';

        }else{
            echo 'not_deactive';
        }
    }

// Dective All 
    if($_POST["action"] == "deactive_accomo_all_icon")
    {

        $Icon = $_POST["UserID"];
        $query = "DELETE FROM icons WHERE Acc_ID = '".$_POST["UserID"]."'";
        if(mysqli_query($conn, $query))
        {
        echo 'deactive_all';

        }else{
            echo 'not_deactive_all';
        }
    }

// ============================================== PACKAGE ACTIVITY ICON FETCH==============================================
        if($_POST["action"] == "pack_activity_icon_fetch")
        {
            
            $query2 = "SELECT * FROM all_icons INNER JOIN icons ON all_icons.ID = icons.Icon WHERE icons.Act_ID = {$_POST["UserID"]} ";
            $result2 = mysqli_query($conn, $query2);
            if(mysqli_num_rows($result2) > 0)
            {
                {
                    $output = '';
                    while($row2 = mysqli_fetch_array($result2))
                    {
                        
                            $output .= '
                        <button class="btn btn-success pack_deactive_icon '.$row2["Icons"].' " id="'.$row2["ID"].'" title="'.$row2["Title"].'"></button>
                        ';
                        
                        $icon_id = $row2["Icon"];
                    }
                    
                }
                
                echo $output;
    
                $query3 = "SELECT * FROM all_icons";
                $result3 = mysqli_query($conn, $query3);
                if(mysqli_num_rows($result3) > 0)
                $output = '
                <div class="form-group">
                <label>All Icons</label>
              </div>
                <div style="height: 40vh; overflow-y: scroll;">';
                    {
                        
                        while($row3 = mysqli_fetch_array($result3))
                        {
                            
                            
                                $icon = '
                                <button class="btn btn-secondary pack_active_icon '.$row3["Icons"].' " id="'.$row3["ID"].'" title="'.$row3["Title"].'"></button>
                                ';
                                $output .= ''.$icon.'';
                            
    
                        }
                        
                    }
                    $output .= '</div>';
                    echo $output;
                }else
                {
                    $query4 = "SELECT * FROM all_icons ";
                    $result4 = mysqli_query($conn, $query4);
                    if(mysqli_num_rows($result4) > 0)
                    
                        {$output = '<h2>No Any Icons Active Now</h2>
                            <p>Choose Below Icons for Active</p>';
                            
                            while($row4 = mysqli_fetch_array($result4))
                            {
    
                                    $output .= '
                                    
                                    <button class="btn btn-secondary pack_active_icon '.$row4["Icons"].' " id="'.$row4["ID"].'" title="'.$row4["Title"].'"></button>
                                    ';
      
                            }
                            
                        }echo $output;
                }
    
                    
            }
    // De-active => Active
        if($_POST["action"] == "active_activi_icon")
        {
            $Acc_ID = '0';
            $Act_ID = $_POST["accomo"];
            $Icon = $_POST["UserID"];
    
            $query3 = "SELECT * FROM icons WHERE Icon = $Icon && Act_ID = $Acc_ID";
            $result3 = mysqli_query($conn, $query3);
            if(mysqli_num_rows($result3) > 0)
    
                {
                    echo 'duplicate';
                }
                else{
                        $query = "INSERT INTO icons (Act_ID,Acc_ID,Icon) VALUES ('$Act_ID','$Acc_ID','$Icon')";
                        if(mysqli_query($conn, $query))
                        {
                        echo 'active';
    
                        }else{
                            echo 'not_active';
                        }
                    }
        }
    
        // Active => dective
        if($_POST["action"] == "deactive_activi_icon")
        {
    
            $Icon = $_POST["UserID"];
            $query = "DELETE FROM icons WHERE ID = '".$_POST["UserID"]."'";
            if(mysqli_query($conn, $query))
            {
            echo 'deactive';
    
            }else{
                echo 'not_deactive';
            }
        }
    
    // Dective All 
        if($_POST["action"] == "deactive_pack_all_icon")
        {
    
            $Icon = $_POST["UserID"];
            $query = "DELETE FROM icons WHERE Act_ID = '".$_POST["UserID"]."'";
            if(mysqli_query($conn, $query))
            {
            echo 'deactive_all';
    
            }else{
                echo 'not_deactive_all';
            }
        }
// ============================================== PACKAGE ACTIVITY FETCH==============================================
    if($_POST["action"] == "package_activity")
    {
        // $id =$_POST["ID"];
        $query = "SELECT * FROM t_activities ";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
            {
        $output = '
        <div class="table-responsive small">  
        <table class="table table-bordered" id="datatable8" width="100%" celllspacing="0" style="font-size: 12px;">
        <thead>
        <tr>
            
            
            <th>Activity Name</th>
            <th>Locations</th>
            <th>Summary</th>
            <th>Details</th>
            <th>Duration</th>
            <th>Best Time</th>
            <th>Location Link</th>
            <th>Image</th>
            <th>Action</th>
            
        </tr>
        </thead>
        <tfoot>
        <tr>
           
            <th>Activity Name</th>
            <th>Locations</th>
            <th>Summary</th>
            <th>Details</th>
            <th>Duration</th>
            <th>Best Time</th>
            <th>Location Link</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
    </tfoot>
        <tbody>
        ';
        while($row = mysqli_fetch_array($result))
        {
            
            
        $output .= '

            
            
            <td>'.$row["A_Name"].'</td>
            <td>'.$row["A_Location"].'</td>
            <td>'.$row["A_summary"].'</td>
            <td>'.$row["A_Details"].'</td>
            <td>'.$row["A_Duration"].'</td>
            <td>'.$row["A_Best_Time"].'</td>
            <td>'.$row["A_Map"].'</td>
            
            <td><img src="data:image/jpeg;base64,'.base64_encode($row['A_Image'] ).'" height="100" width="100"/></td>
            


            
            <td><button type="button" name="update" class="btn btn-success bt-xs pack_activity_update" id="'.$row["ID"].'"><i class="fa fa-edit"></i>Edit</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_activity_img" id="'.$row["ID"].'">Image</button>
            <button type="button" name="update" class="btn btn-secondary bt-xs pack_activity_icon" id="'.$row["ID"].'">Icons</button>
            <button type="button" name="delete" class="btn btn-danger bt-xs pack_activity_delete" id="'.$row["ID"].'"><i class="fa fa-been"></i>Delete</button></td>
            </tr>
        ';
        }

        $output .= '</tbody>
        </table>
        </div>';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    }
// ============================================== PACKAGE ACCOMMODATION FETCH==============================================
    if($_POST["action"] == "package_accommodation_update")
    {
        $id =$_POST["UserID"];
        $query = "SELECT * FROM p_accommodation WHERE P_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '
    
        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
            $query1 = "SELECT * FROM t_accommodation WHERE ID = '".$row['A_ID']."'";
        $result1 = mysqli_query($conn, $query1);
        $output = '
    
        ';
        if(mysqli_num_rows($result1) > 0)
            {
        
        while($row1 = mysqli_fetch_array($result1))
        {
        $output.= '
        <div class="form-group">
            <input type="text" name="Accommodation" id="Accommodation" value="'.$row1["A_Name"].'" class="form-control Accommodation" placeholder="Enter Package Accommodation" readonly>

            <button type="button" name="delete" class="btn btn-danger bt-xs pack_accommodation_remove" id="'.$row["ID"].'"><i class="fa fa-been"></i>Remove</button>
            
        ';
        }
        $output.= '
        </div>';
        echo $output;
        }else{
            echo "No Record Found";
        }
    }
    }
            
    }
// ============================================== PACKAGE ACTIVITY SELECT FETCH==============================================
    if($_POST["action"] == "package_activity_update")
    {
        $id =$_POST["UserID"];
        $query = "SELECT * FROM p_activity WHERE P_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '
    
        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
            $query1 = "SELECT * FROM t_activities WHERE ID = '".$row['Act_ID']."'";
        $result1 = mysqli_query($conn, $query1);
        $output = '
    
        ';
        if(mysqli_num_rows($result1) > 0)
            {
        
        while($row1 = mysqli_fetch_array($result1))
        {
        $output.= '
        <div class="form-group">
            <input type="text" name="Activity" id="Activity" value="'.$row1["A_Name"].'" class="form-control Activity" placeholder="Enter Package Activity" readonly>

            <button type="button" name="delete" class="btn btn-danger bt-xs pack_activity_remove" id="'.$row["ID"].'"><i class="fa fa-been"></i>Remove</button>
            
        ';
        }
        $output.= '
        </div>';
        echo $output;
        }else{
            echo "No Record Found";
        }
    }
    }
            
    }
// ============================================== PACKAGE HIGH-LIGHT FETCH==============================================
    if($_POST["action"] == "package_highlight_update")
    {
        $id =$_POST["UserID"];
        $query = "SELECT * FROM t_highlights WHERE T_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '
    
        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
        $output.= '
        <div class="form-group">
            <input type="text" name="Highlight" id="Highlight" value="'.$row["Highlights"].'" class="form-control Highlight" placeholder="Enter Package Highlights" readonly>

            <button type="submit" name="update" class="btn btn-success bt-xs pack_highlight_update" id="'.$row["ID"].'"><i class="fa fa-edit"></i>Edit</button>
            
            <button type="button" name="delete" class="btn btn-danger bt-xs pack_highlight_delete" id="'.$row["ID"].'"><i class="fa fa-been"></i>Delete</button>
            
        ';
        }
        $output.= '
        </div>';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    }
// ============================================== PACKAGE INCLUDES FETCH==============================================
    if($_POST["action"] == "package_include_update")
    {
        $id =$_POST["UserID"];
        $query = "SELECT * FROM t_includes WHERE T_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '

        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
        $output.= '
        <div class="form-group">
            <input type="text" name="Include" id="Include" value="'.$row["Includes"].'" class="form-control Highlight" placeholder="Enter Package Highlights" readonly>

            <button type="submit" name="update" class="btn btn-success bt-xs pack_include_update" id="'.$row["ID"].'"><i class="fa fa-edit"></i>Edit</button>
            
            <button type="button" name="delete" class="btn btn-danger bt-xs pack_include_delete" id="'.$row["ID"].'"><i class="fa fa-been"></i>Delete</button>
            
        ';
        }
        $output.= '
        </div>';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    }    
// ============================================== PACKAGE T&C FETCH==============================================
    if($_POST["action"] == "package_tc_update")
    {
        $id =$_POST["UserID"];
        $query = "SELECT * FROM t_conditions WHERE T_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '

        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
        $output.= '
        <div class="form-group">
            <input type="text" name="Terms" id="Terms" value="'.$row["Conditions"].'" class="form-control Highlight" placeholder="Enter Package Highlights" readonly>

            <button type="submit" name="update" class="btn btn-success bt-xs pack_tc_update" id="'.$row["ID"].'"><i class="fa fa-edit"></i>Edit</button>
            
            <button type="button" name="delete" class="btn btn-danger bt-xs pack_tc_delete" id="'.$row["ID"].'"><i class="fa fa-been"></i>Delete</button>
            
        ';
        }
        $output.= '
        </div>';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    }  
// ============================================== PACKAGE IMAGE FETCH==============================================
    if($_POST["action"] == "package_img_fetch")
    {
        $id =$_POST["UserID"];
        $query = "SELECT * FROM t_image WHERE T_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '
        
        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
        $output.= '
        <div style="width: 100px; height: 140px;  margin: 5px; padding: 0; float: left; ">

        <img src="data:image/jpeg;base64,'.base64_encode($row['T_Image'] ).'"  width="100px" height= "100px">

         <button type="button" class="btn btn-danger img-delete" name="Img_delete" id="'.$row["ID"].'">Delete</button>

         </div>
        ';
        }
        $output.= '
        ';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    } 

// ============================================== PAYMENT IMAGE FETCH==============================================
    if($_POST["action"] == "user_payment_view_fetch")
    {
        $id =$_POST["ID"];
        $query = "SELECT * FROM payment WHERE I_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '
        
        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
            $query1 = "SELECT * FROM invoice WHERE Invoice_Number = $id";
            $result1 = mysqli_query($conn, $query1);

            while($row1 = mysqli_fetch_array($result1))
            {
                $Status = $row1['Status'];

                $output.= '
                <div class="pt-1 row col-md-12">
                <h6 class="m-0 font-weight-bold text-primary col-md-4 pt-2">Payment Status</h6>
                ';

                
            if($Status == 'Proccessing'){
                $output2 = '
            <select  id="payment_status" name="payment_status" class="form-control">
                <option selected="0" value="0">Proccessing</option>
                <option value="1">Full Paid</option>
                <option value="2">Not Paid</option>
                <option value="3">Canceled</option>
                <option value="4">Payment Canceled</option>
                
            </select>

            ';
            }else if($Status == 'Full Paid'){
                $output2 = '
            <select  id="payment_status" name="payment_status" class="form-control">
                <option selected="1" value="1">Full Paid</option>
                <option value="0">Proccessing</option>
                <option value="2">Not Paid</option>
                <option value="3">Canceled</option>
                <option value="4">Payment Canceled</option>
            </select>

            ';
            }else if($Status == 'Not Paid'){
                $output2 = '
            <select  id="payment_status" name="payment_status" class="form-control">
                <option selected="2" value="2">Not Paid</option>
                <option value="0">Proccessing</option>
                <option value="1">Full Paid</option>
                <option value="3">Canceled</option>

            </select>

            ';
            }else if($Status == 'Canceled'){
                $output2 = '
            <select  id="payment_status" name="payment_status" class="form-control">
                <option selected="3" value="3">Canceled</option>
                <option value="0">Proccessing</option>
                <option value="2">Not Paid</option>

            </select>

            ';
            }else if($Status == 'Payment Canceled'){
                $output2 = '
            <select  id="payment_status" name="payment_status" class="form-control">
                <option selected="4" value="4">Payment Canceled</option>
                <option value="0">Proccessing</option>
                <option value="2">Not Paid</option>
                <option value="3">Canceled</option>

            </select>

            ';
            }
            
            }
            
            $output.= '<div class="col-sm-2 pt-1">
            '.$output2.'</div>
            <div class="col-sm-4 pt-1">
                <textarea name="paymentSlipTxt" id="paymentSlipTxt" cols="30" rows="1" class="form-control">'.$row['Status'].'</textarea>
            </div>
            <div class="col-sm-2 pt-1">
                <button id="payment_status_btn" class="payment_status_btn btn btn-success">submit</button>
            </div>
            </div>
            <div style="margin: 5px; padding: 0; display: flex; justify-content: center; align-items: center;" class="col-md-12">
                <div style="margin: 5px; padding: 0; " class="col-md-6">
                <img src="data:image/jpeg;base64,'.base64_encode($row['Payment_Slip']).'"  width="100%" height= "100%">
                </div>
            </div>';
        }
        $output.= '
        ';
        echo $output;
        }else{
            $output1 = '<h6 class="m-0 font-weight-bold text-danger pt-2">Pacenger Not Upload Payment Slip Yet </h6>';
            
            echo $output1;
        }
            
    } 

    if($_POST["action"] == "payment_status_change")
    {
        $ID =$_POST["ID"];
        $txt =$_POST["txt"];
        $IID =$_POST["IID"];

        if ($ID == 0){
            $txt1 = 'Proccessing';
        }else if ($ID == 1){
            $txt1 = 'Full Paid';
        }else if ($ID == 2){
            $txt1 = 'Not Paid';
        }else if ($ID == 3){
            $txt1 = 'Canceled';
        }else if ($ID == 4){
            $txt1 = 'Payment Canceled';
        }
            $query1 = "UPDATE payment SET Status='$txt' WHERE I_ID='$IID' ";

                if(mysqli_query($conn, $query1))
                {
                    $query2 = "UPDATE invoice SET Status='$txt1' WHERE Invoice_Number='$IID' ";

                    if(mysqli_query($conn, $query2))
                    {
                        if ($ID == 1){
                            $query3 = "SELECT * FROM invoice WHERE Invoice_Number = '$IID'";
                            $result3 = mysqli_query($conn, $query3);

                            while($row3 = mysqli_fetch_array($result3))
                            {
                                $T_ID = $row3['T_ID'];
                                $I_Date = $row3['I_Date'];
                                $T_Date = $row3['T_start_date'];
                                $Child = $row3['U_children'];
                                $Adult = $row3['U_adults'];
                                $T_Cost = $row3['T_Cost'];
                                $A_Adult_Cost = $row3['A_Adult_Cost'];
                                $A_Child_Cost = $row3['A_Child_Cost'];
                                $A_Cost = $A_Adult_Cost+$A_Child_Cost;

                                $Total = $T_Cost - $A_Cost;
                                $Pacengers = $Adult+$Child;

                                $query4 = "SELECT * FROM profit_loss WHERE Date = '$I_Date'";
                                $result4 = mysqli_query($conn, $query4);

                                while($row4 = mysqli_fetch_array($result4))
                                {
                                    $Date = $row4['Date'];
                                    $Profit_Loss = $row4['Profit_Loss'];
                                    $New_Profit_Loss = $Profit_Loss+$Total;

                                    $query5 = "UPDATE profit_loss SET Profit_Loss='$New_Profit_Loss' WHERE Date='$Date' ";
                                    
                                    if(mysqli_query($conn, $query5))
                                    {
                                        $query6 = "SELECT * FROM prediction WHERE P_Start_Date = '$T_Date' && P_ID ='$T_ID'";
                                        $result6 = mysqli_query($conn, $query6);

                                        while($row6 = mysqli_fetch_array($result6))
                                        {
                                            $CurrentP = $row6['No_of_pacenger'];
                                            $NewPacenge = $CurrentP+$Pacengers;

                                            $query7 = "UPDATE prediction SET No_of_pacenger='$NewPacenge' WHERE P_Start_Date='$T_Date' && P_ID ='$T_ID'";
                                            if(mysqli_query($conn, $query7))
                                            {
                                                echo 'done';
                                            }else{
                                                echo 'not_done';
                                            }
                                        }
                                        
                                        
                                    }else{
                                        echo 'not_done';
                                    }
                                }
                            }

                        }else
                        if ($ID == 4){
                            $query3 = "SELECT * FROM invoice WHERE Invoice_Number = '$IID'";
                            $result3 = mysqli_query($conn, $query3);

                            while($row3 = mysqli_fetch_array($result3))
                            {
                                $T_ID = $row3['T_ID'];
                                $I_Date = $row3['I_Date'];
                                $T_Date = $row3['T_start_date'];
                                $Child = $row3['U_children'];
                                $Adult = $row3['U_adults'];
                                $T_Cost = $row3['T_Cost'];
                                $A_Adult_Cost = $row3['A_Adult_Cost'];
                                $A_Child_Cost = $row3['A_Child_Cost'];
                                $A_Cost = $A_Adult_Cost+$A_Child_Cost;

                                $Total = $T_Cost - $A_Cost;
                                $Pacengers = $Adult+$Child;

                                $query4 = "SELECT * FROM profit_loss WHERE Date = '$I_Date'";
                                $result4 = mysqli_query($conn, $query4);

                                while($row4 = mysqli_fetch_array($result4))
                                {
                                    $Date = $row4['Date'];
                                    $Profit_Loss = $row4['Profit_Loss'];
                                    $New_Profit_Loss = $Profit_Loss-$Total;

                                    $query5 = "UPDATE profit_loss SET Profit_Loss='$New_Profit_Loss' WHERE Date='$Date' ";
                                    if(mysqli_query($conn, $query5))
                                    {
                                        $query6 = "SELECT * FROM prediction WHERE P_Start_Date = '$T_Date' && P_ID ='$T_ID'";
                                        $result6 = mysqli_query($conn, $query6);

                                        while($row6 = mysqli_fetch_array($result6))
                                        {
                                            $CurrentP = $row6['No_of_pacenger'];
                                            $NewPacenge = $CurrentP-$Pacengers;

                                            $query7 = "UPDATE prediction SET No_of_pacenger='$NewPacenge' WHERE P_Start_Date='$T_Date' && P_ID ='$T_ID'";
                                            if(mysqli_query($conn, $query7))
                                            {
                                                echo 'done';
                                            }else{
                                                echo 'not_done';
                                            }
                                        }
                                    }
                                }
                            }

                        }else{
                            echo 'done';
                        }
                        
                    }else{
                        echo 'not_done';
                    }
                
                }else{
                    echo 'not_done';
                }
        
    }
// ============================================== ACCOMMODATION IMAGE FETCH==============================================
    if($_POST["action"] == "package_accommo_img_fetch")
    {
        $id =$_POST["UserID"];
        $query = "SELECT * FROM t_image WHERE A_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '
        
        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
        $output.= '
        <div style="width: 100px; height: 140px;  margin: 5px; padding: 0; float: left; ">

        <img src="data:image/jpeg;base64,'.base64_encode($row['T_Image'] ).'"  width="100px" height= "100px">

        <button type="button" class="btn btn-danger accommo_img_delete" name="Img_delete" id="'.$row["ID"].'">Delete</button>

        </div>
        ';
        }
        $output.= '
        ';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    } 
// ============================================== ACTIVITY IMAGE FETCH==============================================
    if($_POST["action"] == "package_activity_img_fetch")
    {
        $id =$_POST["UserID"];
        $query = "SELECT * FROM t_image WHERE AC_ID = $id";
        $result = mysqli_query($conn, $query);
        $output = '
        
        ';
        if(mysqli_num_rows($result) > 0)
            {
        
        while($row = mysqli_fetch_array($result))
        {
        $output.= '
        <div style="width: 100px; height: 140px;  margin: 5px; padding: 0; float: left; ">

        <img src="data:image/jpeg;base64,'.base64_encode($row['T_Image'] ).'"  width="100px" height= "100px">

        <button type="button" class="btn btn-danger activity_img_delete" name="Img_delete" id="'.$row["ID"].'">Delete</button>

        </div>
        ';
        }
        $output.= '
        ';
        echo $output;
        }else{
            echo "No Record Found";
        }
            
    } 
// ==============================================CATEGORY INSERT ==============================================
        if($_POST["action"] == "cat_insert")
        {
         $file = addslashes(file_get_contents($_FILES["cat_image"]["tmp_name"]));
         $cat_name = $_POST["cat_Name"];
         $cat_details = $_POST["cat_details"];

         $date = date('Y-m-d');
         $alert = "New Category Insert Into Database - $cat_name";
         $status = "2";

         $query = "INSERT INTO catogory (C_Name,C_Image,C_Details) VALUES ('$cat_name','$file','$cat_details')";
         if(mysqli_query($conn, $query))
         {
          
          $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
         if(mysqli_query($conn, $query))
         {
            echo 'New Category Inserted into Database';
         }
         }
        }
// ============================================== Admin INSERT ==============================================
        if($_POST["action"] == "admin_insert")
        {
            $name = $_POST['add_Name'];
            $Email_Address = $_POST['add_Email'];
            $Phone_Number = $_POST['add_Number'];
            $pass1 = $_POST['add_Password'];
            $pass = md5($pass1);
            
            
            $sql = "SELECT * FROM admin WHERE A_Email='$Email_Address' ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo 'email';
                exit();

            }else {
                $sql2 = "INSERT INTO admin(A_Name, A_Password, A_Email, A_Number) VALUES('$name','$pass','$Email_Address', '$Phone_Number')";
                $result2 = mysqli_query($conn, $sql2);
                if ($result2) {
                echo'Created';
                exit();
                
                }else {
                echo 'Error';
                exit();

                }
             }
            
        }
// ============================================== GUIDER INSERT ==============================================
    if($_POST["action"] == "guider_insert")
    {
        $name = $_POST['G_add_Name'];
        $Email_Address = $_POST['G_add_Email'];
        $Phone_Number = $_POST['G_add_Number'];
        $pass1 = $_POST['G_add_Password'];
        $pass = md5($pass1);
        
        
        $sql = "SELECT * FROM `guider` WHERE G_Email='$Email_Address' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo 'email';
            exit();

        }else {
            $sql2 = "INSERT INTO `guider`(G_Name, G_Password, G_Email, G_Contact_No) VALUES('$name','$pass','$Email_Address', '$Phone_Number')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
            echo'Created';
            exit();
            
            }else {
            echo 'Error';
            exit();

            }
        }
        
    }
// ============================================== PACKAGE OVERVIEW INSERT ==============================================
    if($_POST["action"] == "pack_overview_insert")
    {
    $file = addslashes(file_get_contents($_FILES["pak_image"]["tmp_name"]));
    $category_ID= $_POST["scategory"];
    $package_adult_cost = $_POST["pak_Adult_Cost"];
    $package_adult_selling = $_POST["pak_Adult_Selling"];

    $package_child_cost = $_POST["pak_Child_Cost"];
    $package_child_selling = $_POST["pak_Child_Selling"];

    $package_name = $_POST["pak_Name"];
    $package_details = $_POST["pak_details"];
    $package_location = $_POST["pak_Loacation"];
    $paxkage_map = $_POST["pak_Map"];;
    $package_start_date = $_POST["pak_date"];
    $package_end_date = $_POST["pak_end_date"];
    $package_booking = $_POST["pak_booking"];
    $package_status = 2;

    $date = date('Y-m-d');
    $alert = "New Package Overview Insert Into Database - $package_name";
    $status = "2";
    

    $query = "INSERT INTO package (C_ID, T_Name, T_Image, T_Details, T_Adult_Cost, T_Child_Cost, T_Adult_S_Price, T_Child_S_Price, T_Locations, T_Map, T_Start_Date, T_End_Date, Available_Seat, Status)
     VALUES ('$category_ID','$package_name','$file','$package_details','$package_adult_cost','$package_child_cost','$package_adult_selling','$package_child_selling','$package_location', '$paxkage_map', '$package_start_date','$package_end_date','$package_booking','$package_status')";


    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Package Overview Insert into Database';

            $query = "INSERT INTO no_of_travelers (Package_Name,No_of_Travelers) VALUES ('$package_name','0')";
            if(mysqli_query($conn, $query)){}
        }
    
    }else
    {
        echo 'Package Not Insert, Contact Developer';
    }
    }
// ============================================== PACKAGE ITINERARY INSERT ==============================================
    if($_POST["action"] == "Insert_Package_Itinerary_Form")
    {

    $file = addslashes(file_get_contents($_FILES["insert_iti_image"]["tmp_name"]));
    $Itinerary_ID= $_POST["insert_iti_pac_id"];
    $Itinerary_date = $_POST["insert_iti_Date"];
    $Itinerary_loc = $_POST["insert_iti_Loc"];
    $Itinerary_details = $_POST["insert_iti_details"];
    $Itinerary_acc = $_POST["insert_iti_acc"];
    $Itinerary_act = $_POST["insert_iti_act"];

    $date = date('Y-m-d');
    $alert = "New Itinerary Insert into Database";
    $status = "2";

    $query = "INSERT INTO t_itinerary (T_ID, I_Date, I_Locations, I_Details, I_Accommodations, I_Activities, I_Image)
    VALUES ('$Itinerary_ID','$Itinerary_date','$Itinerary_loc','$Itinerary_details','$Itinerary_acc','$Itinerary_act','$file')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Itinerary Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    }    
// ============================================== PACKAGE ACCOMMODATION INSERT ==============================================
    if($_POST["action"] == "Insert_Package_Accomodation_Form")
    {

    $file = addslashes(file_get_contents($_FILES["Insert_Accomodation_Image"]["tmp_name"]));
    
    $Accom_name = $_POST["Insert_Accomodation_Name"];
    $Accom_loc = $_POST["Insert_Accomodation_location"];
    $Accom_details = $_POST["Insert_Accomodation_Details"];
    $Accom_link = $_POST["Insert_Accomodation_Link"];
    $Accom_summary = $_POST["Insert_Accomodation_Summary"];
    $Accom_style = $_POST["Insert_Accomodation_Style"];
    $Accom_room = $_POST["Insert_Accomodation_Room"];
    $Accom_feature = $_POST["Insert_Accomodation_Feature"];

    $date = date('Y-m-d');
    $alert = "New Accomodation Insert into Database - $Accom_name";
    $status = "2";

    $query = "INSERT INTO t_accommodation (A_Name, A_summary, A_Location, A_Details, A_Link, A_Image, Style, No_of_rooms, Key_features)
    VALUES ('$Accom_name','$Accom_summary','$Accom_loc','$Accom_details','$Accom_link','$file','$Accom_style','$Accom_room','$Accom_feature')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Accomodation Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE ACCOMMODATION SELECT & INSERT ==============================================
    if($_POST["action"] == "insert_new_accommodation")
    {


    $package_id = $_POST["package_accommodation_id"];
    $Accom_id = $_POST["accommodation_id"];



    $query = "INSERT INTO p_accommodation (P_ID, A_ID)
    VALUES ('$package_id','$Accom_id')"; 

    if(mysqli_query($conn, $query))
    {
    echo 'New Accomodation Select';

    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE ACTIVITY SELECT & INSERT ==============================================
    if($_POST["action"] == "insert_new_activity")
    {


    $package_id = $_POST["activity_id"];
    $Accom_id = $_POST["package_activity_id"];



    $query = "INSERT INTO p_activity (P_ID, Act_ID)
    VALUES ('$package_id','$Accom_id')"; 

    if(mysqli_query($conn, $query))
    {
    echo 'New Activity Select';

    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE ACTIVITY INSERT ==============================================
    if($_POST["action"] == "Insert_Package_Activity_Form")
    {

    $file = addslashes(file_get_contents($_FILES["Insert_Activity_Image"]["tmp_name"]));
    
    $Accom_name = $_POST["Insert_Activity_Name"];
    $Accom_loc = $_POST["Insert_Activity_location"];
    $Accom_details = $_POST["Insert_Activity_Details"];
    $Accom_sum = $_POST["Insert_Activity_Summary"];
    $Accom_dur = $_POST["Insert_Activity_duration"];
    $Accom_time = $_POST["Insert_Activity_best_time"];
    $Accom_link = $_POST["Insert_Activity_location_link"];

    $date = date('Y-m-d');
    $alert = "New Activity Insert into Database - $Accom_name";
    $status = "2";

    $query = "INSERT INTO t_activities ( A_Name, A_summary, A_Location, A_Details, A_Image, A_Map, A_Duration, A_Best_Time)
    VALUES ('$Accom_name','$Accom_sum','$Accom_loc','$Accom_details','$file','$Accom_link','$Accom_dur','$Accom_time')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Activity Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE High-light INSERT ==============================================
    if($_POST["action"] == "insert_new_highlight")
    {

    $ID = $_POST["package_id"];
    $Highlight = $_POST["N_Highlight"];

    $date = date('Y-m-d');
    $alert = "New High-light Insert into Database - $Highlight";
    $status = "2";

    $query = "INSERT INTO t_highlights (T_ID, Highlights)
    VALUES ('$ID','$Highlight')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New High-light Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE Include INSERT ==============================================
    if($_POST["action"] == "insert_new_include")
    {

    $ID = $_POST["package_i_id"];
    $Highlight = $_POST["N_Include"];

    $date = date('Y-m-d');
    $alert = "New Package Include Insert into Database - $Highlight";
    $status = "2";

    $query = "INSERT INTO t_includes (T_ID, Includes)
    VALUES ('$ID','$Highlight')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Package Include Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE T&C INSERT ==============================================
    if($_POST["action"] == "insert_new_tc")
    {

    $ID = $_POST["package_tc_id"];
    $Highlight = $_POST["N_Tc"];

    $date = date('Y-m-d');
    $alert = "New Package T&C Insert into Database - $Highlight";
    $status = "2";

    $query = "INSERT INTO t_conditions (T_ID, Conditions)
    VALUES ('$ID','$Highlight')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Package T&C Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE IMAGE INSERT ==============================================
    if($_POST["action"] == "insert_new_img")
    {
    $file = addslashes(file_get_contents($_FILES["img_image"]["tmp_name"]));
    $ID = $_POST["package_img_id"];
    
    $date = date('Y-m-d');
    $alert = "New Package Image Insert into Database ";
    $status = "2";

    $query = "INSERT INTO t_image (T_ID, T_Image)
    VALUES ('$ID','$file')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Package Image Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE ACCOMMODATION IMAGE INSERT ==============================================
    if($_POST["action"] == "insert_new_accommo_img")
    {
    $file = addslashes(file_get_contents($_FILES["acco_img_image"]["tmp_name"]));
    $ID = $_POST["package_Accommo_img_id"];

    $date = date('Y-m-d');
    $alert = "New Accommodation Image Insert into Database ";
    $status = "2";

    $query = "INSERT INTO t_image (A_ID, T_Image)
    VALUES ('$ID','$file')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Accommodation Image Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== PACKAGE ACTIVITY IMAGE INSERT ==============================================
    if($_POST["action"] == "insert_new_activity_img")
    {
    $file = addslashes(file_get_contents($_FILES["activity_img_image"]["tmp_name"]));
    $ID = $_POST["package_activity_img_id"];

    $date = date('Y-m-d');
    $alert = "New Activity Image Insert into Database ";
    $status = "2";

    $query = "INSERT INTO t_image (AC_ID, T_Image)
    VALUES ('$ID','$file')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'New Activity Image Insert into Database';
        }


    }else{
        echo 'Please Contact Developer';
    }
    } 
// ============================================== ADMIN DELETE ==============================================
    if($_POST["action"] == "admin_delete")
        {
            $aid = $_POST['UserID'];
            $pass1 = $_POST['password'];
            $pass = md5($pass1);

            $date = date('Y-m-d');
            $alert = "Admin Account Deleted";
            $status = "2";
        
          
                $sql = "SELECT * FROM admin WHERE A_ID='$aid' AND A_Password='$pass'";
        
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);

                    if($row['A_Status'] == 2){
                        echo 'cant';
                        exit();
                    }else
                    if($row['A_Status'] < 2)
                    {
                        if ($row['A_Password'] === $pass) {
                
                        $admin = $row['A_Name'];
                
                        $query = "DELETE FROM admin WHERE A_ID='$aid' ";
                        $query_run = mysqli_query($conn, $query);
                
                        if($query_run){

                            $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$admin $alert','$status')";
                            if(mysqli_query($conn, $query))
                            {
                                echo 'Deleted';
                            }
                        
                        }
                        else
                        {
                        echo 'NotDelete';
                        }
                        }
                        exit();
                    }
                }
                else
                {
                    echo "Password";
                    exit();
                }
            }
// 
        if($_POST["action"] == "get_admin_delete")
        {
            
            $AID = $_POST['UserID'];
            $query = "SELECT * FROM admin WHERE A_ID ='$AID'";
            $result = mysqli_query($conn,$query);

            while($row=mysqli_fetch_array($result))
            {
                
                $User_data[0]=$row['A_ID'];
                $User_data[1]=$row['A_Name'];


            }
            echo json_encode($User_data);
        }
// ============================================== GUIDER DELETE ==============================================
    if($_POST["action"] == "guider_delete")
    {
        $aid = $_POST['UserID'];
        $pass1 = $_POST['password'];
        $pass = md5($pass1);

        $date = date('Y-m-d');
        $alert = "Guider Account Deleted";
        $status = "2";

    
            $sql = "SELECT * FROM guider WHERE ID='$aid' AND G_Password='$pass'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                
            
                    $admin = $row['G_Name'];
            
                    $query = "DELETE FROM guider WHERE ID='$aid' ";
                    $query_run = mysqli_query($conn, $query);
            
                    if($query_run){

                        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$admin $alert','$status')";
                        if(mysqli_query($conn, $query))
                        {
                            echo 'Deleted';
                        }
                    
                    }
                    else
                    {
                    echo 'NotDelete';
                    }
                
            }
            else
            {
                echo "Password";
                exit();
            }
        }
    // 
    if($_POST["action"] == "get_guider_delete")
    {
        
        $AID = $_POST['UserID'];
        $query = "SELECT * FROM guider WHERE ID ='$AID'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            
            $User_data[0]=$row['ID'];
            $User_data[1]=$row['G_Name'];


        }
        echo json_encode($User_data);
    }
// ==============================================CATEGORY DELETE ==============================================
        if($_POST["action"] == "delete")
        
        {
        $status = $Aststus;

        $date = date('Y-m-d');
        $alert = "Category Deleted";
        $status1 = "2";

        if($status == 2){
         $query = "DELETE FROM catogory WHERE C_ID = '".$_POST["CategoryID"]."'";
         if(mysqli_query($conn, $query))
         {
            $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
            if(mysqli_query($conn, $query))
            {
                echo 'Delete';
            }
          
         }
        }else{
            echo 'notDelete';
        }
        }
// ============================================== UNALOCATE GUIDER ==============================================
        if($_POST["action"] == "get_guider_unalocate")
                
        {
       

        $date = date('Y-m-d');
        $alert = "Guider Unalocated";
        $status1 = "2";

        
        $query = "DELETE FROM guider_alocate WHERE ID = '".$_POST["UserID"]."'";
        if(mysqli_query($conn, $query))
        {
            $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
            if(mysqli_query($conn, $query))
            {
                echo 'Delete';
            }
        
        }
        
        }
// ============================================== PACKAGE OVERVIEW DELETE ==============================================
    if($_POST["action"] == "pack_overview_delete")
    {
        $date = date('Y-m-d');
        $alert = "Package Overview Deleted";
        $status = "2";

    $query = "DELETE FROM package WHERE Travel_ID = '".$_POST["TravelID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Overview Deleted from Database';
        }
    
    }
    }
// ============================================== PACKAGE ITINERARY DELETE ==============================================
    if($_POST["action"] == "pack_itinerary_delete")
    {
        $date = date('Y-m-d');
        $alert = "Package Itinerary Deleted";
        $status = "2";

    $query = "DELETE FROM t_itinerary WHERE ID = '".$_POST["TravelID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Itinerary Deleted from Database';
        }
    
    }
    }
// ============================================== PACKAGE ACCOMMODATION DELETE ==============================================
    if($_POST["action"] == "pack_accommodation_delete")
    {
        $date = date('Y-m-d');
        $alert = "Package Itinerary Deleted";
        $status = "2";

    $query = "DELETE FROM t_accommodation WHERE ID = '".$_POST["TravelID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Accommodation Deleted from Database';
        }
    
    }
    }
// ============================================== PACKAGE ACCOMMODATION REMOVE ==============================================
    if($_POST["action"] == "pack_accommodation_remove")
    {
        $date = date('Y-m-d');
        $alert = "Package Accommodation Remove";
        $status = "2";

    $query = "DELETE FROM p_accommodation WHERE ID = '".$_POST["TravelID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Accommodation Remove ';
        }
   
    }
    }

    // remove all
    if($_POST["action"] == "pack_all_accommodation_remove")
    {
        $date = date('Y-m-d');
        $alert = "Package All Accommodation Remove";
        $status = "2";

    $query = "DELETE FROM p_accommodation WHERE P_ID = '".$_POST["package_accommodation_d_id"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package All Accommodation Remove';
        }
    
    }
    }
// ============================================== PACKAGE ACTIVITTY REMOVE ==============================================
    if($_POST["action"] == "pack_activity_remove")
    {
        $date = date('Y-m-d');
        $alert = "Package Activity Remove";
        $status = "2";

    $query = "DELETE FROM p_activity WHERE ID = '".$_POST["TravelID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Activity Remove';
        }
    
    }
    }

    // remove all
    if($_POST["action"] == "pack_all_activity_remove")
    {
        $date = date('Y-m-d');
        $alert = "Package All Activity Removee";
        $status = "2";
        
    $query = "DELETE FROM p_activity WHERE P_ID = '".$_POST["package_activity_d_id"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package All Activity Remove';
        }
    
    }
    }
// ============================================== PACKAGE ACTIVITTY DELETE ==============================================
    if($_POST["action"] == "pack_activity_delete")
    {
        $date = date('Y-m-d');
        $alert = "Package Activity Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_activities WHERE ID = '".$_POST["TravelID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Activity Deleted from Database';
        }


    }
    }
// ============================================== PACKAGE HIGHLIGHT DELETE ==============================================
    if($_POST["action"] == "highlight_delete")
    {
        $date = date('Y-m-d');
        $alert = "Package Highlight Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_highlights WHERE ID = '".$_POST["UserID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Highlight Deleted from Database';
        }

    }
    }

    // delete all
    if($_POST["action"] == "delete_all_highlight")
    {
        $date = date('Y-m-d');
        $alert = "Package Highlights Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_highlights WHERE T_ID = '".$_POST["package_d_id"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Highlights Deleted from Database';
        }

    }
    }
// ============================================== PACKAGE INCLUDE DELETE ==============================================
    if($_POST["action"] == "include_delete")
    {
        $date = date('Y-m-d');
        $alert = "Package Include Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_includes WHERE ID = '".$_POST["UserID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Include Deleted from Database';
        }

    }
    }

    // delete all
    if($_POST["action"] == "delete_all_include")
    {
        $date = date('Y-m-d');
        $alert = "Package Includes Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_includes WHERE T_ID = '".$_POST["package_i_d_id"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Includes Deleted from Database';
        }

    }
    }
// ============================================== PACKAGE T&C DELETE ==============================================
    if($_POST["action"] == "tc_delete")
    {
        $date = date('Y-m-d');
        $alert = "Package T&C Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_conditions WHERE ID = '".$_POST["UserID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package T&C Deleted from Database';
        }
   
    }
    }

    // delete all
    if($_POST["action"] == "delete_all_tc")
    {
        $date = date('Y-m-d');
        $alert = "Package T&C Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_conditions WHERE T_ID = '".$_POST["package_tc_d_id"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package T&C Deleted from Database';
        }

    }
    }
// ============================================== PACKAGE Img DELETE ==============================================
    if($_POST["action"] == "img_delete")
    {
        $date = date('Y-m-d');
        $alert = "Package Image Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_image WHERE ID = '".$_POST["UserID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Image Deleted from Database';
        }
    
    }
    }

    // delete all
    if($_POST["action"] == "delete_all_img")
    {
        $date = date('Y-m-d');
        $alert = "Package Image Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_image WHERE T_ID = '".$_POST["package_img_d_id"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Image Deleted from Database';
        }

    }
    }
// ============================================== PACKAGE ACCOMMODATION Img DELETE ==============================================
    if($_POST["action"] == "accommo_img_delete")
    {
        $date = date('Y-m-d');
        $alert = "Accommodation Image Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_image WHERE ID = '".$_POST["UserID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Accommodation Image Deleted from Database';
        }
   
    }
    }

    // delete all
    if($_POST["action"] == "delete_all_accommo_img")
    {
        $date = date('Y-m-d');
        $alert = "Accommodation Images Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_image WHERE A_ID = '".$_POST["package_Accommo_img_d_id"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Accommodation Images Deleted from Database';
        }

    }
    }
// ============================================== PACKAGE ACTIVITY Img DELETE ==============================================
    if($_POST["action"] == "activity_img_delete")
    {
        $date = date('Y-m-d');
        $alert = "Activity Image Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_image WHERE ID = '".$_POST["UserID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Activity Image Deleted from Database';
        }

    }
    }

    // delete all
    if($_POST["action"] == "delete_all_activity_img")
    {
        $date = date('Y-m-d');
        $alert = "Activity Images Deleted from Database";
        $status = "2";

    $query = "DELETE FROM t_image WHERE AC_ID = '".$_POST["package_activity_img_d_id"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Activity Images Deleted from Database';
        }

    }
    }
// ============================================== ADMIN EDIT ==============================================
        if($_POST["action"] == "admin_update")
        {
            $aid = $_POST['edit_ID'];
            $name = $_POST['edit_Name'];
            $Email_Address = $_POST['edit_Email'];
            $Phone_Number = $_POST['edit_Number'];
            $pass1 = $_POST['edit_Password'];
            $pass = md5($pass1);

            $date = date('Y-m-d');
            $alert = "Admin Account Updated";
            $status = "2";        
          
                $sql = "SELECT * FROM admin WHERE A_ID='$aid' AND A_Password='$pass'";
        
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['A_Password'] === $pass) {
         
                        $a_name = $row['A_Name'];
          
                $query = "UPDATE admin SET A_Name='$name',A_Password='$pass',A_Email='$Email_Address',A_Number='$Phone_Number' WHERE A_ID='$aid' ";
                $query_run = mysqli_query($conn, $query);
        
                if($query_run){

                    $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$a_name $alert','$status')";
                    if(mysqli_query($conn, $query))
                    {
                        echo 'Updated';
                    }
                
                }
                else
                {
                echo 'NotUpdated';
                }
            }
            exit();
            }
            else
            {
                echo 'Password';
                exit();
            }
        }
// 
        if($_POST["action"] == "get_admin_update")
        {
            
            $AID = $_POST['UserID'];
            $query = "SELECT * FROM admin WHERE A_ID ='$AID'";
            $result = mysqli_query($conn,$query);

            while($row=mysqli_fetch_array($result))
            {
                
                $User_data[0]=$row['A_ID'];
                $User_data[1]=$row['A_Name'];
                $User_data[2]=$row['A_Email'];
                $User_data[3]=$row['A_Number'];


            }
            echo json_encode($User_data);
        }
// ============================================== GUIDER EDIT ==============================================            
        if($_POST["action"] == "guider_update")
        {
            $aid = $_POST['G_edit_ID'];
            $name = $_POST['G_edit_Name'];
            $Email_Address = $_POST['G_edit_Email'];
            $Phone_Number = $_POST['G_edit_Number'];
            $pass1 = $_POST['G_edit_Password'];
            $pass = md5($pass1);

            $date = date('Y-m-d');
            $alert = "Guider Account Updated";
            $status = "2";        
          
                $sql = "SELECT * FROM `guider` WHERE ID='$aid' AND G_Password='$pass'";
        
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['G_Password'] === $pass) {
         
                        $a_name = $row['G_Name'];
          
                $query = "UPDATE `guider` SET G_Name='$name',G_Password='$pass',G_Email='$Email_Address',G_Contact_No='$Phone_Number' WHERE ID='$aid' ";
                $query_run = mysqli_query($conn, $query);
        
                if($query_run){

                    $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$a_name $alert','$status')";
                    if(mysqli_query($conn, $query))
                    {
                        echo 'Updated';
                    }
                
                }
                else
                {
                echo 'NotUpdated';
                }
            }
            exit();
            }
            else
            {
                echo 'Password';
                exit();
            }
        }

        // 
        if($_POST["action"] == "get_guider_update")
        {
            
            $GID = $_POST['UserID'];
            $query = "SELECT * FROM guider WHERE ID ='$GID'";
            $result = mysqli_query($conn,$query);

            while($row=mysqli_fetch_array($result))
            {
                
                $User_data[0]=$row['ID'];
                $User_data[1]=$row['G_Name'];
                $User_data[2]=$row['G_Contact_No'];
                $User_data[3]=$row['G_Email'];


            }
            echo json_encode($User_data);
        }

// ============================================== GUIDER LIST VIEW ==========================================
        if($_POST["action"] == "get_guider_list_view")
        {
            
            $GID = $_POST['UserID'];
            $query = "SELECT * FROM guider_alocate WHERE G_ID ='$GID'";
            $result = mysqli_query($conn,$query);
            $output = '';
            while($row=mysqli_fetch_array($result))
            {
                
                $P_ID = $row['P_ID'];
                $ID = $row['ID'];
                
                $query1 = "SELECT * FROM package WHERE Travel_ID ='$P_ID'";
                $result1 = mysqli_query($conn,$query1);
                if(mysqli_num_rows($result1) > 0)
                {
                    while($row1=mysqli_fetch_array($result1))
                    {
                        $P_Name = $row1['T_Name'];
                        
                        $output .= '
                        <div class="form-group row">
                        <div class="col-md-9">
                            <input type="text" name="" id="CG_ID" value="'.$P_Name.'" class="form-control" >
                        </div>
                        <button class="btn btn-danger G_Unalocate" name="G_Unalocate" value="Unalocate" id="'.$ID.'">Unalocate</button>
                        </div>
                    ';
                    }
                }else{
                    $output .= 'Package Not Found';
                }
                

            }
            $output .= '';
            echo $output;
        }
// ============================================== CATEGORY EDIT ==============================================
        if($_POST["action"] == "cat_edit")
        {
        $cat_name = $_POST["e_cat_Name"];
        $cat_details = $_POST["e_cat_details"];
         $file = addslashes(file_get_contents($_FILES["e_cat_image"]["tmp_name"]));

         $date = date('Y-m-d');
         $alert = "Category Updated into Database";
         $status = "2"; 

         $query = "UPDATE catogory SET C_Name='$cat_name',C_Image='$file',C_Details='$cat_details' WHERE C_ID= '".$_POST["e_cid"]."'";
         
         if(mysqli_query($conn, $query))
         {
            $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
            if(mysqli_query($conn, $query))
            {
                echo 'update';
            }
          
          
         }else
         {
            echo 'not_update';
         }
        }

        if($_POST["action"] == "get_cat_update")
        {
            
            $CID = $_POST['UserID'];
            $query = "SELECT * FROM catogory WHERE C_ID ='$CID'";
            $result = mysqli_query($conn,$query);

            while($row=mysqli_fetch_array($result))
            {
                
                $User_data[0]=$row['C_ID'];
                $User_data[1]=$row['C_Name'];
                $User_data[2]=$row['C_Details'];


            }
            echo json_encode($User_data);
        }
// ============================================== PACKAGE OVERVIEW EDIT ==============================================
    if($_POST["action"] == "Update_Package_Overview")
    {

    $file = addslashes(file_get_contents($_FILES["epak_image"]["tmp_name"]));
    $category_ID= $_POST["ecategory"];
    $package_adult_cost = $_POST["epak_adult_Cost"];
    $package_adult_sell = $_POST["epak_Adult_Selling"];

    $package_child_cost = $_POST["epak_child_Cost"];
    $package_child_sell = $_POST["epak_Child_Selling"];

    $package_name = $_POST["epak_Name"];
    $package_details = $_POST["epak_details"];
    $package_location = $_POST["epak_loc"];
    $paxkage_map = $_POST["epak_map"];
    $package_venue = $_POST["epak_date"];
    $end_date = $_POST["epak_end_date"];
    $booking = $_POST["epak_booking"];
    $package_proccess = 2;

    $id = $_POST["editp_ID"];

    $date = date('Y-m-d');
    $alert = "Package Overview Updated into Database";
    $status = "2"; 

    $query = "UPDATE package SET C_ID='$category_ID', T_Name='$package_name', T_Image='$file', T_Details='$package_details', T_Adult_Cost='$package_adult_cost', T_Child_Cost='$package_child_cost', T_Adult_S_Price='$package_adult_sell', T_Child_S_Price='$package_child_sell', T_Locations='$package_location', T_Map='$paxkage_map', T_Start_Date='$package_venue', T_End_Date='$end_date', Available_Seat='$booking'  
    WHERE Travel_ID= '".$_POST["editp_ID"]."'"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Overview Updated into Database';

            $query = "UPDATE no_of_travelers SET Package_Name='$package_name' WHERE T_ID = '".$_POST["editp_ID"]."'";
            if(mysqli_query($conn, $query)){}
        }
    

    $query2 = "UPDATE package SET Status='$package_proccess' WHERE Travel_ID = '".$_POST["editp_ID"]."'"; // update package status
    mysqli_query($conn ,$query2);

    }else{
        echo 'Please Contact Developer';
    }
    }

    if($_POST["action"] == "package_over_update")
    {
        
        $TID = $_POST['UserID'];
        $query = "SELECT * FROM package WHERE Travel_ID ='$TID'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            

            $User_data[0]=$row['T_Name'];
            $User_data[1]=$row['T_Adult_Cost'];
            $User_data[2]=$row['T_Adult_S_Price'];
            $User_data[3]=$row['T_Child_Cost'];
            $User_data[4]=$row['T_Child_S_Price'];
            $User_data[5]=$row['T_Details'];
            $User_data[6]=$row['T_Locations'];
            $User_data[7]=$row['T_Map'];
            $User_data[8]=$row['T_Start_Date'];
            $User_data[9]=$row['T_End_Date'];
            $User_data[10]=$row['Available_Seat'];
            $User_data[11]=$row['Travel_ID'];



        }
        echo json_encode($User_data);
    }
// ============================================== PACKAGE ITINERARY EDIT ==============================================
        if($_POST["action"] == "Update_Package_Itinerary_Form")
        {

        $file = addslashes(file_get_contents($_FILES["iti_image"]["tmp_name"]));
        $Itinerary_ID= $_POST["iti_pac_id"];
        $Itinerary_date = $_POST["iti_Date"];
        $Itinerary_loc = $_POST["iti_Loc"];
        $Itinerary_details = $_POST["iti_details"];
        $Itinerary_acc = $_POST["iti_acc"];
        $Itinerary_act = $_POST["iti_act"];

        $date = date('Y-m-d');
        $alert = "Package Itinerary Updated into Database";
        $status = "2"; 

        $query = "UPDATE t_itinerary SET T_ID='$Itinerary_ID', I_Date='$Itinerary_date', I_Locations='$Itinerary_loc', I_Details='$Itinerary_details', I_Accommodations='$Itinerary_acc', I_Activities='$Itinerary_act', I_Image='$file'
        WHERE ID= '".$_POST["iti_ID"]."'"; 

        if(mysqli_query($conn, $query))
        {
            $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
            if(mysqli_query($conn, $query))
            {
                echo 'Package Itinerary Updated into Database';
            }
        

        }else{
            echo 'Please Contact Developer';
        }
        }

        if($_POST["action"] == "Update_Package_Itinerary")
        {
            
            $ID = $_POST['UserID'];
            $query = "SELECT * FROM t_itinerary WHERE ID ='$ID'";
            $result = mysqli_query($conn,$query);

            while($row=mysqli_fetch_array($result))
            {
                

                $User_data[0]=$row['ID'];
                $User_data[1]=$row['T_ID'];
                $User_data[2]=$row['I_Date'];
                $User_data[3]=$row['I_Locations'];
                $User_data[4]=$row['I_Details'];
                $User_data[5]=$row['I_Accommodations'];
                $User_data[6]=$row['I_Activities'];


            }
            echo json_encode($User_data);
    }
// ============================================== PACKAGE ACCOMMODATION EDIT ==============================================
    if($_POST["action"] == "Package_Accommodation_Update_Form")
    {

    $file = addslashes(file_get_contents($_FILES["acco_image"]["tmp_name"]));
    
    $Accomodation_Name = $_POST["acco_Name"];
    $Accomodation_loc = $_POST["acco_Loc"];
    $Accomodation_details = $_POST["acco_details"];
    $Accomodation_link = $_POST["acco_link"];
    $Accomodation_sum = $_POST["acco_summary"];
    $Accomodation_style = $_POST["acco_style"];
    $Accomodation_room = $_POST["acco_room"];
    $Accomodation_key = $_POST["acco_key"];

    $date = date('Y-m-d');
    $alert = "Package Accommodation Updated into Database";
    $status = "2"; 

    $query = "UPDATE t_accommodation SET A_Name='$Accomodation_Name', A_summary='$Accomodation_sum', A_Location='$Accomodation_loc', A_Details='$Accomodation_details', A_Link='$Accomodation_link', A_Image='$file', Style='$Accomodation_style', No_of_rooms='$Accomodation_room', Key_features='$Accomodation_key'
    WHERE ID= '".$_POST["acco_ID"]."'"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Accommodation Updated into Database';
        }
    

    }else{
        echo 'Please Contact Developer';
    }
    }

    if($_POST["action"] == "Update_Package_Accommodation")
    {
        
        $ID = $_POST['UserID'];
        $query = "SELECT * FROM t_accommodation WHERE ID ='$ID'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            

            $User_data[0]=$row['ID'];
            $User_data[1]=$row['A_Name'];
            $User_data[2]=$row['A_summary'];
            $User_data[3]=$row['A_Location'];
            $User_data[4]=$row['A_Details'];
            $User_data[5]=$row['A_Link'];
            $User_data[6]=$row['Style'];
            $User_data[7]=$row['No_of_rooms'];
            $User_data[8]=$row['Key_features'];



        }
        echo json_encode($User_data);
    }
// ============================================== PACKAGE ACTIVITY EDIT ==============================================
    if($_POST["action"] == "Package_Activity_Update_Form")
    {

    $file = addslashes(file_get_contents($_FILES["act_image"]["tmp_name"]));
    
    $Activity_Name = $_POST["act_Name"];
    $Activity_loc = $_POST["act_Loc"];
    $Activity_details = $_POST["act_details"];
    $Activity_summary = $_POST["act_summary"];
    $Activity_duration = $_POST["act_duration"];
    $Activity_time = $_POST["act_time"];
    $Activity_link = $_POST["act_link"];

    $date = date('Y-m-d');
    $alert = "Package Activity Updated into Database";
    $status = "2"; 

    $query = "UPDATE t_activities SET A_Name='$Activity_Name', A_summary='$Activity_summary', A_Location='$Activity_loc', A_Details='$Activity_details', A_Image='$file', A_Map='$Activity_link', A_Duration='$Activity_duration', A_Best_Time='$Activity_time'
    WHERE ID= '".$_POST["act_ID"]."'"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Activity Updated into Database';
        }
    

    }else{
        echo 'Please Contact Developer';
    }
    }

    if($_POST["action"] == "Update_Package_Activity")
    {
        
        $ID = $_POST['UserID'];
        $query = "SELECT * FROM t_activities WHERE ID ='$ID'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            

            $User_data[0]=$row['ID'];
            $User_data[1]=$row['A_Name'];
            $User_data[2]=$row['A_summary'];
            $User_data[3]=$row['A_Location'];
            $User_data[4]=$row['A_Details'];
            $User_data[5]=$row['A_Map'];
            $User_data[6]=$row['A_Duration'];
            $User_data[7]=$row['A_Best_Time'];



        }
        echo json_encode($User_data);
    }
// ============================================== PACKAGE HIGHLIGHT EDIT ==============================================
    if($_POST["action"] == "highlight_update")
    {

    $ID= $_POST["text1"];
    $Highlights = $_POST["text2"];

    $date = date('Y-m-d');
    $alert = "Package High-light Updated into Database";
    $status = "2"; 

    $query = "UPDATE t_highlights SET Highlights='$Highlights'
    WHERE ID= '$ID'"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package High-light Updated into Database';
        }
    

    }else{
        echo 'Please Contact Developer';
    }
    }
// ============================================== PACKAGE INCLUDE EDIT ==============================================
    if($_POST["action"] == "include_update")
    {

    $ID= $_POST["text3"];
    $Includes = $_POST["text4"];

    $date = date('Y-m-d');
    $alert = "Package Include Updated into Database";
    $status = "2"; 

    $query = "UPDATE t_includes SET Includes='$Includes'
    WHERE ID= '$ID'"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Include Updated into Database';
        }
    

    }else{
        echo 'Please Contact Developer';
    }
    }
// ============================================== PACKAGE T&C EDIT ==============================================
    if($_POST["action"] == "tc_update")
    {

    $ID= $_POST["text5"];
    $Conditions = $_POST["text6"];

    $date = date('Y-m-d');
    $alert = "Package T&C Updated into Database";
    $status = "2"; 

    $query = "UPDATE t_conditions SET Conditions='$Conditions'
    WHERE ID= '$ID'"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package T&C Updated into Database';
        }
    

    }else{
        echo 'Please Contact Developer';
    }
    }

// ============================================== PACKAGE STATUS CHANGE ==============================================
//    Active -> Deactive
    if($_POST["action"] == "pack_active_status")
    {
        $Deactive = 0;
        $ID = $_POST["TravelID"];

        $date = date('Y-m-d');
        $alert = "Package Deactive Now";
        $status = "2"; 

    $query = "UPDATE package SET Status='$Deactive' WHERE Travel_ID = $ID";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Deactive Now';
        }
    
    }
    }
//    Dective -> Active
    if($_POST["action"] == "pack_deactive_status")
    {
        $Active = 1;
        $ID = $_POST["TravelID"];

        $date = date('Y-m-d');
        $alert = "Package Active Now";
        $status = "2"; 

    $query = "UPDATE package SET Status='$Active' WHERE Travel_ID = $ID";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'Package Active Now';
        }
    
    }
    }
    //    Proccess -> Active
    if($_POST["action"] == "pack_proccess")
    {
        $status = $Aststus;
        $Active = 1;
        $ID = $_POST["TravelID"];

        $date = date('Y-m-d');
        $alert = "Package Active Now";
        $status = "2"; 
        
        if($status == 2)
        {
            $Active = 1;
            $ID = $_POST["TravelID"];
            $query = "UPDATE package SET Status='$Active' WHERE Travel_ID = $ID";
            if(mysqli_query($conn, $query))
            {
                $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
                if(mysqli_query($conn, $query))
                {
                    echo 'change';
                }
            
            }
        }
        

    else{
        echo 'not_change';
    }
    }
//    Expired -> Active
        if($_POST["action"] == "pack_expired")
        {
            $status = $Aststus;
            $Active = 1;
            $ID = $_POST["TravelID"];
            $today = date('Y-m-d');

            $date = date('Y-m-d');
            $alert = "Package Active Now";
            $status1 = "2"; 

            $query = "SELECT * FROM package WHERE Travel_ID = $ID";
            $result = mysqli_query($conn,$query);

            while($row=mysqli_fetch_array($result))
            {
                // $User_data[0]=$row['ID'];
                $start_date = $row['T_Start_Date'];
                $date1 = date('Y-m-d',strtotime($start_date.'-7 days'));
                
            // echo 'cut_of';
            }
            if($today < $date1){
                if($status == 2)
                {
                    $Active = 1;
                    $ID = $_POST["TravelID"];
                    $query = "UPDATE package SET Status='$Active' WHERE Travel_ID = $ID";
                    if(mysqli_query($conn, $query))
                    {
                        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
                        if(mysqli_query($conn, $query))
                        {
                            echo 'change';
                        }
                   
                    }
                }
                
        
                else{
                    echo 'not_change';
                }
            }else{
                echo 'cut_of';
            }
        }

// ============================================== ADMIN STATUS CHANGE ==============================================
    //    Active -> Deactive
    if($_POST["action"] == "admin_deactive_status")
    {
        $status = $Aststus;
        $Deactive = 0;
        $ID = $_POST["UserID"];

        $date = date('Y-m-d');
        $alert = "Admin Account Deactive Now ID = $ID";
        $status1 = "2"; 
        
        if($status == 2)
        {
            
            $query = "UPDATE admin SET A_Status='$Deactive' WHERE A_ID = $ID";
            if(mysqli_query($conn, $query))
            {
                $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
                if(mysqli_query($conn, $query))
                {
                    echo 'change';
                }
            
            }
        }
        

    else{
        echo 'not_change';
    }
    }

    //    Dective -> Active
    if($_POST["action"] == "admin_active_status")
    {
        $status = $Aststus;
        $Active = 1;
        $ID = $_POST["UserID"];

        $date = date('Y-m-d');
        $alert = "Admin Account Active Now ID = $ID";
        $status1 = "2"; 
        
        if($status == 2)
        {
            
            $query = "UPDATE admin SET A_Status='$Active' WHERE A_ID = $ID";
            if(mysqli_query($conn, $query))
            {
                $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
                if(mysqli_query($conn, $query))
                {
                    echo 'change';
                }
           
            }
        }
        

    else{
        echo 'not_change';
    }
    }

// ============================================== USER STATUS CHANGE ==============================================
    //    Active -> Deactive
    if($_POST["action"] == "user_deactive_status")
    {
        $status = $Aststus;
        $Deactive = 0;
        $ID = $_POST["UserID"];

        $date = date('Y-m-d');
        $alert = "User Account Deactive Now ID = $ID";
        $status1 = "2"; 
        
        if($status == 2)
        {
            
            $query = "UPDATE users SET U_Status='$Deactive' WHERE User_ID = $ID";
            if(mysqli_query($conn, $query))
            {
                $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
                if(mysqli_query($conn, $query))
                {
                    echo 'change';
                }
            
            }
        }
        

    else{
        echo 'not_change';
    }
    }

    //    Dective -> Active
    if($_POST["action"] == "user_active_status")
    {
        $status = $Aststus;
        $Active = 1;
        $ID = $_POST["UserID"];

        $date = date('Y-m-d');
        $alert = "User Account Active Now ID = $ID";
        $status1 = "2"; 
        
        if($status == 2)
        {
            
            $query = "UPDATE users SET U_Status='$Active' WHERE User_ID = $ID";
            if(mysqli_query($conn, $query))
            {
                $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
                if(mysqli_query($conn, $query))
                {
                    echo 'change';
                }
           
            }
        }
        

    else{
        echo 'not_change';
    }
    }
// ============================================== BOOKING-FULL ==============================================
    if($_POST["action"] == "booking_full")
    {
        $booking_full = 3; //booking full
        $status = 1; // active package

        $date = date('Y-m-d');
        $alert = "Some Package Booking Full";
        $status1 = "2"; 

        $query = "SELECT * FROM package WHERE Status='$status'"; // select active packages
        $query_run = mysqli_query($conn ,$query);

        if(mysqli_num_rows($query_run) > 0)
            {
              while($row = mysqli_fetch_assoc($query_run))
              {
                $S_Date = $row['T_Start_Date'];
                $E_Date = $row['T_End_Date'];

                $query1 = "SELECT SUM(`U_adults`) AS `U_adults` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']}  AND 'T_start_date' = $S_Date AND 'T_end_date' = $E_Date";// sum of adults from each travel
                $query_run1 = mysqli_query($conn ,$query1);

                if(mysqli_num_rows($query_run1) > 0)
                {
                  while($row2 = mysqli_fetch_assoc($query_run1))
                  {
                
                     $book1 =  $row2['U_adults']; 
                   
                  }
                }else
                    {
                        $book1 = 0;
                    }
            
                    $query2 = "SELECT SUM(`U_children`) AS `U_children` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']}  AND 'T_start_date' = $S_Date AND 'T_end_date' = $E_Date";// sum of childern from each travel
                    $query_run2 = mysqli_query($conn ,$query2);

                    if(mysqli_num_rows($query_run2) > 0)
                    {
                      while($row2 = mysqli_fetch_assoc($query_run2))
                      {
                
                        $book2 =  $row2['U_children']; 
                    
                      }
                    }else
                        {
                            $book2 = 0;
                        }


                        $total = $book1 + $book2;
                        $book3 = $row['Available_Seat'];
  
                if($book3 == $total)// if package & total value are same -> pakage status = booking-full (3)
                {
                    $query3 = "UPDATE package SET Status='$booking_full' WHERE Travel_ID = {$row['Travel_ID']}";// update package status
                    mysqli_query($conn ,$query3);

                    $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
                    mysqli_query($conn, $query);
                    
                }
              }
            }
    }
// ============================================== BOOKING-EXPIRED ==============================================
    if($_POST["action"] == "booking_expired")
    {
        $booking_expired = 4; //booking expired
        $status = 1; // select active package

        $date = date('Y-m-d');
        $alert = "Some Package Expired";
        $status1 = "2"; 

        $query = "SELECT * FROM package WHERE Status='$status'"; // select active packages
        $query_run = mysqli_query($conn ,$query);

        if(mysqli_num_rows($query_run) > 0)
            {
              while($row = mysqli_fetch_assoc($query_run))
              {
                $db_date = $row['T_Start_Date'];
                $date1 = date('Y-m-d',strtotime($db_date.'-7 days'));
                $date2 = date('Y-m-d');

                if($date1 < $date2)
                {
                    $query2 = "UPDATE package SET Status='$booking_expired' WHERE Travel_ID = {$row['Travel_ID']}";// update package status
                    mysqli_query($conn ,$query2);

                    $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status1')";
                    mysqli_query($conn, $query);
                }
              }
            }
    }
// =================================================== Chat-Bot QA ======================================================================
    if($_POST["action"] == "chat_bot_QA_add")
    {

    $Quection = $_POST["CB_Quection"];
    $Answer = $_POST["CB_Answer"];

    $date = date('Y-m-d');
    $alert = "New Chat-Bot Quection & Answer Insert Into Database - $Quection - $Answer";
    $status = "2";

    $query = "INSERT INTO chat_bot (Questions, Answers)
    VALUES ('$Quection','$Answer')"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'insert';
        }


    }else{
        echo 'not_insert';
    }
    } 

// ============================================== Chat-Bot QA EDIT =========================================================================
    if($_POST["action"] == "chat_bot_QA_edit")
    {

    $ID= $_POST["QA_ID"];
    $quection = $_POST["CB_Quection_edit"];
    $answer = $_POST["CB_Answer_edit"];


    $date = date('Y-m-d');
    $alert = "Chat-Bot Quection & Answer Updated";
    $status = "2"; 

    $query = "UPDATE chat_bot SET Questions='$quection', Answers='$answer'
    WHERE ID= '".$_POST["QA_ID"]."'"; 

    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'update';
        }
    

    }else{
        echo 'not_update';
    }
    }
// ======================================================= Fetch Chat-Bot Edit Data ==============================================================
    if($_POST["action"] == "bot_edit_value")
    {
        
        $ID = $_POST['UserID'];
        $query = "SELECT * FROM chat_bot WHERE ID ='$ID'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            

            $User_data[0]=$row['ID'];
            $User_data[1]=$row['Questions'];
            $User_data[2]=$row['Answers'];
            


        }
        echo json_encode($User_data);
}

// ============================================== CHAT-BOT DATA DELETE ==============================================
    if($_POST["action"] == "bot_delete")
    {
        $date = date('Y-m-d');
        $alert = "Chat-Bot Quection & Answer Deleted";
        $status = "2";

    $query = "DELETE FROM chat_bot WHERE ID = '".$_POST["TravelID"]."'";
    if(mysqli_query($conn, $query))
    {
        $query = "INSERT INTO alerts (Date,Details,Status) VALUES ('$date','$alert','$status')";
        if(mysqli_query($conn, $query))
        {
            echo 'delete';
        }

    }else
    {
        echo 'not_delete';
    }
    }


// =================================================== ICONS ADD ======================================================================
    if($_POST["action"] == "icons_add_form_submit")
    {

    $icon_text = $_POST["icon_text"];
    $icon_title = $_POST["icon_title"];


    $query = "INSERT INTO all_icons (Icons, Title)
    VALUES ('$icon_text','$icon_title')"; 

    if(mysqli_query($conn, $query))
    {
         echo 'insert';

    }else{
        echo 'not_insert';
    }
    } 

// ============================================== Icons EDIT =========================================================================
    if($_POST["action"] == "icons_edit_form_submit")
    {

    $ID= $_POST["Icon_ID"];
    $icon_text_edit = $_POST["icon_text_edit"];
    $icon_title_edit = $_POST["icon_title_edit"];

    $query = "UPDATE all_icons SET Icons='$icon_text_edit', Title='$icon_title_edit'
    WHERE ID= '".$_POST["Icon_ID"]."'"; 

    if(mysqli_query($conn, $query))
    {

        echo 'update';

    }else{
        echo 'not_update';
    }
    }
// ======================================================= Fetch Icons Edit Data ==============================================================
    if($_POST["action"] == "icons_edit_value")
    {
        
        $ID = $_POST['UserID'];
        $query = "SELECT * FROM all_icons WHERE ID ='$ID'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            

            $User_data[0]=$row['ID'];
            $User_data[1]=$row['Icons'];
            $User_data[2]=$row['Title'];
            


        }
        echo json_encode($User_data);
}

// ============================================== ICONS DATA DELETE ==============================================
    if($_POST["action"] == "icons_delete")
    {


    $query = "DELETE FROM all_icons WHERE ID = '".$_POST["ID"]."'";
    if(mysqli_query($conn, $query))
    {

        echo 'delete';
        

    }else
    {
        echo 'not_delete';
    }
    }

// ============================================== TRACK VEHICAL ==============================================
    if($_POST["action"] == "tracking_vehical_fetch")
    {
        $ID = $_POST['ID'];
        $query = "SELECT * FROM guider_alocate WHERE P_ID = '$ID'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            $id = $row['G_ID'];

            $query2 = "SELECT * FROM guider WHERE ID = '$id'";
            $result2 = mysqli_query($conn,$query2);

            while($row2=mysqli_fetch_array($result2))
            {
                $User_data[0]=$row2['ID'];
                $User_data[1]=$row2['G_Name'];
            }
            


        }
        echo json_encode($User_data);
    }

    if($_POST["action"] == "track_vehical")
    {
        $ID = $_POST['ID'];
        $query = "SELECT * FROM guider WHERE ID = '$ID'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($result))
        {
            
            
            $User_data[0]=$row['ID'];
            $User_data[1]=$row['Latitude'];
            $User_data[2]=$row['Longitude'];
            $User_data[3]=$row['G_Name'];
            


        }
        echo json_encode($User_data);
    }

    if($_POST["action"] == "track_vehical_by_code")
    {
        $ID = $_POST['ID'];
        $query = "SELECT * FROM guider WHERE ID = '$ID'";
        $result = mysqli_query($conn,$query);

        
        while($row=mysqli_fetch_array($result))
        {

            $User_data[0]=$row['Latitude'];
            $User_data[1]=$row['Longitude'];
            $User_data[2]=$row['G_Name'];


        }
        echo json_encode($User_data);
    }

    if($_POST["action"] == "check_vehical_code")
    {
        $ID = $_POST['ID'];
        $query = "SELECT * FROM guider WHERE ID = '$ID'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){
            while($row=mysqli_fetch_array($result))
            {

                echo 'correct';

            }
    }
        echo 'wrong';
    }

    if($_POST["action"] == "lat_long")
    {
        $ID = $_POST['ID'];
        $query = "SELECT * FROM guider WHERE ID = '$ID' ORDER BY ID desc LIMIT 1";
        $result = mysqli_query($conn,$query);

        
        while($row=mysqli_fetch_array($result))
        {

            $User_data[0]=$row['Latitude'];
            $User_data[1]=$row['Longitude'];
            $User_data[2]=$row['G_Name'];



        }
        echo json_encode($User_data);
    }

// ============================================== VEHICLE FETCH ==============================================
    if($_POST["action"] == "vehicles_fetch")
    {
    $query = "SELECT * FROM tracking_vehicles";
    $result = mysqli_query($conn, $query);
    $output = '
    <div class="table-responsive small">  
    <table class="table table-bordered" id="datatable9" width="100%" celllspacing="0">
    <thead>
      <tr>
            <th>ID</th>
            <th>Unique ID / GPS Model ID</th>
            <th>Package Name</th>
            <th class="text-center">Action</th>

      </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Unique ID / GPS Model ID</th>
            <th>Package Name</th>
            <th class="text-center">Action</th>
        </tr>
</tfoot>
    <tbody>
    ';
    while($row = mysqli_fetch_array($result))
    {
    $output .= '

        <tr>
        <td>'.$row["ID"].'</td>
        <td>'.$row["Unic_ID"].'</td>
        

        ';
        $query1 = "SELECT * FROM package WHERE Travel_ID = {$row["Package_ID"]}";
        $result1 = mysqli_query($conn, $query1);
        while($row1 = mysqli_fetch_array($result1))
    {
        $output .= '

        <td>'.$row1["T_Name"].'</td>

        ';
    }


                $output.='

        <td class="text-center">
        <button type="button" name="vehicle_update" class=" btn-success bt-xs vehicle_update" id="'.$row["ID"].'" title="Edit"><i class="fa fa-edit"></i></button>
        <button type="button" name="vehicle_delete" class=" btn-danger bt-xs vehicle_delete" id="'.$row["ID"].'" title="Delete"><i class="fa fa-trash-alt"></i></button></td>
        </tr>
    ';
    }
    $output .= '</tbody>
    </table>
    </div>';
    echo $output;
    }

// ============================================== VEHICLE INSERT ==============================================
    if($_POST["action"] == "vehicle_new_form_submit")
    {
        $unique_id = $_POST['unique_id'];
        $lati = $_POST['lati'];
        $lon = $_POST['lon'];
        $package_id = $_POST['gps_package_id'];
        
        
        
            $sql = "INSERT INTO tracking_vehicles(Unic_ID, Latitude, Longitude, Package_ID) VALUES('$unique_id','$lati','$lon','$package_id')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
            echo'insert';
            exit();
            
            }else {
            echo 'not_insert';
            exit();

            }
    }
//  Delete
    if($_POST["action"] == "vehicle_delete")
    {

    $query = "DELETE FROM tracking_vehicles WHERE ID = '".$_POST["ID"]."'";

     
     if(mysqli_query($conn, $query))
     {

            echo 'delete';

     }else
     echo 'not_delete';
    }

    if($_POST["action"] == "vehicle_update")
    {
        $ID = $_POST['ID'];
        $query = "SELECT * FROM tracking_vehicles WHERE ID = '$ID' ";
        $result = mysqli_query($conn,$query);

        
        while($row=mysqli_fetch_array($result))
        {

            $User_data[0]=$row['ID'];
            $User_data[1]=$row['Unic_ID'];
        }
        echo json_encode($User_data);
    }

    if($_POST["action"] == "vehicle_edit_form_submit")
    {
        $unique_id = $_POST['edit_unique_id'];
        $lati = 0;
        $lon = 0;
        $package_id = $_POST['edit_gps_package'];
        

        
            $sql = "UPDATE tracking_vehicles SET Unic_ID='$unique_id',Latitude='$lati',Longitude='$lon',Package_ID='$package_id' WHERE ID= '".$_POST["id"]."'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
            echo'edit';
            exit();
            
            }else {
            echo 'not_edit';
            exit();

            }
    }


}

// ============================================== BAR CHART DATA FETCH ==============================================
    if($_POST["action"] == "BarChart")
    
    {
        header('Content-Type: application/json');

    $conn = mysqli_connect("localhost","root","","traveldb");

    $sqlQuery = "SELECT * FROM no_of_travelers ORDER BY T_ID";

    $result = mysqli_query($conn,$sqlQuery);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    // mysqli_close($conn);

    echo json_encode($data);
    // echo json_encode($data1);
    }

// ============================================== DONUT CHART DATA FETCH ==============================================
    if($_POST["action"] == "DonutChart")
    
    {
        header('Content-Type: application/json');

    $conn = mysqli_connect("localhost","root","","traveldb");

    $sqlQuery = "SELECT * FROM package_status ORDER BY T_ID";

    $result = mysqli_query($conn,$sqlQuery);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    // mysqli_close($conn);

    echo json_encode($data);
    // echo json_encode($data1);
    }

// ============================================== PROFIT LOSS DATA FETCH ==============================================
    if($_POST["action"] == "Profit_Loss")
    
   
    {
        $from = $_POST["from"];
        $to = $_POST["to"];
        header('Content-Type: application/json');

    $conn = mysqli_connect("localhost","root","","traveldb");

    
    $sqlQuery = "SELECT * FROM profit_loss WHERE Date BETWEEN '$from' AND '$to' ORDER BY Date ";

    $result = mysqli_query($conn,$sqlQuery);

    $data1 = array();
    foreach ($result as $row) {
        $data1[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data1);
    // echo json_encode($data1);
    }

// ============================================== PREDICTION DATA FETCH ==============================================
    if($_POST["action"] == "prediction_chart")
    
   
    {        
    header('Content-Type: application/json');

    $conn = mysqli_connect("localhost","root","","traveldb");
    
    $sqlQuery = "SELECT * FROM `prediction_chart`";

    $result = mysqli_query($conn,$sqlQuery);

    $User_data = array();
    foreach ($result as $row) {
        $User_data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($User_data);
    // echo json_encode($data1);
    }
?>