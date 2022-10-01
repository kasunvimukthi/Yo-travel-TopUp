  <?php
  include "./db_conn.php";
  ?>

<!-- ===============================================================================================
                                          QR LOGIN MODAL
================================================================================================ -->
<div class="modal fade" id="login_qr_modal" tabindex="-1" role="dialog" aria-labelledby="login_qr_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login_qr_modal">Admin Login with QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <video id="login_qr_preview" width="100%"></video>
  
        </div>
        <form action="../admin/login_with_qr.php" method="post" id="login_with_qr">
              
            <input type="hidden" name="qr_email" id="qr_email" readonly placeholder="scan qrcode" class="form-control">
          
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          USER INVOICE VIEW MODAL
================================================================================================ -->
<div class="modal fade" id="user_invoice_view" tabindex="-1" role="dialog" aria-labelledby="user_invoice_view" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="user_invoice_view">Pacenger Booking Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="user_invoice_view_data"></div>
      <input type="hidden" name="IID" id="IID">
      <div id="user_payment_view"></div>
      
      </div>
      </div>
  </div>
  </div>

<!-- ===============================================================================================
                                          JOURNEY VIEW MODAL
================================================================================================ -->
<div class="modal fade" id="journey_list_view" tabindex="-1" role="dialog" aria-labelledby="journey_list_view" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="journey_list_view">Pacenger List View By Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="journey_list_view_data"></div>

        

      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          GUIDER VIEW MODAL
================================================================================================ -->
<div class="modal fade" id="Guider_list_view" tabindex="-1" role="dialog" aria-labelledby="Guider_list_view" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Guider_list_view">Guider's jorney list</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="guider_list_view_data">

      </div>

      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          GUIDER ALOCATE MODAL
================================================================================================ -->
<div class="modal fade" id="Guider_to_journey_view" tabindex="-1" role="dialog" aria-labelledby="Guider_to_journey_view" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Guider_to_journey_view">Guider Alocate To Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="Guider_to_journey_view_data"></div>
        <div class="form-group">
        <select name="scategory" id="Guider_list" class="btn-success form-control">
          <option value="">--Select--</option>
            <?php
            $connection = mysqli_connect("localhost","root","","traveldb");
            $query = "SELECT * FROM guider ";
            $query_run = mysqli_query($connection ,$query);
            if(mysqli_num_rows($query_run) > 0)
                {
                  while($row1 = mysqli_fetch_assoc($query_run))
                  {
            ?>
                
                <option value="<?php echo $row1['ID']; ?>"><?php echo $row1['G_Name']; ?></option>

            <?php }
              }?>
          </select>

        <input type="hidden" name="" id="G_ID" value="" class="form-control" >
        <input type="hidden" name="" id="P_ID" value="" class="form-control" >

      </div>

      <div id="guider_fetch"></div>
      
      </div>
      <div class="modal-footer">
        
        <button class="btn btn-success G_alocate" name="G_alocate" value="Allocate" id="G_alocate">Allocate</button>

        
       
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          QR INVOICE CHECK MODAL
================================================================================================ -->
<div class="modal fade" id="invoice_check_modal" tabindex="-1" role="dialog" aria-labelledby="invoice_check_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="invoice_check_modal">Invoice Check</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <video id="invoice_qr_preview" width="100%"></video>
  
        </div>
        <form action="../admin/invoice_check.php" method="post" id="invoice_check_form">
              
            <input type="hidden" name="qr_invoice" id="qr_invoice" readonly placeholder="scan qrcode" class="form-control">
          
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          ADMIN ADD MODAL START
================================================================================================ -->
  <div class="modal fade" id="Admin_Add" tabindex="-1" role="dialog" aria-labelledby="admin_add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="admin_add">Add New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form method="POST" enctype="multipart/form-data" id="admin_form">

      <input type="hidden" name="action" id="action" value="admin_insert">

      <input type="hidden" name="aid" id="aid" value="" />
      
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="add_Name" id="add_Name" value="" class="form-control" placeholder="Admin Name">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="add_Email" id="add_Email" value="" class="form-control" placeholder="Admin Email">
      </div>

      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="add_Number" id="add_Number" value="" class="form-control" placeholder="Admin Contact Number">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="add_Password" id="add_Password" value="" class="form-control" placeholder="Admin Password">
      </div>

      <div class="form-group password">
        <label>Confirm Password</label>
        <input type="password" name="add_reassword" id="add_reassword" value="" class="form-control" placeholder="Confirm Password">
      </div>
        
     

      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>
        
        
        <button type="submit" class="btn btn-primary" name="A_add" id="A_add">Add</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          ADMIN EDIT MODAL START
================================================================================================ -->
  <div class="modal fade" id="Admin_Edit" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Admin Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="admin_edit_form">   

      <input type="hidden" name="edit_ID" id="edit_ID" value="" >

      <input type="hidden" name="action" id="action" value="admin_update" />

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="edit_Name" id="edit_Name" value="" class="form-control" placeholder="Admin Name">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="edit_Email" id="edit_Email" value="" class="form-control" placeholder="Admin Email" readonly>
      </div>

      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="edit_Number" id="edit_Number" value="" class="form-control" placeholder="Admin Contact Number">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="edit_Password" id="edit_Password" value="" class="form-control" placeholder="Admin Password">
      </div>

      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

        <button type="submit" class="btn btn-primary" name="A_edit">Edit</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          GUIDER ADD MODAL START
================================================================================================ -->
<div class="modal fade" id="Guider_Add" tabindex="-1" role="dialog" aria-labelledby="Guider_Add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Guider_Add">Add New Guider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form method="POST" enctype="multipart/form-data" id="guider_form">

      <input type="hidden" name="action" id="action" value="guider_insert">

      <input type="hidden" name="gid" id="gid" value="" />
      
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="G_add_Name" id="G_add_Name" value="" class="form-control" placeholder="Guider Name">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="G_add_Email" id="G_add_Email" value="" class="form-control" placeholder="Guider Email">
      </div>

      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="G_add_Number" id="G_add_Number" value="" class="form-control" placeholder="Guider Contact Number">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="G_add_Password" id="G_add_Password" value="" class="form-control" placeholder="Guider Password">
      </div>

      <div class="form-group password">
        <label>Confirm Password</label>
        <input type="password" name="G_add_reassword" id="G_add_reassword" value="" class="form-control" placeholder="Confirm Password">
      </div>
        
     

      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="G_Delete">Close</button>
        
        
        <button type="submit" class="btn btn-primary" name="G_add" id="G_add">Add</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          GUIDER EDIT MODAL START
================================================================================================ -->
<div class="modal fade" id="Guider_Edit" tabindex="-2" role="dialog" aria-labelledby="Guider_Edit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Guider_Edit">Update Guider Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="guider_edit_form">   

      <input type="hidden" name="G_edit_ID" id="G_edit_ID" value="" >

      <input type="hidden" name="action" id="action" value="guider_update" />

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="G_edit_Name" id="G_edit_Name" value="" class="form-control" placeholder="Guider Name">
      </div>

      <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="G_edit_Number" id="G_edit_Number" value="" class="form-control" placeholder="Guider Contact Number">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="G_edit_Email" id="G_edit_Email" value="" class="form-control" placeholder="Guider Email" readonly>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="G_edit_Password" id="G_edit_Password" value="" class="form-control" placeholder="Guider Password">
      </div>

      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

        <button type="submit" class="btn btn-primary" name="G_edit">Edit</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          ADMIN DELETE MODAL START
