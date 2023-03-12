<?php
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'include/header.php'; ?>
    <link href="assets/libs/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet" />
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
                                <li class="breadcrumb-item active">Employee Tables</li>
                            </ol>
                            <h4 class="page-title">Employee Tables</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-12">
                                <button id="add-employee" data-toggle="modal" data-target="#exampleModal" class="btn btn-success add-employee">Add Employee</button>
                                <div class="card-box">
                                    <h4 class="header-title">Employee Table</h4>
        
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table_body">
                                           
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

                function selectAllData(){
                    $.ajax({  
                        url:"selectAllEmployee.php",  
                        method:"POST",  
                        success:function(response){  
                            $('#table_body').html(response);  
                        }  
                    }); 
                }
                selectAllData();
                
               $('#insert_form').on("submit", function(event){  
                    event.preventDefault();
                    var addName = $("#addName").val();
                    var addPhone = $("#addPhone").val();
                    var addEmail = $("#addEmail").val();
                    var addAddress = $("#addAddress").val();
                   

                    if (addName == '') {
                        $("#error").html("Name Field Required");
                    }else if (addPhone == '') {
                        $("#error").html("Phone Field Required");
                    }else if (addEmail == '') {
                        $("#error").html("Email Field Required");
                    }else if (addAddress == '') {
                        $("#error").html("Address Field Required");
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: 'addEmployee.php',
                            data: {
                                
                                addName: $("#addName").val(),
                                addPhone: $("#addPhone").val(),
                                addEmail: $("#addEmail").val(),
                                addAddress: $("#addAddress").val()
                            },
                            success: function (response) {
                                if(response == 'successfull'){
                                    $('#insert_form')[0].reset();
                                    $('#exampleModal').modal('hide');
                                    selectAllData();
                                    $.NotificationApp.send("Success!", "Employee added successfully!.", 'top-right', '#5ba035', 'success');
                                }else{
                                    alert(response);
                                }
                                
                            }
                        });
                    }
                });

                $(document).on('click', '.edit_data', function(){  
                    var id = $(this).attr("id");  
                    $.ajax({  
                        url:"editUser.php",  
                        method:"POST",  
                        data:{id:id},  
                        dataType:"json",  
                        success:function(response){  
                             $('#fullName').val(response.fullName);  
                             $('#email').val(response.email);  
                             $('#phone').val(response.phone);
                             $('#city').val(response.address);   
                             $('#userId').val(id);
                             $('#edit_data_Modal').modal('show');  
                        }
                    });  
                }); 

                $('#update_insert_form').on("submit", function(event){  
                    event.preventDefault();

                    var fullName = $("#fullName").val();
                    var phone = $("#phone").val();
                    var email = $("#email").val();
                    var userId = $("#userId").val();

                    if($('#fullName').val() == ""){  
                        alert("Name is required");  
                    }  
                    else if($('#phone').val() == ''){  
                        alert("phone is required");  
                    }  
                    else if($('#email').val() == ''){  
                        alert("Email is required");  
                    }else{  
                        $.ajax({  
                            url:"userUpdate.php",  
                            method:"POST",  
                            data: {
                                fullName: $("#fullName").val(),
                                phone: $("#phone").val(),
                                email: $("#email").val(),
                                city: $("#city").val(),
                                userId: $("#userId").val()
                            },  
                              
                            success:function(response){
                                if(response == 'successfull'){
                                    $('#update_insert_form')[0].reset();
                                    $('#edit_data_Modal').modal('hide');
                                    selectAllData();
                                    $.NotificationApp.send("Success!", "Employee updated.", 'top-right', '#5ba035', 'success');
                                }else{
                                    alert(response);
                                }
                            }  
                        });  
                    }  
                });

                $(document).on('click', '.delete_btn', function(){  
                    var id = $(this).attr("id");
                    $('#delete_modal').modal('show');  
                    $(document).on('click', '.confirm_delete', function(){
                        $.ajax({  
                            url:"delete-employee.php",  
                            method:"POST",  
                            data:{id:id},    
                            success:function(response){  
                                if(response == 'successfull'){
                                    $('#delete_modal').modal('hide');
                                    selectAllData();
                                }else{
                                    alert(response);
                                } 
                            }  
                        });
                    });
                });     

            });
        </script>

    </body>
</html>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insert_form" method="POST" action="">
          <div class="form-group">
            <label for="" class="col-form-label">Employee Name:</label>
            <input type="text" class="form-control" id="addName" name="addName" required="">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="addEmail" name="addEmail" required="">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="addPhone" name="addPhone" required="">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="addAddress" name="addAddress" required="">
          </div>
          <button type="submit" class="btn btn-primary" id="submitAdd" >Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                    <form class="form contact-form" method="post" id="update_insert_form">
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <input class="form-control form-control-line" type="text" placeholder="Full Name" id="fullName" name="fullName" >
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <input class="form-control form-control-line" type="email" placeholder="Email" id="email" name="email" required="required">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <input class="form-control form-control-line" type="text" placeholder="Phone" id="phone" name="phone" required="required">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <input class="form-control form-control-line" type="text" placeholder="City" id="city" name="city" required="required">
                            </div>
                        </div>
                        <input type="hidden" name="userId" id="userId">
                        <div class="form-group">
                            <div class="col-sm-12 mt-4">
                                <button class="btn btn-primary btn-block" name="insert" id="insert" value="Insert" type="submit">Update Data</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> 

    <div class="modal fade bd-example-modal-sm" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Modal </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this data?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="confirm_delete" class="btn btn-primary confirm_delete">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>