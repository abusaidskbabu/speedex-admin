
<!DOCTYPE html>
<html lang="en">
    <?php include 'include/header.php'; ?>
    <!-- Toastr css -->
        <link href="assets/libs/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet" />
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />

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
                                <li class="breadcrumb-item active">Shippers Tables</li>
                            </ol>
                            <h4 class="page-title">Shippers Tables</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-12">
                                <button id="add-employee" data-toggle="modal" data-target="#exampleModal" class="btn btn-success add-employee">Add Shippers</button>
                                <div class="card-box">
                                    <h4 class="header-title">Shippers Table</h4>
        
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table_body">
                                           <?php 

                                            require __DIR__.'/vendor/autoload.php';

                                            use Illuminate\Database\Capsule\Manager as DB;


                                            $users = DB::table('shippers')->get(); 

                                            $count = 1;
                                            foreach ($users as $user ) { 
                                                 echo '<tr>
                                                        <th scope="row">'.$count.'</th>
                                                        <td>'.$user->shipper_code.'</td>
                                                        <td>'.$user->name.'</td>
                                                        <td>'.$user->email.'</td>
                                                        <td>'.$user->phone.'</td>
                                                        <td>'.$user->address.'</td>
                                                        <td>';
                                                        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                                                            echo '<button type="submit" class="btn btn-info edit_data" name="edit" value="Edit" id="'.$user->id.'"><i class="mdi mdi-transcribe"></i> Edit</button>';
                                                        }
                                                        echo '
                                                        </td>
                                                    </tr>';
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

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

        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/libs/bootstrap-select/js/bootstrap-select.min.js"></script>

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

        <!-- Toastr js -->
        <script src="assets/libs/jquery-toast-plugin/jquery.toast.min.js"></script>
        <script src="assets/js/jquery.toastr.js"></script>

        <!-- Init Js file -->
        <script src="assets/js/jquery.form-advanced.js"></script>


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

            $(function () {

                
                
               $('#insert_form').on("submit", function(event){  
                    event.preventDefault();
                    var addName = $("#addName").val();
                    var addPhone = $("#addPhone").val();
                    var addEmail = $("#addEmail").val();
                    var addAddress = $("#addAddress").val();
                    var addCode = $("#addCode").val();
                    var addCity = $("#addCity").val();
                    var addCountry = $("#addCountry").val();
                   

                    if (addName == '') {
                        $("#error").html("Name Field Required");
                    }else if (addPhone == '') {
                        $("#error").html("Phone Field Required");
                    }else if (addEmail == '') {
                        $("#error").html("Email Field Required");
                    }else if (addCode == '') {
                        $("#error").html("Code Field Required");
                    }else if (addCity == '') {
                        $("#error").html("City Field Required");
                    }else if (addCountry == '') {
                        $("#error").html("Country Field Required");
                    }else if (addAddress == '') {
                        $("#error").html("Address Field Required");
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: 'manage-shippers.php',
                            data: {
                                action: 'addNewShipper',
                                addName: $("#addName").val(),
                                addPhone: $("#addPhone").val(),
                                addEmail: $("#addEmail").val(),
                                addCode: $("#addCode").val(),
                                addCity: $("#addCity").val(),
                                addCountry: $("#addCountry").val(),
                                addAddress: $("#addAddress").val()
                            },
                            success: function (response) {
                                if(response == 'successfull'){
                                    $('#insert_form')[0].reset();
                                    $('#exampleModal').modal('hide');
                                    $.NotificationApp.send("Success!", "New shipper added.", 'top-right', '#5ba035', 'success');
                                    $("#datatable").load(" #datatable"); 
                                    $(".table").css('background-color', '#3F4759');
                                    setTimeout(function() {
                                        location.reload();
                                    }, 800);//
                                }else{
                                    $.NotificationApp.send("Error!", ""+response+".", 'top-right', '#bf441d', 'error');
                                }
                                
                            }
                        });
                    }
                });

                $(document).on('click', '.edit_data', function(){  
                    var id = $(this).attr("id");  
                    $.ajax({  
                        url:"manage-shippers.php",  
                        method:"POST",  
                        data:{action:'selectShipperDetails', id:id},  
                        dataType:"json",  
                        success:function(response){  
                             $('#Code').val(response.shipper_code);  
                             $('#Name').val(response.name);  
                             $('#Email').val(response.email);  
                             $('#Phone').val(response.phone);
                             $('#City').val(response.city);   
                             $('#Country').val(response.country);   
                             $('#Address').val(response.address);   
                             $('#userId').val(id);
                             $('#edit_data_Modal').modal('show');  
                        }
                    });  
                }); 

                $('#update_insert_form').on("submit", function(event){  
                    event.preventDefault();

                    var Code = $("#Code").val();
                    var Name = $("#Name").val();
                    var Phone = $("#Phone").val();
                    var Email = $("#Email").val();
                    var City = $("#City").val();
                    var Country = $("#Country").val();
                    var Address = $("#Address").val();
                    var userId = $("#userId").val();

                    if (Name == '') {
                        $("#error").html("Name Field Required");
                    }else if (Phone == '') {
                        $("#error").html("Phone Field Required");
                    }else if (Email == '') {
                        $("#error").html("Email Field Required");
                    }else if (Code == '') {
                        $("#error").html("Code Field Required");
                    }else if (City == '') {
                        $("#error").html("City Field Required");
                    }else if (Country == '') {
                        $("#error").html("Country Field Required");
                    }else if (Address == '') {
                        $("#error").html("Address Field Required");
                    }else{  
                        $.ajax({  
                            url:"manage-shippers.php",  
                            method:"POST",  
                            data: {
                                action: 'UpdateShipper',
                                Code: $("#Code").val(),
                                Name: $("#Name").val(),
                                Phone: $("#Phone").val(),
                                Email: $("#Email").val(),
                                City: $("#City").val(),
                                Country: $("#Country").val(),
                                Address: $("#Address").val(),
                                userId: $("#userId").val()
                            },  
                            success:function(response){
                                if(response == 'successfull'){
                                    $('#update_insert_form')[0].reset();
                                    $('#edit_data_Modal').modal('hide');
                                    $.NotificationApp.send("Success!", "Shipper details updated.", 'top-right', '#5ba035', 'success');
                                    $("#datatable").load(" #datatable"); 
                                    $(".table").css('background-color', '#3F4759');
                                    setTimeout(function() {
                                        location.reload();
                                    }, 800);//
                                }else{
                                    $.NotificationApp.send("Error!", ""+response+".", 'top-right', '#bf441d', 'error');
                                }
                            }  
                        });  
                    }  
                });

                $(document).on('click', '.view_subshipper', function(){  
                    var id = $(this).attr("id");
                    $.ajax({  
                        url:"manage-shippers.php",  
                        method:"POST",  
                        data:{action:'selectAllSubshipper', id:id},    
                        success:function(response){  
                                $('#subshipper_list_area').html(response);
                                $('#subshipper_list').modal('show'); 
                            
                        }  
                    });
                });     

            });
        </script>

    </body>
