<?php
session_start();
if(empty($_SESSION['username'])){ header("location:login.php?msg=Anda%20Harus%20Login%20Dulu"); }
else{
if($_SESSION['status']!='admin'){header("location:index.php");}
error_reporting(0);
include 'sys/config.php';
$db = new Database();
$db->connect();

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $db->sql("SELECT id_masuk FROM disposisi WHERE id_masuk='$id'");
    $cex = $db->numRows();
    if($cex>0){
       
                     header("location:view-inbox.php?disp=ok");
        
}else{
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
                                <a href=""><strong>DISPOSISI SURAT MASUK</strong></a>
                            </li>
                        </ul>
                        <?php include "includes/topbar.php"; ?>
                    </header>
                    <div id="page-content">
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Disposisi</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li>Disposisi untuk Surat Masuk</li>
                                            <li><a href="">Tambah Disposisi</a></li>
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
                                        <h2>Tambah Disposisi untuk surat masuk</h2>
                                    </div>

<?php
if(isset($_POST['submit'])){

$id_masuk = $db->escapeString($_POST['idmasuk']);
$userid = $_SESSION['user_id'];
$bagian = $db->escapeString($_POST['terus']);
$denganhormat = $db->escapeString($_POST['dengan']);
$getDengan = $denganhormat;
$catatan = $db->escapeString($_POST['catatan']);
$file = $_FILES['file']['name'];

$dateFile = date("dmy")."-".$file;
    $target_dir = "files/disposisi/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if($FileType != 'jpg' && $FileType != 'png' && $FileType != 'jpeg' && $FileType != 'gif' && $FileType != 'bmp'){

                echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-check"></i> File Tidak diijinkan!
                        </div>
                    </div>';

            }else{

 move_uploaded_file($_FILES['file']['tmp_name'],'files/disposisi/'.$file);
$OK = $db->insert('disposisi',array('id_masuk'=>$id, 'id_user'=>$userid,'id_bagian'=>$bagian, 'denganhormat'=>$denganhormat, 'catatan'=>$catatan, 'files'=>$file));
if($OK){

$arsip = new Database();
$arsip->connect();
$arsip->sql("SELECT disposisi.id_disposisi,suratmasuk.file from disposisi LEFT JOIN suratmasuk ON disposisi.id_masuk=suratmasuk.id_masuk ORDER BY disposisi.id_disposisi DESC LIMIT 1");

$getDispo = $arsip->getResult();
foreach ($getDispo as $grabD) {
    $idDisp = $grabD['id_disposisi'];
    $fileA = $grabD['file'];
$date = date("Y-m-d");
$arsip->insert('arsipmasuk',array('id_disposisi'=>$idDisp,'tgl_arsip'=>$date,'file'=>$fileA));
}


echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-check"></i> Berhasil ditambahkan!
                        </div>
                    </div>';
                      echo '<script>var delayInMilliseconds=3000; setTimeout(function(){window.location.href=\'view-inbox.php\';}, delayInMilliseconds);</script>';


                  }else{
echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <div class="flex-00-auto">
                            <i class="fa fa-fw fa-check"></i> Gagal ditambahkan!
                        </div>
                    </div>';
                      echo '<script>var delayInMilliseconds=3000; setTimeout(function(){window.location.href=\'inbox.php\';}, delayInMilliseconds);</script>';
                  }
}

}
$db->sql('SELECT * FROM suratmasuk WHERE id_masuk='.$id);
$res = $db->getResult();
foreach($res as $output){
?>
                                    <form action="" enctype="multipart/form-data" method="POST" class="form-bordered">
                                    <input type="hidden" name="idmasuk" value="<?php echo $output['id_masuk'];?>">
                                    <h3 class="text-center"> <b>Surat Info :</b> </h3>
                                    <table class="table">
                                        <tr>
                                            <td><strong>Surat dari</strong></td>
                                            <td>:</td>
                                            <td><?php echo $output['asal_surat']; ?></td>
                                            <td><strong>Nomor surat</strong></td>
                                            <td>:</td>
                                            <td><?php echo $output['nomor_surat']; ?></td>
                                            <td><strong>Tanggal surat</strong></td>
                                            <td>:</td>
                                            <td><?php echo $output['tgl_surat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal diterima</b></td>
                                            <td>:</td>
                                            <td><?php echo $output['tgl_masuk']; ?></td>
                                            <td><strong>Hal</strong></td>
                                            <td>:</td>
                                            <td><?php echo $output['perihal']; ?></td>
                                            <td><strong>No Agenda</strong></td>
                                            <td>:</td>
                                            <td><?php echo $output['id_masuk']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Sifat</b></td>
                                            <td>:</td>
                                            <td><?php echo ucfirst($output['sifat']); ?></td>
                                            <td><strong>Nama File</strong></td>
                                            <td>:</td>
                                            <td><?php echo $output['file']; ?></td>
                                        </tr>
                                    </table>

                                        <?php } ?>
                                        <div class="form-group">
                                        <label for="teruskan" >Diteruskan kepada</label>
                                            <select name="terus" class="form-control" >
                                                <option selected>---Pilih---</option>
                                                <option value="1">Sekcam</option>
                                                <option value="2">Kasi Pemerintahan</option>
                                                <option value="3">Kasi Ekbang</option>
                                                <option value="4">Kasi Kesos</option>
                                                <option value="5">Kasi Trantib</option>
                                                <option value="6">Kasubag PAT</option>
                                            </select>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="catatan">Dengan Hormat Harap</label>
                                            <input type="text" id="denganlanjut" name="dengan" class="form-control" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="catatan">Catatan</label>
                                            <input type="text" id="catatan" name="catatan" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="file">File</label>
                                                <input type="file" id="file" name="file" class="form-control">
                                            <span class="help-block"> Pilih Dokumen</span>
                                            <span class="help-block"> Keterangan ex: max file 5MB dan format gambar(jpg,jpeg,dll)</span>
                                        </div>

                                        <div class="form-group form-actions">
                                            <button type="submit" name="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Submit</button>
                                            <button type='reset'onclick="window.location.href='view-inbox.php'" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;"><span class="btn-ripple animate" style="height: 61px; width: 61px; top: -20.9688px; left: 7.46875px;"></span>Cancel</button>
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
<?php }} else { echo "Mana ID nya?"; } }?>