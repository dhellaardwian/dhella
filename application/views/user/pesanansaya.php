<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="<?php echo base_url('home/lokasi'); ?>"><i class="fa fa-home"></i> Lokasi</a>
                        <a href="<?php echo base_url('keranjang'); ?>"> Keranjang</a>
                        <span>Data Pesanan</span>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12" >
                <ul style="background-color:#e7ab3c;" class="nav nav-tabs tabs" style="width: 100%;">
                    <li class="active tab" style="width: 25%;">
                        <a id="aBelumBayar" href="#" data-toggle="tab" aria-expanded="true" class="active"> 
                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                            <span class="hidden-xs" >Belum Bayar</span> 
                        </a> 
                    </li> 
                    <li class="active tab" style="width: 25%;"> 
                        <a id="aDikemas" href="#" data-toggle="tab" aria-expanded="true" class="active"> 
                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                            <span class="hidden-xs">Dikemas</span> 
                        </a> 
                    </li> 
                    <li class="active tab" style="width: 25%;"> 
                        <a id="aDikirim" href="#" data-toggle="tab" aria-expanded="true" class="active"> 
                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                            <span class="hidden-xs">Dikirim</span> 
                        </a> 
                    </li> 
                   <li class="active tab" style="width: 25%;">
                        <a id="aSelesai" href="#" data-toggle="tab" aria-expanded="true" class="active"> 
                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                            <span class="hidden-xs" >Riwayat Pesanan</span> 
                        </a> 
                    </li>
                <div class="indicator" style="right: 436px; left: 0px;"></div></ul> 
                <div class="tab-content"> 
                    <div class="tab-pane active" id="belum-bayar"> 
                        <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Tanggal</th>
                                    <th>Nama Penerima</th>
                                    <th>Expedisi</th>
                                    <th>Total Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php foreach ($belum_bayar as $value) { ?>
                                <tr>
                                  <td class="text-center"><?= $value->noOrder ?></td>
                                  <td class="text-center"><?= $value->tglOrder ?></td>
                                   <td class="text-center"><?= $value->nmPenerima ?></td>
                                  <td class="text-center">
                                    <b><?= $value->kurir ?><br></b>
                                    Paket  : <?= $value->paket_nama ?><br>
                                    Ongkir : Rp <?= number_format($value->ongkir, 0) ?>
                                  </td>
                                  <td class="text-center">
                                    Rp. <?= number_format($value->totalBayar, 0) ?><br>
                                    <?php if ($value->statusPembayaran == 0) { ?>
                                      <span class="badge badge-warning" style="background-color: goldenrod;">Belum Bayar</span>
                                    <?php } else { ?>
                                      <span class="badge badge-primary" style="background-color: goldenrod;">Menunggu Verifikasi</span>
                                    <?php } ?>
                                  </td>
                                  <td class="text-center">
                                    <?php if ($value->statusPembayaran == 0) { ?>
                                      <a href="<?= base_url('pemesanan/pembayaran/' . $value->idTransaksi) ?>" class="btn btn-sm btn-flat btn-primary" style="background-color: goldenrod;">Bayar</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                              <?php } ?>
                            </thead>
                        </table>
                    </div>
                    </div> 
                    <div class="tab-pane active" id="dikemas" style="display: none;">
                        <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Tanggal</th>
                                    <th>Nama Penerima</th>
                                    <th>Expedisi</th>
                                    <th>Total Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php foreach ($diproses as $value) { ?>
                                  <tr>
                                    <td class="text-center"><?= $value->noOrder ?></td>
                                    <td class="text-center"><?= $value->tglOrder ?></td>
                                    <td class="text-center"><?= $value->nmPenerima ?></td>
                                    <td class="text-center">
                                      <b><?= $value->kurir ?><br></b>
                                      Paket  : <?= $value->paket_nama ?><br>
                                      Ongkir : Rp <?= number_format($value->ongkir, 0) ?>
                                    </td>
                                    <td class="text-center">
                                      Rp. <?= number_format($value->totalBayar, 0) ?><br>
                                      <span class="badge badge-success" style="background-color: goldenrod;">Terverifikasi</span> <br>
                                      <span class="badge badge-primary" style="background-color: goldenrod;">Diproses</span>
                                    </td>
                                  </tr>
                                <?php } ?>
                            </thead>
                        </table>
                    </div> 
                </div>
                    <div class="tab-pane active" id="dikirim" style="display: none;">
                        <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Tanggal</th>
                                    <th>Nama Penerima</th>
                                    <th>Expedisi</th>
                                    <th>Total Bayar</th>
                                    <th>Nomor Resi</th>
                                </tr>
                                <?php foreach ($dikirim as $value) { ?>
                                  <tr>
                                    <td class="text-center"><?= $value->noOrder ?></td>
                                    <td class="text-center"><?= $value->tglOrder ?></td>
                                    <td class="text-center"><?= $value->nmPenerima ?></td>
                                    <td class="text-center">
                                      <b><?= $value->kurir ?><br></b>
                                      Paket  : <?= $value->paket_nama ?><br>
                                      Ongkir : Rp <?= number_format($value->ongkir, 0) ?>
                                    </td>
                                    <td class="text-center">
                                      Rp. <?= number_format($value->totalBayar, 0) ?><br>
                                      <span class="badge badge-success" style="background-color: goldenrod;">Dikirim</span> <br>
                                    </td>
                                    <td class="text-center">
                                      <?= $value->noresi ?><br>
                                      <button class="btn btn-sm btn-flat btn-primary" style="background-color: goldenrod;" data-toggle="modal" data-target="#sukses<?= $value->idTransaksi ?>">Diterima</button>
                                    </td>
                                  </tr>
                                <?php } ?>
                            </thead>
                        </table>
                     </div>
                    </div> 
                    <div class="tab-pane active" id="selesai" style="display: none;">
                        <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No Order</th>
                                    <th>Tanggal</th>
                                    <th>Nama Penerima</th>
                                    <th>Expedisi</th>
                                    <th>Total Bayar</th>
                                    <th>Nomor Resi</th>
                                </tr>
                                <?php foreach ($selesai as $key => $value) { ?>
                                  <tr>
                                    <td class="text-center"><?= $value->noOrder ?></td>
                                    <td class="text-center"><?= $value->tglOrder ?></td>
                                    <td class="text-center"><?= $value->nmPenerima ?></td>
                                    <td class="text-center">
                                      <b><?= $value->kurir ?><br></b>
                                      Paket  : <?= $value->paket_nama ?><br>
                                      Ongkir : Rp <?= number_format($value->ongkir, 0) ?>
                                    </td>
                                    <td class="text-center">
                                      Rp. <?= number_format($value->totalBayar, 0) ?>
                                    </td>
                                    <td class="text-center">
                                      <?= $value->noresi ?><br>
                                      <span class="badge badge-success" style="background-color: goldenrod;">Selesai</span> <br>
                                    </td>
                                  </tr>
                                <?php } ?>
                            </thead>
                        </table>
                     </div>
                    </div> 

                    <!-- /Cek data diterimaa -->
                    <?php foreach ($dikirim as  $value) { ?>
                      <div class="modal fade" id="sukses<?= $value->idTransaksi ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Pesanan Telah Sampai</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Pesanan Sudah Diterima ?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: goldenrod;">Tidak</button>
                              <a href="<?= base_url('pemesanan/sukses/' . $value->idTransaksi) ?>" type="button" class="btn btn-primary" style="background-color: goldenrod;">Ya</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                </div> 
        </div>
    </div>
</div>
</div>
<script>
    $('#aBelumBayar').click(function(){
        $('#belum-bayar').show();
        $('#dikemas').hide();
        $('#dikirim').hide();
        $('#selesai').hide();
    })
    $('#aDikemas').click(function(){
        $('#belum-bayar').hide();
        $('#dikemas').show();
        $('#dikirim').hide();
        $('#selesai').hide();
    })
    $('#aDikirim').click(function(){
        $('#belum-bayar').hide();
        $('#dikemas').hide();
        $('#dikirim').show();
        $('#selesai').hide();
    })
    $('#aSelesai').click(function(){
        $('#belum-bayar').hide();
        $('#dikemas').hide();
        $('#dikirim').hide();
        $('#selesai').show();
    })
</script>