</html>
<div class="modal fade bs-example-modal-lg " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Shipper Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="row" id="insert_form" method="POST" action="">
          <div class="form-group col-md-6">
            <label for="" class="col-form-label">Shipper Name:</label>
            <input type="text" class="form-control" id="addName" name="addName" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="" class="col-form-label">Shipper Email:</label>
            <input type="email" class="form-control" id="addEmail" name="addEmail" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="" class="col-form-label">Shipper Phone:</label>
            <input type="text" class="form-control" id="addPhone" name="addPhone" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="" class="col-form-label">Shipper Code:</label>
            <input type="text" class="form-control" id="addCode" name="addCode" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="" class="col-form-label">Shipper City:</label>
            <input type="text" class="form-control" id="addCity" name="addCity" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="" class="col-form-label">Shipper Country:</label>
            <input type="text" class="form-control" id="addCountry" name="addCountry" required="">
          </div>
          <div class="form-group col-md-12">
            <label for="" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="addAddress" name="addAddress" required="">
          </div>
          <div class="form-group col-md-12">
              <button type="submit" class="btn btn-primary " id="submitAdd" >Submit</button>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="edit_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="updateError">
                    
                </div>
                <div class="modal-body">
                    
                    <form class="row" id="update_insert_form" method="POST" action="">
                      <div class="form-group col-md-6">
                        <label for="" class="col-form-label">Shipper Name:</label>
                        <input type="text" class="form-control" id="Name" name="Name" readonly="" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="" class="col-form-label">Shipper Email:</label>
                        <input type="email" class="form-control" id="Email" name="Email" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="" class="col-form-label">Shipper Phone:</label>
                        <input type="text" class="form-control" id="Phone" name="Phone" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="" class="col-form-label">Shipper Code:</label>
                        <input type="text" class="form-control" id="Code" name="Code" required="" readonly="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="" class="col-form-label">Shipper City:</label>
                        <input type="text" class="form-control" id="City" name="City" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="" class="col-form-label">Shipper Country:</label>
                        <input type="text" class="form-control" id="Country" name="Country" required="">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="" class="col-form-label">Address:</label>
                        <input type="text" class="form-control" id="Address" name="Address" required="">
                      </div>
                      <input type="hidden" name="userId" id="userId">
                      <div class="form-group col-md-12">
                          <button class="btn btn-primary btn-block" name="insert" id="insert" value="Insert" type="submit">Update Data</button>
                      </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> 


<div class="modal fade bd-example-modal-sm" id="subshipper_list" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sub-shipper list Modal </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="subshipper_list_area">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>