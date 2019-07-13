<?php
session_start();
if(isset($_POST['login'])){
	include "sys/config.php";
	$log = new Database();
	$log->connect();
	$username = $log->escapeString($_POST['username']);
	$password = $log->escapeString($_POST['password']);
	//echo $username."|".$password;

	$log->sql("SELECT * FROM user WHERE username='$username' AND password='$password'");
	$cek = $log->numRows();
	if($cek>0){
		$ambil = $log->getResult();
			foreach($ambil as $data){
				$_SESSION['user_id'] = $data['id_user'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['status'] = $data['status'];
				header("location:index.php");
			}

	}else{
		$a = "Masukkan Username dan Password dengan benar!";
		header("location:login.php?msg=$a");
	}
}
?>