================================================================================================ -->
  <div class="modal fade" id="Admin_Delete" tabindex="-3" role="dialog" aria-labelledby="delete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete">Delete Admin Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form method="POST" enctype="multipart/form-data" id="admin_delete_form">      
      
        <input type="hidden" name="delete_ID" id="delete_ID" value="" >
      

      <div class="form-group">
        <label>Admin Name</label>
        <input type="text" name="delete_Name" id="delete_Name" value="" class="form-control" placeholder="Admin Name" readonly>
      </div>

      <div class="form-group">
        <label>Enter Admin Password</label>
        <input type="password" name="delete_Password" id="delete_Password" value="" class="form-control" placeholder="Admin Password">
      </div>


      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="A_Delete">Close</button>

        <button type="submit" class="btn btn-danger" name="A_delete">Delete</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          GUIDER DELETE MODAL START
================================================================================================ -->
<div class="modal fade" id="Guider_Delete" tabindex="-3" role="dialog" aria-labelledby="delete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete">Delete Guider Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form method="POST" enctype="multipart/form-data" id="guider_delete_form">      
      
        <input type="hidden" name="G_delete_ID" id="G_delete_ID" value="" >
      

      <div class="form-group">
        <label>Guider Name</label>
        <input type="text" name="G_delete_Name" id="G_delete_Name" value="" class="form-control" placeholder="Guider Name" readonly>
      </div>

      <div class="form-group">
        <label>Enter Guider Password</label>
        <input type="password" name="G_delete_Password" id="G_delete_Password" value="" class="form-control" placeholder="Guider Password">
      </div>


      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="G_Delete">Close</button>

        <button type="submit" class="btn btn-danger" name="G_delete">Delete</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          ADMIN LOGOUT MODAL START
================================================================================================ -->
  <div class="modal fade" id="A_Logout" tabindex="-4" role="dialog" aria-labelledby="logout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logout">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Hi, <?php echo $_SESSION['A_Name']; ?> do you want to "Logout" current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- ===============================================================================================
                                          CATEGORY MODAL START
================================================================================================ -->
  <div class="modal fade" id="Category_Add" tabindex="-1" role="dialog" aria-labelledby="cat_add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cat_add">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="category_new_form">  

      <input type="hidden" name="action" id="action" value="cat_insert" />

      <input type="hidden" name="cid" id="cid" value="" />

      <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="cat_Name" id="cat_Name" value="" class="form-control" placeholder="Category Name">
      </div>

      <div class="form-group">
        <label>Image</label>
        <input type="file" name="cat_image" id="cat_image" value="" class="form-control" placeholder="">
        
        
      </div>

      <div class="form-group">
        <label>Category Details</label>
        <textarea name="cat_details" id="cat_details" cols="60" rows="1" class="form-control" placeholder="Category Details"></textarea>
        
      </div>

      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="C_Delete">Close</button>

        <button type="submit" class="btn btn-primary" name="C_add" value="Add" id="C_add">Add</button>
        </form>
      </div>
      </div>
  </div>
  </div>

<!-- ===============================================================================================
                                          CATEGORY EDIT MODAL START
================================================================================================ -->
<div class="modal fade" id="Category_Edit" tabindex="-1" role="dialog" aria-labelledby="cat_edit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cat_edit">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" enctype="multipart/form-data" id="category_edit_form">  

      <input type="hidden" name="action" id="action" value="cat_edit" />

      <input type="hidden" name="e_cid" id="e_cid" value="" />

      <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="e_cat_Name" id="e_cat_Name" value="" class="form-control" placeholder="Category Name">
      </div>

      <div class="form-group">
        <label>Image</label>
        <input type="file" name="e_cat_image" id="e_cat_image" value="" class="form-control" placeholder="">
        
        
      </div>

      <div class="form-group">
        <label>Category Details</label>
        <textarea name="e_cat_details" id="e_cat_details" cols="60" rows="3" class="form-control" placeholder="Category Details"></textarea>
        
      </div>

      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="C_Delete">Close</button>

        <button type="submit" class="btn btn-primary" name="C_edit" value="Edit" id="C_edit">Edit</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                            PACKAGE MODAL START
================================================================================================ -->
  <div class="modal fade" id="Package_Add_Modal" tabindex="-1" role="dialog" aria-labelledby="pak_add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pak_add">Add New Package</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        

        <form  method="POST" enctype="multipart/form-data" id="package_overview_new_form">  
        
        <input type="hidden" name="action" id="action" value="pack_overview_insert" />

        <div class="form-group">
          <label>Select Category</label>

          <select name="scategory" id="scategory" class="btn-success form-control">
          <option value="">--Select--</option>
            <?php
            $connection = mysqli_connect("localhost","root","","traveldb");
            $query = "SELECT * FROM catogory ";
            $query_run = mysqli_query($connection ,$query);
            if(mysqli_num_rows($query_run) > 0)
                {
                  while($row1 = mysqli_fetch_assoc($query_run))
                  {
            ?>
                
                <option value="<?php echo $row1['C_ID']; ?>"><?php echo $row1['C_Name']; ?></option>

            <?php }
              }?>
          </select>
          
        </div>
        
        <div class="form-group">
          <label>Package Name</label>
          <input type="text" name="pak_Name" id="pak_Name" value="" class="form-control" placeholder="Package Name" title="Package Name">
        </div>

        <div class="form-group">
          <label>Cost for 1 Adult</label>
          <input type="text" name="pak_Adult_Cost" id="pak_Adult_Cost" value="" class="form-control" placeholder="Package Cost for One Adult">
        </div>

        <div class="form-group">
          <label>Selling Price - Adult</label>
          <input type="text" name="pak_Adult_Selling" id="pak_Adult_Selling" value="" class="form-control" placeholder="Package Selling Price for One Adult">
        </div>

        <div class="form-group">
          <label>Cost for 1 Child</label>
          <input type="text" name="pak_Child_Cost" id="pak_Child_Cost" value="" class="form-control" placeholder="Package Cost for One Child">
        </div>

        <div class="form-group">
          <label>Selling Price - Child</label>
          <input type="text" name="pak_Child_Selling" id="pak_Child_Selling" value="" class="form-control" placeholder="Package Selling Price for One Child">
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" name="pak_image" id="pak_image" value="" class="form-control" placeholder="">
        </div>

        <div class="form-group">
          <label>Package Overview</label>
          <textarea name="pak_details" id="pak_details" cols="60" rows="1" class="form-control" placeholder="Package Overview"></textarea>
          
        </div>
        <div class="form-group">
          <label>Package Locations</label>
          <input type="text" name="pak_Loacation" id="pak_Loacation" value="" class="form-control" placeholder="Package Locations">
        </div>

        <div class="form-group">
          <label>Package Map</label>
          <input type="text" name="pak_Map" id="pak_Map" value="" class="form-control" placeholder="Package Map">
        </div>

        <div class="form-group">
          <label>Start Date</label>
          <input type="date" name="pak_date" id="pak_date" value="" class="form-control" placeholder="Enter Travel Start Date">
        </div>

        <div class="form-group">
          <label>End Date</label>
          <input type="date" name="pak_end_date" id="pak_end_date" value="" class="form-control" placeholder="Enter Travel End Date">
        </div>

        <div class="form-group">
          <label>Number of Booking</label>
          <input type="number" name="pak_booking" id="pak_booking" value="" class="form-control" placeholder="Enter Number of Booking">
        </div>

        </div>
        <div class="modal-footer">
          
              <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="P_close">Close</button>
          
          
          <button type="submit" class="btn btn-primary" name="P_o_add" id="P_o_add">Insert</button>
          </form>
        </div>
        </div>
    </div>
    </div>
<!-- ===============================================================================================
                                            PACKAGE EDIT MODAL START
