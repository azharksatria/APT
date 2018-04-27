<?php
session_start();
// if($_SESSION['login_admin']==FALSE){
// 	header('location:/');
// }

class Koneksi 
{
	var $host     ="localhost";
	var $username ="root";
	var $password ="password";
	var $db       ="apt";

	public function  database()
	{
		$mysql=new mysqli($this->host,$this->username,$this->password,$this->db);
		return $mysql;
	}
}