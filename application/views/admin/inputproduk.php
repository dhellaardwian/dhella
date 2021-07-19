<div class="row">
<div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title m-b-30"><b>Input Produk UMKM</b></h4>
            <div style="width:100%; text-align:right; margin-bottom:10px;">
        </div>
         <div class="card-body">
             <?php 
            echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');

            //notifikasi gagal upload gambar
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fas fa-ban"></i>' . $error_upload . '</h5></div>';
            }
            
            echo form_open_multipart ('produk/add'); 
            ?>
            <div class="form-group">
                <label>Nama Produk</label>
                <input name="namaProduk" class="form-control" placeholder="Nama Produk" value="<?= set_value('namaProduk') ?>">
            </div>
            <div class="row">
                <div class="col-sm-4">
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
                  </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="hargaProduk" class="form-control" placeholder="Harga Produk" value="<?= set_value('hargaProduk') ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Berat (Gr)</label>
                            <input type="number" name="beratProduk" min="0" class="form-control" placeholder="Berat Dalam Satuan Gram" value="<?= set_value('beratProduk') ?>">
                        </div>
                    </div>
                  </div>
            <div class="form-group">
              <label>Deskripsi Produk</label>
              <textarea name="rincianProduk" class="form-control" rows="5" placeholder="Deskripsi Produk"><?= set_value('rincianProduk') ?></textarea>
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="Stok" value="<?= set_value('stok') ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                </div>
            </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
                <?php 
                      echo form_close();
                ?>
        </div>
    </div>
</div>
</div>
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