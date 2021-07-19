<?php
if ($this->session->userdata('level') == "Admin") {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title m-b-30"><b>Rekening Pelapak</b></h4>
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
                            <th>Nama UMKM</th>
                            <th>Nama Bank</th>
                            <th>Nomor Rekening</th>
                            <th>Nama Rekening</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($rekeningpelapak as $value) { ?>
                        <tr>
                            <td ><?= $no++; ?></td>
                            <td ><?= $value->namaUmkm?></td>
                            <td ><?= $value->namaBank?></td>
                            <td ><?= $value->noRek?></td>
                            <td ><?= $value->namaRek?></td>
                            <td class="text-center"> 
                                <button class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#edit<?= $value->idRekening  ?>"><i class="fa fa-pencil"></i></button>
                                <button class="on-default remove-row btn btn-danger" data-toggle="modal" data-target="#delete<?= $value->idRekening  ?>"><i class="fa fa-trash"></i></button>
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
                  <h4 class="modal-title">Rekening Pelapak</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <?php 
                      echo form_open('rekeningpelapak/add');
                    ?>
                    <div class="form-group">
                    <label>Nama UMKM</label>
                        <select name="idPelapak" class="form-control">
                        <option value="">--Pilih UMKM--</option>
                        <?php 
                        $pelapakumkm = $this->m_pelapakumkm->tampil_pelapakumkm();
                        foreach ($pelapakumkm as $key => $value) { ?>
                            <option value="<?= $value->idPelapak ?>"><?= $value->namaUmkm ?></option>
                        <?php } ?>
                        </select>           
                    </div>   
                    <div class="form-group">
                      <label >Nama Bank</label>
                      <input type="text" name="namaBank" class="form-control" placeholder="Nama Bank" required>
                    </div>
                     <div class="form-group">
                      <label >Nomor Rekening</label>
                      <input type="text" name="noRek" class="form-control" placeholder="Nomor Rekening" required>
                    </div>
                     <div class="form-group">
                      <label >Nama Rekening</label>
                      <input type="text" name="namaRek" class="form-control" placeholder="Nama Rekening" required>
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
      <?php  foreach ($rekeningpelapak as $value) { ?>
        <div class="modal fade" id="edit<?= $value->idRekening ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Rekening Pelapak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <div class="modal-body">

                  <?php 
                    echo form_open('rekeningpelapak/edit/'.$value->idRekening);
                  ?>
                  <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" name="namaBank" value="<?=$value->namaBank ?>" class="form-control" placeholder="Nama Bank" required>
                  </div>
                   <div class="form-group">
                    <label>Nomor Rekening</label>
                    <input type="text" name="noRek" value="<?=$value->noRek ?>" class="form-control" placeholder="Nomor Rekening" required>
                  </div>
                   <div class="form-group">
                    <label>Nama Rekening</label>
                    <input type="text" name="namaRek" value="<?=$value->namaRek ?>" class="form-control" placeholder="Nama Rekening" required>
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
       <!-- /.modal-delete -->
<?php  foreach ($rekeningpelapak as  $value) { ?>
       <div class="modal fade" id="delete<?= $value->idRekening ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Menghapus Rekening <?= $value->namaUmkm ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              
              </button>
            </div>
            <div class="modal-body">

              <h5>Apakah yakin ingin menghapus ini?</h5>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('rekeningpelapak/delete/'.$value->idRekening) ?>" class="btn btn-primary">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>

  <?php
    } else {
      redirect(base_url('beranda2'));
    }
      ?>
