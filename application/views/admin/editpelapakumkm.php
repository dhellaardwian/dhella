<div class="row">
<div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title m-b-30"><b>Edit Pelapak UMKM</b></h4>
            <div style="width:100%; text-align:right; margin-bottom:10px;">
        </div>
<div class="col-lg-8">
    <div class="panel panel-color panel-custom">
        <div class="panel-heading">
            Lokasi Pelapak UMKM
        </div>
        <div class="panel-body">
            <div id="mapid" style="height: 500px;"></div>  
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="panel panel-color panel-custom">
        <div class="panel-heading">
            Edit Data Pelapak
        </div>
        <div class="panel-body">
       <?php 
              echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
            echo form_open ('pelapakumkm/edit/'. $pelapakumkm->idPelapak); 
            ?>
        <div class="form-group">
            <label>Nama UMKM</label>
            <input name="namaUmkm" placeholder="Nama UMKM" value="<?= $pelapakumkm->namaUmkm ?>" class="form-control"/>
        </div>
        <div class="form-group">
        <label>Nama Pengguna</label>
            <select name="idUser" class="form-control">
            <option value="">--Pilih Pengguna--</option>
            <?php 
                  $pengguna = $this->m_pengguna->tampil_pengguna();
                  foreach ($pengguna as $key => $value) { ?>
                      <option value="<?= $value->idUser ?>" <?= ($pelapakumkm->idUser == $value->idUser) ? "selected" : ""; ?> ><?= $value->namaPengguna ?></option>
            <?php } ?>
            </select>          
        </div>
        <div class="form-group">
        <label>Kategori Usaha</label>
            <select name="idkategori" class="form-control">
            <option value="">--Pilih Kategori--</option>
            <?php 
                  $kategori = $this->m_kategori->tampil_kategori();
                  foreach ($kategori as $key => $value) { ?>
                      <option value="<?= $value->idkategori ?>" <?= ($pelapakumkm->idkategori == $value->idkategori) ? "selected" : ""; ?> ><?= $value->namaKategori ?></option>
            <?php } ?>
            </select>          
        </div>
        <div class="form-group">
            <label>NIB</label>
            <input name="NIB" placeholder="NIB" value="<?= $pelapakumkm->NIB ?>" class="form-control"/>
        </div>
          <div class="form-group">
            <label>Deskipsi</label>
            <input name="deskripsi" placeholder="Deskripsi" value="<?= $pelapakumkm->deskripsi ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Nama Pelapak</label>
            <input name="namaPmlk" placeholder="Nama Pelapak" value="<?= $pelapakumkm->namaPmlk ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Kecamatan</label>
            <input name="Kecamatan" placeholder="Kecamatan" value="<?= $pelapakumkm->Kecamatan ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Kelurahan</label>
            <input name="Kelurahan" placeholder="Kelurahan" value="<?= $pelapakumkm->Kelurahan ?>" class="form-control"/>
        </div>
         <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" placeholder="Alamat" value="<?= $pelapakumkm->alamat ?>" class="form-control"/>
        </div>
         <div class="form-group">
            <label>Latitude Alamat</label>
            <input id="Latitude" name="LatitudeAlamat" placeholder="Latitude Alamat" value="<?= $pelapakumkm->LatitudeAlamat ?>" class="form-control" readonly/>
        </div>
         <div class="form-group">
            <label>Longitude Alamat</label>
            <input id="Longitude" name="LongitudeAlamat" placeholder="Longitude Alamat" value="<?= $pelapakumkm->LongitudeAlamat ?>" class="form-control" readonly/>
        </div>
         <div class="form-group">
            <label>No Telepon</label>
            <input name="noTelepon" placeholder="No Telepon" value="<?= $pelapakumkm->noTelepon ?>" class="form-control"/>
        </div>
        <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
                <?php echo form_close() ?>
                
        </div> 
    </div>
</div>
</div>
</div>
</div>


<script>
    var curLocation=[0,0];
        if (curLocation[0]==0 && curLocation[1]==0) {
            curLocation =[-7.603085, 111.901131];   
        }
            
    var mymap = L.map('mapid').setView([-7.603085, 111.901131], 14);
            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(mymap);
    var marker = new L.marker(curLocation, {
        draggable:'true'
    });

    marker.on('dragend', function(event) {  
        var position = marker.getLatLng();
                marker.setLatLng(position,{
                    draggable : 'true'
                }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });

    $("#Latitude, #Longitude").change(function(){
            var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
                marker.setLatLng(position, {
                    draggable : 'true'
                }).bindPopup(position).update();
            mymap.panTo(position);
    });
    mymap.addLayer(marker);

    (function () {
        get_loc_shipping(1, null, "<?= $pelapakumkm->idProvince ?>")
        get_loc_shipping(2, "<?= $pelapakumkm->idProvince ?>", "<?= $pelapakumkm->idCity ?>")
        $('#select_provinsi').on('change', function(event) {
            event.preventDefault();
            var province_id = this.value;
            get_loc_shipping(2, province_id)
            $('#provinceName').val($('#select_provinsi option:selected').text())
        });
        $('#select_kota').on('change', function(event) {
            event.preventDefault();
            var city_id = this.value;
            get_loc_shipping(3, city_id)
            $('#cityName').val($('#select_kota option:selected').text())
        });
    })()

    function get_loc_shipping(type, parent_id = null, selected = null) {
        $.ajax({
          url: '<?= base_url('pemesanan/get_location_shipping') ?>',
          type: 'post',
          data: {type: type, parent_id: parent_id},
          success: function (res) {
            if (res.success) {
                if (type == 1) {
                    $('#select_provinsi').html('')
                    $.each(res.data, function(index, val) {
                        var set_selected = "";
                        if (selected && val.province_id == selected) { set_selected = "selected"}
                        $('#select_provinsi').append(`<option value="${val.province_id}" ${set_selected}>${val.province}</option>`)
                    });
                }else if(type == 2){
                    $('#select_kota').html('')
                    $.each(res.data, function(index, val) {
                        var set_selected = "";
                        if (selected && val.city_id == selected) { set_selected = "selected"}
                        $('#select_kota').append(`<option value="${val.city_id}" ${set_selected}>${val.type} ${val.city_name}</option>`)
                    });
                }
            }
          }
        })
    }

</script>