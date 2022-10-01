<?php 
$post_id = $_GET['id'];


            $sql = "SELECT * FROM `package` WHERE `Travel_ID` = {$post_id}"; 
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))

                            
             {?>

<section id="book-now">
    <form action="book-now.php" method="post">
        <div class="book-pop">
            <h1>Please fill this form correctly</h1>
            <a id = "b-close"><i class="icofont-close"></i></a>
            
            <div class="form">
            <div class="col1">
                <h1>Tour Code</h1>
                <div class="textbox"><input type="text" id="t_code" name="t_code" placeholder="Tour Code" value="<?php echo $post_id; ?>" readonly ></div>
            </div>
            
            <div class="col1">
                <h1>User ID</h1>
                <div class="textbox"><input type="text" id="u_id" name="u_id" value="<?php echo $_SESSION['User_ID']; ?>" readonly></div>
            </div>

            <div class="col1">
                <h1>Total Number Adults</h1>
                <div class="textbox1"><input type="number" id="t_adults" name="t_adults" value="0" placeholder="" required></div>
                <div class="icon">x</div>
                <div class="icon">Rs.</div>
                <div class="lable"><input type="text"  id="a_cost" value="<?php echo $row['T_Adult_Cost'];?>" readonly></div>
                <div class="icon">=</div>
                <div class="icon">Rs.</div>
                <div class="lable2"><input type="text" id="at_cost" readonly></div>
                
            </div>

            <div class="col1">
                <h1>Total Number of Childern</h1>
                <div class="textbox1"><input type="number" id="t_childern" name="t_childern" value="0" placeholder="" required></div>
                <div class="icon">x</div>
                <div class="icon">Rs.</div>
                <div class="lable"><input type="text"  id="c_cost" value="<?php echo $row['T_Child_Cost'];?>" readonly></div>
                <div class="icon">=</div>
                <div class="icon">Rs.</div>
                <div class="lable2"><input type="text" id="ct_cost" readonly></div>
            </div>

            <div class="col1">
                <h1>Total Cost</h1>
                <div class="icon1">=</div>
                <div class="icon">Rs.</div>
                <div class="lable1"><input type="text" id="t_cost" name="t_cost" readonly></div>
                
            </div>
            
            <div class="col1">
                <h1>Payment Type</h1>
                <select class="option1" id="p_type" name="p_type">
                    <option value="Cedit">Cedit</option>
                    <option value="Debt">Debt</option>
                </select>
            </div>

            <div class="col1">
                <h1>Additional Request</h1>
                <div class="textbox"><textarea name="reqest" id="reqest" cols="0" rows="3"></textarea></div>
            </div>
            
            <div class="col2">
            <button type="submit" name="Pay">Pay Now</button>
            </div>
            </div>
            
        </div>
        
    </form>
    <?php } 
    }?>
</section>

<script>
    document.getElementById('button5').addEventListener('click',
    function(){
    document.querySelector('.book-pop').style.display = 'block';
    $('body').css('overflow', 'hidden');
    });

    document.getElementById('b-close').addEventListener('click',
    function(){
    document.querySelector('.book-pop').style.display = 'none';
    $('body').css('overflow', 'auto');
    });

    $(document).ready(function(){
     // =========================== Multiple Adult Cost (Mouse Click) ========================
        $("#t_adults").mouseup(function(){
            var total = 0;
            var x = Number($("#t_adults").val());
            var y = Number($("#a_cost").val());
            var total = x*y;

           $('#at_cost').val(total);
        });
    // =========================== Multiple Adult Cost (Keypress) ===========================
        $("#t_adults").keyup(function(){
            var total = 0;
            var x = Number($("#t_adults").val());
            var y = Number($("#a_cost").val());
            var total = x*y;

            $('#at_cost').val(total);
        });
     // =========================== Multiple Children Cost (Mouse Click) ======================
        $("#t_childern").mouseup(function(){
            var total = 0;
            var x = Number($("#t_childern").val());
            var y = Number($("#c_cost").val());
            var total = x*y;

            $('#ct_cost').val(total);
        });
    // =========================== Multiple Children Cost (Keypress) ===========================
        $("#t_childern").keyup(function(){
            var total = 0;
            var x = Number($("#t_childern").val());
            var y = Number($("#c_cost").val());
            var total = x*y;

            $('#ct_cost').val(total);
        });


    // =========================== Count Sub Cost (Mouse Click) ========================
    $("#t_adults").mouseup(function(){
            var total = 0;
            var x = Number($("#at_cost").val());
            var y = Number($("#ct_cost").val());
            var total = x+y;

            $('#t_cost').val(total);
        });
    // =========================== Count Sub Cost (Mouse Click) ========================
        $("#t_adults").keyup(function(){
            var total = 0;
            var x = Number($("#at_cost").val());
            var y = Number($("#ct_cost").val());
            var total = x+y;

            $('#t_cost').val(total);
        });
    // =========================== Count Sub Cost (Mouse Click) ========================
        $("#t_childern").mouseup(function(){
            var total = 0;
            var x = Number($("#at_cost").val());
            var y = Number($("#ct_cost").val());
            var total = x+y;

            $('#t_cost').val(total);
        });
     // =========================== Count Sub Cost (Mouse Click) ========================
        $("#t_childern").keyup(function(){
            var total = 0;
            var x = Number($("#at_cost").val());
            var y = Number($("#ct_cost").val());
            var total = x+y;

            $('#t_cost').val(total);
        });    
    });
