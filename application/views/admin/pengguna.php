<?php
if ($this->session->userdata('level') == "Admin") {
?>
<div class="row">
<div class="col-sm-12">
<div class="card-box table-responsive">
    <h4 class="m-t-0 header-title m-b-30"><b>Data Pengguna</b></h4>
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
                    <th>Nama Pengguna</th>
                     <th>Username</th>
                    <th>Level</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; 
                foreach ($pengguna as $value) { ?>
                <tr>
                    <td ><?= $no++; ?></td>
                    <td ><?= $value->namaPengguna ?></td>
                    <td ><?= $value->username ?></td>
                    <td ><?= $value->level?></td>
                    <td class="text-center"><img src="<?= base_url('assets/foto/' . $value->foto) ?>" width="50px"></td>
                    <td class="text-center"> 
                        <button class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#edit<?= $value->idUser  ?>"><i class="fa fa-pencil"></i></button>
                        <button class="on-default remove-row btn btn-danger" data-toggle="modal" data-target="#delete<?= $value->idUser  ?>"><i class="fa fa-trash"></i></button>
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
          <h4 class="modal-title" >Data Pengguna</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <?php 
              echo form_open_multipart('pengguna/add');
            ?>

            <div class="form-group">
              <label>Nama Pengguna</label>
              <input type="text" name="namaPengguna" class="form-control" placeholder="Nama Pengguna" required>
            </div>
             <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
             <div class="form-group">
              <label>Password</label>
              <input type="text" name="pass" class="form-control" placeholder="Password" required>
            </div> 
            <div class="form-group">
              <label>Level</label>
              <select name="level" class="form-control">
                        <option value="1" selected> Admin</option>
                        <option value="2">Pelapak</option>
              </select>
            </div> 
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="foto" class="form-control" required>
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
  <?php  foreach ($pengguna as $value) { ?>
    <div class="modal fade" id="edit<?= $value->idUser ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Pengguna</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php 
                echo form_open_multipart('pengguna/edit/'.$value->idUser);
              ?>
                 <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" name="namaPengguna" value="<?= $value->namaPengguna ?>" class="form-control" placeholder="Nama Pengguna" required>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Username" required>
              </div>
               <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control">
                          <option value="1" <?php if($value->level==1){
                            echo 'selected';
                            } ?>> Admin</option>
                          <option value="2"<?php if($value->level==2){
                            echo 'selected';
                            } ?>>Pelapak</option>
                </select>
              </div>
              <div class="form-group"> 
                <?php if ($value->foto): ?>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <img src="<?= base_url('./assets/foto/'.$value->foto) ?>" style="width: 100%;">
                        </div>
                    </div>
                <?php endif ?>
                    <div class="form-group">
                        <label>Ubah Foto
                        <input type="file" name="foto" class="form-control" id="preview_gambar"></label>
                    </div>
              </div>
         </div><br>
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
   <?php  foreach ($pengguna as $value) { ?>
   <div class="modal fade" id="delete<?= $value->idUser ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Menghapus <?= $value->namaPengguna ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>Apakah yakin ingin menghapus ini?</h5>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <a href="<?= base_url('pengguna/delete/'.$value->idUser) ?>" class="btn btn-primary">Hapus</a>
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
<script>
  function bacaGambar(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#gambar_load').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#preview_gambar").change(function() {
      bacaGambar(this);
  });
</script>