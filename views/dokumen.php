
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Berita</h3>
            </div>
            <div class="box-header">
              <a href="#input_dokumen" data-toggle="tab">
              <button class="btn btn-success">Tambah</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 30px;">No.</th>
                  <th>Judul Berita</th>
                  <th>Berita</th>
                  <th>Kategori</th>
                  <th>Photo</th>
                  <th style="text-align: center;">Edit</th>
                  <th style="text-align: center;">Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($query->tampil_berita_full() as $row) {?>
                <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $row['judul'];?></td>
                  <td><?php echo substr($row['berita'],0,50);?></td>
                  <td><?php echo $row['kategori'];?></td>
                  <td><img src="root/<?php echo $row['photo'];?>" width="30%"></td>
                  <td align="center">
                    <a href="root/proses.php?aksi=edit_berita&id=<?php echo $row['id_berita'];?> "><h3><li class="fa fa-edit"></li></h3></a>
                  </td>
                  <td align="center">
                    <a href="root/proses.php?aksi=delete_berita&id=<?php echo $row['id_berita'];?> "><h3><li class="fa fa-trash"></li></h3></a>
                  </td>
                </tr>
                <?php } ?>
                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>