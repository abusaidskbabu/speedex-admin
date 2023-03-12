<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
$shipper_details = DB::table('shippers')->distinct()->get();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'include/header.php'; ?>

    <link href="assets/libs/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet" />
        

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <?php include 'include/topnav.php'; ?>
            <!-- End Navigation Bar-->

            <!-- ========== Left Sidebar Start ========== -->
             <?php include 'include/left-side-menu.php'; ?>
            <!-- Left Sidebar End -->


            <!-- Page Content Start -->
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page title box -->
                        <div class="page-title-box">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Greeva</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                            <h4 class="page-title">New Invoice</h4>
                        </div>
                        <!-- End page title box -->

        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <form class="row" action="" id="new_payment_form" method="post">
                                        <div class="error col-md-12" id="error">
                                        
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Company</label>
                                            <select class="form-control select2" name="shipper_name" id="shipper_name">
                                                <option value="Select">Select</option>
                                                <?php foreach ($shipper_details as $sd) { ?>
                                                <option value="<?php echo $sd->shipper_code; ?>">(<?php echo $sd->shipper_code; ?>) <?php echo $sd->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date 1</label>
                                            <input class="form-control" type="date" name="date1" id="date1" required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date 2</label>
                                            <input class="form-control" type="date" name="date2" id="date2" required="">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-info" id="filter">Filter</button>
                                        </div>

                                        <div class="form-group col-md-12" id="filter_result">
                                            
                                        </div>
                                        <div class="col-md-12 row" id="submitArea">
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Invoice Date</label>
                                                    <input type="date"  name="invoice_date" id="invoice_date" class="form-control" required="" />
                                                </div>
                                            </div>
                                            

                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Total US$</label>
                                                    <input type="text"  name="total" id="total" class="form-control" readonly="" placeholder="Total US$"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                             <div class="col-md-4">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Fuel Sur Charge @ %</label>
                                                    <input type="text"  name="fuelCharge" id="fuelCharge" class="form-control" required placeholder="Fuel Sur Charge @ %"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>After Fuel Sur Charge</label>
                                                    <input type="text"  name="afterFuelCharge" id="afterFuelCharge" value="" class="form-control" readonly="" placeholder="After Fuel Sur Charge"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>TTL U.S.$</label>
                                                    <input type="text"  name="ttlus" id="ttlus" class="form-control" readonly="" placeholder="After Fuel Sur Charge"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                             <div class="col-md-4">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>USD Rate</label>
                                                    <input type="text"  name="rate" id="rate" class="form-control" required placeholder="USD Rate"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>BDT</label>
                                                    <input type="text"  name="bdt" id="bdt" value="" class="form-control" readonly="" placeholder="BDT"/>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 text-right">
                                                <input type="hidden" name="action" id="action" value="newPayment" >
                                                <div>
                                                    <button type="submit" name="newPay" id="newPay" class="btn btn-primary waves-effect waves-light">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-light waves-effect m-l-5">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->    

                    
                    </div> <!-- end container-fluid-->
                </div> <!-- end contant-->
            </div>
            <!-- End Page Content-->


            <!-- Footer -->
            <?php include 'include/footer.php'; ?>
            <!-- End Footer -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->

        </div>
        <!-- End #wrapper -->


        <!-- jQuery  -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>


         <!-- select2 js -->
        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="assets/libs/mohithg-switchery/switchery.min.js"></script>
        <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <!-- Mask input -->
        <script src="assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
        <!-- Bootstrap Select -->
        <script src="assets/libs/bootstrap-select/js/bootstrap-select.min.js"></script>

        <script src="assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

        <script src="assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

        <script src="assets/libs/moment/moment.js"></script>

        <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        <script src="assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="assets/libs/jquery-toast-plugin/jquery.toast.min.js"></script>
        <script src="assets/js/jquery.toastr.js"></script>


        <!-- Init Js file -->
        <script src="assets/js/jquery.form-advanced.js"></script>
        <!-- Parsley js -->
        <script type="text/javascript" src="assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script src="custom/js/order.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();

                $('#submitArea').hide();

                
                $('#fuelCharge').keyup(function() {
                    var amount = Number($('#total').val());
                    var fuelCharge = Number($('#fuelCharge').val());
                    var afterFuelCharge = (amount * fuelCharge) / 100;
                    $('#afterFuelCharge').val(afterFuelCharge.toFixed(2));
                    var totaSum = (amount + afterFuelCharge);
                    var total_amount = (totaSum.toFixed(2));
                    $('#ttlus').val(total_amount);
                    $("#rate").val('0');
                    $("#bdt").val('0');
                });

                $('#rate').keyup(function() {
                    var ttlus = Number($('#ttlus').val());
                    var rate = Number($('#rate').val());
                    var btd = (ttlus * rate);
                    var total_bdt = (btd.toFixed(2));
                    $("#bdt").val(total_bdt);
                });

                $('#filter').on("click", function(event){  
                        event.preventDefault();

                    var shipper_name = $("#shipper_name").val();
                    var date1 = $("#date1").val();
                    var date2 = $("#date2").val();
                    var action = 'FilterShipperPayment';
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {shipper_name:shipper_name, date1:date1, date2:date2, action:action},
                        success:function(response){
                            if (response != '') {
                                $('#submitArea').show();
                                $('#filter_result').html(response);
                            }else{
                                $('#submitArea').hide();
                            }
                            
                        }
                    });
                });

                $(function () {
                    $('#newPay').on("click", function(event){  
                        event.preventDefault();
                       
                        var shipper_name = $("#shipper_name").val();
                        

                        if (shipper_name == 'Select') {
                            $.NotificationApp.send("Success!", "Select a shipper.", 'top-right', '#bf441d', 'error');
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: 'process.php',
                                data:$('#new_payment_form').serialize(),
                                success: function (response) {
                                    if(response == 'successfull'){
                                        $('#new_payment_form')[0].reset();
                                        $('#submitArea').hide();
                                        $('#filter_result').hide();

                                        $.NotificationApp.send("Success!", "New Invoice created.", 'top-right', '#5ba035', 'success');
                                    }else{
                                        $.NotificationApp.send("Error!", ""+response+".", 'top-right', '#bf441d', 'error');
                                    }
                                    
                                }
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>