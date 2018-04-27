
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengaduan Masyarakat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 30px;">No.</th>
                  <th>Nama</th>
                  <th>Hal</th>
                  <th style="text-align: center;">Lihat</th>
                  <th style="text-align: center;">Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($query->tampil_pengaduan() as $row) {?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['hal'];?></td>
                  <td align="center"><a href="root/proses.php?aksi=lihat_pengaduan&id=<?php echo $row['id'];?> "><h3><li class="fa fa-eye"></li></h3></a></td>
                  <td align="center"><a href="root/proses.php?aksi=delete_pengaduan&id=<?php echo $row['id'];?> "><h3><li class="fa fa-trash"></li></h3></a></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
