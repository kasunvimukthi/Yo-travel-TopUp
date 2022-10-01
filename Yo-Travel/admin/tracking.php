<?php 
    include ('includes/check_login.php');
    include ('includes/header.php');
    include ('includes/navbar.php');
    include ('includes/sidebar.php');
    ?>
<style type="text/css">

#map {
  width: 100%;
  height: 100%;
  
}
.hide {
  display: none;
}

.block {
  display: block;
}
</style>
    <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3 ">
            
            <div class="row">
                <select name="tracking_package" id="tracking_package" class="form-control col-md-2 ml-3">
                    <option value="0" selected>Select Guider</option>
                </select>
                <!-- <select name="tracking_vehical" id="tracking_vehical" class="form-control col-md-2 ml-3">
                    <option value="0" selected>Select Guider</option>
                </select> -->
                <input type="text" name="vehical_code" id="vehical_code" value="" placeholder="Guider ID" class="form-control col-md-2 ml-3">
                <p class="ml-3 small" id="info">* you can manualy search guider by ID</p>
                <div class="col-md-12 ml-1 mt-2 small">
                <label for="#lat">Lati - </label>
                  <input type="text" name="lat" id="lat" value="" class="latlong" readonly>
                <label for="#lat">Long - </label>
                  <input type="text" name="lng" id="lng" value="" class="latlong" readonly>
                <label for="#vehical">Name - </label>
                  <input type="text" name="Guider" id="vehical" value="" class="latlong" readonly>
                </div>
                <style type="text/css">
                  .latlong {
                    background-color: transparent;
                    border: none;
                    outline: none;
                  }
                  
                </style>


            </div>
           
          </div>
        <div class="card-body" id="tracking_fetch_data"  style="height: 70vh; overflow-y: scroll;">
          <div class="col-md-12 h-100 GPS" style="align-items: center; display: flex; justify-content: center;" id="GPS">
              <h1 class="icofont-location-pin" id="GPS1">GPS Tracking</h1>
          </div>
          <div id="map" class="hide map"></div>
        </div>
      </div>
    </div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5SUrSd237MKwlLNYbGDfv-FROSRwb6EI&callback=loadMap"
      async
    ></script>
  <?php 
    include ('includes/script.php');
    include ('includes/footer.php');
    include ('includes/modal.php');
  
    ?>