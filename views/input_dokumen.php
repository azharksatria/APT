<!--  -->
         <script>
            function viewBerita(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var previewBerita=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        previewBerita.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(previewBerita);

    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                       swal("Oops..!", "Tipe file tidak sesuai..!", "error");
                    }
                   
                }    
            }
        </script>
            <script type="text/javascript">

            $(function() {
            $('input[name="status"]').on('click', function() {
            if ($(this).val() == 'AL') {
            $('#textboxes').show();
            }
            else {
            $('#textboxes').hide();
            }
            });
            });

            $(function() {
            $('input[name="status"]').on('click', function() {
            if ($(this).val() == 'ATL') {
            $('#textboxes1').show();
            }
            else {
            $('#textboxes1').hide();
            }
            });
            });

            </script>
 <div class="box box-info">
 <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <div class="box-header">
              
      <form id="form"  method="post" enctype="multipart/form-data">
          <div class="box-body">

            <div class="form-group">
            <h3 class="box-title">Kriteria</h3>
            <select required name="kriteria" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            </select>                  
            </div>

            <div class="form-group">
            <h3 class="box-title">No Dokumen</h3>
              <input type="text" required name="no_dokumen" class="form-control">                 
            </div>

            <div class="form-group">
            <h3 class="box-title">Nama Dokumen</h3>
              <input type="text" required name="nama_dokumen" class="form-control">                 
            </div>

          <div class="form-group" >
          <h3 class="box-title">Status</h3>
          
                    <div class="radio">
                        <label>
                        <input type="radio" required name="status" id="optionsRadios2" value="AL">
                        Ada Lengkap
                        </label>
                    </div>
                    <div id="textboxes" style="display: none">
                      <h3 class="box-title">File</h3>  <h10>pdf & docx </h10>
                      <input type="file" name="file">
                    </div>

          <div class="radio">
                      <label>
                        <input type="radio" required name="status" id="optionsRadios2" value="ATL">
                        Ada Tidak Lengkap
                      </label>
                    </div>

                    <div id="textboxes1" style="display: none">
                      <h3 class="box-title">Rekomendasi</h3>
                      <textarea class="form-control" rows="3"></textarea>
                    </div>
          </div>

          <div class="box-body">
          <div class="form-group" >
          <button type="submit" class="btn btn-primary"> SIMPAN</button>
          </div>
          </div>
              </form>
            </div>
          </div>

         <script type="text/javascript">
             $(document).ready(function (a) {
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
             
             if(data=='invalid file'){
             // invalid file format.
             $("#pesan-error").html("Format gambar tidak valid").fadeIn();
             }else{
             // hasil upload gambar
            swal("Sukses","Dokumen Berhasil di Input","success")
             $("#form")[0].reset(); 
             }
             }          
             });
             }));
             });
         </script>
        


