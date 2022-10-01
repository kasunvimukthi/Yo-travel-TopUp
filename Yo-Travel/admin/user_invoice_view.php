<?php 
    include ('includes/check_login.php');
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    require 'db_conn.php';
    ?>
    <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row col-md-12">
                <h6 class="m-0 font-weight-bold text-primary col-md-3">Journey List By Traveler</h6>
                <select  id="user_select" name="user_select" class="ml-4 col-md-2">
                      <option selected="" value="all_user" >All User</option>
                      <?php 
                        
                                $query = "SELECT * FROM users ORDER BY User_ID ASC"; 
                                $result = $conn->query($query);
                                
                                if($result->num_rows > 0){ 
                                    while($row = $result->fetch_assoc()){  
                                        echo '<option value="'.$row['User_ID'].'">ID '.$row['User_ID'].'  '.$row['Name'].'</option>'; 
                                    } 
                                }else{ 
                                    echo '<option value="">There are no any users</option>'; 
                                }

                        ?>
                    </select>
                    
                        <h6 class="m-0 font-weight-bold text-primary col-md-4">From 
                          <input type="date" class=" bg-white border-0 small" id="invoice_from_date" name="invoice_from_date" value="2022-01-01">
                            To <input type="date" class=" bg-white border-0 small" id="invoice_to_date" name="invoice_to_date" value="2022-12-31">
                            
                        </h6>
                        
                        <select  id="package_select" name="package_select" class="ml-4 col-md-2">
		                    	<option selected="" value="all_package" >All packages</option>
		                    	<?php 
		                    		
                                    $query = "SELECT * FROM package ORDER BY T_Name ASC"; 
                                    $result = $conn->query($query);
                                    
                                    if($result->num_rows > 0){ 
                                        while($row = $result->fetch_assoc()){  
                                            echo '<option value="'.$row['Travel_ID'].'"> '.$row['T_Name'].'</option>'; 
                                        } 
                                    }else{ 
                                        echo '<option value="">There are no any package</option>'; 
                                    }

		                    	 ?>
		                    </select>
                        </div>

                        <div class="row col-md-12 pt-2">
                          <h6 class="m-0 font-weight-bold text-primary col-md-3">Invoice Status</h6>
                          <select  id="invoice_status_select" name="invoice_status_select" class="ml-4 col-md-2">
                            <option selected="" value="Proccessing" >Proccessing</option>
                            <option value="Full Paid">Full Paid</option>
                            <option value="Not Paid">Not Paid</option>
                            <option value="Canceled">Canceled</option>
                            <option value="Payment Canceled">Payment Canceled</option>
                          </select>
                        

                        <h6 class="m-0 font-weight-bold text-primary col-md-4">Check Journey Status 
                          <i class="btn btn-success ml-2 icofont-qr-code" id="invoice_check"></i>
                        </h6>
                      </div>
                            <input type="hidden" name="user_id" value="all_user" id="user_id">
          
          </div>
        <div class="card-body" id="user_invoice_data"  style="max-height: 70vh; overflow-y: scroll;">
       
        </div>
      </div>

      <div class="card shadow mb-4">
      <div class="card-header py-3">
              <div class="row">
            
            
              </div>
              </div>
            <div class="card-body" id="UserSubTotal"  style=" overflow-y: scroll;">
       
            

          </div>
                       
          
          
      </div>
    </div>
  <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
  
    ?>