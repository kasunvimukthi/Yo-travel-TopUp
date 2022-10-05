$(document).ready(function()
{
    setInterval(function(){
        alerts();
        alerts_count();
        alerts_modal();
        enquiry();
        enquiry_modal();
        enquiry_count();
        event_count();
        upcoming_event_count();
        wrong_code();
        lat_long();
    },1000);
    
    all();

    function all()
    {
        prediction_fetch();
        // prediction_chart();
        income_chart();
        category_fetch_data();
        admin_fetch();
        user_fetch();
        user_invoice_fetch();
        SubTotal();
        package_overview();
        bookingfull();
        bookingexpired();
        package_accommodation();
        package_activity();
        alerts();
        alerts_count();
        alerts_modal();
        enquiry();
        enquiry_modal();
        enquiry_count();
        chat_bot();
        showBarChart();
        showDonutChart();
        icon_fetch();
        event_table_fetch();
        gps_tracking_package();
        vehicles_fetch();
        user_journey_fetch();
        guider_fetch();
        guider_list_fetch();
        // showProfit_LossChart();
    }


  // Sacan QR Code & Login
  $('#login_qr').click(function() {
    
    $('#login_qr_modal').modal('show');
    
    let scanner = new Instascan.Scanner({ video: document.getElementById('login_qr_preview')});
    Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
            scanner.start(cameras[0]);
        } else{
            alert('Camera Not Found'); // If device not have camera, popup error message
        }

    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan',function (c){ // Read QR Code
      
      $('#qr_email').val(c); // QR values add in to text box
     
        $('#login_with_qr').submit(); // submit login forms
    });
  });

    // Sacan QR for check invoice
    $('#invoice_check').click(function() {

        $('#invoice_check_modal').modal('show');
        
        let scanner = new Instascan.Scanner({ video: document.getElementById('invoice_qr_preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0 ){
                scanner.start(cameras[0]);
            } else{
                alert('No cameras found'); // If device not have camera, popup error message
            }

        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan',function (c){ // Read QR Code
            
            $('#qr_invoice').val(c); // QR values add in to text box
            
            $('#invoice_check_form').submit(); // submit login forms
        });
        });
// ======================================== Alert Drop Down Fetch ======================================
    function alerts()
    {
        var action = "fetch_alerts";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#alert_data').html(data);
            }
        })
    }
// ======================================= Alerts modal fetch ==========================================
    function alerts_modal()
    {
        var action = "show_all_alerts";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#show_all_alerts_modal_data').html(data);
            }
        })
    }
// ============================================= Alerts count ==========================================
    function alerts_count()
    {
        var action = "fetch_alerts_count";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#alert_count_data').html(data);
            }
        })
    }
// ============================================= Event count ==========================================
    function event_count()
    {
        var action = "fetch_event_count";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#event_count_data').html(data);
            }
        })
    }
// ============================================= Upcoming Event Fetch ==========================================
    function upcoming_event_count()
    {
        var action = "fetch_upcoming_event";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#upcoming_event').html(data);
                $('#upcoming_event2').html(data);
            }
        })
    }
// ======================================== Enquiry Drop Down Fetch ======================================
    function enquiry()
    {
        var action = "fetch_enquiry";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#enquiry_data').html(data);
            }
        })
    }
// ======================================= Enquiry modal fetch ==========================================
    function enquiry_modal()
    {
        var action = "show_all_enquiry";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#show_all_enquiry_modal_data').html(data);
            }
        })
    }
// ============================================= Enquiry count ==========================================
    function enquiry_count()
    {
        var action = "fetch_enquiry_count";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#enquiry_count_data').html(data);
            }
        })
    }
// ============================================= Chat-Bot ==========================================
    function chat_bot()
    {
        var action = "fetch_chat_bot";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#bot_chat_data').html(data);

                $('#datatable12').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
    }
// ============================================= Icons Fetch ==========================================
    function icon_fetch()
    {
        var action = "fetch_icons";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#icons_data').html(data);

                $('#datatable13').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
    }
// ============================================== BOOKING FULL ==============================================
    function bookingfull()
    {
        var action = "booking_full";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {

            }
        })
    }
// ============================================== BOOKING EXPIRED ==============================================
    function bookingexpired()
    {
        var action = "booking_expired";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                
            }
        })
    }
// ============================================== ADMIN FETCH==============================================
function admin_fetch()
{
    var action = "admin_fetch";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#admin_data').html(data);
                
                    $('#datatable1').DataTable({
                      dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                   
            }
        })
}
// ============================================== EVENT TABLE FETCH==============================================
function event_table_fetch()
{
    var action = "event_table_fetch";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#event_table').html(data);

                $('#datatable2').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
}
// ============================================== USER FETCH==============================================
function user_fetch()
{
    var action = "user_fetch";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#user_data').html(data);

                $('#datatable3').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
}

// ============================================== USER INVOICE FETCH==============================================
function user_invoice_fetch()
{
    var action = "user_invoice_fetch";
    var from = $('#invoice_from_date').val();
    var to = $('#invoice_to_date').val();
    var p_id = $('#package_select').val();
    var I_S = $('#invoice_status_select').val();

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action, from:from, to:to, p_id:p_id, I_S:I_S},
            success:function(data)
            {
                $('#user_invoice_data').html(data);

                $('#datatable4').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
}

// ============================================== JOURNEY LIST FETCH==============================================
function user_journey_fetch()
{
    var action = "user_journey_fetch";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#user_journey_data').html(data);

                $('#datatable15').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
}
// ============================================== CATEGORY FETCH==============================================
    function category_fetch_data()
    {
        var action = "category_fetch";
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#category_data').html(data);

                    $('#datatable5').DataTable({
                        dom: 'Bfrtip',
                          buttons: [
                              'copy', 'csv', 'excel', 'pdf', 'print'
                          ]
                      });
                }
            })
    }
// ============================================== PACKAGE OVERVIEW FETCH==============================================
    function package_overview()
    {
        var action = "package_overview";
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#package_overview_data').html(data);

                    $('#datatable6').DataTable({
                        dom: 'Bfrtip',
                          buttons: [
                              'copy', 'csv', 'excel', 'pdf', 'print'
                          ]
                      });
                }
            })
    }
// ============================================== PACKAGE ACCOMMODATION FETCH==============================================
    function package_accommodation()
    {
        var action = "package_accommodation";
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#accommondation_data').html(data);

                    $('#datatable7').DataTable({
                        dom: 'Bfrtip',
                          buttons: [
                              'copy', 'csv', 'excel', 'pdf', 'print'
                          ]
                      });
                }
            })
    }
// ============================================== PACKAGE ACTIVITY FETCH==============================================
    function package_activity()
    {
        var action = "package_activity";
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#activity_data').html(data);

                    $('#datatable8').DataTable({
                        dom: 'Bfrtip',
                          buttons: [
                              'copy', 'csv', 'excel', 'pdf', 'print'
                          ]
                      });
                }
            })
    }
// ============================================== VEHICLE FETCH==============================================
    function vehicles_fetch()
    {
        var action = "vehicles_fetch";
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#vehicles_data').html(data);

                    $('#datatable9').DataTable({
                        dom: 'Bfrtip',
                          buttons: [
                              'copy', 'csv', 'excel', 'pdf', 'print'
                          ]
                      });
                }
            })
    }

// ============================================== GUDIER FETCH ==============================================
function guider_fetch()
{
    var action = "guider_fetch";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#guider_data').html(data);

                $('#datatable14').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
}
// ============================================== PREDICTION FETCH ==============================================
function prediction_fetch()
{
    var action = "prediction_fetch";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#prediction').html(data);
                prediction_chart();
                $('#datatable144').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
}
// ============================================== GUDIER LIST FETCH ==============================================
function guider_list_fetch()
{
    var action = "guider_list_fetch";
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#guider_list_data').html(data);

                $('#datatable17').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
}

function SubTotal(){
    // var action = "fetch_subTotal";
    
    // $('#user_id').empty();
    var id = $('#user_select').val();
    var from = $('#invoice_from_date').val();
    var to = $('#invoice_to_date').val();
    var p_id = $('#package_select').val();
    var I_S = $('#invoice_status_select').val();

    if(id == 'all_user')
    {
        var action = "allUserSubTotal";

    }
    else
    {
        var action = "SelectedUserSub";

    }{
    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action ,ID:id, from:from, to:to, p_id:p_id, I_S:I_S},
            success:function(data)
            {
                $('#UserSubTotal').html(data);

                $('#datatable20').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });

                  $('#datatable21').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });

            }
        })
    }
}

    function userInvoice(){
        var from = $('#invoice_from_date').val();
        var to = $('#invoice_to_date').val();
        var id = $('#user_select').val();
        var p_id = $('#package_select').val();
        var I_S = $('#invoice_status_select').val();
        
        if(id == 'all_user')
        {
            var action = "user_invoice_fetch";
        }
        else
        {
            var action = "user_select";
        }
        {
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action ,ID:id, from:from, to:to, p_id:p_id, I_S:I_S},
            success:function(data)
            {
                SubTotal();
                $('#user_invoice_data').html(data);

                $('#datatable4').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });

                  $('#datatable').DataTable({
                    dom: 'Bfrtip',
                      buttons: [
                          'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
                  });
            }
        })
        }
    }

// ============================================== INCOME CHART ==========================================================
    function income_chart(){
        var from = $('#income_from_date').val();
        var to = $('#income_to_date').val();
        var action = "Profit_Loss";

        if (from > to){
            swal('Opps..Data Range Error','Please Select To date more than from date','info');
        }
        else
        if (from == ''){
            swal('Opps..Data Range Error','Please Select From date','info');
        }else
        if (from == ''){
            swal('Opps..Data Range Error','Please Select To Date','info');
        }else
        
        {
            $.ajax({
            url:"action.php",
            method: "POST",
            data:{action:action,from:from,to:to},
            success:function (data1)
            
            {
                // console.log(data1);
                var name = [];
                var marks = [];

                for (var i in data1) {
                    
                    name.push(data1[i].Date);
                    marks.push(data1[i].Profit_Loss);
                    $('#profit_loss').remove();
                    $('#chart').append('<canvas id="profit_loss"></canvas>');
                }


                

                var graphTarget = $("#profit_loss");

                var barGraph = new Chart(graphTarget, {
                    type: 'line',
                    data: {
                    labels: name,
                    datasets: [
                        {
                            label: 'Total Income',
                            backgroundColor: '#4e73df',
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#2e59d9',
                            hoverBorderColor: '#666666',
                            data: marks
                        }],
                    },
                    
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                        },
                        scales: {
                        xAxes: [{
                            time: {
                            unit: 'date'
                            },
                            gridLines: {
                            display: false,
                            drawBorder: false
                            },
                            ticks: {
                            maxTicksLimit: 10
                            }
                        }],
                        yAxes: [{
                            ticks: {
                            maxTicksLimit: 10,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return 'Rs. ' + number_format(value);
                            }
                            },
                            gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                            }
                        }],
                        },
                        legend: {
                        display: false
                        },
                        tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': Rs ' + number_format(tooltipItem.yLabel);
                            }
                        }
                        }
                    }
                    
                });
            }
        });
    }
    }

// ============================================== PRDICTION CHART ==========================================================
function prediction_chart(){
    var action = "prediction_chart";
    
    {
        $.ajax({
        url:"action.php",
        method: "POST",
        data:{action:action},
        success:function (User_data)
        
        {
            var name = [];
            var marks = [];
            var marks1 = [];
            var marks2 = [];

            for (var i in User_data) {
                
                name.push(User_data[i].P_Name);
                marks.push(User_data[i].M_B_Month_C);
                marks1.push(User_data[i].P_Month_C);
                marks2.push(User_data[i].N_Month_C);
                // $('#profit_loss').remove();
                $('#prediction_chart').append('<canvas id="prediction_chart1"></canvas>');
            }


            

            var graphTarget = $("#prediction_chart1");

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: {
                labels: name,
                datasets: [
                    {
                        label: 'Month Befor Past Month Pacenger Count',
                        fill: 'false',
                        borderColor: '#fd7e14',
                        data: marks
                    },
                    {
                        label: 'Past Month Pacenger Count',
                        fill: 'false',
                        borderColor: '#46d5f1',
                        data: marks1
                    },
                    {
                        label: 'Next Month Pacenger Count',
                        fill: 'false',
                        borderColor: '#e74a3b',
                        data: marks2
                    }
                ],
                },
                
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                    },
                    scales: {
                    xAxes: [{
                        time: {
                        unit: 'date'
                        },
                        gridLines: {
                        display: false,
                        drawBorder: false
                        },
                        ticks: {
                        maxTicksLimit: 10
                        }
                    }],
                    yAxes: [{
                        ticks: {
                        maxTicksLimit: 10,
                        padding: 10,
                        
                        
                        },
                        gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                        }
                    }],
                    },
                    legend: {
                        position: 'top',
                    },
                    tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    
                    }
                }
                
            });
        }
    });
}
}

// ============================================== PACKAGE ITINERARY FETCH ==============================================
    $(document).ready(function(){
        $("#category").change(function(){
            var aid = $("#category").val();
            var action = "action";
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'aid=' + aid
            }).done(function(packages){
                
                packages = JSON.parse(packages);
                $('#package').empty();
                
                packages.forEach(function(package){
                    $('#package').append('<option value='+ package.Travel_ID +'>' + package.T_Name + '</option>')
                    
                })
            })
        })


    $("#package").mouseup(function(){
    var pid = $("#package").val();
    $("#id").val (pid);
    $('#id').empty();

    var action = "package_itinerary";
    var id = $('#id').val();

    
    if(id == '')
    {
    swal('Pleaase Select Category','First You Need to Select Category','info');
    return false;
    }
    else
    {
    $.ajax(
    {
        url:"action.php",
        method:"POST",
        data:{action:action ,ID:id},
        success:function(data)
        {
            $('#itineray_data').html(data);

            $('#datatable10').DataTable({
                dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              });
        }
    })
    }
    })
    })
