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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Shippers</a></li>
                                <li class="breadcrumb-item active">Sub-Shipper</li>
                            </ol>
                            <h4 class="page-title">Add Sub-Shipper</h4>
                        </div>
                        <!-- End page title box -->

        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <form class="row" action="" id="new_bill_form" method="post">
                                        <div class="error col-md-12" id="error">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Select Shipper</label>
                                            <select class="form-control select2" name="shipper_name" id="shipper_name">
                                                <option value="select">Select</option>
                                                <?php foreach ($shipper_details as $sd) { ?>
                                                <option value="<?php echo $sd->shipper_code; ?>">(<?php echo $sd->shipper_code; ?>) - <?php echo $sd->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="" class="col-form-label">Sub-Shipper Name:</label>
                                        <input type="text" class="form-control" id="addName" name="addName" required="">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="" class="col-form-label">Sub-Shipper Email:</label>
                                        <input type="email" class="form-control" id="addEmail" name="addEmail" required="">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="" class="col-form-label">Sub-Shipper Phone:</label>
                                        <input type="text" class="form-control" id="addPhone" name="addPhone" required="">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="" class="col-form-label">Sub-Shipper Code:</label>
                                        <input type="text" class="form-control" id="addCode" name="addCode" required="">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="" class="col-form-label">Sub-Shipper City:</label>
                                        <input type="text" class="form-control" id="addCity" name="addCity" required="">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="" class="col-form-label">Sub-Shipper Country:</label>
                                        <input type="text" class="form-control" id="addCountry" name="addCountry" required="">
                                      </div>
                                      <div class="form-group col-md-12">
                                        <label for="" class="col-form-label">Address:</label>
                                        <input type="text" class="form-control" id="addAddress" name="addAddress" required="">
                                      </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info">Add Sub-shipper</button>
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
               
                $('#new_bill_form').on('submit', function (e) {
                    e.preventDefault();
                    
                    var shipper_name = $("#shipper_name").val();
                    var addCode = $("#addCode").val();
                    var addName = $("#addName").val();
                    var addPhone = $("#addPhone").val();
                    var addEmail = $("#addEmail").val();
                    var addCity = $("#addCity").val();
                    var addCountry = $("#addCountry").val();
                    var addAddress = $("#addAddress").val();

                    if (shipper_name == 'select') {
                        $.NotificationApp.send("Error!", "Select Field Required.", 'top-right', '#bf441d', 'error');
                    }else if (addName == '') {
                        $.NotificationApp.send("Error!", "Name Field Required.", 'top-right', '#bf441d', 'error');
                    }else if (addPhone == '') {
                        $.NotificationApp.send("Error!", "Phone Field Required.", 'top-right', '#bf441d', 'error');
                    }else if (addEmail == '') {
                        $.NotificationApp.send("Error!", "Email Field Required.", 'top-right', '#bf441d', 'error');
                    }else if (addCode == '') {
                        $.NotificationApp.send("Error!", "Code Field Required.", 'top-right', '#bf441d', 'error');
                    }else if (addCity == '') {
                        $.NotificationApp.send("Error!", "City Field Required.", 'top-right', '#bf441d', 'error');
                    }else if (addCountry == '') {
                        $.NotificationApp.send("Error!", "Country Field Required.", 'top-right', '#bf441d', 'error');
                    }else if (addAddress == '') {
                        $.NotificationApp.send("Error!", "Address Field Required.", 'top-right', '#bf441d', 'error');
                    }else{  
                        $.ajax({  
                            url:"manage-shippers.php",  
                            method:"POST",  
                            data: {
                                action: 'insertSubshipper',
                                addCode: $("#addCode").val(),
                                shipper_name: $("#shipper_name").val(),
                                addName: $("#addName").val(),
                                addPhone: $("#addPhone").val(),
                                addEmail: $("#addEmail").val(),
                                addCity: $("#addCity").val(),
                                addCountry: $("#addCountry").val(),
                                addAddress: $("#addAddress").val()
                            },  
                            success:function(response){
                                if(response == 'successfull'){
                                    $('#new_bill_form')[0].reset();
                                    $.NotificationApp.send("Success!", "New sub-shipper added.", 'top-right', '#5ba035', 'success');
                                }else{
                                    $.NotificationApp.send("Error!", ""+response+".", 'top-right', '#bf441d', 'error');
                                }
                            }  
                        });  
                    }  
                });

            });
        </script>



    </body>
</html>