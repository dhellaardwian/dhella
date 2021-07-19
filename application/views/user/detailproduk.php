<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?php echo base_url('home/lokasi'); ?>"><i class="fa fa-home"></i> Lokasi</a><span><?= $Produk['namaProduk'] ?></span>
            </div>
        </div>
    </div>
</div>
</div>
<section class="product-shop spad">
<div id="page-content">
            <!--MainContent-->
            <div id="MainContent" class="main-content" role="main">
                <!--Breadcrumb-->
               
                <!--End Breadcrumb-->
                <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                    <!--product-single-->
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-dec-slider-2">
                                    <div class="product-single__meta">
                                        <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                            <a data-image="<?= base_url('./assets/gambar/'.$Produk['gambar']) ?>" data-zoom-image="<?= base_url('./assets/gambar/'.$Produk['gambar']) ?>" class="slick-slide slick-cloned" data-slick-index="0" aria-hidden="true" tabindex="-1">
                                            <img class="blur-up lazyload" src="<?= base_url('./assets/gambar/'.$Produk['gambar']) ?>" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product-single__meta">
                                        <h3 class="product-single"><?= $Produk['namaProduk'] ?></h3><br>
                                        <p class="product-price">
                                            <span class="visually-hidden">Harga produk</span>
                                            <span class="product-price">
                                                <span id="product-price"><span class="money">Rp <?php echo number_format($Produk['hargaProduk'], 0) ?></span>
                                            </span>  
                                        </p>
                                        </div>
                                     <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                        <div class="product-form__item">
                                        <label class="header">Berat Produk : <span class="slVariant"><?= $Produk['beratProduk'] ?> Gr</span></label>
                                    </div>
                                    <div class="product-single__description rte">
                                        <p><?= $Produk['rincianProduk'] ?></p>
                                    </div>
                                        <!-- Product Action -->
                                        <div class="product-action clearfix">
                                            <form action="<?= base_url('keranjang/input') ?>" method="post" accept-charset="utf-8">
                                                <div class="quantity">
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                            <input type="hidden" name="idProduk" value="<?= $Produk['idProduk'] ?>">
                                                            <input type="number" id="Quantity" name="quantity" value="1" class="product-form__input qty" min="0" max="<?= $Produk['stok'] ?>">
                                                            <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                </div><br>
                                                 <div class="cart-add" class="col-lg-8">
                                                    <button type="submit" name="add" class="cart-add" style="background-color: brown;">
                                                        <span>Tambah Keranjang</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div><br>
                                            
                                            <div class="display-table-cell text-right">
                                                <div class="social-sharing">
                                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                                        <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                                    </a>
                                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                                    </a>
                                                    <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share">
                                                        <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                                                    </a>
                                                    <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                                    </a>
                                                 </div>
                                            </div>
                                       
                                </div>
                        </div>
                    </div>
                    <!--End-product-single-->
                        </div>
                    <!--End Recently Product Slider-->
                    </div>
           

</section>

