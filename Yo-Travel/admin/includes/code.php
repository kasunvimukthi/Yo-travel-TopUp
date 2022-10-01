<?php 
    include ('includes/check_login.php');
    include "../db_conn.php";
// ===============================================================================================
//                                           ADMIN ADD START
// ===============================================================================================
    if(isset($_POST['A_add'])) {

    $name = $_POST['add_Name'];
    $Email_Address = $_POST['add_Email'];
    $Phone_Number = $_POST['add_Number'];
    $re_pass = $_POST['add_reassword'];
    $pass = $_POST['add_Password'];

	if (empty($name)) {
        $_SESSION['status'] = "Admin Name Is Required";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
		
	    exit();
	}else if(empty($pass)){
        $_SESSION['status'] = "Admin Password Is Required";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        
	    exit();
	}
	else if(empty($re_pass)){
        $_SESSION['status'] = "Admin Re-type Password is required";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        
	    exit();
	}

	else if(empty($Email_Address)){
        $_SESSION['status'] = "Admin Email Address Is Required";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        
	    exit();
	}

	else if(empty($Phone_Number)){
        $_SESSION['status'] = "Admin Phone Number is required";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        
	    exit();
	}

	else if($pass !== $re_pass){
        $_SESSION['status'] = "The confirmation password  does not match";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM admin WHERE A_Email='$Email_Address' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
            $_SESSION['status'] = "The Email is taken try anothe";
            $_SESSION['status_code'] ="error";
             header('location: ../admin_view.php');
			
	        exit();
		}else {
           $sql2 = "INSERT INTO admin(A_Name, A_Password, A_Email, A_Number) VALUES('$name','$pass','$Email_Address', '$Phone_Number')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
            $_SESSION['status'] = "Admin Account Has Been Created Successfully";
            $_SESSION['status_code'] ="success";
            header('location: ../admin_view.php');
           	 
	         exit();
           }else {
            $_SESSION['status'] = "Unknown Error Occurred";
            $_SESSION['status_code'] ="error";
            header('location: ../admin_view.php');
	           	
		        exit();
           }
		}
	}
	
    }
// ===============================================================================================
//                                           ADMIN EDIT START
// ===============================================================================================
  if(isset($_POST['A_edit']))
  {
      
    $id = $_POST['edit_ID'];
    $name = $_POST['edit_Name'];
    $email = $_POST['edit_Email'];
    $number = $_POST['edit_Number'];
    $password = md5($_POST['edit_Password']);

  
        $sql = "SELECT * FROM admin WHERE A_ID='$id' AND A_Password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['A_Password'] === $password) {
 
  
        $query = "UPDATE admin SET A_Name='$name',A_Password='$password',A_Email='$email',A_Number='$number' WHERE A_ID='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
        $_SESSION['status'] = "Admin Data Is Updated Now";
        $_SESSION['status_code'] ="success";
        header('location: ../admin_view.php');
        }
        else
        {
        $_SESSION['status'] = "Admin Data Is Not Updated";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        }
    }
    exit();
    }
    else
    {
        $_SESSION['status'] = "Admin Password Does't Match";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        exit();
    }
    }
// ===============================================================================================
//                                           ADMIN DELETE START
// ===============================================================================================
  if(isset($_POST['A_delete']))
  {
      
    $id = $_POST['delete_ID'];
    
    $password = md5($_POST['delete_Password']);

  
        $sql = "SELECT * FROM admin WHERE A_ID='$id' AND A_Password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['A_Password'] === $password) {
 
  
        $query = "DELETE FROM admin WHERE A_ID='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
        $_SESSION['status'] = "Admin Data Is Deleted Now";
        $_SESSION['status_code'] ="success";
        header('location: ../admin_view.php');
        }
        else
        {
        $_SESSION['status'] = "Admin Data Is Not Deleted";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        }
    }
    exit();
    }else{
        $_SESSION['status'] = "Admin Password Does't Match";
        $_SESSION['status_code'] ="error";
        header('location: ../admin_view.php');
        exit();
    }
    }