// ============================================== PACKAGE ACCOMMODATION FETCH ==============================================
    // $(document).ready(function(){
    //     $("#acc_category").change(function(){
    //         var accid = $("#acc_category").val();
            
    //         $.ajax({
    //             url: 'data.php',
    //             method: 'post',
    //             data: 'accid=' + accid
    //         }).done(function(accpackages){
                
    //             accpackages = JSON.parse(accpackages);
    //             $('#acc_package').empty();
                
    //             accpackages.forEach(function(accpackage){
    //                 $('#acc_package').append('<option value='+ accpackage.Travel_ID +'>' + accpackage.T_Name + '</option>')
                    
    //             })
    //         })
    //     })


    // $("#acc_package").mouseup(function(){
    // var pid = $("#acc_package").val();
    // $("#acc_id").val (pid);
    // $('#acc_id').empty();

    // var action = "package_accommodation";
    // var id = $('#acc_id').val();


    // if(id == '')
    // {
    // swal('Pleaase Select Category','First You Need to Select Category','info');
    // return false;
    // }
    // else
    // {
    // $.ajax(
    // {
    //     url:"action.php",
    //     method:"POST",
    //     data:{action:action ,ID:id},
    //     success:function(data)
    //     {
    //         $('#accommondation_data').html(data);
    //     }
    // })
    // }
    // })
    // })
// ============================================== PACKAGE ACTIVITY FETCH ==============================================
    $(document).ready(function(){
        $("#act_category").change(function(){
            var actid = $("#act_category").val();
            
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'actid=' + actid
            }).done(function(actpackages){
                
                actpackages = JSON.parse(actpackages);
                $('#act_package').empty();
                
                actpackages.forEach(function(actpackage){
                    $('#act_package').append('<option value='+ actpackage.Travel_ID +'>' + actpackage.T_Name + '</option>')
                    
                })
            })
        })


    $("#act_package").mouseup(function(){
    var pid = $("#act_package").val();
    $("#act_id").val (pid);
    $('#act_id').empty();

    var action = "package_activity";
    var id = $('#act_id').val();


    if(id == '')
    {
    swal('Pleaase Select Category','First You Need to Select Category','info');
    return false;
    }
    else
    {
    $.ajax(
    {
        url:"action.php",
        method:"POST",
        data:{action:action ,ID:id},
        success:function(data)
        {
            $('#activity_data').html(data);

            $('#datatable11').DataTable({
                dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              });
        }
    })
    }
    })
    })
// ============================================== PACKAGE ITINERARY MODEL FETCH ==============================================
// for iti edit category option
    $(document).ready(function(){
        $("#iti_category").change(function(){
            var aid = $("#iti_category").val();
            
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'aid=' + aid
            }).done(function(packages){
                
                packages = JSON.parse(packages);
                $('#iti_package').empty();
                
                packages.forEach(function(package){
                    $('#iti_package').append('<option value='+ package.Travel_ID +'>' + package.T_Name + '</option>')
                    
                })
            })
        })
// for iti insert category option
        $("#insert_iti_category").change(function(){
            var aid = $("#insert_iti_category").val();
            
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'aid=' + aid
            }).done(function(packages){
                
                packages = JSON.parse(packages);
                $('#insert_iti_package').empty();
                
                packages.forEach(function(package){
                    $('#insert_iti_package').append('<option value='+ package.Travel_ID +'>' + package.T_Name + '</option>')
                    
                })
            })
        })
// for iti edit package option
    $("#iti_package").mouseup(function(){
    var pid = $("#iti_package").val();
    $("#iti_pac_id").val (pid);
    $('#iti_pac_id').empty();

    var action = "package_itinerary2";
    var id = $('#iti_pac_id').val();


    if(id == '')
    {
    swal('Pleaase Select Category','First You Need to Select Category','info');
    return false;
    }
   
    })
// for iti insert package option
    $("#insert_iti_package").mouseup(function(){
    var pid = $("#insert_iti_package").val();
    $("#insert_iti_pac_id").val (pid);
    $('#insert_iti_pac_id').empty();

    var action = "package_itinerary2";
    var id = $('#insert_iti_pac_id').val();


    if(id == '')
    {
    swal('Pleaase Select Category','First You Need to Select Category','info');
    return false;
    }
   
    })
    })
// ============================================== PACKAGE ACCOMMODATION MODEL FETCH ==============================================
// for accommodation edit category option
    $(document).ready(function(){
        $("#acco_category").change(function(){
            var aid = $("#acco_category").val();
            
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'aid=' + aid
            }).done(function(packages){
                
                packages = JSON.parse(packages);
                $('#acco_package').empty();
                
                packages.forEach(function(package){
                    $('#acco_package').append('<option value='+ package.Travel_ID +'>' + package.T_Name + '</option>')
                    
                })
            })
        })
    // for accommodation insert category option
        $("#insert_Accomodation_category").change(function(){
            var aid = $("#insert_Accomodation_category").val();
            
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'aid=' + aid
            }).done(function(packages){
                
                packages = JSON.parse(packages);
                $('#insert_Accomodation_package').empty();
                
                packages.forEach(function(package){
                    $('#insert_Accomodation_package').append('<option value='+ package.Travel_ID +'>' + package.T_Name + '</option>')
                    
                })
            })
        })
    // for accommodation edit package option
    $("#acco_package").mouseup(function(){
    var pid = $("#acco_package").val();
    $("#acco_pac_id").val (pid);
    $('#acco_pac_id').empty();

    
    var id = $('#acco_pac_id').val();


    if(id == '')
    {
    swal('Pleaase Select Category','First You Need to Select Category','info');
    return false;
    }

    })
    // for accommodation insert package option
    $("#insert_Accomodation_package").mouseup(function(){
    var pid = $("#insert_Accomodation_package").val();
    $("#insert_Accomodation__pac_id").val (pid);
    $('#insert_Accomodation__pac_id').empty();

    s
    var id = $('#insert_Accomodation__pac_id').val();


    if(id == '')
    {
    swal('Pleaase Select Category','First You Need to Select Category','info');
    return false;
    }

    })
    })
// ============================================== PACKAGE ACTIVITY MODEL FETCH ==============================================
    // for activity edit category option
    $(document).ready(function(){
        $("#acti_category").change(function(){
            var aid = $("#acti_category").val();
            
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'actid=' + aid
            }).done(function(packages){
                
                packages = JSON.parse(packages);
                $('#acti_package').empty();
                
                packages.forEach(function(actpackage){
                    $('#acti_package').append('<option value='+ actpackage.Travel_ID +'>' + actpackage.T_Name + '</option>')
                    
                })
            })
        })
    // for activity insert category option
        $("#insert_Activity_category").change(function(){
            var aid = $("#insert_Activity_category").val();
            
            $.ajax({
                url: 'data.php',
                method: 'post',
                data: 'aid=' + aid
            }).done(function(packages){
                
                packages = JSON.parse(packages);
                $('#insert_Activity_package').empty();
                
                packages.forEach(function(package){
                    $('#insert_Activity_package').append('<option value='+ package.Travel_ID +'>' + package.T_Name + '</option>')
                    
                })
            })
        })
    // for activity edit package option
    $("#acti_package").mouseup(function(){
    var pid = $("#acti_package").val();
    $("#act_pac_id").val (pid);
    $('#act_pac_id').empty();


    var id = $('#act_pac_id').val();


    if(id == '')
    {
    swal('Pleaase Select Category','First You Need to Select Category','info');
    return false;
    }

    })
    // for activity edit package option
    $("#insert_Activity_package").mouseup(function(){
    var pid = $("#insert_Activity_package").val();
    $("#insert_Activity__pac_id").val (pid);
    $('#insert_Activity__pac_id').empty();

    
    var id = $('#insert_Activity__pac_id').val();


    if(id == '')
    {
    swal('Pleaase Select Category','First You Need to Select Category','info');
    return false;
    }

    })
    })
// ============================================== ADMIN ADD==============================================
    $('#AdminAdd').click(function(){
    $('#Admin_Add').modal('show');
    $('#admin_form')[0].reset();
    $('#action').val('admin_insert');
    $('#A_add').val("Insert");
    $('#A_add').text("Insert");
    
   });

   $('#admin_form').submit(function(event){
    event.preventDefault();

    var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    var admin_name = $('#add_Name').val();
    var admin_email = $('#add_Email').val();
    var admin_number = $('#add_Number').val();
    var admin_password = $('#add_Password').val();
    var admin_con_password = $('#add_reassword').val();

    if(admin_name == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Name ','info');
     return false;
    }
    else 
    if(admin_email == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin E-mail ','info');
     return false;
    }else
    if(admin_number == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Contact Number ','info');
     return false;
    }
    else 
    if(admin_number.length !=10){
    swal('Invalid Contact Number','Please Check Your Contact Number','error');
    return false;
     }else
    if(admin_password == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Password','info');
     return false;
    }else
    if(admin_con_password == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Admin Confirm Password','info');
     return false;
    }else
    if(admin_password !== admin_con_password)
    {
     swal('Opps...Admin Password','Admin Password & Confirm Password not Match','info');
     return false;
    }else
    if(!(email_filter.test(admin_email))){
       swal('Email Not Valid','Please Enter Valid Email Address','error');
       return false;
    }else
    
     {
      $.ajax({
       url:"signup_check.php",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       processData:false,
       success:function(data){
        if(data == "Created")
       {
        // swal('Greate Job','Admin Account Has Been Created Successfully','success');
        all();
        email_send();
        $('#Admin_Add').modal('hide');
       }else
       if(data == "Error")
       {
        swal('Opps...','Unknown Error Occurred','error');
       }else
       if(data == "email")
       {
        swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
       }
        
       }
      });
     }
    
   });

   function email_send()
   {
     var email = $('#add_Email').val();
     var name = $('#add_Name').val();
     var password = $('#add_reassword').val();

     var action = "email_send";

     $.ajax({
       url:"signup_check.php",
       method:"POST",
       data:{action:action, email:email, name:name, password:password},
       success:function(data)
       {
         
           swal('New Admin Account Has Been Created Now','Check Given E-mail, System Sent Admin QR Code','success');
           $('#admin_form')[0].reset();

         
       }
   })
   }

// ============================================== GUIDER ADD==============================================
    $('#GuiderAdd').click(function(){
    $('#Guider_Add').modal('show');
    $('#guider_form')[0].reset();
    $('#action').val('guider_insert');
    
   });

   $('#guider_form').submit(function(event){
    event.preventDefault();

    var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    var admin_name = $('#G_add_Name').val();
    var admin_email = $('#G_add_Email').val();
    var admin_number = $('#G_add_Number').val();
    var admin_password = $('#G_add_Password').val();
    var admin_con_password = $('#G_add_reassword').val();

    if(admin_name == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Guider Name ','info');
     return false;
    }
    else 
    if(admin_email == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Guider E-mail ','info');
     return false;
    }else
    if(admin_number == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Guider Contact Number ','info');
     return false;
    }
    else 
    if(admin_number.length !=10){
    swal('Invalid Contact Number','Please Check Guider Number','error');
    return false;
     }else
    if(admin_password == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Guider Password','info');
     return false;
    }else
    if(admin_con_password == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Guider Confirm Password','info');
     return false;
    }else
    if(admin_password !== admin_con_password)
    {
     swal('Opps...Guider Password','Guider Password & Confirm Password not Match','info');
     return false;
    }else
    if(!(email_filter.test(admin_email))){
       swal('Email Not Valid','Please Enter Valid Email Address','error');
       return false;
    }else
    
     {
      $.ajax({
       url:"action.php",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       processData:false,
       success:function(data){
        if(data == "Created")
       {
        // swal('Greate Job','Admin Account Has Been Created Successfully','success');
        all();
        email_send1();
        $('#Guider_Add').modal('hide');
       }else
       if(data == "Error")
       {
        swal('Opps...','Unknown Error Occurred','error');
       }else
       if(data == "email")
       {
        swal('Opps...','This E-mail Already Taken, Please Enter Another E-mail','info');
       }
        
       }
      });
     }
    
   });

   function email_send1()
   {
     var email = $('#G_add_Email').val();
     var name = $('#G_add_Name').val();
     var password = $('#G_add_reassword').val();

     var action = "G_email_send";

     $.ajax({
       url:"signup_check.php",
       method:"POST",
       data:{action:action, email:email, name:name, password:password},
       success:function(data)
       {
         
           swal('New Guider Account Has Been Created Now','Check Given E-mail, System Sent Guider QR Code','success');
           $('#guider_form')[0].reset();

         
       }
   })
   }
// ==============================================CATEGORY ADD==============================================
    $('#CategoryAdd').click(function(){
        $('#Category_Add').modal('show');
        $('#category_new_form')[0].reset();
        $('#cat_image').val('');
        $('#action').val('cat_insert');
        $('#C_add').val("Insert");
        $('#C_add').text("Insert");
        
       });
    
       $('#category_new_form').submit(function(event){
        event.preventDefault();
        var category_name = $('#cat_Name').val();
        var category_image = $('#cat_image').val();
        var category_details = $('#cat_details').val();
        if(category_image == '')
        {
         swal('Opps...Fill in the Blank','Please Select Image File ','info');
         return false;
        }
        else 
        if(category_name == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Category Name ','info');
         return false;
        }else
        if(category_details == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Category Details ','info');
         return false;
        }
        else 
        {
         var extension = $('#cat_image').val().split('.').pop().toLowerCase();
         if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
         {
          swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
          $('#cat_image').val('');
          return false;
         }
         else
         {
          $.ajax({
           url:"action.php",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           processData:false,
           success:function(data)
           {
            swal('Greate Job..',data,'success');
            all();
            $('#category_new_form')[0].reset();
            $('#Category_Add').modal('hide');
           }
          });
         }
        }
    });
