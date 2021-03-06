<?php
include'../config/controller.php';
// if(!isset($_SESSION['login_adminapt'])){
//   header("Location: login.php");
// }else{
include'../sweetalert/sweetalert.php';
include'../root/notification.php';
$query= new Database();

?>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
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
                  <?php if($_SESSION['level_adminapt'] !='0'){?>
                      <form id="form" style="width:120px" method="post">
                      <!--<select  class="form-control select2" name="kriteria" onchange="this.form.submit();">-->
                      <select  class="form-control select2" name="kriteria">
                      <option>Pilih Kriteria</option>
                      <?php $y=9; for ($x=1; $x<=$y; $x++)
                      {
                        echo "<option value=".$x.">Kreteria ".$x." </option>";
                       } ?>
                      </select>
                      </form>
                      <br>
                      <?php } ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th style="width: 30px;">No.</th>
                          <th>Kriteria Dokumen</th>
                          <th>Nomor Dokumen</th>
                          <th>Nama Dokumen</th>
                          <th>Dokumen</th>
                          <th>Keterangan</th>
                          <th>Tanggal Upload</th>
                          <th>Status</th>
                          <th>Progres</th>

                          <?php if($_SESSION['level_adminapt'] == '0' || $_SESSION['level_adminapt'] == '1'){?>
                          <th style="text-align: center;">Edit</th>
                          <?php } ?>
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
                          $data=$row['tanggal_upload'];
                          $pecah   =explode('-', $data);
                          $tahun   =$pecah[0];
                          $bulan   =$pecah[1];
                          $tanggal =substr($pecah[2],0,-8);
                          ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td>Kriteria <?php echo $row['kode_kriteria'];?></td>
                          <td><?php echo $row['no_dokumen'];?></td>
                          <td><?php echo $row['nama_dokumen'];?></td>
                          <td>
                            <?php
                              if($row['dokumen'] != null){
                                echo "<a target='_blank' href='views/view-dokumen.php?view&id=$row[id_dokumen]'>VIEW</a>";
                              }else{
                                echo "-";
                              };
                            ?>
                            </td>
                            <td><?php if($row['rekomendasi'] != null) echo $row['rekomendasi']; else echo "-"; ?></td>
                            <td><?php echo $tanggal.'-'.$bulan.'-'.$tahun;?></td>
                            <td><?php echo $row['status'];?></td>

                            <td align="center">
                              <a class="koreksi" data-id="<?php echo $row['id_dokumen'];?>" no-dokumen="<?php echo $row['no_dokumen'];?>" href="#"><h3><i class="ti-comment-alt"></i></h3></a>
                            </td>

                           <?php if($_SESSION['level_adminapt'] == '0' || $_SESSION['level_adminapt'] == '1'){?>
                            <td align="center">
                              <a class="editdok" data-id="<?php echo $row['id_dokumen'];?>" href="javascript:void(0)"><h3><li class="fa fa-edit"></li></h3></a>
                            </td>
                            <?php } ?>
                            <?php
                            if($_SESSION['level_adminapt'] == '0')
                            {
                            ?>
                            <td align="center">
                              <a class="deletedok" data-id="<?php echo $row['id_dokumen'];?>" href="javascript:void(0)"><h3><li class="fa fa-trash"></li></h3></a>
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

<script type="text/javascript">
$(document).ready(function () {
      $('.editdok').on('click', function (evt) {
          evt.preventDefault();
          var getLink = $(this).attr('data-id');
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load("views/edit-dokumen.php?edit&id="+getLink);
          console.log(getLink);
      });
      
      $('.deletedok').on('click', function (evt) {
          var confirmation = confirm("Yakin hapus dokumen ?");
          evt.preventDefault();
          var getLink = $(this).attr('data-id');
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          if (confirmation) {
              $.ajax({
                    url: "root/proses.php?aksi=delete_dokumen&id="+getLink, // proses
                    type: "GET", // metode untuk menjalankan form
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        console.log(data);
                        $('#mainContent').load('views/list-dokumen.php');
                        swal("Sukses","Dokumen Berhasil di Hapus","success");
                    },
                    error: function(data)
                    {
                      console.log(data.responseText);
                    }
                });
          }    
      });
      
      $('.koreksi').on('click', function (evt) {
          evt.preventDefault();
          var getLink = $(this).attr('data-id');
          var getDok = $(this).attr('no-dokumen');
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load("views/koreksi-dokumen.php?koreksi&id="+getLink+"&no_dokumen="+getDok);
          console.log(getLink);
      });
              //formsubmit
        $("#form").change(function(a) {
            a.preventDefault();
            $.ajax({
                url: "root/proses.php?aksi=kriteria", // proses
                type: "POST", // metode untuk menjalankan form
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    console.log(data);
                    $('#mainContent').load('views/list-dokumen.php');
                },
                error: function(data)
                {
                  console.log(data.responseText);
                }
            });
        });

        $('#example1').DataTable();

  });
</script>
