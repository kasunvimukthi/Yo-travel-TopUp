<!-- ======= Hero Section ======= -->
<section id="hero" style="max-height: 100vh;">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slidfe carousel-fade" data-ride="carousel">

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
          <div class="carousel-item active" >
          <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>" width="100%" height="100%" /><br/>
              <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><?php echo $row["C_Name"]; ?></h2>
                <p class="animate__animated animate__fadeInUp"><?php echo $row["C_Details"]; ?></p>
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
          <div class="carousel-item" >
          <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>" width="100%" height="100%" /><br/>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><?php echo $row["C_Name"]; ?></h2>
                <p class="animate__animated animate__fadeInUp"><?php echo $row["C_Details"]; ?></p>
                <div>
                <a href="package.php?id=<?php echo $row['C_ID']; ?>" class="btn-book animate__animated animate__fadeInUp scrollto">View Packages</a>
                 
                </div>
              </div>
            </div>
          </div>
          <?php }
                ?>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->