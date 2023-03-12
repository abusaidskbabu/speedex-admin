<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;    
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Bill List</li>
                            </ol>
                            <h4 class="page-title">Bill List</h4>
                        </div>
                        <!-- End page title box -->
                    <form action="" method="POST" >
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <table id="datatable" class="table table-bordered dt-responsive ">
                                        <thead>
                                            <tr>
                                                <th>S/L</th>
                                                <th>Tracking No</th>
                                                <th>Bill Date</th>
                                                <th>Shiper</th>
                                                <th>Consignee</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
        
                                        <tbody id="table_body">
                                            <?php 
                                            $count = 1;
                                            $bill_details = DB::table('bill_details')
                                            ->join('shipers_details', 'shipers_details.tracking_no', '=', 'bill_details.tracking_no')
                                             ->orderByRaw('bill_details.bill_date DESC')
                                            ->get(); 
                                            foreach ($bill_details as $bill ) { 
                                                $shipper = $bill->shipper_id;
                                                if ($bill->shipper_id != 0) {
                                                    $shipper = DB::table('shippers')
                                                    ->where('shipper_code', $shipper)
                                                    ->first(); 
                                                }else{
                                                    $shipper = 0;
                                                }
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td>#<?php echo $bill->tracking_no; ?></td>
                                                <td><?php echo $bill->bill_date; ?></td>
                                                <td>
                                                    <?php 
                                                       echo $bill->shipper_id; 
                                                    ?> 
                                                </td>
                                                <td><?php echo $bill->consignee; ?></td>
                                                <td><?php echo $bill->total_charge; ?></td>
                                                <td> 
                                                    <a class="btn btn-info" href="view-bill-details.php?tracking_no=<?php echo $bill->tracking_no; ?>&bn=<?php echo $bill->bill_id; ?>">View</a>
                                                    <a class="btn btn-primary" href="update-bill-details.php?tracking_no=<?php echo $bill->tracking_no; ?>">Edit</a>  
                                                </td>
                                            </tr>
                                            <?php $count++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--<div class="col-12">-->
                            <!--    <input type="submit" name="print" class="btn btn-success" value="Print All Selected Bill">-->
                            <!--</div>-->
                        </div>

                    </form>
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

        <!-- Datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
        <!-- Key Tables -->
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <!-- Selection table -->
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable({
                    keys: true
                });

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'print']
                });

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

                
            } );

        </script>

    </body>
</html>