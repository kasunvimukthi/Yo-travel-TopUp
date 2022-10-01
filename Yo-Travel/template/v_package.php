<script  src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.js"></script>
    <link rel="stylesheet" href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css">
<?php
include "db_conn.php";
$post_id = $_GET['id'];

                    
      $sql = "SELECT * FROM `package` WHERE `Travel_ID` = {$post_id}"; 
      $result = mysqli_query($conn, $sql);
      ?>

      <?php
      $result = mysqli_query($conn, $sql) or die("Query Failed.");
      if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result))

                            
             {
              $S_Date = $row['T_Start_Date'];
                $E_Date = $row['T_End_Date'];
                ?>
			     

  <section id="v_package">
    <div class = "border bg-light">
      <div class = "v_image">

      
      <img src="imageView1.php?image_id=<?php echo $row["Travel_ID"]; ?>"width="100%" height="100%" />
      <div class="head1">
        <h1><?php echo $row['T_Name']; ?></h1>

        <?php 
                            $query1 = "SELECT SUM(`U_adults`) AS `U_adults` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']}  AND 'T_start_date' = $S_Date AND 'T_end_date' = $E_Date";
                            $query_run1 = mysqli_query($conn ,$query1);

                            if(mysqli_num_rows($query_run1) > 0)
                            {
                            while($row2 = mysqli_fetch_assoc($query_run1))
                            {

                            $book1 =  $row2['U_adults']; 

                            }
                            }else
                            {
                            $book1 = 0;
                            }
                            $db_date = $row['T_Start_Date'];
                            $date1 = strtotime($db_date);

                            $cut_date = $row['T_End_Date'];
                            $date2 = strtotime($cut_date);

                            $closing = $date2 - $date1;

                            $date3 = $closing / (60*60*24);

                            $db_date2 = $row['T_Start_Date'];
                            $date4 = date('Y-m-d',strtotime($db_date2.'-7 days'));

                            $query2 = "SELECT SUM(`U_children`) AS `U_children` FROM `invoice` WHERE `T_ID` = {$row['Travel_ID']} AND 'T_start_date' = $S_Date AND 'T_end_date' = $E_Date";
                            $query_run2 = mysqli_query($conn ,$query2);

                            if(mysqli_num_rows($query_run2) > 0)
                            {
                            while($row2 = mysqli_fetch_assoc($query_run2))
                            {

                            $book2 =  $row2['U_children']; 

                            }
                            }else
                            {
                            $book2 = 0;
                            }


                            $total = $book1 + $book2;
                            $book3 = $row['Available_Seat'];
                            $seats =($book3 - $total);
                            if($book3 > $total)
                            {
                            $seats1 = "$seats";
                            }else
                            {
                            $seats1 = "No Seat Available for any";
                            $query3 = "UPDATE package SET Status='$booking_full' WHERE Travel_ID = {$row['Travel_ID']}";// update package status
                            mysqli_query($conn ,$query3);

                            }
                        ?>
                        

        <h1><?php echo $date3 ?> Days</h1>

        
        <h2>Travel Start Date </h2><span><?php echo $row["T_Start_Date"]; ?></span>
        <h2>Travel End Date </h2><span><?php echo $row["T_End_Date"]; ?></span>
        <h2>Cut of date</h2><span><?php echo $date4 ?></span>
        <h2>Available Booking</h2><span><?php echo $seats1 ?> Persons</span>



        <h2>Starting from</h2><span>Rs.<?php echo $row['T_Adult_Cost']; ?></span>
      
      <button class="btn btn-success book_now_modal" onclick="return confirm('Please Sign In First')">Book Now</button>
      </div>
      
      </div>
          <?php
              
                  $sql = "SELECT * FROM `package` WHERE `Travel_ID` = ".$row["Travel_ID"];
                  $result1 = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result1) > 0){
                  while($row1 = mysqli_fetch_assoc($result1)) {?>

  
<!-- ==============================================================================================================
                                                          TABS
=============================================================================================================== -->     


  <div class="vpackagetab pt-5">
    <div class="top">
      <h1 id="tab1">Overview</h1>
      <h1 id="tab2">Itinerary</h1>
      <h1 id="tab3">Accommodation</h1>
      <h1 id="tab4">Activities</h1>
      <h1 id="tab5">Gallery</h1>
    </div>

<!-- =============================================================================================================================
                                                        TAB 1 START
===============================================================================================================================-->
    <div class="tab1">
      <div class="col">
        <div class="row">
          <h1>Overview</h1>
          <p><?php echo $row1['T_Details']; ?></p>
        </div>

        <div class="row">
          <h1>Highlights</h1>

          <?php
              
              $sql = "SELECT * FROM `t_highlights` WHERE `T_ID` = ".$row1["Travel_ID"];
              $result2 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result2) > 0){
              while($row2 = mysqli_fetch_assoc($result2)) {?>

          <li><p><?php echo $row2['Highlights']; ?></p></li>
              <?php
              }
            }?>
        </div>
      </div>

      <div class="col1">
        <div class="row1">

        <?php
              $sql = "SELECT * FROM `t_image`  WHERE `T_ID` = ".$row1["Travel_ID"];
              $result3 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result3) > 0){
              while($row3 = mysqli_fetch_assoc($result3)) {?>

          
          <a href="imageView2.php?image_id=<?php echo $row3["ID"] ?>" class="venobox" data-gall="gallery-item" width="50%" height="50%">
            <li>
          <img src="imageView2.php?image_id=<?php echo $row3["ID"]; ?>"width="100%" height="100%" />
          </li>
          </a>
      
          <?php }
              }
          ?>
