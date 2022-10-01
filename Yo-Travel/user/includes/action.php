<?php
  include "../includes/check_login.php";


  if(isset($_POST["action"]))
  {
      require_once "../db_conn.php";

      

// ============================================== PACKAGE BOOKING FORM FETCH==============================================
    // if($_POST["action"] == "book_now_modal")
    // {
    //     $id =$_POST["ID"];
    //     $query = "SELECT * FROM package WHERE Travel_ID = $id";
    //     $result = mysqli_query($conn, $query);
    //     if(mysqli_num_rows($result) > 0)
    //         {
    //     $output = '
       
    //     ';
    //     while($row = mysqli_fetch_array($result))
    //     {

    //     $output .= '

        

    //     <form class="needs-validation" novalidate>
  
    //     <div class="col-md-7 col-lg-12">
  
    //     <h4 class="my-1 col-sm-3">User Information</h4>
        
          
    //         <div class="row g-4">
  
    //         <input type="hidden" class="form-control" id="uid" value="'.$_SESSION['User_ID'].' " readonly>
  
    //           <div class="col-sm-12">
    //             <label for="username" class="form-label">User name</label>
    //             <input type="text" class="form-control" id="username" value="'.$_SESSION['User_Name'].'" readonly>
    //           </div>
  
    //           <div class="col-12">
    //             <label for="email" class="form-label">E-mail Address</label>
    //             <input type="email" class="form-control" id="email" placeholder="Enter Your e-mail@gmail.com" value="'.$_SESSION['Email_Address'].'" required>
    //             <div class="invalid-feedback">
    //               Please enter a valid email address for booking.
    //             </div>
    //           </div>
  
    //           <div class="col-12">
    //             <label for="address" class="form-label">Address</label>
    //             <input type="text" class="form-control" id="address" placeholder="Enter Your Address" value="'.$_SESSION['Address'].'" required>
    //             <div class="invalid-feedback">
    //               Please enter your address.
    //             </div>
    //           </div>
  
    //         </div>
  
    //         <hr class="my-4">
  
    //         <h4 class="my-3 col-sm-3">Package Details</h4>
  
    //         <div class="row g-4">
  
    //           <div class="col-sm-6">
    //             <label for="firstName" class="form-label">Package Code</label>
    //             <input type="text" class="form-control" id="firstName"  value="'.$row['Travel_ID'].'" readonly>
    //           </div>
  
    //           <div class="col-6">
    //             <label for="tname" class="form-label">Package Name</label>
    //             <input type="text" class="form-control" id="tname" value="'.$row['T_Name'].'" readonly>
    //           </div>
  
    //           <div class="col-6">
    //             <label for="tstart" class="form-label">Travel Start Date</label>
    //             <input type="text" class="form-control" id="tstart" value="'.$row['T_Start_Date'].'" readonly>
    //           </div>
  
    //           <div class="col-6">
    //             <label for="tend" class="form-label">Travel End Date</label>
    //             <input type="text" class="form-control" id="tend" value="'.$row['T_End_Date'].'" readonly>
    //           </div>
  
    //         </div>
  
    //         <hr class="my-4">
  
    //         <h4 class="my-3 col-sm-3">Booking Details</h4>
  
    //         <div class="row g-4">
  
    //           <div class="col-sm-4">
    //             <label class="form-label">Number of Adults</label>
    //             <input type="number" class="form-control" id="adults"  value="" required>
    //           </div>
  
    //           <div class="col-sm-4">
    //             <label class="form-label">Price for 1 Adult</label>
    //             <input type="text" class="form-control" id="adult"  value="'. $row['T_Cost'].'" readonly>
    //           </div>
  
    //           <div class="col-sm-4">
    //             <label class="form-label">Total</label>
    //             <input type="text" class="form-control" id="total"  value="" readonly>
    //           </div>
  
    //           <div class="col-sm-4">
    //             <label class="form-label">Number of Childern</label>
    //             <input type="number" class="form-control" id="childs"  value="" required >
    //           </div>
  
    //           <div class="col-sm-4">
    //             <label class="form-label">Price for 1 Child</label>
    //             <input type="text" class="form-control" id="child"  value="'. $row['T_Cost']/2 .'" readonly>
    //           </div>
  
    //           <div class="col-sm-4">
    //             <label class="form-label">Total</label>
    //             <input type="text" class="form-control" id="ctotal"  value="" readonly>
    //           </div>
  
    //           <div class="col-sm-12">
    //             <label class="form-label"></label>
    //             <div class="input-group ">
    //             <span class="input-group-text col-sm-8">Sub Total Rs.</span>
    //             <input type="text" class="form-control" id="stotal"  value="" readonly>
    //             </div>
    //           </div>
  
    //           <div class="col-sm-12">
    //             <label for="addit" class="form-label">Additional Request</label>
    //             <textarea name="" id="" cols="12" rows="3" class="form-control" id="addit"></textarea>
  
    //           </div>
  
    //         </div>
  
    //         <hr class="my-4">
  
    //         <h4 class="my-3 col-sm-4">Payment Details</h4>
  
    //         <div class="mb-4">
    //           <div class="form-check">
    //             <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
    //             <label class="form-check-label" for="credit">Credit card</label>
    //           </div>
    //           <div class="form-check">
    //             <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
    //             <label class="form-check-label" for="debit">Debit card</label>
    //           </div>
    //         </div>
  
    //         <h4 class="my-3 col-sm-3"></h4>
  
    //         <div class="row gy-3">
    //           <div class="col-md-6">
    //             <label for="cc-name" class="form-label">Name on card</label>
    //             <input type="text" class="form-control" id="cc-name" placeholder="" required>
    //             <small class="text-muted">Full name as displayed on card</small>
    //             <div class="invalid-feedback">
    //               Name on card is required
    //             </div>
    //           </div>
  
    //           <div class="col-md-6">
    //             <label for="cc-number" class="form-label">Credit card number</label>
    //             <input type="text" class="form-control" id="cc-number" placeholder="" required>
    //             <div class="invalid-feedback">
    //               Credit card number is required
    //             </div>
    //           </div>
  
    //           <div class="col-md-3">
    //             <label for="cc-expiration" class="form-label">Expiration</label>
    //             <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
    //             <div class="invalid-feedback">
    //               Expiration date required
    //             </div>
    //           </div>
  
    //           <div class="col-md-3">
    //             <label for="cc-cvv" class="form-label">CVV</label>
    //             <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
    //             <div class="invalid-feedback">
    //               Security code required
    //             </div>
    //           </div>
    //         </div>
  
            
  
            
          
    //     </div>
  
    //     </div>
        
    //     ';
    //     }
    
    //     $output .= '
    //     ';
    //     echo $output;
    //     }else{
    //         echo "No Record Found";
    //     }
            
    // }

    if($_POST["action"] == "fetch_invoice_status")
    {
        date_default_timezone_set('Asia/Colombo');
        $today = date("Y-m-d");
        
        $status2 = 'Expired';


        $query = "SELECT * FROM invoice WHERE Status = 'Active'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)){

                
                if ($row['T_end_date'] < $today )
                {
                    $query3 = "UPDATE invoice SET Status='$status2' WHERE Invoice_Number = {$row["Invoice_Number"]}";
                    $query_run3 = mysqli_query($conn ,$query3);
                }


            }
        }
    }

    if($_POST["action"] == "book_now_modal_submit")
    {
         $uid = $_POST['uid'];
         $t_code = $_POST['pcode'];
         $t_end = $_POST['tend'];
         $t_start = $_POST['tstart'];
         date_default_timezone_set('Asia/Colombo');
         $i_date = date("Y-m-d");
         $i_time = date('h:i:s a');
         $status = 'Not Paid';
         $t_childern = $_POST['childs'];
         $t_adults = $_POST['adults'];
         $p_type = 'Bank Deposit' ;
         $t_cost = $_POST['stotal'];
         $reqest = $_POST['addit'];
         $t_adult_cost = $_POST['total'];
         $t_child_cost = $_POST['ctotal'];

         $query = "SELECT * FROM package WHERE Travel_ID = '$t_code'";
         $result = mysqli_query($conn, $query);
         while($row = mysqli_fetch_array($result))
         {
            $t_adult_sale = $row["T_Adult_S_Price"];
            $t_child_sale = $row["T_Child_S_Price"];

            $t_adult_actual_cost = $row["T_Adult_Cost"];
            $t_child_actual_cost = $row["T_Child_Cost"];

            $TAAC = $t_adults*$t_adult_actual_cost;
            $TCAC = $t_adults*$t_child_actual_cost;
            
         $sql2 = "INSERT INTO invoice(User_ID, T_ID, I_Date, I_Time, T_end_date, T_start_date, U_children, U_adults, U_child_cost, U_adult_cost, A_Adult_Cost, A_Child_Cost, P_type, T_Cost, Request, Status) 
               VALUES('$uid','$t_code','$i_date','$i_time','$t_end','$t_start','$t_childern','$t_adults','$t_child_cost','$t_adult_cost','$TAAC','$TCAC','$p_type','$t_cost','$reqest','$status')";
               $result2 = mysqli_query($conn, $sql2);
               if ($result2) {

                
                    // header("Location: index.php?success=You book travel package Successfull");
                    $query3 = "SELECT * FROM profit_loss WHERE Date = '$i_date'";
                    $result3 = mysqli_query($conn, $query3);
                    if(mysqli_num_rows($result3) == 0)
                    {
                    
                    $query4 = "INSERT INTO profit_loss (Date, Profit_Loss) VALUES ('$i_date','0')";
                    $result4 = mysqli_query($conn, $query4);

                    }
                        echo 'change';

                 exit();
               }else {

                echo 'not_change';
                    //    header("Location: index.php?error=unknown error occurred");
                    exit();
               }
            }
    }

