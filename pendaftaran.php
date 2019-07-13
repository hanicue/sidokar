<!DOCTYPE html>
<html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

<?php 
    include "sys/config.php";
    $info = new Database();
?>
        <title><?php echo $info->site; ?> - Registrasi</title>

        <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/plugins.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/themes.css">
        <script src="js/vendor/modernizr-3.3.1.min.js"></script>
    </head>
    <body>
        <div id="login-container">
            <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
                <i class="fa fa-plus"></i> <strong>Buat Akun baru</strong>
            </h1>
            <div class="block animation-fadeInQuickInv">
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="login.php" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Back to login"><i class="fa fa-user"></i></a>
                    </div>
                    <h2>Masukkan data</h2>
                </div>
                <form id="form-register" action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="register-username" name="register-username" class="form-control" placeholder="Username" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="register-email" name="register-email" class="form-control" placeholder="Email" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="register-password" name="register-password" class="form-control" placeholder="Password" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="register-password-verify" name="register-password-verify" class="form-control" placeholder="Verify Password" disabled>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-6">
                            <label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="Agree to the terms">
                                <input type="checkbox" id="register-terms" name="register-terms">
                                <span></span>
                            </label>
                            <a href="#modal-terms" data-toggle="modal">Info</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-success" disabled><i class="fa fa-plus"></i> Create Account</button>
                        </div>
                    </div>
                </form>
            </div>
            <footer class="text-muted text-center animation-pullUp">
                <small><span id="year-copy"></span> &copy; <a href="" target="_blank"><?php echo $info->site;?></a></small>
            </footer>
        </div>
        <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center"><strong>Informasi Sistem</strong></h3>
                    </div>
                    <div class="modal-body">
                        <h4 class="page-header">1. <strong>General</strong></h4>
                        <p>Sistem ini hanya boleh diakses oleh Karyawan</p>
                        <h4 class="page-header">2. <strong>Account</strong></h4>
                        <p>Akun hanya bisa dibuat dengan persetujuan Admin. Silahkan Hubungi Admin</p>
                    </div>
                    <div class="modal-footer">
                        <div class="text-center">
                            <button type="button" class="btn btn-effect-ripple btn-sm btn-primary" data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
        <script src="js/pages/readyRegister.js"></script>
        <script>$(function(){ ReadyRegister.init(); });</script>
    </body>
</html>