// ============================================== PACKAGE OVERVIEW ADD==============================================
$('#Package_Add').click(function(){
    $('#Package_Add_Modal').modal('show');
    $('#package_overview_new_form')[0].reset();
    $('#pak_image').val('');
    $('#action').val('pack_overview_insert');
    $('#P_o_add').val("Insert");
    $('#P_o_add').text("Insert");
    
   });

    $('#package_overview_new_form').submit(function(event){
        event.preventDefault();
        var select_category = $('#scategory').val();
        var package_name = $('#pak_Name').val();
        var package_adult_cost = $('#pak_Adult_Cost').val();
        var package_adult_seling = $('#pak_Adult_Selling').val();

        var package_child_cost = $('#pak_Child_Cost').val();
        var package_child_seling = $('#pak_Child_Selling').val();

        var package_image = $('#pak_image').val();
        var package_details = $('#pak_details').val();
        var package_location = $('#pak_Loacation').val();
        var paxkage_map = $('#pak_Map').val();
        var package_venue = $('#pak_date').val();
        var end_date = $('#pak_end_date').val();
        var booking = $('#pak_booking').val();
        
        if(select_category == '')
        {
        swal('Opps...Select Category','Please Select Travel Category','info');
        return false;
        }else
        if(package_name == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Name ','info');
        return false;
        }
        else 
        if(package_adult_cost == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Cost for One Adult','info');
        return false;
        }
        else
        if(package_adult_seling == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Selling Price for One Adult','info');
        return false;
        }
        else
        if(package_child_cost == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package for One Child','info');
        return false;
        }
        if(package_child_seling == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Selling Price for One Child','info');
        return false;
        }
        else
        if(package_image == '')
        {
        swal('Opps...Fill in the Blank','Please Select Image File ','info');
        return false;
        }
        else 
        if(package_details == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Overview ','info');
        return false;
        }
        else
        if(package_location == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Locations ','info');
        return false;
        }
        else 
        if(paxkage_map == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Map Link ','info');
        return false;
        }
        else
        if(package_venue == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Travel Start Date','info');
        return false;
        }
        else
        if(end_date == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Travel End Date','info');
        return false;
        }
        else
        if(booking == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Number of Booking','info');
        return false;
        }
        else
        {
        var extension = $('#pak_image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#pak_image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            all();
            $('#package_overview_new_form')[0].reset();
            $('#Package_Add_Modal').modal('hide');
        }
        });
        }
        }
    });
// ============================================== PACKAGE ITINERARY INSERT ==============================================
    $('#itinerary_new').click(function(){
    $('#Iti_Insert').modal('show');
    $('#Package_Itinerary_Insert_Form')[0].reset();
    $('#insert_iti_image').val('');
    $('#action').val('Insert_Package_Itinerary_Form');
    
   });

    $('#Package_Itinerary_Insert_Form').submit(function(event){
        event.preventDefault();
        var package_id = $('#insert_iti_pac_id').val();
        var iti_date = $('#insert_iti_Date').val();
        var iti_loc = $('#insert_iti_Loc').val();
        var iti_details = $('#insert_iti_details').val();
        var iti_acc = $('#insert_iti_acc').val();
        var iti_act = $('#insert_iti_act').val();
        var iti_img = $('#insert_iti_image').val();
        
        
        if(package_id == '')
        {
        swal('Opps...Select Package','Please Select Package','info');
        return false;
        }else
        if(iti_date == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Date','info');
        return false;
        }
        else 
        if(iti_loc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Location','info');
        return false;
        }
        else
        if(iti_details == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Details','info');
        return false;
        }
        else 
        if(iti_acc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Accommodations','info');
        return false;
        }
        else
        if(iti_act == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Activities','info');
        return false;
        }
        else 
        if(iti_img == '')
        {
        swal('Opps...Fill in the Blank','Please Upload Itinerary Image','info');
        return false;
        }
        else
        {
        var extension = $('#insert_iti_image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#insert_iti_image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            all();
            $('#Package_Itinerary_Insert_Form')[0].reset();
            $('#Iti_Insert').modal('hide');
        }
        });
        }
        }
    });
// ============================================== PACKAGE ACCOMMODATION INSERT ==============================================
    $('#accommodation_new').click(function(){
    $('#Accomodation_Insert').modal('show');
    $('#Package_Accomodation_Insert_Form')[0].reset();
    $('#insert_Accomodation_image').val('');
    $('#action').val('Insert_Package_Accomodation_Form');
    
   });

    $('#Package_Accomodation_Insert_Form').submit(function(event){
        event.preventDefault();
        
        var acc_name = $('#Insert_Accomodation_Name').val();
        var acc_loc = $('#Insert_Accomodation_location').val();
        var acc_sum = $('#Insert_Accomodation_Summary').val();
        var acc_details = $('#Insert_Accomodation_Details').val();
        var acc_style = $('#Insert_Accomodation_Style').val();
        var acc_room = $('#Insert_Accomodation_Room').val();
        var acc_feature = $('#Insert_Accomodation_Feature').val();
        var acc_acc = $('#Insert_Accomodation_Link').val();
        var acc_img = $('#Insert_Accomodation_Image').val();
        
        
        
        if(acc_name == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Name','info');
        return false;
        }
        else 
        if(acc_loc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Location','info');
        return false;
        }
        else
        if(acc_sum == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Summary','info');
        return false;
        }
        else
        if(acc_details == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Details','info');
        return false;
        }
        else 
        if(acc_style == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Style','info');
        return false;
        }
        else 
        if(acc_room == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation No of Rooms','info');
        return false;
        }
        else 
        if(acc_feature == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Key Features','info');
        return false;
        }
        else 
        if(acc_acc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Link','info');
        return false;
        }
        else 
        if(acc_img == '')
        {
        swal('Opps...Fill in the Blank','Please Upload Accomodation Image','info');
        return false;
        }
        else
        {
        var extension = $('#Insert_Accomodation_Image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#Insert_Accomodation_Image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            all();
            $('#Package_Accomodation_Insert_Form')[0].reset();
            $('#Accomodation_Insert').modal('hide');
        }
        });
        }
        }
    });
// ============================================== PACKAGE ACTIVITY INSERT ==============================================
$('#Activity_new').click(function(){
    $('#Activity_Insert').modal('show');
    $('#Package_Activity_Insert_Form')[0].reset();
    $('#Insert_Activity_Image').val('');
    $('#action').val('Insert_Package_Activity_Form');
    
   });

    $('#Package_Activity_Insert_Form').submit(function(event){
        event.preventDefault();
       
        var act_name = $('#Insert_Activity_Name').val();
        var act_loc = $('#Insert_Activity_location').val();
        var act_sum = $('#Insert_Activity_Summary').val();
        var act_details = $('#Insert_Activity_Details').val();
        var act_dura = $('#Insert_Activity_duration').val();
        var act_time = $('#Insert_Activity_best_time').val();
        var act_link = $('#Insert_Activity_location_link').val();
        var act_img = $('#Insert_Activity_Image').val();
        
        
        
        if(act_name == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Name','info');
        return false;
        }
        else 
        if(act_loc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Location','info');
        return false;
        }
        else
        if(act_sum == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Summary','info');
        return false;
        }
        else
        if(act_details == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Details','info');
        return false;
        }
        else 
        if(act_dura == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Duration Time','info');
        return false;
        }
        else 
        if(act_time == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Best Time to Visit','info');
        return false;
        }
        else 
        if(act_link == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Location link','info');
        return false;
        }
        else 
        if(act_img == '')
        {
        swal('Opps...Fill in the Blank','Please Upload Activity Image','info');
        return false;
        }
        else
        {
        var extension = $('#Insert_Activity_Image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#Insert_Activity_Image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            
            $('#Package_Activity_Insert_Form')[0].reset();
            $('#Activity_Insert').modal('hide');
            all();
        }
        });
        }
        }
    });
// ============================================== ADMIN EDIT ==============================================
    $(document).on('click', '.admin_update', function(){

        var action = "get_admin_update";
        var ID = $(this).attr('id');
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{UserID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#edit_ID').val(data[0]);
                    $('#edit_Name').val(data[1]);
                    $('#edit_Email').val(data[2]);
                    $('#edit_Number').val(data[3]);
                    $('#Admin_Edit').modal("show");
                }
            })
    });

    $('#admin_edit_form').submit(function(event){
        event.preventDefault();
        var admin_name = $('#edit_Name').val();
        var admin_email = $('#edit_Email').val();
        var admin_number = $('#edit_Number').val();
        var admin_password = $('#edit_Password').val();
        var admin_id = $('#edit_ID').val();
        $('#action').val('admin_update');
    
        if(admin_name == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Admin Name ','info');
         return false;
        }
        else 
        if(admin_email == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Admin E-mail ','info');
         return false;
        }else
        if(admin_id == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Admin ID ','info');
         return false;
        }else
        if(admin_number == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Admin Contact Number ','info');
         return false;
        }
        else
        if(admin_number.length !=10){
        swal('Invalid Contact Number','Please Check Your Contact Number','error');
        return false;
            }else 
        if(admin_password == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Admin Password','info');
         return false;
        }else
         {
          $.ajax({
           url:"action.php",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           processData:false,
           success:function(data)
           {if(data == "Updated")
           {
            swal('Greate Job','Admin Account Has Been Updated Successfully','success');
            all();
            $('#admin_edit_form')[0].reset();
            $('#Admin_Edit').modal('hide');
           }else
           if(data == "NotUpdated")
           {
            swal('Opps...','Unknown Error Occurred','error');
           }else
           if(data == "Password")
           {
            swal('Opps...','Admin Password Not Match','info');
           }
            
           }
          });
         }
        
       });
// ============================================== GUIDER EDIT ==============================================
$(document).on('click', '.guider_update', function(){

    var action = "get_guider_update";
    var ID = $(this).attr('id');
    console.log(ID);
    $.ajax(
        {
            url: 'action.php',
            method: 'POST',
            data:{UserID:ID, action:action},
            dataType: 'JSON',
            success: function(data)
            {
                
                $('#G_edit_ID').val(data[0]);
                $('#G_edit_Name').val(data[1]);
                $('#G_edit_Number').val(data[2]);
                $('#G_edit_Email').val(data[3]);
                $('#Guider_Edit').modal("show");
            }
        })
});

$('#guider_edit_form').submit(function(event){
    event.preventDefault();
    var guider_Name = $('#G_edit_Name').val();
    var guider_Number = $('#G_edit_Number').val();
    var guider_Password = $('#G_edit_Password').val();

    $('#action').val('guider_update');

    if(guider_Name == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Guider Name ','info');
     return false;
    }
   else
    if(guider_Number == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Guider Contact Number ','info');
     return false;
    }
    else
    if(guider_Number.length !=10){
    swal('Invalid Contact Number','Please Check Contact Number','error');
    return false;
    }else
    if(guider_Password == ''){
    swal('Opps...Fill in the Blank','Please Enter Guider Password ','info');
    return false;
    }else
     {
      $.ajax({
       url:"action.php",
       method:"POST",
       data:new FormData(this),
       contentType:false,
       processData:false,
       success:function(data){
        if(data == "Updated")
       {
        swal('Greate Job','Guider Account Has Been Updated Successfully','success');
        all();
        $('#guider_edit_form')[0].reset();
        $('#Guider_Edit').modal('hide');
       }else
       if(data == "NotUpdated")
       {
        swal('Opps...','Unknown Error Occurred','error');
       }else
       if(data == "Password")
       {
        swal('Opps...','Guider Password Not Match','info');
       }
        
       }
      });
     }
    
   });
// ============================================== GUIDER LIST VIEW ==============================================
$(document).on('click', '.guider_list_view', function(){

    var action = "get_guider_list_view";
    var ID = $(this).attr('id');
    // console.log(ID);
    $('#Guider_list_view').modal("show");

    $.ajax(
        {
            url: 'action.php',
            method: 'POST',
            data:{UserID:ID, action:action},
            success: function(data)
            {
                $('#guider_list_view_data').html(data);
                
            }
        })
});
// ============================================== CATEGORY EDIT ==============================================
    $(document).on('click', '.cat_update', function(){
        
        $('#action').val("catupdate");
        
        all();
        
        var action = "get_cat_update";
        var ID = $(this).attr('id');
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{UserID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#e_cid').val(data[0]);
                    $('#e_cat_Name').val(data[1]);
                    $('#e_cat_details').val(data[2]);
                    $('#Category_Edit').modal("show");
                }
            })
    });

    $('#category_edit_form').submit(function(event){
        event.preventDefault();

        var category_name = $('#e_cat_Name').val();
        var cat_image = $('#e_cat_image').val();
        var cat_details = $('#e_cat_details').val();

        if(category_name == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Category Name','info');
        return false;
        }else
        if(cat_image == '')
        {
        swal('Opps...Fill in the Blank','Please Select Category Image','info');
        return false;
        }else
        if(cat_details == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Category Details','info');
        return false;
        }else
        {
        var extension = $('#e_cat_image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#e_cat_image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            if(data == 'update')
            {
                swal('Greate Job..','This Category Update Now','success');
                $('#category_edit_form')[0].reset();
                $('#Category_Edit').modal('hide');
                all();
            }else
            if(data == 'not_update')
            {
                swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
            }
            
        }
        });
        }
        }
    });
