<?php 
    $tracking_no = $_GET['tracking_no'];

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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Shipper</a></li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                            <h4 class="page-title">View Shipper Details</h4>
                        </div>
                        <!-- End page title box -->

        
                        <div class="row">
                            

                            <div class="col-lg-12" id="billDetails" style="">
                                <div class="card-box">
                                    <div class="clearfix">
                                        <div class="text-center">
                                            <h4 class="m-0 d-print-none pb-4">Shipper Details</h4>
                                        </div>
                                    </div>
                                    <form class="row" action="" id="bill_details_form" method="post">
                                        <input type="hidden" name="tracking_number" id="tNo" value="<?php echo  $tracking_no; ?>">
                                        <div class="error col-md-12" id="error2">
                                        
                                        </div>
                                        <div class="col-md-6 pr-0 h-100 border-right">
                                            <div class=" border-top">
                                                <p class="m-0"><strong>Tracking No : </strong> <span class="" id="tracking_no">  </span></p>
                                                <p class="m-0"><strong>Date : </strong> <span class="" id="date"></span></p>
                                            </div>
                                            <table class="border-top w-100 ">
                                                <tr class="border-bottom ">
                                                    <td class="">
                                                        <h5 class="">Shipper Name:</h5>
                                                        <h6 class="" id="shipper_name"></h6>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="">
                                                        <h5 class="">Shipper Address:</h5>
                                                        <h6 class="" id="shipper_address"></h6>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="w-50"> 
                                                        <h5 class="border-bottom ">City</h5>
                                                        <p id="city"></p>
                                                    </td>
                                                    <td class="border-left">
                                                        <h5 class="border-bottom">Country</h5>
                                                        <p id="country"></p>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="">
                                                        <h5 class="">Description</h5>
                                                        <p id="description"> </p>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="w-50"> 
                                                        <h5 class="border-bottom ">Pieces</h5>
                                                        <p id="pieces"></p>
                                                    </td>
                                                    <td class="border-left">
                                                        <h5 class="border-bottom">Weight</h5>
                                                        <p id="weight"></p>
                                                    </td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        <div class="col-md-6  pl-0 h-100">
                                            <div class=" border-top pl-1">
                                                <p class="m-0"><strong>Reference No : </strong> <span class="" id="reference_no">  </span></p>
                                                <p class="m-0"><strong>Date : </strong> <span class="" id="date2">  </span></p>
                                            </div>
                                            <table class="border-top w-100 ">
                                                <tr class="border-bottom ">
                                                    <td class="pl-1">
                                                        <h5 class="">Consinee:</h5>
                                                        <h6 class="" id="consinee_name"></h6>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1">
                                                        <h5 class="">Consinee Address:</h5>
                                                        <h6 class="" id="consinee_address"></h6>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class=""> 
                                                        <h5 class="border-bottom pl-1">City</h5>
                                                        <p id="consinee_city" class="pl-1"></p>
                                                    </td>
                                                    <td class="border-left ">
                                                        <h5 class="border-bottom pl-1">Country</h5>
                                                        <p id="consinee_country" class="pl-1"></p>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class=""> 
                                                        <h5 class="border-bottom pl-1">Dox / Spx</h5>
                                                        <p id="destination" class="pl-1"></p>
                                                    </td>
                                                    <td class="border-left ">
                                                        <h5 class="border-bottom pl-1">Via</h5>
                                                        <p id="via" class="pl-1"></p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class=" pl-1">
                                                <h5 class="">Remarks</h5>
                                                <input type="text" name="remarks" id="remarks"  class="form-control text-danger " required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <input type="hidden" name="tn" id="tn" value="">
                                            <input type="hidden" name="action" value="updateShiper">
                                            <button type="submit" class="btn btn-success">Update</button>
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

        <!-- <script type="text/javascript" src="package/numeral.js"></script> -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
                
                var tracking_no = $('#tNo').val();

                function selectShipperDetails(parametar){
                    var parametar = parametar;
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {action: "selectShipper",parametar:parametar},
                        dataType:"json",
                        success: function (response) {
                            if (response != null) {
                                $('#tracking_no').html(response.tracking_no);
                                $('#tn').val(response.tracking_no);
                                $('#date').html(response.date);
                                $('#pieces').html(response.pieces);
                                $('#weight').html(response.weight);
                                $('#description').html(response.descriptions);

                                $('#shipper_name').html(response.name);
                                $('#shipper_address').html(response.address);
                                $('#city').html(response.city);
                                $('#country').html(response.country);
                                
                                $('#consinee_name').html(response.consignee);
                                $('#consinee_address').html(response.consigneeAddress);
                                $('#consinee_country').html(response.consignee_country);
                                $('#consinee_city').html(response.consignee_city);
                                $('#reference_no').html(response.reference_no);
                                $('#date2').html(response.date);
                                $('#destination').html(response.dox_spx);
                                $('#via').html(response.via);

                                $('#remarks').val(response.remarks);  
                                
                            }
                        }
                    });

                }
                selectShipperDetails(tracking_no);

                $('#bill_details_form').on("submit", function(event){  
                event.preventDefault();
                    $.ajax({  
                        url:"process.php",  
                        method:"POST",  
                        data: $('#bill_details_form').serialize(),
                        success:function(response){
                            if(response == 'successfull'){

                                $("#error2").html('<div class="alert alert-primary alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Successfully Updated Your Information</div>');
                                selectShipperDetails(tracking_no);
                            }else{
                                alert(response);
                            }
                        }  
                    });  
                });
            });
        </script>



    </body>
</html>