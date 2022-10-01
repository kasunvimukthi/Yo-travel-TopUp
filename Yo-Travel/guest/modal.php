<div class="modal fade" id="chat_bot_modal" tabindex="-1" role="dialog" aria-labelledby="chat_bot_modal" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h2 class="modal-title" id="chat_bot_modal">Yo-travel Chat-Bot <i class="icofont-robot"></i></h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           
          </button>
        </div>
        <div class="modal-body" style="height: 400px;">

            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="icofont-robot"></i>
                    </div>
                    <div class="msg-header">
                        <?php 
                        date_default_timezone_set('Asia/Colombo');
                        $time = date('h:i:s a');
                        ?>
                        <p>Hello there, how can I help you?</p><?php echo $time?>
                    </div>
                </div>
            </div>
            

        </div>
        <form method="POST" enctype="multipart/form-data" id="chat_bot_form">
        <div class="modal-footer">
          <input id="data" type="text" required placeholder="Type Somthing here...." style="width: 80%;">
          <button id="send-btn" type="submit" class="btn btn-primary">Send</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>
        $('#chat_bot_form').submit(function(event){
            event.preventDefault();

            
                var quection = $('#data').val();
                $value = $("#data").val();
                
                $msg = '<div class="user-inbox inbox"><div class="msg-header right"><p>'+ $value +'</p><?php echo $time?></div><div class="icon"><i class="icofont-user"></i></div>';
                $(".form").append($msg);
                $("#data").val('');
                var action = "Chat_Bot";
                
                
                // start ajax code
                $.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: {text:$value,action:action},
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="icofont-robot"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            
            
        });
    </script>

    <style>
    .form{
        padding: 20px 15px;
        min-height: 380px;
        max-height: 380px;
        overflow-y: auto;
    }
    .form .inbox{
        width: 100%;
        display: flex;  
    }
    .form .user-inbox{
        justify-content: flex-end;
        margin: 13px 0;
    }
    .form .inbox .icon{
        height: 40px;
        width: 40px;
        padding-top: 10px;
        color: #fff;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        font-size: 18px;
        background: #007bff;
    }
    .form .inbox .msg-header{
        max-width: 53%;
        margin-left: 10px;
    }
    .form .inbox .msg-header p{
        color: #fff;
        background: #007bff;
        border-radius: 10px;
        padding: 8px 10px;
        font-size: 14px;
        word-break: break-all;
    }
    .form .user-inbox .msg-header p{
        color: #333;
        background: #efefef;
    }
    .right{
        margin-right: 10px;
    }
    </style>

<!-- ===============================================================================================
                                          LOGIN MODAL
================================================================================================ -->
 <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login">User Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
      <form action="login.php" method="post">
      <div class="form-group">
        <label>User Email</label>
        <input type="email" name="login_email" id="login_email" value="" class="form-control" placeholder="Enter Your E-mail Address" required>
      </div>
      
      <div class="form-group">
        <label>User Password</label>
        <input type="password" name="password" id="password" value="" class="form-control" placeholder="Enter Your Password" required>
      </div>

      <div class="form-group text-right small">
      <label>If Your Password Froget! </label>
        <a href="password_reset.php">Click Here</a>
        
        </div>

        <div class="form-group text-center">
      <button id="button3" type="submit" class="btn btn-success col-md-10"  name="button3">Login</button>
      </div>

      <div class="form-group text-center">
        </form>
        <label>Login with </label>
        <button id="login_qr" name="login_qr" class="btn login_qr" type="button" style="color: orange;">QR Code</button>  
      </div>

      <div class="form-group text-center">
        </form>
        <label>If You want to creat new account </label>
        <button id="new_account" name="new_account" class="btn new_account" type="button" style="color: orange;">Click Here</button>  
      </div>
      

      

      
      
        
      </div>
      </div>
  </div>
  </div>

<!-- ===============================================================================================
                                          QR LOGIN MODAL
================================================================================================ -->
<div class="modal fade" id="login_qr_modal" tabindex="-1" role="dialog" aria-labelledby="login_qr_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login_qr_modal">User Login with QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <video id="login_qr_preview" width="100%"></video>
  
        </div>
        <form action="login_with_qr.php" method="post" id="login_with_qr">
              
            <input type="hidden" name="qr_email" id="qr_email" readonly placeholder="scan qrcode" class="form-control">
          
        </form>
      </div>
      </div>
  </div>
  </div>
  <!-- ===============================================================================================
                                          REGISTER MODAL
================================================================================================ -->
<div class="modal fade" id="register_now" tabindex="-1" role="dialog" aria-labelledby="register_now" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register_now">Create New Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
         
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" id="register_form">

        <input type="hidden" name="action" id="action" value="new_user_register">
            <div class="form-group">
            <label>Your Name</label>
            <input type="text" name="name" id="name" value="" class="form-control" placeholder="Enter Your Name">
            </div>

            <div class="form-group">
            <label>User Name</label>
            <input type="text" name="uname" id="uname" value="" class="form-control" placeholder="Enter Your User Name" >
            </div>

            <div class="form-group">
            <label>Your Address</label>
            <input type="address" name="address" id="address" value="" class="form-control" placeholder="Enter Your Address" >
            </div>

            <div class="form-group">
            <label>Your Contact Number</label>
            <input type="number" name="cnumber" id="cnumber" value="" class="form-control" placeholder="Enter Your Contact Number" >
            </div>

            <div class="form-group">
            <label>Your Age</label>
            <input type="number" name="age" id="age" value="" class="form-control" placeholder="Enter Your Age" >
            </div>

            <div class="form-group">
            <label>Your E-mail</label>
            <input type="email" name="email_address" id="email_address" value="" class="form-control email_address" placeholder="Enter Your E-mail" >
            </div>

            <div class="form-group">
            <label>Password</label>
            <input type="password" name="regi_password" id="regi_password" value="" class="form-control" placeholder="Enter Password" >
            </div>

            <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="re_password" id="re_password" value="" class="form-control" placeholder="Enter Password Again" >
            </div>

        
      </div>
            <div class="modal-footer">
                <div class="form-group text-center">
                    
                    <button id="create_account" name="create_account" class="btn" type="submit" style="color: green;">Register Now</button>

                    <button id="have_account" name="have_account" class="btn" type="button" style="color: orange;">If You Have Account</button>

                </div>
            </form>
      </div>
  </div>
  </div>
  </div>
