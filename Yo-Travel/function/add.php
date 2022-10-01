<?php

// =============================Select Image 1======================================================
    function Image1(){
        $conn=mysqli_connect("localhost","root","","traveldb");
        $sql = "SELECT `C_ID` FROM `catogory` WHERE `C_ID` = 1"; 
        $result = mysqli_query($conn, $sql);
        ?>

        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>
            <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
        
        <?php		
        }
        
    }

// =============================Select Image 2======================================================
    function Image2(){
        $conn=mysqli_connect("localhost","root","","traveldb");
        $sql = "SELECT `C_ID` FROM `catogory` WHERE `C_ID` = 2"; 
        $result = mysqli_query($conn, $sql);
        ?>

        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>
            <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
        
        <?php		
        }
        
    }
// =============================Select Image 3======================================================
    function Image3(){
        $conn=mysqli_connect("localhost","root","","traveldb");
        $sql = "SELECT `C_ID` FROM `catogory` WHERE `C_ID` = 3"; 
        $result = mysqli_query($conn, $sql);
        ?>

        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>
            <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
        
        <?php		
        }
        
    }

    // =============================Select Image 4======================================================
    function Image4(){
        $conn=mysqli_connect("localhost","root","","traveldb");
        $sql = "SELECT `C_ID` FROM `catogory` WHERE `C_ID` = 4"; 
        $result = mysqli_query($conn, $sql);
        ?>

        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>
            <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
        
        <?php		
        }
        
    }
    
    // =============================Select Image 5======================================================
    function Image5(){
        $conn=mysqli_connect("localhost","root","","traveldb");
        $sql = "SELECT `C_ID` FROM `catogory` WHERE `C_ID` = 5"; 
        $result = mysqli_query($conn, $sql);
        ?>

        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>
            <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
        
        <?php		
        }
        
    }
    
    // =============================Select Image 6======================================================
    function Image6(){
        $conn=mysqli_connect("localhost","root","","traveldb");
        $sql = "SELECT `C_ID` FROM `catogory` WHERE `C_ID` = 6"; 
        $result = mysqli_query($conn, $sql);
        ?>

        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>
            <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="100%" /><br/>
        
        <?php		
        }
        
    }
// =============================Select Image1 Name==================================================
        function Image1Name(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 1"; 
            $result = mysqli_query($conn, $sql);
            ?>
    
            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[1]; ?>
            
            <?php		
            }
            
        }

// =============================Select Image2 Name==================================================
        function Image2Name(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 2"; 
            $result = mysqli_query($conn, $sql);
            ?>
    
            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[1]; ?>
            
            <?php		
            }
            
        }

// =============================Select Image3 Name==================================================
        function Image3Name(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 3"; 
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[1]; ?>
            
            <?php		
            }
            
        }
        // =============================Select Image4 Name==================================================
        function Image4Name(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 4"; 
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[1]; ?>
            
            <?php		
            }
            
        }         
        // =============================Select Image5 Name==================================================
        function Image5Name(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 5"; 
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[1]; ?>
            
            <?php		
            }
            
        } // =============================Select Image6 Name==================================================
        function Image6Name(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 6"; 
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[1]; ?>
            
            <?php		
            }
            
        } 
// =============================Select Image1 Details===============================================
        function Image1Details(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 1"; 
            $result = mysqli_query($conn, $sql);
            ?>
    
            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[3]; ?>
            
            <?php		
            }
            
        }

// =============================Select Image2 Details===============================================
        function Image2Details(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 2"; 
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[3]; ?>
            
            <?php		
            }
    
        }        

// =============================Select Image3 Details===============================================
        function Image3Details(){
            $conn=mysqli_connect("localhost","root","","traveldb");
            $sql = "SELECT * FROM `catogory` WHERE `C_ID` = 3"; 
            $result = mysqli_query($conn, $sql);
            ?>

            <?php
            while($row = mysqli_fetch_array($result)) {
            ?>
                <?php echo $row[3]; ?>
            
            <?php		
            }

        }

// =============================Select Image3 Details===============================================
function Test1(){
    $conn=mysqli_connect("localhost","root","","traveldb");
    $sql = "SELECT * FROM `catogory` WHERE 1"; 
    $result = mysqli_query($conn, $sql);
    ?>

    <?php
    while($row = mysqli_fetch_array($result)) {
    ?>
        <?php echo $row[1]; ?>
    
    <?php		
    }

}
function Image0(){
    $conn=mysqli_connect("localhost","root","","traveldb");
    $sql = "SELECT C_ID FROM catogory order by C_ID DESC  limit 3";
    $result = mysqli_query($conn, $sql);
    ?>

    <?php
    while($row = mysqli_fetch_array($result)) {
    ?>
        <img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="25%" height="350px" /><br/>
    
    <?php
    }
}     
function Test10(){
    
    require_once "db_conn.php";
    $sql = "SELECT C_ID FROM catogory ORDER BY C_ID DESC"; 
    $result = mysqli_query($conn, $sql);
?>


<link href="imageStyles.css" rel="stylesheet" type="text/css" />

<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="imageView.php?image_id=<?php echo $row["C_ID"]; ?>"width="100%" height="350px" /><br/>
	
<?php		
	}
    mysqli_close($conn);
}
?>      

