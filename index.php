<?php
session_start();
if(empty($_SESSION['username'])){ header("location:login.php?msg=Anda%20Harus%20Login%20Dulu"); }
include 'sys/config.php';
$Run = new Database();
$Run->connect();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $Run->site; ?> | Sistem Informasi Dokumentasi Arsip</title>

        <meta name="description" content="<?php echo $Run->site; ?> adalah sistem informasi arsip berbasis web">
        <meta name="author" content="disca">
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

        <div id="page-wrapper" class="page-loading">

            <div class="preloader">
                <div class="inner">
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
                <div id="sidebar">
                    <div id="sidebar-brand" class="themed-background">
                        <a href="index.php" class="sidebar-title">
                            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide">SIDO<strong>KAR</strong></span>
                        </a>
                    </div>
                    <div id="sidebar-scroll">
                      
                        <div class="sidebar-content">
          				
          				<?php include "includes/navbar.php"; ?>

                            
                        </div>
                    </div>
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">               
                        <div class="text-center">
                            <small>Made with <i class="fa fa-heart text-danger"></i> by <a>Disca Ferly</a></small><br>
                            <small><span id="year-copy"></span> &copy; <a><?php echo $Run->site; ?> 1.0</a></small>
                        </div>
                    </div>
                   
                </div>
                
                <div id="main-container">

                    <header class="navbar navbar-inverse navbar-fixed-top">
                     
                        <ul class="nav navbar-nav-custom">
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <li class="hidden-xs animation-fadeInQuick">
                             <a href=""> <i class="fa fa-home"></i> <strong>HOME</strong></a>
                            </li>
                        </ul>

                       <?php include "includes/topbar.php"; ?>
                    </header>
                    <div id="page-content">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <a href="view-inbox.php" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background">
                                            <i class="gi gi-inbox text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3">
                             				<?php 
                             				$Run->sql('SELECT count("id_masuk") AS total FROM suratmasuk');
                             				$res = $Run->getResult();
                             				foreach($res as $output){
                             					$aw =  $output["total"];
                             					?>
                                            <strong><span data-toggle="counter" data-to="<?php echo $aw;?>"></span></strong>

                                            <?php
                                        }

                             				?>
                                        </h2>
                                        <span class="text-muted">Surat Masuk</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="view-outbox.php" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-success">
                                            <i class="fa fa-envelope  text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-success"><?php 
                             				$Run->sql('SELECT count("id_keluar") AS total FROM suratkeluar');
                             				$res = $Run->getResult();
                             				foreach($res as $output){
                             					$aw =  $output["total"];
                             					?>
                                            <strong><span data-toggle="counter" data-to="<?php echo $aw;?>"></span></strong>

                                            <?php
                                        }

                             				?>
                                        </h2>
                                        <span class="text-muted">Surat Keluar</span>
                                    </div>
                                </a>
                            </div>

                            <?php 
                                            $Run->sql('SELECT count("id_arsipmasuk") AS total FROM arsipmasuk');
                                            $am = $Run->getResult();
                                            foreach($am as $amd){
                                                $aw =  $amd["total"];
                                                $Run->sql('SELECT count("id_arsipkeluar") AS total FROM arsipkeluar');
                                                $ak = $Run->getResult();
                                                foreach($ak as $akd){
                                                    $aws = $akd['total'];
                                                    $totsip = $aw+$aws;
                                                }
                                            }



                            ?>

                            <div class="col-sm-6 col-lg-3">
                                <a href="laporan.php" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-warning">
                                            <i class="fa fa-archive text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-warning">
                                            <strong>+ <span data-toggle="counter" data-to="<?php echo $totsip; ?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">ARSIP</span>
                                    </div>
                                </a>
                            </div>
                            <?php

                            $Run->sql('SELECT count("id_user") AS total FROM user');
                                                $us = $Run->getResult();
                                                foreach($us as $usd){
                                                  $datauser=$usd['total'];
                                                    
                                                }
                            ?>
                            <?php if($_SESSION['status']=='admin'){ ?>
                            <div class="col-sm-6 col-lg-3">
                                <a href="view-user.php" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-danger">
                                            <i class="fa fa-users text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-danger">
                                            <strong>+ <span data-toggle="counter" data-to="<?php echo $datauser; ?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">User</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-8">
              
                            </div>
                            <div class="col-sm-6 col-lg-4">
                          
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                                <div class="widget">
                                    <div class="widget-content themed-background-flat text-right clearfix">
                                        <a href="javascript:void(0)" class="pull-left">
                                            <img src="img/placeholders/avatars/user.png" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x">
                                        </a>
                                        <h3 class="widget-heading text-light"><strong>Selamat Datang, </strong><?php echo $_SESSION['username'];?></h3>
                                        <h4 class="widget-heading text-light-op">Hak Akses, <?php echo $_SESSION['status']; ?></h4>
                                    </div>

                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
        <script src="js/pages/readyDashboard.js"></script>
        <script>$(function(){ ReadyDashboard.init(); });</script>
    </body>
</html>