<!-- ." ORDER BY RAND () LIMIT 1" -->
              <div class="more">

              <?php
              $sql = "SELECT * FROM `t_image`  WHERE `T_ID` = ".$row1["Travel_ID"];
              $result3 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result3) > 0){
              while($row3 = mysqli_fetch_assoc($result3)) {?>
              

              <li>
              <img src="imageView2.php?image_id=<?php echo $row3["ID"] ?>"width="100%" height="100%" />
              </li>

              <div class="centered">
              <a href="imageView2.php?image_id=<?php echo $row3["ID"] ?>" class="venobox 2" data-gall="gallery-item 2" width="50%" height="50%">
              <h2>+
                <?php
                $row3 = mysqli_num_rows($result3)-5;
                echo $row3;
                ?> More</h2></a></div>
                <?php }
              }
          ?>
               

              
              </div>
              

      
        </div>

      </div>

      <div class="row2">
        <h1>Site Map</h1>
          <div class="map">
          <iframe src="<?php echo $row1["T_Map"] ?>" width="100%" height="100%"></iframe>
          </div>
      </div>
    

    <div class="col2">
      <div class="row3">
        <h1>Package includes</h1>
        <?php
              $sql = "SELECT * FROM `t_includes`  WHERE `T_ID` = ".$row1["Travel_ID"];
              $result3 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result3) > 0){
              while($row3 = mysqli_fetch_assoc($result3)) {?>
        <li><?php echo $row3['Includes']; ?></li>
        <?php }
              }
          ?>
        

      </div>
    </div>

    <div class="col2">
      <div class="row3">
        <h1>Terms and Conditions</h1>
        <?php
              $sql = "SELECT * FROM `t_conditions`  WHERE `T_ID` = ".$row1["Travel_ID"];
              $result3 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result3) > 0){
              while($row3 = mysqli_fetch_assoc($result3)) {?>
        <li><?php echo $row3['Conditions']; ?></li>
        <?php }
              }
          ?>

      </div>
    </div>

    </div>

    <!-- =============================================================================================================================
                                                            TAB 2 START
    ===============================================================================================================================-->
    <div class="tab2">

