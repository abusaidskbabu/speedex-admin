<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;    
$tracking_no = $_GET['tracking_no'];
$bill_id = $_GET['bn'];
$bill_details = DB::table('bill_details')
    ->join('shipers_details', 'bill_details.tracking_no', '=', 'shipers_details.tracking_no')
    ->where(['bill_details.tracking_no'=>$tracking_no],['bill_details.id'=>$bill_id])
    ->first(); 


?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'include/header.php'; 
    
    ?>

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
                                <li class="breadcrumb-item active">Bill Details</li>
                            </ol>
                            <h4 class="page-title">Bill Details</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            
                            <div class="col-lg-12" id="prindDiv" style="">
                                <button class="btn btn-primary" id="printBtn">Print</button>
                                <div class="card-box">
                                    <div class="clearfix row">
                                        <div class="col-md-6">
                                            <h1>Global Network</h1>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <img src="assets/images/speed2.png" style="height: 59px;">
                                        </div>
                                        <p class="col-md-12">50/1 Purana Paltan Line(2nd FL.), Dhaka-1000., Tel : 88-02-58312732, 9352103, E-mail : khorshed.alam545@gmail.com</p>
                                    </div>
                                    <form class="row border-bottom" action="" id="bill_details_form" method="post">
                                        <div class="col-md-6 pr-0 h-100 row">
                                            <div class="col-md-12 border-top">
                                                <p class="m-0"><strong>Way Bill No : <?php echo $bill_details->tracking_no; ?></strong> <span class="" id="order_no">  </span></p>
                                                <p class="m-0"><strong>Date : <?php echo date_format(date_create($bill_details->date), "d-m-Y"); ?></strong> <span class="" id="order_date"></span></p>
                                            </div>
                                            <div class="col-md-12 border-top " style="height: 190px;">
                                                <h5 class="">Consignor:</h5>
                                                <?php 
                                                    $bill_details2 = DB::table('shipers_details')
                                                    ->join('shippers', 'shippers.shipper_code', '=', 'shipers_details.shipper_id')
                                                    ->where('tracking_no',$tracking_no)
                                                    ->first();
                                                    echo '
                                                    <p class="p-0 m-0">'.$bill_details2->name.'</p>
                                                    <p class="p-0 m-0">'.$bill_details2->address.'</p> 
                                                    <p class="p-0 m-0">'.$bill_details2->city.', '.$bill_details2->country.'</p>';
                                                ?>
                                            </div>
                                            <table class="border-top border-bottom col-md-12" style="margin-top: 4.5px;">
                                                <tbody class="col-md-12">
                                                    <tr class="row border-bottom">
                                                        <td class="border-right col-md-4 text-center">
                                                            <h5>Description</h5>
                                                        </td>
                                                        <td class="border-right col-md-4 text-center">
                                                            <h5 class="">Pieces</h5>
                                                        </td>
                                                        <td class=" col-md-4 text-center">
                                                            <h5 class="">Weight</h5>
                                                        </td>
                                                    </tr>
                                                    <tr class="row" style="margin-right: 0px; margin-left: 0px;">
                                                        <td class="border-right col-md-4 text-center">
                                                            <h5 class=""><?php echo $bill_details->bill_descriptions; ?></h5>
                                                        </td>
                                                        <td class="border-right col-md-4 text-center"> 
                                                            <h5><?php echo $bill_details->bill_pieces; ?></h5>
                                                        </td>
                                                        <td class="col-md-4 text-center">
                                                            <h5><?php echo $bill_details->bill_weight; ?></h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6 border-left pl-0 h-100">
                                            <div class=" border-top pl-1">
                                                <p class="m-0 float-left"><strong>Bill No : </strong> <span class="" id="order_no2">  </span> <?php echo $bill_details->bill_id; ?></p>
                                                <p class="m-0 text-center"><strong>Date : </strong> <span class="" id="order_date2">  </span><?php echo date_format(date_create($bill_details->bill_date), "d-m-Y"); ?></p>
                                                <p class="m-0 "><b>Document/Parcels</b></p>
                                            </div>
                                            <table class="border-top w-100 ">
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>Rate Per 500gms USD : </h5></td>
                                                    <td><p class="p-0 m-0">$<?php echo $bill_details->rate_per_gm; ?></p></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>Total Wt. Charge USD : </h5></td>
                                                    <td><p class="p-0 m-0">$<?php echo $bill_details->total_wt_charge; ?></p></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>(i) Doct: </h5></td>
                                                    <td><p class="p-0 m-0">$<?php echo $bill_details->doct; ?></p></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>Service Charge USD : </h5></td>
                                                    <td><p class="p-0 m-0">$<?php echo $bill_details->service_charge; ?></p></td>
                                                </tr>
                                                <tr class="border-bottom ">
                                                    <td class="pl-1"><h5>(ii) Sample: </h5></td>
                                                    <td><p class="p-0 m-0">$<?php echo $bill_details->sample; ?></p></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="pl-1"><h5>Total Charge USD : </h5></td>
                                                    <td><p class="p-0 m-0">$<?php echo $bill_details->total_charge; ?></p></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="pl-1"><h5>Total Taka : </h5></td>
                                                    <td><p class="p-0 m-0"><?php 
                                                    if ($bill_details->total_amount == 0 ) {
                                                        echo "";
                                                    }else{
                                                        echo "$";
                                                        echo $bill_details->total_amount;  
                                                    }
                                                    ?></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6 " style="height: 150px;">
                                            <h5 class="">Consignee</h5>
                                            <p class="m-0" id="consignee"><?php echo $bill_details->consignee; ?></p>
                                            <p class="m-0" id=""><?php echo $bill_details->consigneeAddress; ?></p>
                                            <p class="m-0" id=""><?php echo $bill_details->consignee_city; ?>, <?php echo $bill_details->consignee_country; ?></p>
                                        </div>
                                         <div class="col-md-6 border-left">
                                            <h5 class="">Taka In Word</h5>
                                            <p class=""><?php echo $bill_details->taka_in_word; ?></p>
                                        </div>
                                    </form>
                                    <div class="col-md-12">
                                        <h5 class="text-center">CREDIT TERMS : 7DAYS</h5>
                                        <hr class="text text-center mt-0" style="width: 20%;">
                                        <p class="text-center p-0 m-0">Only the company's official recept will be recognised as conclusive proof of payment.</p>
                                        <p class="text-center">Please pay in Cash/ChaquePay Order in favour of <strong>Global Network</strong></p>
                                    </div>
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


           

        </div>
        <!-- End #wrapper -->

        <!-- jQuery  -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#printBtn').on("click", function(){ 
                    $('#printBtn').css('display', 'none');
                    window.print('#prindDiv');
                    window.location.href = 'view-bill-details.php?tracking_no=<?php echo $_GET['tracking_no']; ?>&bn=<?php echo $_GET['bn']; ?>';
                    // window.location.href('statements.php');
                });
            });
        </script>

    </body>
</html>