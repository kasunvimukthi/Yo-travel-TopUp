<?php
namespace Phppot;


class Order
{


    function getPdfGenerateValues($id)
    {

        include "db_conn.php";
        $query = "SELECT *FROM `invoice` WHERE `Invoice_Number` = '" . $id . "'";
        $result2 = mysqli_query($conn, $query);
        
        while($result = mysqli_fetch_assoc($result2)) 

        return $result;
    }


}