// ============================================== PACKAGE OVERVIEW EDIT ==============================================
    $(document).on('click', '.pack_over_update', function(){

        var action = "package_over_update";
        var ID = $(this).attr('id');
        $('#action').val('Update_Package_Overview');

        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{UserID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#epak_Name').val(data[0]);
                    $('#epak_adult_Cost').val(data[1]);
                    $('#epak_Adult_Selling').val(data[2]);
                    $('#epak_child_Cost').val(data[3]);
                    $('#epak_Child_Selling').val(data[4]);
                    $('#epak_details').val(data[5]);
                    $('#epak_loc').val(data[6]);
                    $('#epak_map').val(data[7]);
                    $('#epak_date').val(data[8]);
                    $('#epak_end_date').val(data[9]);
                    $('#epak_booking').val(data[10]);
                    $('#editp_ID').val(data[11]);


                    $('#Package_Overview_Update').modal("show");

                }
            })
    });
    
    $('#Package_Overview_Update_Form').submit(function(event){
        event.preventDefault();
        var select_category = $('#ecategory').val();
        var package_name = $('#epak_Name').val();
        var package_adult_cost = $('#epak_adult_Cost').val();
        var package_adult_selling = $('#epak_Adult_Selling').val();
        var package_child_cost = $('#epak_child_Cost').val();
        var package_child_selling = $('#epak_Child_Selling').val();
        var package_image = $('#epak_image').val();
        var package_details = $('#epak_details').val();
        var package_location = $('#epak_loc').val();
        var paxkage_map = $('#epak_map').val();
        var package_venue = $('#epak_date').val();
        var end_date = $('#epak_end_date').val();
        var booking = $('#epak_booking').val();
        var package_ID = $('#editp_ID').val();


        if(select_category == '')
        {
        swal('Opps...Select Category','Please Select Travel Category','info');
        return false;
        }else
        if(package_ID == '')
        {
        swal('Opps...Unknow Error','Please Check Contact Developer','error');
        return false;
        }else
        if(package_name == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Name ','info');
        return false;
        }
        else 
        if(package_adult_cost == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package for One Adult Cost ','info');
        return false;
        }
        else
        if(package_adult_selling == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Selling Price for One Adult','info');
        return false;
        }
        else
        if(package_child_cost == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package for One Child Cost ','info');
        return false;
        }
        else
        if(package_child_selling == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Selling Price for One Child','info');
        return false;
        }
        else
        if(package_image == '')
        {
        swal('Opps...Fill in the Blank','Please Select Image File ','info');
        return false;
        }
        else 
        if(package_details == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Overview ','info');
        return false;
        }
        else
        if(package_location == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Locations ','info');
        return false;
        }
        else 
        if(paxkage_map == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Package Map Link ','info');
        return false;
        }
        else
        if(package_venue == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Travel Start Date','info');
        return false;
        }
        else
        if(end_date == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Travel End Date','info');
        return false;
        }
        else
        if(booking == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Number of Booking','info');
        return false;
        }
        else
        {
        var extension = $('#epak_image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#epak_image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            all();
            $('#Package_Overview_Update_Form')[0].reset();
            $('#Package_Overview_Update').modal('hide');
        }
        });
        }
        }
    });
// ============================================== PACKAGE ITINERARY EDIT ==============================================
    $(document).on('click', '.pack_itinerary_update', function(){

        var action = "Update_Package_Itinerary";
        var ID = $(this).attr('id');
        $('#action').text('Update_Package_Itinerary');
        $('#Iti_Edit').modal("show");
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{UserID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#iti_ID').val(data[0]);
                    $('#iti_pac_id').val(data[1]);
                    $('#iti_Date').val(data[2]);
                    $('#iti_Loc').val(data[3]);
                    $('#iti_details').val(data[4]);
                    $('#iti_acc').val(data[5]);
                    $('#iti_act').val(data[6]);
                    
                }
            })
    });

    $('#Package_Itinerary_Update_Form').submit(function(event){
        event.preventDefault();
        var Itinerary_package = $('#iti_pac_id').val();
        var Itinerary_date = $('#iti_Date').val();
        var Itinerary_loc = $('#iti_Loc').val();
        var Itinerary_detail = $('#iti_details').val();
        var Itinerary_acc = $('#iti_acc').val();
        var Itinerary_activ = $('#iti_act').val();
        var Itinerary_img = $('#iti_image').val();


        if(Itinerary_package == '')
        {
        swal('Opps...Select Package','Please Select Travel Package','info');
        return false;
        }else
        if(Itinerary_date == '')
        {
        swal('Opps...Enter Date','Please Enter Itinerary Date','error');
        return false;
        }else
        if(Itinerary_loc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Location / Locations','info');
        return false;
        }
        else 
        if(Itinerary_detail == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Details ','info');
        return false;
        }
        else
        if(Itinerary_acc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Accommodations ','info');
        return false;
        }
        else 
        if(Itinerary_activ == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Itinerary Activities ','info');
        return false;
        }
        else
        if(Itinerary_img == '')
        {
        swal('Opps...Fill in the Blank','Please Uplaod Image','info');
        return false;
        }
        else

        {
        var extension = $('#iti_image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#iti_image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            all();
            $('#Package_Itinerary_Update_Form')[0].reset();
            $('#Iti_Edit').modal('hide');
        }
        });
        }
        }
    });
// ============================================== PACKAGE ACCOMMODATION EDIT ==============================================
    $(document).on('click', '.pack_accommodation_update', function(){

        var action = "Update_Package_Accommodation";
        var ID = $(this).attr('id');
        
        $('#acco_Edit').modal("show");
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{UserID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#acco_ID').val(data[0]);
                    $('#acco_Name').val(data[1]);
                    $('#acco_summary').val(data[2]);
                    $('#acco_Loc').val(data[3]);
                    $('#acco_details').val(data[4]);
                    $('#acco_link').val(data[5]);
                    $('#acco_style').val(data[6]);
                    $('#acco_room').val(data[7]);
                    $('#acco_key').val(data[8]);

                    
                }
            })
    });

    $('#Package_Accommodation_Update_Form').submit(function(event){
        event.preventDefault();
        
        var Accomodation_name = $('#acco_Name').val();
        var Accomodation_loc = $('#acco_Loc').val();
        var Accomodation_sum = $('#acco_summary').val();
        
        var Accomodation_detail = $('#acco_details').val();
        var Accomodation_style = $('#acco_style').val();
        var Accomodation_room = $('#acco_room').val();
        var Accomodation_key = $('#acco_key').val();

        var Accomodation_link = $('#acco_link').val();
        var Accomodation_img = $('#acco_image').val();


        
        if(Accomodation_name == '')
        {
        swal('Opps...Enter Date','Please Enter Accomodation Name','error');
        return false;
        }else
        if(Accomodation_loc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Location / Locations','info');
        return false;
        }
        else 
        if(Accomodation_sum == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Summary','info');
        return false;
        }
        else 
        if(Accomodation_detail == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Details ','info');
        return false;
        }
        else
        if(Accomodation_style == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Style ','info');
        return false;
        }
        else
        if(Accomodation_room == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation No of Rooms ','info');
        return false;
        }
        else
        if(Accomodation_key == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Key Features ','info');
        return false;
        }
        else
        if(Accomodation_link == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Accomodation Link ','info');
        return false;
        }
        else
        if(Accomodation_img == '')
        {
        swal('Opps...Fill in the Blank','Please Uplaod Image','info');
        return false;
        }
        else

        {
        var extension = $('#acco_image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#acco_image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            
            $('#Package_Accommodation_Update_Form')[0].reset();
            $('#acco_Edit').modal('hide');
            all();
        }
        });
        }
        }
    }); 
// ============================================== PACKAGE ACTIVITY EDIT ==============================================
    $(document).on('click', '.pack_activity_update', function(){

        var action = "Update_Package_Activity";
        var ID = $(this).attr('id');
        
        $('#act_Edit').modal("show");
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{UserID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#act_ID').val(data[0]);
                    $('#act_Name').val(data[1]);
                    $('#act_summary').val(data[2]);
                    $('#act_Loc').val(data[3]);
                    $('#act_details').val(data[4]);
                    $('#act_link').val(data[5]);
                    $('#act_duration').val(data[6]);
                    $('#act_time').val(data[7]);

                    
                }
            })
    });

    $('#Package_Activity_Update_Form').submit(function(event){
        event.preventDefault();
        
        var Activity_name = $('#act_Name').val();
        var Activity_loc = $('#act_Loc').val();
        var Activity_summ = $('#act_summary').val();
        var Activity_detail = $('#act_details').val();
        var Activity_dur = $('#act_duration').val();
        var Activity_time = $('#act_time').val();
        var Activity_link = $('#act_link').val();
        var Activity_img = $('#act_image').val();


        
        if(Activity_name == '')
        {
        swal('Opps...Enter Date','Please Enter Activity Name','error');
        return false;
        }else
        if(Activity_loc == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Location / Locations','info');
        return false;
        }
        else 
        if(Activity_summ == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Summary','info');
        return false;
        }
        else 
        if(Activity_detail == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Details ','info');
        return false;
        }
        else
        if(Activity_dur == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Duration Time ','info');
        return false;
        }
        else
        if(Activity_time == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Best Time to Visit ','info');
        return false;
        }
        else
        if(Activity_link == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Activity Location Link','info');
        return false;
        }
        else
        if(Activity_img == '')
        {
        swal('Opps...Fill in the Blank','Please Uplaod Image','info');
        return false;
        }
        else

        {
        var extension = $('#act_image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#act_image').val('');
        return false;
        }
        else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            
            $('#Package_Activity_Update_Form')[0].reset();
            $('#act_Edit').modal('hide');
            all();
        }
        });
        }
        }
    });    
// ============================================== ADMIN DELETE ==============================================
    $(document).on('click', '.admin_delete', function(){
        var AID = $(this).attr("id");
        var action = "get_admin_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Account!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:AID, action:action},
                dataType: 'JSON',
                success:function(data)
                {
                    $('#delete_ID').val(data[0]);
                    $('#delete_Name').val(data[1]);
                    $('#Admin_Delete').modal("show");
                }
            })
            } else {
            swal("This Admin Account is safe!");
            }
        });
    });

    $('#Admin_Delete').submit(function(event){
        event.preventDefault();
        var admin_id = $('#delete_ID').val();
        var admin_password = $('#delete_Password').val();
        var action = "admin_delete";
        if(admin_password == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Admin Password ','info');
         return false;
        }else{
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:admin_id, action:action, password:admin_password},
                
                success:function(data)
                {
                    if (data == "Deleted")
                    {
                        swal('Greate Job..','Admin Account Deleted Now','success');
                        all();
                        $('#admin_delete_form')[0].reset();
                        $('#Admin_Delete').modal("hide");
                    }else
                    if (data == "NotDelete")
                    {
                        swal('Opps..','Admin Account Not Delete','info');
                    }else
                    if (data == "Password")
                    {
                        swal('Opps..','Admin Account Password Not Match','error');
                    }else
                    if (data == "cant")
                    {
                        swal('Opps..','Super Admin Account Cant Delete','error');
                    }
                 
                }
               });
        }
    });
// ============================================== GUIDER UNALOCATED ==============================================
$(document).on('click', '.G_Unalocate', function(){
    var AID = $(this).attr("id");
    var action = "get_guider_unalocate";
    swal({
        title: "Are you sure?",
        text: "Do you want to unalocate this journey!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{UserID:AID, action:action},
            success:function(data)
            {
                if(data == 'Delete'){
                    $('#Guider_list_view').modal("hide");
                    all();
                }else {
                    swal("Somthing Went to Wrong!");
                }
                
            }
        })
        } else {
            $('#Guider_list_view').modal("hide");
        swal("This Journey is Alocate with this guider!");
        }
    });
});
// ============================================== GUIDER DELETE ==============================================
$(document).on('click', '.guider_delete', function(){
    var AID = $(this).attr("id");
    var action = "get_guider_delete";
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Account!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{UserID:AID, action:action},
            dataType: 'JSON',
            success:function(data)
            {
                $('#G_delete_ID').val(data[0]);
                $('#G_delete_Name').val(data[1]);
                $('#Guider_Delete').modal("show");
            }
        })
        } else {
        swal("This Guider Account is safe!");
        }
    });
});

$('#guider_delete_form').submit(function(event){
    event.preventDefault();
    var admin_id = $('#G_delete_ID').val();
    var admin_password = $('#G_delete_Password').val();
    var action = "guider_delete";
    if(admin_password == '')
    {
     swal('Opps...Fill in the Blank','Please Enter Guider Password ','info');
     return false;
    }else{
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{UserID:admin_id, action:action, password:admin_password},
            
            success:function(data)
            {
                if (data == "Deleted")
                {
                    swal('Greate Job..','Guider Account Deleted Now','success');
                    all();
                    $('#guider_delete_form')[0].reset();
                    $('#Guider_Delete').modal("hide");
                }else
                if (data == "NotDelete")
                {
                    swal('Opps..','Guider Account Not Delete','info');
                }else
                if (data == "Password")
                {
                    swal('Opps..','Guider Account Password Not Match','error');
                }
             
            }
           });
    }
});
// ============================================== CATEGORY DELETE ==============================================
    $(document).on('click', '.cat_delete', function(){
        var CID = $(this).attr("id");
        var action = "delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              
              $.ajax({
                url:"action.php",
                method:"POST",
                data:{CategoryID:CID, action:action},
                success:function(data)
                {
                    if(data == 'Delete')
                    {
                        swal('Greate Job..','This Category Delete Now','success');
                        all();
                    }else
                    if(data == 'notDelete')
                    {
                        swal('Opps..','Only Super Admin Can Delete Category','error');
                    }
                 
                }
               })
            } else {
              swal("This Category is safe!");
            }
          });
       });
// ============================================== PACKAGE OVERVIEW DELETE ==============================================
    $(document).on('click', '.pack_over_delete', function(){
        var TID = $(this).attr("id");
        var action = "pack_overview_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Package Overview!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{TravelID:TID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                all();
                }
            })
            } else {
            swal("This Package Overview is safe!");
            }
        });
    });    
