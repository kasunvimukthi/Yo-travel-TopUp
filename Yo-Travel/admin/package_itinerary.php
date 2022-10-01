<?php 
    include ('includes/check_login.php'); 
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    ?>

      <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Package Itinerary 
            <button class="btn btn-primary" id="itinerary_new">New</button></h6>
            <form enctype="multipart/form-data" method="post" id="package_itinerary_form">

                
                <div class="d-flex align-items-center row">
                
                    <label class="ml-4">Category</label>
                   
                    <select  id="category" name="category" class="ml-4">
		                    	<option selected="" disabled="">Select Category</option>
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
                    <label class="ml-4">Package</label>
                    <select id="package" name="package" class="ml-4">
                    <option selected="" disabled="">Select Package</option>
                    </select>
                    <input type="hidden" name="id" value="0" id="id">

                    </div>
                
                </form>
            </div>
            <div class="card-body"  style="height: 62vh; overflow-y: scroll;" id="itineray_data">
            
            </div>
        </div>
    </div>

    <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
  
?>
<script type="text/javascript">

			

// ========================================== OTHER METHOD ===================================================
        // $(document).ready(function(){
		// 	$("#category").change(function(){
		// 		var aid = $("#category").val();
		// 		$.ajax({
		// 			url: 'data.php',
		// 			method: 'post',
		// 			data: 'aid=' + aid,
        //             success:function(html){
        //             $('#package').html(html);
                     
        //         }
		// 		});
		// 	});
		// })

        // $(document).ready(function(){
		// 	$("#package").mouseup(function(){
		// 		var pid = $("#package").val();
		// 		$("#id").val (pid);
		// 	})
		// })
