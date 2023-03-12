<?php
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$shipper_details = DB::table('shipers_details')->get();
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Bill</a></li>
                                <li class="breadcrumb-item active">Edit Bill</li>
                            </ol>
                            <h4 class="page-title">Edit Bill</h4>
                        </div>
                        <!-- End page title box -->

                        <input type="hidden" name="getTrackingNo" id="getTrackingNo" value="<?php echo $_GET['tracking_no']; ?>">
                        <div class="row">
                            <div class="col-lg-12" id="billDetails" style="">
                                <div class="card-box">
                                    <div class="clearfix">
                                        <div class="text-center">
                                            <h4 class="m-0 d-print-none pb-4">Bill Details</h4>
                                        </div>
                                    </div>
                                    <form class="row" action="" id="bill_details_form" method="post">
                                        <div class="error col-md-12" id="error2">
                                        
                                        </div>
                                        <div class="col-md-6 pr-0 h-100 row">
                                            <div class=" border-top col-md-12">
                                                <p class="m-0"><strong>Way Bill No : </strong> <span class="" id="order_no">  </span></p>
                                                <p class="m-0"><strong>Date : </strong> <span class="" id="order_date"></span></p>
                                            </div>
                                            <div class="col-md-12 border-top" style="height: 200px;">
                                                <h5 class="">Consignor:</h5>
                                                <h5 class="consinor" id="consinor"></h5>
                                                <p id="consinor_address"></p>
                                            </div>
                                            <table class="border-top border-bottom col-md-12">
                                                <tbody class="col-md-12">
                                                    <tr class="row border-bottom">
                                                        <td class="border-right col-md-4">
                                                            <h5>Description</h5>
                                                        </td>
                                                        <td class="border-right col-md-4">
                                                            <h5 class="">Pieces</h5>
                                                        </td>
                                                        <td class=" col-md-4">
                                                            <h5 class="">Weight</h5>
                                                        </td>
                                                    </tr>
                                                    <tr class="row" style="margin-right: 0px; margin-left: 0px;">
                                                        <td class="border-right col-md-4">
                                                            <label id="description"></label>
                                                        </td>
                                                        <td class="border-right col-md-4"> 
                                                             <input type="text" name="pieces" id="pieces" class="form-control " readonly="">
                                                        </td>
                                                        <td class="col-md-4">
                                                            <input type="text" name="weight" id="weight" class="form-control " >
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6 border-left pl-0 h-100">
                                            <div class=" border-top pl-1">
                                                <p class="m-0 float-left"><strong>Bill No : </strong> <span class="" id="order_no2">  </span></br>Document / Parcels</p>

                                                <p class="m-0 float-right"><strong>Date : </strong> <span class="" id=""><?php echo date('yy-m-d'); ?>  </span></p> <br>
                                                
                                            </div>
                                            <table class="border-top w-100 ">
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>Rate Per 500gms US$ : </h5></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text"  name="rate_per_gm" id="rate_per_gm" class="form-control "  value="">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>Total Wt. Charge US$ : </h5></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div> 
                                                            <input type="text" name="total_wt_charge" id="total_wt_charge" class="form-control" value="">
                                                        </div>
                                                       
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>(i) Doct: </h5></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text" name="doct" id="doct" class="form-control"  value="">
                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>Service Charge US$ : </h5></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text" name="service_charge" id="service_charge" class="form-control" value="">
                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>(ii) Sample: </h5></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text" name="sample" id="sample" class="form-control" value="">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="pl-1"><h5>Total Charge US$ : </h5></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text" name="total_charge" id="total_charge" class="form-control" value="" readonly="">
                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="pl-1"><h5>Total Taka : </h5></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text" name="total" id="total" class="form-control">
                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6 border-right" style="height: 150px;">
                                            <h5 class="">Consignee</h5>
                                            <p class="m-0" id="consignee"></p>
                                            <p class="m-0" id="consignee_address"></p>
                                        </div>
                                        <div class="col-md-6" style="height: 150px;">
                                            <h5 class="">Taka In Word</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input type="text" name="amount_word" id="amount_word" class="form-control" readonly="">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="tr_no" id="tr_no" value="">
                                            <input type="hidden" name="description" id="description2" value="">

                                            <input type="hidden" name="action" value="updateBillDetails">
                                            <button type="submit" class="btn btn-success">Save</button>
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

        <!-- Toastr js -->
        <script src="assets/libs/jquery-toast-plugin/jquery.toast.min.js"></script>
        <script src="assets/js/jquery.toastr.js"></script>

        <!-- Init Js file -->
        <script src="assets/js/jquery.form-advanced.js"></script>

        <!-- Parsley js -->
        <script type="text/javascript" src="assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <!-- <script type="text/javascript" src="package/numeral.js"></script> -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
               
                function selectBillDetails(){
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {action: "selectBillDetails",tracking_no: $('#getTrackingNo').val()},
                        dataType:"json",
                        success: function (response) {
                            if (response == null) {
                                $('#billDetails').css("display", "none");
                                $('#error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>No Data Found</div>')
                            }else{
                                $('#billDetails').css("display", "block");
                                $('#order_no').html(response.tracking_no);
                                $('#order_date').html(response.date);
                                $('#pieces').val(response.pieces);
                                $('#description').html(response.dox_spx);
                                $('#description2').val(response.dox_spx);
                                $('#consinor').html(response.name);
                                $('#consinor_address').html(response.address+'</br>'+response.city+', '+response.country);
                                $('#consignee').html(response.consignee);
                                $('#consignee_address').html(response.consigneeAddress+'</br>'+response.consignee_city+', '+response.consignee_country);
                                $('#order_no2').html(response.reference_no);
                                $('#tr_no').val(response.tracking_no);
                                $('#remarks').val(response.remarks);  
                                $('#weight').val(response.bill_weight);

                                $('#rate_per_gm').val(response.rate_per_gm);
                                $('#total_wt_charge').val(response.total_wt_charge);
                                $('#doct').val(response.doct);
                                $('#service_charge').val(response.service_charge);
                                $('#sample').val(response.sample);
                                $('#total_charge').val(response.total_charge);
                                $('#total_amount').val(response.total_amount);
                                $('#amount_word').val(response.taka_in_word);
                            }
                        }
                    });
                }
                selectBillDetails();
                $('#rate_per_gm, #total_wt_charge, #doct, #service_charge, #sample').keyup(function() {
                    var dInput = Number($('#rate_per_gm').val());
                    var dInput2 = Number($('#total_wt_charge').val());
                    var dInput3 = Number($('#doct').val());
                    var dInput4 = Number($('#service_charge').val());
                    var dInput5 = Number($('#sample').val());

                    var totalSum = dInput+dInput2+dInput3+dInput4+dInput5;
                    var total_amount = (totalSum.toFixed(2));
                    $('#total_charge').val(total_amount);

                    $.ajax({
                        url: 'convert_number_to_word.php',
                        type: 'POST',
                        data: {total_amount: total_amount},
                        success: function (response) {
                            $("#amount_word").val(response);
                        }
                    });
            
                });

                $('#bill_details_form').on("submit", function(event){  
                event.preventDefault();

                    $.ajax({  
                        url:"process.php",  
                        method:"POST",  
                        data: $('#bill_details_form').serialize(),
                        success:function(response){
                            if(response == 'successfull'){
                                $.NotificationApp.send("Success!", "Bill Updated.", 'top-right', '#5ba035', 'success');
                                selectBillDetails();
                            }else{
                                $.NotificationApp.send("Error!", ""+response+".", 'top-right', '#bf441d', 'error');
                                selectBillDetails();
                            }
                        }  
                    });  
                });
            });
        </script>



    </body>
</html>