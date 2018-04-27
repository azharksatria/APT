
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Sosial Media</h3>
            </div>
            <div class="box-header">
              <a href="#input_sosmed" data-toggle="tab">
              <button class="btn btn-success">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example6" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 30px;">No.</th>
                  <th>Link</th>
                  <th>Icon</th>
                  <th style="text-align: center;">Edit</th>
                  <th style="text-align: center;">Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($query->tampil_sosmed() as $row) {?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td>
                  	<?php echo $row['link'];?>
                  </td>
                  <td><img src="root/<?php echo $row['icon'];?>"></td>
                  <td align="center">
                  	<a href="root/proses.php?aksi=edit_sosmed&id=<?php echo $row['id'];?> "><h3><li class="fa fa-edit"></li></h3></a>
                  </td>
                  <td align="center">
                    <a href="root/proses.php?aksi=delete_sosmed&id=<?php echo $row['id'];?> "><h3><li class="fa fa-trash"></li></h3></a>
                  </td>
                </tr>
                <?php } ?>
                    </tbody>
              </table>
            </div>

            <!-- /.box-body -->
          </div>