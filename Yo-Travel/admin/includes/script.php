
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <script src="googlemap.js"></script>
    
    <script type="text/javascript" src="../assets/js/instascan.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="js.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script src="myjs.js"></script>
    <!-- depend dropdown -->


    <!-- datatable -->
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

  
    <script>

    
    </script>


    
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
   