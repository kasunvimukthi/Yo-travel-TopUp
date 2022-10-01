<!-- ====================================================================================================================================
                                                                USER EDIT MODAL
======================================================================================================================================-->
  <div class="modal fade" id="user_edit_modal" tabindex="-1" role="dialog" aria-labelledby="user_edit_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_edit_modal">Edit My Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" enctype="multipart/form-data"  id="user_edit_form">

        <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['User_ID']; ?>">

        <input type="hidden" name="action" id="action" value="user_update" />

          <div class="col-sm-12 form-group">
            <label for="username" class="form-label">User name</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" >
          </div>

          <div class="col-sm-12 form-group">
            <label for="userage" class="form-label">User Age</label>
            <input type="number" class="form-control" id="userage" name="userage" value="<?php echo $_SESSION['Age']; ?>">
          </div>

          <div class="col-sm-12 form-group">
            <label for="useraddress" class="form-label">User Address</label>
            <input type="text" class="form-control" id="useraddress" name="useraddress" value="<?php echo $_SESSION['Address']; ?>">
          </div>

          
            <input type="hidden" class="form-control" id="useremail" name="useremail" value="<?php echo $_SESSION['Email_Address']; ?>">
          

          <div class="col-sm-12 form-group">
            <label for="usernumber" class="form-label">User Contact Number</label>
            <input type="text" class="form-control" id="usernumber" name="usernumber" value="<?php echo $_SESSION['Phone_Number']; ?>">
          </div>

          <div class="col-sm-12 form-group">
            <label for="userpassword" class="form-label">User Password</label>
            <input type="password" class="form-control" id="userpassword" name="userpassword" value="">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- ====================================================================================================================================
                                                                USER DELETE MODAL
======================================================================================================================================-->
  <div class="modal fade" id="user_delete_modal" tabindex="-1" role="dialog" aria-labelledby="user_delete_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_delete_modal">User Profile Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" enctype="multipart/form-data"  id="user_delete_form">

        <input type="hidden" id="Duserid" name="Duserid" value="<?php echo $_SESSION['User_ID']; ?>">

        <input type="hidden" name="action" id="action" value="user_delete">

          <div class="col-sm-12 form-group">
            <label for="username" class="form-label">User name</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" readonly>
          </div>

          <div class="col-sm-12 form-group">
            <label for="DuserPassword" class="form-label">User Password</label>
            <input type="password" class="form-control" id="DuserPassword" name="DuserPassword" value="">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete Now</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- ====================================================================================================================================
                                                                USER INVOICE MODAL
