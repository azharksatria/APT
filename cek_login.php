<?php
session_start();

class Koneksi
{
	var $host     ="localhost";
	var $username ="root";
	var $password ="password";
	var $db       ="apt";

	public function  database()
	{
		$mysqli=new mysqli($this->host,$this->username,$this->password,$this->db);
		return $mysqli;
	}

	public	function cek_login($a,$b)
		{
		$mysqli=$this->database();
		$query = $mysqli->query("SELECT * FROM admin WHERE username='$a' AND password='$b' ");
		$data  = $query->fetch_array();
		$cek   = $query->num_rows;
		if($cek==1){
			$_SESSION['login_adminapt']=$data['nama'];
			$_SESSION['level_adminapt']=$data['level'];
      	header('location:index2.php');
			return TRUE;
		}else{
      header('locaton:login.php');
			return FALSE;
		}
	}
}

?>
