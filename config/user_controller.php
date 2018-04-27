<?php
include'config.php';
class Database
{
	public function __construct()
	{
		$this->config=new Koneksi();
	}

	//================== Fucntion READ

	public function register($a,$b,$c,$d,$e)
	{
		$mysqli=$this->config->database();
		$mysqli->query("INSERT INTO user  VALUES(NULL,'$a','$b','$c','$d','$e')");
	}

	// ================= Fuction Login
		public function user_login($a,$b)
	{
			
			$mysqli =$this->config->database();
			$data   =$mysqli->query("SELECT * FROM user WHERE username='$a' AND password='$b' ");
			$get    =$data->fetch_array();
			$now 	=$data->num_rows;
			if($now == 1){
				$_SESSION['id_user']  =$get['id'];
				$_SESSION['username'] =$get['nama'];
				return TRUE;
			}else{
				return FALSE;
			}
			
		
	}
//======================= function READ

	public function tampil_berita_where()
	{
		$a=$_GET['id'];
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM berita WHERE id_berita='$a' ");
		$var=$data->fetch_array();
		//var_dump($a); exit();
		return $var;
	}

	public function tampil_pimpinan()
	{
		$mysqli =$this->config->database();
		$data   =$mysqli->query("SELECT * FROM pimpinan");
		$var  =$data->fetch_array();
		return $var;
	}

	public function tampil_berita()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM berita LIMIT 2");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_list_berita()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM berita LIMIT 6");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_kategori($a)
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM berita WHERE kategori='$a' LIMIT 9");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_produk()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM produk LIMIT 3");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_produk_full()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM produk");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_produk_where()
	{
		$a=$_GET['id'];
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM produk WHERE id='$a' ");
		$var=$data->fetch_array();
		//var_dump($a); exit();
		return $var;
	}
	
	public function tampil_kontak()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM kontak  ");
		$var=$data->fetch_array();
		return $var;
	}

	public function tampil_video()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM video ");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_sosmed()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM sosmed ");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

//======================= CREATE

	public function pengaduan($a,$b,$c)
	{
		$mysqli=$this->config->database();
		$value=$mysqli->query("INSERT INTO pengaduan VALUES(NULL,'$a','$b','$c',NOW())");
		return $value;
	}
}