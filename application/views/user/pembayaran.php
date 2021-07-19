<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo base_url('pemesanan/pesanansaya'); ?>"><i class="fa fa-cart"></i> Data Pesanan</a>
                    <span> Pembayaran</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="checkout-section spad">
        <div class="container">
             <div  class="customer-content collapse show" >
                <div class="customer-info">
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading">
                                <h2 class="panel-title">Informasi Pembayaran</h2><br>
                            </div>
                            <div class="panel-body">
                                <h4><p>Total Pembayaran Sebesar : Rp. <?= number_format($pesanan->totalBayar, 0) ?></p></h4>
                                <h4><p>Silahkan Transfer Melalui No Rekening Berikut : </p></h4>
                                <table class="table">
                                    <tr>
                                        <th>Bank</th>
                                        <th>Nomor Rekening</th>
                                        <th>Nama Rekening</th>
                                    </tr>
                                    <?php foreach ($rekening as $value) { ?>
                                        <h4><tr>
                                            <h4><td ><?= $value->namaBank ?></td></h4>
                                            <h4><td ><?= $value->nomorRek ?></td></h4>
                                            <h4><td ><?= $value->namaRek ?></td></h4>
                                        </tr></h4>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h2 class="panel-title">Bukti Pembayaran</h2><br>
                            <div class="card card-primary">
                                <?php echo form_open_multipart('pemesanan/pembayaran/' . $pesanan->idTransaksi);
                                ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Bank</label>
                                        <input name="namaBank" class="form-control" placeholder="Nama Bank">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Rekening</label>
                                        <input name="namaRek" class="form-control" placeholder="Nama Rekening">
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Rekening</label>
                                        <input name="noRek" class="form-control" placeholder="No Rekening">
                                    </div>
                                    <div class="form-group">
                                        <label >Upload Bukti & Cantumkan Nomor Orderan</label>
                                        <input type="file" name="buktiPembayaran" class="form-control" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: goldenrod;">Kirim</button>
                                    <a href="<?= base_url('pemesanan/pesanansaya') ?>" style="background-color: goldenrod;" type="submit" class="btn btn-success">Kembali</a>
                                </div>
                                <?php echo form_close('') ?>
                            </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>
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