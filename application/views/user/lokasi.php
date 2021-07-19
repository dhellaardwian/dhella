<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> Home</a>
                        <span>Lokasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="product-shop spad">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 col-lg-2 sidebar filterbar">
                      <div class="sidebar_tags">
                      <!--Categories-->
                      <div class="sidebar_widget categories filter-widget">
                          <div class="widget-title"><h4>Jenis UMKM</h4></div>
                          <br>
                          <div class="widget-content">
                              <ul class="sidebar_categories">
                                  <!-- Tampilakan data kategori -->
                                  <!-- href nya menuju fungsi js showByKategori dgn paremeter id kategori, nah ada paramter all untuk ambil semua data pelapak yg ada, itu akan berjalan saat nama kategori di klik -->
                                  <li class="bc-item"><a href="javascript:showByKategori('all')" class="site-nav">UMKM Nganjuk(<?= array_sum(array_column($kategori, 'total_lapak')) ?>)</a></li>
                                  <?php foreach ($kategori as $value): ?>
                                    <li class="bc-item"><a href="javascript:showByKategori('<?= $value['idkategori'] ?>')" class="site-nav"><?= $value['namaKategori'] ?>  <span>(<?= $value['total_lapak'] ?>)</span></a></li>
                                  <?php endforeach ?>
                              </ul>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 main-col">
                 <div id="mapid" style="height: 500px;"></div>  
              </div>
            </div>
        </div>
    </div>
</div>
</section>
    <script>
  var pelapak = <?php echo json_encode($pelapakumkm); ?>;
  var BASE_URL = '<?= base_url() ?>';
  var groupmarker; //variable yang membuat group marker nya pelapak, jadi klo ingin menghapus semua marker, hapus dari group nya
  var mymap;
  document.addEventListener("DOMContentLoaded", function(event) {
      // Your code to run since DOM is loaded and ready
      loadMap()
  });

  function loadMap() {
      mymap = L.map('mapid').setView([-7.603085, 111.901131], 14);
      L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
          maxZoom: 20,
          subdomains:['mt0','mt1','mt2','mt3']
      }).addTo(mymap);
      var marketset;
      var layergroup = [];
      groupmarker = L.layerGroup().addTo(mymap);
      $.each(pelapak, function(index, val) {
          layergroup.push([val.LatitudeAlamat,val.LongitudeAlamat])
          var popupcontent = `
              <p style="margin:0;">Nama UMKM : ${val.namaUmkm}</p>
              <p style="margin:0;">Nama Pelapak : ${val.namaPmlk}</p>
              <p style="margin:0;">No Telepon : ${val.noTelepon}</p>
              <p style="margin:0;"><a href="${BASE_URL+"umkm/"+val.idPelapak}" target="_blank">PiliH UMKM!</a></p>
          `;
          markerset = new L.Marker([val.LatitudeAlamat,val.LongitudeAlamat]).bindTooltip(val.namaUmkm).bindPopup(popupcontent).addTo(groupmarker);
      });
      mymap.fitBounds(layergroup)
  }

  function showByKategori(idkategori) {
    // ambil data pelapak berdasarkan kategori dengan ajax
    $.ajax({
      url: '<?= base_url('home/get_lapak_by_kategori/') ?>'+idkategori,
      success: function (res) {
        if (res) {
          groupmarker.clearLayers() //hapus semua marker yg ada
          var layergroup = [];
          // tambah marker berdasarkan return dari permintaan pelapak berdasarkan kategori
          $.each(res, function(index, val) {
              layergroup.push([val.LatitudeAlamat,val.LongitudeAlamat])
              var popupcontent = `
                  <p style="margin:0;">Nama UMKM : ${val.namaUmkm}</p>
                  <p style="margin:0;">Nama Pelapak : ${val.namaPmlk}</p>
                  <p style="margin:0;">No Telepon : ${val.noTelepon}</p>
                  <p style="margin:0;"><a href="${BASE_URL+"umkm/"+val.idPelapak}" target="_blank">Pilih UMKM!</a></p>
              `;
              markerset = new L.Marker([val.LatitudeAlamat,val.LongitudeAlamat]).bindTooltip(val.namaUmkm).bindPopup(popupcontent).addTo(groupmarker);
          });
          mymap.fitBounds(layergroup) //set view tampilan map menyesuaikan marker
        }
      }
    });
  }

        
</script>