================================================================================================ -->
 <div class="modal fade" id="Package_Overview_Update" tabindex="-1" role="dialog" aria-labelledby="pak_edit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pak_edit">Update Package Overview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form  method="POST" enctype="multipart/form-data" id="Package_Overview_Update_Form">    
      
      <input type="hidden" name="action" id="action" value="Update_Package_Overview" />

      <input type="hidden" name="editp_ID" id="editp_ID" value="" >
      

      <div class="form-group">
        <label>Category</label>

        <select name="ecategory" id="ecategory" class="btn-success form-control">
        <option value="<?php echo $row['C_ID']?>">--Select--</option>
          <?php
          $connection = mysqli_connect("localhost","root","","traveldb");
          $query = "SELECT * FROM catogory ";
          $query_run = mysqli_query($connection ,$query);
          if(mysqli_num_rows($query_run) > 0)
              {
                while($row1 = mysqli_fetch_assoc($query_run))
                {
          ?>
              
              <option value="<?php echo $row1['C_ID']; ?>"><?php echo $row1['C_Name']; ?></option>

          <?php }
            }?>
        </select>
        
      </div>

      <div class="form-group">
        <label>Package Name</label>
        <input type="text" name="epak_Name" id="epak_Name" value="" class="form-control" placeholder="Package Name">
      </div>

      <div class="form-group">
        <label>Package Cost for One Adult</label>
        <input type="text" name="epak_adult_Cost" id="epak_adult_Cost" value="" class="form-control" placeholder="Package Cost for One Adult">
      </div>

      <div class="form-group">
          <label>Selling Price - Adult</label>
          <input type="text" name="epak_Adult_Selling" id="epak_Adult_Selling" value="" class="form-control" placeholder="Package Selling Price for One Adult">
        </div>

      <div class="form-group">
        <label>Package Cost for One Child</label>
        <input type="text" name="epak_child_Cost" id="epak_child_Cost" value="" class="form-control" placeholder="Package Cost for One Child">
      </div>

      <div class="form-group">
          <label>Selling Price - Child</label>
          <input type="text" name="epak_Child_Selling" id="epak_Child_Selling" value="" class="form-control" placeholder="Package Selling Price for One Child">
        </div>

      <div class="form-group">
        <label>Image</label>
        <input type="file" name="epak_image" id="epak_image" value="" class="form-control" placeholder="">
      </div>

      <div class="form-group">
        <label>Package Details</label>
        <textarea name="epak_details" id="epak_details"  cols="60" rows="3" class="form-control" placeholder="Package Details"></textarea>
        
      </div>

      <div class="form-group">
        <label>Package Locations</label>
        <textarea name="epak_loc" id="epak_loc"  cols="60" rows="3" class="form-control" placeholder="Travel Locations"required></textarea>
      </div>

      <div class="form-group">
        <label>Travel Map</label>
        <input type="text" name="epak_map" id="epak_map" value="" class="form-control" placeholder="Travel Map">
      </div>

      <div class="form-group">
        <label>Start Date</label>
        <input type="date" name="epak_date" id="epak_date" value="" class="form-control" placeholder="Travel Start Date">
      </div>
      <div class="form-group">
        <label>End Date</label>
        <input type="date" name="epak_end_date" id="epak_end_date" value="" class="form-control" placeholder="Travel End Date">
      </div>
      <div class="form-group">
          <label>Number of Booking</label>
          <input type="number" name="epak_booking" id="epak_booking" value="" class="form-control" placeholder="Enter Number of Booking">
        </div>

      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="P_Close">Close</button>
        
        
        <button type="submit" class="btn btn-primary" name="P_Edit">Update</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                          PACKAGE DELETE MODAL START
================================================================================================ -->
 <div class="modal fade" id="Pac_Delete" tabindex="-1" role="dialog" aria-labelledby="Pac_Delete" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Pac_Delete">Delete Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
      
    if(isset($_GET['pac_id']))
    {   
        $id = $_GET['pac_id'];
        $query = "SELECT * FROM package WHERE Travel_ID='$id'";
        $query_run = mysqli_query($conn, $query);

        foreach($query_run as $row)
        {
          ?>

      <form action="includes/code.php" method="POST" enctype="multipart/form-data">    
      <div class="form-group">
        <input type="hidden" name="deletep_ID" value="<?php echo $row['Travel_ID']?>" >
      </div>

      <div class="form-group">
        <label>Do You Want To Delete "</label><?php echo $row['T_Name']?>"
       
      </div>

      <?php
        }
    }
    ?>

      </div>
      <div class="modal-footer">
        
            <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="C_Close">Close</button>
        
        
        <button type="submit" class="btn btn-primary" name="pac_Delete">Delete</button>
        </form>
      </div>
      </div>
  </div>
  </div>
<!-- ===============================================================================================
                                        PACKAGE ITINERARY EDIT MODAL START
================================================================================================ -->
  <div class="modal fade" id="Iti_Edit" tabindex="-1" role="dialog" aria-labelledby="Iti_Edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Iti_Edit_titel">Update Package Itinerary</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <form method="POST" enctype="multipart/form-data" id="Package_Itinerary_Update_Form">    
        
          <input type="hidden" name="action" value="Update_Package_Itinerary_Form" id="action">

          <input type="hidden" name="iti_ID" value="" id="iti_ID">
          <input type="hidden" name="iti_pac_id" value="" id="iti_pac_id">
          
          <div class="form-group">
          <select  id="iti_category" name="iti_category" class="btn-success form-control">
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
          </div>
          <div class="form-group">
          <select id="iti_package" name="iti_package" class="btn-success form-control">
          <option selected="" disabled="">Select Package</option>
          </select>
          </div>

        <div class="form-group">
          <label>Itinerary Date</label>
          <input type="text" name="iti_Date" id="iti_Date" value="" class="form-control" placeholder="Itinerary Date">
        </div>

        <div class="form-group">
          <label>Locations</label>
          <input type="text" name="iti_Loc" id="iti_Loc" value="" class="form-control" placeholder="Locations">
        </div>

        <div class="form-group">
          <label>Details</label>
          <textarea name="iti_details" id="iti_details"  cols="60" rows="3" class="form-control" placeholder="Details"></textarea>  
        </div>

        <div class="form-group">
          <label>Accommodations</label>
          <input type="text" name="iti_acc" id="iti_acc" value="" class="form-control" placeholder="Accommodations">
        </div>

        <div class="form-group">
          <label>Activities</label>
          <textarea name="iti_act" id="iti_act"  cols="60" rows="3" class="form-control" placeholder="Activities"></textarea>
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" name="iti_image" id="iti_image" value="" class="form-control" placeholder="">
        </div>
      

        </div>
        <div class="modal-footer">
          
              <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="Iti_Close">Close</button>
          
          
          <button type="submit" class="btn btn-primary" name="Iti_Edit_But" id="Iti_Edit_But"><i class='fa fa-edit'></i>Edit</button>
          </form>
        </div>
        </div>
    </div>
    </div>
<!-- ===============================================================================================
                                        PACKAGE ITINERARY INSERT MODAL START
