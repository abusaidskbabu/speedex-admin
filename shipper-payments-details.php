<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;    
?>
<!DOCTYPE html>
<html lang="en">
    <style type="text/css">
        table th, table td{
            padding: 1px;
        }
    </style>
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
                                <li class="breadcrumb-item active">Payment</li>
                            </ol>
                            <h4 class="page-title">Details</h4>
                        </div>
                        <?php 
                        $id = $_GET['detail_no'];
                        $bill_payment = DB::table('payments')
                        ->where('payments.u_id', $id)
                        ->get(); 
                        foreach ($bill_payment as $pay) { 
                        ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 id="header-title" class="m-t-0 header-title">Payment Details</h4>
                                    <a  class="btn btn-primary" id="printBtn" >Print</a>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php $shippers = DB::table('shippers')
                                                ->where('shippers.shipper_code', $pay->shipper_id)
                                                ->first();  ?>
                                            <h4><?php echo $shippers->name; ?></h4>
                                            <p class="m-0"><?php echo $shippers->address; ?></p>
                                            <p class="m-0"><?php echo $shippers->city; ?>, <?php echo $shippers->country; ?></p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h6>Date: <?php echo date('d-m-Y') ?></h6>
                                            <h6><?php echo $pay->u_id; ?></h6>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-bordered mb-0 " id="prindDiv">
                                                <thead>
                                                <tr>
                                                    <th>S/L</th>
                                                    <th>Date</th>
                                                    <th>Awb #</th>
                                                    <th>Destination</th>
                                                    <th>Dox / Spx</th>
                                                    <th>Weight</th>
                                                    <th>Amount U.S.$</th>
                                                    <th>Remarks</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $count= 1;
                                                    $payment = DB::table('payment_details')
                                                    ->where('u_id', $id)
                                                    ->get(); 
                                                    foreach ($payment as $p) { 
                                                    ?>
                                                    <tr>
                                                      <td class="pt-1 pb-1"><?php echo $count; ?></td>  
                                                      <td class="pt-1 pb-1"><?php echo $p->date; ?></td>  
                                                      <td class="pt-1 pb-1"><?php echo $p->awb; ?></td>  
                                                      <td class="pt-1 pb-1"><?php echo $p->dest; ?></td>  
                                                      <td class="pt-1 pb-1"><?php echo $p->dox_spx; ?></td>  
                                                      <td class="pt-1 pb-1"><?php echo $p->weight; ?></td>  
                                                      <td class="pt-1 pb-1 text-right"><?php echo $p->charge; ?></td>  
                                                      <td class="pt-1 pb-1"><?php echo $p->remarks; ?></td>  
                                                    </tr>
                                                    <?php $count++; } ?>
                                                    <tr>
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                    </tr>
                                                    <tr class="text-right">
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td ></td>
                                                      <td class="pt-1 pb-1" colspan="2">Total U.S.$ =</td> 
                                                      <td class="pt-1 pb-1"><?php echo $pay->total; ?></td> 
                                                      <td ></td>
                                                    </tr>
                                                    <tr class="text-right">
                                                      <td></td>  
                                                      <td></td>  
                                                      <td scope="row"></td> 
                                                      <td class="pt-1 pb-1" colspan="3">Fuel Sur Charge @ <?php echo $pay->fuelCharge; ?>% =</td>   
                                                      <td class="pt-1 pb-1"><?php echo $pay->afterFuelCharge; ?></td> 
                                                      <td ></td>  
                                                    </tr>
                                                    <tr class="text-right">
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td> 
                                                      <td class="pt-1 pb-1" colspan="2">TTL U.S.$ =</td>  
                                                      <td class="pt-1 pb-1"><?php echo $pay->TTL; ?></td>  
                                                      <td></td>  
                                                    </tr>
                                                    <!-- <tr class="text-right">
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td class="pt-1 pb-1" colspan="2">USD Rate =</td>  
                                                      <td class="pt-1 pb-1"><?php echo $pay->usd_rate; ?></td>  
                                                      <td></td>  
                                                    </tr> -->
                                                    <tr class="text-right">
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td></td>  
                                                      <td class="pt-1 pb-1">BD TK =</td>  
                                                      <td class="pt-1 pb-1"><?php echo $pay->bdt; ?></td>  
                                                      <td></td>  
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <p class="m-0 p-0">Amount in word</p>
                                            <?php include 'convert_number_to_word.php'; ?>
                                            <p class="m-0 p-0">( Taka <?php echo convertNumber($pay->bdt); ?> only )</p>
                                            <p class="m-0 p-0">N.B. Please pay in cash / cheque/ pay order in favour of <b >GLOBAL NETWORK</b></p>
                                            <br>
                                            <br>
                                            <p class="m-0 p-0">Best regards</p>
                                        </div>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                           
                        </div>
                        <?php } ?>
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#printBtn').on("click", function(){ 
                    $('#printBtn').css('display', 'none');
                    $('#statement-form').css('display', 'none');
                    $('#header-title').css('display', 'none');
                    window.print('#prindDiv');
                    window.location.href = 'shipper-payments-details.php?detail_no=<?php echo $_GET['detail_no']; ?>';
                    // window.location.href('statements.php');
                });
            });
        </script>

    </body>
</html>