// ============================================== PACKAGE ITINERARY DELETE ==============================================
    $(document).on('click', '.pack_itinerary_delete', function(){
        var IID = $(this).attr("id");
        var action = "pack_itinerary_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Itinerary!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{TravelID:IID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                all();
                }
            })
            } else {
            swal("This Package Itinerary is safe!");
            }
        });
    });   
// ============================================== PACKAGE ACCOMMODATION DELETE ==============================================
    $(document).on('click', '.pack_accommodation_delete', function(){
        var IID = $(this).attr("id");
        var action = "pack_accommodation_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Accommodation!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{TravelID:IID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                all();
                }
            })
            } else {
            swal("This Package Accommodation is safe!");
            }
        });
    });  
// ============================================== PACKAGE ACTIVITY DELETE ==============================================
    $(document).on('click', '.pack_activity_delete', function(){
        var IID = $(this).attr("id");
        var action = "pack_activity_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Activity!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{TravelID:IID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                all();
                }
            })
            } else {
            swal("This Package Activity is safe!");
            }
        });
    });  

// ============================================== PACKAGE ACCOMMODATION SELECT==============================================
$(document).on('click', '.pack_over_accommodation', function(){

    var action = "package_accommodation_update";
    var ID = $(this).attr('id');
    $('#Pac_Accommodation_Modal').modal("show");
    $('#package_accommodation_id').val($(this).attr('id'));
    $('#package_accommodation_d_id').val($(this).attr('id'));
    // console.log(ID);

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,UserID:ID},
            success:function(data)
            {
                $('#accommodation_data').html(data);
               
            }
        })

    });
// select accommodation
    $("#Select_N_Accommodation").mouseup(function(){
        var pid = $("#Select_N_Accommodation").val();
        $("#accommodation_id").val (pid);
        $('#accommodation_id').empty();
    
        var id = $('#accommodation_id').val();
    
    
        })

// select new accommodation & insert into database
    $('#new_accommodation').submit(function(event){
    event.preventDefault();

    var package_id = $('#package_accommodation_id').val();
    var Accommodation_id = $('#accommodation_id').val();

    if(package_id == '')
    {
    swal('Opps...System Error','Please Contact Developer','info');
    return false;
    }else
    if(Accommodation_id == '')
    {
    swal('Opps','First You Need to Insert New Accomodation','info');
    return false;
    }else
    
    {
    $.ajax({
    url:"action.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        swal('Greate Job..',data,'success');
        $('#Pac_Accommodation_Modal').modal("hide");
        $('#accommodation_id').val('');
        all();
    }
    });
    }
    });

// accommodation remove
$(document).on('click', '.pack_accommodation_remove', function(){
    var IID = $(this).attr("id");
    var action = "pack_accommodation_remove";
    swal({
        title: "Are you sure?",
        text: "Do you want to remove this Accommodation!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{TravelID:IID, action:action},
            success:function(data)
            {
            swal('Greate Job..',data,'success');
            all();
            }
        })
        } else {
        swal("This Package Accommodation is safe!");
        }
    });
}); 
// Remove all
    $('#remove_all_accommodation').submit(function(event){
        event.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Do you want to remove all Accommodation!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#Pac_Accommodation_Modal').modal("hide");
                all();
                }
            })
            } else {
            swal("This Package Accommodations are safe!");
            }
        });
    }); 


// ============================================== PACKAGE ACTIVITY SELECT==============================================
$(document).on('click', '.pack_over_activity', function(){

    var action = "package_activity_update";
    var ID = $(this).attr('id');
    $('#Pac_Activity_Modal').modal("show");
    $('#activity_id').val($(this).attr('id'));
    $('#package_activity_d_id').val($(this).attr('id'));
    // console.log(ID);

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,UserID:ID},
            success:function(data)
            {
                $('#activity_Select_data').html(data);
               
            }
        })

    });
// select activity
    $("#Select_N_Activity").mouseup(function(){
        var pid = $("#Select_N_Activity").val();
        $("#package_activity_id").val (pid);
        $('#package_activity_id').empty();

    
    
        })

// select new activity & insert into database
    $('#new_activity').submit(function(event){
    event.preventDefault();

    var package_id = $('#activity_id').val();
    var Activity_id = $('#package_activity_id').val();

    if(package_id == '')
    {
    swal('Opps...System Error','Please Contact Developer','info');
    return false;
    }else
    if(Activity_id == '')
    {
    swal('Opps','First You Need to Insert New Activity','info');
    return false;
    }else
    
    {
    $.ajax({
    url:"action.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        swal('Greate Job..',data,'success');
        $('#Pac_Activity_Modal').modal("hide");
        $('#package_activity_id').val('');
        all();
    }
    });
    }
    });

// Activity remove
$(document).on('click', '.pack_activity_remove', function(){
    var IID = $(this).attr("id");
    var action = "pack_activity_remove";
    swal({
        title: "Are you sure?",
        text: "Do you want to remove this Activity!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{TravelID:IID, action:action},
            success:function(data)
            {
            swal('Greate Job..',data,'success');
            all();
            $('#Pac_Activity_Modal').modal("hide");

            }
        })
        } else {
        swal("This Package Activity is safe!");
        }
    });
}); 
// Remove all
    $('#remove_all_activity').submit(function(event){
        event.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Do you want to remove all Activity!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#Pac_Activity_Modal').modal("hide");
                all();
                }
            })
            } else {
            swal("This Package Activity are safe!");
            }
        });
    }); 









// ============================================== PACKAGE HIGHLIGHT EDIT ==============================================
    $(document).on('click', '.pack_over_high', function(){

    var action = "package_highlight_update";
    var ID = $(this).attr('id');
    $('#Pac_Highlights_Modal').modal("show");
    $('#package_id').val($(this).attr('id'));
    $('#package_d_id').val($(this).attr('id'));
    // console.log(ID);

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,UserID:ID},
            success:function(data)
            {
                $('#highlight_data').html(data);
               
            }
        })

    });
// new highlight
    $('#new_highlight').submit(function(event){
    event.preventDefault();

    var new_highlight = $('#N_Highlight').val();
    var id = $('#package_id').val();

    if(new_highlight == '')
    {
    swal('Opps...Fill in the Blank','Please Enter Travl High-Light','info');
    return false;
    }else
    if(id == '')
    {
    swal('Opps...','Please Contact Developer','info');
    return false;
    }else
    
    {
    $.ajax({
    url:"action.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        swal('Greate Job..',data,'success');
        $('#Pac_Highlights_Modal').modal("hide");
        $('#N_Highlight').val('');
        all();
    }
    });
    }
    });

// highlight delete
    $(document).on('click', '.pack_highlight_delete', function(){
        var ID = $(this).attr("id");
        var action = "highlight_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this highlight!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:ID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#Pac_Highlights_Modal').modal("hide");
                all();
                }
            })
            } else {
            swal("This Package Highlight is safe!");
            }
        });
    }); 

    $(document).on('click', '.pack_highlight_update', function(){
        
        $('#text1').val($(this).attr('id'));
        

    });
    
// highlight edit
$('#edit_highlight').submit(function(event){
    event.preventDefault();

    var highlight = $('#text2').val();
    var ID = $('#text1').val();
    console.log(ID);
    if(highlight == '')
    {
    swal('Opps...Fill in the Blank','Please Enter Travl High-Light','info');
    return false;
    }else
    if(ID == '')
    {
    swal('Opps...','Please Contact Developer','info');
    return false;
    
    }else
        $.ajax({
            url:"action.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data)
            {
            swal('Greate Job..',data,'success');
            $('#Pac_Highlights_Modal').modal("hide");
            $('#text2').val('');
            all();
            }
        })
        
    });
// Delete all
    $('#delete_all_highlight').submit(function(event){
        event.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this highlights!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#Pac_Highlights_Modal').modal("hide");
                all();
                }
            })
            } else {
            swal("This Package Highlights are safe!");
            }
        });
    }); 




// ============================================== PACKAGE INCLUDES EDIT ==============================================
    $(document).on('click', '.pack_over_include', function(){

        var action = "package_include_update";
        var ID = $(this).attr('id');
        $('#Pac_Includes_Modal').modal("show");
        $('#package_i_id').val($(this).attr('id'));
        $('#package_i_d_id').val($(this).attr('id'));
        // console.log(ID);
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    $('#include_data').html(data);
                   
                }
            })
    
        });
    // new highlight
        $('#new_include').submit(function(event){
        event.preventDefault();
    
        var new_include = $('#N_Include').val();
        var id = $('#package_i_id').val();
    
        if(new_include == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Travl Include','info');
        return false;
        }else
        if(id == '')
        {
        swal('Opps...','Please Contact Developer','info');
        return false;
        }else
        
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            $('#Pac_Includes_Modal').modal("hide");
            $('#N_Include').val('');
            all();
        }
        });
        }
        });
    
    // highlight delete
        $(document).on('click', '.pack_include_delete', function(){
            var ID = $(this).attr("id");
            var action = "include_delete";
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this include!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{UserID:ID, action:action},
                    success:function(data)
                    {
                    swal('Greate Job..',data,'success');
                    $('#Pac_Includes_Modal').modal("hide");
                    all();
                    }
                })
                } else {
                swal("This Package Include is safe!");
                }
            });
        }); 
    
        $(document).on('click', '.pack_include_update', function(){
            
            $('#text3').val($(this).attr('id'));
            
    
        });
        
    // highlight edit
    $('#edit_include').submit(function(event){
        event.preventDefault();
    
        var highlight = $('#text4').val();
        var ID = $('#text3').val();
        console.log(ID);
        if(highlight == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Travl Include','info');
        return false;
        }else
        if(ID == '')
        {
        swal('Opps...','Please Contact Developer','info');
        return false;
        
        }else
            $.ajax({
                url:"action.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#Pac_Includes_Modal').modal("hide");
                $('#text4').val('');
                all();
                }
            })
            
        });
    // Delete all
        $('#delete_all_include').submit(function(event){
            event.preventDefault();
    
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this includes!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                    swal('Greate Job..',data,'success');
                    $('#Pac_Includes_Modal').modal("hide");
                    all();
                    }
                })
                } else {
                swal("This Package Includes are safe!");
                }
            });
        }); 
// ============================================== PACKAGE TERMS & CONDITION EDIT ==============================================
$(document).on('click', '.pack_over_tc', function(){

    var action = "package_tc_update";
    var ID = $(this).attr('id');
    $('#pack_over_tc').modal("show");
    $('#package_tc_id').val($(this).attr('id'));
    $('#package_tc_d_id').val($(this).attr('id'));
    // console.log(ID);

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,UserID:ID},
            success:function(data)
            {
                $('#tc_data').html(data);
               
            }
        })

    });
// new T&C
    $('#new_tc').submit(function(event){
    event.preventDefault();

    var new_tc = $('#N_Tc').val();
    var id = $('#package_tc_id').val();

    if(new_tc == '')
    {
    swal('Opps...Fill in the Blank','Please Enter Terms & Condition','info');
    return false;
    }else
    if(id == '')
    {
    swal('Opps...','Please Contact Developer','info');
    return false;
    }else
    
    {
    $.ajax({
    url:"action.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        swal('Greate Job..',data,'success');
        $('#pack_over_tc').modal("hide");
        $('#N_Tc').val('');
        all();
    }
    });
    }
    });

// T&C delete
    $(document).on('click', '.pack_tc_delete', function(){
        var ID = $(this).attr("id");
        var action = "tc_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Terms / Condition!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:ID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#pack_over_tc').modal("hide");
                all();
                }
            })
            } else {
            swal("This Package Terms / Condition is safe!");
            }
        });
    }); 

    $(document).on('click', '.pack_tc_update', function(){
        
        $('#text5').val($(this).attr('id'));
        

    });
    
// T&C edit
$('#edit_tc').submit(function(event){
    event.preventDefault();

    var highlight = $('#text6').val();
    var ID = $('#text5').val();
    console.log(ID);
    if(highlight == '')
    {
    swal('Opps...Fill in the Blank','Please Enter Travl Terms & Conditions','info');
    return false;
    }else
    if(ID == '')
    {
    swal('Opps...','Contact Developer','info');
    return false;
    
    }else
        $.ajax({
            url:"action.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data)
            {
            swal('Greate Job..',data,'success');
            $('#pack_over_tc').modal("hide");
            $('#text6').val('');
            all();
            }
        })
        
    });
// Delete all T&C
    $('#delete_all_tc').submit(function(event){
        event.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Terms & Conditions!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#pack_over_tc').modal("hide");
                all();
                }
            })
            } else {
            swal("This Package Terms & Conditions are safe!");
            }
        });
    }); 
// ============================================== PACKAGE IMAGE EDIT ==============================================
    $(document).on('click', '.pack_over_img', function(){

    var action = "package_img_fetch";
    var ID = $(this).attr('id');
    $('#Pac_Img').modal("show");
    $('#package_img_id').val($(this).attr('id'));
    $('#package_img_d_id').val($(this).attr('id'));
    // console.log(ID);

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,UserID:ID},
            success:function(data)
            {
                $('#img_data').html(data);
               
            }
        })

    });
// new Img
    $('#new_img').submit(function(event){
    event.preventDefault();

    var new_img = $('#img_image').val();
    var id = $('#package_img_id').val();

    if(new_img == '')
    {
    swal('Opps...Fill in the Blank','Please Select Imgae','info');
    return false;
    }else
    if(id == '')
    {
    swal('Opps...','Please Contact Developer','info');
    return false;
    }else

        {
        var extension = $('#img_image').val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
        swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
        $('#img_image').val('');
        return false;
        }
        else
    {
    $.ajax({
    url:"action.php",
    method:"POST",
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
        swal('Greate Job..',data,'success');
        $('#Pac_Img').modal("hide");
        $('#img_image').val('');
        $('#preview')[0].reset();
        all();
        
    }
    });
    }}
    });