================================================================================================ -->
  <div class="modal fade" id="Iti_Insert" tabindex="-1" role="dialog" aria-labelledby="Iti_Insert" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Insert New Itinerary</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <form method="POST" enctype="multipart/form-data" id="Package_Itinerary_Insert_Form">    
        
          <input type="hidden" name="action" value="Insert_Package_Itinerary_Form" id="action">

          <input type="hidden" name="insert_iti_pac_id" value="" id="insert_iti_pac_id">
          
          <div class="form-group">
          <select  id="insert_iti_category" name="insert_iti_category" class="btn-success form-control">
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
          </div>
          <div class="form-group">
          <select id="insert_iti_package" name="insert_iti_package" class="btn-success form-control">
          <option selected="" disabled="">Select Package</option>
          </select>
          </div>

        <div class="form-group">
          <label>Itinerary Date</label>
          <input type="text" name="insert_iti_Date" id="insert_iti_Date" value="" class="form-control" placeholder="Itinerary Date">
        </div>

        <div class="form-group">
          <label>Locations</label>
          <input type="text" name="insert_iti_Loc" id="insert_iti_Loc" value="" class="form-control" placeholder="Locations">
        </div>

        <div class="form-group">
          <label>Details</label>
          <textarea name="insert_iti_details" id="insert_iti_details"  cols="60" rows="3" class="form-control" placeholder="Details"></textarea>  
        </div>

        <div class="form-group">
          <label>Accommodations</label>
          <input type="text" name="insert_iti_acc" id="insert_iti_acc" value="" class="form-control" placeholder="Accommodations">
        </div>

        <div class="form-group">
          <label>Activities</label>
          <textarea name="insert_iti_act" id="insert_iti_act"  cols="60" rows="3" class="form-control" placeholder="Activities"></textarea>
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" name="insert_iti_image" id="insert_iti_image" value="" class="form-control" placeholder="">
        </div>
      

        </div>
        <div class="modal-footer">
          
              <button  class="btn btn-secondary" data-dismiss="modal" name="insert_Iti_Close">Close</button>
          
          
          <button type="submit" class="btn btn-primary" name="insert_Iti_Edit_But" id="insert_Iti_But"><i class='fa fa-edit'></i>Insert</button>
          </form>
        </div>
        </div>
    </div>
    </div>
<!-- ===============================================================================================
                                        PACKAGE ACCOMMODATION INSERT MODAL START
================================================================================================ -->
  <div class="modal fade" id="Accomodation_Insert" tabindex="-1" role="dialog" aria-labelledby="Accomodation__Insert" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Insert New Accomodation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <form method="POST" enctype="multipart/form-data" id="Package_Accomodation_Insert_Form">    
        
          <input type="hidden" name="action" value="Insert_Package_Accomodation_Form" id="action">

          <input type="hidden" name="insert_Accomodation__pac_id" value="" id="insert_Accomodation__pac_id">
          
          <!-- <div class="form-group">
          <select  id="insert_Accomodation_category" name="insert_Accomodation_category" class="btn-success form-control">
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
          </div>
          <div class="form-group">
          <select id="insert_Accomodation_package" name="insert_Accomodation_package" class="btn-success form-control">
          <option selected="" disabled="">Select Package</option>
          </select>
          </div> -->

        <div class="form-group">
          <label>Accommodation Name</label>
          <input type="text" name="Insert_Accomodation_Name" id="Insert_Accomodation_Name" value="" class="form-control" placeholder="Accommodation Name">
        </div>

        <div class="form-group">
          <label>Locations</label>
          <input type="text" name="Insert_Accomodation_location" id="Insert_Accomodation_location" value="" class="form-control" placeholder="Locations">
        </div>

        <div class="form-group">
          <label>Summary</label>
          <textarea name="Insert_Accomodation_Summary" id="Insert_Accomodation_Summary"  cols="60" rows="2" class="form-control" placeholder="Summary" ></textarea>  
        </div>

        <div class="form-group">
          <label>Details</label>
          <textarea name="Insert_Accomodation_Details" id="Insert_Accomodation_Details"  cols="60" rows="3" class="form-control" placeholder="Details"></textarea>  
        </div>

        <div class="form-group">
          <label>Style</label>
          <input type="text" name="Insert_Accomodation_Style" id="Insert_Accomodation_Style" value="" class="form-control" placeholder="Accommodations Style">
        </div>

        <div class="form-group">
          <label>No of Rooms</label>
          <input type="number" name="Insert_Accomodation_Room" id="Insert_Accomodation_Room" value="" class="form-control" placeholder="Number of Rooms">
        </div>

        <div class="form-group">
          <label>Key Features</label>
          <input type="text" name="Insert_Accomodation_Feature" id="Insert_Accomodation_Feature" value="" class="form-control" placeholder="Key Features">
        </div>

        <div class="form-group">
          <label>Location Link</label>
          <input type="text" name="Insert_Accomodation_Link" id="Insert_Accomodation_Link" value="" class="form-control" placeholder="Accommodations Link">
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" name="Insert_Accomodation_Image" id="Insert_Accomodation_Image" value="" class="form-control" placeholder="">
        </div>
      
        </div>
        <div class="modal-footer">
          
              <button  class="btn btn-secondary" data-dismiss="modal" name="insert_Iti_Close">Close</button>
          
          
          <button type="submit" class="btn btn-primary" name="Insert_Accomodation" id="Insert_Accomodation"><i class='fa fa-edit'></i>Insert</button>
          </form>
        </div>
        </div>
    </div>
    </div>
<!-- ===============================================================================================
                                        PACKAGE ACTIVITY MODAL START
================================================================================================ -->
  <div class="modal fade" id="Activity_Insert" tabindex="-1" role="dialog" aria-labelledby="Activity_Insert" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Insert New Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <form method="POST" enctype="multipart/form-data" id="Package_Activity_Insert_Form">    
        
          <input type="hidden" name="action" value="Insert_Package_Activity_Form" id="action">

          <input type="hidden" name="insert_Activity__pac_id" value="" id="insert_Activity__pac_id">
          
          <!-- <div class="form-group">
          <select  id="insert_Activity_category" name="insert_Activity_category" class="btn-success form-control">
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
          </div>
          <div class="form-group">
          <select id="insert_Activity_package" name="insert_Activity_package" class="btn-success form-control">
          <option selected="" disabled="">Select Package</option>
          </select>
          </div> -->

        <div class="form-group">
          <label>Activity Name</label>
          <input type="text" name="Insert_Activity_Name" id="Insert_Activity_Name" value="" class="form-control" placeholder="Activity Name">
        </div>

        <div class="form-group">
          <label>Locations</label>
          <input type="text" name="Insert_Activity_location" id="Insert_Activity_location" value="" class="form-control" placeholder="Locations">
        </div>

        <div class="form-group">
          <label>Summary</label>
          <textarea name="Insert_Activity_Summary" id="Insert_Activity_Summary"  cols="60" rows="2" class="form-control" placeholder="Summary"></textarea>  
        </div>

        <div class="form-group">
          <label>Details</label>
          <textarea name="Insert_Activity_Details" id="Insert_Activity_Details"  cols="60" rows="3" class="form-control" placeholder="Details"></textarea>  
        </div>

        <div class="form-group">
          <label>Duration</label>
          <input type="text" name="Insert_Activity_duration" id="Insert_Activity_duration" value="" class="form-control" placeholder="Activity Duration Time">
        </div>

        <div class="form-group">
          <label>Best Time to Visit</label>
          <input type="text" name="Insert_Activity_best_time" id="Insert_Activity_best_time" value="" class="form-control" placeholder="Best Time to Visit">
        </div>

        <div class="form-group">
          <label>Location Link</label>
          <input type="text" name="Insert_Activity_location_link" id="Insert_Activity_location_link" value="" class="form-control" placeholder="Locations Link">
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" name="Insert_Activity_Image" id="Insert_Activity_Image" value="" class="form-control" placeholder="">
        </div>
      
        </div>
        <div class="modal-footer">
          
              <button  class="btn btn-secondary" data-dismiss="modal" name="insert_Iti_Close">Close</button>
          
          
          <button type="submit" class="btn btn-primary" name="Insert_Activity" id="Insert_Activity"><i class='fa fa-edit'></i>Insert</button>
          </form>
        </div>
        </div>
    </div>
    </div>
