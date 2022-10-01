// Enquiry Send
$(document).ready(function()
{
$('#enquiry_form').submit(function(event){
    event.preventDefault();

    var name = $('#enquiry_name').val();
    var email = $('#enquiry_email').val();
    var subject = $('#enquiry_subject').val();
    var msg = $('#enquiry_msg').val();

    if(name == '')
    {
        swal('Opps...Filling the blanks','Please Enter Your Name','info');
        return false;
    }else
    if(email == '')
    {
        swal('Opps...Filling the blanks','Please Enter Your Email','info');
        return false;
    }else
    if(subject == '')
    {
        swal('Opps...Filling the blanks','Please Enter Subject','info');
        return false;
    }else
    if(msg == '')
    {
        swal('Opps...Filling the blanks','Please Enter Massage','info');
        return false;
    }
    else{
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data)
            {
                if(data == 'Sent')
                {
                    swal('Successfull','Your Enquiry Sent Now','success');
                    $('#enquiry_form')[0].reset();
                }else
                if(data == 'Not_Sent')
                {
                    swal('Somthing Went Wrong','Please Contact Yo-travel Hotline','error');
                }
            }
        })
    }

    });
// Chat-bot Icon
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
          $('.chat-bot').fadeIn('slow');
        } else {
          $('.chat-bot').fadeOut('slow');
    
        }
      });

      $('#chat_bot').click(function() {
        $('#chat_bot_modal').modal('show');
        
      });
// =====================================================================================================
//                                          USER LOGIN
// =====================================================================================================
      $('.login_button').click(function() {
        $('#login').modal('show');
        
      });

  // Sacan QR Code & Login
    $('#login_qr').click(function() {
      $('#login').modal('hide');
      $('#login_qr_modal').modal('show');
      
      let scanner = new Instascan.Scanner({ video: document.getElementById('login_qr_preview')});
      Instascan.Camera.getCameras().then(function(cameras){
          if(cameras.length > 0 ){
              scanner.start(cameras[0]);
          } else{
              alert('No cameras found'); // If device not have camera, popup error message
          }

      }).catch(function(e) {
          console.error(e);
      });

      scanner.addListener('scan',function (c){ // Read QR Code
        
        $('#qr_email').val(c); // QR values add in to text box
       
          $('#login_with_qr').submit(); // submit login forms
      });
    });

// =====================================================================================================
//                                          CREATE NEW ACCOUNT
// =====================================================================================================
      $('#new_account').click(function() {
        $('#login').modal('hide');
        $('#register_now').modal('show');
        
      });

      $('#have_account').click(function() {
        $('#register_now').modal('hide');
        $('#login').modal('show');
        
      });

      $('#register_form').submit(function(event){
        event.preventDefault();

        var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email = $('#email_address').val();
        var name = $('#name').val();
        var uname = $('#uname').val();
        var address = $('#address').val();
        var cnumber = $('#cnumber').val();
        var age = $('#age').val();
        var password = $('#regi_password').val();
        var re_password = $('#re_password').val();
        $('#action').val('new_user_register');

        if(name == ''){
          swal('Fill in the blank','Please Enter Your Name','info');
          $('#register_now').modal('hide');
          return false;
        }else
        if(uname == ''){
          swal('Fill in the blank','Please Enter User Name','info');
          $('#register_now').modal('hide');
          return false;
        }else
        if(address == ''){
          swal('Fill in the blank','Please Enter Your Address','info');
          $('#register_now').modal('hide');
          return false;
        }else
        if(cnumber == ''){
          swal('Fill in the blank','Please Enter Your Contact Number','info');
          $('#register_now').modal('hide');
          return false;
        }else
        if(cnumber.length !=10){
          swal('Invalid Contact Number','Please Check Your Contact Number','error');
          $('#register_now').modal('hide');
          return false;
           }else
        if(age == ''){
          swal('Fill in the blank','Please Enter Your Age','info');
          $('#register_now').modal('hide');
          return false;
        }else
        if(password == ''){
          swal('Fill in the blank','Please Enter Password','info');
          $('#register_now').modal('hide');
          return false;
        }else
        if(re_password == ''){
          swal('Fill in the blank','Please Enter Confirm Password','info');
          $('#register_now').modal('hide');
          return false;
        }else
        if(password !== re_password){
          swal('Opps...','Confirm Password Not Match','info');
          $('#register_now').modal('hide');
          return false;
        }else
        if(!(email_filter.test(email))){
           $('#register_now').modal('hide');
          swal('Email Not Valid','Please Enter Valid Email Address','error');
          return false;
        }else{
        $.ajax({
          url:"signup_check.php",
          method:"POST",
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            
            if(data == 'email'){
              swal('Opps..','This Email Address Already Exiest Please Enter New Email','info');
              $('#register_now').modal('hide');
            }else
            if(data == 'success'){
              // swal('Success..','Your Account Has Been Created Now','success');
              $('#register_now').modal('hide');
              email_send();
            }else
            if(data == 'error'){
              swal('Somthing Went Wrong..','Please Contact Our hotline','error');
              $('#register_now').modal('hide');
            }
              
          }
          })
        }
      });
      
      function email_send()
      {
        var email = $('#email_address').val();
        var name = $('#name').val();
        var password = $('#regi_password').val();

        var action = "email_send";

        $.ajax({
          url:"signup_check.php",
          method:"POST",
          data:{action:action, email:email, name:name, password:password},
          success:function(data)
          {
            
              swal('Your Account Has Been Created Now','Check Your E-mail, We Sent Your QR Code','success');
              $('#register_now')[0].reset();

            
          }
      })
      }


    });