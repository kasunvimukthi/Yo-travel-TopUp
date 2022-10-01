 <link href="../style.css" rel='stylesheet' type='text/css' />
    <section id="sliderr">
        <div class="slider">
            <h1>Most Popular Itineraries</h1>
            
                    <div class="slide-container">
                    <img id="slide-left" class="arrow" src="../images/arrow-left.png">
                <section class="container" id="slider">
                    
                <?php
                        $conn=mysqli_connect("localhost","root","","traveldb");
                        $sql = "SELECT * FROM `package` ORDER BY RAND () LIMIT 10";
                        $result = mysqli_query($conn, $sql);
                        ?>

                    <?php
                        while($row = mysqli_fetch_array($result)) {
                        ?>

                    <div class="thumbnail">
                    <a href="selectpackage.php?id=<?php echo $row['Travel_ID']; ?>">
                    <img src="imageView1.php?image_id=<?php echo $row["Travel_ID"]; ?>" width="100%" height="100%" /></a>
                        <div class="product-details">
                        <a href="selectpackage.php?id=<?php echo $row['Travel_ID']; ?>">
                            <h2><?php echo $row["T_Name"]; ?></h2></a>
                            <h3><?php echo $row["T_Locations"]; ?></h3>
                            <h4><?php echo $row["T_Days"]; ?> Days</h4>
                            <p><?php echo $row['T_Details']; ?></p>
                            <h5>Starting from RS.<?php echo $row['T_Cost']; ?> per person</h5>
                            <a href="selectpackage.php?id=<?php echo $row['Travel_ID']; ?>">
                            <h6>More Info</h6></a>
                        </div>
                    </div>
                    <?php }
                            ?>
                </section>
                <img id="slide-right" class="arrow" src="../images/arrow-right.png">
            </div>
        </div>
    </section>

    <script >
        let thumbnails = document.getElementsByClassName('thumbnail');
        let slider = document.getElementById('slider');

        let buttonRight = document.getElementById('slide-right');
        let buttonLeft = document.getElementById('slide-left');

        buttonLeft.addEventListener('click', function(){
            slider.scrollLeft -= 125;
        })

        buttonRight.addEventListener('click', function(){
            slider.scrollLeft += 125;
        })

        const maxScrollLeft = slider.scrollWidth - slider.clientWidth;
        // alert(maxScrollLeft);
        // alert("Left Scroll:" + slider.scrollLeft);

        //AUTO PLAY THE SLIDER 
        function autoPlay() {
            if (slider.scrollLeft > (maxScrollLeft - 1)) {
                slider.scrollLeft -= maxScrollLeft;
            } else {
                slider.scrollLeft += 1;
            }
        }
        let play = setInterval(autoPlay, 50);

        // PAUSE THE SLIDE ON HOVER
        for (var i=0; i < thumbnails.length; i++){

        thumbnails[i].addEventListener('mouseover', function() {
            clearInterval(play);
        });

        thumbnails[i].addEventListener('mouseout', function() {
            return play = setInterval(autoPlay, 50);
        });
        }
    </script>