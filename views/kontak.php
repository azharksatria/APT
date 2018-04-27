 <div class="box box-info">
            <div class="box-header">
        <?php $row=$query->tampil_kontak(); unset($_SESSION['update_kontak']);?>       
      <form action="root/proses.php?aksi=update_kontak" method="post" id="form-user" enctype="multipart/form-data" >
          <div class="box-body">
          <div class="form-group">
          <h3 class="box-title">Phone</h3>                  
          <input type="text" name="phone" required value="<?php echo $row['phone'];?>" class="form-control">
          </div>
          <div class="form-group">
          <h3 class="box-title">Email</h3>                  
          <input type="text" name="email" required value="<?php echo $row['email'];?>" class="form-control">
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          </div>
          <div class="form-group">
          <h3 class="box-title">Fax</h3>                  
          <input type="text" name="fax" required value="<?php echo $row['fax'];?>" class="form-control">
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