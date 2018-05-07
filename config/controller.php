<?php
include'config.php';
class Database
{
	public function __construct()
	{
		$this->config=new Koneksi();
	}

// =================== Function CREATE
	public function input_dokumen_file($a,$b,$c,$d,$e)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO dokumen (kode_kriteria,no_dokumen,nama_dokumen,dokumen,tanggal_upload,status)  VALUES('$a','$b','$c','$d',NOW(),'$e')");
		return $var;
	}

	public function input_dokumen($a,$b,$c,$d,$e)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO dokumen (kode_kriteria,no_dokumen,nama_dokumen,tanggal_upload,status,rekomendasi) VALUES('$a','$b','$c',NOW(),'$d','$e')");
		return $var;
	}

	public function koreksi_dokumen_file($a,$b,$c,$d,$e,$f)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO history  VALUES(NULL,'$a','$b','$c','$d','$e','$f',NOW())");
		return $var;
		var_dump($var);
	}

	public function koreksi_dokumen($a,$b,$c,$d,$e)
	{
		$mysqli=$this->config->database();
		$var=$mysqli->query("INSERT INTO history  VALUES(NULL,'$a','$b','$c',NULL,'$d','$e',NOW())");
		return $var;
		var_dump($var);
	}

	public function kriteria($no)
	{
		if($no == '1')
            return 'Kriteria 1';
        elseif($no == '2')
        	return 'Kriteria 2';
        elseif($no == '3')
        	return 'Kriteria 3';
        elseif($no == '4')
        	return 'Kriteria 4';
        elseif($no == '5')
        	return 'Kriteria 5';
       	elseif($no == '6')
        	return 'Kriteria 6';
        elseif($no == '7')
        	return 'Kriteria 7';
        elseif($no == '8')
        	return 'Kriteria 8';
        else
        	return 'Kriteria 9';
	}


// =================== Function READ
	public function tampil_dokumen_full()
	{
		if($_SESSION['level_adminapt']=='1')
		{
			$where="SELECT * FROM dokumen ORDER BY kode_kriteria ASC";
		}
		if($_SESSION['level_adminapt']=='2' || $_SESSION['level_adminapt']=='0')
		{
			$where="SELECT * FROM dokumen WHERE kode_kriteria='".$_SESSION['kriteria']."' ";
		}
		// if($_SESSION['level_adminapt']=='3' || $_SESSION['level_adminapt']=='0')		
		// {
		// 	$where="SELECT * FROM dokumen WHERE kode_kriteria='".$_SESSION['kriteria']."' ";
		// }
		$mysqli=$this->config->database();
		$data   =$mysqli->query("$where");
		foreach ($data as $row)
		{
			$var[]=$row;
		}
		return $var;
	}

	public function tampil_dokumen_where($a)
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM dokumen WHERE id_dokumen='$a' ");
		$var=$data->fetch_array();
		return $var;
	}

	public function koreksi_dokumen_where($a)
	{
		$mysqli=$this->config->database();
		$data   =$mysqli->query("SELECT * FROM dokumen WHERE id_dokumen='$a' ");
		$var=$data->fetch_array();
		return $var;
	}

	public function history($id)
	{
		$mysqli =$this->config->database();
		$data   =$mysqli->query("SELECT * FROM history WHERE no_dokumen='$id' ");
	foreach ($data as $row) {
		$var[]=$row;
	}
	return $var;
	}

	public function notification($id)
	{
		$mysqli =$this->config->database();
		$data   =$mysqli->query("SELECT * FROM history WHERE kriteria='$id' ");
	foreach ($data as $row) {
		$var[]=$row;
	}
	return $var;
	}

	// public function tampil_berita()
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM berita LIMIT 3");
	// 	foreach ($data as $row)
	// 	{
	// 		$var[]=$row;
	// 	}
	// 	return $var;
	// }
	//
	// public function tampil_berita_full()
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM dokumen");
	// 	foreach ($data as $row)
	// 	{
	// 		$var[]=$row;
	// 	}
	// 	return $var;
	// }
	//

	// public function tampil_sosmed_where($a)
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM sosmed WHERE id='$a' ");
	// 	$var=$data->fetch_array();
	// 	return $var;
	// }
	//
	// public function tampil_pengaduan()
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM pengaduan ");
	// 	foreach ($data as $row)
	// 	{
	// 		$var[]=$row;
	// 	}
	// 	return $var;
	// }
	//
	// public function tampil_video()
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM video ");
	// 	foreach ($data as $row)
	// 	{
	// 		$var[]=$row;
	// 	}
	// 	return $var;
	// }
	//
	// public function tampil_sosmed()
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM sosmed ");
	// 	foreach ($data as $row)
	// 	{
	// 		$var[]=$row;
	// 	}
	// 	return $var;
	// }
	//
	// public function tampil_pengaduan_where($a)
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM pengaduan WHERE id='$a' ");
	// 	$var=$data->fetch_array();
	// 	//var_dump($a); exit();
	// 	return $var;
	// }
	//
	// public function edit_admin($a)
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM admin WHERE id='$a' ");
	// 	$var=$data->fetch_array();
	// 	//var_dump($a); exit();
	// 	return $var;
	// }
	//
	// public function edit_produk($a)
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM produk WHERE id='$a' ");
	// 	$var=$data->fetch_array();
	// 	//var_dump($a); exit();
	// 	return $var;
	// }
	//
	// public function tampil_kontak()
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM kontak  ");
	// 	$var=$data->fetch_array();
	// 	return $var;
	// }
	//
	// public function tampil_admin()
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM admin  ");
	// 	foreach ($data as $row) {
	// 		$var[]=$row;
	// 	}
	// 	return $var;
	// }
	//
	// public function tampil_produk()
	// {
	// 	$mysqli=$this->config->database();
	// 	$data   =$mysqli->query("SELECT * FROM produk  ");
	// 	foreach ($data as $row) {
	// 		$var[]=$row;
	// 	}
	// 	return $var;
	// }

