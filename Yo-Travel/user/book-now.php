<?php
    include "db_conn.php";

    if(isset($_POST['Pay'])) {
        $uid = $_POST['u_id'];
         $t_code = $_POST['t_code'];
         $i_date = date("Y-m-d");
         $status = ("pending");
         $t_childern = $_POST['t_childern'];
         $t_adults = $_POST['t_adults'];
         $p_type = $_POST['p_type'];
         $t_cost = $_POST['t_cost'];
         $reqest = $_POST['reqest'];

         $sql2 = "INSERT INTO invoice(User_ID, T_ID, I_Date, U_children, U_adults, P_type, T_Cost, Request, Status) 
               VALUES('$uid','$t_code','$i_date','$t_childern','$t_adults','$p_type','$t_cost','$reqest','$status')";
               $result2 = mysqli_query($conn, $sql2);
               if ($result2) {
                    header("Location: index.php?success=You book travel package Successfull");
                 exit();
               }else {
                       header("Location: index.php?error=unknown error occurred");
                    exit();
               }
    }

   
?>