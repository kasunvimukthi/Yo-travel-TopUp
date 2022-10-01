<section id="counts" class="counts liner_colour_black">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <i class="icofont-eye"></i>
            <span data-toggle="counter-up">
            <?php
                $ip = $_SERVER['REMOTE_ADDR'];
                
                $query2 = "SELECT * FROM visitors WHERE IP = ('$ip')";
                $result = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result) < 1)
                {
                    $query1 = "INSERT INTO visitors (IP) VALUES ('$ip')";
                    mysqli_query($conn,$query1);
                }
                

                $query="SELECT ID FROM visitors ORDER BY ID";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;

            ?>
            </span>
            <p>Visitors</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <i class="icofont-library"></i>
            <span data-toggle="counter-up">
            <?php
                $query="SELECT C_ID FROM catogory ORDER BY C_ID";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;

            ?>
            </span>
            <p>Categories</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <i class="icofont-package"></i>
            <span data-toggle="counter-up">
            <?php
                $query="SELECT Travel_ID FROM package ORDER BY Travel_ID";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;

            ?>
            </span>
            <p>Packages</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <i class="icofont-map-pins"></i>
            <span data-toggle="counter-up">
            <?php
                $query="SELECT ID FROM t_itinerary ORDER BY ID";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;

            ?>
            </span>
            <p>Itinerary</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->