// =================== Function UPDATE

public function update_dokumen_file($a,$b,$c,$d,$e,$f)
{
	$mysqli=$this->config->database();
	$var=$mysqli->query("UPDATE dokumen SET kode_kriteria='$b',no_dokumen='$c',nama_dokumen='$d',dokumen='$e',status='$f',
		rekomendasi=NULL,updated=NOW() WHERE id_dokumen='$a' ");
	return $var;
	var_dump($var);
}

public function update_dokumen($a,$b,$c,$d,$e,$f)
{
	$mysqli=$this->config->database();
	$var=$mysqli->query("UPDATE dokumen SET kode_kriteria='$b',no_dokumen='$c',nama_dokumen='$d',status='$e',
		rekomendasi='$f',updated=NOW() WHERE id_dokumen='$a' ");
	return $var;
	var_dump($var);
}

public function update_status($a,$b)
{
	$mysqli=$this->config->database();
	$var=$mysqli->query("UPDATE dokumen SET status='$a',updated=NOW() WHERE id_dokumen='$b' ");
	return $var;
	var_dump($var);
}
	// public function update_slider($id,$photo)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var   =$mysqli->query("UPDATE slider SET gambar='$photo' WHERE id='$id' ");
	// 	$_SESSION['slider']='active';
	// 	return $var;
	//
	// }
	//
	// public function update_pimpinan($a,$b,$c,$d,$e)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE pimpinan  SET title='$b',nama='$c',gambar='$d',kata_sambutan='$e' WHERE id='$a' ");
	// 	$_SESSION['update_pimpinan']='active';
	// 	return $var;
	// }
	//
	// public function update_pimpinan_foto($a,$b,$c,$d)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE pimpinan  SET title='$b',nama='$c',kata_sambutan='$d' WHERE id='$a' ");
	// 	return $var;
	// }
	//
	// public function update_sosmed($a,$b,$c)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE sosmed  SET link='$b',icon='$c' WHERE id='$a' ");
	// 	$_SESSION['sosmed']='Update';
	// 	return $var;
	// }
	//
	// public function update_sosmed_foto($a,$b)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE sosmed  SET link='$b' WHERE id='$a' ");
	// 	return $var;
	// }
	//
	// public function update_produk($a,$b,$c,$d)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE produk  SET nama='$b',photo='$c',keterangan='$d' WHERE id='$a' ");
	// 	return $var;
	// }
	//
	// public function update_produk_foto($a,$b,$c)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE produk  SET nama='$b',keterangan='$c' WHERE id='$a' ");
	// 	return $var;
	// 	var_dump($var);
	// }
	//
	// public function update_berita($a,$b,$c,$d,$e)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE berita  SET judul='$b',photo='$c',berita='$d',kategori='$e' WHERE id_berita='$a' ");
	// 	return $var;
	// }
	//
	// public function update_berita_foto($a,$b,$c,$d)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE berita  SET judul='$b',berita='$c',kategori='$d' WHERE id_berita='$a' ");
	// 	return $var;
	// }
	//
	// public function update_admin($a,$b,$c)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE admin  SET nama='$b',username='$c' WHERE id='$a' ");
	// 	return $var;
	// }
	//
	// public function update_kontak($a,$b,$c,$d)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE kontak  SET phone='$b',fax='$c',email='$d' WHERE id='$a' ");
	// 	return $var;
	// }
	//
	// public function update_video($a,$b)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var=$mysqli->query("UPDATE video  SET judul='$b' WHERE id='$a' ");
	// 	return $var;
	// }


// =================== Function DELETE

	public function delete_dokumen($id)
	{
		$mysqli=$this->config->database();
		$var   =$mysqli->query("DELETE FROM dokumen WHERE id_dokumen='$id' ");
		// if($var)
		// 	return '0';
		// else
		// 	return '1';
		//return $var;
	}

	// public function delete_produk($id)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var   =$mysqli->query("DELETE FROM produk WHERE id='$id' ");
	// 	return $var;
	// }
	//
	// public function delete_berita($id)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var   =$mysqli->query("DELETE FROM berita WHERE id_berita='$id' ");
	// 	return $var;
	// }
	//
	// public function delete_pengaduan($id)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var   =$mysqli->query("DELETE FROM pengaduan WHERE id='$id' ");
	// 	return $var;
	// }
	//
	// public function delete_video($id)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var   =$mysqli->query("DELETE FROM video WHERE id='$id' ");
	// 	return $var;
	// }
	//
	// public function delete_sosmed($id)
	// {
	// 	$mysqli=$this->config->database();
	// 	$var   =$mysqli->query("DELETE FROM sosmed WHERE id='$id' ");
	// 	return $var;
	// }

//==================== Function LOGIN

	// public function cek_login($nik, $password)
	// {
	// 	$mysqli = $this->config->database();
	// 	$var = $mysqli->query("SELECT * From users WHERE nik='$nik' AND password ='$password'");
	// 	return $var;
	// }

}