======================================================================================================================================-->
<div class="modal fade" id="user_invoice_modal" tabindex="-1" role="dialog" aria-labelledby="user_invoice_modal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_invoice_modal">User Invoice</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
          </button>
        </div>
        <div class="modal-body">


        <input type="hidden" id="Duserid" name="Duserid" value="<?php echo $_SESSION['User_ID']; ?>">


          <div class="row form-group m-3 small">
            <label for="username" class="form-label col-sm-2">User name</label>
            <input type="text" class="form-control col-sm-3" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" readonly>
            <label for="username" class="form-label col-sm-2">User E-mail</label>
            <input type="text" class="form-control col-sm-3" id="username" name="username" value="<?php echo $_SESSION['Email_Address']; ?>" readonly>
          </div>

          <div class="row form-group">
        <?php

        $u_id=$_SESSION['User_ID'];


        $query = "SELECT * FROM invoice WHERE User_ID = {$u_id}";
        $query_run = mysqli_query($conn ,$query);
        ?>
          <table class="table table-bordered small m-3" id="datatable1" width="100%" celllspacing="0">
          <thead>
          <tr  class="text-center ">
            
            <th class="align-top">Invoice No</th>
            <th class="align-top">Invoice Date</th>
            <th class="align-top">Package Code</th>
            <th class="align-top">Package Name</th>
            <th class="align-top">Start Date</th>
            <th class="align-top">End Date</th>
            <th class="align-top">Number of Child</th>
            <th class="align-top">Number of Adults</th>
            <th class="align-top">Payment Type</th>
            <th class="align-top">Package Cost</th>
            <th class="align-top">Status</th>
            <th class="align-top" width="165px">Action</th>

          </tr>
        </thead>
        <tfoot>
        <tr>
        <th>Invoice No</th>
            <th>Invoice Date</th>
            <th>Package Code</th>
            <th>Package Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Number of Child</th>
            <th>Number of Adults</th>
            <th>Payment Type</th>
            <th>Package Cost</th>
            <th>Status</th>
            <th class="text-center">Action</th>

        </tr>
    </tfoot>
    <tbody>
    <?php
            if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    ?>
                    <tr>
                        <?php 
                        $id= $row['T_ID'];
                        $sql = "SELECT * FROM `package` WHERE `Travel_ID` = {$id}";
                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                            if(mysqli_num_rows($result) > 0){
                            while($row1 = mysqli_fetch_assoc($result)) {?>
    
                        <td><?php echo $row['Invoice_Number']; ?></td>
                        <td><?php echo $row['I_Date']; ?></td>
                        <td><?php echo $row['T_ID']; ?></td>
                        <td><?php echo $row1['T_Name']; ?></td>
                        <td><?php echo $row['T_start_date']; ?></td>
                        <td><?php echo $row['T_end_date']; ?></td>

                        <td><?php echo $row['U_children']; ?></td>
                        <td><?php echo $row['U_adults']; ?></td>
                        <td><?php echo $row['P_type']; ?></td>
                        <td><?php echo $row['T_Cost']; ?></td>
                        <td><?php echo $row['Status']; ?></td>
                        <td>
                            
                            <input type="hidden" id="I_No" value="<?php echo $row['Invoice_Number']; ?>">
                            <input type="hidden" id="I_Date" value="<?php echo $row['I_Date']; ?>">
                            <input type="hidden" id="T_ID" value="<?php echo $row['T_ID']; ?>">
                            <input type="hidden" id="P_Type" value="<?php echo $row['P_type']; ?>">
                            <input type="hidden" id="Status" value="<?php echo $row['Status']; ?>">

                            <!-- <button class="btn secondary icofont-qr-code mt-1 QR-code" title="QR-code" id="<?php echo $row['Invoice_Number']; ?>"></button>
                             -->
                            <?php
                            date_default_timezone_set('Asia/Colombo');
                            $today_date = date("Y-m-d");
                            

                            $i_date = $row['T_start_date'];
                            $date1 = date('Y-m-d',strtotime($i_date.'-7 days'));
                            
                            $date3 = "true";
                            $cancel = "true";
                            $upload = "true";

                            if($today_date >  $date1)
                            {
                              $date3 = "false";
                            }else{
                              $date3 = "true";
                            }
                            
                            if($row['Status'] == 'Active'){
                              $cancel = "true";
                              $upload = "true";
                            }else
                            if($row['Status'] == 'Canceled'){
                              $cancel = "false";
                              $upload = "false";
                            }else
                            if($row['Status'] == 'Expired'){
                              $cancel = "false";
                              $upload = "false";
                            }else
                            if($row['Status'] == 'Not Paid'){
                              $cancel = "true";
                              $upload = "true";
                            }else
                            if($row['Status'] == 'Proccessing'){
                              $cancel = "true";
                              $upload = "true";
                            }else
                            if($row['Status'] == 'Full Paid'){
                              $cancel = "true";
                              $upload = "false";
                            }else{
                              $cancel = "false";
                              $upload = "false";
                            }

                            

                            if($upload == "false"){
                              ?>
                              <button class="btn btn-secondary icofont-upload-alt mt-1 " title="Upload Payment Slip"></button>
                              <?php
                            }else{
                              ?>
                              <button class="btn secondary icofont-upload-alt mt-1 PaymentSlip_Upload" title="Upload Payment Slip" id="<?php echo $row['Invoice_Number']; ?>"></button>
                              <?php
                            }

                            ?>
                            <a target="_blank" href="invoice.php?id=<?php echo $row['Invoice_Number']; ?>">
                            <button class="btn secondary icofont-print mt-1" title="Print"></button></a>
                            <?php
                            
                            if($cancel == "true" && $date3 == "true"){
                              ?>
                              
                              <button class="btn btn-danger icofont-close mt-1 payment_cancel" title="Cancel" id="<?php echo $row['Invoice_Number']; ?>"></button>
                                <?php 
                            }else {
                              ?>
                               <button class="btn btn-secondary icofont-close mt-1 invoice_cant_cancel" title="Cancel"></button>
                              <?php
                            }
                            

                            
                                                        
                            ?>
                            
                        </td>
                    </tr>
                    <?php
                            }
                            }else{
                            echo "No Record Found";
                            }?>
                
                    <?php
                }
                }
                else {
                echo "No Record Found";
                }
            ?>
    </tbody>
          </table>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
<!-- ====================================================================================================================================
                                                              USER PASSWORD CHANGE MODAL
