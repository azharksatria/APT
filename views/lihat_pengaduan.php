<?php 
$a=$_SESSION['id_pengaduan'];
$row=$query->tampil_pengaduan_where($a);
unset($_SESSION['lihat_pengaduan']);
//var_dump($row);
?>
<div class="box box-info">
            <div class="box-header">
              
          <div class="box-body pad">
          <?php echo $row['hal'];?><hr>
          <h3 class="box-title">Keterangan</h3>  
          <?php echo $row['keterangan'];?>
          </div>
          </div>
          </div>
       