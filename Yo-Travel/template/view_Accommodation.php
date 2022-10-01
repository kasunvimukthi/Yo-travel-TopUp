<?php 
include "db_conn.php";
$post_id = $_GET['id'];

$sql = "SELECT * FROM `t_accommodation` WHERE `ID` = {$post_id}"; 
$result = mysqli_query($conn, $sql);
?>

<link rel="stylesheet" href="style.css">

<script  src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.js"></script>
    <link rel="stylesheet" href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css">

<style>
  .image{
    width: 100%;
    height: 90vh;
    padding: 0;
    margin: 0;
    }
    .caption1 {
    position: absolute;
    /* right: 15%; */
    bottom: 150px;
    /* width: 100%; */
    /* left: 15%; */
    z-index: 10;
    padding: 10px;
    /* padding-bottom: 10px; */
    color: #fff;
    text-align: center;
    font-weight: bold;
    background-color: rgba(92, 92, 104, 0.568);
    }

    .my .col-lg-6 {
    margin-bottom: 1.5rem;

    }

    li:hover{
    transition: ease-in 0.2s;
    transform: scale(1.1);
    cursor: pointer;
    }
    .more li{
    width: 11vw;
    height: 11vw;
    float: left;
    margin-left: -1px;
    margin-top: -1px;
    list-style: none;
    border-radius: 10px;
    overflow: hidden;
    display: none;
    z-index: 5;
    }

    .row1 li{
    width: 11vw;
    height: 11vw;
    float: left;
    margin-left: 5px;
    margin-top: 7px;
    list-style: none;
    border-radius: 10px;
    overflow: hidden;
    display: none;
    z-index: 5;
    }

    .row1 li img{
    width: 100%;
    height: 100%;
    background-color: rgb(255, 255, 255);
    }
    .map{
      width: 100%;
      height: 80vh;
    }
</style>

<?php
$result = mysqli_query($conn, $sql) or die("Query Failed.");
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_assoc($result))

                      
       {?>
       


    <div class="image">
        <img src="imageView6.php?image_id=<?php echo $row["ID"]; ?>"width="100%" height="100%" />

        <div class="container">
          <div class="caption1">
            <h1><?php echo $row["A_Name"]; ?></h1>
            
            
          </div>
        </div>
    </div>
     
    <div class="container mt-5 my">


<div class="row col-lg-12 bg-light ml-0">
  <div class="col-lg-6">
   
    <p class="h3">Introduction</p>
    <dt><?php echo $row["A_summary"]; ?></dt>
    
    <p class="small mt-4"><?php echo $row["A_Details"]; ?></p>
  </div>

  <div class="col-lg-6">

    <div class="col-lg-12 mt-4 border">
      <div class="row ml-0"><dt class="mr-1">Location :</dt><p><?php echo $row["A_Location"]; ?></p></div>
      <div class="row ml-0"><dt class="mr-1">Style :</dt><p><?php echo $row["Style"]; ?></p></div>
      <div class="row ml-0"><dt class="mr-1">No. of Rooms :</dt><p><?php echo $row["No_of_rooms"]; ?></p></div>
      <div class="row ml-0"><dt class="mr-1">Key Features :</dt><p><?php echo $row["Key_features"]; ?></p></div>
    </div>
    
    <div class="col-lg-12 mt-4">
        <div class="row1">
    <?php
              $sql = "SELECT * FROM `t_image`  WHERE `A_ID` = ".$row["ID"];
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
          </div>

          <div class="more">

              <?php
              $sql = "SELECT * FROM `t_image`  WHERE `A_ID` = ".$row["ID"];
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

  

  <div class="col-lg-12">
    <div class="map">
      <iframe src="<?php echo $row["A_Link"] ?>" width="100%" height="100%"></iframe>
    </div>
  </div>



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
    <p class="h3 text-center">Other Accommodation</p>
    
    <div class="wrapper">
        
    <div class="carousel owl-carousel">
    <?php
        $sql = "SELECT * FROM `p_accommodation` WHERE `A_ID` = ".$row["ID"];
        $result1 = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result1) > 0){
            while($row2 = mysqli_fetch_assoc($result1)) {

        $sql = "SELECT * FROM `p_accommodation` WHERE `P_ID` = ".$row2["P_ID"];
        $result2 = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result2) > 0){
            while($row3 = mysqli_fetch_assoc($result2)) {

        $sql = "SELECT * FROM `t_accommodation` WHERE `ID` = ".$row3["A_ID"];
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                ?>
      <div class="card">
          <div class="card_image">
      <img src="imageView6.php?image_id=<?php echo $row["ID"]; ?>"width="100%" height="100%" /> 
      </div>
      <div class="my-card-body">
          <dt><?php echo $row["A_Name"]; ?></dt>
          <p><em><?php echo $row["A_Location"]; ?></em></p>
      <p class=" col-lg-12"></p>
      <p class="small"><?php echo $row["A_summary"]; ?></p>
      <div class="col-lg-12 text-end">
      <a href="accommodation.php?id=<?php echo $row['ID']; ?>">
      <p class="btn btn-success ">More</p></a>
      </div>
      </div>
      </div>

      <?php }
        }
      }
    }
  }}
        ?>
      </div>
     
    </div>
    
  </div>
</div>
</div>
 
</div>
    

<?php
       }
    }
    ?>
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

<script src="../assets\vendor\jquery\jquery.min.js"></script>
    <script>
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