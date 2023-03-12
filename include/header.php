<?php 
include 'include/session-start.php'; 
    if (!isset($_SESSION['loggedin'])) {
       echo '<script>window.location="page-error.php"</script>';
    }
require __DIR__.'/../vendor/autoload.php';

    use Illuminate\Database\Capsule\Manager as DB;

    $user_email = $_SESSION["email"];

    $user = DB::table('admin')->select('fullName','role')->where('email',$user_email)->first();
    $_SESSION['role'] = $user->role;
?>
<head>
    <meta charset="utf-8" />
    <title>Speedex - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/speed2.png">

    <!-- jvectormap -->
    <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>

    <!-- Plugins css -->
    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <!-- Icons css -->
    <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/dripicons/webfont/webfont.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <!-- build:css -->
    <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
    <!-- endbuild -->

</head>