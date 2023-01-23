<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?=appName?> - Login Page</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="<?=base_url()?>public/images/favicon.ico">

    <link href="<?=base_url()?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>public/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>public/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>public/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="accountbg"></div>

    <!-- Begin page -->
    <div class="home-btn d-none d-sm-block">
        <a href="#" class="text-white"><i class="mdi mdi-home h1"></i></a>
    </div>

    <div class="wrapper-page">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages shadow-none mt-4">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="#" class="logo logo-admin">
                                    <img src="<?=base_url()?>public/images/logo-dark.png" class="mt-3" alt="" height="26"></a>
                                <p class="text-muted w-75 mx-auto mb-4 mt-4">Enter your email address and password to access admin panel.</p>
                                <p class="text-center text-danger mt-4" style="font-size: 14px;"><?php if(isset($msg)) echo $msg;?></p>
                            </div>

                            <form class="form-horizontal mt-4" action="" method="post">

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" required="" id="username" placeholder="Username" name="username">
                                        <?=form_error('username')?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" placeholder="Password" name="password">
                                        <?=form_error('password')?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-primary">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1"> Remember me</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>

                                

                            </form>

                        </div>

                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

    <!-- jQuery  -->
    <script src="<?=base_url()?>public/js/jquery.min.js"></script>
    <script src="<?=base_url()?>public/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>public/js/metismenu.min.js"></script>
    <script src="<?=base_url()?>public/js/jquery.slimscroll.js"></script>
    <script src="<?=base_url()?>public/js/waves.min.js"></script>

    <script src="<?=base_url()?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- App js -->
    <script src="<?=base_url()?>public/js/app.js"></script>

</body>

</html>