<!-- ===============================================================================================
                                        PACKAGE ACCOMODATION EDIT MODAL START
================================================================================================ -->
  <div class="modal fade" id="acco_Edit" tabindex="-1" role="dialog" aria-labelledby="acco_Edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Acco_Edit_titel">Update Package Accomodation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <form method="POST" enctype="multipart/form-data" id="Package_Accommodation_Update_Form">    
        
          <input type="hidden" name="action" value="Package_Accommodation_Update_Form" id="action">

          <input type="hidden" name="acco_ID" value="" id="acco_ID">
          <input type="hidden" name="acco_pac_id" value="" id="acco_pac_id">
          
          <!-- <div class="form-group">
          <select  id="acco_category" name="acco_category" class="btn-success form-control">
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
          </div>
          <div class="form-group">
          <select id="acco_package" name="acco_package" class="btn-success form-control">
          <option selected="" disabled="">Select Package</option>
          </select>
          </div> -->

        <div class="form-group">
          <label>Accomodation Name</label>
          <input type="text" name="acco_Name" id="acco_Name" value="" class="form-control" placeholder="Accomodation Name">
        </div>

        <div class="form-group">
          <label>Locations</label>
          <input type="text" name="acco_Loc" id="acco_Loc" value="" class="form-control" placeholder="Locations">
        </div>

        <div class="form-group">
          <label>Summary</label>
          <textarea name="acco_summary" id="acco_summary"  cols="60" rows="2" class="form-control" placeholder="Summary"></textarea>  
        </div>

        <div class="form-group">
          <label>Details</label>
          <textarea name="acco_details" id="acco_details"  cols="60" rows="3" class="form-control" placeholder="Details"></textarea>  
        </div>

        <div class="form-group">
          <label>Style</label>
          <input type="text" name="acco_style" id="acco_style" value="" class="form-control" placeholder="Accommodation Style">
        </div>

        <div class="form-group">
          <label>No of Rooms</label>
          <input type="number" name="acco_room" id="acco_room" value="" class="form-control" placeholder="Accommodation No of Rooms">
        </div>

        <div class="form-group">
          <label>Key Features</label>
          <input type="text" name="acco_key" id="acco_key" value="" class="form-control" placeholder="Accommodation Key Features">
        </div>

        <div class="form-group">
          <label>Link</label>
          <input type="text" name="acco_link" id="acco_link" value="" class="form-control" placeholder="Accommodation link">
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" name="acco_image" id="acco_image" value="" class="form-control" placeholder="">
        </div>
      

        </div>
        <div class="modal-footer">
          
              <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="acco_Close">Close</button>
          
          
          <button type="submit" class="btn btn-primary" name="acco_Edit_But" id="acco_Edit_But"><i class='fa fa-edit'></i>Edit</button>
          </form>
        </div>
        </div>
    </div>
    </div>
<!-- ===============================================================================================
                                        PACKAGE ACTIVITY EDIT MODAL START
================================================================================================ -->
  <div class="modal fade" id="act_Edit" tabindex="-1" role="dialog" aria-labelledby="act_Edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Act_Edit_titel">Update Package Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


        <form method="POST" enctype="multipart/form-data" id="Package_Activity_Update_Form">    
        
          <input type="hidden" name="action" value="Package_Activity_Update_Form" id="action">

          <input type="hidden" name="act_ID" value="" id="act_ID">
          <input type="hidden" name="act_pac_id" value="" id="act_pac_id">
          
          <!-- <div class="form-group">
          <select  id="acti_category" name="acti_category" class="btn-success form-control">
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
          </div>
          <div class="form-group">
          <select id="acti_package" name="acti_package" class="btn-success form-control">
          <option selected="" disabled="">Select Package</option>
          </select>
          </div> -->

        <div class="form-group">
          <label>Activity Name</label>
          <input type="text" name="act_Name" id="act_Name" value="" class="form-control" placeholder="Activity Name">
        </div>

        <div class="form-group">
          <label>Locations</label>
          <input type="text" name="act_Loc" id="act_Loc" value="" class="form-control" placeholder="Locations">
        </div>

        <div class="form-group">
          <label>Summary</label>
          <textarea name="act_summary" id="act_summary"  cols="60" rows="2" class="form-control" placeholder="Summary"></textarea>  
        </div>

        <div class="form-group">
          <label>Details</label>
          <textarea name="act_details" id="act_details"  cols="60" rows="3" class="form-control" placeholder="Details"></textarea>  
        </div>

        <div class="form-group">
          <label>Duration Time</label>
          <input type="text" name="act_duration" id="act_duration" value="" class="form-control" placeholder="Activity Duration Time">
        </div>

        <div class="form-group">
          <label>Best Time to Visit</label>
          <input type="text" name="act_time" id="act_time" value="" class="form-control" placeholder="Best Time to Visit">
        </div>

        <div class="form-group">
          <label>Location Link</label>
          <input type="text" name="act_link" id="act_link" value="" class="form-control" placeholder="Activity Location Link">
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" name="act_image" id="act_image" value="" class="form-control" placeholder="">
        </div>
      

        </div>
        <div class="modal-footer">
          
              <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="act_Close">Close</button>
          
          
          <button type="submit" class="btn btn-primary" name="act_Edit_But" id="act_Edit_But"><i class='fa fa-edit'></i>Edit</button>
          </form>
        </div>
        </div>
    </div>
    </div>
<!-- ===============================================================================================
                                            ACCOMMODATION MODAL START
================================================================================================ -->
  <div class="modal fade" id="Pac_Accommodation_Modal" tabindex="-1" role="dialog" aria-labelledby="Pac_Accommodation_Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Accommodations</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Select New Accommodation</label>
            <div>
              <form  method="POST" enctype="multipart/form-data" id="new_accommodation">  
              <input type="hidden" name="package_accommodation_id" id="package_accommodation_id" value="">
              <input type="hidden" name="accommodation_id" id="accommodation_id" value="">
              <input type="hidden" name="action" id="action" value="insert_new_accommodation" >


              <select name="Select_N_Accommodation" id="Select_N_Accommodation" class="btn-success form-control">
          <option value="">--Select--</option>
            <?php
            $connection = mysqli_connect("localhost","root","","traveldb");
            $query = "SELECT * FROM t_accommodation ";
            $query_run = mysqli_query($connection ,$query);
            if(mysqli_num_rows($query_run) > 0)
                {
                  while($row1 = mysqli_fetch_assoc($query_run))
                  {
            ?>
                
                <option value="<?php echo $row1['ID']; ?>"><?php echo $row1['A_Name']; ?></option>

            <?php }
              }?>
          </select>


              <button type="submit" class="btn btn-primary" name="Accommodation_select">Add</button>
              </form>
            </div>
          
              <label>Accommodation</label>
              
              <div id="accommodation_data" style="height: 40vh; overflow-y: scroll;">
              


            </div>
          </div>
          <form method="POST" enctype="multipart/form-data" id="remove_all_accommodation"> 
            <div class="modal-footer">
            <input type="hidden" name="action" id="action" value="pack_all_accommodation_remove" >
                  <input type="hidden" name="package_accommodation_d_id" id="package_accommodation_d_id" value="" >
                  <button type="submit" class="btn btn-danger" name="Accommodation_Adelete" id="Accommodation_Adelete">Remove All</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" name="A_close">Close</button>

            </div>
          </form>
        </div>
      </form>
    </div>
    </div>
    </div>

<!-- ===============================================================================================
                                            ACTIVITY SELECT MODAL START
