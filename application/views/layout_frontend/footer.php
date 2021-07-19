<!-- Css Styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fashi/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <p class="h4">TENTANG KAMI</p>
                        <p>Dinas Tenaga Kerja Koperasi Dan Usaha Mikro Daerah Kabupaten Nganjuk
                        Mempunyai tugas melaksanakan urusan Pemerintahan Daerah di bidang Tenaga Kerja, Koperasi dan Usaha Mikro.</p>
                </div>
                <div class="col-lg-4">
                      <p class="h4">Contact Us</p>
                        <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i><p>Jl. Dermojoyo No.45, Payaman, Kec. Nganjuk, Kabupaten Nganjuk<br>Jawa Timur 64418</p></li>
                            <li class="phone"><i class="icon anm anm-phone-s"></i><p>(0358) 325200</p></li>
                            <li class="email"><i class="icon anm anm-envelope-l"></i><p>disnakerkum.nganjukkab.go.id</p></li>
                        </ul>
                </div>
                <div class="col-lg-4">
                    <p class="h4">Alamat</p>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15368.220154101407!2d111.90397419946318!3d-7.6145473455785115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9900b76774e02bda!2sDinas+Tenaga+Kerja+Koperasi+Dan+Usaha+Mikro+Daerah+Kabupaten+Nganjuk!5e0!3m2!1sid!2sid!4v1546583353098" width="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                        </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> UMKM Kabupaten Nganjuk
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="assets/fashi/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo base_url(); ?>assets/fashi/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/jquery.zoom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/jquery.dd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/jquery.slicknav.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fashi/js/main.js"></script>
     <script>
        $(function(){
            var $pswp = $('.pswp')[0],
                image = [],
                getItems = function() {
                    var items = [];
                    $('.lightboximages a').each(function() {
                        var $href   = $(this).attr('href'),
                            $size   = $(this).data('size').split('x'),
                            item = {
                                src : $href,
                                w: $size[0],
                                h: $size[1]
                            }
                            items.push(item);
                    });
                    return items;
                }
            var items = getItems();
        
            $.each(items, function(index, value) {
                image[index]     = new Image();
                image[index].src = value['src'];
            });
            $('.prlightbox').on('click', function (event) {
                event.preventDefault();
              
                var $index = $(".active-thumb").parent().attr('data-slick-index');
                $index++;
                $index = $index-1;
        
                var options = {
                    index: $index,
                    bgOpacity: 0.9,
                    showHideOpacity: true
                }
                var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                lightBox.init();
            });
            loadMiniCart()

            if ($('.halaman-checkout').length > 0) {
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
                $('#select_courier').on('change', function(event) {
                    get_cost(this.value)
                });
                $('#select_paket').on('change', function(event) {
                    var data_paket = $('#select_paket option:selected').data('paket')
                    showPaket(data_paket)
                });
            }
        });


        function loadMiniCart() {
             $.ajax({
                 url: '<?= base_url('keranjang/mini') ?>',
                 type: 'post',
                 success: function (res) {
                     res = JSON.parse(res)
                     if (res.success) {
                         $('#CartCount').text(res.data.total_keranjang)
                         $('.subtotal_keranjang').text(res.data.subtotal_keranjang)
                         $.each(res.data.data_keranjang, function(index, val) {
                             var gambar = "<?= base_url('assets/gambar/') ?>"+val['gambar'];
                             $('.mini-products-list').append(`
                                 <li class="cart-icon">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="${gambar}" style="width: 80px"></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>${val['total']}</p>
                                                            <h6>${val['namaProduk']}</h6>
                                                        </div>
                                                    </td>
                                                   <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </li>
                             `)
                         });
                     }
                 }
             })
         }

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

        function get_cost(courier) {
            if ($('#select_provinsi').val() && $('#select_kota').val()) {
                $.ajax({
                    url: '<?= base_url('pemesanan/get_cost') ?>',
                    type: 'POST',
                    data: {
                        idProvince: $('#select_provinsi').val(),
                        idCity: $('#select_kota').val(),
                        courier: courier,
                        idPelapak: $('#set_id_pelapak').val(),
                        totalBerat: $('#set_berat').val(),
                    },
                    success: function (res) {
                        $('.inputan_paket').val("")
                        if (res.success) {
                            $('#select_paket').html("")
                            setTimeout(function () {
                                $('#select_paket').append(`<option value="">Pilih Paket</option>`)
                                $.each(res.data, function(index, val) {
                                    var data_paket = btoa(JSON.stringify(val))
                                    $('#select_paket').append(`
                                        <option value="${val.service}" data-paket="${data_paket}">${val.service} - ${toRp(val.value)}</option>
                                    `)
                                });
                            }, 300)
                        }
                    }
                });
                
            }else{
                alert('Pilih Provinsi dan Kota terlebih dahulu.')
            }
        }

        function showPaket(paket) {
            var data_paket = JSON.parse(atob(paket))
            $('#paket_nama').val(data_paket.service)
            $('#paket_harga').val(data_paket.value)
            $('#paket_etd').val(data_paket.etd)
            $('#show_paket_nama').text(data_paket.service)
            $('#show_paket_harga').text("Rp "+ toRp(data_paket.value))
            $('#show_paket_etd').text(data_paket.etd)

            var totalBayar = parseFloat($('#subTotalBayar').val()) + data_paket.value;
            $('#ongkir').val(data_paket.value)
            $('#show_ongkir').text("Rp "+toRp(data_paket.value))
            $('#totalBayar').val(totalBayar)
            $('#show_totalBayar').text("Rp "+toRp(totalBayar))
        }

        function toRp(angka, num=false){
            if (angka == "" || angka == 'undefined' || angka == null) {
                angka = 0;
            }
            var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
            var rev2    = '';
            var zero = num ? ',00' : '';
            for(var i = 0; i < rev.length; i++){
                rev2  += rev[i];
                if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                    rev2 += '.';
                }
            }
            return '' + rev2.split('').reverse().join('') + zero;
        }
        
    $(document).ready(function () {
        $('#datatable').dataTable();
         $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
             "dom": 'C<"clear">lfrtip',
             "colVis": {
                 "buttonText": "Change columns"
             }
         });
         $('#datatable-scroller').DataTable({
             ajax: "assets/admin/assets/plugins/datatables/json/scroller-demo.json",
             deferRender: true,
             scrollY: 380,
             scrollCollapse: true,
             scroller: true
         });
         var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
         var table = $('#datatable-fixed-col').DataTable({
             scrollY: "300px",
             scrollX: true,
             scrollCollapse: true,
             paging: false,
             fixedColumns: {
                 leftColumns: 1,
                 rightColumns: 1
             }
         });
    });
    TableManageButtons.init();

</script>