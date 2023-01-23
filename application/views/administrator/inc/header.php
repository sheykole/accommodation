<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=$title?> - <?=appName?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>public/assets/images/favicon.png">
    <!-- Sweetalert -->
    <link href="<?=base_url()?>public/assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?=base_url()?>public/assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>public/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
    <!-- Custom Stylesheet -->
    <link href="<?=base_url()?>public/css/style.css" rel="stylesheet">
    <script src="<?=base_url()?>public/assets/plugins/common/common.min.js"></script>
</head>

<body>
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo"><a href="<?=site_url('agent')?>"><b><img src="<?=base_url()?>public/front/images/logo.png" alt=""> </b></a>
            </div>
            <div class="nav-control">
                <div class="hamburger"><span class="line"></span>  <span class="line"></span>  <span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content">
                <div class="header-right">
                    <ul>
                        
                    </ul>
                </div>
            </div>
        </div>