</script>

<style>
#book-now .book-pop{
    width: 100%;
    position: fixed;
    top: 0%;
    left: 0%;
    z-index: 1000000;
    color: white;
    background-color: rgba(0, 0, 0, 0.9);
    border-radius: 5px;
    display: none;
    padding-bottom: 10%;


}

#book-now .book-pop h1{
    text-align: center;
    margin-top: 5px;
    font-size: 150%;
    float: left;
    width: 95%;
}

#book-now .book-pop a{
    width: 5%;
    margin-top: 5px;
    text-align: center;
    
}

#book-now .book-pop .form{
    width: 500px;
    min-width: 500px;
    max-width: 500px;
    height: 90vh;
    background-color: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden;
    overflow-y: scroll;
    padding-bottom: 2%;
}

#book-now .book-pop .form .col1{
    width: 90%;
    float: left;
    margin-top: 1em;
}

#book-now .book-pop .form .col2{
    width: 90%;
    margin-top: 1em;
}

#book-now .book-pop .form .col2 button{
    float: right;
}

#book-now .book-pop .form .col1 h1{
    font-size: 1em;
    text-align: left;
    color: black;
    width: 25%;
    height: 5%;
    }

#book-now .book-pop .form .textbox{
    background-color: transparent;
    width: 70%;
    color: black;
    display: inline-block;
}

#book-now .book-pop .form .icon{
    background-color: transparent;
    color: black;
    display: inline-block;
    margin: 1%;
    
    width: 3%;
}

#book-now .book-pop .form .icon1{
    background-color: transparent;
    color: black;
    display: inline-block;
    margin: 1%;
    text-align: right;
    width: 44%;
}

#book-now .book-pop .form .lable{
    background-color: transparent;
    width: 10%;
    display: inline-block;
    font-weight: bold;
    
}

#book-now .book-pop .form .lable2{
    background-color: transparent;
    width: 18%;
    display: inline-block;
    font-weight: bold;
    text-align: right;
}

#book-now .book-pop .form .lable1{
    background-color: transparent;
    width: 18%;
    font-weight: bold;
    margin-right: 3%;
}

#book-now .book-pop .form .lable1 input{
    background-color: transparent;
    outline: none;
    border-style: none;
    border-bottom: double;
    border-top: solid;
    width: 100%;
    text-align: right;
    margin-right: 2%;
}

#book-now .book-pop .form .lable input{
    background-color: transparent;
    outline: none;
    border-style: none;
    width: 100%;
}

#book-now .book-pop .form .lable2 input{
    background-color: transparent;
    outline: none;
    border-style: none;
    text-align: right;
    width: 100%;
}

#book-now .book-pop .form .lable1{
    background-color: transparent;
    float: right;
    color: brown;
    font-weight: bold;
    text-align: right;
}

#book-now .book-pop .form .textbox1{
    background-color: transparent;
    width: 15%;
    color: brown;
    display: inline-block;
    margin-left: 2%;
}

#book-now .book-pop .form .textbox input, .textbox1 input{
    width: 100%;
    border: none;
    border-bottom: ridge;
    outline: none;
    background-color: transparent;
    margin-left: 5%;
}

#book-now .book-pop .form .textbox textarea{
    width: 100%;
    border-bottom: ridge;
    margin-left: 5%;
}

#book-now .book-pop .form .col1 .option1{
    width: 25%;
    text-align: right;
    margin-left: 5%;
}
</style>