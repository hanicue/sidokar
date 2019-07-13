<?php
session_start();
if(empty($_SESSION['username'])){ header("location:login.php"); }
else{ 
if(isset($_GET['options']) && isset($_GET['id'])){
	if($_SESSION['status']=='admin'){

		include 'sys/config.php';
		$db = new Database();
		$db->connect();
		$hapus = $_GET['options'];
		$ini = $_GET['id'];
		if($hapus == 'delete'){
			$cek = $db->delete('arsipmasuk','id_arsipmasuk='.$ini);
			if($cek){
				 echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                                            <div class="flex-00-auto">
                                                                <i class="fa fa-fw fa-check"></i> Berhasil dihapus!
                                                            </div>
                                                        </div>';
                                                     echo '<script>var delayInMilliseconds=1000; setTimeout(function(){window.location.href=\'arsipmasuk.php\';}, delayInMilliseconds);</script>';
			}
		else{
			echo "GAGAL DIHAPUS!";
			echo "<br><a href='index.php'>Kembali</a>";
		}
		}else{
			echo "MAU NGAPAIN?\"OPTIONS SALAH!\". ";
		}
	}else{
		header("location:index.php");
	}

}else{
	header("location:index.php");
}
}
?>