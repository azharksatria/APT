
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Admin</h3>
            </div>
            <div class="box-header">
              <a href="#tambah_admin" data-toggle="tab">
              <button class="btn btn-success">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 30px;">No.</th>
                  <th>Nama</th>
                  <th>Leval</th>
                  <th>Terakhir Login</th>
                  <th style="text-align: center;">Aksi</th>
                  <th style="text-align: center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($query->tampil_admin() as $row) {?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['level'];?></td>
                  <td><?php echo $row['login'];?></td>
                  <td align="center">
                    <a href="root/proses.php?aksi=edit_admin&id=<?php echo $row['id'];?> "><h3><li class="fa fa-edit"></li></h3></a>
                  </td>
                  <td align="center">
                    <a href="root/proses.php?aksi=delete_admin&id=<?php echo $row['id'];?> "><h3><li class="fa fa-trash"></li></h3></a>
                  </td>
                </tr>
                <?php } ?>
                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>