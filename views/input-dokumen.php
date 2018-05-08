<?php
include'../config/controller.php';
include'../sweetalert/sweetalert.php';
include'../root/notification.php';
$query= new Database();

?>
<h5 class="c-grey-900 mT-10 mB-20"><i class="c-blue-500 ti-share"></i> Input Dokumen</h5>
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>

    <div class="masonry-item col-md-12">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100 pX-20 pT-20">
                    <h6 class="lh-1" id="textup16">Input Dokumen</h6>
                </div>
                <div class="layer bdT p-20 w-100">
                       <form id="form"  method="post" enctype="multipart/form-data">
                         <div class="form-row">
                                           <div class="form-group col-md-6">
                                           <label for="inputState">Kriteria</label>
                                           <select id="kriteria" name="kriteria" class="form-control" required readonly="">
                                           <option value="<?php echo $_SESSION['kriteria'];?>" selected="selected">Kriteria <?php echo $_SESSION['kriteria'];?></option>
                                           <?php
                                           // for($i=1;$i<10;$i++){
                                           // echo "
                                           // <option value='$i'>Kriteria $i</option>";
                                           // }
                                           ?>
                                           </select>
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Nomor Dokumen</label><input type="text" class="form-control" id="nodokumen" name="no_dokumen" required>
                                           </div>

                                           <div class="form-group col-md-6">
                                           <label for="inputState">Nama Dokumen</label>
                                           <input type="text" class="form-control" id="namadokumen" name="nama_dokumen" required>
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Progres</label>
                                           <input type="number" max="100" class="form-control" id="progres" name="progres" required>
                                           </div>
                                           </div>


                                           <div class="form-row">
                                           <div class="form-group col-md-4">
                                           <label for="inputAddress2">Status</label>
                                           <div class="form-check" id="check1"><label class="form-check-label"><input class="form-check-input" type="radio" name="status" id="status" value="AL" required> Ada dan Lengkap</label></div>

                                           <div class="form-check" id="check2"><label class="form-check-label"><input class="form-check-input" type="radio" name="status" id="status" value="ATL"> Ada Tidak Lengkap</label></div>

                                           <div class="form-check" id="check3"><label class="form-check-label"><input class="form-check-input" type="radio" name="status" id="status" value="ATD"> Ada Tidak Ditemukan</label></div>

                                           <div class="form-check" id="check4"><label class="form-check-label"><input class="form-check-input" type="radio" name="status" id="status" value="BA"> Belum Ada</label></div>
                                           </div>
                                           <div class="form-group col-md-8">
                                           <div id="rekomendasi">
                                           <label for="inputPassword4">Rekomendasi</label>
                                           <textarea class="form-control" id="rekomendasitxt" name="rekomendasi" style="margin-top: 0px; margin-bottom: 0px; height: 66px;"></textarea>
                                           </div>
                                           <div id="berkas">
                                           <label for="inputPassword4">Upload Dokumen</label>
                                           <input type="file" id="berkastxt" accept=".doc,.pdf,.docx" class="form-control" name="file">
                                           </div>
                                           </div>
                                           </div>
                                           <button type="submit" class="btn btn-primary">SIMPAN</button>
                                           <button type="button" id="btnreset" class="btn btn-danger">RESET</button>
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

        $('#check1').on('click', function () {
            $("#rekomendasi").hide();
            $("#berkas").show();
            $("#berkastxt").attr("required", "required");
            $("#rekomendasitxt").removeAttr("required");
            $("#rekomendasitxt").val("");
        });
        $('#check2').on('click', function () {
            $("#rekomendasi").show();
            $("#berkas").hide();
            $("#rekomendasitxt").attr("required", "required");
            $("#berkastxt").removeAttr("required");
        });
        $('#check3').on('click', function () {
            $("#rekomendasi").show();
            $("#berkas").hide();
            $("#rekomendasitxt").attr("required", "required");
            $("#berkastxt").removeAttr("required");
        });
        $('#check4').on('click', function () {
            $("#rekomendasi").show();
            $("#berkas").hide();
            $("#rekomendasitxt").attr("required", "required");
            $("#berkastxt").removeAttr("required");
        });

        //btnreset
        $('#btnreset').on('click', function () {
            $("#nodokumen").val("");
            $("#namadokumen").val("");
            $("#rekomendasitxt").val("");
            $("#berkastxt").val("");
            $("#kriteria").prop("selectedIndex", 0);
            console.log('hi');
        });

        //formsubmit
        $("#form").on('submit',(function(a) {
            a.preventDefault();
            $.ajax({
                url: "root/proses.php?aksi=input_dokumen", // proses upload gambar
                type: "POST", // metode untuk menjalankan form
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,

                success: function(data){
                    console.log(data);
                    swal("Sukses","Dokumen Berhasil di Input","success");
                    $('#mainContent').load('views/list-dokumen.php');
                },
                error  : function(data){
                  console.log(data.responseText);
                }
            });
        }));
    });
</script>
