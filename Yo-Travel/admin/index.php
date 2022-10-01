<?php
session_start(); 
  include "db_conn.php";
  
  include ('includes/header.php');
?>

<link rel="stylesheet" href="../icofont.css">


<div class="container">

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
                                    <h2 class="icofont-user"></h2>
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        
                                    </div>
                                    <form action="../admin/includes/login.php" method="post">
                                        <div class="form-group">

                                        
                                            <input type="email" name="uname" class="form-control form-control-user" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            
                                        </div>

                                        <input class = "btn btn-primary btn-user btn-block" type="submit" name = "" value = "Login" id = "button3">
                                        <div class="text-center">
                                            <label>Login with </label>
                                            <button id="login_qr" name="login_qr" class="btn login_qr" type="button" style="color: orange;">QR Code</button>  
                                        </div>
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


    <?php 
    include ('includes/script.php');
    include ('includes/modal.php');
    include ('includes/footer.php');
    
    ?>
