
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: relative;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon ">
                <i class="icofont-travelling"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Yo-Travel <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin || Users || Journey || Guider
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed"  data-toggle="collapse" data-target="#collapseTwo1"
                    aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="fas fa-users-cog"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin Components:</h6>
                        
                        <a class="collapse-item hide" href="admin_view.php">Admin Details</a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed"  data-toggle="collapse" data-target="#user"
                    aria-expanded="true" aria-controls="user">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                </a>
                <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Components:</h6>
                        
                        <a class="collapse-item hide" href="user_view.php">User Details</a>
                        <a class="collapse-item hide" href="user_invoice_view.php">Booking Journey</a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed"  data-toggle="collapse" data-target="#Journey"
                    aria-expanded="true" aria-controls="Journey">
                    <i class="fas fa-road"></i>
                    <span>Journey</span>
                </a>
                <div id="Journey" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Journey List:</h6>
                        
                        <a class="collapse-item hide" href="Journey_list_view.php">Journey List</a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed"  data-toggle="collapse" data-target="#Guider"
                    aria-expanded="true" aria-controls="Guider">
                    <i class="fas fa-road"></i>
                    <span>Guider</span>
                </a>
                <div id="Guider" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Guider List:</h6>
                        
                        <a class="collapse-item hide" href="Guider_details_view.php">Guider Details</a>
                        <a class="collapse-item hide" href="Guider_list_view.php">Guider List</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Travel Package || Category
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed"  data-toggle="collapse" data-target="#Category"
                    aria-expanded="true" aria-controls="Package">
                    <i class="fas fa-align-justify"></i>
                    <span>Category</span>
                </a>
                <div id="Category" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Category Components:</h6>
                        <a class="collapse-item" href="category.php">Category Overview</a>
                        
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#Package"
                    aria-expanded="true" aria-controls="Package">
                    <i class="fas fa-align-left"></i>
                    <span>Package</span>
                </a>
                <div id="Package" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Package Components:</h6>
                        <a class="collapse-item" href="package_overview.php">Package Overview</a>
                        <a class="collapse-item" href="package_itinerary.php">Package Itinerary</a>
                        <a class="collapse-item" href="package_accommodation.php">Package Accommodation</a>
                        <a class="collapse-item" href="package_activities.php">Package Activities</a>  
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <hr class="sidebar-divider">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#Settings"
                    aria-expanded="true" aria-controls="Settings">
                    <i class="fas fa-robot"></i>
                    <span>Other Tools</span>
                </a>
                <div id="Settings" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tools</h6>
                        <!-- <a class="collapse-item" href="vehicle.php">Vehicles Register</a> -->
                        <a class="collapse-item" href="prediction.php">Prediction</a>
                        <a class="collapse-item" href="tracking.php">Tracking</a>
                        <a class="collapse-item" href="chat_bot.php">Chat-Bot Q & A</a>
                        <a class="collapse-item" href="icons.php">Icons</a>
                    </div>
                </div>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

              
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        


        
    
    <script>
        document.getElementById('button2').addEventListener('click',
function(){
    document.querySelector('.login-box1').style.display = 'block';
    
});
    </script>