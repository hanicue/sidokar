<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

<?php 
    include "sys/config.php";
    $info = new Database();
?>
        <title><?php echo $info->site; ?> - Lupa Akses?</title>

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
                <i class="fa fa-history"></i> <strong>Password Reminder</strong>
            </h1>
            <div class="block animation-fadeInQuickInv">
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="login.php" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Back to login"><i class="fa fa-user"></i></a>
                    </div>
                    <h2>Lupa Sandi?</h2>
                </div>
                <form id="form-reminder" action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="reminder-email" name="lupasandi" class="form-control" placeholder="Username" disabled>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-sm btn-primary" disabled><i class="fa fa-check"></i> Ingatkan!</button>
                        </div>
                    </div>
                </form>
            </div>
            <footer class="text-muted text-center animation-pullUp">
                <small><span id="year-copy"></span> &copy; <a href="" target="_blank"><?php echo $info->site; ?></a></small>
            </footer>
        </div>
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
        <script src="js/pages/readyReminder.js"></script>
        <script>$(function(){ ReadyReminder.init(); });</script>
    </body>
</html>