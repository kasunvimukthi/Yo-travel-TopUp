
<?php
  include "db_conn.php";
  $post_id = $_GET['id'];
    // include header.php file
    include ('template/header.php');

    // include hero.php file
    include ('../template/hero.php');

?>
 <link href="style.css" rel='stylesheet' type='text/css' />
 <div class="packages bg-light">

  <?php



  $sql1 = "SELECT * FROM `catogory` WHERE `C_ID` = {$post_id}"; 


  $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
  if(mysqli_num_rows($result1) > 0){
  while($row1 = mysqli_fetch_assoc($result1)) {?>

   <h1 class="text-center pt-5"><?php echo $row1['C_Name']; ?></h1>

   <?php }
  }
  ?>
  <div class="row col-md-12 mt-5" style="margin-left: 0px;">
    <div class="col-md-4 bg-dark mt-2 pb-3">
    <!-- ============================================================ STICKY SIDE BAR ============================================== -->
      <div class="position-sticky" style="top: 5rem;">
      <div class="hero-container sticky_body">
      <div id="heroCarouselmy" class="carousel slidfe carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
        <?php
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` ORDER BY RAND () LIMIT 1";
            $result = mysqli_query($conn, $sql);
            ?>

          <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
          <!-- Slide 3 -->
          <div class="carousel-item active">
            <div class="sticky_img">
          <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>" width="100%" height="100%" /><br/>
          </div>
              <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown text-white"><?php echo $row["C_Name"]; ?></h2>
                <p class="animate__animated animate__fadeInUp text-white"><?php echo $row["C_Details"]; ?></p>
                <div>
                
                <a href="package.php?id=<?php echo $row['C_ID']; ?>" class="btn-book animate__animated animate__fadeInUp scrollto">View Packages</a>
                  
                </div>
              </div>
            </div>
          </div>
          <?php }
                ?>

          <?php
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` ORDER BY RAND () LIMIT 4";
            $result = mysqli_query($conn, $sql);
            ?>

          <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
          <!-- Slide 2 -->
          <div class="carousel-item ">
          <div class="sticky_img">
          <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>" width="100%" height="100%" /><br/>
          </div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown text-white"><?php echo $row["C_Name"]; ?></h2>
                <p class="animate__animated animate__fadeInUp text-white"><?php echo $row["C_Details"]; ?></p>
                <div>
                <a href="package.php?id=<?php echo $row['C_ID']; ?>"><div class="btn btn-primary"> View Packages</div></a>
                 
                </div>
              </div>
            </div>
          </div>
          <?php }
                ?>
        </div>

        <a class="carousel-control-prev" href="#heroCarouselmy" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarouselmy" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>

      </div>
    </div>
<!-- ================================================================== PACKAGE BODY ============================================= -->
    <div class="col-md-8 bg-light">
    <div class="details_flex mt-2 bg-light">
        <div class="col-md-12">

      <?php

      $sql = "SELECT * FROM `package` WHERE `C_ID` = {$post_id} &&  `Status`=1"; 


      $result = mysqli_query($conn, $sql) or die("Query Failed.");
      if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)) {?>

          <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm mb-3 imgbox fadein">
          <div class="col-auto d-lg-block image">
          <img src="imageView1.php?image_id=<?php echo $row["Travel_ID"]; ?>"width="100%" height="100%" />

            </div>
          <div class="col mt-3 pb-2 position-static row box_details" style="margin-left: 0px; margin-right: 0px;">
            <div class="details" style="margin: 0px; width: 100%;">
              <dt><?php echo $row['T_Name']; ?></dt>
              <p class="mb-0 card-text text-dark"><dt>Locations - </dt><p class="small"><?php echo $row['T_Locations']; ?></p></p>
              <div class="mb-1 text-muted"><?php echo $row['T_Details']; ?></div>

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

              </div>
              <div class="more" style="margin-left: 0px;">
              <a href="selectpackage.php?id=<?php echo $row['Travel_ID']; ?>">
              <button class="btn btn-success col-md-4">More Info</button></a>
              </div>
              </div>
          </div>

      <?php
      }
      }else{
      echo "<h2>No Record Found.</h2>";
      }

      ?>
        </div>
      </div>
    </div> 


</div>    
</div>           

          <?php

    // include contact.php file
    include ('../template/contact1.php');
    
    // include footer.php file
    include ('template/footer.php');

    // include footer.php file
    include ('script.php');

    // modal.php file
    include ('modal.php');
          ?>

<script>
   const faders = document.querySelectorAll('.fadein');
  const sliders = document.querySelectorAll('.from-left,.from-right');
  

  const appearOptions = {
    threshold: 0,
    rootMargin: "0px 0px -100px 0px"
  };

  const appearOnScroll = new IntersectionObserver(
    function(
      entries,
      appearOnScroll
    
  ){
    entries.forEach(entry => {
      if (!entry.isIntersecting) {
        return;
      }else{
        entry.target.classList.add('appear');
        appearOnScroll.unobserve(entry.target);
      }
    });
  },
  appearOptions);

  faders.forEach(fader => {
    appearOnScroll.observe(fader);
  });

  sliders.forEach(slider => {
    appearOnScroll.observe(slider);
  })
</script>