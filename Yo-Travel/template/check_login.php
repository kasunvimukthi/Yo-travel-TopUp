<?php
session_start();
if (isset($_SESSION['User_ID']) && isset($_SESSION['User_Name'])) {

    $uname = $_SESSION['User_Name'];
    $name = $_SESSION['Name'];
    $uid = $_SESSION['User_ID'];
    $age = $_SESSION['Age'];
    $address = $_SESSION['Address'];
    $email = $_SESSION['Email_Address'];
    $phone = $_SESSION['Phone_Number'];

}else{

header("location:../guest/index.php");

}

?>