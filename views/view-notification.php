<?php
include'../config/controller.php';
include'../sweetalert/sweetalert.php';
include'../root/notification.php';
$query= new Database();

if(isset($_GET['notif'])){
  $id=$_GET['id'];
  $query->update_notifikasi($id);
  $row=$query->tampil_notifikasi_where($id);
  $data=$row['date'];
  $pecah   =explode('-', $data);
  $tahun   =$pecah[0];
  $bulan   =$pecah[1];
  $tanggal =substr($pecah[2],0,-8);
}
?>
<h5 class="c-grey-900 mT-10 mB-20"><i class="c-blue-500 ti-share"></i>Saran Koreksi</h5>
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>

    <div class="masonry-item col-md-12">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100 pX-20 pT-20">
                    <h6 class="lh-1" id="textup16">Koreksi Dokumen</h6>
                </div>
                <div class="layer bdT p-20 w-100">
                       <form id="form"  method="post" enctype="multipart/form-data">
                         <div class="form-row">
                                           <!-- <div class="form-group col-md-6">
                                           <label for="inputState">Kriteria</label>
                                           <select id="inputState" name="kriteria" class="form-control">
                                           <option value="<?php echo $row['kode_kriteria'];?>" selected="selected"><?php echo $row['kode_kriteria'];?></option>
                                           <?php
                                           for($i=1;$i<10;$i++){
                                           echo "
                                           <option value='Kriteria $i'>Kriteria $i</option>";
                                           }
                                           ?>
                                           </select>
                                           </div> -->
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Nomor Dokumen</label>
                                           <input readonly="readonly" type="text" name="no_dokumen" value="<?php echo $row['no_dokumen'];?>" class="form-control">
                                           <input  type="hidden" name="kriteria" value="<?php echo $row['kode_kriteria'];?>" class="form-control">
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Tanggal Pengisian</label>
                                           <input readonly="readonly" type="text" value="<?php echo $tanggal.'-'.$bulan.'-'.$tahun;?>" class="form-control">
                                           </div>

                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Nama Pengoreksi</label>
                                           <input type="text" readonly="readonly" value="<?php echo $row['nama'];?>" class="form-control"  >
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Perbaikan Dokumen</label>
                                           <textarea readonly="readonly" class="form-control" name="perbaikan" style="margin-top: 0px; margin-bottom: 0px; height: 66px;"><?php echo $row['perbaikan'];?></textarea>
                                           </div>

                                           </div>

                       </form>

                </div>
            </div>
        </div>
    </div>

</div>
