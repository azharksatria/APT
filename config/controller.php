<?php
include'config.php';
class Database
{
	public function __construct()
	{
		$this->config=new Koneksi();
	}

// =================== Function CREATE
	public function input_dokumen($a,$b,$c,$d,$e)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO dokumen  VALUES(NULL,'$a','$b','$c','$d',NOW(),'$e')");
		return $var;
		var_dump($var);
	}

	public function input_admin($a,$b,$c)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO admin VALUES(NULL,'$a','$b','$c','1',NOW())");
		return $var;
	}

	public function input_produk($a,$b,$c)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO produk VALUES(NULL,'$a','$b','$c',NOW())");
		return $var;
	}

	public function input_video($a,$b)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO video VALUES(NULL,'$a','$b',NOW())");
		return $var;
	}

	public function input_sosmed($a,$b)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO sosmed VALUES(NULL,'$a','$b',NOW())");
		return $var;
	}

// =================== Function READ
	public function tampil_slider()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM slider");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
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
		$data   =$mysqli->query("SELECT * FROM berita LIMIT 3");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_berita_full()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM dokumen");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_berita_where($a)
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM berita WHERE id_berita='$a' ");
		$var=$data->fetch_array();
		return $var;
	}

	public function tampil_sosmed_where($a)
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM sosmed WHERE id='$a' ");
		$var=$data->fetch_array();
		return $var;
	}

	public function tampil_pengaduan()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM pengaduan ");
		foreach ($data as $row) 
		{
			$var[]=$row;
		}
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

	public function tampil_pengaduan_where($a)
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM pengaduan WHERE id='$a' ");
		$var=$data->fetch_array();
		//var_dump($a); exit();
		return $var;
	}

	public function edit_admin($a)
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM admin WHERE id='$a' ");
		$var=$data->fetch_array();
		//var_dump($a); exit();
		return $var;
	}

	public function edit_produk($a)
	{
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

	public function tampil_admin()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM admin  ");
		foreach ($data as $row) {
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_produk()
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM produk  ");
		foreach ($data as $row) {
			$var[]=$row;
		}
		return $var;
	}

// =================== Function UPDATE
	public function update_slider($id,$photo)
	{
		$mysqli=$this->config->database();
		$var   =$mysqli->query("UPDATE slider SET gambar='$photo' WHERE id='$id' ");
		$_SESSION['slider']='active';
		return $var;

	}

	public function update_pimpinan($a,$b,$c,$d,$e)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE pimpinan  SET title='$b',nama='$c',gambar='$d',kata_sambutan='$e' WHERE id='$a' ");
		$_SESSION['update_pimpinan']='active';
		return $var;
	}

	public function update_pimpinan_foto($a,$b,$c,$d)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE pimpinan  SET title='$b',nama='$c',kata_sambutan='$d' WHERE id='$a' ");
		return $var;
	}

	public function update_sosmed($a,$b,$c)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE sosmed  SET link='$b',icon='$c' WHERE id='$a' ");
		$_SESSION['sosmed']='Update';
		return $var;
	}

	public function update_sosmed_foto($a,$b)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE sosmed  SET link='$b' WHERE id='$a' ");
		return $var;
	}

	public function update_produk($a,$b,$c,$d)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE produk  SET nama='$b',photo='$c',keterangan='$d' WHERE id='$a' ");
		return $var;
	}

	public function update_produk_foto($a,$b,$c)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE produk  SET nama='$b',keterangan='$c' WHERE id='$a' ");
		return $var;
		var_dump($var);
	}

	public function update_berita($a,$b,$c,$d,$e)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE berita  SET judul='$b',photo='$c',berita='$d',kategori='$e' WHERE id_berita='$a' ");
		return $var;
	}

	public function update_berita_foto($a,$b,$c,$d)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE berita  SET judul='$b',berita='$c',kategori='$d' WHERE id_berita='$a' ");
		return $var;
	}

	public function update_admin($a,$b,$c)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE admin  SET nama='$b',username='$c' WHERE id='$a' ");
		return $var;
	}

	public function update_kontak($a,$b,$c,$d)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE kontak  SET phone='$b',fax='$c',email='$d' WHERE id='$a' ");
		return $var;
	}

	public function update_video($a,$b)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("UPDATE video  SET judul='$b' WHERE id='$a' ");
		return $var;
	}


// =================== Function DELETE

	public function delete_admin($id)
	{
		$mysqli=$this->config->database();
		$var   =$mysqli->query("DELETE FROM admin WHERE id='$id' ");
		return $var;
	}

	public function delete_produk($id)
	{
		$mysqli=$this->config->database();
		$var   =$mysqli->query("DELETE FROM produk WHERE id='$id' ");
		return $var;
	}

	public function delete_berita($id)
	{
		$mysqli=$this->config->database();
		$var   =$mysqli->query("DELETE FROM berita WHERE id_berita='$id' ");
		return $var;
	}

	public function delete_pengaduan($id)
	{
		$mysqli=$this->config->database();
		$var   =$mysqli->query("DELETE FROM pengaduan WHERE id='$id' ");
		return $var;
	}

	public function delete_video($id)
	{
		$mysqli=$this->config->database();
		$var   =$mysqli->query("DELETE FROM video WHERE id='$id' ");
		return $var;
	}

	public function delete_sosmed($id)
	{
		$mysqli=$this->config->database();
		$var   =$mysqli->query("DELETE FROM sosmed WHERE id='$id' ");
		return $var;
	}

//==================== Function LOGIN

	public function cek_login($nik, $password)
	{
		$mysqli = $this->config->database();
		$var = $mysqli->query("SELECT * From users WHERE nik='$nik' AND password ='$password'");
		return $var;
	}

}
