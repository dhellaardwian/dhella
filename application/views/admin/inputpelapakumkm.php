<div class="row">
<div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title m-b-30"><b>Data Pelapak UMKM</b></h4>
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
            Input Data Pelapak
        </div>
        <div class="panel-body">
       <?php 
            echo validation_errors('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
            echo form_open ('pelapakumkm/add'); 
            ?>
        <div class="form-group">
            <label>Nama UMKM</label>
            <input name="namaUmkm" placeholder="Nama UMKM" value="<?= set_value('namaUmkm') ?>" class="form-control"/>
        </div>
        <div class="form-group">
        <label>Nama Pengguna</label>
            <select name="idUser" class="form-control">
            <option value="">--Pilih Pengguna--</option>
            <?php 
            $pengguna = $this->m_pengguna->tampil_pengguna();
            foreach ($pengguna as $key => $value) { ?>
                <option value="<?= $value->idUser ?>"><?= $value->namaPengguna ?></option>
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
                <option value="<?= $value->idkategori ?>"><?= $value->namaKategori ?></option>
            <?php } ?>
            </select>          
        </div>
        <div class="form-group">
            <label>NIB</label>
            <input name="NIB" placeholder="NIB" value="<?= set_value('NIB') ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input name="deskripsi" placeholder="Deskripsi" value="<?= set_value('deskripsi') ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Nama Pelapak</label>
            <input name="namaPmlk" placeholder="Nama Pelapak" value="<?= set_value('namaPmlk') ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Provinsi</label>
            <select name="idProvince" id="select_provinsi" class="form-control"></select>
            <input type="hidden" name="provinceName" id="provinceName">
        </div>
        <div class="form-group">
            <label>Kota</label>
            <select name="idCity" id="select_kota" class="form-control"></select>
            <input type="hidden" name="cityName" id="cityName">
        </div>
        <div class="form-group">
            <label>Kecamatan</label>
            <input name="Kecamatan" placeholder="Kecamatan" value="<?= set_value('Kecamatan') ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Kelurahan</label>
            <input name="Kelurahan" placeholder="Kelurahan" value="<?= set_value('Kelurahan') ?>" class="form-control"/>
        </div>
         <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>" class="form-control"/>
        </div>
         <div class="form-group">
            <label>Latitude Alamat</label>
            <input id="Latitude" name="LatitudeAlamat" placeholder="Latitude Alamat" value="<?= set_value('LatitudeAlamat') ?>" class="form-control" readonly/>
        </div>
         <div class="form-group">
            <label>Longitude Alamat</label>
            <input id="Longitude" name="LongitudeAlamat" placeholder="Longitude Alamat" value="<?= set_value('LongitudeAlamat') ?>" class="form-control" readonly/>
        </div>
         <div class="form-group">
            <label>No Telepon</label>
            <input name="noTelepon" placeholder="No Telepon" value="<?= set_value('noTelepon') ?>" class="form-control"/>
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Simpan</button>
           <button type="reset" class="btn btn-primary waves-effect waves-light" >Batal</button>
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
        get_loc_shipping(1)
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

    function get_loc_shipping(type, parent_id = null) {
        $.ajax({
          url: '<?= base_url('pemesanan/get_location_shipping') ?>',
          type: 'post',
          data: {type: type, parent_id: parent_id},
          success: function (res) {
            if (res.success) {
                if (type == 1) {
                    $('#select_provinsi').html('')
                    $.each(res.data, function(index, val) {
                        $('#select_provinsi').append(`<option value="${val.province_id}">${val.province}</option>`)
                    });
                }else if(type == 2){
                    $('#select_kota').html('')
                    $.each(res.data, function(index, val) {
                        $('#select_kota').append(`<option value="${val.city_id}">${val.type} ${val.city_name}</option>`)
                    });
                }
            }
          }
        })
    }

</script>