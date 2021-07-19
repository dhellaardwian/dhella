<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo base_url('home/lokasi'); ?>"><i class="fa fa-home"></i> Lokasi</a>
                    <span>Keranjang</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
$subTotalKeranjang = 0; 
?>
<form action="<?= base_url('keranjang/update_qty') ?>" method="post">
<section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                            <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($dataKeranjang): ?>
                                <?php foreach ($dataKeranjang as $key => $value): ?>
                                    <?php 
                                    $subTotalKeranjang += $value['subTotal'];
                                    ?>
                                    <tr>
                                    <td class="cart-pic first-row"><img style="width: 100px" class="cart-pic" src="<?= base_url('./assets/gambar/'.$value['gambar']) ?>"></td>  
                                    <td class="cart-pic first-row"><?= $value['namaProduk'] ?><br>
                                        UMKM : <a href="<?= base_url('umkm/'.$value['idPelapak']) ?>" title=""><?= $value['namaUmkm'] ?></a><br>
                                        Berat : <?= $value['beratProduk'] ?> Gr<br>
                                    </td>
                                    <td class="p-price first-row">RP <?php echo number_format ($value['total'], 0) ?></td>
                                    <td class="qua-col first-row">
                                    <div class="quantity">
                                                <input type="hidden" name="ids_cart[]" value="<?= $value['idCart'] ?>">
                                                <input class="cart__qty-input qty" type="number" name="quantity[]" id="qty" value="<?= $value['qty'] ?>" pattern="[0-9]*" min="1" max="<?= $value['stok'] ?>" onchange="">
                                                
                                    </div>
                                    </td>
                                    <td class="total-price first-row">RP <?php echo number_format ($value['subTotal'], 0) ?></td>
                                    <td class="close-td first-row"><a href="<?= base_url('keranjang/hapus/'.$value['idCart']) ?>"><i class="ti-close" ></i></a></td>
                                </tr>
                                <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center"><br>Tidak Ada Produk Di Keranjang Anda</td>
                            </tr>
                        <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="<?= base_url('/home/lokasi') ?>" class="primary-btn continue-shop">Lanjut Belanja</a>
                                <button type="submit" class="primary-btn up-cart">Update Cart</button>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <a href="<?= base_url('/pemesanan') ?>" type="submit" class="proceed-btn">Check Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>