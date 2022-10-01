<?php
session_start();
if (isset($_SESSION['A_ID']) && isset($_SESSION['A_Name'])) {

    $Aname = $_SESSION['A_Name'];
    $Aemail = $_SESSION['A_Email'];
    $Aid = $_SESSION['A_ID'];
    $Anumber = $_SESSION['A_Number'];
    $Aststus = $_SESSION['A_Status'];

}else{

header("location:../admin");

}

?>