// image preview
    const inpFile = document.getElementById("img_image");
    const previwContainer = document.getElementById("imagePreview");
    const previewImage = previwContainer.querySelector(".image-preview__image");
    const previewImageText = previwContainer.querySelector(".image-preview__default-text");

    inpFile.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
        previewImageText.style.display = "none";
        previewImage.style.display = "block";

      reader.addEventListener("load", function() {
        console.log(this);
        previewImage.setAttribute("src", this.result);

      });
      reader.readAsDataURL(file);
    }else{
      previewImageText.style.display = null;
      previewImage.style.display = null;
      previewImage.setAttribute("src", "");
    }
    });

// Img delete
    $(document).on('click', '.img-delete', function(){
        var ID = $(this).attr("id");
        var action = "img_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Image!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:ID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#Pac_Img').modal("hide");
                all();
                }
            })
            } else {
            swal("This Package Image is safe!");
            }
        });
    }); 


// Delete all Images
    $('#delete_all_img').submit(function(event){
        event.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Images!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                $('#Pac_Img').modal("hide");
                all();
                }
            })
            } else {
            swal("This Package Images are safe!");
            }
        });
    }); 
// ============================================== PACKAGE STATUS CHANGE ==============================================
    // Active -> Deactive
    $(document).on('click', '.pack_status_active', function(){
        var TID = $(this).attr("id");
        var action = "pack_active_status";
        swal({
            title: "Are you sure?",
            text: "Do you want to 'Deactive' this package",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{TravelID:TID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                package_overview();
                all();
                }
            })
            } else {
            swal("This Package 'Active' yet");
            }
        });
    });   
    // Deactive -> Active
    $(document).on('click', '.pack_status_deactive', function(){
        var TID = $(this).attr("id");
        var action = "pack_deactive_status";
        swal({
            title: "Are you sure?",
            text: "Do you want to 'Active' this package",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{TravelID:TID, action:action},
                success:function(data)
                {
                swal('Greate Job..',data,'success');
                all();
                }
            })
            } else {
            swal("This Package 'Deactive' yet");
            }
        });
    });   
    // Proccess -> Active
    $(document).on('click', '.pack_status_proccess', function(){
        var TID = $(this).attr("id");
        var action = "pack_proccess";
        swal({
            title: "Are you sure?",
            text: "Do you want to 'Active' this package",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{TravelID:TID, action:action},
                success:function(data)
                {
                if(data == 'not_change'){
                    swal('Opps','Only Super Admin Can Change Package Status','error');
                }else
                if(data == 'change'){
                    swal('Greate Job..','This Package Active Now','success');
                    all();
                }
                
                
                }
            })
            } else {
            swal("This Package 'Proccess' yet");
            }
        });
    }); 
   // Expired -> Active
   $(document).on('click', '.pack_status_expired', function(){
    var TID = $(this).attr("id");
    var action = "pack_expired";
    swal({
        title: "Are you sure?",
        text: "Do you want to 'Active' this package",
        icon: "info",
        buttons: true,
        dangerMode: false,
    })
    .then((willDelete) => {
        if (willDelete) {
        
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{TravelID:TID, action:action},
            success:function(data)
            {
            if(data == 'not_change'){
                swal('Opps','Only Super Admin Can Change Package Status','error');
            }else
            if(data == 'change'){
                swal('Greate Job..','This Package Active Now','success');
                all();
            }else
            if(data == 'cut_of'){
                swal('Please Check Cut-of Date','You Can Enter a Date at Least a Week in Advanced','info');
                all();
            }
            
            
            }
        })
        } else {
        swal("This Package 'Expired' yet");
        }
    });
}); 

// ============================================== ADMIN STATUS CHANGE ==============================================
    // Active -> Deactive
    $(document).on('click', '.admin_active', function(){
        var UID = $(this).attr("id");
        var action = "admin_deactive_status";
        swal({
            title: "Are you sure?",
            text: "Do you want to 'Deactive' this Admin",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:UID, action:action},
                success:function(data)
                {
                    if(data == 'not_change'){
                        swal('Opps','Only Super Admin Can Change Admin Status','error');
                    }else
                    if(data == 'change'){
                        swal('Greate Job..','This Admin Deactive Now','success');
                        all();
                    }
                }
            })
            } else {
            swal("This Admin 'Active' yet");
            }
        });
    });   
    // Deactive -> Active
    $(document).on('click', '.admin_deactive', function(){
        var UID = $(this).attr("id");
        var action = "admin_active_status";
        swal({
            title: "Are you sure?",
            text: "Do you want to 'Active' this Admin",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:UID, action:action},
                success:function(data)
                {
                    if(data == 'not_change'){
                        swal('Opps','Only Super Admin Can Change Admin Status','error');
                    }else
                    if(data == 'change'){
                        swal('Greate Job..','This Admin Active Now','success');
                        all();
                    }
                }
            })
            } else {
            swal("This Admin 'Deactive' yet");
            }
        });
    });   

    $(document).on('click', '.super_admin', function(){
        swal('Opps','Super Admin Status Cant Change','error');
    })
    
// ============================================== USER STATUS CHANGE ==============================================
    // Active -> Deactive
    $(document).on('click', '.user_active', function(){
        var UID = $(this).attr("id");
        var action = "user_deactive_status";
        swal({
            title: "Are you sure?",
            text: "Do you want to 'Deactive' this User",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:UID, action:action},
                success:function(data)
                {
                    if(data == 'not_change'){
                        swal('Opps','Only Super Admin Can Change User Status','error');
                    }else
                    if(data == 'change'){
                        swal('Greate Job..','This User Account Deactive Now','success');
                        all();
                    }
                }
            })
            } else {
            swal("This User Account 'Active' yet");
            }
        });
    });   
    // Deactive -> Active
    $(document).on('click', '.user_deactive', function(){
        var UID = $(this).attr("id");
        var action = "user_active_status";
        swal({
            title: "Are you sure?",
            text: "Do you want to 'Active' this User Account",
            icon: "info",
            buttons: true,
            dangerMode: false,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{UserID:UID, action:action},
                success:function(data)
                {
                    if(data == 'not_change'){
                        swal('Opps','Only Super Admin Can Change User Account Status','error');
                    }else
                    if(data == 'change'){
                        swal('Greate Job..','This User Account Active Now','success');
                        all();
                    }
                }
            })
            } else {
            swal("This User Account 'Deactive' yet");
            }
        });
    });   
// ============================================== USER INVOICE VIEW =============================================================
    $(document).on('click', '.user_invoice_view', function(){

    var action = "user_invoice_view_fetch";
    var ID = $(this).attr('id');
    $('#IID').val(ID);
    $('#user_invoice_view').modal("show");
    // console.log(ID);

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,IID:ID},
            success:function(data)
            {
                $('#user_invoice_view_data').html(data);
                user_payment_view();
            }
        })

    });

    function user_payment_view(){
        var action = "user_payment_view_fetch";
        var ID = $('#IID').val();
            
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,ID:ID},
                success:function(data)
                {
                    $('#user_payment_view').html(data);
                }
            })
    
    }
    $(document).on('click', '.payment_status_btn', function(){
    
        var action = "payment_status_change";
        var IID = $('#IID').val();
        var ID = $('#payment_status').val();
        var txt = $('#paymentSlipTxt').val();
        // console.log(IID);
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,ID:ID, txt:txt, IID:IID},
                success:function(data) 
                {   
                    if(data == 'done'){
                        swal('Please wait','Please wait for send email','info');
                        invoice_send();
                    }else{
                        swal('Error','Somthing Went Wrong','error');
                    }
                    
                }
            })
        
    });

    function invoice_send()
    {
        var action = "invoice_send";
        var IID = $('#IID').val();
        var ID = $('#payment_status').val();
        var txt = $('#paymentSlipTxt').val();
        var start = $('#T_start_date5').val();
        var name = $('#User_Name').val();
        var email = $('#User_Email_Address').val();
        
        $.ajax({
            url:"invoice_send.php",
            method:"POST",
            data:{action:action,IID:IID,ID:ID,txt:txt,start:start,name:name,email:email},
            success:function(data)
            {
                swal('Success','Email sent now','success');
                $('#user_invoice_view').modal("hide");
                all();
            }
        })
    }
// ============================================== USER JORNEY VIEW =============================================================
    $(document).on('click', '.pacenger_list_by_joutney', function(){

    var action = "pacenger_list_by_joutney_fetch";
    var ID = $(this).attr('id');
    $('#journey_list_view').modal("show");
    // console.log(ID);

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,IID:ID},
            success:function(data)
            {
                $('#journey_list_view_data').html(data);
               
            }
        })

    });
// ============================================== GUIDER ALOCATE VIEW =============================================================
    $(document).on('click', '.Guider_to_journey', function(){

    var ID = $(this).attr('id');
    $('#Guider_to_journey_view').modal("show");
    $("#G_ID").val ('');
    $("#P_ID").val (ID);
    // console.log(ID);

    var action = "Guider_Alocated_Fetch";

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action ,P_ID:ID},
            success:function(data)
            {
                $('#guider_fetch').html(data);
            }
        })

    });

    $(document).on('click', '.G_alocate', function(){

        var P_ID = $("#P_ID").val();
        var G_ID = $("#G_ID").val();

        var action = "Guider_Alocate";

        // console.log(ID);
        if(G_ID == ''){
            swal('Opps...','Please Select Guider','info');
        }else{
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action ,G_ID:G_ID, P_ID:P_ID},
            success:function(data)
            {
                if(data == 'alocate')
                {
                    swal('Success...','This Guider Alocated To Jorney','success');
                    $('#Guider_to_journey_view').modal("hide");
                    all();
                }else
                if(data == 'alocated')
                {
                    swal('Opps...','Please Delete Current Allocated Guider','info');
                }else{
                    swal('Opps...You Cant Allocate This Guider','This Guider Already Alocate Another Jorney','info');
                    $("#G_ID").val ('');
                }
            }
        })
        }
    
    });

    $(document).on('click', '.G_Delete', function(){

        var ID = $(this).attr('id');

        var action = "Guider_Alocate_Delete";

        
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action ,ID:ID},
            success:function(data)
            {
                if(data == 'Delete')
                {
                    swal('Success...','This Guider Unalocated To Jorney','success');
                    $('#Guider_to_journey_view').modal("hide");
                    all();
                }
                else{
                    swal('Opps...','Somthing Went Wrong','info');
                    $('#Guider_to_journey_view').modal("hide");
                    $("#G_ID").val ('');
                }
            }
        })
        
    
    });

    $("#Guider_list").change(function(){
        var gid = $("#Guider_list").val();
        $("#G_ID").val (gid);
        var ID = $("#P_ID").val();

        var action = "Check_Guider_Is_Free";
        
        if(gid == ''){
            swal('Opps...','Please Select Guider','info');
        }else{
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action ,G_ID:gid, P_ID:ID},
            success:function(data)
            {
                console.log(data);
                if(data == '0')
                {
                    all();
                }else
                if(data == '1'){
                    swal('Opps...You Cant Allocate This Guider','This Guider Already Alocate Another Jorney','info');
                    $("#G_ID").val ('');
                }
            }
        })
    }
        })

    
// ============================================== PACKAGE ACCOMMODATION IMAGE EDIT ==============================================
    $(document).on('click', '.pack_accommodation_img', function(){

        var action = "package_accommo_img_fetch";
        var ID = $(this).attr('id');
        $('#Pac_Accommo_Img').modal("show");
        $('#package_Accommo_img_id').val($(this).attr('id'));
        $('#package_Accommo_img_d_id').val($(this).attr('id'));
        // console.log(ID);
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    $('#accommo_img_data').html(data);
                   
                }
            })
    
        });
    // new Img
        $('#new_acc_img').submit(function(event){
        event.preventDefault();
    
        var new_img = $('#acco_img_image').val();
        var id = $('#package_Accommo_img_id').val();
    
        if(new_img == '')
        {
        swal('Opps...Fill in the Blank','Please Select Imgae','info');
        return false;
        }else
        if(id == '')
        {
        swal('Opps...','Please Contact Developer','info');
        return false;
        }else
    
            {
            var extension = $('#acco_img_image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
            swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
            $('#acco_img_image').val('');
            return false;
            }
            else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            $('#Pac_Accommo_Img').modal("hide");
            $('#acco_img_image').val('');
            $('#acco_preview')[0].reset();
            all();
            
        }
        });
        }}
        });
    // image preview
        const acco_inpFile = document.getElementById("acco_img_image");
        const acco_previwContainer = document.getElementById("acco_imagePreview");
        const acco_previewImage = acco_previwContainer.querySelector(".image-preview__image");
        const acco_previewImageText = acco_previwContainer.querySelector(".image-preview__default-text");
    
        acco_inpFile.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          acco_previewImageText.style.display = "none";
          acco_previewImage.style.display = "block";
    
          reader.addEventListener("load", function() {
            console.log(this);
            acco_previewImage.setAttribute("src", this.result);
    
          });
          reader.readAsDataURL(file);
        }else{
            acco_previewImageText.style.display = null;
            acco_previewImage.style.display = null;
            acco_previewImage.setAttribute("src", "");
        }
        });
    
    // Img delete
        $(document).on('click', '.accommo_img_delete', function(){
            var ID = $(this).attr("id");
            var action = "accommo_img_delete";
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Image!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{UserID:ID, action:action},
                    success:function(data)
                    {
                    swal('Greate Job..',data,'success');
                    $('#Pac_Accommo_Img').modal("hide");
                    all();
                    }
                })
                } else {
                swal("This Accommodation Image is safe!");
                }
            });
        }); 
    
    
    // Delete all Images
        $('#delete_all_accommo_img').submit(function(event){
            event.preventDefault();
    
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Images!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                    swal('Greate Job..',data,'success');
                    $('#Pac_Accommo_Img').modal("hide");
                    all();
                    }
                })
                } else {
                swal("This Accommodation Images are safe!");
                }
            });
        }); 
