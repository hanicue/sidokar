<?php
session_start();
if(empty($_SESSION['username'])){ header("location:login.php?msg=Anda%20Harus%20Login%20Dulu"); }
else{
if($_SESSION['status']!='admin'){header("location:index.php");}
error_reporting(0);
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
                    <!-- END Sidebar Brand -->
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                        <?php include "includes/navbar.php"; ?>
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                    <!-- Sidebar Extra Info -->
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">               
                        <div class="text-center">
                            <small>Made with <i class="fa fa-heart text-danger"></i> by <a>Disca Ferly</a></small><br>
                            <small><span id="year-copy"></span> &copy; <a><?php echo $db->site; ?> 1.0</a></small>
                        </div>
                    </div>
                    <!-- END Sidebar Extra Info -->
                </div>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <header class="navbar navbar-inverse navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Header Link -->
                            <li class="hidden-xs animation-fadeInQuick">
                                <a href=""><strong>SURAT KELUAR</strong></a>
                            </li>
                            <!-- END Header Link -->
                        </ul>
                        <!-- END Left Header Navigation -->
<?php include "includes/topbar.php"; ?>

                    </header>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Blank Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Surat Keluar</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li>Surat Keluar</li>
                                            <li><a href="">Tambah</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="block">
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" style="overflow: hidden; position: relative;" data-original-title="Toggles .form-bordered class" aria-pressed="false"><span class="btn-ripple animate" style="height: 84px; width: 84px; top: -35px; left: -6.125px;"></span>Borderless</a>
                                        </div>
                                        <h2>Tambah surat Keluar</h2>
                                    </div>
<?php
if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $id_bagian = $db->escapeString($_POST['id_bagian']);
    $tgl_keluar = $db->escapeString($_POST['tgl_keluar']);
    $kodesurat = $db->escapeString($_POST['kodesurat']);
    $perihal = $db->escapeString($_POST['perihal']);
    $kepada = $db->escapeString($_POST['kepada']);
    $nomorsurat = $db->escapeString($_POST['nomorsurat']);
    $tgl_surat = $db->escapeString($_POST['tanggalsurat']);
    $lampiran = $db->escapeString($_POST['lampiran']);
    $pengolah = $db->escapeString($_POST['id_bagian']);
    $ket = $db->escapeString($_POST['ket']);

    $file = $_FILES['file']['name'];
    $dateFile = date("dmy")."-".$file;
    $target_dir = "files/suratkeluar/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if($FileType != 'jpg' && $FileType != 'png' && $FileType != 'jpeg' && $FileType != 'gif' && $FileType != 'bmp'){

                echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-check"></i> File Tidak diijinkan!
                        </div>
                    </div>';

            }else{

 move_uploaded_file($_FILES['file']['tmp_name'],'files/suratkeluar/'.$file);
$OK = $db->insert('suratkeluar',array('id_user'=>$user_id,'id_bagian'=>$id_bagian,'tgl_keluar'=>$tgl_keluar, 'kode_surat'=>$kodesurat, 'perihal' => $perihal, 'kepada' => $kepada, 'nomor_surat' => $nomorsurat, 'tgl_surat' => $tgl_surat, 'lampiran' => $lampiran, 'id_bagian' => $pengolah, 'ket'=>$ket,'file'=>$file)); 
if($OK){

$arsip = new Database();
$arsip->connect();
$arsip->sql("SELECT * from suratkeluar ORDER BY id_keluar DESC LIMIT 1");

$getDispo = $arsip->getResult();
foreach ($getDispo as $grabD) {
    $idDisp = $grabD['id_keluar'];
    $fileA = $grabD['file'];
$date = date("Y-m-d");
$arsip->insert('arsipkeluar',array('id_keluar'=>$idDisp,'tgl_arsip'=>$date,'file'=>$fileA));
}

echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                       <div class="flex-00-auto">
                         <i class="fa fa-fw fa-check"></i> Berhasil ditambahkan!
                        </div>
                  </div>';
                  echo '<script>var delayInMilliseconds=3000; setTimeout(function(){window.location.href=\'view-outbox.php\';}, delayInMilliseconds);</script>';
              }else{

echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                       <div class="flex-00-auto">
                         <i class="fa fa-fw fa-warning"></i> Gagal ditambahkan!
                        </div>
                  </div>';
                  echo '<script>var delayInMilliseconds=3000; setTimeout(function(){window.location.href=\'outbox.php\';}, delayInMilliseconds);</script>';
              }

}
}
?>
                                    <form action="" enctype="multipart/form-data" method="POST" class="form-bordered">
                                        <?php 
                                        $db->sql("SELECT id_keluar FROM suratkeluar ORDER BY id_keluar DESC LIMIT 1");
                                        $getLast = $db->getResult();
                                        foreach($getLast as $lastIn){
                                            $ini = $lastIn['id_keluar'];
                                        }
                                        ?>
                                        <center><strong>NO AGENDA : </strong><?php echo $ini+1; ?></center>
                                        <input type="hidden" name="tgl_keluar" value="<?php echo date('Y-m-d'); ?>">
                                        <div class="form-group">
                                            <label for="example-nf-email">Kode Surat</label>
                                            <input type="text" id="kodesurat" name="kodesurat" class="form-control" required="">
                                            <span class="help-block">Kode surat ex: 900</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-password">Perihal</label>
                                            <input type="text" id="perihal" name="perihal" class="form-control" required="">
                                            <span class="help-block">Perihal ex: Pemberitahuan</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Kepada</label>
                                            <input type="text" id="kepada" name="kepada" class="form-control" required="">
                                            <span class="help-block">Kepada ex: Dinas Pekerjaan</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Nomor Surat</label>
                                            <input type="text" id="nomorsurat" name="nomorsurat" class="form-control" required="">
                                            <span class="help-block">Nomor Surat ex: 10/XI/2018</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Tanggal Surat</label>
                                            <input type="text" id="tanggalsurat" name="tanggalsurat" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required="">
                                            <span class="help-block">Tanggal surat ex: 10/02/2018</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Lampiran</label>
                                            <input type="text" id="lampiran" name="lampiran" class="form-control" required="">
                                            <span class="help-block">Perihal ex: Pendidikan</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-select">Pengolah</label>
                                                <select id="bagian" class="form-control" name="id_bagian" size="1" required="">
                                                    <option selected>---Pilih Kode---</option>
                                                    <?php 
                                                        $db->select('bagian');
                                                        $getBag = $db->getResult();
                                                        foreach ($getBag as $getData) {
                                                            echo "<option value='".$getData['id_bagian']."'>".$getData['kode_bagian']." - ".$getData['bagian']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Keterangan</label>
                                            <input type="text" id="ket" name="ket" class="form-control" required="">
                                            <span class="help-block"> Keterangan ex: Harus dikumpulkan pada..</span>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="file">File</label >
                                                <input type="file" id="file" name="file" class="form-control">
                                            <span class="help-block"> Pilih Dokumen</span>
                                            <span class="help-block"> Keterangan ex: max file 5MB dan format gambar(jpg,jpeg,dll)</span>
                                        </div>
                                        <div>
                                            <hr size="70%">
                                        </div>
                                        <div class="form-group form-actions">
                                            <button type="submit" name="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Submit</button>
                                            <button type='reset'onclick="window.location.href='index.php'" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;"><span class="btn-ripple animate" style="height: 61px; width: 61px; top: -20.9688px; left: 7.46875px;"></span>Cancel</button>
                                        </div>
                                    </form>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
        <script src="js/plugins/ckeditor/ckeditor.js"></script>
        <script src="js/pages/formsComponents.js"></script>
        <script>$(function(){ FormsComponents.init(); });</script>

    </body>
</html>
<?php } ?>