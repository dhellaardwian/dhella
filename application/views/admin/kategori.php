<?php
if ($this->session->userdata('level') == "Admin") {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title m-b-30"><b>Data Kategori</b></h4>
            <div style="width:100%; text-align:right; margin-bottom:10px;">
                <button data-toggle="modal" data-target="#add" type="button" class="on-default edit-row btn btn-success" ><i class="fa fa-plus"></i>
                </button>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($kategori as  $value) { ?>
                        <tr>
                            <td ><?= $no++; ?></td>
                            <td ><?= $value->namaKategori ?></td>
                            <td> 
                                <button class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#edit<?= $value->idkategori  ?>"><i class="fa fa-pencil"></i></button>
                                <button class="on-default remove-row btn btn-danger" data-toggle="modal" data-target="#delete<?= $value->idkategori  ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div>


           <!-- /.modal  add-->
           <div class="modal fade" id="add">
            <div class="modal-dialog" style="width:55%;">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Data Kategori</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <?php 
                      echo form_open('kategori/add');
                    ?>

                    <div class="form-group">
                      <label >Nama Kategori</label>
                      <input type="text" name="namaKategori" class="form-control" placeholder="Nama Kategori" required>
                    </div>
                                  
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php 
                      echo form_close();
                ?>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

        <!-- /.modal  edit-->
      <?php  foreach ($kategori as  $value) { ?>
        <div class="modal fade" id="edit<?= $value->idkategori ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                  <?php 
                    echo form_open('kategori/edit/'.$value->idkategori);
                  ?>
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="namaKategori" value="<?= $value->namaKategori ?>" class="form-control" placeholder="Nama Kategori" required>
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              <?php 
                    echo form_close();
              ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <?php } ?>

       <!-- /.modal  delete-->
       <?php  foreach ($kategori as $value) { ?>
       <div class="modal fade" id="delete<?= $value->idkategori ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Menghapus <?= $value->namaKategori ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <h5>Apakah yakin ingin menghapus ini?</h5>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('kategori/delete/'.$value->idkategori) ?>" class="btn btn-primary">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>

<?php
    } else {
      redirect(base_url('beranda'));
    }
      ?>