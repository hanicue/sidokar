<?php
session_start();
if(empty($_SESSION['username'])){ header("location:login.php?msg=Anda%20Harus%20Login%20Dulu"); }
else{
    if($_SESSION['status']!='admin'){header("location:index.php");}
include 'sys/config.php';
$db = new Database();
$db->connect();
?>

<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
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
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>

            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
               
                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Sidebar Brand -->
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
                                <a href=""><strong>SURAT MASUK</strong></a>
                            </li>
                        </ul>
                       <?php include "includes/topbar.php"; ?>
                    </header>
                    <div id="page-content">
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Surat Masuk</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li>Surat Masuk</li>
                                            <li><a href="">Disposisi</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="block full">
    <div class="block-title">
    <h2>DATA SURAT DISPOSISI</h2>
    </div>
    
    <div class="table-responsive">
        <div id="example-datatable_wrapper" class="dataTables_wrapper form-inline no-footer">

        <table id="example-datatable" class="table table-striped table-bordered table-vcenter dataTable no-footer" role="grid" aria-describedby="example-datatable_info">
            <thead>
                <tr role="row">
                    <th class="sorting text-center" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 292px;">No Surat</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 192px;">Diteruskan</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 192px;">Dengan Hormat</th>
                    <th class="sorting text-center" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 192px;">Catatan</th>
                    <th style="width: 119px;" class="sorting" tabindex="0" aria-controls="example-datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">File</th>
                    <th class="text-center sorting_disabled" style="width: 74px;" rowspan="1" colspan="1" aria-label=""><i class="fa fa-flash"></i></th>
                </tr>
            </thead>

            <tbody>

                <?php

                    //suratmasuk.id_masuk, suratmasuk.id_user, suratmasuk.id_bagian, suratmasuk.tgl_masuk, suratmasuk.kode_surat, suratmasuk.asal_surat, suratmasuk.nomor_surat, suratmasuk.tgl_surat, suratmasuk.perihal, suratmasuk.ket, suratmasuk.sifat, suratmasuk.file
                   
                    //disposisi.id_disposisi, dispoosisi.id_masuk, disposisi.id_user, disposisi.denganhormat, disposisi.catatan
                
                    $db->sql('SELECT suratmasuk.*,disposisi.* FROM disposisi LEFT JOIN suratmasuk ON disposisi.id_masuk=suratmasuk.id_masuk');
                    $res = $db->getResult();
                    $i = 0;
                    foreach($res as $output){

                    $i++;
                ?>
                    <tr role="row" class="odd">
                        <td class="text-center"><?php echo $output["nomor_surat"]; ?></td>
                        <td class="text-center">
                            <?php 
                                $getIDbag = $output["id_bagian"]; 
                                $db->sql("SELECT * FROM bagian WHERE id_bagian='$getIDbag'");
                                $grabID = $db->getResult();
                                foreach($grabID as $idBag){
                                    echo $idBag['bagian'];
                                }
                                ?>
                            
                        </td>
                        <td class="text-center"><?php echo $output["denganhormat"]; ?></td>
                        <td class="text-center"><?php echo $output["catatan"]; ?></td>
                        <td style="text-align: center;"><a href='files/disposisi/<?php echo $output["files"]; ?>' target="_blank"><button class="btn btn-info"><i class="fa fa-eye"></i></button></a></td>
                        <td class="text-center">
                            <a href="edit-disposisi.php?options=edit&id=<?php echo $output['id_disposisi'];?>" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-sm btn-success" style="overflow: hidden; position: relative;" data-original-title="Edit"><span class="btn-ripple animate" style="height: 32px; width: 32px; top: -1px; left: -6.78125px;"></span><i class="fa fa-pencil"></i></a>
                             <?php
                            $db->sql("SELECT * FROM arsipmasuk WHERE id_disposisi=".$output['id_disposisi']);
                            $cek = $db->numRows();
                            if($cek>0){?>
                            <a data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-sm btn-danger" style="overflow: hidden; position: relative;" data-original-title="Hapus Data Arsip Dulu"><span class="btn-ripple animate" style="height: 32px; width: 32px; top: -1px; left: -6.78125px;"></span><i class="fa fa-trash-o"></i></a>

                            <?php }else{ ?>
                            <a href="edit-disposisi.php?options=delete&id=<?php echo $output['id_disposisi'];?>" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-sm btn-danger" style="overflow: hidden; position: relative;" data-original-title="Hapus"><span class="btn-ripple animate" style="height: 32px; width: 32px; top: -1px; left: -6.78125px;"></span><i class="fa fa-trash-o"></i></a>
                            <?php } ?>
                        </td>
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
 <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
    </body>
</html>
<?php } ?>