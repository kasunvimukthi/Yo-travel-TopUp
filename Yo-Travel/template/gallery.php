<!-- ======= Gallery Section ======= -->
<section id="gallery">
  <div class="gallery  col-lg-11">
      
<div class=" from-right">
        <div class="section-title">
          <h2 class="fadein">Some photos from <span>Our Photo Gallery</span></h2>
          <p></p>
        </div>

        <?php
						$conn1=mysqli_connect("localhost","root","","traveldb");
								$sql = "SELECT * FROM `package` WHERE Status=1 ORDER BY RAND () LIMIT 8";
								$result1 = mysqli_query($conn1, $sql) or die("Query Failed.");
								if(mysqli_num_rows($result1) > 0){
								while($row1 = mysqli_fetch_assoc($result1)) {?>

        <div class="gallery-row ">

              <a href="imageView1.php?image_id=<?php echo $row1["Travel_ID"]; ?>" class="venobox" data-gall="gallery-item" width="100%" height="100%">
                <img src="imageView1.php?image_id=<?php echo $row1["Travel_ID"]; ?>" width="100%" height="100%">
                <div class="layer">
                  <p><?php echo $row1["T_Name"]; ?></p>
                </div>
              </a>
        </div>
        <?php }
                }?>
        
                
      </div>
      </div>
      
    </section><!-- End Gallery Section -->
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
    