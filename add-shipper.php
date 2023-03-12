<?php
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$shipper_details = DB::table('shippers')->get();

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
                                <li class="breadcrumb-item active">Shipment Add</li>
                            </ol>
                            <h4 class="page-title">Add New Shipment</h4>
                        </div>
                        <!-- End page title box -->

        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <form class="row" action="" id="new_bill_form" method="post">
                                        <div class="error col-md-12" id="error">
                                        
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Tracking Number</label>
                                            <input type="number" min="0" name="tracking_no" id="tracking_no" class="form-control"  placeholder="Tracking Number" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Date</label>
                                            <input type="Date" name="date" id="date" class="form-control"  placeholder="Date" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Reference No</label>
                                            <input type="text" name="reference_no" id="reference_no" class="form-control"  placeholder="Reference No" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Pieces</label>
                                            <input type="number" min="0" name="pieces" id="pieces" class="form-control"  placeholder="Pieces" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Weight</label>
                                            <input data-parsley-type="number" type="text"  name="weight" id="weight" class="form-control"  placeholder="Weight" required/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Description</label>
                                            <textarea  name="description" id="description" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Shipper Name</label>
                                            <select class="form-control select2" name="shipper_name" id="shipper_name" required="">
                                                <option value="">Select</option>
                                                <?php foreach ($shipper_details as $sd) { ?>
                                                <option value="<?php echo $sd->shipper_code; ?>">(<?php echo $sd->shipper_code; ?>) - <?php echo $sd->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>To Invoice Bill</label>
                                            <select class="form-control select2" name="subshipper" id="subshipper">
                                                
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Consignee</label>
                                            <input type="text" name="consignee" id="consignee" class="form-control"  placeholder="Consignee" required/>
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Consignee Address</label>
                                            <textarea  name="consigneeAddress" id="consigneeAddress" class="form-control" rows="1" required></textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Consignee City</label>
                                            <input  name="consignee_city" id="consignee_city" class="form-control"  />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Consignee Country</label>
                                            <input  name="consignee_country" id="consignee_country" class="form-control"  />
                                        </div>
                                        
                                        <!-- <div class="form-group col-md-6">
                                            <label>Destination</label>
                                            <input type="text"  name="destination" id="destination" class="form-control" placeholder="Destination"/>
                                        </div> -->
                                        <div class="form-group col-md-3">
                                            <label>Via</label>
                                            <input type="text"  name="via" id="via" class="form-control" placeholder="Via"/>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Dox/Spx</label><br>
                                            <label><input type="radio" name="dox_spx" value="WPX" required=""> WPX</label>
                                            <label><input type="radio" name="dox_spx" value="SPX"> SPX</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Remark</label>
                                            <input type="text" name="remark" id="remark" class="form-control" placeholder="Remark"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="hidden" name="action" id="action" value="newShipper" >
                                            <div>
                                                <button type="submit" name="newShipper" id="newShipper" class="btn btn-primary waves-effect waves-light">
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();

                function selectAllSubshipper(){
                    $.ajax({
                        type: 'POST',
                        url: 'manage-shippers.php',
                        data:{action: 'selectAllSubshippers'},
                        success: function (response) {
                            $('#subshipper').html(response);
                        }
                    });
                }
                selectAllSubshipper();

                // $('#shipper_name').on("change", function(event){
                //     var shipper_id = $('#shipper_name').val();
                //     $.ajax({
                //         type: 'POST',
                //         url: 'manage-shippers.php',
                //         data:{action: 'selectAllShipperSubshipper', id:shipper_id},
                //         success: function (response) {
                //             $('#subshipper').html(response);
                //         }
                //     });
                // });

                $(function () {

                    $('#newShipper').on("click", function(event){  
                        event.preventDefault();
                        var tracking_no = $("#tracking_no").val();
                        var date = $("#date").val();
                        var pieces = $("#pieces").val();
                        var weight = $("#weight").val();
                        var description = $("#description").val();
                        var shipper_name = $("#shipper_name").val();
                        var shipper_address = $("#shipper_address").val();
                        var shipper_city = $("#shipper_city").val();
                        var consignee = $("#consignee").val();
                        var consigneeAddress = $("#consigneeAddress").val();
                        // var destination = $("#destination").val();

                        if (tracking_no == '') {
                            $.NotificationApp.send("Error!", "Tracking No Field Required!", 'top-right', '#bf441d', 'error');
                        }else if (date == '') {
                            $.NotificationApp.send("Error!", "Date Field Required!", 'top-right', '#bf441d', 'error');
                        }else if (pieces == '') {
                            $.NotificationApp.send("Error!", "Pieces Field Required!", 'top-right', '#bf441d', 'error');
                        }else if (weight == '') {
                            $.NotificationApp.send("Error!", "Weight Field Required!", 'top-right', '#bf441d', 'error');
                        }else if (description == '') {
                            $.NotificationApp.send("Error!", "Description Field Required!", 'top-right', '#bf441d', 'error');
                        }else if (shipper_name == '') {
                            $.NotificationApp.send("Error!", "Select shipper!", 'top-right', '#bf441d', 'error');
                        }
                        else if (consignee == '') {
                            $.NotificationApp.send("Error!", "Consignee Field Required!", 'top-right', '#bf441d', 'error');
                        }
                        // else if (destination == '') {
                        //     $("#error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Destination Field Required!</div>');
                        // }
                        else if (via == '') {
                            $.NotificationApp.send("Error!", "Via Field Required!", 'top-right', '#bf441d', 'error');
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: 'process.php',
                                data:$('#new_bill_form').serialize(),
                                success: function (response) {
                                    if(response == 'successfull'){
                                        $('#new_bill_form')[0].reset();
                                        $.NotificationApp.send("Success!", "New Shipment Added.", 'top-right', '#5ba035', 'success');
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