================================================================================================ -->
  <div class="modal fade" id="Pac_Activity_Modal" tabindex="-1" role="dialog" aria-labelledby="Pac_Activity_Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Select New Activity</label>
            <div>
              <form  method="POST" enctype="multipart/form-data" id="new_activity">  
              <input type="hidden" name="activity_id" id="activity_id" value="">
              <input type="hidden" name="package_activity_id" id="package_activity_id" value="">
              <input type="hidden" name="action" id="action" value="insert_new_activity" >


              <select name="Select_N_Activity" id="Select_N_Activity" class="btn-success form-control">
          <option value="">--Select--</option>
            <?php
            $connection = mysqli_connect("localhost","root","","traveldb");
            $query = "SELECT * FROM t_activities ";
            $query_run = mysqli_query($connection ,$query);
            if(mysqli_num_rows($query_run) > 0)
                {
                  while($row1 = mysqli_fetch_assoc($query_run))
                  {
            ?>
                
                <option value="<?php echo $row1['ID']; ?>"><?php echo $row1['A_Name']; ?></option>

            <?php }
              }?>
          </select>


              <button type="submit" class="btn btn-primary" name="Activity_select">Add</button>
              </form>
            </div>
          
              <label>Activity</label>
              
              <div id="activity_Select_data" style="height: 40vh; overflow-y: scroll;">
              


            </div>
          </div>
          <form method="POST" enctype="multipart/form-data" id="remove_all_activity"> 
            <div class="modal-footer">
            <input type="hidden" name="action" id="action" value="pack_all_activity_remove" >
                  <input type="hidden" name="package_activity_d_id" id="package_activity_d_id" value="" >
                  <button type="submit" class="btn btn-danger" name="Activity_Adelete" id="Activity_Adelete">Remove All</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" name="Act_close">Close</button>

            </div>
          </form>
        </div>
      </form>
    </div>
    </div>
    </div>
<!-- ===============================================================================================
                                            HIGHLIGHT MODAL START
================================================================================================ -->
  <div class="modal fade" id="Pac_Highlights_Modal" tabindex="-1" role="dialog" aria-labelledby="Pac_Highlights_Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Highlights</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>New Highlights</label>
            <div>
              <form  method="POST" enctype="multipart/form-data" id="new_highlight">  
              <input type="hidden" name="package_id" id="package_id" value="">
              <input type="hidden" name="action" id="action" value="insert_new_highlight" >
              <input type="text" name="N_Highlight" id="N_Highlight" value="" class="form-control" placeholder="Enter New Highlight">
              <button type="submit" class="btn btn-primary" name="H_add">Add</button>
              </form>
            </div>
          
              <label>Highlights</label>
              
              <form method="POST" enctype="multipart/form-data" id="edit_highlight">   
              <input type="hidden" name="action" id="action" value="highlight_update" >
              <input type="hidden" name="text1" id="text1" value="" >
              <input type="text" name="text2" id="text2" value="" class="form-control form-group" placeholder="Edit High-light text type here">
                <div id="highlight_data" style="height: 40vh; overflow-y: scroll;">
              </div>
                
              </form>


            </div>
          </div>
          <form method="POST" enctype="multipart/form-data" id="delete_all_highlight"> 
            <div class="modal-footer">
            <input type="hidden" name="action" id="action" value="delete_all_highlight" >
                  <input type="hidden" name="package_d_id" id="package_d_id" value="" >
                  <button type="submit" class="btn btn-danger" name="H_Adelete" id="H_Adelete">Delete All</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" name="H_close">Close</button>

            </div>
          </form>
        </div>
      </form>
    </div>
    </div>
<!-- ===============================================================================================
                                            INCLUDES MODAL START
================================================================================================ -->
<div class="modal fade" id="Pac_Includes_Modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Includes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>New Includes</label>
            <div>
              <form  method="POST" enctype="multipart/form-data" id="new_include">  
              <input type="hidden" name="package_i_id" id="package_i_id" value="">
              <input type="hidden" name="action" id="action" value="insert_new_include" >
              <input type="text" name="N_Include" id="N_Include" value="" class="form-control" placeholder="Enter New Package Includes">
              <button type="submit" class="btn btn-primary" name="H_add">Add</button>
              </form>
            </div>
          
              <label>Includes</label>
              
              <form method="POST" enctype="multipart/form-data" id="edit_include">   
              <input type="hidden" name="action" id="action" value="include_update" >
              <input type="hidden" name="text3" id="text3" value="" >
              <input type="text" name="text4" id="text4" value="" class="form-control form-group" placeholder="Edit Package Includes text type here">
                <div id="include_data" style="height: 40vh; overflow-y: scroll;">
              </div>
                
              </form>


            </div>
          </div>
          <form method="POST" enctype="multipart/form-data" id="delete_all_include"> 
            <div class="modal-footer">
            <input type="hidden" name="action" id="action" value="delete_all_include" >
                  <input type="hidden" name="package_i_d_id" id="package_i_d_id" value="" >
                  <button type="submit" class="btn btn-danger" name="I_Adelete" id="I_Adelete">Delete All</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" name="H_close">Close</button>

            </div>
          </form>
        </div>
      </form>
    </div>
    </div>
<!-- ===============================================================================================
                                        TERMS & CODITIONS MODAL START
================================================================================================ -->
  <div class="modal fade" id="pack_over_tc" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Terms & Conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>New Terms & Conditions</label>
            <div>
              <form  method="POST" enctype="multipart/form-data" id="new_tc">  
              <input type="hidden" name="package_tc_id" id="package_tc_id" value="">
              <input type="hidden" name="action" id="action" value="insert_new_tc" >
              <input type="text" name="N_Tc" id="N_Tc" value="" class="form-control" placeholder="Enter New Terms & Conditions">
              <button type="submit" class="btn btn-primary" name="tc_add">Add</button>
              </form>
            </div>
          
              <label>Terms & Conditions</label>
              
              <form method="POST" enctype="multipart/form-data" id="edit_tc">   
              <input type="hidden" name="action" id="action" value="tc_update" >
              <input type="hidden" name="text5" id="text5" value="" >
              <input type="text" name="text6" id="text6" value="" class="form-control form-group" placeholder="Edit Terms & Conditions type here">
                <div id="tc_data" style="height: 40vh; overflow-y: scroll;">
              </div>
                
              </form>


            </div>
          </div>
          <form method="POST" enctype="multipart/form-data" id="delete_all_tc"> 
            <div class="modal-footer">
            <input type="hidden" name="action" id="action" value="delete_all_tc" >
                  <input type="hidden" name="package_tc_d_id" id="package_tc_d_id" value="" >
                  <button type="submit" class="btn btn-danger" name="Tc_Adelete" id="Tc_Adelete">Delete All</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" name="H_close">Close</button>

            </div>
          </form>
        </div>
      </form>
    </div>
    </div>
<!-- ===============================================================================================
                                        Image MODAL START
