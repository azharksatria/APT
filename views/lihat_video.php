
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Video</h3>
            </div>
            <div class="box-header">
              <a href="#input_video" data-toggle="tab">
              <button class="btn btn-success">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example6" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 30px;">No.</th>
                  <th>Judul Video</th>
                  <th>Video</th>
                  <th style="text-align: center;">Edit</th>
                  <th style="text-align: center;">Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($query->tampil_video() as $row) {?>
                <tr>
                  <td><?php echo $no++;?></td>
                <form action="root/proses.php?aksi=update_video" method="post" name="postvideo">
                  <td>
                  	<input type="text" name="judul" class="form-control" value="<?php echo $row['judul'];?>">
                  	<input type="hidden" name="id" class="form-control" value="<?php echo $row['id'];?>">
                  </td>
                  <td><?php echo $row['video'];?></td>
                  <td align="center"><button type="submit" class="btn btn-primary">EDIT</button></td>
                  <td align="center">
                </form>
                    <a href="root/proses.php?aksi=delete_video&id=<?php echo $row['id'];?> "><h3><li class="fa fa-trash"></li></h3></a>
                  </td>
                </tr>
                <?php } ?>
                    </tbody>
              </table>
            </div>

            <!-- /.box-body -->
          </div>