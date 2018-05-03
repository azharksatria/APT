<?php
include'../config/controller.php';
// if(!isset($_SESSION['login_adminapt'])){
//   header("Location: login.php");
// }else{
include'../sweetalert/sweetalert.php';
include'../root/notification.php';
$query= new Database();
  // var_dump($berita);
  // var_dump($slider);
  // var_dump($pimpinan);
  // var_dump($pengaduan);
  // var_dump($edit_admin);
  // var_dump($admin);
  // var_dump($produk);
  // var_dump($edit_berita);
  //var_dump($lihat_pengaduan);
?>
<h5 class="c-grey-900 mT-10 mB-20"><i class="c-red-500 ti-files"></i> List Dokumen</h5>
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>

    <div class="masonry-item col-md-12">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100 pX-20 pT-20">
                    <h6 class="lh-1" id="textup16">Input Dokumen</h6>
                </div>
                <div class="layer bdT p-20 w-100">
                    <table id="example5" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th style="width: 30px;">No.</th>
                          <th>Kriteria Dokumen</th>
                          <th>Nomor Dokumen</th>
                          <th>Nama Dokumen</th>
                          <th>Dokumen</th>
                          <th>Komentar</th>
                          <th>Tanggal Upload</th>
                          <th style="text-align: center;">Edit</th>
                          <th style="text-align: center;">Hapus</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1; foreach ($query->tampil_dokumen_full() as $row) {
                          $data=$row['date'];
                          $pecah   =explode('-', $data);
                          $tahun   =$pecah[0];
                          $bulan   =$pecah[1];
                          $tanggal =substr($pecah[2],0,-8);
                          ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $row['kode_kriteria'];?></td>
                          <td><?php echo $row['no_dokumen'];?></td>
                          <td><?php echo $row['nama_dokumen'];?></td>
                          <td><?php if($row['dokumen'] != null) echo $row['dokumen']; else echo "-"; ?></td>
                          <td><?php if($row['rekomendasi'] != null) echo $row['rekomendasi']; else echo "-"; ?></td>
                          <td><?php echo $tanggal.'-'.$bulan.'-'.$tahun;?></td>
                          <td align="center">
                            <a id="edit" data-id="<?php echo $row['id_dokumen'];?>" href="#"><h3><li class="fa fa-edit"></li></h3></a>
                          </td>
                          <td align="center">
                            <a href="root/proses.php?aksi=delete_dokumen&id=<?php echo $row['id_dokumen'];?> "><h3><li class="fa fa-trash"></li></h3></a>
                          </td>
                        </tr>
                        <?php } ?>
                            </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
      $('#edit').on('click', function (evt) {
          evt.preventDefault();
          var getLink = $(this).attr('data-id');
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load("views/edit-dokumen.php?edit&id="+getLink);
          console.log(getLink);
      });
</script>