================================================================================================ -->
<div class="modal fade" id="Pac_Img" tabindex="-1" role="dialog" aria-labelledby="Pac_Img" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Images</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Package New Image</label>
            <div>
              <form  method="POST" enctype="multipart/form-data" id="new_img">  
                  <input type="hidden" name="package_img_id" id="package_img_id" value="" >
                  <input type="hidden" name="action" id="action" value="insert_new_img" >

                  <input type="file" name="img_image" id="img_image" value="" class="form-control">
                  <div class="image-preview" id="imagePreview">
                    <img src="" alt="Image Preview" class="image-preview__image" width="100%" height="100px" id="preview">
                    <span class="image-preview__default-text">Image Preview</span>
                </div>
                <div style="width: 100%; height: 40px;">
                  <button style="float: right; " type="submit" class="btn btn-primary" name="Img_add">Add</button></div>
              </form>
            </div>
              
             
           
              <label>Package Images</label>

              

              
              <form  method="POST" enctype="multipart/form-data">   
                <div class="form-group" style="height: 40vh; overflow-y: scroll;width: 100%;"> 
                
                  <div  id="img_data">

                  </div>
                
                  </div>
                
              </form>
              
              

            </div>
          </div>
          <div style=" float: right; width: 100%;">
          <form  method="POST" enctype="multipart/form-data" id="delete_all_img">  
            <div class="modal-footer">
                
                  <input type="hidden" name="action" id="action" value="delete_all_img" >
                  <input type="hidden" name="package_img_d_id" id="package_img_d_id" value="" >
                  <button type="submit" class="btn btn-danger" name="Img_Adelete">Delete All</button>
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="Img_close">Close</button>

            </div>
          </form>
          </div>
        </div>
      
    </div>
  </div>
<!-- ===============================================================================================
                                      ACCOMMODATION  Image MODAL START
================================================================================================ -->
<div class="modal fade" id="Pac_Accommo_Img" tabindex="-1" role="dialog" aria-labelledby="Pac_Accommo_Img" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Accommodation Images</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Package Accommodation New Image</label>
            <div>
              <form  method="POST" enctype="multipart/form-data" id="new_acc_img">  
                  <input type="hidden" name="package_Accommo_img_id" id="package_Accommo_img_id" value="" >
                  <input type="hidden" name="action" id="action" value="insert_new_accommo_img" >

                  <input type="file" name="acco_img_image" id="acco_img_image" value="" class="form-control">
                  <div class="image-preview" id="acco_imagePreview">
                    <img src="" alt="Image Preview" class="image-preview__image" width="100%" height="100px" id="acco_preview">
                    <span class="image-preview__default-text">Image Preview</span>
                </div>
                <div style="width: 100%; height: 40px;">
                  <button style="float: right; " type="submit" class="btn btn-primary" name="Img_add">Add</button></div>
              </form>
            </div>
              
             
           
              <label>Package Accommodation Images</label>

              

              
              <form  method="POST" enctype="multipart/form-data">   
                <div class="form-group" style="height: 40vh; overflow-y: scroll;width: 100%;"> 
                
                  <div  id="accommo_img_data">

                  </div>
                
                  </div>
                
              </form>
              
              

            </div>
          </div>
          <div style=" float: right; width: 100%;">
          <form  method="POST" enctype="multipart/form-data" id="delete_all_accommo_img">  
            <div class="modal-footer">
                
                  <input type="hidden" name="action" id="action" value="delete_all_accommo_img" >
                  <input type="hidden" name="package_Accommo_img_d_id" id="package_Accommo_img_d_id" value="" >
                  <button type="submit" class="btn btn-danger" name="Accommo_Img_Adelete">Delete All</button>
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal" name="Img_close">Close</button>

            </div>
          </form>
          </div>
        </div>
      
    </div>
  </div>
<!-- ===============================================================================================
                                      ACCOMMODATION  ICON MODAL START
================================================================================================ -->
  <div class="modal fade" id="pack_accommodation_icon" tabindex="-1" role="dialog" aria-labelledby="pack_accommodation_icon" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Accommodation Icons</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Package Accommodation Active Icon</label>
          </div>

          <div class="form-group text-center icon">
            <div id="pack_accommodation_icon_data">
              
            </div>
              

          </div>
          </div>
          <div style=" float: right; width: 100%;">
          
            <div class="modal-footer">
                
                  <input type="hidden" name="package_Accommo_icon" id="package_Accommo_icon" value="0" >
                  <button type="button" class="btn btn-danger All_Icon_deactive" name="All_Icon_deactive" id="All_Icon_deactive">Deactive All</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" name="Icon_close">Close</button>

            </div>
         
          </div>
        </div>
      
    </div>
  </div>
<!-- ===============================================================================================
                                      ACTIVITY ICON MODAL START
================================================================================================ -->
<div class="modal fade" id="pack_activity_icon" tabindex="-1" role="dialog" aria-labelledby="pack_activity_icon" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Activity Icons</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Package Activity Active Icon</label>
          </div>

          <div class="form-group text-center icon">
            <div id="pack_activity_icon_data">
              
            </div>
              

          </div>
          </div>
          <div style=" float: right; width: 100%;">
          
            <div class="modal-footer">
                
                  <input type="hidden" name="package_Activi_icon" id="package_Activi_icon" value="0" >
                  <button type="button" class="btn btn-danger All_Pack_Icon_deactive" name="All_Pack_Icon_deactive" id="All_Icon_deactive">Deactive All</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" name="Icon_close">Close</button>

            </div>
         
          </div>
        </div>
      
    </div>
  </div>
  <!-- ===============================================================================================
                                      ACTIVITY  Image MODAL START
================================================================================================ -->
  <div class="modal fade" id="Pac_activity_Img" tabindex="-1" role="dialog" aria-labelledby="Pac_activity_Img" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Package Activity Images</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Package Activity New Image</label>
            <div>
              <form  method="POST" enctype="multipart/form-data" id="new_activity_img">  
                  <input type="hidden" name="package_activity_img_id" id="package_activity_img_id" value="" >
                  <input type="hidden" name="action" id="action" value="insert_new_activity_img" >

                  <input type="file" name="activity_img_image" id="activity_img_image" value="" class="form-control">
                  <div class="image-preview" id="activity_imagePreview">
                    <img src="" alt="Image Preview" class="image-preview__image" width="100%" height="100px" id="activity_preview">
                    <span class="image-preview__default-text">Image Preview</span>
                </div>
                <div style="width: 100%; height: 40px;">
                  <button style="float: right; " type="submit" class="btn btn-primary" name="Img_add">Add</button></div>
              </form>
            </div>
              
             
           
              <label>Package Activity Images</label>

              

              
              <form  method="POST" enctype="multipart/form-data">   
                <div class="form-group" style="height: 40vh; overflow-y: scroll;width: 100%;"> 
                
                  <div  id="activity_img_data">

                  </div>
                
                  </div>
                
              </form>
              
              

            </div>
          </div>
          <div style=" float: right; width: 100%;">
          <form  method="POST" enctype="multipart/form-data" id="delete_all_activity_img">  
            <div class="modal-footer">
                
                  <input type="hidden" name="action" id="action" value="delete_all_activity_img" >
                  <input type="hidden" name="package_activity_img_d_id" id="package_activity_img_d_id" value="" >
                  <button type="submit" class="btn btn-danger" name="Activity_Img_Adelete">Delete All</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" name="Img_close">Close</button>

            </div>
          </form>
          </div>
        </div>
      
    </div>
  </div>

          <style>
            .image-preview{
              width: 100%; 
              height: 100px; 
              border: 2px solid #dddddd;
              justify-content: center; 
              align-items: center; 
              display: flex;  
              font-weight: bold;
              color: #cccccc;
              margin-top: 5px;
              
            }
            .image-preview__image{
              display: none;
              width: 100%;
            }
            
          </style>
<!-- ===============================================================================================
                                          ALERTS MODAL START
================================================================================================ -->
<div class="modal fade" id="show_all_alerts_modal" tabindex="-1" role="dialog" aria-labelledby="show_all_alerts_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="show_all_alerts_modal">All Alerts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       
      <div id="show_all_alerts_modal_data">

      </div>


      <div class="modal-footer">
        
            <button type="button" class="btn btn-primary all_alerts_read" name="C_add" value="Add" id="C_add" style="width: 200px;">Mark as All Read</button>
            <button type="button" class="btn btn-danger all_alerts_delete" name="C_add" value="Add" id="C_add" style="width: 200px;">Delete all Read Alerts</button>


 
        
      </div>
      </div>
  </div>
  </div>
  </div>
  <!-- ===============================================================================================
                                          ENQUIRY MODAL START
