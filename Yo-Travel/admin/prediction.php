<?php 
    include ('includes/check_login.php');
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    ?>
    <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Number of travelers preiction for next month</h6>
          </div>
        <div class="card-body" id="prediction"  style="height: 75vh; overflow-y: scroll;">
        
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-body" id="prediction_chart"  style="height: 75vh; overflow: hidden;">
        <canvas id="prediction_chart1"></canvas>
        </div>
      </div>
    </div>
  <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
  
    ?>