<?php
error_reporting(0);

if($_SESSION['dokumen']==TRUE){
	$dokumen='active';
	echo '<script>swal("Sukses","Data Berhasil di '.$_SESSION['dokumen'].'!","success")</script>';
	unset($_SESSION['dokumen']);
	}
	else{
		$dokumen='';
	}


