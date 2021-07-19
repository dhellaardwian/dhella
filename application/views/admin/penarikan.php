<?php
if ($this->session->userdata('level') == "Admin") {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title m-b-30"><b>Penarikan Dana</b></h4>
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
                            <th>Tanggal Penarikan</th>
                            <th>Jumlah Penarikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($penarikan as  $value) { ?>
                        <tr>
                            <td ><?= $no++; ?></td>
                            <td ><?= $value->namaUmkm ?></td>
                            <td ><?= $value->penarikan_tanggal ?></td>
                            <td ><?= $value->penarikan_saldo ?></td>
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
                  <h4 class="modal-title">Penarikan Dana</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                    <?php 
                      echo form_open('penarikan/add');
                    ?>
                    <div class="form-group">
                      <label>Nama UMKM</label>
                      <select name="idPelapak" class="form-control" id="idPelapak">
                        <option value="">--Pilih UMKM--</option>
                        <?php 
                        $pelapakumkm = $this->m_pelapakumkm->tampil_pelapakumkm();
                        foreach ($pelapakumkm as $key => $value) { ?>
                            <option value="<?= $value->idPelapak ?>" data-saldo="Rp. <?= number_format($value->totalSaldo, 0) ?>"><?= $value->namaUmkm ?></option>
                        <?php } ?>
                      </select>           
                    </div> 
                    <div class="form-group">
                      <label>Saldo Dimiliki</label>
                      <input type="text" readonly class="form-control" id="show_saldo">
                    </div>
                    <div class="form-group">
                      <label>Total Saldo Penarikan</label>
                      <input type="text" class="form-control" name="saldo" id="saldo_akhir">
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


      <script type="text/javascript">
        (function () {
          $('#idPelapak').on('change', function(e) {
              console.log('hai')
            if ($(this).val()) {
              console.log('halo')
              var dataSaldo = $('#idPelapak option:selected').data('saldo')
              $('#show_saldo').val(dataSaldo)
              $('#saldo_akhir').attr({
                "max" : dataSaldo,
              });
            }else{
              $('#show_saldo').val(0)
              $('#saldo_akhir').attr({
                "max": 0,
              });
            }
          });
        })()
      </script>

<?php
    } else {
      redirect(base_url('beranda'));
    }
      ?>