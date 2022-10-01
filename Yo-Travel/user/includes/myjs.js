$(document).ready(function()
{

    setInterval(function(){
        invoice_status();
        gps();
    },500);
    

    function invoice_status()
    {
        var action = "fetch_invoice_status";
        $.ajax({
            url:"./includes/action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                
            }
        })
    }

    function invoice_send()
    {
        var action = "invoice_send";
        $.ajax({
            url:"./invoice_send.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                
            }
        })
    }
    // ================================================= BOOK-NOW MODAL ============================================
    $(document).on('click', '.book_now_modal', function(){

        
        $('#book_now_modal').modal('show');
    
    });

    $(document).on('click', '.book_error', function(){

        
        swal('Opps....','You Cant Book this Package in this time','info');
    
    });
// =========================== Multiple Adult Cost (Mouse Click) ========================
     $("#adults").mouseup(function(){
        var total = 0;
        var x = Number($("#adults").val());
        var y = Number($("#adult").val());
        var total = x*y;

       $('#total').val(total);
    });
// =========================== Multiple Adult Cost (Keypress) ===========================
    $("#adults").keyup(function(){
        var total = 0;
        var x = Number($("#adults").val());
        var y = Number($("#adult").val());
        var total = x*y;

        $('#total').val(total);
    });
 // =========================== Multiple Children Cost (Mouse Click) ======================
    $("#childs").mouseup(function(){
        var total = 0;
        var x = Number($("#childs").val());
        var y = Number($("#child").val());
        var total = x*y;

        $('#ctotal').val(total);
    });
// =========================== Multiple Children Cost (Keypress) ===========================
    $("#childs").keyup(function(){
        var total = 0;
        var x = Number($("#childs").val());
        var y = Number($("#child").val());
        var total = x*y;

        $('#ctotal').val(total);
    });


// =========================== Count Sub Cost (Mouse Click) ========================
$("#adults").mouseup(function(){
        var total = 0;
        var x = Number($("#total").val());
        var y = Number($("#ctotal").val());
        var total = x+y;

        $('#stotal').val(total);
    });
// =========================== Count Sub Cost (Mouse Click) ========================
    $("#adults").keyup(function(){
        var total = 0;
        var x = Number($("#total").val());
        var y = Number($("#ctotal").val());
        var total = x+y;

        $('#stotal').val(total);
    });
// =========================== Count Sub Cost (Mouse Click) ========================
    $("#childs").mouseup(function(){
        var total = 0;
        var x = Number($("#total").val());
        var y = Number($("#ctotal").val());
        var total = x+y;

        $('#stotal').val(total);
    });
 // =========================== Count Sub Cost (Mouse Click) ========================
    $("#childs").keyup(function(){
        var total = 0;
        var x = Number($("#total").val());
        var y = Number($("#ctotal").val());
        var total = x+y;

        $('#stotal').val(total);
    });    
