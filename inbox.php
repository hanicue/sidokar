<?php
session_start();
if(empty($_SESSION['username'])){ header("location:login.php?msg=Anda%20Harus%20Login%20Dulu"); }
    if($_SESSION['username']!='admin'){ header("location:index.php"); }
    else{
        $user = $_SESSION['username'];
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
                                <a href=""><strong>SURAT MASUK</strong></a>
                            </li>
                        </ul>
                        <?php include 'includes/topbar.php'; ?>
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
                                        <h2>Tambah surat masuk</h2>
                                    </div>
<?php
if(isset($_POST['submit'])){
    $db->sql("SELECT * FROM user WHERE username='$user'");
    $getID = $db->getResult();
    foreach ($getID as $dataID) {
        $id = $dataID['id_user'];
    }
    $id_bagian = $db->escapeString($_POST['id_bagian']);
    $tgl_masuk = $db->escapeString($_POST['tgl_masuk']);
    $kodesurat = $db->escapeString($_POST['kodesurat']);
    $asalsurat = $db->escapeString($_POST['asalsurat']);
    $nomorsurat = $db->escapeString($_POST['nomorsurat']);
    $tgl_surat = $db->escapeString($_POST['tanggalsurat']);
    $perihal = $db->escapeString($_POST['perihal']);
    $ket = $db->escapeString($_POST['ket']);
    $sifat = $db->escapeString($_POST['sifat']);
    
    $file = $_FILES['file']['name'];
    $dateFile = date("dmy")."-".$file;
    $target_dir = "files/suratmasuk/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if($FileType != 'jpg' && $FileType != 'png' && $FileType != 'jpeg' && $FileType != 'gif' && $FileType != 'bmp'){

                echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-check"></i> File Tidak diijinkan!
                        </div>
                    </div>';

            }else{

 move_uploaded_file($_FILES['file']['tmp_name'],'files/suratmasuk/'.$file);
$db->insert('suratmasuk',array('id_user'=>$id,'id_bagian'=>$id_bagian,'tgl_masuk'=>$tgl_masuk, 'kode_surat'=>$kodesurat, 'asal_surat' => $asalsurat, 'nomor_surat' => $nomorsurat, 'tgl_surat' => $tgl_surat, 'perihal' => $perihal, 'ket' => $ket, 'sifat' => $sifat,'file'=>$file));  // Table name, column names and respective values
echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-check"></i> Berhasil ditambahkan!
                        </div>
                    </div>';
                      echo '<script>var delayInMilliseconds=3000; setTimeout(function(){window.location.href=\'view-inbox.php\';}, delayInMilliseconds);</script>';

}
}
?>
                                    <form action=""  enctype="multipart/form-data" method="POST" class="form-bordered">
                                        <input type="hidden" name="tgl_masuk" value="<?php echo date('Y-m-d'); ?>">

                                        <div class="form-group">
                                            <label for="example-nf-email">Kode Surat</label>
                                            <input type="text" id="kodesurat" name="kodesurat" class="form-control" required="">
                                            <span class="help-block">Kode surat ex: 900</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-password">Asal Surat</label>
                                            <input type="text" id="asalsurat" name="asalsurat" class="form-control" required="">
                                            <span class="help-block">Asal Surat ex: Kemedikbud</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Nomor Surat</label>
                                            <input type="text" id="nomorsurat" name="nomorsurat" class="form-control" required="">
                                            <span class="help-block">Nomor surat ex: 10/VII/2018</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Tanggal Surat</label>
                                            <input type="text" id="tanggalsurat" name="tanggalsurat" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required="">
                                            <span class="help-block">Tanggal surat ex: 10/02/2018</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-email">Perihal</label>
                                            <input type="text" id="perihal" name="perihal" class="form-control" required="">
                                            <span class="help-block">Perihal ex: Pendidikan</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-select">Turun ke Bagian</label>
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
                                            <label>Sifat</label><br>
                                                <label class="radio-inline" for="sifat1">
                                                    <input type="radio" id="sifat1" name="sifat" value="amat segera"> Amat Segera
                                                </label>
                                                <label class="radio-inline" for="sifat2">
                                                    <input type="radio" id="sifat2" name="sifat" value="penting"> Penting
                                                </label>
                                                <label class="radio-inline" for="sifat3">
                                                    <input type="radio" id="sifat3" name="sifat" value="segera"> Segera
                                                </label>
                                                <label class="radio-inline" for="sifat4">
                                                    <input type="radio" id="sifat4" name="sifat" value="biasa" required=""> Biasa
                                                </label>
                                            <span class="help-block"> Pilih salah satu</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="file" >File</label>
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