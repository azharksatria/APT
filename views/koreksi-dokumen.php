<?php
include'../config/controller.php';
include'../sweetalert/sweetalert.php';
include'../root/notification.php';
$query= new Database();

if(isset($_GET['koreksi'])){
  $id=$_GET['id'];
  $dokumen=$_GET['no_dokumen'];
  $row=$query->koreksi_dokumen_where($id);
  $data=$row['tanggal_upload'];
  $pecah   =explode('-', $data);
  $tahun   =$pecah[0];
  $bulan   =$pecah[1];
  $tanggal =substr($pecah[2],0,-8);
}
?>
<h5 class="c-grey-900 mT-10 mB-20"><i class="c-blue-500 ti-share"></i> Koreksi Dokumen</h5>
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
                                           <input  type="hidden" name="nama" value="<?php echo $_SESSION['login_adminapt'];?>" class="form-control">
                                           <input  type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Tanggal Pengisian</label>
                                           <input readonly="readonly" type="text" value="<?php echo $tanggal.'-'.$bulan.'-'.$tahun;?>" class="form-control">
                                           </div>

                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Nama Dokumen</label>
                                           <input type="text" readonly="readonly" value="<?php echo $row['nama_dokumen'];?>" class="form-control"  >
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Perbaikan Dokumen</label>
                                           <textarea class="form-control" name="perbaikan" style="margin-top: 0px; margin-bottom: 0px; height: 66px;"></textarea>
                                           </div>
                                           <div class="form-group col-md-6">
                                             <label for="inputPassword4">Upload Dokumen</label>
                                             <input type="file" class="form-control" accept=".doc,.docx,.pdf" name="file">
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">History</label>
                                              <!-- <p style="border: 1px solid #ced4da;border-radius:5px;padding:10px;">
                                             <?php $no='1'; foreach ($query->history($dokumen) as $data)
                                             { echo $no++.'. '.$data['progres'].'%';
                                               echo " "." <a target='_blank' href='views/view-progres.php?view&id=$data[id_history]'> Dokumen</a>"."<br>";}?>
                                           </p> -->

                                           <table id="example6" class="table table-bordered table-striped">
                                               <thead>
                                                 <tr>
                                                   <td>No</no>
                                                   <td>Persentase</td>
                                                   <td>Dokumen</td>
                                                   <td>Pengoreksi</td>
                                                   <td>Tanggal</td>
                                                 </tr>
                                               </thead>
                                               <tbody>
                                                 <?php $no='1'; foreach ($query->history($dokumen) as $data)
                                                 {
                                                 $date=$data['date'];
                                                 $tglindo   =explode('-', $date);
                                                 $tahunid   =$tglindo[0];
                                                 $bulanid   =$tglindo[1];
                                                 $tanggalid =substr($tglindo[2],0,-8); ?>
                                                 <tr>
                                                   <td><?php echo $no++;?></td>
                                                   <td><?php echo $data['progres'].'%';?></td>
                                                   <td><?php echo " "." <a target='_blank' href='views/view-progres.php?view&id=$data[id_history]'> Dokumen</a>";?></td>
                                                   <td><?php echo $data['nama'];?></td>
                                                   <td><?php echo $tanggalid.'-'.$bulanid.'-'.$tahunid;?></td>
                                                 </tr>
                                               <?php } ?>
                                               </tbody>
                                             </table>
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Progres</label>
                                           <input type="number" max="100" required class="form-control" name="progres">
                                           </div>
                                           </div>

                                           <div class="form-row">
                                           <div class="form-group col-md-4">
                                           <label for="inputAddress2">Status</label>
                                           <div class="form-check" ><label class="form-check-label"><input class="form-check-input" type="radio" name="status" <?php if($row['status']=='AL'){echo 'checked';} ?> id="gridRadios1" value="AL"> Ada dan Lengkap</label></div>

                                           <div class="form-check" ><label class="form-check-label"><input class="form-check-input" type="radio" name="status" <?php if($row['status']=='ATL'){echo 'checked';} ?> id="gridRadios1" value="ATL"> Ada Tidak Lengkap</label></div>

                                           <div class="form-check" ><label class="form-check-label"><input class="form-check-input" type="radio" name="status" <?php if($row['status']=='ATD'){echo 'checked';} ?> id="gridRadios1" value="ATD"> Ada Tidak Ditemukan</label></div>

                                           <div class="form-check" ><label class="form-check-label"><input class="form-check-input" type="radio" name="status" <?php if($row['status']=='BA'){echo 'checked';} ?> id="gridRadios1" value="BA"> Belum Ada</label></div>
                                           </div>

                                           </div>
                                           <button type="submit" class="btn btn-primary">SAVE</button>
                       </form>

                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#rekomendasi").hide();
        $("#berkas").hide();
        //btnreset
        $("#form").on('submit',(function(a) {
            a.preventDefault();
            $.ajax({
                url: "./root/proses.php?aksi=koreksi_dokumen", // proses upload gambar
                type: "POST", // metode untuk menjalankan form
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,

                success: function(data){
                    console.log(data);
                    swal("Sukses","Dokumen Berhasil di Update","success");
                    $('#mainContent').load('views/list-dokumen.php');
                },
                error: function(data){
                  console.log(data.responseText);
                }
            });
        }));
    });
</script>
