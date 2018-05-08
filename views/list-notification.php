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
<h5 class="c-grey-900 mT-10 mB-20"><i class="c-red-500 ti-files"></i> List Koreksi</h5>
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>

    <div class="masonry-item col-md-12">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100 pX-20 pT-20">
                    <h6 class="lh-1" id="textup16">List Koreksi</h6>
                </div>
                <div class="layer bdT p-20 w-100">
                  <?php if($_SESSION['level_adminapt'] !='0'){?>

                      <?php } ?>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th style="width: 30px;">No.</th>
                          <th>Nama Pengkoreksi</th>
                          <th>Nomor Dokumen</th>
                          <th>Tanggal Koreksi</th>
                          <th>Saran Koreksi</th>

                        </thead>
                        <tbody>
                        <?php
                        $no=1; foreach ($query->tampil_notifikasi_full() as $row) {
                          $data=$row['date'];
                          $pecah   =explode('-', $data);
                          $tahun   =$pecah[0];
                          $bulan   =$pecah[1];
                          $tanggal =substr($pecah[2],0,-8);
                          ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $row['nama'];?></td>
                          <td><?php echo $row['no_dokumen'];?></td>
                            <td><?php echo $tanggal.'-'.$bulan.'-'.$tahun;?></td>
                            <td><?php echo $row['perbaikan'];?></td>

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
      $('.editdok').on('click', function (evt) {
          evt.preventDefault();
          var getLink = $(this).attr('data-id');
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load("views/edit-dokumen.php?edit&id="+getLink);
          console.log(getLink);
      });

</script>
<script>
    $(document).ready(function(){
        $('#example2').DataTable();
    });
</script>
