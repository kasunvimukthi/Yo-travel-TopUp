<?php 
    include ('includes/check_login.php');
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    ?>
    <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chat-Bot Settings
            <button  name="Bot_Add" class="btn btn-primary"data-toggle="modal" id="Bot_Add">Add New</button></h6>
          </div>
        <div class="card-body" id="bot_chat_data" style="height: 70vh; overflow-y: scroll;">
          
        </div>
      </div>
    </div>
  <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
    ?>
    <style>
    
    
    th {
        font-size: 12px;
        text-align: center;
        
    }
    td {
        font-size: 12px;
        
    }
    td span{
        color: #e24040fb;
        font-weight: bolder;
    }
    
</style>