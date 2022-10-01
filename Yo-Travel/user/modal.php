<!-- ============================================== Chat Bot ================================= -->
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
        align-items: baseline;
    }
    .form .user-inbox{
        justify-content: flex-end;
        margin: 13px 0;
    }
    .form .inbox .icon{
        height: 40px;
        width: 40px;
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