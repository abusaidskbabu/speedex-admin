<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;  

$id = $_GET['shipper_code'];
$pay = DB::table('shippers')
->where('shipper_code', $id)
->first();  
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
                                <li class="breadcrumb-item active">Statement</li>
                            </ol>
                            <h4 class="page-title">Statement</h4>
                        </div>
                        <!-- End page title box -->
                        <div class="row" id="statement-form">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4  class="m-t-0 header-title">New Statement</h4>
                                    <div class="forms">
                                        <form action="" id="insert_form" method="post">
                                            <div class="form-group">
                                                <span id="error"></span>
                                                <table class="table table-bordered" id="item_table3">
                                                    <tr>
                                                       <th>Date</th>
                                                       <th>Particulars</th>
                                                       <th>Bill Amount</th>
                                                       <th>Paid Amount</th>
                                                       <th>Remarks</th>
                                                       <th><button type="button" name="item_add" class="btn btn-success btn-sm item_add"><i class="mdi mdi-plus-box"></i></button></th>
                                                    </tr>
                                                </table>
                                                <div align="center">
                                                   <input type="hidden" name="shipper_code" value="<?php echo $_GET['shipper_code']; ?>">
                                                   <input type="submit" name="submit[]" id="submit" class="btn btn-success submit" value="Insert" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <a  class="btn btn-primary" id="printBtn" >Print</a>
                                    <?php 
                                        $sip_od_sub = DB::table('shippers')
                                        ->where('shipper_code', $id)
                                        ->first();
                                        $name = $sip_od_sub->name;
                                        $city = $sip_od_sub->city;
                                        $country = $sip_od_sub->country;
                                        $address = $sip_od_sub->address;
                                    ?>
                                    <h4><?php echo $name; ?></h4>
                                    <h6><?php echo $address; ?></h6>
                                    <h6><?php echo $city; ?>, <?php echo $country; ?></h6>
                                    <table class="table table-bordered mb-0 " id="prindDiv">
                                        <h4 class="text text-center mb-0">Statement of Account</h4>
                                        <hr class="text text-center mt-0" style="width: 20%;">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Particulars</th>
                                            <th>Bill Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Balance</th>
                                            <th>Remarks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $shipper_id = $_GET['shipper_code'];
                                        $statements = DB::table('statements')
                                            ->where('shipper_code', $shipper_id)
                                            ->get(); 
                                        $balance = 0.00;
                                        $total_bill = 0;
                                        $total_paid = 0;
                                        foreach ($statements as $stm) { 
                                            $total_bill = $total_bill + $stm->bill_amount;
                                            $total_paid = $total_paid + $stm->paid_amount;
                                            $balance = $balance + ($stm->paid_amount - $stm->bill_amount);
                                        ?>
                                        <tr>
                                            <th><?php echo $stm->payment_date; ?></th>
                                            <td><?php echo $stm->particulars; ?></td>
                                            <td><?php 
                                            if($stm->bill_amount == 0){
                                                echo("");
                                            }else{
                                               echo $stm->bill_amount;  
                                            }
                                            
                                            ?></td>
                                            <td><?php 
                                            if ($stm->paid_amount == 0) {
                                                echo '';
                                            }else{
                                                echo $stm->paid_amount; 
                                            }
                                            
                                            ?></td>
                                            <td><?php 
                                            if (abs($balance) == 0) {
                                                echo "";
                                            }else if ($balance < 0) {
                                                echo abs(sprintf("%.2f", $balance)); 
                                            }else{
                                                echo abs(sprintf("%.2f", $balance)); echo ' (Advance)';
                                            }
                                             
                                            ?></td>
                                            <td><?php echo $stm->remarks; ?></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-12 mt-2">
                                        <?php include 'convert_number_to_word.php'; ?>
                                        <p class="m-0 p-0">Amount in word:  Taka <?php 
                                            $wbalance = abs($balance);
                                            $wnBalance = sprintf("%.2f", $wbalance);
                                            echo convertNumber($wnBalance); ?>
                                            Only </p>
                                        <p class="m-0 p-0">N.B. Please pay in cash / cheque/ pay order in favour of <b >GLOBAL NETWORK</b></p>
                                        <br>
                                        <br>
                                        <p class="m-0 p-0">Best regards</p>
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
                    window.location.href = 'statements.php?shipper_code=<?php echo $_GET['shipper_code']; ?>';
                    
                });

                var count =0;

                $(document).on('click', '.item_add', function(){
                    var html = '';
                    html += '<tr>';
                    html += '<td><input type="date" name="payment_date[]" id="payment_date" class="form-control payment_date" /></td>';
                    html += '<td><input type="text" name="particulars[]" id="particulars" class="form-control particulars" /></td>';
                    html += '<td><input type="text" name="bill_amount[]" id="bill_amount" class="form-control bill_amount" /></td>';
                    html += '<td><input type="test" name="paid_amount[]"  id="paid_amount" class="form-control paid_amount" /></td>';
                   html += '<td><input type="text" name="remarks[]" id="remarks" class="form-control remarks" /></td>';

                    html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="mdi mdi-close-box"></i></button></td></tr>';
                    $('#item_table3').append(html);
                    count++;
                });

                $(document).on('click', '.remove', function(){
                    $(this).closest('tr').remove();
                });

                $('#insert_form').on('submit',   function(event){
                    event.preventDefault();
                    var error = '';
                    count =0;

                $('.payment_date').each(function(){
                    var count = 1;
                    if($(this).val() == ''){
                        error += "<p>Enter Date at "+count+" Row</p>";
                        return false;
                    }
                    count = count + 1;
                });

                // $('.bill_amount').each(function(){
                //     var count = 1;
                //     if($(this).val() == ''){
                //         error += "<p>Enter Bill Amount at "+count+" Row</p>";
                //         return false;
                //     }
                //     count = count + 1;
                // });


                var form_data = $(this).serialize();
                if(error == ''){
                    $.ajax({
                        url:"process.php",
                        method:"POST",
                        data:form_data,
                        success:function(response)
                        {
                            if (response == "successfull") {
                               window.location.href = 'statements.php?shipper_code=<?php echo $_GET['shipper_code']; ?>';
                                $('#item_table3').find("tr:gt(0)").remove();
                            }else{
                                $('#error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Something Wrong.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            }
                            
                        }
                    });
                }else{
                    $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                }
            });
        });
        </script>

    </body>
</html>