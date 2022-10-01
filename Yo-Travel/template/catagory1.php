
<section id="category">
<div class="category fadein  col-lg-11">
<div class="head">
          <h2>Travel by <span>Category</span></h2>
          <p>We offer different types of travel categories for you. You can select your best itinerary using this categories.</p>
        </div>

        <div class="options">
        <?php
              $conn=mysqli_connect("localhost","root","","traveldb");
              $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` WHERE `C_ID`"; 
              $result = mysqli_query($conn, $sql);
              ?>
      
              <?php
              while($row = mysqli_fetch_assoc($result)) {
              ?>
              <a href="package.php?id=<?php echo $row['C_ID']; ?>">

   <div class="option active">
   <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" />
      <div class="shadow"></div>
      <div class="label">
         <div class="icon">
            <i class="icofont-travelling"></i>
         </div>
         <div class="info">
            <div class="main"><?php echo $row['C_Name']; ?></div>
            <div class="sub"></div>
         </div>
         <div class="info2">
            <div class="h1"><?php echo $row['C_Name']; ?></div>
            
         </div>
      </div>
   </div>
   <?php		
              }
        ?>
   </a>
</div>
</div>
</section>

 