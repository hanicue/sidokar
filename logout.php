<?php
session_start();
session_destroy();
$msg = "Berhasil keluar!";
header("Location:login.php");
?>