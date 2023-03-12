<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
$shipper_details = DB::table('shipers_details')->get();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'include/header.php'; ?>

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
                                <li class="breadcrumb-item active">Payment</li>
                            </ol>
                            <h4 class="page-title">New Payment</h4>
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
                                             <select class="form-control select2" name="tracking_no" id="tracking_no">
                                                <option value="Select">Select</option>
                                                <?php foreach ($shipper_details as $sd) { ?>
                                                <option value="<?php echo $sd->id; ?>"><?php echo $sd->shipper_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <table class="table table-bordered" id="productTable">
                                                <thead>
                                                    <tr>
                                                       <th>S/L</th>
                                                       <th>Date</th>
                                                       <th>Awb#</th>
                                                       <th>Dest</th>
                                                       <th>Dox/Spx</th>
                                                       <th>Weight</th>
                                                       <th>Charge U.S $</th>
                                                       <th>Remarks</th>
                                                       <th><button type="button" name="addRowBtn" class="btn btn-success btn-sm addRowBtn" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."><i class="mdi mdi-plus-box"></i></button>
                                                       </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $arrayNumber = 0;
                                                    for($x = 1; $x < 2; $x++) { ?>
                                                        <tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
                                                            <td style="">
                                                                <div class="form-group">
                                                                    <?php echo $x; ?>
                                                                </div>
                                                            </td>
                                                            <td style="">
                                                                <div class="form-group">
                                                                    <input type="Date" name="payment_date[]" id="payment_date<?php echo $x; ?>" class="form-control" required placeholder="Date"/>
                                                                </div>
                                                            </td>
                                                            <td style="">
                                                                <div class="form-group">
                                                                    <input type="text" min="0" name="awb[]" id="awb<?php echo $x; ?>" autocomplete="off" class="form-control" required placeholder="Awb #"/>
                                                                </div>
                                                            </td>
                                                            <td style="">
                                                                <div class="form-group">
                                                                    <input type="text"  name="dest[]" id="dest<?php echo $x; ?>" autocomplete="off" class="form-control" required placeholder="Dest"/>
                                                                </div>
                                                            </td>
                                                            <td style="">
                                                                <div class="form-group">
                                                                    <input type="text"  name="dox_spx[]" id="dox_spx<?php echo $x; ?>" class="form-control" autocomplete="off" required placeholder="Dox / Spx"/>
                                                                </div>
                                                            </td>
                                                            <td style="">
                                                                <div class="form-group">
                                                                    <input data-parsley-type="number" type="text"  name="weight[]" id="weight<?php echo $x; ?>" class="form-control" autocomplete="off" required placeholder="Weight"/>
                                                                </div>
                                                            </td>
                                                            <td style="">
                                                                <div class="form-group">
                                                                    <input type="text"  name="amount[]" id="amount<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" class="form-control" autocomplete="off" required placeholder="Amount U.S.$"/>
                                                                </div>
                                                            </td>
                                                            
                                                            <td style="">
                                                                <div class="form-group">
                                                                    <input type="text"   name="remarks[]" id="remarks<?php echo $x; ?>" class="form-control" autocomplete="off" placeholder="Remarks"/>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-danger removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="mdi mdi-close-circle"></i></button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $arrayNumber++;
                                                    } // /for
                                                    ?>
                                                </tbody>
                                            </table>
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
                                                <input type="number"  name="fuelCharge" id="fuelCharge" class="form-control" required placeholder="Fuel Sur Charge @ %"/>
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
                                        <div class="form-group col-md-12">
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


                
                $('#fuelCharge').keyup(function() {
                    var amount = Number($('#total').val());
                    var fuelCharge = Number($('#fuelCharge').val());
                    var afterFuelCharge = (amount * fuelCharge) / 100;
                    $('#afterFuelCharge').val(afterFuelCharge);
                    var totaSum = (amount + afterFuelCharge);
                    var total_amount = (totaSum.toFixed(2));
                    $('#ttlus').val(total_amount);
                });


                $(function () {
                    $('#newPay').on("click", function(event){  
                        event.preventDefault();
                       
                        var tracking_no = $("#tracking_no").val();
                        

                        if (tracking_no == 'Select') {
                            $("#error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Select company.</div>');
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: 'process.php',
                                data:$('#new_payment_form').serialize(),
                                success: function (response) {
                                    if(response == 'successfull'){
                                        $('#new_payment_form')[0].reset();
                                        $('#error').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> New Payment Inserted Successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                    }else{
                                         $('#error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> '+response+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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