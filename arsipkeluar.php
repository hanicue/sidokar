<?php
session_start();
if(empty($_SESSION['username'])){ header("location:login.php?msg=Anda%20Harus%20Login%20Dulu"); }
else{
include 'sys/config.php';
$db = new Database();
$db->connect();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $db->site; ?> | Sistem Informasi Dokumentasi Arsip</title>

        <meta name="description" content="<?php echo $db->site; ?> adalah sistem informasi arsip berbasis web">
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
                            <small><span id="year-copy"></span> &copy; <a><?php echo $db->site; ?> 1.0</a></small>
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
                                <a href=""><strong>LAPORAN</strong></a>
                            </li>
                        </ul>
                      <?php include "includes/topbar.php"; ?>
                    </header>
                    <div id="page-content">
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Arsip</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li>Arsip Surat Keluar</li>
                                            <li><a href="">Lihat</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="block full">
    <div class="block-title">
    <h2>ARSIP SURAT KELUAR</h2>
    </div>
    
    <div class="table-responsive">
        <div id="example-datatable_wrapper" class="dataTables_wrapper form-inline no-footer">
             <div class="pull-right">
                    
                <button type="button" class="btn btn-success" aria-expanded="false" onclick="window.open('print_arsipkeluar.php')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak Laporan">
                    Cetak Laporan
                        <span class="m-l-5">
                            <i class="fa fa-print"></i>
                        </span>
                </button>
            </div>

        <table id="example-datatable" class="table table-striped table-bordered table-vcenter dataTable no-footer" role="grid" aria-describedby="example-datatable_info" align="center">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 292px;">Id Keluar</th>
                    <th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 292px;">Tgl_Arsip</th>
                    <th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 292px;">No Surat</th>
                    <th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 292px;">Tgl Keluar</th>
                    <th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 292px;">Kepada</th>
                    <th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 292px;">Perihal</th>
                    <th class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 292px;">Pengolah</th>
                    <th style="width: 119px;" class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">File</th>
                    <?php if($_SESSION['status']=='admin'){?>
                    <th class="text-center sorting_disabled" style="width: 74px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i></th>
                    <?php }?>
                </tr>
            </thead>

            <tbody>
                <?php
$db->sql('SELECT arsipkeluar.*,suratkeluar.* FROM arsipkeluar LEFT JOIN suratkeluar ON arsipkeluar.id_keluar=suratkeluar.id_keluar');
$res = $db->getResult();
foreach($res as $output){

                ?>
                <tr role="row" class="odd">
                    <td><?php echo $output["id_keluar"]; ?></td>
                    <td><?php echo date('d F Y',strtotime($output["tgl_arsip"])); ?></td>
                    <td><?php echo $output["nomor_surat"]; ?></td>
                    <td><?php echo date('d F Y',strtotime($output["tgl_keluar"])); ?></td>
                    <td><?php echo $output["kepada"]; ?></td>
                    <td><?php echo $output["perihal"]; ?></td>
                    <td>
                            <?php 
                                $getIDbag = $output["id_bagian"]; 
                                $db->sql("SELECT * FROM bagian WHERE id_bagian='$getIDbag'");
                                $grabID = $db->getResult();
                                foreach($grabID as $idBag){
                                    echo $idBag['bagian'];
                                }
                                ?>
                    </td>
                    <td><a href='files/suratkeluar/<?php echo $output["file"]; ?>' target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i></button></td>
                    <?php if($_SESSION['status']=='admin'){?>
                    <td class="text-center">
                        <a href="hapus-arsipkeluar.php?options=delete&id=<?php echo $output["id_arsipkeluar"]; ?>" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;" data-original-title="Delete Arsip"><i class="fa fa-times"></i></a>
                        <?php } ?>
                    </td>
                </tr>


                <?php } ?>
            </tbody>
        </table>


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
        <script src="js/pages/uiTables.js"></script>    
        <script>$(function(){ UiTables.init(); });</script>
        <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-16158021-6', 'auto');ga('send', 'pageview');</script>

    </body>
</html>
<?php } ?>