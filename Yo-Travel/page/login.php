   <!-- Login Box -->
   <section id="popup">
  <form action="login.php" method="post">
    <div class="bg-modal">
          <div class = "login-box">
          <div class="close"><a id = "close"><i class="icofont-close"></i></a></div>
              <h1>Login</h1>
              

              <div class = "textbox">
                  <i class="icofont-user"></i>
                  <input type="text" name="uname" placeholder="E-mail" required><br>
              </div>

              <div class = "textbox">
                  <i class="icofont-lock"></i>
                  <input type="password" name="password" placeholder="Password" required><br>
              </div>
              <input class = "btn" type="submit" name = "" value = "Login" id = "button3">
              
              <a href="password_reset.php"><button type="button">If Your Password Froget! Click Here</button></a>
              <div>
              
                  <input class = "btn" type="button"  value = "Create an account" href="#" id = "button2" onclick="toggle()">
              </div>
          </div>
    </div>
    </form>  
  </section>
<!-- Login Box End -->

<!-- Registion Box -->
  <section id="popup">
  <form action="signup-check.php" method="post">
    <div class="bg-modal">
          <div class = "login-box1">
          <div class="close"><a id = "close1"><i class="icofont-close"></i></a></div>
              <h1>Create An Account</h1>
              <p>Fill up the form with correct value</p>

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
                  <?php if (isset($_GET['uname'])) { ?>
                  <input type="text" placeholder = "User Name" name = "uname" id ="uname" value="<?php echo $_GET['uname']; ?>" ><br>

                  <?php }else{ ?>
                  <input type="text" 
                      name="uname" 
                      placeholder="User Name" required><br>
                    <?php }?>
                </div>

              <div class = "textbox1">
                  <i class="icofont-user"></i>
                  <?php if (isset($_GET['address'])) { ?>
                  <input type="text" placeholder = "Address" name = "address" id ="address"  value="<?php echo $_GET['address']; ?>" ><br>

                  <?php }else{ ?>
                  <input type="text" 
                      name="address" 
                      placeholder="Address" required><br>
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
                  <?php if (isset($_GET['age'])) { ?>
                  <input type="text" placeholder = "Age" name = "age" id ="age"  value="<?php echo $_GET['age']; ?>" ><br>

                  <?php }else{ ?>
                  <input type="text" 
                      name="age" 
                      placeholder="Age" required><br>
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
              <div>
              
                  <input class = "btn1" type="button" name = "" value = "Allready have account" id = "button4" href="#" onclick="toggle()">
                  <!-- <input class = "btn" type="button"  value = "Create an account" href="#" id = "button2" onclick="toggle()"> -->
              </div>
          </div>
    </div>
    </form>   
  </section>

  <?php
    if(isset($_POST['Create'])){
      echo 'submited';
    }
  ?>
