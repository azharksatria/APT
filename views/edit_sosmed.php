<!--  -->
         <script>
            function editSosmed(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var previewEditSosmed=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        previewEditSosmed.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(previewEditSosmed);

    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                       swal("Oops..!", "Tipe file tidak sesuai..!", "error");
                    }
                   
                }    
            }
        </script>

<?php
$var=$_SESSION['id_sosmed'];
 $row=$query->tampil_sosmed_where($var);
 ?>
 <div class="box box-info">
            <div class="box-header">
      <form action="root/proses.php?aksi=update_sosmed" method="post" id="form-user" enctype="multipart/form-data" >
          <div class="box-body">
          <div class="form-group">
          <h3 class="box-title">Link</h3>                  
          <input type="text" name="link" value="<?php echo $row['link'];?>" class="form-control">
          <input type="text" name="id" value="<?php echo $row['id'];?>" class="form-control">
          </div>
          
          <div class="form-group" >
          <img src="root/<?php echo $row['icon'];?>">                
          </div>

          <div class="form-group" >
          <h3 class="box-title">Pilih Icon</h3>                  
          <input type="file" name="photo"  accept="image/*"  onchange="editSosmed(this,'previewEditSosmed')">
          <img id="previewEditSosmed" src="" alt="" width="320px"/>
          </div>
          </div>
          <div class="box-body">
          <div class="form-group" >
          <button type="submit" class="btn btn-primary"> UPDATE</button>
          </div>
          </div>
              </form>
            </div>
          </div>


