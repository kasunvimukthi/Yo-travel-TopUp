<?php 
    
    include "db_conn.php";
    include ('includes/check_login.php');
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    ?>

        

                <!-- Begin Page Content -->
                <div class="container-fluid" style="height: 89vh; overflow-y: scroll; margin-top: -23px;">

                   

                    <!-- Content Row -->
                    <div class="row mt-2">

                        <!-- Earnings (Monthly) Card Example -->
                        <a href="admin_view.php"> <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $query="SELECT A_ID FROM admin ORDER BY A_ID";
                                                $query_run = mysqli_query($conn, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo $row;

                                            ?>
                                            
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                    <a href="category.php">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Number of Category</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                $query="SELECT C_name FROM catogory ORDER BY C_ID";
                                                $query_run = mysqli_query($conn, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo $row;

                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-listine-dots fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                    

                        <!-- Earnings (Monthly) Card Example -->
                    <a href="package_overview.php">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Packages
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        $query="SELECT Travel_ID FROM package";
                                                        $query_run = mysqli_query($conn, $query);
                                                        $row = mysqli_num_rows($query_run);

                                                        $total =  $row;
                                                        

                                                        $query1="SELECT Travel_ID FROM package WHERE Status = 1";
                                                        $query_run1 = mysqli_query($conn, $query1);
                                                        $row1 = mysqli_num_rows($query_run1);

                                                        $active =  $row1;
                                                        
                                                        echo $active ?>/<?php echo $total;

                                                        $query2 = "UPDATE package_status SET No_of_Package='$active' WHERE Status = 'Active'";
                                                        $query_run2 = mysqli_query($conn ,$query2);
                                                    ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-listing-number fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                    

                    <a href="package_overview.php">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Process Packages
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        $query="SELECT Travel_ID FROM package";
                                                        $query_run = mysqli_query($conn, $query);
                                                        $row = mysqli_num_rows($query_run);

                                                        $total =  $row;
                                                        

                                                        $query1="SELECT Travel_ID FROM package WHERE Status = 2";
                                                        $query_run1 = mysqli_query($conn, $query1);
                                                        $row1 = mysqli_num_rows($query_run1);

                                                        $active =  $row1;
                                                        
                                                        echo $active ?>/<?php echo $total;

                                                        $query2 = "UPDATE package_status SET No_of_Package='$active' WHERE Status = 'Process'";
                                                        $query_run2 = mysqli_query($conn ,$query2);
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-listing-number fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                    

                    <a href="package_overview.php">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dactive Packages
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        $query="SELECT Travel_ID FROM package";
                                                        $query_run = mysqli_query($conn, $query);
                                                        $row = mysqli_num_rows($query_run);

                                                        $total =  $row;
                                                        

                                                        $query1="SELECT Travel_ID FROM package WHERE Status = 0";
                                                        $query_run1 = mysqli_query($conn, $query1);
                                                        $row1 = mysqli_num_rows($query_run1);

                                                        $active =  $row1;
                                                        
                                                        echo $active ?>/<?php echo $total;

                                                        $query2 = "UPDATE package_status SET No_of_Package='$active' WHERE Status = 'De-active'";
                                                        $query_run2 = mysqli_query($conn ,$query2);
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-listing-number fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                    

                    <a href="package_overview.php">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Booking Packages 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        $query="SELECT Travel_ID FROM package";
                                                        $query_run = mysqli_query($conn, $query);
                                                        $row = mysqli_num_rows($query_run);

                                                        $total =  $row;
                                                        

                                                        $query1="SELECT Travel_ID FROM package WHERE Status = 3";
                                                        $query_run1 = mysqli_query($conn, $query1);
                                                        $row1 = mysqli_num_rows($query_run1);

                                                        $active =  $row1;
                                                        
                                                        echo $active ?>/<?php echo $total;

                                                        $query2 = "UPDATE package_status SET No_of_Package='$active' WHERE Status = 'Package Booking Full'";
                                                        $query_run2 = mysqli_query($conn ,$query2);
                                                    ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="icofont-address-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                    

                    <a href="package_overview.php">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Cut of Date Expired Packages 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                        $query="SELECT Travel_ID FROM package";
                                                        $query_run = mysqli_query($conn, $query);
                                                        $row = mysqli_num_rows($query_run);

                                                        $total =  $row;
                                                        

                                                        $query1="SELECT Travel_ID FROM package WHERE Status = 4";
                                                        $query_run1 = mysqli_query($conn, $query1);
                                                        $row1 = mysqli_num_rows($query_run1);

                                                        $active =  $row1;
                                                        
                                                        echo $active ?>/<?php echo $total;

                                                        $query2 = "UPDATE package_status SET No_of_Package='$active' WHERE Status = 'Expired Packages'";
                                                        $query_run2 = mysqli_query($conn ,$query2);
                                                    ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        
                                            <i class="icofont-exclamation-tringle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        </div>
                    

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Messages</div>
                                                <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php
                                                        $query="SELECT ID FROM enquiry WHERE Status = 2";
                                                        $query_run = mysqli_query($conn, $query);
                                                        $row = mysqli_num_rows($query_run);

                                                        $total =  $row;
                                                        echo $total;

                                                    ?>
                                                    
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!-- Area Chart -->
                            <div class="col-xl-8 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top Travel Package</h6>

                                    
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="graphCanvas"></canvas>
                                    </div>
                                    <hr>
                                    * This Bar chart shows travel packages that have been booked by many people.
                                </div>
                            </div>
                            </div>
                                                   <!-- Donut Chart -->
                        <div class="col-xl-4 ">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Status of Travel Packages</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myDonutChart"></canvas>
                                    </div>
                                    <div class="pt-3">
                                    <hr>
                                    * This Donut chart shows the status of travel packages.
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!-- Profit Loss Chart -->
                            <div class="col-xl-12 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Income Chart
                                    | From <input type="date" class=" bg-white border-0 small" id="income_from_date" name="income_from_date" value="2022-01-01">
                                        To <input type="date" class=" bg-white border-0 small" id="income_to_date" name="income_to_date" value="2022-12-31">
                                        <button class=" btn-primary small income_search" type="button" id="income_search" name="income_search">
                                        <i class="fas fa-search fa-sm"></i>
                                        </button></h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" id="chart">
                                        <canvas id="profit_loss"></canvas>
                                    </div>
                                    <hr>
                                    * This Line chart shows total income by each date.
                                </div>
                            </div>
                            </div>

                            <!-- Event Table -->
                            <div class="col-xl-12 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Events</h6>
                                </div>
                                <div class="card-body">
                                    <div  id="event_table">
                                    
                            </div>
                            </div>
                    </div>

                    <!-- Content Row -->

                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



    <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
    ?>