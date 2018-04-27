<!--  -->
         <script>
            function viewSosmed(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var previewSosmed=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        previewSosmed.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(previewSosmed);

    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                       swal("Oops..!", "Tipe file tidak sesuai..!", "error");
                    }
                   
                }    
            }
        </script>

 <div class="box box-info">
            <div class="box-header">
              
      <form action="root/proses.php?aksi=input_sosmed" method="post" id="form-user" enctype="multipart/form-data" >
          <div class="box-body">
          <div class="form-group">
          <h3 class="box-title">Link</h3>                  
          <input type="text" name="link" required class="form-control">
          </div>
          
          <div class="form-group" >
          <h3 class="box-title">Icon</h3>                  
          <input type="file" name="photo" required accept="image/*"  onchange="viewSosmed(this,'previewSosmed')">
          <img id="previewSosmed" src="" alt="" width="320px"/>
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


