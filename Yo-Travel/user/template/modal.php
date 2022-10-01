<?php
  require_once "./db_conn.php";
?>
<!-- ============================================ BOOKING MODAL ============================================= -->
<div class="modal fade" id="book_now_modal" tabindex="-1" aria-labelledby="book_now_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="book_now_modals">Travel Booking Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php 
      $post_id = $_GET['id'];


            $sql = "SELECT * FROM `package` WHERE `Travel_ID` = {$post_id}"; 
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
{

            $query1 = "SELECT SUM(`U_adults`) AS `U_adults` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']}";
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
            
                    $query2 = "SELECT SUM(`U_children`) AS `U_children` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']}";
                    $query_run2 = mysqli_query($conn ,$query2);

                    if(mysqli_num_rows($query_run2) > 0)
                    {
                      while($row3 = mysqli_fetch_assoc($query_run2))
                      {
                
                        $book2 =  $row3['U_children']; 
                    
                      }
                    }else
                        {
                            $book2 = 0;
                        }


                        $total = $book1 + $book2;
                        $book3 = $row['Available_Seat'];
                        $answer = $book3 - $total;
                   
                            
             {?>

      <div class="modal-body">

      <form class="needs-validation" novalidate id="book_submit" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="available" id="available" value="<?php echo $answer; ?>">

      <input type="hidden" name="action" id="action" value="book_now_modal_submit">

      <div class="col-md-7 col-lg-12">

      <h4 class="my-1 col-sm-3">User Information</h4>
      
        
          <div class="row g-4">

          <input type="hidden" class="form-control" id="uid" name="uid" value="<?php echo $_SESSION['User_ID']; ?>" readonly>

            <div class="col-sm-12">
              <label for="username" class="form-label">User name</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['User_Name']; ?>" readonly>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">E-mail Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your e-mail@gmail.com" value="<?php echo $_SESSION['Email_Address']; ?>" >
              <div class="invalid-feedback">
                Please enter a valid email address for booking.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address" value="<?php echo $_SESSION['Address']; ?>" >
              <div class="invalid-feedback">
                Please enter your address.
              </div>
            </div>

          </div>

          <hr class="my-4">

          <h4 class="my-3 col-sm-3">Package Details</h4>

          <div class="row g-4">

            <div class="col-sm-6">
              <label for="pcode" class="form-label">Package Code</label>
              <input type="text" class="form-control" id="pcode" name="pcode"  value="<?php echo $row['Travel_ID'];?>" readonly>
            </div>

            <div class="col-6">
              <label for="tname" class="form-label">Package Name</label>
              <input type="text" class="form-control" id="tname" name="tname" value="<?php echo $row['T_Name'];?>" readonly>
            </div>

            <div class="col-6">
              <label for="tstart" class="form-label">Travel Start Date</label>
              <input type="text" class="form-control" id="tstart" name="tstart" value="<?php echo $row['T_Start_Date'];?>" readonly>
            </div>

            <div class="col-6">
              <label for="tend" class="form-label">Travel End Date</label>
              <input type="text" class="form-control" id="tend" name="tend" value="<?php echo $row['T_End_Date'];?>" readonly>
            </div>

          </div>

          <hr class="my-4">

          <h4 class="my-3 col-sm-3">Booking Details</h4>

          <div class="row g-4">

            <div class="col-sm-4">
              <label class="form-label">Number of Adults</label>
              <input type="number" class="form-control" id="adults" name="adults" value="" >
            </div>

            <div class="col-sm-4">
              <label class="form-label">Price for 1 Adult</label>
              <input type="text" class="form-control" id="adult" name="adult"  value="<?php echo $row['T_Adult_S_Price'];?>" readonly>
            </div>

            <div class="col-sm-4">
              <label class="form-label">Total</label>
              <input type="text" class="form-control" id="total" name="total"  value="" readonly>
            </div>

            <div class="col-sm-4">
              <label class="form-label">Number of Childern</label>
              <input type="number" class="form-control" id="childs" name="childs" value=""  >
            </div>

            <div class="col-sm-4">
              <label class="form-label">Price for 1 Child</label>
              <input type="text" class="form-control" id="child" name="child" value="<?php echo $row['T_Child_S_Price'];?>" readonly>
            </div>

            <div class="col-sm-4">
              <label class="form-label">Total</label>
              <input type="text" class="form-control" id="ctotal" name="ctotal" value="" readonly>
            </div>

            <div class="col-sm-12">
              <label class="form-label"></label>
              <div class="input-group ">
              <span class="input-group-text col-sm-8">Sub Total Rs.</span>
              <input type="text" class="form-control" id="stotal" name="stotal" value="" readonly>
              </div>
            </div>

            <div class="col-sm-12">
              <label class="form-label">Additional Request</label>
              <textarea cols="12" rows="3" class="form-control" id="addit" name="addit"></textarea>

            </div>

          </div>

          <!-- <hr class="my-4">

          <h4 class="my-3 col-sm-4">Payment Details</h4>

          <div class="mb-4">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked >
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" >
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
          </div>

          <h4 class="my-3 col-sm-3"></h4>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" >
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is 
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" >
              <div class="invalid-feedback">
                Credit card number is 
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" >
              <div class="invalid-feedback">
                Expiration date 
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" >
              <div class="invalid-feedback">
                Security code 
              </div>
            </div>
          </div> -->

      </div>

      </div>
      <div class="modal-footer">
      <button class="w-100 btn btn-primary btn-lg" type="submit">Add To My Invoice List</button>
      </div>
      </form>

      <?php } 
}
    }?>
    </div>
  </div>
</div>
