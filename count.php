<?php
include "sys/config.php";
$Run = new Database();
$Run->connect();

$Run->sql('SELECT count("id_masuk") AS total FROM suratmasuk');
$res = $Run->getResult();


foreach($res as $output){
	echo $output["total"];
}
?>