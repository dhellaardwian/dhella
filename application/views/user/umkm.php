<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="<?php echo base_url('home/lokasi'); ?>"><i class="fa fa-home"></i> Lokasi</a>
                        <span><?= $dataPelapak['namaUmkm'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 sidebar filterbar">
                    <div class="filter-widget">
                        <h4 class="fw-title">Informasi UMKM</h4>
                        <ul class="filter-catagories">
                            <h4><p><?= $dataPelapak['namaUmkm'] ?></p></h4>
                            <h4><p><?= $dataPelapak['noTelepon'] ?></p></h4>
                            <h4><p><?= $dataPelapak['alamat'] ?></p></h4>
                            <h4><p><?= $dataPelapak['deskripsi'] ?></p></h4>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="category-description">
                        <h2>PRODUK</h2>
                        <h4><p>Berikut adalah beberapa macam pilihan produk yang disediakan oleh <?= $dataPelapak['namaUmkm'] ?>.</p><h4>
                        <hr>
                    </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            <?php if (isset($dataProduk) && count($dataProduk) > 0){ ?>                 
                            <?php foreach ($dataProduk as $value){?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="<?= base_url('/detailproduk/'.$value['idProduk']) ?>">
                                            <img src="<?= base_url('/assets/gambar/'.$value['gambar']) ?>" alt="">
                                        </a>
                                        <ul>
                                            <li class="quick-view"><a href="<?= base_url('/detailproduk/'.$value['idProduk']) ?>">Detail</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <!-- <div class="catagory-name">Towel</div> -->
                                        <a href="<?= base_url('/detailproduk/'.$value['idProduk']) ?>">
                                            <h5><?php echo $value['namaProduk'] ?></h5>
                                        </a>
                                        <div class="product-price">
                                            Rp. <?= number_format($value['hargaProduk'],0) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        }else{ ?>
                            <div class="container" class="text-center">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">  
                                        <div class="empty-page-content text-center">
                                        
                                            <p>Tidak memiliki produk</p>
                                            <p><a href="<?= base_url('home/lokasi') ?>" class="btn btn--has-icon-after"><i class="fa fa-caret-left" aria-hidden="true"></i>Home</a></p>
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
    </section>