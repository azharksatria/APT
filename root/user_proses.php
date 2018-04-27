
<?php 
include'../config/user_controller.php';
include'../sweetalert/sweetalert.php';
$query= new Database();

$aksi=$_GET['aksi'];

// =================== REGISTER

if($aksi=='register')
{
		$query->register(
			$_POST['nama'],
			$_POST['alamat'],
			$_POST['hp'],
			$_POST['username'],
			md5($_POST['password'])
			);
}


//==================== LOGIN


if($aksi=='user_login')
	{
		$var=$query->user_login(
		$_POST['username'],
		md5($_POST['password'])
		);
		if($var)
		{
			header('location:../../user/');
		}else{
			header('location:../../index.php?notif');

		}
	}

//==================== CREATE


if($aksi=='pengaduan')
{
		$nama=$_SESSION['username'];
		$var=$query->pengaduan(
			$nama,
			$_POST['hal'],
			$_POST['editor1']
			);

		if($var){
			$_SESSION['pengaduan']='Input';
			header('location:../../user/');
		}else{
			echo '<script>swal("Gagal","Data Gagal di Input!","error")</script>';
			header('location:../../user/');
		}
}