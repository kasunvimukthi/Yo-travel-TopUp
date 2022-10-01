<?php
include "./includes/check_login.php";


function invoice($result)
    {
        ob_start();

    include "db_conn.php";
    $query = "SELECT *FROM `invoice` WHERE User_ID = {$_SESSION["User_ID"]} ORDER BY Invoice_Number desc LIMIT 1";
    $result2 = mysqli_query($conn, $query);

    while($result=mysqli_fetch_array($result2))
    {
        
 ?>

 <div style="font-size: 26px;color: #666; line-height: 3;">INVOICE</div>
    
    <table style="line-height: 1.5; font-size: 12px;">
        <tr>
            <td style="font-weight: bold;">Yo-travel(PVT)Ltd</td>
            <td>Reciver : Mrs/Ms. <?php echo $_SESSION["Name"]; ?></td>
        </tr>
        <tr>
            <td>Mobile : 076 575 6616</td>
            <td>E-mail : <?php echo $_SESSION["Email_Address"]; ?></td>
        </tr>
        <tr>
            <td>Address : 267/2,</td>
        </tr>
        <tr>
            <td>Ihala biyanwila, Kadawatha</td>
        </tr>
    </table>

    <div></div>

    <?php
        include "db_conn.php";
                    
      $sql = "SELECT * FROM `package` WHERE `Travel_ID` = {$result['T_ID']}"; 
      $result1 = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result1) > 0){
        while($row = mysqli_fetch_assoc($result1))
  
                              
               {
      ?>
    <table style="line-height: 1.5; font-size: 12px;">
        <tr>
            <td>Invoice No : #<?php echo $result["Invoice_Number"]; ?></td>
            <td>Payment Type : <?php echo $result["P_type"]; ?></td>
        </tr>
        <tr>
            <td>Invoice Date : <?php echo $result["I_Date"]; ?></td>
            <td>Status : <?php echo $result["Status"]; ?></td>
        </tr>
        <tr>
            <td>Package Name : <?php echo $row["T_Name"]; ?></td>
        </tr>
    <div></div>

        <tr>
            <td>Start Date : <?php echo $result["T_start_date"]; ?></td>

        </tr>
        <tr>
            <td>End Date   : <?php echo $result["T_end_date"]; ?></td>

        </tr>
    </table>

    <?php 
        }
    }
    ?>

    <div style="border-bottom-style: groove;"></div>
<div></div>
    <table style="line-height: 1.5; font-size: 12px;  ">
        <thead>
            <tr style="font-weight: bold; background-color: lightblue;">
                <th width="250px" >Description</th>
                <th width="100px" style="text-align: center; ">Quntity</th>
                <th width="150px" style="text-align: center; ">Cost for One Child / Adult</th>
                <th width="125px" style="text-align: center; ">Total Cost (Rs.)</th>

                <!-- <th>Number of Adults</th>
                <th>Number of Child</th>
                <th>Cost for One Person</th>
                <th>Sub Total</th> -->
            </tr>

        </thead>
        <tbody>
            <tr style="background-color: lightgrey;">
            <td width="250px" >Number of Child</td>
            

                <td width="100px" style="text-align: right; text-align: center; "><?php echo $result["U_children"]; ?></td>
                <td width="150px" style="text-align: right;"><?php echo $result["U_child_cost"]; ?></td>
                <?php 
                    $child = $result["U_children"];
                    $c_cost = $result["U_child_cost"];
                    $total_child_cost = $child * $c_cost;
                ?>
                <td width="125px" style="text-align: right;"><?php echo $total_child_cost ?>.00</td>
               
            </tr>
            <tr style="background-color: lightgrey;">
                <td>Number of Adults</td>
                <td style="text-align: right; text-align: center; "><?php echo $result["U_adults"]; ?></td>
                <td style="text-align: right;"><?php echo $result["U_adult_cost"]; ?></td>
                <?php 
                    $adult = $result["U_adults"];
                    $a_cost = $result["U_adult_cost"];
                    $total_adult_cost = $adult * $a_cost;
                ?>
                <td width="125px" style="text-align: right;"><?php echo $total_adult_cost ?>.00</td>

            </tr>
            <tr style="font-size: 13px; background-color: lightblue;">
                <td style=" text-align: center; font-weight: bold;" width="500px">Sub Total</td>
                <?php 
                    $sub_total = $total_child_cost + $total_adult_cost;
                ?>
                <td style=" text-align: right;" width="125px"><?php echo $sub_total ?>.00</td>

            </tr>
        </tbody>
    </table>
    <h4>Request</h4>
    <?php 
    $request = $result["Request"];
        if ($request == '')
        {?>
            <p>* No Request</p>
            <?php
        }else
        {
            ?>
            <p>* <?php echo $request ?></p>
            <?php
        }
    ?>
    
    <div></div>

    <div style="border-bottom-style: groove;"></div>

    <h4>Terms and Coditions</h4>

    <style>
        p{
            font-size: 12px;
        }
    </style>
        <p>* If Package Start After 10 Days, You Can't Recovery Your Money.</p>
        <p>* If Package Start After 10 Days, You Can't Recovery Your Money.</p>
        <p>* If Package Start After 10 Days, You Can't Recovery Your Money.</p>


<?php
    }
return ob_get_clean();
    }
    ?>
