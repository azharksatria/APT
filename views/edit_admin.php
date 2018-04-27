    <!-- Form Element sizes -->  
    <?php 
    $var=$_SESSION['id_admin']; 
    $row=$query->edit_admin($var);
    unset($_SESSION['edit_admin']);
    ?>
    <div class="box box-warning col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="root/proses.php?aksi=update_admin" method="post">
              <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'];?>">
                  <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'];?>">
                </div>
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $row['username'];?>">
                </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>
            <!-- /.box-body -->
          </div>
         
          <!-- /.box -->

    </div>  