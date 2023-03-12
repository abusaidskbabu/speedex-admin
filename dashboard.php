<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'include/header.php'; ?>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <?php 
                            $total_bill_amount = 0;
                            $total_payment_amount = 0;
                            $total_payment = 0;
                            $total_bill = 0;
                            $total_shippers = 0;
                            $total_employees = 0;
                            $Shippers = DB::table('shipers_details')->get(); 
                            $admin = DB::table('admin')->where('role', 0)->get(); 
                            $bill_details = DB::table('bill_details')->get(); 
                            $payments = DB::table('payments')->get(); 
                            foreach ($Shippers as $s) {
                               $total_shippers++;
                            }
                            foreach ($admin as $a) {
                               $total_employees++;
                            }
                            foreach ($bill_details as $bd) {
                               $total_bill++;
                               $total_bill_amount = $total_bill_amount + $bd->total_amount;
                            } 
                            foreach ($payments as $pm) {
                               $total_payment++;
                               $total_payment_amount = $total_payment_amount + $pm->TTL;
                            }
                            ?>
                            <div class="col-xl-3">
                                <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
                                    <div class="float-left">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                data-fgColor="#ffffff" data-bgcolor="rgba(255,255,255,0.2)" value="<?php echo $total_shippers; ?>" data-skin="tron" data-angleOffset="180"
                                                data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-one-content text-right">
                                        <h4 class="text-white mb-0 mt-2">Total Shippers</h4>
                                        <h3 class="text-white"><?php echo $total_shippers; ?></h3>
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
                            
                            <div class="col-xl-3">
                                <div class="card-box widget-chart-one gradient-warning bx-shadow-lg">
                                    <div class="float-left pt-4">
                                        <h3 class="text-white"><?php echo $total_bill; ?></h3>
                                    </div>
                                    <div class="widget-chart-one-content text-right">
                                        <h4 class="text-white mb-0 mt-2">Total Bill Amount</h4>
                                        <h3 class="text-white">$<?php echo $total_bill_amount; ?></h3>
                                    </div>
                                </div> <!-- end card-box-->
                            </div>

                            <div class="col-xl-3">
                                <div class="card-box widget-chart-one gradient-info bx-shadow-lg">
                                    <div class="float-left pt-4">
                                        <h3 class="text-white"><?php echo $total_payment; ?></h3>
                                    </div>
                                    <div class="widget-chart-one-content text-right">
                                        <h4 class="text-white mb-0 mt-2">Total Payment</h4>
                                        <h3 class="text-white">$<?php echo $total_payment_amount; ?></h3>
                                    </div>
                                </div> <!-- end card-box-->
                            </div>

                            <div class="col-xl-3">
                                <div class="card-box widget-chart-one gradient-default bx-shadow-lg">
                                    <div class="float-left">
                                        <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                data-fgColor="#ffffff" data-bgcolor="rgba(255,255,255,0.2)" value="<?php echo $total_employees; ?>" data-skin="tron" data-angleOffset="180"
                                                data-readOnly=true data-thickness=".1"/>
                                    </div>
                                    <div class="widget-chart-one-content text-right">
                                        <h4 class="text-white mb-0 mt-2">Total Employee</h4>
                                        <h3 class="text-white"><?php echo $total_employees; ?></h3>
                                    </div>
                                </div> <!-- end card-box-->
                            </div>
                            
                            <div class="col-xl-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Weekly Bill and Payments</h4>
                                    <div class="chartjs-chart conversion-chart">
                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>  <!-- end card-box-->
                            </div> <!-- end col -->

                            
                        </div>
                        <!-- end row -->
        
                    </div>
                </div>
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

        <!-- KNOB JS -->
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <!-- Chart JS -->
        <script src="assets/libs/chart.js/Chart.bundle.min.js"></script>

        <!-- Jvector map -->
        <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <!-- Datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Dashboard Init JS -->
        <script src="assets/js/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script>
            $(document).ready(function() {
                // Default Datatable
                $('#datatable').DataTable({
                    "pageLength": 5,
                    "searching": false,
                    "lengthChange": false
                });
            } );
        </script>

<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
            text: "Daily High Payments and Bill"
        },
        axisX: {
            valueFormatString: "DD MMM,YY"
        },
        axisY: {
            title: "Taka (in U.S.$)",
            includeZero: false,
            suffix: " U.S.$"
        },
        legend:{
            cursor: "pointer",
            fontSize: 16,
            itemclick: toggleDataSeries
        },
        toolTip:{
            shared: true
        },
        data: [{
            name: "Payment",
            type: "spline",
            yValueFormatString: "#0.## U.S.$",
            showInLegend: true,
            dataPoints: [
                <?php 
               
                    $lastWeek1 = date("Y-m-d", strtotime("-7 days"));
                    $lastWeek2 = date("Y-m-d", strtotime("-6 days"));
                    $lastWeek3 = date("Y-m-d", strtotime("-5 days"));
                    $lastWeek4 = date("Y-m-d", strtotime("-4 days"));
                    $lastWeek5 = date("Y-m-d", strtotime("-3 days"));
                    $lastWeek6 = date("Y-m-d", strtotime("-2 days"));
                    $lastWeek7 = date("Y-m-d", strtotime("-1 days"));
                    $lastWeek8 = date("Y-m-d");
                    
                    for ( $i = 1; $i < 8; $i++) {
                    $time=strtotime(${'lastWeek' .$i});
                    $month=date("n",$time);
                    $year=date("Y",$time);
                    $day=date("j",$time);
                    $payments_amount = 0;
                    $payments = DB::table('payments')->where('payment_date',${'lastWeek' .$i})->get();
                    foreach ($payments as $p) {
                       $payments_amount = $payments_amount + $p->TTL;
                    }

                ?>
                { x: new Date(<?php echo $year; ?>,<?php echo $month; ?>,<?php echo $day; ?>), y: <?php echo $payments_amount; ?> },
                    <?php } ?>
            ]
        },
        {
            name: "Bill",
            type: "spline",
            yValueFormatString: "#0.## U.S.$",
            showInLegend: true,
            dataPoints: [
            <?php 
                for ( $i = 1; $i < 8; $i++) {
                $time=strtotime(${'lastWeek' .$i});
                $month=date("n",$time);
                $year=date("Y",$time);
                $day=date("j",$time);

                $bill_amount = 0;
                $bills = DB::table('bill_details')->where('bill_date',${'lastWeek' .$i})->get();
                foreach ($bills as $b) {
                   $bill_amount = $bill_amount + $b->total_amount;
                }
            ?>
                { x: new Date(<?php echo $year; ?>,<?php echo $month; ?>,<?php echo $day; ?>), y: <?php echo $bill_amount; ?> },
                <?php } ?>   
            ]
        }]
    });
    chart.render();

    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }

    }
</script>

    </body>
</html>