<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;  

$shipper_details = DB::table('shippers')->distinct()->get();
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                                <li class="breadcrumb-item active"> Statement</li>
                            </ol>
                            <h4 class="page-title">Search Statement</h4>
                        </div>
                        <!-- End page title box -->
                        <div class="row" id="statement_form">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4  class="m-t-0 header-title">Search Statement</h4>
                                    <div class="forms">
                                        <form class="row" action="" id="new_payment_form" method="post">
                                            <div class="error col-md-12" id="error">
                                            
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Shipper</label>
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
                                        </form>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <div class="row" id="printBtnArea">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary" id="printBtn" >Print</a>
                            </div>
                        </div>
                        <div class="row" id="filter_result">
                            
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
                $('#printBtnArea').hide();
                $('#printBtn').on("click", function(){ 
                    $('#printBtn').css('display', 'none');
                    $('#statement_form').css('display', 'none');
                    $('#header-title').css('display', 'none');
                    window.print('#filter_result');
                });

               
                $('#filter').on("click", function(event){  
                        event.preventDefault();

                    var shipper_name = $("#shipper_name").val();
                    var date1 = $("#date1").val();
                    var date2 = $("#date2").val();
                    var action = 'filterStatement';
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {shipper_name:shipper_name, date1:date1, date2:date2, action:action},
                        success:function(response){
                            if (response != '') {
                                $('#printBtnArea').show();
                                $('#filter_result').show();
                                $('#filter_result').html(response);
                            }else{
                                $('#submitArea').hide();
                            }
                            
                        }
                    });
                });
            });
        </script>

    </body>
</html>