<?php
          $sql = "SELECT * FROM `t_itinerary`  WHERE `T_ID` = ".$row1["Travel_ID"];
          $result3 = mysqli_query($conn, $sql) or die("Query Failed.");
          if(mysqli_num_rows($result3) > 0){
          while($row3 = mysqli_fetch_assoc($result3)) {?>
  <div class="row4">
    <div class="col4 image1">
    <img src="imageView3.php?image_id=<?php echo $row3["ID"] ?>"width="100%" height="100%" />
    </div>
    <div class="col5 col-md-12">

      <h1 class="col-md-12">Day <?php echo $row3['I_Date']; ?></h1>
      <h1 class="col-md-12"><?php echo $row3['I_Locations']; ?></h1>
      <p class="col-md-12"><?php echo $row3['I_Details']; ?></h1></p>
      <h4 class="col-md-12">Accommodations : <span><?php echo $row3['I_Accommodations']; ?></h1></span></h4>
      <h4 class="col-md-12">Recommended Activities : <span><?php echo $row3['I_Activities']; ?></h1></span></h4>
      
    </div>
    
  </div>
  <?php }
          }
      ?>
</div>
<style>
.image1{
background-color: rgba(255, 255, 255, 0);
width: 100%;
height: 100%;
}
</style>

    <!-- =============================================================================================================================
                                                            TAB 3 START
    ===============================================================================================================================-->
    <div class="tab3">
    <?php
              $sql = "SELECT * FROM `p_accommodation`  WHERE `P_ID` = ".$row1["Travel_ID"];
              $result8 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result8) > 0){
              while($row8 = mysqli_fetch_assoc($result8)) {

              $sql = "SELECT * FROM `t_accommodation`  WHERE `ID` = ".$row8["A_ID"];
              $result3 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result3) > 0){
              while($row3 = mysqli_fetch_assoc($result3)) {?>
    <div class="row5">
        <div class="col6 image1">
        <img src="imageView4.php?image_id=<?php echo $row3["ID"] ?>"width="100%" height="100%" />
        </div>
        <div class="col7 col-md-12">
          <h1><?php echo $row3['A_Name']; ?></h1>
          <h2><?php echo $row3['A_Location']; ?></h2>
          <p><?php echo $row3['A_summary']; ?></p>
            <div class="col8 col-md-12">
            <?php
              $sql = "SELECT * FROM `icons`  WHERE `Acc_ID` = ".$row8["A_ID"];
              $result6 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result6) > 0){
              while($row4 = mysqli_fetch_assoc($result6)) {
                
                $sql = "SELECT * FROM `all_icons`  WHERE `ID` = ".$row4["Icon"];
                $result7 = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result7) > 0){
                while($row5 = mysqli_fetch_assoc($result7)) {?>
  
                <i class="<?php echo $row5["Icons"]; ?>" style="font-size: 30px; color: green;" title="<?php echo $row5["Title"]; ?>"></i>
                
                <?php }
                }
              }
                }?>
            </div>
            <a href="accommodation.php?id=<?php echo $row3['ID']; ?>">
            <h3>More Info</h3></a>
        </div>
        
      </div>
      <?php }
              }
            }
          }
          ?>

    </div>

    <!-- =============================================================================================================================
                                                            TAB 4 START
    ===============================================================================================================================-->  
    <div class="tab4">
    <?php
              $sql = "SELECT * FROM `p_activity`  WHERE `P_ID` = ".$row1["Travel_ID"];
              $result9 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result9) > 0){
              while($row9 = mysqli_fetch_assoc($result9)) {

              $sql = "SELECT * FROM `t_activities`  WHERE `ID` = ".$row9["Act_ID"];
              $result3 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result3) > 0){
              while($row3 = mysqli_fetch_assoc($result3)) {?>
    <div class="row6">
        <div class="col9 image1">
        <img src="imageView5.php?image_id=<?php echo $row3["ID"] ?>"width="100%" height="100%" />
        </div>
        <div class="col10 col-md-12">
          <h1><?php echo $row3['A_Name']; ?></h1>
          <h2><?php echo $row3['A_Location']; ?></h2>
          <p><?php echo $row3['A_summary']; ?></p>
            <div class="col11 col-md-12">
              <?php
              $sql = "SELECT * FROM `icons`  WHERE `Act_ID` = ".$row9["Act_ID"];
              $result6 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result6) > 0){
              while($row4 = mysqli_fetch_assoc($result6)) {

                $sql = "SELECT * FROM `all_icons`  WHERE `ID` = ".$row4["Icon"];
                $result7 = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result7) > 0){
                while($row5 = mysqli_fetch_assoc($result7)) {?>
  
                <i class="<?php echo $row5["Icons"]; ?>" style="font-size: 30px; color: green;" title="<?php echo $row5["Title"]; ?>"></i>
                
                <?php }
                }
              }
                }?>
              

            </div>
            <a href="activities.php?id=<?php echo $row3['ID']; ?>">
            <h3>More Info</h3></a>
        </div>
        
      </div>
      <?php }
              }
            }
          }
          ?>
    </div>


    <!-- =============================================================================================================================
                                                            TAB 5 START
    ===============================================================================================================================-->
    <div class="tab5">
      <div class="row7">
      <div class="col12">
      <?php
              $sql = "SELECT * FROM `t_image` WHERE `T_ID` = ".$row1["Travel_ID"];
              $result3 = mysqli_query($conn, $sql) or die("Query Failed.");
              if(mysqli_num_rows($result3) > 0){
              while($row3 = mysqli_fetch_assoc($result3)) {?>

          
          <a href="imageView2.php?image_id=<?php echo $row3["ID"] ?>" class="venobox 1" data-gall="gallery-item 1" width="50%" height="50%">
            <img src="imageView2.php?image_id=<?php echo $row3["ID"]; ?>"width="100%" height="100%" />
          </a>

          <?php
              }
            }?>
            </div>
      </div>
    </div>
    
  </div>
  <?php
              }
          }
      


