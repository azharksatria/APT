<!--  -->
         <script>
            function viewProduk(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var previewProduk=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        previewProduk.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(previewProduk);

    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                       swal("Oops..!", "Tipe file tidak sesuai..!", "error");
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
          <input type="file" name="photo" required accept="image/*"  onchange="tampilkanPhoto(this,'preview')">
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
              
      <form action="root/proses.php?aksi=input_produk" method="post" id="form-user" enctype="multipart/form-data" >
          <div class="box-body">
          <div class="form-group">
          <h3 class="box-title">Nama Produk</h3>                  
          <input type="text" name="nama" required class="form-control">
          </div>
          
          <div class="form-group" >
          <h3 class="box-title">Pilih Foto</h3> <h7>[ 730 x 490 ] </h7>               
          <input type="file" name="photo" required accept="image/*"  onchange="viewProduk(this,'previewProduk')">
          <img id="previewProduk" src="" alt="" width="320px"/>
          </div>
          </div>
 
          <div class="box-body pad">

          <textarea  name="editor2" class="ckeditor"></textarea>
            <script type="text/javascript">
            CKEDITOR.replace( 'editor2' );
            CKEDITOR.add            
            </script>
          </div>

          <div class="box-body">
          <div class="form-group" >
          <button type="submit" class="btn btn-primary"> SIMPAN</button>
          </div>
          </div>
              </form>
            </div>
          </div>


