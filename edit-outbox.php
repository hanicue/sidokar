<?php
session_start();
if(empty($_SESSION['username'])){ header("location:login.php?msg=Anda%20Harus%20Login%20Dulu"); }
    else{
if($_SESSION['status']!='admin'){header("location:index.php");}
include 'sys/config.php';
$db = new Database();
$db->connect();

if(isset($_GET['options'])){
    $options = $_GET['options'];
    $editid=$_GET['id'];
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
                                <a href=""><strong>SURAT KELUAR</strong></a>
                            </li>
                        </ul>

                      <?php include "includes/topbar.php"; ?>
                    </header>
                    <div id="page-content">
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
                                        <h2>Ubah surat keluar</h2>
                                    </div>
 
 <?php
if($options == 'save'){
    $id=$_GET['id'];
            
if(isset($_POST['submit'])){
        $tgl_keluar = $db->escapeString($_POST['tgl_keluar']);
        $kodesurat = $db->escapeString($_POST['kodesurat']);
        $perihal = $db->escapeString($_POST['perihal']);
        $kepada = $db->escapeString($_POST['kepada']);
        $nomorsurat = $db->escapeString($_POST['nomorsurat']);
        $tgl_surat = $db->escapeString($_POST['tanggalsurat']);
        $lampiran = $db->escapeString($_POST['lampiran']);
        $pengolah = $db->escapeString($_POST['id_bagian']);
        $ket = $db->escapeString($_POST['ket']);


$db->update('suratkeluar', array('tgl_keluar'=>$tgl_keluar, 'kode_surat'=>$kodesurat, 'perihal' => $perihal, 'kepada' => $kepada, 'nomor_surat' => $nomorsurat, 'tgl_surat' => $tgl_surat, 'lampiran' => $lampiran, 'id_bagian' => $pengolah, 'ket'=>$ket), 'id_keluar='.$editid);

echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                       <div class="flex-00-auto">
                         <i class="fa fa-fw fa-check"></i> Berhasil diubah!
                        </div>
                  </div>';
                  echo '<script>var delayInMilliseconds=3000; setTimeout(function(){window.location.href=\'view-outbox.php\';}, delayInMilliseconds);</script>';
              }

}
else if($options == 'delete'){
    $id=$_GET['id'];
$db->delete('suratkeluar','id_keluar='.$id);
 echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-check"></i> Berhasil dihapus!
                                                            </div>
                                                        </div>';
                                                     echo '<script>var delayInMilliseconds=3000; setTimeout(function(){window.location.href=\'view-outbox.php\';}, delayInMilliseconds);</script>';
}
else if($options == 'edit'){
        $id=$_GET['id'];
$db->sql('SELECT * FROM suratkeluar WHERE id_keluar='.$editid);
$res = $db->getResult();
foreach($res as $output){ ?>

                                    <form action="?options=save&id=<?php echo $id;?>" method="POST" class="form-bordered">
                                        <input type="hidden" name="tgl_keluar" value="<?php echo date('Y-m-d'); ?>">
                                        <div class="form-group">
                                            <label for="example-nf-email">Kode Surat</label>
                                            <input type="text" id="kodesurat" name="kodesurat" value="<?php print_r($output['kode_surat']); ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-password">Perihal</label>
                                            <input type="text" id="perihal" name="perihal" value="<?php print_r($output['perihal']); ?>"class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Kepada</label>
                                            <input type="text" id="kepada" name="kepada" value="<?php print_r($output['kepada']); ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Nomor Surat</label>
                                            <input type="text" id="nomorsurat" name="nomorsurat" value="<?php print_r($output['nomor_surat']); ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Tanggal Surat</label>
                                            <input type="text" id="tanggalsurat" name="tanggalsurat" value="<?php print_r($output['tgl_surat']); ?>" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Lampiran</label>
                                            <input type="text" id="lampiran" name="lampiran" value="<?php print_r($output['lampiran']); ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Pengolah</label>
                                            <select id="bagian" class="form-control" name="id_bagian" size="1">
                                                    <option selected value="<?php echo $output['id_bagian']; ?>"><?php $ibag=$output['id_bagian']; $db->sql("SELECT * FROM bagian WHERE id_bagian='$ibag'"); $aw = $db->getResult(); foreach($aw as $waw){echo $waw['kode_bagian']." - ".$waw['bagian'];} ?></option>
                                                    <option>---Pilih Kode---</option>
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
                                            <input type="text" id="ket" name="ket" value="<?php print_r($output['ket']); ?>" class="form-control">
                                        </div>
<div class="form-group form-actions">
                                            <button type="submit" name="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Submit</button>
                                            <button type='reset'onclick="window.location.href='view-outbox.php'" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;"><span class="btn-ripple animate" style="height: 61px; width: 61px; top: -20.9688px; left: 7.46875px;"></span>Cancel</button>
                                        </div>
                                    </form>
                                    <?php
                                     }
                                 } else { echo "ERROR YAH!"; } ?>
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
<?php

}else{
    echo "GAK ADA ID MASUK";
}
    }
?>