<?php
include'../config/controller.php';
include'../sweetalert/sweetalert.php';
include'../root/notification.php';
$query= new Database();
if(isset($_GET['view']))
{
  $id=$_GET['id'];
  $row=$query->tampil_dokumen_where($id);
  $file=$row['dokumen'];

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<style type="text/css">
	html, body{
  height: 100%;
}.view{
   height: 100%; 
}
	</style>
</head>
<body>
    <div class="view">
		<iframe src="http://docs.google.com/viewer?url=http://apt.uma.ac.id/root/<?php echo $file;?>&embedded=true" width="100%"
		height="100%"
		style="border: none;">
		
		</iframe>
    </div>
</body>
</html>