================================================================================================ -->
  <div class="modal fade" id="show_all_enquiry_modal" tabindex="-2" role="dialog" aria-labelledby="show_all_enquiry_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="show_all_enquiry_modal">All Enquiry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        
        <div id="show_all_enquiry_modal_data">

        </div>


        <div class="modal-footer">
          
              <button type="button" class="btn btn-primary all_enquiry_read" name="C_add" value="Add" id="C_add" style="width: 200px;">Mark as All Read</button>
              <button type="button" class="btn btn-danger all_enquiry_delete" name="C_add" value="Add" id="C_add" style="width: 200px;">Delete all Read Alerts</button>


  
          
        </div>
        </div>
    </div>
    </div>
    </div>
<!-- ===============================================================================================
                                          BOT-CHAT START
================================================================================================ -->
  <div class="modal fade" id="bot_chat_add_modal" tabindex="-2" role="dialog" aria-labelledby="bot_chat_add_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bot_chat_add_modal">Bot Chat Quections & Answers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="chat_bot_QA"> 

        <input type="hidden" id="action" name="action" value="chat_bot_QA_add">
        
        <div class="form-group">
          <label>Quection</label>
          <input type="text" name="CB_Quection" id="CB_Quection" value="" class="form-control" placeholder="Enter Quection">
        </div>

        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="CB_Answer" id="CB_Answer" value="" class="form-control" placeholder="Enter Answer">
        </div>

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary chat_bot_add_data" name="CB_add" value="Add" id="CB_add" >Add</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>
<!-- ========================================================== CHAT-BOT EDIT =========================================================== -->
    <div class="modal fade" id="bot_chat_edit_modal" tabindex="-2" role="dialog" aria-labelledby="bot_chat_edit_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bot_chat_edit_modal">Bot Chat Quections & Answers Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="chat_bot_QA_edit"> 

        <input type="hidden" id="action" name="action" value="chat_bot_QA_edit">
        <input type="hidden" id="QA_ID" name="QA_ID" value="">
        
        <div class="form-group">
          <label>Quection</label>
          <input type="text" name="CB_Quection_edit" id="CB_Quection_edit" value="" class="form-control" placeholder="Enter Quection">
        </div>

        <div class="form-group">
          <label>Answer</label>
          <input type="text" name="CB_Answer_edit" id="CB_Answer_edit" value="" class="form-control" placeholder="Enter Answer">
        </div>

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary chat_bot_edit_data" name="CB_edit" value="Edit" id="CB_add" >Edit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>

<!-- ===============================================================================================
                                          ICONS START
================================================================================================ -->
  <div class="modal fade" id="icons_add_modal" tabindex="-2" role="dialog" aria-labelledby="icons_add_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="icons_add_modal">Add New Icons</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="icons_add_form"> 

        <input type="hidden" id="action" name="action" value="icons_add_form_submit">
        
        <div class="form-group">
          <label>Icon</label>
          <input type="text" name="icon_text" id="icon_text" value="" class="form-control" placeholder="Enter Icon Code">
        </div>

        <div class="form-group">
          <label>Title</label>
          <input type="text" name="icon_title" id="icon_title" value="" class="form-control" placeholder="Enter Icon Title">
        </div>

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary add_icon_data" name="add_icon_data" value="Add" id="add_icon_data" >Add</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>
<!-- ========================================================== ICONS EDIT =========================================================== -->
    <div class="modal fade" id="icons_edit_modal" tabindex="-2" role="dialog" aria-labelledby="icons_edit_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="icons_edit_modal">Icons Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="icons_edit_form"> 

        <input type="hidden" id="action" name="action" value="icons_edit_form_submit">
        <input type="hidden" id="Icon_ID" name="Icon_ID" value="">
        
        <div class="form-group">
          <label>Icon</label>
          <input type="text" name="icon_text_edit" id="icon_text_edit" value="" class="form-control" placeholder="Enter Icon Code">
        </div>

        <div class="form-group">
          <label>Title</label>
          <input type="text" name="icon_title_edit" id="icon_title_edit" value="" class="form-control" placeholder="Enter Icon Title">
        </div>

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary edit_icons_data" name="edit_icons_data" value="edit_icons_data" id="edit_icons_data" >Edit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>

<!-- ========================================================== Tracking Vehicles Add =========================================================== -->
  <div class="modal fade" id="vehicle_new_modal" tabindex="-2" role="dialog" aria-labelledby="vehicle_new_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="vehicle_new_modal">Add New Vehicle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="vehicle_new_form"> 

        <input type="hidden" id="action" name="action" value="vehicle_new_form_submit">
        <input type="hidden" id="lati" name="lati" value="0">
        <input type="hidden" id="lon" name="lon" value="0">

        
        <div class="form-group">
          <label>Unique ID / GPS Model ID</label>
          <input type="text" name="unique_id" id="unique_id" value="" class="form-control" placeholder="Enter Unique ID / GPS Model ID">
        </div>

        <div class="form-group">
          <label>Select Package</label>
          <input type="hidden" id="gps_package_id" name="gps_package_id" value="0">
          <select name="gps_package" id="gps_package" class="form-control">
              <option value="0" selected >Select Package</option>
          <?php 
            $sql = "SELECT * FROM package WHERE Status = 1";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
            while($row=mysqli_fetch_array($result))
            {

              ?>
              
              <option value="<?php echo $row['Travel_ID']; ?>" selected ><?php echo $row['T_Name']; ?></option>
              
          <?php
            }
          }else
          {
            ?>
            <option value="0" selected >No Data Found</option>
            <?php
          }

          ?>
          </select>
        </div>

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary add_vehicle_data" name="add_vehicle_data"  id="add_vehicle_data" >Insert</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>
<!-- ========================================================== Tracking Vehicles Edit =========================================================== -->
  <div class="modal fade" id="vehicle_edit_modal" tabindex="-2" role="dialog" aria-labelledby="vehicle_edit_modal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="vehicle_edit_modal">Vehicle Data Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form method="POST" enctype="multipart/form-data" id="vehicle_edit_form"> 

        <input type="hidden" id="action" name="action" value="vehicle_edit_form_submit">
        <input type="hidden" id="id" name="id" value="">

        
        <div class="form-group">
          <label>Edit Unique ID / GPS Model ID</label>
          <input type="text" name="edit_unique_id" id="edit_unique_id" value="" class="form-control" placeholder="Enter Unique ID / GPS Model ID">
        </div>

        <div class="form-group">
          <label>Select Package</label>
          <input type="hidden" id="edit_gps_package_id" name="edit_gps_package_id" value="0">
          <select name="edit_gps_package" id="edit_gps_package" class="form-control">
              <option value="0" selected >Select Package</option>
          <?php 
            $sql = "SELECT * FROM package WHERE Status = 1";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
            while($row=mysqli_fetch_array($result))
            {

              ?>
              
              <option value="<?php echo $row['Travel_ID']; ?>" selected ><?php echo $row['T_Name']; ?></option>
              
          <?php
            }
          }else
          {
            ?>
            <option value="0" selected >No Data Found</option>
            <?php
          }

          ?>
          </select>
        </div>

        </div>


        <div class="modal-footer">
          
              <button type="submit" class="btn btn-primary edit_vehicle_data" name="edit_vehicle_data"  id="edit_vehicle_data" >Edit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>
        </form>
        </div>
    </div>
    </div>