<?php
if ($this->session->userdata('level') == "Admin") {
    ?>
    <div id="mapid" style="height: 500px;"></div> 
    <script>
        var pelapak = <?php echo json_encode($pelapakumkm); ?>;
        var BASE_URL = '<?= base_url() ?>';
        (function () {
            console.log(pelapak)
            loadMap()
        })()

        function loadMap() {
            var mymap = L.map('mapid').setView([-7.603085, 111.901131], 14);
            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(mymap);
            var marketset;
            var layergroup = [];
            $.each(pelapak, function(index, val) {
                layergroup.push([val.LatitudeAlamat,val.LongitudeAlamat])
                var popupcontent = `
                    <p style="margin:0;">Nama UMKM : ${val.namaUmkm}</p>
                    <p style="margin:0;">Nama Pelapak : ${val.namaPmlk}</p>
                    <p style="margin:0;">No Telepon : ${val.noTelepon}</p>
                    <p style="margin:0;"><a href="${BASE_URL+"urllihattoko/"+val.idPelapak}" target="_blank">Klik untuk berkunjung!</a></p>
                `;
                markerset = new L.Marker([val.LatitudeAlamat,val.LongitudeAlamat]).bindTooltip(val.namaUmkm).bindPopup(popupcontent).addTo(mymap);
            });
            mymap.fitBounds(layergroup)
        }
   </script>

   <?php
} else {
  redirect(base_url('beranda'));
}
?>