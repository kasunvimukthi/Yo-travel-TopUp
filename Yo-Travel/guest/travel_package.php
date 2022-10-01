<?php
    
    // include header.php file
    include ('template/header.php');
    include "db_conn.php";


    $sql = "SELECT * FROM `package` ORDER BY RAND () LIMIT 1"; 
    $result = mysqli_query($conn, $sql);
    ?>
    <link href="../style.css" rel='stylesheet' type='text/css' />
    <?php
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result))
                    
    {?>
    <section id="hero">
        <div class="carousel-item active">
            <img src="imageView1.php?image_id=<?php echo $row["Travel_ID"]; ?>"width="100%" height="100%" />
                <div class="carousel-container">
                    <div class="carousel-content">
                        <h2 class="animate__animated animate__fadeInDown">Travel Packages</h2>
                        
                    </div>
                    
                </div>
        </div>
        </section>
        <?php
         }
        }
        
                // include count.php file
    include ('../template/count.php');
    ?>

        <div class="col-md-12 row ml-0">

            <div class="col-md-4 bg-light small mt-1">
                <div class="position-sticky" style="top: 5rem;">
                    
                    <div class="row mt-5 col-md-12">
                            <h2 style="color: black;">Filter by Date and Price</h2>
                        </div>

                        <div class="row mt-4">
                            <label for="option" class="form-label col-md-3">Category</label>
                            <select name="category" id="category" class="form-control col-md-8">
                                <option value="0">All Category</option>
                                <?php 
		                    		require 'db_conn.php';
                                    $query = "SELECT * FROM catogory ORDER BY C_Name ASC"; 
                                    $result = $conn->query($query);
                                    
                                    if($result->num_rows > 0){ 
                                        while($row = $result->fetch_assoc()){  
                                            echo '<option value="'.$row['C_ID'].'">'.$row['C_Name'].'</option>'; 
                                        } 
                                    }else{ 
                                        echo '<option value="">Catogory not available</option>'; 
                                    }

		                    	 ?>
		                    </select>
                            </select>
                        </div>

                        <div class="row mt-4">
                            <label for="from" class="form-label col-md-3">Start Date</label>
                            <?php $date = date("Y"); ?>
                            <input type="date" class="form-control col-md-8" id="from" value="<?php echo $date ?>-01-01">
                        </div>

                        <div class="row mt-4">
                            <label for="to" class="form-label col-md-3">End Date</label>
                            <?php $date1 = date("Y")+1; ?>
                            <input type="date" class="form-control col-md-8" id="to" value="<?php echo $date1 ?>-12-31">
                        </div>

                        <div class="list-group pt-4">
                            <input type="hidden" name="" id="minimum_price" value="0">
                            <input type="hidden" name="" id="max_price" value="100000">
                            <div class="row">
                            <p class="pl-3">Rs.</p>
                            <p id="price_show">1000 - 100000</p>
                            </div>
                            <div id="price_range">
                            </div>
                            <div class="row pt-1">
                                <p class="pl-2">Min</p>
                                <div class="text-right col">
                                <p>Max</p></div>
                            </div>
                        </div>

                        
                    
                </div>
            </div>

            <div class="col-md-8  mt-1 filter_data">
                <div  id="filter_data"></div>
              
           
         
            </div> 
        </div>

    <?php
        // include tab1.php file
        include ('../template/slider.php');
          
    // include contact.php file
    include ('../template/contact.php');

    // include footer.php file
    include ('template/footer.php');

    // Chat-Bot
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
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>
<script>
    
    $(document).ready(function()
{
    filter_data();

        function filter_data()
        {
            $('#filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#minimum_price').val();
            var maximum_price = $('#max_price').val();
            var start_date = $('#from').val();
            var end_date = $('#to').val();
            var category = $('#category').val();
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, start_date:start_date, end_date:end_date, category:category},
                success:function(data){
                    $('#filter_data').html(data);
                }
            });
        }
        
        $('#from').change(function(){
            filter_data();
        });

        $('#to').change(function(){
            filter_data();
        });

        $('#category').change(function(){
            filter_data();
        });

        $('#price_range').slider({
        range:true,
        min: 1000,
        max: 100000,
        values: [1000, 100000],
        step: 500,
        stop:function(event, ui)
        {
          $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
          $('#minimum_price').val(ui.values[0]);
          $('#max_price').val(ui.values[1]);
          filter_data();
        }
      });
    });
</script>

