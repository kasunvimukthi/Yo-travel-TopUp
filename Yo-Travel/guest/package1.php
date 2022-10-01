<?php 
session_start();

if (isset($_SESSION['User_ID']) && isset($_SESSION['User_Name'])) {

require_once ("function/add.php");
?>

<?php
    // include header.php file
    include ('Home/header.php');

    // include hero.php file
    include ('Home/hero.php');

?>
<section id="package">
<div class = "packages">

<?php

include "db_conn.php";
$post_id = $_GET['id'];

$sql = "SELECT * FROM `package` WHERE `C_ID` = {$post_id}"; 


                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {?>

                       <link href="style1.css" rel='stylesheet' type='text/css' />

                                
                                    <div class="imgbox">
                                    
                                      <!-- <div class="card mb-3"> -->
                                        
                                        <img src="imageView1.php?image_id=<?php echo $row["Travel_ID"]; ?>"width="100%" height="100%" />
                                        <h1><?php echo $row['T_Name']; ?></h1>
                                        
                                        <p>Locations - <?php echo $row['T_Locations']; ?></p>
                                        
                                        <h2><?php echo $row['T_Details']; ?></h2>
                                        
                                        <h3>Rs. <?php echo $row['T_Cost']; ?></h3>
                                        
                                        <!-- </div> -->
                                    
                        </div>
                      
                        <?php
                          }
                        }else{
                          echo "<h2>No Record Found.</h2>";
                        }

                        ?>
</div> 
</section>                  

          <?php
                   // include login.php file
    include ('page/login.php');

    // include footer.php file
    include ('Home/footer.php');

    // Chat-Bot
    include ('modal.php');
          ?>
<?php 
  }else{
      header("Location: index.php");
      exit();
  }
 ?>