// ===============================================================================================
//                                           CATEGORY ADD START
// ===============================================================================================
    if(isset($_POST["C_add"])){ 
    if(!empty($_FILES["cat_image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["cat_image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        
        $name = $_POST['cat_Name'];
        $c_details = $_POST['cat_details'];
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['cat_image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));
         
            // Insert image content into database 
            $insert = $conn->query("INSERT into catogory (C_Name, C_Image, C_Details) VALUES ('$name', '$imgContent', '$c_details')"); 

            if($insert){ 
                $_SESSION['status'] = "New Category Has Been Created Successfully";
                $_SESSION['status_code'] ="success";
                header('location: ../category.php');
            }else{ 
                
                $_SESSION['status'] = "File upload failed, please try again";
                $_SESSION['status_code'] ="error";
                header('location: ../category.php');
            }  
        }else{ 
            
            $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload";
            $_SESSION['status_code'] ="error";
            header('location: ../category.php');
        } 
    }else{ 
        
            $_SESSION['status'] = "Please select an image file to upload";
            $_SESSION['status_code'] ="error";
            header('location: ../category.php');
    } 
    } 
// ===============================================================================================
//                                          CATEGORY EDIT START
// ===============================================================================================
    if(isset($_POST["C_Edit"])){ 
        if(!empty($_FILES["ecat_image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["ecat_image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            
            $id = $_POST['editc_ID'];
            $name = $_POST['ecat_Name'];
            $c_details = $_POST['ecat_details'];
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['ecat_image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image));
    
                // Insert image content into database 
                $insert = $conn->query("UPDATE catogory SET C_Name='$name',C_Image='$imgContent',C_Details='$c_details' WHERE C_ID='$id' ");
                
                if($insert){ 
                    $_SESSION['status'] = " Category Has Been Edit Successfully";
                    $_SESSION['status_code'] ="success";
                    header('location: ../category.php');
                }else{ 
                    
                    $_SESSION['status'] = "File upload failed, please try again";
                    $_SESSION['status_code'] ="error";
                    header('location: ../category.php');
                }  
            }else{ 
                
                $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload";
                $_SESSION['status_code'] ="error";
                header('location: ../category.php');
            } 
        }else{ 
            
                $_SESSION['status'] = "Please select an image file to upload";
                $_SESSION['status_code'] ="error";
                header('location: ../category.php');
        } 
    } 
// ===============================================================================================
//                                          CATEGORY DELETE START
// ===============================================================================================
 if(isset($_POST['Cat_Delete']))
 {
    
  $id = $_POST['deletec_ID'];

      $query = "DELETE FROM catogory WHERE C_ID='$id' ";
      $query_run = mysqli_query($conn, $query);

      if($query_run){
      $_SESSION['status'] = "Category Data Is Deleted Now";
      $_SESSION['status_code'] ="success";
      header('location: ../category.php');
      }
      else
      {
      $_SESSION['status'] = "Category Data Is Not Deleted";
      $_SESSION['status_code'] ="error";
      header('location: ../category.php');
      }
  }
// ===============================================================================================
//                                          PACKAGE ADD START
// ===============================================================================================
    if(isset($_POST["P_add"])){ 
        if(!empty($_FILES["pak_image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["pak_image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            
            $p_id = $_POST['editp_ID'];
            $c_id = $_POST['scategory'];
            $p_name = $_POST['pak_Name'];
            $p_cost = $_POST['pak_Cost'];
            $p_details = $_POST['pak_details'];
            $p_location = $_POST['pak_Loacation'];
            $p_map = $_POST['pak_Map'];
            $p_num = $_POST['pak_nu'];
            $p_date = $_POST['pak_date'];
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['pak_image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image));
                
                // Insert image content into database 

                $insert = $conn->query("INSERT into package (C_ID, T_Name, T_Cost, T_Image, T_Details, T_Locations, T_Map, T_Days, T_Date)
                VALUES ('$c_id', '$p_name', '$p_cost', '$imgContent', '$p_details', '$p_location', '$p_map', '$p_num', '$p_date')"); 

                if($insert){ 
                    $_SESSION['status'] = "New Package Has Been Created Successfully";
                    $_SESSION['status_code'] ="success";
                    header('location: ../package.php');
                }else{ 
                    
                    $_SESSION['status'] = "File upload failed, please try again";
                    $_SESSION['status_code'] ="error";
                    header('location: ../package.php');
                }  
            }else{ 
                
                $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload";
                $_SESSION['status_code'] ="error";
                header('location: ../package.php');
            } 
        }else{ 
            
                $_SESSION['status'] = "Please select an image file to upload";
                $_SESSION['status_code'] ="error";
                header('location: ../package.php');
        } 
    } 
// ===============================================================================================
//                                          PACKAGE EDIT START
// ===============================================================================================
    if(isset($_POST["P_Edit"])){ 
    if(!empty($_FILES["epak_image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["epak_image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        
        $p_id = $_POST['editp_ID'];
        $c_id = $_POST['ecategory'];
        $p_name = $_POST['epak_Name'];
        $p_cost = $_POST['epak_Cost'];
        $p_details = $_POST['epak_details'];
        $p_location = $_POST['epak_loc'];
        $p_map = $_POST['epak_map'];
        $p_num = $_POST['epak_nu'];
        $p_date = $_POST['epak_date'];
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['epak_image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));
  
            // Insert image content into database 
            $insert = $conn->query("UPDATE package SET C_ID='$c_id',T_Name='$p_name',T_Cost='$p_cost',T_Image='$imgContent',T_Details='$p_details',T_Locations='$p_location',T_Map='$p_map',T_Days='$p_num',T_Date='$p_date' WHERE Travel_ID='$p_id' ");
            
            if($insert){ 
                $_SESSION['status'] = "Package Data Has Been Edit Successfully";
                $_SESSION['status_code'] ="success";
                header('location: ../package.php');
            }else{ 
                
                $_SESSION['status'] = "File upload failed, please try again";
                $_SESSION['status_code'] ="error";
                header('location: ../package.php');
            }  
        }else{ 
            
            $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload";
            $_SESSION['status_code'] ="error";
            header('location: ../package.php');
        } 
    }else{ 
        
            $_SESSION['status'] = "Please select an image file to upload";
            $_SESSION['status_code'] ="error";
            header('location: ../package.php');
    } 
    } 
// ===============================================================================================
//                                           PACKAGE DELETE START
// ===============================================================================================
    if(isset($_POST['pac_Delete']))
    {
    
    $id = $_POST['deletep_ID'];
    

        $query = "DELETE FROM package WHERE Travel_ID='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
        $_SESSION['status'] = "Package Data Is Deleted Now";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php');
        }
        else
        {
        $_SESSION['status'] = "Package Data Is Not Deleted";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                         HIGHLIGHT INSERT START
// ===============================================================================================
    if(isset($_POST['H_add']))
    {
    
    $id = $_POST['Highlights_ID'];
    $t_id = $_POST['t_ID1'];
    $Highlight = $_POST['N_Highlight'];

    
        $insert = $conn->query("INSERT into t_highlights (T_ID, Highlights) VALUES ('$t_id', '$Highlight')");

        if($insert){
        $_SESSION['status'] = "Package Highlight Is Insert Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package Highlight Is Not Insert";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                           HIGHLIGHT EDIT START
// ===============================================================================================
    if(isset($_POST['H_edit']))
    {
    
    $id = $_POST['Highlights_ID'];
    $t_id = $_POST['t_ID'];
    $Highlight = $_POST['Highlight'];


                    
        $insert = $conn->query("UPDATE t_highlights SET T_ID='$t_id', Highlights='$Highlight' WHERE ID='$id'&& T_ID='$t_id' ");

        if($insert){
        $_SESSION['status'] = "Package Highlight Is Update Now";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php');
        }
        else
        {
        $_SESSION['status'] = "Package Highlight Is Not Update Now";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                           HIGHLIGHT DELETE START
// ===============================================================================================
    if(isset($_POST['H_delete']))
    {
    
    $id = $_POST['Highlights_ID'];
    $t_id = $_POST['t_ID'];
    $Highlight = $_POST['N_Highlight'];

        $query = "DELETE FROM t_highlights WHERE ID='$id' ";
        $query_run = mysqli_query($conn, $query);


        if($query_run){
        $_SESSION['status'] = "Package Highlight Is Delete Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package Highlight Is Not Delete";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                       ALL HIGHLIGHT DELETE START
// ===============================================================================================
    if(isset($_POST['H_Adelete']))
    {
    
    $id = $_POST['Highlights_ID'];
    $t_id = $_POST['t_ID'];
    $Highlight = $_POST['N_Highlight'];

        $query = "DELETE FROM t_highlights WHERE T_ID='$t_id' ";
        $query_run = mysqli_query($conn, $query);


        if($query_run){
        $_SESSION['status'] = "Package All Highlight Is Delete Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package All Highlight Is Not Delete";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                         INCLUDES INSERT START
// ===============================================================================================
    if(isset($_POST['I_add']))
    {
    

    $t_id = $_POST['t_ID1'];
    $Include = $_POST['N_Include'];

    
        $insert = $conn->query("INSERT into t_includes (T_ID, Includes) VALUES ('$t_id', '$Include')");

        if($insert){
        $_SESSION['status'] = "Package Include Is Insert Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package Include Is Not Insert";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                           INCLUDES EDIT START
// ===============================================================================================
    if(isset($_POST['I_edit']))
    {
    
    $id = $_POST['Includes_ID'];
    $t_id = $_POST['t_ID'];
    $Include = $_POST['Include'];


                    
        $insert = $conn->query("UPDATE t_includes SET T_ID='$t_id', Includes='$Include' WHERE ID='$id'&& T_ID='$t_id' ");

        if($insert){
        $_SESSION['status'] = "Package Include Is Update Now";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php');
        }
        else
        {
        $_SESSION['status'] = "Package Include Is Not Update Now";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                           INCLUDES DELETE START
// ===============================================================================================
    if(isset($_POST['I_delete']))
    {
    
        $id = $_POST['Includes_ID'];

        $query = "DELETE FROM t_includes WHERE ID='$id' ";
        $query_run = mysqli_query($conn, $query);


        if($query_run){
        $_SESSION['status'] = "Package Include Is Delete Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package Include Is Not Delete";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                       ALL INCLUDES DELETE START
// ===============================================================================================
    if(isset($_POST['I_Adelete']))
    {
    
        $id = $_POST['Includes_ID'];
        $t_id = $_POST['t_ID'];
        $Include = $_POST['Include'];

        $query = "DELETE FROM t_includes WHERE T_ID='$t_id' ";
        $query_run = mysqli_query($conn, $query);


        if($query_run){
        $_SESSION['status'] = "Package All Includes Is Delete Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package All Includes Is Not Delete";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                    TERMS & CODITIONS INSERT START
// ===============================================================================================
    if(isset($_POST['T&C_add']))
    {
    
    $t_id = $_POST['t_ID1'];
    $Term = $_POST['N_Term'];

    
        $insert = $conn->query("INSERT into t_conditions (T_ID, Conditions) VALUES ('$t_id', '$Term')");

        if($insert){
        $_SESSION['status'] = "Package Term / Condition Is Insert Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package Term / Condition Is Not Insert";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                       TERMS & CODITIONS EDIT START
// ===============================================================================================
    if(isset($_POST['T&C_edit']))
    {
    
    $id = $_POST['Terms_ID'];
    $t_id = $_POST['t_ID'];
    $term = $_POST['Terms'];


                    
        $insert = $conn->query("UPDATE t_conditions SET T_ID='$t_id', Conditions='$term' WHERE ID='$id'&& T_ID='$t_id' ");

        if($insert){
        $_SESSION['status'] = "Package Term / Condition Is Update Now";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php');
        }
        else
        {
        $_SESSION['status'] = "Package Term / Condition Is Not Update Now";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                       TERMS & CODITIONS DELETE START
// ===============================================================================================
    if(isset($_POST['T&C_delete']))
    {
        $id = $_POST['Terms_ID'];

        $query = "DELETE FROM t_conditions WHERE ID='$id' ";
        $query_run = mysqli_query($conn, $query);


        if($query_run){
        $_SESSION['status'] = "Package Term / Condition Is Delete Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package Term / Condition Is Not Delete";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                    ALL TERMS & CODITIONS DELETE START
// ===============================================================================================
    if(isset($_POST['T&C_Adelete']))
    {
    

        $t_id = $_POST['t_ID'];


        $query = "DELETE FROM t_conditions WHERE T_ID='$t_id' ";
        $query_run = mysqli_query($conn, $query);


        if($query_run){
        $_SESSION['status'] = "Package All Terms / Conditions Are Delete Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package All Terms / Conditions Are Not Delete";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }


    // ===============================================================================================
    //                                        PACKAGE IMAGE ADD START
    // ===============================================================================================
    if(isset($_POST["Img_add"])){ 
        if(!empty($_FILES["pak_image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["pak_image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            
            $t_id = $_POST['t_ID1'];
            
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['pak_image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image));
                
                // Insert image content into database 

                $insert = $conn->query("INSERT into t_image (T_ID, T_Image)
                VALUES ('$t_id', '$imgContent')"); 

                if($insert){ 
                    $_SESSION['status'] = "New Image Has Been Uploaded Successfully";
                    $_SESSION['status_code'] ="success";
                    header('location: ../package.php');
                }else{ 
                    
                    $_SESSION['status'] = "Image upload failed, please try again";
                    $_SESSION['status_code'] ="error";
                    header('location: ../package.php');
                }  
            }else{ 
                
                $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload";
                $_SESSION['status_code'] ="error";
                header('location: ../package.php');
            } 
        }else{ 
            
                $_SESSION['status'] = "Please select an image file to upload";
                $_SESSION['status_code'] ="error";
                header('location: ../package.php');
        } 
    } 
// ===============================================================================================
//                                       PACKAGE IMAGE DELETE START
// ===============================================================================================
    if(isset($_POST['Img_delete']))
    {
        $id = $_POST['Img_ID'];

        $query = "DELETE FROM t_image WHERE ID='$id' ";
        $query_run = mysqli_query($conn, $query);


        if($query_run){
        $_SESSION['status'] = "Package Image Is Delete Successfully";
        $_SESSION['status_code'] ="success";
        header('location: ../package.php'); 
        }
        else
        {
        $_SESSION['status'] = "Package Image Is Not Delete";
        $_SESSION['status_code'] ="error";
        header('location: ../package.php');
        }
    }
// ===============================================================================================
//                                       PACKAGE ALL IMAGE DELETE START
// ===============================================================================================
if(isset($_POST['Img_Adelete']))
{
    $id = $_POST['t_ID'];

    $query = "DELETE FROM t_image WHERE T_ID='$id' ";
    $query_run = mysqli_query($conn, $query);


    if($query_run){
    $_SESSION['status'] = "Package All Image Is Delete Successfully";
    $_SESSION['status_code'] ="success";
    header('location: ../package.php'); 
    }
    else
    {
    $_SESSION['status'] = "Package All Image Is Not Delete";
    $_SESSION['status_code'] ="error";
    header('location: ../package.php');
    }
}
// ===============================================================================================
//                                          PACKAGE EDIT START
// ===============================================================================================
    if(isset($_POST["Iti_Edit"])){ 
        if(!empty($_FILES["eiti_image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["eiti_image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            
            $i_id = $_POST['editi_ID'];
            $i_date = $_POST['eiti_Date'];
            $i_loc = $_POST['eiti_Loc'];
            $i_det = $_POST['eiti_details'];
            $i_acc = $_POST['iti_acc'];
            $i_act = $_POST['iti_act'];
            
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['eiti_image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image));
    
                // Insert image content into database 
                $insert = $conn->query("UPDATE t_itinerary SET I_Date='$i_date',I_Locations='$i_loc',I_Details='$i_det',I_Accommodations='$i_acc',I_Activities='$i_act',I_Image='$imgContent' WHERE ID='$i_id' ");
                
                if($insert){ 
                    $_SESSION['status'] = "Package Itinerary Data Has Been Edit Successfully";
                    $_SESSION['status_code'] ="success";
                    header('location: ../itinerary.php');
                }else{ 
                    
                    $_SESSION['status'] = "File upload failed, please try again";
                    $_SESSION['status_code'] ="error";
                    header('location: ../itinerary.php');
                }  
            }else{ 
                
                $_SESSION['status'] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload";
                $_SESSION['status_code'] ="error";
                header('location: ../itinerary.php');
            } 
        }else{ 
            
                $_SESSION['status'] = "Please select an image file to upload";
                $_SESSION['status_code'] ="error";
                header('location: ../itinerary.php');
        } 
        } 
?>