// ================================================= Accomodation Icons ===================================
    $(document).on('click', '.pack_accommodation_icon', function (){

        var action = "pack_accommodation_icon_fetch";
        var ID = $(this).attr('id');
        $('#package_Accommo_icon').val($(this).attr('id'));
        $('#pack_accommodation_icon').modal("show");
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    $('#pack_accommodation_icon_data').html(data);
                    
                }
            })
    
        });

        function icon(){

            var action = "pack_accommodation_icon_fetch";
            var ID = $('#package_Accommo_icon').val();
            $('#pack_accommodation_icon').modal("show");
        
            $.ajax(
                {
                    url:"action.php",
                    method:"POST",
                    data:{action:action,UserID:ID},
                    success:function(data)
                    {
                        $('#pack_accommodation_icon_data').html(data);
                        
                    }
                })
        
            };
// De-active => Active
        $(document).on('click', '.active_icon', function(){

            var action = "active_accomo_icon";
            var accomo = $('#package_Accommo_icon').val();
            var ID = $(this).attr('id');
        
            $.ajax(
                {
                    url:"action.php",
                    method:"POST",
                    data:{action:action,UserID:ID,accomo:accomo},
                    success:function(data)
                    {
                        if(data == 'active'){
                            swal('Good Job','This Icon Is Active Now','success');
                            icon();
                        }else
                        if(data == 'not_active'){
                            swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
                        }else
                        if(data == 'duplicate'){
                            swal('Opps...','This Icon Is Already Active Please Choose Another One','info');
                        }
                        
                        
                    }
                })
        
            });
// Active => dective
    $(document).on('click', '.deactive_icon', function(){

        var action = "deactive_accomo_icon";
        var ID = $(this).attr('id');
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    if(data == 'deactive'){
                        swal('Good Job','This Icon Is Dective Now','success');
                        icon();
                    }else
                    if(data == 'not_deactive'){
                        swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
                    }
                    
                    
                }
            })
    
        });
// Dective All
    $(document).on('click', '.All_Icon_deactive', function(){

        var action = "deactive_accomo_all_icon";
        var ID = $('#package_Accommo_icon').val();
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    if(data == 'deactive_all'){
                        swal('Good Job','All Icons Are Dective Now','success');
                        icon();
                    }else
                    if(data == 'not_deactive_all'){
                        swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
                    }
                    
                    
                }
            })
    
        });
// ================================================= Activity Icons ===================================
    $(document).on('click', '.pack_activity_icon', function (){

        var action = "pack_activity_icon_fetch";
        var ID = $(this).attr('id');
        $('#package_Activi_icon').val($(this).attr('id'));
        $('#pack_activity_icon').modal("show");
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    $('#pack_activity_icon_data').html(data);
                    
                }
            })
    
        });

        function act_icon(){

            var action = "pack_activity_icon_fetch";
            var ID = $('#package_Activi_icon').val();
            $('#pack_activity_icon').modal("show");
        
            $.ajax(
                {
                    url:"action.php",
                    method:"POST",
                    data:{action:action,UserID:ID},
                    success:function(data)
                    {
                        $('#pack_activity_icon_data').html(data);
                        
                    }
                })
        
            };
// De-active => Active
        $(document).on('click', '.pack_active_icon', function(){

            var action = "active_activi_icon";
            var accomo = $('#package_Activi_icon').val();
            var ID = $(this).attr('id');
        
            $.ajax(
                {
                    url:"action.php",
                    method:"POST",
                    data:{action:action,UserID:ID,accomo:accomo},
                    success:function(data)
                    {
                        if(data == 'active'){
                            swal('Good Job','This Icon Is Active Now','success');
                            act_icon();
                        }else
                        if(data == 'not_active'){
                            swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
                        }else
                        if(data == 'duplicate'){
                            swal('Opps...','This Icon Is Already Active Please Choose Another One','info');
                        }
                        
                        
                    }
                })
        
            });
// Active => dective
    $(document).on('click', '.pack_deactive_icon', function(){

        var action = "deactive_activi_icon";
        var ID = $(this).attr('id');
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    if(data == 'deactive'){
                        swal('Good Job','This Icon Is Dective Now','success');
                        act_icon();
                    }else
                    if(data == 'not_deactive'){
                        swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
                    }
                    
                    
                }
            })
    
        });
// Dective All
    $(document).on('click', '.All_Pack_Icon_deactive', function(){

        var action = "deactive_pack_all_icon";
        var ID = $('#package_Activi_icon').val();
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    if(data == 'deactive_all'){
                        swal('Good Job','All Icons Are Dective Now','success');
                        act_icon();
                    }else
                    if(data == 'not_deactive_all'){
                        swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
                    }
                    
                    
                }
            })
    
        });
// ============================================== PACKAGE ACTIVITY IMAGE EDIT ==============================================
    $(document).on('click', '.pack_activity_img', function(){

        var action = "package_activity_img_fetch";
        var ID = $(this).attr('id');
        $('#Pac_activity_Img').modal("show");
        $('#package_activity_img_id').val($(this).attr('id'));
        $('#package_activity_img_d_id').val($(this).attr('id'));
        // console.log(ID);
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,UserID:ID},
                success:function(data)
                {
                    $('#activity_img_data').html(data);
                   
                }
            })
    
        });
    // new Img
        $('#new_activity_img').submit(function(event){
        event.preventDefault();
    
        var new_img = $('#activity_img_image').val();
        var id = $('#package_activity_img_id').val();
    
        if(new_img == '')
        {
        swal('Opps...Fill in the Blank','Please Select Imgae','info');
        return false;
        }else
        if(id == '')
        {
        swal('Opps...','Contact Developer','info');
        return false;
        }else
    
            {
            var extension = $('#activity_img_image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
            swal('Opps...Image File Not Match','Allow Only gif,png,jpg,jpeg Image File','warning');
            $('#activity_img_image').val('');
            return false;
            }
            else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            swal('Greate Job..',data,'success');
            $('#activity_img_image').val('');
            $('#new_activity_img')[0].reset();
            $('#Pac_activity_Img').modal("hide");
            all();
        }
        });
        }}
        });
    // image preview
        const activity_inpFile = document.getElementById("activity_img_image");
        const activity_previwContainer = document.getElementById("activity_imagePreview");
        const activity_previewImage = activity_previwContainer.querySelector(".image-preview__image");
        const activity_previewImageText = activity_previwContainer.querySelector(".image-preview__default-text");
    
        activity_inpFile.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          activity_previewImageText.style.display = "none";
          activity_previewImage.style.display = "block";
    
          reader.addEventListener("load", function() {
            console.log(this);
            activity_previewImage.setAttribute("src", this.result);
    
          });
          reader.readAsDataURL(file);
        }else{
            activity_previewImageText.style.display = null;
            activity_previewImage.style.display = null;
            activity_previewImage.setAttribute("src", "");
        }
        });
    
    // Img delete
        $(document).on('click', '.activity_img_delete', function(){
            var ID = $(this).attr("id");
            var action = "activity_img_delete";
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Image!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{UserID:ID, action:action},
                    success:function(data)
                    {
                    swal('Greate Job..',data,'success');
                    $('#Pac_activity_Img').modal("hide");
                    all();
                    }
                })
                } else {
                swal("This Activity Image is safe!");
                }
            });
        }); 
    
    
    // Delete all Images
        $('#delete_all_activity_img').submit(function(event){
            event.preventDefault();
    
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Images!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                    swal('Greate Job..',data,'success');
                    $('#Pac_activity_Img').modal("hide");
                    all();
                    }
                })
                } else {
                swal("This Activity Images are safe!");
                }
            });
        }); 
// ============================================== ALERTS ==============================================

// Show all alerts
    $(document).on('click', '.show_all_alerts', function(){

        var action = "show_all_alerts";
        
        $('#show_all_alerts_modal').modal("show");
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#show_all_alerts_modal_data').html(data);
                    all();
                }
            })
    
        });
// Alert read -> Un-read
    $(document).on('click', '.read', function(){

        var action = "unreade_alert";
        var ID = $(this).attr('id');
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,ID:ID},
                success:function(data)
                {
                    if (data == 'change'){
                        swal('Greate Job..','This Alert Status Change','success');
                        all();
                    }else
                    if(data == 'notchange'){
                        swal('Opss..','Somthing Went Wrong','error');
                    }
 
                }
            })
    
        });
// Alert Un-read -> Read
    $(document).on('click', '.un_read', function(){

        var action = "reade_alert";
        var ID = $(this).attr('id');
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,ID:ID},
                success:function(data)
                {
                    if (data == 'change'){
                        swal('Greate Job..','This Alert Status Change','success');
                        all();
                    }else
                    if(data == 'notchange'){
                        swal('Opss..','Somthing Went Wrong','error');
                    }
 
                }
            })
    
        });
// Alert Delete
    $(document).on('click', '.alert_delete', function(){

        var action = "delete_alert";
        var ID = $(this).attr('id');
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,ID:ID},
                success:function(data)
                {
                    if (data == 'change'){
                        swal('Greate Job..','This Delete Now','success');
                        all();
                    }else
                    if(data == 'notchange'){
                        swal('Opss..','Somthing Went Wrong','error');
                    }
 
                }
            })
    
        });
// Alert Mark All as Readr
    $(document).on('click', '.all_alerts_read', function(){

        var action = "all_alerts_read";
        var ID = $(this).attr('id');
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,ID:ID},
                success:function(data)
                {
                    if (data == 'change'){
                        swal('Greate Job..','Change All Alerts to Read','success');
                        all();
                    }else
                    if(data == 'notchange'){
                        swal('Opss..','Somthing Went Wrong','error');
                    }
 
                }
            })
    
        });
// Delete all read alerts
    $(document).on('click', '.all_alerts_delete', function(){

        var action = "all_alerts_delete";
        var ID = $(this).attr('id');
    
        $.ajax(
            {
                url:"action.php",
                method:"POST",
                data:{action:action,ID:ID},
                success:function(data)
                {
                    if (data == 'change'){
                        swal('Greate Job..','All Read Alerts Deleted Now','success');
                        all();
                    }else
                    if(data == 'notchange'){
                        swal('Opss..','Somthing Went Wrong','error');
                    }
 
                }
            })
    
        });
    // ============================================== ENQUIRY ==============================================

// Show all enquiry
$(document).on('click', '.show_all_enquiry', function(){

    var action = "show_all_enquiry";
    
    $('#show_all_enquiry_modal').modal("show");

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#show_all_enquiry_modal_data').html(data);
                all();
            }
        })

    });
// Enquiry read -> Un-read
$(document).on('click', '.read_email', function(){

    var action = "unreade_enquiry";
    var ID = $(this).attr('id');

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,ID:ID},
            success:function(data)
            {
                if (data == 'change'){
                    swal('Greate Job..','This Enquiry Status Change','success');
                    all();
                }else
                if(data == 'notchange'){
                    swal('Opss..','Somthing Went Wrong','error');
                }

            }
        })

    });
// Enquiry Un-read -> Read
$(document).on('click', '.un_read_email', function(){

    var action = "reade_enquiry";
    var ID = $(this).attr('id');

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,ID:ID},
            success:function(data)
            {
                if (data == 'change'){
                    swal('Greate Job..','This Enquiry Status Change','success');
                    all();
                }else
                if(data == 'notchange'){
                    swal('Opss..','Somthing Went Wrong','error');
                }

            }
        })

    });
// Enquiry Delete
$(document).on('click', '.enquiry_delete', function(){

    var action = "delete_enquiry";
    var ID = $(this).attr('id');

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,ID:ID},
            success:function(data)
            {
                if (data == 'change'){
                    swal('Greate Job..','This Enquiry Delete Now','success');
                    all();
                }else
                if(data == 'notchange'){
                    swal('Opss..','Somthing Went Wrong','error');
                }

            }
        })

    });
// Enquiry Mark All as Readr
$(document).on('click', '.all_enquiry_read', function(){

    var action = "all_enquiry_read";
    var ID = $(this).attr('id');

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,ID:ID},
            success:function(data)
            {
                if (data == 'change'){
                    swal('Greate Job..','Change All Enquiry to Read','success');
                    all();
                }else
                if(data == 'notchange'){
                    swal('Opss..','Somthing Went Wrong','error');
                }

            }
        })

    });
// Delete all read enquiry
$(document).on('click', '.all_enquiry_delete', function(){

    var action = "all_enquiry_delete";
    var ID = $(this).attr('id');

    $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,ID:ID},
            success:function(data)
            {
                if (data == 'change'){
                    swal('Greate Job..','All Read Enquiry Deleted Now','success');
                    all();
                }else
                if(data == 'notchange'){
                    swal('Opss..','Somthing Went Wrong','error');
                }

            }
        })

    });
// ================================================== Chat Bot ========================================
    $(document).on('click', '#Bot_Add', function(){

        $('#bot_chat_add_modal').modal("show");

        });
//  Add Q & A for chat-bot
    $('#chat_bot_QA').submit(function(event){
        event.preventDefault();
    
        var quection = $('#CB_Quection').val();
        var answer = $('#CB_Answer').val();
    
        if(quection == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Quection','info');
        return false;
        }else
        if(answer == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Answer','info');
        return false;
        }else
        
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            if(data == 'insert')
            {
                swal('Greate Job..','New Chat-Bot Quection & Answer Insert into Database','success');
                $('#bot_chat_add_modal').modal("hide");
                $('#CB_Quection').val('');
                $('#CB_Answer').val('');
                all();
            }else
            if(data == 'not_insert')
            {
                swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
            }
            
        }
        });
        }
        });
