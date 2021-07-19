<?php
if ($this->session->userdata('level') == "Pelapak") {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
        <h4 class="m-t-0 header-title m-b-30"><b>Data Pesanan</b></h4>
        <div class="col-lg-12"> 
                <ul class="nav nav-tabs tabs tabs-top" style="width: 100%;">
                    <li class="active tab" style="width: 25%;">
                        <a href="#home-21" data-toggle="tab" aria-expanded="false" class="active"> 
                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                            <span class="hidden-xs">Pesanan Masuk</span> 
                        </a> 
                    </li> 
                    <li class="tab" style="width: 25%;"> 
                        <a href="#profile-21" data-toggle="tab" aria-expanded="false"> 
                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                            <span class="hidden-xs">Packing</span> 
                        </a> 
                    </li> 
                    <li class="tab" style="width: 25%;"> 
                        <a href="#messages-21" data-toggle="tab" aria-expanded="true"> 
                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                            <span class="hidden-xs">Pengiriman</span> 
                        </a> 
                    </li> 
                    <li class="tab" style="width: 25%;"> 
                        <a href="#settings-21" data-toggle="tab" aria-expanded="false"> 
                            <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                            <span class="hidden-xs">Selesai</span> 
                        </a> 
                    </li> 
                     <li class="tab" style="width: 25%;"> 
                        <a href="#settings-22" data-toggle="tab" aria-expanded="false"> 
                            <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                            <span class="hidden-xs">Total Seluruh Dana</span> 
                        </a> 
                    </li> 
                <div class="indicator" style="right: 394px; left: 0px;"></div></ul> 
                <div class="tab-content"> 
                    <div class="tab-pane active" id="home-21"> 
                        <table class="table table-bordered m-0" class="text-center">
                        <tr>
                          <th class="text-center">No Order</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Nama Penerima</th>
                          <th class="text-center">Expedisi</th>
                          <th class="text-center">Total Bayar</th>
                        </tr>
                        <?php foreach ($pesananmasuk as $value) { ?>
                         <tr>
                          <td class="text-center"><?= $value->noOrder ?></td>
                          <td class="text-center"><?= $value->tglOrder ?></td>
                          <td class="text-center"><?= $value->nmPenerima ?></td>
                          <td class="text-center">
                            <b><?= $value->kurir ?><br></b>
                            Paket : <?= $value->paket_nama ?><br>
                            Ongkir : Rp <?= number_format($value->ongkir, 0) ?>
                          </td>
                          <td class="text-center">
                            Rp <?= number_format($value->totalBayar, 0) ?><br>
                            <?php if ($value->statusPembayaran == 0) { ?>
                              <span class="badge badge-warning">Belum Bayar</span>
                            <?php } else { ?>
                              <span class="badge badge-success">Sudah Bayar</span> <br>
                              <span class="badge badge-primary">Menunggu Verifikasi</span>
                            <?php } ?>
                          </td>
                      </tr>
                        <?php } ?>
                      </table>
                    </div> 
                    <div class="tab-pane" id="profile-21" style="display: none;">
                        <table class="table table-bordered m-0" class="text-center">
                            <tr>
                              <th class="text-center">No Order</th>
                              <th class="text-center">Tanggal</th>
                              <th class="text-center">Nama Penerima</th>
                              <th class="text-center">Expedisi</th>
                              <th class="text-center">Total Bayar</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                              <?php foreach ($packing as $value) { ?>
                              <tr>
                                <td class="text-center"><?= $value->noOrder ?></td>
                                <td class="text-center"><?= $value->tglOrder ?></td>
                                <td class="text-center"><?= $value->nmPenerima ?></td>
                                <td class="text-center">
                                   <b><?= $value->kurir ?><br></b>
                                      Paket : <?= $value->paket_nama ?><br>
                                      Ongkir : Rp <?= number_format($value->ongkir, 0) ?>
                                </td>
                                <td class="text-center">
                                  Rp <?= number_format($value->totalBayar, 0) ?><br>
                                  <span class="badge badge-primary">Packing</span>
                                </td>
                                <td class="text-center">
                                <?php if ($value->statusPembayaran == 1) { ?>
                                  <button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#kirim<?= $value->idTransaksi ?>"><i class="fa fa-paper-plane"></i> Kirim</button>
                                <?php } ?>
                              </td>
                              </tr>
                            <?php } ?>
                        </table>
                    </div> 
                    <div class="tab-pane" id="messages-21" style="display: none;">
                        <table class="table table-bordered m-0" class="text-center">
                            <tr>
                              <th class="text-center">No Order</th>
                              <th class="text-center">Tanggal</th>
                              <th class="text-center">Nama Penerima</th>
                              <th class="text-center">Expedisi</th>
                              <th class="text-center">Total Bayar</th>
                              <th class="text-center">Nomor Resi</th>
                            </tr>
                            <?php foreach ($dikirim as  $value) { ?>
                            <tr>
                              <td class="text-center"><?= $value->noOrder ?></td>
                              <td class="text-center"><?= $value->tglOrder ?></td>
                              <td class="text-center"><?= $value->nmPenerima ?></td>
                              <td class="text-center">
                                <b><?= $value->kurir ?><br></b>
                                Paket : <?= $value->paket_nama ?><br>
                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                              </td>
                              <td class="text-center">
                                Rp. <?= number_format($value->totalBayar, 0) ?><br>
                                
                              </td>
                              <td class="text-center">
                                <?= $value->noresi ?><br>
                                <span class="badge badge-success">Dikirim</span>
                              </td>
                            </tr>
                          <?php } ?>
                        </table>
                    </div> 
                    <div class="tab-pane" id="settings-21" style="display: none;">
                       <table class="table table-bordered m-0" class="text-center">
                        <tr>
                          <th class="text-center">No Order</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Nama Penerima</th>
                          <th class="text-center">Expedisi</th>
                          <th class="text-center">Total Bayar</th>
                          <th class="text-center">Nomor Resi</th>
                          <?php foreach ($selesai as $value) { ?>
                          <tr>
                            <td class="text-center"><?= $value->noOrder ?></td>
                            <td class=""><?= $value->tglOrder ?></td>
                            <td class="text-center"><?= $value->nmPenerima ?></td>
                            <td class="text-center">
                              <b><?= $value->kurir ?><br></b>
                              Paket : <?= $value->paket_nama ?><br>
                              Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                            </td>
                            <td>
                              Rp. <?= number_format($value->totalBayar, 0) ?>
                            </td>
                            <td class="text-center">
                              <?= $value->noresi ?><br>
                              <span class="badge badge-success">Diterima</span>
                            </td>
                          </tr>
                        <?php } ?>

                        </tr>
                    </table> 
                    </div> 
                     <div class="tab-pane" id="settings-22" style="display: none;">
                       <table class="table table-bordered m-0" class="text-center">
                        <tr>
                          <th class="text-center">Total Dana</th>
                          <?php foreach ($penarikan as $value) { ?>
                          <tr>
                            <td class="text-center">Rp. <?= number_format($value->totalSaldo, 0) ?></td>
                            
                          </tr>
                        <?php } ?>

                        </tr>
                    </table> 
                    </div> 
                </div> 
            </div>

        <!-- /Upload Resi-->
        <?php foreach ($packing as  $value) { ?>
          <div class="modal fade" id="kirim<?= $value->idTransaksi ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><?= $value->noOrder ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <?php echo form_open('pemesanan/dikirim/' . $value->idTransaksi) ?>
                  <table class="table">
                    <tr>
                      <th>Expedisi</th>
                      <th>:</th>
                      <th><?= $value->kurir ?></th>
                    </tr>
                    <tr>
                      <th>Paket</th>
                      <th>:</th>
                      <th><?= $value->paket_nama ?></th>
                    </tr>
                    <tr>
                      <th>Ongkir</th>
                      <th>:</th>
                      <th>Rp. <?= number_format($value->ongkir, 0) ?></th>
                    </tr>
                    <tr>
                      <th>No Resi</th>
                      <th>:</th>
                      <th><input name="noresi" class="form-control" placeholder="No Resi" required></th>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?php echo form_close() ?>
              </div>
            </div>
          </div>
        <?php } ?>
         <!-- /Upload Resi-->
        </div>
    </div>
</div>
 <script type="text/javascript">
        (function () {
          $('#idPelapak').on('change', function(e) {
              console.log('hai')
            if ($(this).val()) {
              console.log('halo')
              var dataSaldo = $('#idPelapak').data('saldo')
              $('#show_saldo').val(dataSaldo)
            }else{
              $('#show_saldo').val(0)
            }
          });
        })()
      </script>
<?php
    } else {
      redirect(base_url('beranda2'));
    }
      ?>
