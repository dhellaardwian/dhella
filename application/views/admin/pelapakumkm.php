<?php
if ($this->session->userdata('level') == "Admin") {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Data Pelapak UMKM</b></h4>
            <p class="text-muted font-13 m-b-30">      
            </p>
            <a href="<?php echo base_url('DompdfPelapak');?>" type="button" class="on-default edit-row btn btn-success"><i class="fa fa-print mr-1"></i> Cetak Dokumen
            </a>
            <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama UMKM</th>
                    <th>Kategori Usaha</th>
                    <th>NIB</th>
                    <th>Nama Pemilik</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Jumlah Saldo Tersisa</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($pelapakumkm as  $value) { ?>
                    <tr>
                        <td ><?= $no++; ?></td>
                        <td ><?= $value->namaUmkm?></td>
                        <td ><?= $value->namaKategori?></td>
                        <td ><?= $value->NIB?></td>
                        <td ><?= $value->namaPmlk?></td>
                        <td ><?= $value->Kecamatan?></td>
                        <td ><?= $value->Kelurahan?></td>
                        <td ><?= $value->alamat?></td>
                        <td ><?= $value->noTelepon?></td>
                        <td >Rp <?= number_format($value->totalSaldo, 0) ?></td>
                        <td class="text-center"> 
                            <a href="<?= base_url('Pelapakumkm/edit/' . $value->idPelapak) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                           <a href="<?= base_url('Pemesanan/detailtransaksi/' . $value->idPelapak) ?>" class='on-default edit-row btn btn-warning' ><i class='fa fa-search'></i></a>
                            <button class="on-default remove-row btn btn-danger" data-toggle="modal" data-target="#delete<?= $value->idPelapak  ?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--modal-hapus -->
<?php  foreach ($pelapakumkm as $value) { ?>
       <div class="modal fade" id="delete<?= $value->idPelapak ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Menghapus <?= $value->namaUmkm ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <h5>Apakah yakin ingin menghapus ini?</h5>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('Pelapakumkm/delete/'.$value->idPelapak) ?>" class="btn btn-primary">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <?php } ?>
 
  <?php
    } else {
      redirect(base_url('beranda'));
    }
      ?>
      