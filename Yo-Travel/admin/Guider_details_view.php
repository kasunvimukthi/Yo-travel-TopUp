<?php 
    include ('includes/check_login.php');
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    require 'db_conn.php';
    ?>
    <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Guider Details
            <button  name="GuiderAdd" class="btn btn-primary"data-toggle="modal" id="GuiderAdd">Add New</button></h6>
          </div>
        <div class="card-body" id="guider_data"  style="height: 75vh; overflow-y: scroll;">
       
        </div>
      </div>
    </div>
  <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
  
    ?>