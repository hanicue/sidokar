<?php
include "sys/config.php";

$arsip = new Database();
$arsip->connect();
$arsip->sql("SELECT * from suratkeluar ORDER BY id_keluar DESC LIMIT 1");

$getDispo = $arsip->getResult();
foreach ($getDispo as $grabD) {
    $idDisp = $grabD['id_keluar'];
    $fileA = $grabD['file'];
$date = date("Y-m-d");
var_dump($arsip->insert('arsipkeluar',array('id_keluar'=>$idDisp,'tgl_arsip'=>$date,'file'=>$fileA)));
}
?>