<?php 
    include ('includes/check_login.php');
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    ?>

    <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Vehicles Register for Tracking
            <button class="btn btn-primary" id="vehicle_new">Add New</button></h6>
           
          </div>
        <div class="card-body" id="vehicles_data" style="height: 70vh; overflow-y: scroll;">
          
        </div>
      </div>
    </div>

  <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
  
    ?>