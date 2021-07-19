<?php
if ($this->session->userdata('level') == "Pelapak") {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title m-b-30"><b>Data Produk</b></h4>
            <div style="width:100%; text-align:right; margin-bottom:10px;">
                </button>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Nama UMKM</th>
                            <th>Harga</th>
                            <th>Berat Produk</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($produk as  $value) { ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $value->namaProduk ?></td>
                          <td><?= $value->namaUmkm ?></td>
                          <td>Rp. <?= number_format($value->hargaProduk,  0) ?></td>
                          <td><?= $value->beratProduk ?> Gr</td>
                          <td><?= $value->stok ?></td>
                           <td><?= $value->rincianProduk ?></td>
                          <td ><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                          <td >
                            <a href="<?= base_url('produk/edit/'.$value->idProduk) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->idProduk  ?>"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
              </div>
      </div>
    </div>
  </div>

 <!--modal-hapus -->
<?php  foreach ($produk as  $value) { ?>
       <div class="modal fade" id="delete<?= $value->idProduk ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Menghapus <?= $value->namaProduk ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">

              <h5>Apakah yakin ingin menghapus ini?</h5>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('produk/delete/'.$value->idProduk) ?>" class="btn btn-primary">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <?php } ?>

  <?php
    } else {
      redirect(base_url('beranda2'));
    }
      ?>