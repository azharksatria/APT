         <script>
            function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        preview.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(preview);

    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                       swal("Oops..!", "Tipe file tidak sesuai..!", "error")
                    }
                   
                }    
            }
        </script>
<!-- <div class="box box-info">
            <div class="box-header">
              
			<form method="post" id="form-user" enctype="multipart/form-data" >
					<div class="box-body">
					<div class="form-group">
					<h3 class="box-title">Judul Berita</h3>                  
					<input type="text" name="judul" required class="form-control">
					</div>
					
          <div class="form-group" >
          <h3 class="box-title">Pilih Gambar</h3>                  
          <input type="file" name="photo" required accept="image/*"  onchange="tampilkanPreview(this,'preview')">
          <img id="preview" src="" alt="" width="320px"/>
          </div>
          </div>

					<div class="form-group" >
					<textarea name="editor" id="editor"></textarea>
          </div>

					<div class="box-body">
					<div class="form-group" >
					<button type="submit" class="btn btn-primary"> SIMPAN</button>
					</div>
					</div>
              </form>
            </div>
          </div>
 -->
<!--  <script type="text/javascript">
 	$(document).ready(function (a) {
 $("#form-user").on('submit',(function(a) {
  a.preventDefault();
  $.ajax({
   url: "root/proses.php?aksi=input", // proses upload gambar
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
     $("#hasil").html(data).fadeIn();
    }
      }         
    });
 }));
});
 </script> -->


 <div class="box box-info">
            <div class="box-header">
        <?php $row=$query->tampil_pimpinan();?>       
      <form action="root/proses.php?aksi=update_pimpinan" method="post" id="form-user" enctype="multipart/form-data" >
          <div class="box-body">
          <div class="form-group">
          <h3 class="box-title">Title</h3>                  
          <input type="text" name="title" required value="<?php echo $row['title'];?>" class="form-control">
          </div>
          <div class="form-group">
          <h3 class="box-title">Nama Pimpinan</h3>                  
          <input type="text" name="nama" required value="<?php echo $row['nama'];?>" class="form-control">
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          </div>
          <div class="form-group">
          <img src="root/<?php echo $row['gambar'];?>">                  
          </div>

          <div class="form-group" >
          <h3 class="box-title">Pilih Foto </h3> <h7>[ 300 x 375 ] </h7>
          <input type="file" name="photo"  accept="image/*"  onchange="tampilkanPreview(this,'preview')">
          <img id="preview" src="" alt="" width="320px"/>
          </div>
          </div>
 
          <div class="box-body pad">
          <h3 class="box-title">Kata Sambutan</h3>  
          <textarea  name="editor" class="ckeditor" ><?php echo $row['kata_sambutan'];?></textarea>
            <script type="text/javascript">
            CKEDITOR.replace( 'editor' );
            CKEDITOR.add            
            </script>
          </div>

          <div class="box-body">
          <div class="form-group" >
          <button type="submit" class="btn btn-primary">UPDATE</button>
          </div>
          </div>
              </form>
            </div>
          </div>