// ============================= BOOKING SUBMIT =====================================
$('#book_submit').submit(function(event){
    event.preventDefault();
        
    var user_id = $('#uid').val();
    var user_email = $('#email').val();
    var user_address = $('#address').val();
    var pak_code = $('#pcode').val();
    var user_adults = $('#adults').val();
    var user_child = $('#childs').val();
    var available = $('#available').val();
    var total = parseFloat(user_adults)+parseFloat(user_child);

    if(user_id == '')
    {
    swal('Opps...System Error','Please Contact Yo-travel','error');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(user_email == '')
    {
    swal('Fill in the blank','Please Enter Your e-mail','info');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(user_address == '')
    {
    swal('Fill in the blank','Please Enter Your Address','info');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(pak_code == '')
    {
    swal('Opps...System Error','Please Contact Yo-travel','error');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(user_adults == '')
    {
    swal('Fill in the blank','Please Enter Number of Adults','info');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(user_child == '')
    {
    swal('Fill in the blank','Please Enter Number of Child','info');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(user_child == '0' && user_adults == '0')
    {
    swal('Opps....','You Cant Enter Zero Value for Child & Adults','error');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(user_child < '0')
    {
    swal('Opps....','You Cant Enter Negative Value','error');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(user_adults < '0')
    {
    swal('Opps....','You Cant Enter Negative Value','error');
    $('#book_now_modal').modal('hide');
    return false;
    }else
    if(available < total)
    {
    swal('Opps..Out of Booking',total,'error');
    $('#book_now_modal').modal('hide');
    return false;
    }else{

        $.ajax({
            url:"./includes/action.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data)
            {
                // console.log(data);
                if(data = 'change')
                {
                    swal('Greate Job..','This Package You Booked Now','success');
                    $('#book_submit')[0].reset();
                    $('#book_now_modal').modal('hide');
                    invoice_send();
                    $("#head1").load(" #head1");
                    

                }
                else
                if(data = 'not_change')
                {
                    swal('System Error..','Please Contact Our Hot-line','error');
                }
                
            }
            });
        }
    });
// ========================================= User Profile Edit======================================
    $(document).on('click', '.user_edit', function(){

            
        $('#user_edit_modal').modal('show');

    });

    $('#user_edit_form').submit(function(event){
        event.preventDefault();
        var user_age = $('#userage').val();
        var user_address = $('#useraddress').val();
        var user_email = $('#useremail').val();
        var user_number = $('#usernumber').val();
        var user_pass = $('#userpassword').val();
        var user_name = $('#username').val();

        $('#action').val('user_update');
    
        if(user_name == '')
        {
         swal('Opps...Fill in the Blank','Please Enter User Name ','info');
         $('#user_edit_modal').modal('hide');
         return false;
        }
        else 
        if(user_age == '')
        {
         swal('Opps...Fill in the Blank','Please Enter User Age','info');
         $('#user_edit_modal').modal('hide');
         return false;
        }else
        if(user_address == '')
        {
         swal('Opps...Fill in the Blank','Please Enter User Address','info');
         $('#user_edit_modal').modal('hide');
         return false;
        }else
        if(user_email == '')
        {
         swal('Opps...Fill in the Blank','Please Enter User E-mail','info');
         $('#user_edit_modal').modal('hide');
         return false;
        }
        else 
        if(user_number == '')
        {
         swal('Opps...Fill in the Blank','Please Enter User Contact Number','info');
         $('#user_edit_modal').modal('hide');
         return false;
        }else
        if(user_number.length !=10){
            swal('Invalid Contact Number','Please Check Your Contact Number','error');
            $('#register_now').modal('hide');
            return false;
             }else
        if(user_pass == '')
        {
         swal('Opps...Fill in the Blank','Please Enter User Password','info');
         $('#user_edit_modal').modal('hide');
         return false;
        }else
         {
          $.ajax({
           url:"./includes/action.php",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           processData:false,
           success:function(data)
           {if(data == "Updated")
           {
            swal('Greate Job','User Account Has Been Updated Successfully','success');
            
            $('#user_edit_form')[0].reset();
            $('#user_edit_modal').modal('hide');
           }else
           if(data == "NotUpdated")
           {
            swal('Opps...','Unknown Error Occurred','error');
           }else
           if(data == "Password")
           {
            swal('Opps...','User Password Not Match','info');
           }
            
           }
          });
         }
        
       });


// ================================================= USER DELETE ===================================================
       $(document).on('click', '.user_delete', function(){
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Account!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $('#user_delete_modal').modal("show");
                
            } else {
            swal("This User Account is safe!");
            }
        });
    });

    $('#user_delete_form').submit(function(event){
        event.preventDefault();

        var user_password = $('#DuserPassword').val();

        if(user_password == '')
        {
         swal('Opps...Fill in the Blank','Please Enter User Password ','info');
         $('#user_delete_modal').modal("hide");
         return false;
        }else{
            $.ajax({
                url:"./includes/action.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    if (data == "Deleted")
                    {
                        swal('Greate Job..','User Account Deleted Now','success');
                        
                        $('#user_delete_form')[0].reset();
                        $('#user_delete_modal').modal("hide");
                    }else
                    if (data == "NotDelete")
                    {
                        swal('Opps..','User Account Not Delete','info');
                        $('#user_delete_modal').modal("hide");
                    }else
                    if (data == "Password")
                    {
                        swal('Opps..','User Account Password Not Match','error');
                        $('#user_delete_modal').modal("hide");
                    }
                 
                }
               });
        }
    });
// ========================================= User Invoice ======================================
    $(document).on('click', '.user_invoice', function(){

            
    $('#user_invoice_modal').modal('show');

    });
// ========================================= User Password Change ======================================
    $(document).on('click', '.user_password', function(){

                
        $('#user_password_modal').modal('show');

    });

    // $('#user_password_form').submit(function(event){
    //     event.preventDefault();

    //     var user_password = $('#CuserPassword').val();
    //     var user_New_password = $('#NewuserPassword').val();
    //     var user_Confirm_password = $('#Confirm_userPassword').val();


    //     if(user_password == '')
    //     {
    //      swal('Opps...Fill in the Blank','Please Enter User Password ','info');
    //      $('#user_password_modal').modal("hide");
    //      return false;
    //     }else
    //     if(user_New_password == '')
    //     {
    //      swal('Opps...Fill in the Blank','Please Enter User New Password ','info');
    //      $('#user_password_modal').modal("hide");
    //      return false;
    //     }else
    //     if(user_Confirm_password == '')
    //     {
    //      swal('Opps...Fill in the Blank','Please Enter User Confirm Password ','info');
    //      $('#user_password_modal').modal("hide");
    //      return false;
    //     }else
    //     if(user_New_password !== user_Confirm_password)
    //     {
    //      swal('Opps...','New Password & Confirm Password Does not Match','info');
    //      $('#user_password_modal').modal("hide");
    //      return false;
    //     }else
    //     {
    //         $.ajax({
    //             url:"./includes/action.php",
    //             method:"POST",
    //             data:new FormData(this),
    //             contentType:false,
    //             processData:false,
    //             success:function(data)
    //             {
    //                 if (data == "Change")
    //                 {
    //                     swal('Greate Job..','User Account Password Change Now','success');
                        
    //                     $('#user_password_form')[0].reset();
    //                     $('#user_password_modal').modal("hide");
    //                 }else
    //                 if (data == "NotChange")
    //                 {
    //                     swal('Opps..','User Account Password Not Change','info');
    //                 }
                 
    //             }
    //            });
    //     }
    // });

// ========================================= GPS Tracking ======================================
    $(document).on('click', '.user_tracking', function(){

            
        $('#user_tracking_modal').modal('show');
    
        });

        function gps(){
            var action = "track_vehical_by_code";
            var id = $('#uniq').val();
        
        
            $.ajax(
            {
                url:"./includes/action.php",
                method:"POST",
                data:{action:action,ID:id},
                dataType: 'JSON',
                success:function(data)
                {

                    $('#lat').val(data[0]);
                    $('#lng').val(data[1]);
                    $('#vehical').val(data[2]);
    
        
                    
                }
            })
            
            }
});