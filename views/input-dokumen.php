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
                                           <select id="inputState" name="kriteria" class="form-control">
                                           <option selected="selected">- Pilih Kriteria Dokumen -</option>
                                           <?php
                                           for($i=1;$i<10;$i++){
                                           echo "
                                           <option value=$i>Kriteria $i</option>";
                                           }
                                           ?>
                                           </select>
                                           </div>
                                           <div class="form-group col-md-6">
                                           <label for="inputPassword4">Nomor Dokumen</label><input type="text" class="form-control" id="inputPassword4" name="no_dokumen">
                                           </div>
                                           </div>
                                           <div class="form-group">
                                           <label for="inputAddress">Nama Dokumen</label><input type="text" class="form-control" id="inputAddress" name="nama_dokumen">
                                           </div>

                                           <div class="form-row">
                                           <div class="form-group col-md-4">
                                           <label for="inputAddress2">Status</label>
                                           <div class="form-check" id="check1"><label class="form-check-label"><input class="form-check-input" type="radio" name="status" id="gridRadios1" value="AL"> Ada dan Lengkap</label></div>

                                           <div class="form-check" id="check2"><label class="form-check-label"><input class="form-check-input" type="radio" name="status" id="gridRadios1" value="ATL"> Ada Tidak Lengkap</label></div>

                                           <div class="form-check" id="check3"><label class="form-check-label"><input class="form-check-input" type="radio" name="status" id="gridRadios1" value="ATD"> Ada Tidak Ditemukan</label></div>

                                           <div class="form-check" id="check4"><label class="form-check-label"><input class="form-check-input" type="radio" name="status" id="gridRadios1" value="BA"> Belum Ada</label></div>
                                           </div>
                                           <div class="form-group col-md-8">
                                           <div id="rekomendasi">
                                           <label for="inputPassword4">Rekomendasi</label>
                                           <textarea class="form-control" name="rekomendasi" style="margin-top: 0px; margin-bottom: 0px; height: 66px;"></textarea>
                                           </div>
                                           <div id="berkas">
                                           <label for="inputPassword4">Upload Dokumen</label>
                                           <input type="file" class="form-control" accept=".doc,.pdf,.docx" name="file">
                                           </div>
                                           </div>
                                           </div>
                                           <button type="submit" class="btn btn-primary">SIMPAN</button>
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
        });
        $('#check2').on('click', function () {
            $("#rekomendasi").show();
            $("#berkas").hide();
        });
        $('#check3').on('click', function () {
            $("#rekomendasi").show();
            $("#berkas").hide();
        });
        $('#check4').on('click', function () {
            $("#rekomendasi").show();
            $("#berkas").hide();
        });

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
                    // if(data=='invalid file'){
                    //     // invalid file format.
                    //     $("#pesan-error").html("Format gambar tidak valid").fadeIn();
                    // }else{
                    //     // hasil upload gambar
                    //     //swal("Sukses","Dokumen Berhasil di Input","success")
                    //     $("#form")[0].reset();
                    // }
                    swal("Sukses","Dokumen Berhasil di Input","success");
                },
                error: function(data){
                  console.log(data.responseText);
                }
            });
        }));
    });
</script>
