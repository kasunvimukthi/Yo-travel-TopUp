<script  src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.js"></script>
    <link rel="stylesheet" href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css">
<style>
  .wrapper{
    display: flex;
    align-items: center;
    height: 100vh;
    width: 100%;
    
  }
  .wrapper .carousel1{
    width: 100%;
    margin: auto;

  }
  .carousel1 .card{
    height: 85vh;
    color: black;
    /* width: 400px; */

    margin: 10px;
    box-shadow: 0px 4px 5px rgba(0,0,0,2);
    border-radius: 15px;
    overflow: hidden;
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

    <div class="pt-5 py-5">
    <div class="container mt-5 col-lg-11 pt-5" style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.171); width: 90%; background-color: white;">
    <p class="h3 text-center" style="font-weight: bold;">Top Packages</p>
    <p class="text-center">Below are the travel packages that most people bought</p>
    
    <div class="wrapper">
        
    <div class="carousel1 owl-carousel">
    <?php
    $sql1 = "SELECT * FROM `no_of_travelers` WHERE `No_of_Travelers` > 5 ORDER BY `No_of_Travelers` DESC LIMIT 10"; 
    $result1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result1) > 0){
        while($row1 = mysqli_fetch_assoc($result1)) {
            
            
        $sql = "SELECT * FROM `package` WHERE Travel_ID = {$row1['T_ID']} "; 
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                ?>
      <div class="card bg-light">
          <div class="card_image">
      <img src="imageView1.php?image_id=<?php echo $row["Travel_ID"]; ?>"width="100%" height="100%" /> 
      </div>
      <div class="my-card-body">
          <dt><?php echo $row["T_Name"]; ?></dt>
          <p><dt>Locations -</dt><p  class="small text-truncate"><?php echo $row["T_Locations"]; ?></p></p>
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
      <?php }
        }

        ?>
      </div>

      <?php 
    }
}
        ?>
      </div>
     
    </div>
    
  </div>

  </div>

    <script>
        $(".carousel1").owlCarousel({
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
        <script src="../assets\vendor\jquery\jquery.min.js"></script>