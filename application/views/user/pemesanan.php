<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo base_url('home/lokasi'); ?>"><i class="fa fa-home"></i> Lokasi</a>
                    <a href="<?php echo base_url('Keranjang'); ?>"><i class="fa fa-cart"></i> Keranjang</a>
                    <span> Halaman Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $subTotalBayar = 0; $totalBerat = 0; $idPelapak = ""; $idProduk = 0; $totalqty = 0; $totalProduk = 0; ?>
<section class="checkout-section spad halaman-checkout">
    <form action="<?= base_url('pemesanan/checkout') ?>" class="checkout-form" method="post">
        <div class="cart-table" class="col-lg-12">
            <table>
                <thead>
                    <tr>
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($dataKeranjang): ?>
                        <?php foreach ($dataKeranjang as $key => $value): ?>
                            <?php 
                            $subTotalBayar += $value['subTotal'];
                            $totalBerat += $value['qty'] * $value['beratProduk'];
                            $idPelapak = $value['idPelapak'];
                            $totalqty += $value['qty'];
                            $totalProduk++;
                            ?>
                            <tr>
                                <input type="hidden" name="detail_idProduk[]" value="<?= $value['idProduk'] ?>">
                                <input type="hidden" name="detail_harga[]" value="<?= $value['total'] ?>">
                                <input type="hidden" name="detail_qty[]" value="<?= $value['qty'] ?>">
                                <input type="hidden" name="detail_subTotal[]" value="<?= $value['subTotal'] ?>">
                                <td class="cart-pic first-row"><?= $value['namaProduk'] ?><br>
                                    UMKM : <a href="<?= base_url('umkm/'.$value['idPelapak']) ?>" title=""><?= $value['namaUmkm'] ?></a><br>
                                    Berat : <?= $value['beratProduk'] ?> Gr<br>
                                </td>
                                <td class="p-price first-row">RP <?php echo number_format ($value['total'], 0) ?></td>
                                <td class="p-price first-row">RP <?php echo number_format ($value['subTotal'], 0) ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Daftar Pengiriman</h4>
                    <input type="hidden" id="set_id_pelapak" name="idPelapak" value="<?= $idPelapak ?>">
                    <input type="hidden" id="set_berat" value="<?= $totalBerat ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="idProvince" id="select_provinsi" class="form-control"></select>
                                <input type="hidden" name="provinceName" id="provinceName">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Kota</label>
                                <select name="idCity" id="select_kota" class="form-control"></select>
                                <input type="hidden" name="cityName" id="cityName">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Ekspedisi</label>
                                <select name="kurir" id="select_courier" class="form-control">
                                    <option value="">- Pilih Kurir -</option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">POS</option>
                                    <option value="tiki">TIKI</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Paket</label>
                                <select id="select_paket" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" class="inputan_paket" name="paket_nama" id="paket_nama">
                            <input type="hidden" class="inputan_paket" name="paket_harga" id="paket_harga">
                            <input type="hidden" class="inputan_paket" name="paket_etd" id="paket_etd">
                            <p class="mb-2">Nama : <span class="inputan_paket" id="show_paket_nama"></span></p>
                            <p class="mb-2">Harga : <span class="inputan_paket" id="show_paket_harga"></span></p>
                            <p class="mb-2">Estimasi Sampai : <span class="inputan_paket" id="show_paket_etd"></span></p>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input name="alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input name="kodepos" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nama Penerima</label>
                                <input name="nmPenerima" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>No Telp</label>
                                <input name="noTelp" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="place-order">
                        <h4>Pembayaran</h4>
                        <div class="order-total">
                            <input type="hidden" name="subTotalBayar" id="subTotalBayar" value="<?= $subTotalBayar ?>"> 
                            <input type="hidden" name="totalBerat" id="totalBerat" value="<?= $totalBerat ?>">
                            <input type="hidden" name="totalqty" id="totalqty" value="<?= $totalqty ?>">
                            <input type="hidden" name="totalProduk" id="totalProduk" value="<?= $totalProduk ?>">
                            <input type="hidden" name="ongkir" id="ongkir">
                            <input type="hidden" name="totalBayar" id="totalBayar">
                            <ul class="order-table">
                                <li class="fw-normal">Sub Total<span>RP <?php echo number_format ($subTotalBayar, 0) ?></span></li>
                                <li class="fw-normal">Berat<span> <?= $totalBerat ?> Gr</span></li>
                                <li class="fw-normal">Ongkir<span id="show_ongkir"></span></li>
                                <li class="fw-normal">Total Bayar<span id="show_totalBayar"></span></li>
                            </ul>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Kirim Pesanan</button>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </form>
</div>
</section>