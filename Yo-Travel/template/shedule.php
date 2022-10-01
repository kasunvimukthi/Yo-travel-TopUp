<section id="shedule" class="col-lg-11">
    
        <div class="top ">
            <h1 class="">Our Travel Shedule</h1>
            <p>This is our upcoming travel plans</p>
        </div>
        <div class="shedule_container">
        <div class="table-responsive">  
        <?php 
 
      $status = 1;

      $query = "SELECT * FROM package WHERE Status='$status'";
      $query_run = mysqli_query($conn ,$query);
    ?>
        <table class="table table-bordered " id="datatable1" width="100%" celllspacing="0">
        <thead>
          <tr>
            
            <th>Category Name</th>
            
            <th>Travel Name</th>
            <th>Place to Visit</th>
            <th width="100px">Travel Start Date</th>
            <th width="100px">Travel End Date</th>
            <th>Number of Day</th>
            <th>Status</th>
            <th width="100px">Cut of Date</th>
            <th>Cost</th>
            <th>Action</th>

          </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Category Name</th>
           
            <th>Travel Name</th>
            <th>Place to Visit</th>
            
            <th>Travel Start Date</th>
            <th>Travel End Date</th>
            <th>Number of Day</th>
            <th>Status</th>
            <th>Cut of Date</th>
            <th>Cost</th>
            <th>Action</th>

        </tr>
    </tfoot>
        <tbody>
        <?php
          if(mysqli_num_rows($query_run) > 0)
            {
              while($row = mysqli_fetch_assoc($query_run))
              {
                $S_Date = $row['T_Start_Date'];
                $E_Date = $row['T_End_Date'];

                $query1 = "SELECT * FROM catogory WHERE C_ID= {$row['C_ID']}";
                $query_run1 = mysqli_query($conn ,$query1);

                if(mysqli_num_rows($query_run1) > 0)
            {
              while($row1 = mysqli_fetch_assoc($query_run1))
              {
                ?>
        <tr>
        <td><?php echo $row1['C_Name']; ?></td>
            <?php }
            }
            ?>

            <td hidden><?php echo $row['Travel_ID']; ?></td>
            <td><?php echo $row['T_Name']; ?></td>
            <td><?php echo $row['T_Locations']; ?></td>
            
            <td><?php echo $row['T_Start_Date']; ?></td>
            <td><?php echo $row['T_End_Date']; ?></td>

            <?php 
                $db_date = $row['T_Start_Date'];
                $date1 = strtotime($db_date);

                $cut_date = $row['T_End_Date'];
                $date2 = strtotime($cut_date);

                $closing = $date2 - $date1;

                $date3 = $closing / (60*60*24);
            ?>
            <td><?php echo $date3 ?> days</td>

            

            <?php


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

                        $booking_full = '3';
                        $total = $book1 + $book2;
                        $book3 = $row['Available_Seat'];
                        $seats =($book3 - $total);
                    if($book3 > $total)
                    {
                        $seats1 = "Available for $seats";
                    }else
                      {
                      $seats1 = "No Seat Available for any";
                      $query3 = "UPDATE package SET Status='$booking_full' WHERE Travel_ID = {$row['Travel_ID']}";// update package status
                      mysqli_query($conn ,$query3);
                      
                      }
                  ?>

            <td><?php echo $seats1 ?> Persons</td>

            <?php 
                $booking_expired = '4';
                $db_date = $row['T_Start_Date'];
                date_default_timezone_set('Asia/Colombo');
                $date1 = date('Y-m-d',strtotime($db_date.'-7 days'));
                $date2 = date('Y-m-d');

                if($date1 < $date2)
                {
                  $date4 = "Booking Date is Expired Now";
                  $query4 = "UPDATE package SET Status='$booking_expired' WHERE Travel_ID = {$row['Travel_ID']}";// update package status
                  mysqli_query($conn ,$query4);
                }else
                $date4 = $date1;

            ?>
            <td><span><?php echo $date4 ?></span> </td>


            <td><?php echo $row['T_Adult_Cost']; ?></td>
            <td>
            
              <a href="selectpackage.php?id=<?php echo $row['Travel_ID']; ?>">
              <button type="submit" name="more_btn" class="btn btn-success more" id="more_btn" style="background-color: green;">Info</button>
              </a>
              
            </td>
            
          </tr>

          <?php
              }
            }
            else {
              ?>
              <tr>
                <td>
                  <?php  echo "No Record Found"; ?>
                </td>
              </tr>
             
              <?php
            }
          ?>

        </tbody>
        </table>
        </div>
    </div>
</section>

<style>
    table{
        background-color: white;
        
    }
    th{
        background-color: white;
    }
    th ,td{
        font-size: 12px;
        text-align: center;
    }
    td span{
        color: #e24040fb;
        font-weight: bolder;
    }
    tr:hover{
        background-color:  #75777a6e;
        color: black;
    }
    .more{
        font-size: 12px;
    }
</style>