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
            <h6 class="m-0 font-weight-bold text-primary">Package Activity 
            <button class="btn btn-primary" id="Activity_new">New</button></h6>
            <!-- <form enctype="multipart/form-data" method="post" id="package_activity_form">

                
                <div class="form-control d-flex align-items-center pt-4 pb-4">
                
                    <label class="ml-4">Category</label>
                   
                    <select  id="act_category" name="act_category" class="ml-4">
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
                    <label class="ml-5">Package</label>
                    <select id="act_package" name="act_package" class="ml-4">
                    <option selected="" disabled="">Select Package</option>
                    </select>
                    <input type="hidden" name="act_id" value="0" id="act_id">

                    </div>
                
                </form> -->
            </div>
            <div class="card-body"  style="height: 70vh; overflow-y: scroll;" id="activity_data">
            
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
