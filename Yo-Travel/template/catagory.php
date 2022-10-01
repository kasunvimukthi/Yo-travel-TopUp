<div class="section-title">
          <h2>Travel by <span>Category</span></h2>
          
        </div>

        <div class = "container1">
        <?php
              $conn=mysqli_connect("localhost","root","","traveldb");
              $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` WHERE `C_ID` = 1"; 
              $result = mysqli_query($conn, $sql);
              ?>
      
              <?php
              while($row = mysqli_fetch_assoc($result)) {
              ?>

          <div id = "slidebar1"><a href="package.php?id=<?php echo $row['C_ID']; ?>"><img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
          
            <div class = "container2">
              <div class="text-block">
                <p><?php echo $row['C_Name']; ?><span class="icofont-listine-dots" aria-hidden="true"></span></p></a>
                
              </div>
            </div>
          </div>
          <?php		
              }
        ?>

        <?php
              $conn=mysqli_connect("localhost","root","","traveldb");
              $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` WHERE `C_ID` = 2"; 
              $result = mysqli_query($conn, $sql);
              ?>
      
              <?php
              while($row = mysqli_fetch_assoc($result)) {
              ?>

          <div id = "slidebar2"><a href="package.php?id=<?php echo $row['C_ID']; ?>"><img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
          <div class = "container2">
              <div class="text-block">
              <p><?php echo $row['C_Name']; ?><span class="icofont-listine-dots" aria-hidden="true"></span></p></a>
                
              </div>
            </div>
          </div>
          <?php		
              }
        ?>

          <?php
              $conn=mysqli_connect("localhost","root","","traveldb");
              $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` WHERE `C_ID` = 3"; 
              $result = mysqli_query($conn, $sql);
              ?>
      
              <?php
              while($row = mysqli_fetch_assoc($result)) {
              ?>

          <div id = "slidebar"><a href="package.php?id=<?php echo $row['C_ID']; ?>"><img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
          <div class = "container2">
              <div class="text-block">
              <p><?php echo $row['C_Name']; ?><span class="icofont-listine-dots" aria-hidden="true"></span></p></a>
                
              </div>
            </div>
          </div>

          <?php		
              }
        ?>

          <?php
              $conn=mysqli_connect("localhost","root","","traveldb");
              $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` WHERE `C_ID` = 4"; 
              $result = mysqli_query($conn, $sql);
              ?>
      
              <?php
              while($row = mysqli_fetch_assoc($result)) {
              ?>

          <div id = "content1"><a href="package.php?id=<?php echo $row['C_ID']; ?>"><img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
          <div class = "container2">
              <div class="text-block">
              <p><?php echo $row['C_Name']; ?><span class="icofont-listine-dots" aria-hidden="true"></span></p></a>
                
              </div>
            </div>
          </div>

          <?php		
              }
        ?>

          <?php
              $conn=mysqli_connect("localhost","root","","traveldb");
              $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` WHERE `C_ID` = 5"; 
              $result = mysqli_query($conn, $sql);
              ?>
      
              <?php
              while($row = mysqli_fetch_assoc($result)) {
              ?>

          <div id = "content2"><a href="package.php?id=<?php echo $row['C_ID']; ?>"><img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
          <div class = "container2">
              <div class="text-block">
              <p><?php echo $row['C_Name']; ?><span class="icofont-listine-dots" aria-hidden="true"></span></p></a>
                
              </div>
            </div>
          </div>

          <?php		
              }
        ?>

          <?php
              $conn=mysqli_connect("localhost","root","","traveldb");
              $sql = "SELECT `C_ID`, `C_Name`, `C_Image`, `C_Details` FROM `catogory` WHERE `C_ID` = 6"; 
              $result = mysqli_query($conn, $sql);
              ?>
      
              <?php
              while($row = mysqli_fetch_assoc($result)) {
              ?>

          <div id = "content3"><a href="package.php?id=<?php echo $row['C_ID']; ?>"><img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
          <div class = "container2">
              <div class="text-block">
              <p><?php echo $row['C_Name']; ?><span class="icofont-listine-dots" aria-hidden="true"></span></p></a>
                
              </div>
            </div>
          </div>
        </div>
        <?php		
              }
        ?>
