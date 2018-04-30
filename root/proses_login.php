<?php
include'../config/cek_login.php';
$aksi=$_GET['aksi'];

  if($aksi=='cek_login')
  {
    $query->cek_login(
  		$_POST['username'],
  		md5($_POST['password'])
  	);
    if($query){
      // var_dump($query);
    }
  }
 ?>
