<?php
session_start();
// if($_SESSION['login_admin']==FALSE){
// 	header('location:/');
// }

class Koneksi
{
	// var $host     ="apt.uma.ac.id";
	// var $username ="aptumaac_user";
	// var $password ="passwordapt";
	// var $db       ="aptumaac_apt";

	var $host     ="localhost";
	var $username ="root";
	var $password ="password";
	var $db       ="aptumaac_apt";

	public function  database()
	{
		$mysql=new mysqli($this->host,$this->username,$this->password,$this->db);
		return $mysql;
	}
}
