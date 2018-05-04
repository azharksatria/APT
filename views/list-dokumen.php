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
                    <h6 class="lh-1" id="textup16">List Dokumen</h6>
                </div>
                <div class="layer bdT p-20 w-100">
                    <div id="dataTable_wrapper" class="dataTables_wrapper">
                      <table id="dataTable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dataTable_info"
                            style="width: 100%;">
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
                          <?php
                          if($_SESSION['level_adminapt'] == '0')
                          {
                          ?> 
                            <th style="text-align: center;">Hapus</th>
                          <?php
                          }
                          ?>
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
                            <td>
                              <?php echo $query->kriteria($row['kode_kriteria']); ?>
                            </td>
                            <td><?php echo $row['no_dokumen'];?></td>
                            <td><?php echo $row['nama_dokumen'];?></td>
                            <td>
                              <?php
                                if($row['dokumen'] != null){ 
                                  echo "<a target='_blank' href='views/view-dokumen.php?view&id=$row[id_dokumen]'><i class='c-red-500 ti-files'></i> View</a>";
                                }else{
                                  echo "-";
                                };
                              ?>
                            </td>
                            <td><?php if($row['rekomendasi'] != null) echo $row['rekomendasi']; else echo "-"; ?></td>
                            <td><?php echo $tanggal.'-'.$bulan.'-'.$tahun;?></td>
                            <td align="center">
                              <a class="editdok" data-id="<?php echo $row['id_dokumen'];?>" href="javascript:void(0)"><h3><li class="fa fa-edit"></li></h3></a>
                            </td>
                            <?php
                            if($_SESSION['level_adminapt'] == '0')
                            {
                            ?>
                            <td align="center">
                              <a class="deletedok" data-id="<?php echo $row['id_dokumen'];?>" href="javascript:void(0)" onclick="return confirm('Yakin Hapus Dokumen ?')"><h3><li class="fa fa-trash"></li></h3></a>
                            </td>
                            <?php
                            }
                            ?>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $('.editdok').on('click', function (evt) {
        evt.preventDefault();
        var getLink = $(this).attr('data-id');
        span = $('<span>... processing ...</span>');
        $('#mainContent').load("views/edit-dokumen.php?edit&id="+getLink);
        console.log(getLink);
    });

    $('.deletedok').on('click', function (evt) {
          evt.preventDefault();
          var id = $(this).attr('data-id');
          var getUrl = "root/proses.php?aksi=delete_dokumen&id="+id;
          $.ajax({
            type: "GET",
            dataType: 'json',
            url : getUrl,
            success: function(data){
              console.log(data);
              //swal("Sukses","Dokumen Berhasil di Hapus","success");
              //$('#mainContent').load('views/list-dokumen.php');
            },
            error: function(data){
              //console.log(data.responseText);     
              // console.log('error');
              // console.log(data.responseText);
              swal("Sukses","Dokumen Berhasil di Hapus","success");
              $('#mainContent').load('views/list-dokumen.php');
            }
          });
          //$('#mainContent').replaceWith(span);
          
          //console.log(this.href);
      });
</script>
