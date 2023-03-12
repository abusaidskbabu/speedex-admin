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
                                <li class="breadcrumb-item active">Shipment List</li>
                            </ol>
                            <h4 class="page-title">Shipment List</h4>
                        </div>
                        <!-- End page title box -->
        
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    
                                    <table id="datatable" class="table table-bordered dt-responsive" style="width: auto !important;">
                                        <thead>
                                            <tr>
                                                <th>S/L</th>
                                                <th>Date</th>
                                                <th>Tracking No</th>
                                                <th>Shipper</th>
                                                <th>Consignee</th>
                                                <th></th>
                                            </tr>
                                        </thead>
        
                                        <tbody id="table_body">
                                            <?php 
                                            $shipers_details = DB::table('shipers_details')
                                            ->orderByRaw('id DESC')
                                            ->get(); 
                                            $count = 1;
                                            foreach ($shipers_details as $shiper ) { 
                                                $shipper_id = $shiper->shipper_id;
                                               
                                                $shipper = DB::table('shippers')
                                                ->where('shipper_code', $shipper_id)
                                                ->first(); 
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $shiper->date; ?></td>
                                                <td><?php echo $shiper->tracking_no; ?></td>
                                                <td>
                                                    <?php if ($shipper) {
                                                        echo $shipper->name;
                                                    }
                                                    ?> 
                                                </td>
                                                <td><?php echo $shiper->consignee; ?></td>
                                                <!--<td ><P class="text-danger"><?php echo $shiper->remarks; ?></P></td>-->
                                                <td>
                                                    <a class="btn btn-primary" href="view-shipper.php?tracking_no=<?php echo $shiper->tracking_no; ?>">View</a>
                                                    <a class="btn btn-info" href="edit-shipment.php?tracking_no=<?php echo $shiper->tracking_no; ?>">Edit</a>
                                                </td>
                                            </tr>
                                            <?php $count++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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