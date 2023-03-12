<?php include 'include/session-start.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Speedex - Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/speed2.png">

        <!-- Icons css -->
        <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/dripicons/webfont/webfont.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <!-- build:css -->
        <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
        <!-- endbuild -->

    </head>

    <body class="bg-account-pages">

        <!-- Login -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">

                                    <!-- Logo box-->
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.php" class="text-success">
                                                <span><img src="assets/images/speed2.png" alt="" height="70"></span>
                                            </a>
                                        </h2>
                                    </div>

                                    <div class="account-content">
                                        <div id="error" class="text text-center text-danger">
                                            
                                        </div>
                                        <form action="" method="POST">
                                            <div class="form-group mb-3">
                                            	<label>E-Mail</label>
	                                            <div>
	                                                <input type="email" class="form-control" name="email" id="email"required
	                                                parsley-type="email" placeholder="Enter a valid e-mail"/>
	                                            </div>
                                        	</div>

                                            <div class="form-group mb-3">
                                                <label for="password" class="font-weight-medium">Password</label>
                                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                            </div>

                                            <div class="form-group  mb-3">
                                                <div class="checkbox checkbox-info">
                                                    <a href="forgot-password.php">Forgot Password</a>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="checkbox checkbox-info">
                                                    <input id="remember" type="checkbox">
                                                    <label for="remember">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group row text-center">
                                                <div class="col-12">
                                                	<input type="submit" name="adminLogin" class="btn btn-block btn-success waves-effect waves-light" value="Sign In">
                                                </div>
                                            </div>
                                        </form> <!-- end form -->
                                    </div> <!-- end account-content -->

                                </div> <!-- end account-box -->
                            </div>
                            <!-- end account-page-->
                        </div>
                        <!-- end wrapper-page -->

                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- END HOME -->    


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
            });
        </script>

        <script>
              $(function () {

                $('form').on('submit', function (e) {
                    e.preventDefault();
                    var Email = $("#email").val();
                    var Pass = $("#password").val();

                    function isValidEmailAddress(Email) {
                        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
                        return pattern.test(Email);
                    }
                    if (Email == '') {
                        $("#error").html("EmaiL Field Required");
                    }else if (!isValidEmailAddress(Email) ) {
                        $("#error").html("EmaiL Is Not Valid");
                    }else if (password == '') {
                        $("#error").html("Password Field Required");
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: 'loginCheck.php',
                            data: {
                                email: $("#email").val(),
                                password: $("#password").val()
                            },
                            success: function (response) {
                                if(response == 'successfull'){
                                    window.location.replace("dashboard.php");
                                }else if (response == 'login') {
                                    window.location.replace("dashboard.php");
                                }else{
                                     $("#error").html(response);
                                }
                                
                            }
                        });
                    }
                
                });

              });
        </script>

    </body>
</html>


