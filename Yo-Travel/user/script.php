  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>

<!-- Myjs.js -->
<script src="includes/myjs.js"></script>

  <!-- CSS JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../js.js"></script>
  <script src="../assets/js/sweetalert.min.js"></script>

  <!-- Limit Scrol bar JS -->
  <script src="../assets/js/jquery-ui.js"></script>

  <script src="js.js"></script>

  <script src="googlemap.js"></script>
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5SUrSd237MKwlLNYbGDfv-FROSRwb6EI&callback=loadMap1"
      async
    ></script>

  <?php
      if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
          ?>
        
        <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Done!",
            });
        </script>
        <?php
        unset($_SESSION['status']);
      }

    ?>

