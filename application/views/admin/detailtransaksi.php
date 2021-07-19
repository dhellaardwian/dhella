<?php
if ($this->session->userdata('level') == "Admin") {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
             <h3 class="m-t-0 header-title m-b-30"><b>Rekening Transaksi</b></h3>
                 <table  class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Bank</th>
                            <th class="text-center">Nomor Rekening</th>
                            <th class="text-center">Nama Rekening</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($rekening as $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value->namaBank ?></td>
                            <td class="text-center"><?= $value->nomorRek ?></td>
                            <td class="text-center"><?= $value->namaRek ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table><br>
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
                          <th class="text-center">Aksi</th>
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
                          <td class="text-center">
                            <?php if ($value->statusPembayaran == 1) { ?>
                              <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#cek<?= $value->idTransaksi ?>">Cek Bukti Bayar</button>
                              <a href="<?= base_url('pemesanan/packing/' . $value->idTransaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
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
                  
                </div> 
            </div>

        <!-- /Cek bukti pembayaran -->
        <?php foreach ($pesananmasuk as $value) { ?>
          <div class="modal fade" id="cek<?= $value->idTransaksi ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><?= $value->noOrder ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table">
                    <tr>
                      <th>Nama Bank</th>
                      <th>:</th>
                      <td><?= $value->namaBank ?></td>
                    </tr>
                     <tr>
                      <th>Nama Rekening</th>
                      <th>:</th>
                      <td><?= $value->namaRek ?></td>
                    </tr>
                    <tr>
                      <th>No Rekening</th>
                      <th>:</th>
                      <td><?= $value->noRek ?></td>
                    </tr>
                    <tr>
                      <th>Total Bayar</th>
                      <th>:</th>
                      <td>Rp. <?= number_format($value->totalBayar, 0) ?></td>
                    </tr>
                  </table>
                 <img class="img-fluid pad" style="width: 500px" src="<?php echo base_url('assets/buktiPembayaran/' . $value->buktiPembayaran) ?>" alt="">
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <!-- /Bukti Pembayaran-->
        </div>
    </div>
</div>
<?php
    } else {
      redirect(base_url('beranda2'));
    }
      ?>
