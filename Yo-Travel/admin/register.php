<?php 
    include ('includes/check_login.php'); 
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    ?>
     <!-- Begin Page Content -->
     <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create New Admin Account</h1>
    
</div>
               
<!-- Registion Box -->
  <section id="popup">
  <form action="signup-check.php" method="post">
    <div class="bg-modal">
          <div class = "login-box1">
          
              
              <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
              <?php } ?>

              <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
              <?php } ?>

              <div class = "textbox1">
                  <i class="icofont-user"></i>
                  <?php if (isset($_GET['name'])) { ?>
                    
                  <input type="text" placeholder = "Name" name = "name" id ="name" value="<?php echo $_GET['name']; ?>" ><br>

                  <?php }else{ ?>
                  <input type="text" 
                      name="name" 
                      placeholder="Name" required><br>
                    <?php }?>
                </div>

              <div class = "textbox1">
                  <i class="icofont-user"></i>
                  <?php if (isset($_GET['cnumber'])) { ?>
                  <input type="text" placeholder = "Contact Number" name = "cnumber" id ="cnumber"  value="<?php echo $_GET['cnumber']; ?>" ><br>

                  <?php }else{ ?>
                  <input type="text" 
                      name="cnumber" 
                      placeholder="Contact Number" required><br>
                    <?php }?>
              </div>

              

              <div class = "textbox1">
                  <i class="icofont-user"></i>
                  <?php if (isset($_GET['email_address'])) { ?>
                  <input type="text" placeholder = "E-mail" name = "email_address" id ="email_address"  value="<?php echo $_GET['email_address']; ?>"><br>

                  <?php }else{ ?>
                  <input type="text" 
                      name="email_address" 
                      placeholder="E-mail" required><br>
                    <?php }?>
              </div>
              

              <div class = "textbox1">
                  <i class="icofont-lock"></i>
                  <input type="Password" placeholder = "Password" name = "password" required  id ="password" >
              </div>
              <div class = "textbox1">
                  <i class="icofont-lock"></i>
                  <input type="Password" placeholder = "Re-Type Password" name = "re_password" required  id ="re_password" >
              </div>
              <input class = "btn1" type="submit" name = "create" value = "Create Now" id ="register">
              
          </div>
    </div>
    </form>   
  </section>
  <div>
  <?php
    if(isset($_POST['Create'])){
      echo 'submited';
    }
  ?>
  </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

  <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    ?>