<?php 
    session_start(); 
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    ?>
      <!-- Begin Page Content -->
      <div class="container-fluid">


    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Package Overview
        <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#exampleModal">Launch</button></h6>
    </div>
    </div>
      </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p id="message"></p>
        <form>
            <input type="text" class="form-control my-2" placeholder="username" id="name">
            <input type="text" class="form-control my-2" placeholder="email" id="email">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="Close">Close</button>
        <button type="button" class="btn btn-primary" id="New">Save</button>
      </div>
    </div>
  </div>
</div>

<?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
  
    ?>