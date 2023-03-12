<?php 
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
                                <li class="breadcrumb-item active">New Bill</li>
                            </ol>
                            <h4 class="page-title">Insert New Bill</h4>
                        </div>
                        <!-- End page title box -->

        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <form class="row" action="" id="new_bill_form" method="post">
                                        <div class="error col-md-12" id="error">
                                        
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Bill Serial No</label>
                                            <input type="number" min="0" name="serial_no" id="serial_no" class="form-control" required placeholder="Serial No"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Bill Date</label>
                                            <input type="Date" name="bill_date" id="bill_date" class="form-control" required placeholder="Bill Date"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Pieces</label>
                                            <input type="number" min="0" name="pieces" id="pieces" class="form-control" required placeholder="Pieces"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Weight</label>
                                            <input data-parsley-type="number" type="text"  name="weight" id="weight" class="form-control" required placeholder="Weight"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Description</label>
                                            <input type="text"  name="description" id="description" class="form-control" required placeholder="Description"/>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Consignor</label>
                                                <input type="text"   name="consignor" id="consignor" class="form-control" required placeholder="Consignor"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Consignor Address</label>
                                                <textarea  name="consignorAddress" id="consignorAddress" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Consignee</label>
                                                <input type="text"   name="consignee" id="consignee" class="form-control" required placeholder="Consignee"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Consignee Address</label>
                                                <textarea  name="consigneeAddress" id="consigneeAddress" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Remarks</label>
                                            <input type="text"  name="remarks" id="remarks" class="form-control" placeholder="Remarks"/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="hidden" name="action" id="action" value="newBill" >
                                            <div>
                                                <button type="submit" name="newBill" id="newBill" class="btn btn-primary waves-effect waves-light">
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

        <!-- Parsley js -->
        <script type="text/javascript" src="assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();

                $(function () {
                    $('#newBill').on("click", function(event){  
                        event.preventDefault();
                        var serial_no = $("#serial_no").val();
                        var bill_date = $("#bill_date").val();
                        var pieces = $("#pieces").val();
                        var weight = $("#weight").val();
                        var description = $("#description").val();
                        var consignor = $("#consignor").val();
                        var consignee = $("#consignee").val();
                       

                        if (serial_no == '') {
                            $("#error").html("Serial No Field Required");
                        }else if (bill_date == '') {
                            $("#error").html("Date Field Required");
                        }else if (pieces == '') {
                            $("#error").html("Pieces Field Required");
                        }else if (weight == '') {
                            $("#error").html("weight Field Required");
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: 'process.php',
                                data:$('#new_bill_form').serialize(),
                                success: function (response) {
                                    if(response == 'successfull'){
                                        $('#new_bill_form')[0].reset();
                                        $('#error').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> New Bill Inserted Successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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