?>	

  
<style>
  .wrapper{
    display: flex;
    align-items: center;
    height: 100vh;
    width: 100%;
    
  }
  .wrapper .carousel{
    width: 100%;
    margin: auto;

  }
  .carousel .card{
    /* background-color: red; */
    height: 85vh;
    /* width: 400px; */

    margin: 10px;
    box-shadow: 0px 4px 5px rgba(0,0,0,2);
    border-radius: 15px;
    overflow: hidden;
  }
  .carousel .card-1{
    background-color: rosybrown;
  }
  .carousel .card-2{
    background-color: royalblue;
  }
  .carousel .card-3{
    background-color: saddlebrown;
  }
  .carousel .card-4{
    background-color: salmon;
  }
  .carousel .card-5{
    background-color: sandybrown;
  }
  .card_image{
      height: 30vh;
  }
  .my-card-body{
      height: 100%;
      overflow-y: scroll;
      margin: 10px;
  }
</style>

    <div class="container mt-5 ">
    <p class="h3 text-center">Other Packages</p>
    
    <div class="wrapper">
        
    <div class="carousel owl-carousel">
    <?php
        $sql = "SELECT * FROM `package` WHERE `Status`=1 && `C_ID` = ".$row["C_ID"]; 
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                ?>
      <div class="card">
          <div class="card_image">
      <img src="imageView1.php?image_id=<?php echo $row["Travel_ID"]; ?>"width="100%" height="100%" /> 
      </div>
      <div class="my-card-body">
          <dt><?php echo $row["T_Name"]; ?></dt>
          <p><dt>Locations -</dt><?php echo $row["T_Locations"]; ?></p>
      <p></p>
      <p class="small"><?php echo $row["T_Details"]; ?></p>

      <?php 
           $db_date = $row['T_Start_Date'];
           $date1 = strtotime($db_date);
   
           $cut_date = $row['T_End_Date'];
           $date2 = strtotime($cut_date);
   
           $closing = $date2 - $date1;
   
           $date3 = $closing / (60*60*24);
           ?>

      <dt><?php echo $date3 ?> Days.</dt>
      <dt>Starting from Rs. <?php echo $row['T_Adult_Cost']; ?> per person</dt>
      <dt>Date <?php echo $row["T_Start_Date"]; ?></dt>

      <div class="col-lg-12 text-end">
      <a href="selectpackage.php?id=<?php echo $row['Travel_ID']; ?>">
      <p class="btn btn-success ">More Info</p></a>
      </div>
      </div>
      </div>

      <?php }
        }
        ?>
      </div>
     
    </div>
    
  </div>