// ========================================= User Profile Update ===========================
    if($_POST["action"] == "user_update")
    {
    $aid = $_POST['userid'];
    $name = $_POST['username'];
    $age = $_POST['userage'];
    $address = $_POST['useraddress'];
    $Email_Address = $_POST['useremail'];
    $Phone_Number = $_POST['usernumber'];
    $pass1 = $_POST['userpassword'];
    $pass = md5($pass1);

  
        $sql = "SELECT * FROM users WHERE User_ID ='$aid' AND Password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Password'] === $pass) {
 
  
        $query = "UPDATE users SET Name='$name',Age='$age',Address='$address',Email_Address='$Email_Address',Phone_Number='$Phone_Number' WHERE User_ID='$aid' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
        echo 'Updated';
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

// =============================================== USER DELETE ================================================
    if($_POST["action"] == "user_delete")
    {
    $uid = $_POST['Duserid'];
    $pass1 = $_POST['DuserPassword'];
    $pass = md5($pass1);

  
        $sql = "SELECT * FROM users WHERE User_ID='$uid' AND Password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            
            {
                if ($row['Password'] === $pass) {
        
        
                $query = "DELETE FROM users WHERE User_ID='$uid'";
                $query_run = mysqli_query($conn, $query);
        
                if($query_run){
                echo 'Deleted';
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
// =============================================== USER PASSWORD CHANGE ================================================
    // if($_POST["action"] == "user_password_change")
    // {
    // $uid = $_POST['Cuserid'];
    // $pass1 = $_POST['CuserPassword'];
    // $pass2 = $_POST['Confirm_userPassword'];

    // $pass1 = md5($pass1);
    // $pass2 = md5($pass2);


  
    //     $sql = "SELECT * FROM users WHERE User_ID='$uid' AND Password='$pass1'";

    //     $result = mysqli_query($conn, $sql);
        
    //     if (mysqli_num_rows($result) > 0) {
    //         while($row = mysqli_fetch_array($result))

            
    //         {

    //             $query = "UPDATE users SET Password='$pass2' WHERE User_ID='$uid' ";
    //             $query_run = mysqli_query($conn, $query);
        
    //             if($query_run){
    //             echo 'Change';
    //             exit();
    //             }
    //             else
    //             {
    //             echo 'NotChange';
    //             exit();
    //             }
                
                
    //         }
    //     }
       
    // }
// =============================================== GPS Tracking ================================================

    if($_POST["action"] == "track_vehical_by_code")
    {
        $ID = $_POST['ID'];
        $query = "SELECT * FROM tracking_vehicles WHERE Unic_ID = '$ID'";
        $result = mysqli_query($conn,$query);

        
        while($row=mysqli_fetch_array($result))
        {

            $User_data[0]=$row['Latitude'];
            $User_data[1]=$row['Longitude'];
            $User_data[2]=$row['Unic_ID'];


        }
        echo json_encode($User_data);
    }



    }

  
?>