<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PAVSM - Login Page</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>public/assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="<?=base_url()?>public/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content login-form">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="<?=site_url('login/register')?>">
                                        <img src="<?=base_url()?>public/front/images/logo.png" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center mt-4">Log into Your Account</h4>
                                <p class="text-center text-danger mt-4" style="font-size: 14px;"><?php if(isset($msg)) echo $msg;?></p>
                                <form class="mt-5 mb-5" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="username">
                                        <span class="text-danger small"><?=form_error('username')?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                        <span class="text-danger small"><?=form_error('name')?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                        <span class="text-danger small"><?=form_error('email')?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Phone" name="pno">
                                        <span class="text-danger small"><?=form_error('pno')?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                        <?=form_error('password')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select name="type" class="form-control">
                                            <option value="">--SELECT--</option>
                                            <option value="agent">Agent</option>
                                            <option value="student">Student</option>
                                        </select>
                                        <?=form_error('type')?>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="conpass">
                                        <?=form_error('conpass')?>
                                    </div>
                                    <div class="text-center mb-4 mt-4">
                                        <input type="submit" class="btn btn-primary" value="Sign In">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="<?=base_url()?>public/assets/plugins/common/common.min.js"></script>
    <!-- Custom script -->
    <script src="<?=base_url()?>public/js/custom.min.js"></script>
    <script src="<?=base_url()?>public/js/settings.js"></script>
    <script src="<?=base_url()?>public/js/gleek.js"></script>
</body>

</html>