======================================================================================================================================-->
  <div class="modal fade" id="user_password_modal" tabindex="-1" role="dialog" aria-labelledby="user_password_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_password_modal">User Password Change</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="password_change.php"  id="user_password_form">

        <input type="hidden" id="Cuserid" name="Cuserid" value="<?php echo $_SESSION['User_ID']; ?>">

        <input type="hidden" name="action" id="action" value="user_password_change">

          <div class="col-sm-12 form-group">
            <label for="username" class="form-label">User name</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['Name']; ?>" readonly>
          </div>

          <div class="col-sm-12 form-group">
            <label for="CuserPassword" class="form-label">User Current Password</label>
            <input type="password" class="form-control" id="CuserPassword" name="CuserPassword" value="">
          </div>

          <div class="col-sm-12 form-group">
            <label for="NewuserPassword" class="form-label">User New Password</label>
            <input type="password" class="form-control" id="NewuserPassword" name="NewuserPassword" value="">
          </div>

          <div class="col-sm-12 form-group">
            <label for="Confirm_userPassword" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="Confirm_userPassword" name="Confirm_userPassword" value="">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Change Now</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- ====================================================================================================================================
                                                             QR MODAL
======================================================================================================================================-->
  <div class="modal fade" id="QR_modal" tabindex="-1" role="dialog" aria-labelledby="QR_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="QR_modal">Your Invoice QR Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           
          </button>
        </div>
        <div class="modal-body">
          <div id="QR_output">

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<!-- ====================================================================================================================================
                                                             USER PAYMENT SLIP
======================================================================================================================================-->
<div class="modal fade" id="Payment_modal" tabindex="-1" role="dialog" aria-labelledby="Payment_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Payment_modal">Payment Slip</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           
          </button>
        </div>
        <div class="modal-body">
          <div class="row col-md-12">
            <form method="POST" enctype="multipart/form-data"  id="PaymentSlip_Upload_Form">
            <input type="hidden" name="action" id="action" value="Upload_Payment_Slip" />
              <input type="hidden" id="I_ID" name="I_ID">
              <input type="file" name="payment_slip_file" id="payment_slip_file">
              <button type="submit" class="btn btn-primary" id="PaymentSlip_Upload_Btn">Upload</button>
            </form>
          </div>
          <div id="Slip_output">

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<!-- ====================================================================================================================================
                                                             GPS MODAL
======================================================================================================================================-->
<style type="text/css">

#gps_map{
  width: 100%;
  height: 100%;
  
}
</style>
<div class="modal fade" id="user_tracking_modal" tabindex="-1" role="dialog" aria-labelledby="user_tracking_modal" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_tracking_modal">Travel Vehical Tracking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
          </button>
        </div>
        <div class="modal-body">
        <?php 
                $uid = $_SESSION['User_ID'];
                $to_day = date('Y-m-d');

                $query = "SELECT * FROM invoice WHERE User_ID='$uid' && T_end_date > $to_day && T_start_date < '$to_day'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result)){
                        $t_id = $row['T_ID'];

                        $query2 = "SELECT * FROM guider_alocate WHERE P_ID='$t_id' LIMIT 1";
                        $result2 = mysqli_query($conn, $query2);
                        if(mysqli_num_rows($result2) > 0)
                        {
                          while($row2 = mysqli_fetch_assoc($result)){
                          $G_ID = $row2['G_ID'];
                          }
                          $query1 = "SELECT * FROM guider WHERE ID='$G_ID' LIMIT 1";
                          $result1 = mysqli_query($conn, $query1);
                          if(mysqli_num_rows($result1) > 0)
                          {
                              while($row1 = mysqli_fetch_assoc($result1)){
  
                                $Uniqe = $row1['G_Name'];
                                ?>
                                <div class="row col-md-12">
                                
                                <input class="form-control col-md-4" type="hidden" name="uniq" id="uniq" value="<?php echo $Uniqe ?>" placeholder="Enter Unique ID">
                                </div>
                                <?php
                              }}
                        }
                        
                    }}
        ?> 

        <input type="hidden" name="lat" id="lat" value="">
        <input type="hidden" name="lng" id="lng" value="">
        <input type="hidden" name="vehical" id="vehical" value="">

        <div style="height: 440px;">
        <div id="gps_map">

        </div>
        </div>
        

        
      </div>
    </div>
  </div>
  </div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5SUrSd237MKwlLNYbGDfv-FROSRwb6EI&callback=loadMap1"
      async
    ></script>