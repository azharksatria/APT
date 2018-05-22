<?php
include'../config/controller.php';
// include'../config/validasi.js';
include'../sweetalert/sweetalert.php';
include'../root/notification.php';
$query= new Database();

?>
<h5 class="c-grey-900 mT-10 mB-20"><i class="c-blue-500 ti-share"></i> Ganti Password</h5>
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>

    <div class="masonry-item col-md-12">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100 pX-20 pT-20">
                    <h6 class="lh-1" id="textup16"> Ganti Password</h6>
                </div>
                <div class="layer bdT p-20 w-100">
                       <form id="form"  method="post" enctype="multipart/form-data">
                         <div class="form-row">
                                           <div class="form-group col-md-6">
                                           <label for="inputState">Username</label>
                                           <input type="text" class="form-control" value="<?php echo $_SESSION['username'];?>"  id="password_baru"  readonly>
                                           </div>

                                           <div class="form-group col-md-6">
                                           <label for="inputState">Password Baru</label>
                                           <input type="password" class="form-control"  id="password_lama" name="password_baru" required>
                                           <span id="pesan" class="pesan-confirm"></span>
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

        //formsubmit
        $("#form").on('submit',(function(a) {
            a.preventDefault();
            $.ajax({
                url: "root/proses.php?aksi=gantipassword", // proses upload gambar
                type: "POST", // metode untuk menjalankan form
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,

                success: function(data){
                    console.log(data);
                    swal("Sukses","Password Berhasil di Ganti","success");
                    $('#mainContent').load('views/index.php');
                },
                error  : function(data){
                  console.log(data.responseText);
                }
            });
        }));
    });
</script>