//  Edit Q & A for chat-bot
    $(document).on('click', '.bot_edit', function(){
        
        var action = "bot_edit_value";
        var ID = $(this).attr('id');
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{UserID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#QA_ID').val(data[0]);
                    $('#CB_Quection_edit').val(data[1]);
                    $('#CB_Answer_edit').val(data[2]);
                    $('#bot_chat_edit_modal').modal("show");
                }
            })
    });

    $('#chat_bot_QA_edit').submit(function(event){
        event.preventDefault();

        var quection = $('#CB_Quection_edit').val();
        var answer = $('#CB_Answer_edit').val();

        if(quection == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Quection','info');
        return false;
        }else
        if(answer == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Answer','info');
        return false;
        }else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            if(data == 'update')
            {
                swal('Greate Job..','This Quection & Answer Update Now','success');
                $('#chat_bot_QA_edit')[0].reset();
                $('#bot_chat_edit_modal').modal('hide');
                all();
            }else
            if(data == 'not_update')
            {
                swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
            }
            
        }
        });
        }
    });
// Delete Q & A for chat-bot
    $(document).on('click', '.bot_delete', function(){
        var ID = $(this).attr("id");
        var action = "bot_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{TravelID:ID, action:action},
                success:function(data)
                {
                    if(data == 'delete')
                    {
                        swal('Greate Job..','This Quection & Answer Deleted Now','success');
                        all();
                    }else
                    if(data == 'not_delete')
                    {
                        swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
                    }
                
                }
            })
            } else {
            swal("This Quection & Answer is safe!");
            }
        });
    });  

// ================================================== ICONS ========================================
    $(document).on('click', '#Icon_Add', function(){

        $('#icons_add_modal').modal("show");

        });
//  Add Q & A for chat-bot
    $('#icons_add_form').submit(function(event){
        event.preventDefault();
    
        var icon_text = $('#icon_text').val();
        var icon_title = $('#icon_title').val();
    
        if(icon_text == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Icon Code','info');
        return false;
        }else
        if(icon_title == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Icon Title','info');
        return false;
        }else
        
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            if(data == 'insert')
            {
                swal('Greate Job..','New Icons Insert into Database','success');
                $('#bot_chat_add_modal').modal("hide");
                $('#CB_Quection').val('');
                $('#CB_Answer').val('');
                all();
            }else
            if(data == 'not_insert')
            {
                swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
            }
            
        }
        });
        }
        });
//  Edit Icon
    $(document).on('click', '.icons_edit', function(){
        
        var action = "icons_edit_value";
        var ID = $(this).attr('id');
        // console.log(ID);
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{UserID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#Icon_ID').val(data[0]);
                    $('#icon_text_edit').val(data[1]);
                    $('#icon_title_edit').val(data[2]);
                    $('#icons_edit_modal').modal("show");
                }
            })
    });

    $('#icons_edit_form').submit(function(event){
        event.preventDefault();

        var icon_text_edit = $('#icon_text_edit').val();
        var icon_title_edit = $('#icon_title_edit').val();

        if(icon_text_edit == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Icon Code','info');
        return false;
        }else
        if(icon_title_edit == '')
        {
        swal('Opps...Fill in the Blank','Please Enter Icon Title','info');
        return false;
        }else
        {
        $.ajax({
        url:"action.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            if(data == 'update')
            {
                swal('Greate Job..','This Icon Is Update Now','success');
                $('#icons_edit_form')[0].reset();
                $('#icons_edit_modal').modal('hide');
                all();
            }else
            if(data == 'not_update')
            {
                swal('Opps...Somthing Went Wrong','Please Contact Developer','error');
            }
            
        }
        });
        }
    });
// Delete Icons
    $(document).on('click', '.icons_delete', function(){
        var ID = $(this).attr("id");
        var action = "icons_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{ID:ID, action:action},
                success:function(data)
                {
                    if(data == 'delete')
                    {
                        swal('Greate Job..','This Icon Deleted Now','success');
                        all();
                    }else
                    if(data == 'not_delete')
                    {
                        swal('Opps..Somthing Went Wrong','Please Contact Developer','error');
                    }
                
                }
            })
            } else {
            swal("This Icon is safe!");
            }
        });
    });  
//================================================ Bar Chart ============================================
    function showBarChart()
    {var action = "BarChart";
    {
        $.ajax({
        url:"action.php",
        method: "POST",
        data:{action:action},
        success:function (data)
        {
            console.log(data);
             var name = [];
            var marks = [];

            for (var i in data) {
                name.push(data[i].Package_Name);
                marks.push(data[i].No_of_Travelers);
            }



            var graphTarget = $("#graphCanvas");

            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: {
                labels: name,
                datasets: [
                    {
                        label: 'Number of Travelers',
                        backgroundColor: '#4e73df',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#2e59d9',
                        hoverBorderColor: '#666666',
                        data: marks
                    }],
                },
                
                options: {
                    maintainAspectRatio: false,
                    layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                    },
                    scales: {
                    xAxes: [{
                        time: {
                        unit: 'date'
                        },
                        gridLines: {
                        display: false,
                        drawBorder: false
                        },
                        ticks: {
                        maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                        maxTicksLimit: 10,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return ' ' + number_format(value);
                        }
                        },
                        gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                        }
                    }],
                    },
                    legend: {
                    display: false
                    },
                    tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ':  ' + number_format(tooltipItem.yLabel);
                        }
                    }
                    }
                }
                
            });
        }
    });
}
}

//================================================ Donut Chart ============================================
    function showDonutChart()
    {var action = "DonutChart";
    {
        $.ajax({
        url:"action.php",
        method: "POST",
        data:{action:action},
        success:function (data)
        {
            console.log(data);
            var name = [];
            var marks = [];

            for (var i in data) {
                name.push(data[i].Status);
                marks.push(data[i].No_of_Package);
            }



            var graphTarget = $("#myDonutChart");

            var barGraph = new Chart(graphTarget, {
                type: 'doughnut',
                data: {
                labels: name,
                datasets: [
                    {
                        label: 'Number of Packages',
                        backgroundColor: [ '#1cc88a','#36b9cc', '#c8831c', '#a32ed9' ,'#e02837'],
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: [ '#17a673','#2c9faf', '#d9b12e', '#7b16aa', '#ad1c28'],
                        hoverBorderColor: '#666666',
                        data: marks
                    }],
                },
                
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                    },
                    legend: {
                      display: true
                    },
                    cutoutPercentage: 70,
                  },
                
            });
        }
    });
    }
    }

//================================================ Profit Loss Chart ============================================
        
        $(document).on('click', '.income_search', function(){
            income_chart();        
    });
// ============================================= USER INVOICE SELECT =================================
    $("#user_select").mouseup(function(){
    
        userInvoice();
        })

// ============================================= USER INVOICE PACKAGE SELECT =================================
    $("#package_select").mouseup(function(){
      
        userInvoice();
        })

// ============================================= USER INVOICE DATA SELECT =================================
    $("#invoice_from_date").change(function(){
        
        userInvoice();
        })
// ============================================= USER INVOICE DATA SELECT =================================
    $("#invoice_to_date").change(function(){
            
        userInvoice();
        })
// ============================================= USER INVOICE DATA SELECT =================================
    $("#invoice_status_select").change(function(){
                
        userInvoice();
        })
// ============================================== GPS TRACKING PACKAGE FETCH ==============================================
    
    function gps_tracking_package()
    {
        var action = "fetch_gps_tracking_package";
        $.ajax({
            url:"data.php",
            method:"POST",
            data:{action:action},
            }).done(function(tracking){
                
                tracking = JSON.parse(tracking);
                $('#tracking_package').empty();
                
                tracking.forEach(function(track){
                    // $('#tracking_vehical').empty();
                    // $('#tracking_package').append('<option value="0">Select Guider</option>')
                    $('#tracking_package').append('<option value='+ track.ID +'>' + track.G_Name + '</option>')
                    
                })
            })
        
    }
        // $("#tracking_package").change(function(){
        //     var id = $('#tracking_package').val();
        //     var action = "tracking_vehical_fetch";
        //     $.ajax({
        //     url:"data.php",
        //     method:"POST",
        //     data:{action:action,id:id},
        //     }).done(function(vehicals){
                
        //         vehicals = JSON.parse(vehicals);
        //         $('#tracking_vehical').empty();
                
        //         vehicals.forEach(function(vehical){
                    
        //             $('#tracking_vehical').append('<option value='+ vehical.Unic_ID +'>' + vehical.Unic_ID + '</option>')
                    
        //         })
        //     })
        // })


    $("#tracking_package").mouseup(function(){
        
    var action = "track_vehical";
    var id = $('#tracking_package').val();

    $.ajax(
    {
        url:"action.php",
        method:"POST",
        data:{action:action ,ID:id},
        dataType: 'JSON',
        success:function(data)
        {
            
            document.querySelector('.GPS').style.display = 'none';
            document.querySelector('.map').style.display = 'block';

            $('#vehical_code').val(data[0]);
            $('#lat').val(data[1]);
            $('#lng').val(data[2]);
            $('#vehical').val(data[3]);

        }
    })
    
    });
    
    $("#vehical_code").change(function(){
        var action = "track_vehical_by_code";
        var id = $('#vehical_code').val();
    
    
        $.ajax(
        {
            url:"action.php",
            method:"POST",
            data:{action:action,ID:id},
            dataType: 'JSON',
            success:function(data)
            {
                document.querySelector('.GPS').style.display = 'none';
                document.querySelector('.map').style.display = 'block';

                $('#lat').val(data[0]);
                $('#lng').val(data[1]);
                $('#vehical').val(data[2]);

    
                
            }
        })
        
        });

        function wrong_code()
        {
            var id = $('#vehical_code').val();
            var action = "check_vehical_code";
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{action:action,ID:id},
                success:function(data)
                {
                    if(data =='wrong'){
                    document.querySelector('.GPS').style.display = 'flex';
                    document.querySelector('.map').style.display = 'none';
                    $('#lat').val('');
                    $('#lng').val('');
                    }
                }
            })
        }

        function lat_long()
        {
            var id = $('#vehical_code').val();
            var action = "lat_long";
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{action:action,ID:id},
                dataType: 'JSON',
                success:function(data)
                {
                   
                    $('#lat').val(data[0]);
                    $('#lng').val(data[1]);
                    $('#vehical').val(data[2]);
                    
                }
            })
        }
// ================================================== Insert New GPS Tracking Vehicles ==================
    $(document).on('click', '#vehicle_new', function(){
    
        $('#vehicle_new_modal').modal("show");
        
    });

    $('#vehicle_new_form').submit(function(event){
        event.preventDefault();
        var unique_id = $('#unique_id').val();
        var package = $('#package').val();

        if(unique_id == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Unique ID / GPS Model ID','info');
         return false;
        }
        else 
        if(package == '')
        {
         swal('Opps...Fill in the Blank','Please Select Package','info');
         return false;
        }         
         else
         {
          $.ajax({
           url:"action.php",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           processData:false,
           success:function(data)
           {
               if(data = 'insert')
               {
                swal('Great Job..','New Tracking Vehicle Insert Into Database','success');
                $('#vehicle_new_modal').modal("hide");
                $('#vehicle_new_form')[0].reset();
                all();
               }else
               if(data = 'not_insert')
               {
                swal('Opps...Somthing Went Wrrong','Please Contact Developer','info');
               }
            
           }
          });
         }
        
    });

    $("#gps_package").mouseup(function(){
        var package = $('#gps_package').val();
        $("#gps_package_id").val(package);

        });
    
    $(document).on('click', '.vehicle_delete', function(){
        var ID = $(this).attr("id");
        var action = "vehicle_delete";
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{ID:ID, action:action},
                success:function(data)
                {
                    if(data = 'delete')
                    {
                        swal('Greate Job..','This Tracking Vehicle Data Delete Now','success');
                        all();
                    }else
                    if(data = 'not_delete')
                    {
                        swal('Somthing Went Wrrong..','Please Conatact Developer','error');
                    }
                
                }
            })
            } else {
            swal("This Data is safe!");
            }
        });
    }); 

    $(document).on('click', '.vehicle_update', function(){        
        var action = "vehicle_update";
        var ID = $(this).attr('id');
        
        $.ajax(
            {
                url: 'action.php',
                method: 'POST',
                data:{ID:ID, action:action},
                dataType: 'JSON',
                success: function(data)
                {
                    
                    $('#id').val(data[0]);
                    $('#edit_unique_id').val(data[1]);
                    $('#vehicle_edit_modal').modal("show");
                }
            })
    });

    $('#vehicle_edit_form').submit(function(event){
        event.preventDefault();
        var unique_id = $('#edit_unique_id').val();
        var package = $('#edit_gps_package_id').val();

        if(unique_id == '')
        {
         swal('Opps...Fill in the Blank','Please Enter Unique ID / GPS Model ID','info');
         return false;
        }
        else 
        if(package == '')
        {
         swal('Opps...Fill in the Blank','Please Select Package','info');
         return false;
        }         
         else
         {
          $.ajax({
           url:"action.php",
           method:"POST",
           data:new FormData(this),
           contentType:false,
           processData:false,
           success:function(data)
           {
               if(data = 'edit')
               {
                swal('Great Job..','Tracking Vehicle Edit Into Database','success');
                $('#vehicle_edit_modal').modal("hide");
                $('#vehicle_edit_form')[0].reset();
                all();
               }else
               if(data = 'not_edit')
               {
                swal('Opps...Somthing Went Wrrong','Please Contact Developer','info');
               }
            
           }
          });
         }
        
    });

    $("#edit_gps_package").mouseup(function(){
        var package = $('#edit_gps_package').val();
        $("#edit_gps_package_id").val(package);

        });
});