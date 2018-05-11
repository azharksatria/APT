<?php
include'../config/controller.php';
$query= new Database();

$id=$_SESSION['kriteria'];
$row=$query->notification_row($id);
echo $row;

?>