<?php
             }
            }?>
    

    <script>
        $(".carousel").owlCarousel({
      margin: 10,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        nav: false
      },
      600: {
        items: 2,
        nav: false
      },
      1000: {
        items: 3,
        nav: false
      },
    }
    });
    </script>
</div>
	</section>

  <script>
    document.getElementById('tab1').addEventListener('click',
    function(){
    document.querySelector('.tab1').style.display = 'inline-block';
    document.querySelector('.tab2').style.display = 'none';
    document.querySelector('.tab3').style.display = 'none';
    document.querySelector('.tab4').style.display = 'none';
    document.querySelector('.tab5').style.display = 'none';
    });

    document.getElementById('tab2').addEventListener('click',
    function(){
    document.querySelector('.tab2').style.display = 'inline-block';
    document.querySelector('.tab1').style.display = 'none';
    document.querySelector('.tab3').style.display = 'none';
    document.querySelector('.tab4').style.display = 'none';
    document.querySelector('.tab5').style.display = 'none';
    });

    document.getElementById('tab3').addEventListener('click',
    function(){
    document.querySelector('.tab3').style.display = 'inline-block';
    document.querySelector('.tab1').style.display = 'none';
    document.querySelector('.tab2').style.display = 'none';
    document.querySelector('.tab4').style.display = 'none';
    document.querySelector('.tab5').style.display = 'none';
    });

    document.getElementById('tab4').addEventListener('click',
    function(){
    document.querySelector('.tab4').style.display = 'inline-block';
    document.querySelector('.tab1').style.display = 'none';
    document.querySelector('.tab3').style.display = 'none';
    document.querySelector('.tab2').style.display = 'none';
    document.querySelector('.tab5').style.display = 'none';
    });

    document.getElementById('tab5').addEventListener('click',
    function(){
    document.querySelector('.tab5').style.display = 'inline-block';
    document.querySelector('.tab1').style.display = 'none';
    document.querySelector('.tab3').style.display = 'none';
    document.querySelector('.tab4').style.display = 'none';
    document.querySelector('.tab2').style.display = 'none';
    });
  </script>
    <!-- https://www.sliderrevolution.com/resources/css-gallery/ -->

    <script src="../assets\vendor\jquery\jquery.min.js"></script>
    <script>
      // $(".row1 li").slice(0, 3).show()
      // $(".more").on("click", function(){
      //   $(".row1 li:hidden").slice(0, 3).slideDown()
      //   if($(".row1 li:hidden").length == 3){
      //     $(".more").fadeOut('slow')
      //   }
      // })
        
      
       if($(".row1 li:hidden").length > 6){
          $(".row1 li").slice(0, 5).show()
          $(".more li").slice(0, 1).show()
          $(".centered").slice(0, 1).show()
          $(".centered h2").slice(0, 1).show()
          document.querySelector('.more').style.display = 'inline-block';
        }else{
          document.querySelector('.more').style.display = 'none';
        }

        if($(".row1 li:hidden").length > 0){
          $(".row1 li").slice(0, 5).show()
        }


    </script>

</script>
<script src="../map.js"></script>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5SUrSd237MKwlLNYbGDfv-FROSRwb6EI&callback=loadMap&libraries=&v=weekly"
      defer
    ></script>