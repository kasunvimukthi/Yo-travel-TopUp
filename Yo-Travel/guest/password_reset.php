<?php

  include ('template/header.php');
?>

<div style=" margin-top: 0; padding: 0; height: 100vh; display: flex;" class="liner_colour_black"> 
<div class="container mt-5" style="padding-top: 50px;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-12">Reset Password</h1>
                                        
                                    </div>
                                    <form action="password_reset_code.php" method="post">
                                        <div class="form-group pt-4">

                                            <label for="">E-mail address</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Enter Email Address..." required title="E-mail">
                                        </div>
                                       

                                        <input class = "btn btn-primary btn-user btn-block" type="submit" name = "password_reset_code_button" value = "Send Verification Code" id = "button3" title="Send">
                                        </div>
                                        
                                        
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
    <?php
    // include login.php file

  include ('template/footer.php');

    // Chat-Bot
    include ('modal.php');
?>
 <?php
      if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
          ?>
        
        <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Done!",
            });
        </script>
        <?php
        unset($_SESSION['status']);
      }

    ?>