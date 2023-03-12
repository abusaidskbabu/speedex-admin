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
                                <li class="breadcrumb-item active">Password</li>
                            </ol>
                            <h4 class="page-title">Change Password</h4>
                        </div>
                        <!-- End page title box -->

        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <form class="row" action="" id="new_bill_form" method="post">
                                        <div class="form-group col-md-3"></div>
                                        <div class="error col-md-6" id="error"></div>
                                        <div class="form-group col-md-3"></div>
                                        <div class="form-group col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="text" name="curPass" id="curPass" class="form-control"  placeholder="Enter your current password" required/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="newPass" id="newPass" class="form-control"  placeholder="Enter new password" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Re-Enter New Password</label>
                                                <input type="password" name="renewPass" id="renewPass" class="form-control"  placeholder="Enter new password again" required/>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3"></div>
                                        <div class="form-group col-md-3"></div>
                                        <div class="form-group col-md-6">
                                            <input type="hidden" name="action" id="action" value="changePassword" >
                                            <div>
                                                <button type="submit" name="changePassword" id="changePassword" class="btn btn-primary waves-effect waves-light">
                                                    Change
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

                $('#renewPass').on('keyup', function () {
                    if ($('#newPass').val() == $('#renewPass').val()) {
                        $('#error').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Password match.</div>');
                        $('#changePassword').prop('disabled', false);
                    } else {
                        $('#error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Password not match.</div>');
                        $('#changePassword').prop('disabled', true);
                    }
                });

                $(function () {
                    $('#changePassword').on("click", function(event){  
                        event.preventDefault();
                        var curPass = $("#curPass").val();
                        var newPass = $("#newPass").val();
                        var renewPass = $("#renewPass").val();

                        if (curPass == '') {
                            $("#error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Current password required!</div>');
                        }else if (newPass == '') {
                            $("#error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>New password required!</div>');
                        }else if (renewPass == '') {
                            $("#error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Re-Enter password required!</div>');
                        }else{
                            $.ajax({
                                type: 'POST',
                                url: 'process.php',
                                data:$('#new_bill_form').serialize(),
                                success: function (response) {
                                    if(response == 'successfull'){
                                        $('#new_bill_form')[0].reset();
                                        $('#error').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Password Changed Successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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