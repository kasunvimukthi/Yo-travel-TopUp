
<?php
    // Include DB
    include "db_conn.php";

    // include header.php file
    include ('template/header.php');

    require_once ("template/modal1.php");
?>
<!-- ================================== CSS Style =============================================================-->
    <link href="style.css" rel='stylesheet' type='text/css' />

<!-- =============================================================================================================
                                        Userprofile.php - Body
===============================================================================================================-->
    <section id="userprofile">
        <div class="body">
            <div class="u_body">
                <div class="col1">


                    <button id="" title="Edit My Account" class="user_edit" data-toggle="modal" >
                        <i class="icofont-edit"></i>
                        <h1>Edit My Account</h1>
                    </button>

                    <button id="" title="Delete My Account" class="user_delete" data-toggle="modal" >
                        <i class="icofont-ui-delete"></i>
                        <h1>Delete My Account</h1>
                    </button>

                    <button id="" title="My Invoice" class="user_invoice" data-toggle="modal" >
                        <i class="icofont-list"></i>
                        <h1>My Invoice List</h1>
                    </button>

                    <button id="" title="Password Change" class="user_password" data-toggle="modal" >
                        <i class="icofont-ui-password"></i>
                        <h1>Change Password</h1>
                    </button>

                    <!-- <?php 
                            $uid = $_SESSION['User_ID'];
                            $to_day = date('Y-m-d');

                            $query = "SELECT * FROM invoice WHERE User_ID='$uid' && T_end_date > $to_day && T_start_date < '$to_day'";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($result)){
                                    ?><button id="" title="GPS Tracking" class="user_tracking" data-toggle="modal" >
                                    <i class="icofont-location-pin"></i>
                                        <h1>Tracking</h1>
                                    </button><?php
                                }}
                    ?>  -->
                    

                </div>
            </div>
        </div>
    </section>

    
<?php        

    // include slider.php file
    include ('../template/slider.php');

        // include contact.php file
        include ('../template/contact1.php');

    // include footer.php file
    include ('template/footer.php');

    // include script.php file
    include ('script.php');

    // modal.php file
    include ('modal.php');
?>
<script src="./includes/myjs.js"></script>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5SUrSd237MKwlLNYbGDfv-FROSRwb6EI&callback=loadMap1"
      async
    ></script>