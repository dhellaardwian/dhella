-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 10:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbumkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataproduk`
--

CREATE TABLE `dataproduk` (
  `idProduk` int(11) UNSIGNED NOT NULL,
  `idPelapak` int(11) UNSIGNED NOT NULL,
  `namaProduk` varchar(70) NOT NULL,
  `hargaProduk` int(20) NOT NULL,
  `beratProduk` int(10) UNSIGNED NOT NULL,
  `gambar` text NOT NULL,
  `stok` int(11) NOT NULL,
  `rincianProduk` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataproduk`
--

INSERT INTO `dataproduk` (`idProduk`, `idPelapak`, `namaProduk`, `hargaProduk`, `beratProduk`, `gambar`, `stok`, `rincianProduk`) VALUES
(16, 38, 'Trapping', 25000, 250, 'perangkap2.jpg', 6, '1. Untuk sawah 1hr dibutuhkan 2pack trapping\r\n2. Lebih baik disimpan pada kulkas agar lem tahan lama '),
(17, 39, 'Kursi', 2500000, 2500, 'meja.jpg', 23, 'Awet dan tidak mudah lapuk '),
(19, 45, 'Somethinc B5', 115000, 15, 'somethinc-4500-2689372-1.jpg', 20, 'Untuk menjaga kelembaban kulit'),
(20, 45, 'Scarlett', 55000, 300, '13330911874fadffd89adb6782e37c02.jpg', 12, 'Memutihkan dan mencerahkan kulit.\r\nMenutrisi kulit.\r\nMelawan penuaan dini (anti aging)\r\nMelindungi dari sinar UV dan polusi.\r\nMenyegarkan dan memberi keharuman tahan lama.');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `idDetail` int(11) UNSIGNED NOT NULL,
  `idTransaksi` int(11) UNSIGNED NOT NULL,
  `idProduk` int(11) UNSIGNED NOT NULL,
  `harga` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `subTotal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`idDetail`, `idTransaksi`, `idProduk`, `harga`, `qty`, `subTotal`) VALUES
(15, 110, 16, '25000', 2, '50000'),
(16, 111, 17, '2500000', 1, '2500000'),
(18, 113, 17, '2500000', 1, '2500000'),
(19, 114, 16, '25000', 1, '25000'),
(20, 115, 16, '25000', 2, '50000'),
(21, 116, 16, '25000', 2, '50000'),
(22, 117, 16, '25000', 3, '75000');

--
-- Triggers `detailtransaksi`
--
DELIMITER $$
CREATE TRIGGER `stokbarang` AFTER INSERT ON `detailtransaksi` FOR EACH ROW BEGIN
UPDATE dataproduk SET stok = stok - NEW.qty
WHERE idProduk=NEW.idProduk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) UNSIGNED NOT NULL,
  `namaKategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namaKategori`) VALUES
(23, 'Kesehatan'),
(24, 'Furniture'),
(26, 'Kuliner'),
(27, 'Fashion'),
(29, 'Kerajinan'),
(30, 'Elektronik'),
(31, 'Perawatan dan Kecantikan'),
(32, 'Souvenir dan Perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idCart` int(11) NOT NULL,
  `idProduk` int(11) UNSIGNED NOT NULL,
  `idPelapak` int(11) UNSIGNED NOT NULL,
  `idPelanggan` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(20) NOT NULL,
  `subTotal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`idCart`, `idProduk`, `idPelapak`, `idPelanggan`, `qty`, `total`, `subTotal`) VALUES
(30, 16, 38, 2, 2, '25000', '50000'),
(37, 16, 38, 8, 3, '25000', '75000'),
(38, 16, 38, 9, 9, '25000', '225000');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) UNSIGNED NOT NULL,
  `namaPelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noTelepon` varchar(15) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `namaPelanggan`, `email`, `noTelepon`, `pass`) VALUES
(2, 'Dhella', 'dhellaardwian19@gmail.com', '089765678987', 'Dela12345'),
(8, 'Dhella Ardwian', 'dhellaardwian19@gmail.com', '0897643545765', 'Dhella12345'),
(9, 'Dhella Ardwian', 'dhellaardwian19@gmail.com', '08975412345', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pelapakumkm`
--

CREATE TABLE `pelapakumkm` (
  `idPelapak` int(11) UNSIGNED NOT NULL,
  `idUser` int(11) UNSIGNED NOT NULL,
  `idkategori` int(11) UNSIGNED NOT NULL,
  `namaUmkm` varchar(50) NOT NULL,
  `NIB` varchar(20) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `namaPmlk` varchar(30) NOT NULL,
  `idProvince` int(5) NOT NULL,
  `idCity` int(5) NOT NULL,
  `provinceName` varchar(30) NOT NULL,
  `cityName` varchar(30) NOT NULL,
  `Kecamatan` varchar(30) NOT NULL,
  `Kelurahan` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `LatitudeAlamat` varchar(25) NOT NULL,
  `LongitudeAlamat` varchar(25) NOT NULL,
  `noTelepon` varchar(15) NOT NULL,
  `totalSaldo` double(11,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelapakumkm`
--

INSERT INTO `pelapakumkm` (`idPelapak`, `idUser`, `idkategori`, `namaUmkm`, `NIB`, `deskripsi`, `namaPmlk`, `idProvince`, `idCity`, `provinceName`, `cityName`, `Kecamatan`, `Kelurahan`, `alamat`, `LatitudeAlamat`, `LongitudeAlamat`, `noTelepon`, `totalSaldo`) VALUES
(38, 20, 23, 'SMD Trapping', '232454656561', 'Sebuah UMKM yang menjual berbagai jenis obat - obat pertanian yang memiliki kualitas terbaik untuk memberantas hama', 'Samidi', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Bagor', 'Kendalrejo', 'RT 03 RW 01 Ds. Kendalrejo, Kec. Bagor, Kab. Nganjuk', '-7.568341894384983', '111.85879647436579', '085234936285', 70000.00),
(39, 21, 24, 'Toko Bintang Sejahtera', '220004361406', 'Sebuah UMKM yang menjual furniture dengan berbagai macam pilihan seperti meja, kursi, lemari, tempat makan dan kasur.', 'Sukemi', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Bagor', 'Jawar', 'Ds. Jawar, Kec. Bagor, Kab. Nganjuk', '-7.588410372887413', '111.88011919577237', '0893242354731', -855000.00),
(43, 35, 31, 'Zazkia Kosmetik', '227010110198', 'Menyediakan segala jenis kosmetik dan skincare yang terbaru', 'Zazkia Wijayanti', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Loceret', 'Kewagean', 'JL. ANJUK LADANG 1 NO.15 RT.01 RW.07', '-7.601342187368931', '111.91326807340704', '0856781236547', 0.00),
(44, 34, 29, 'Tarrajut', '280010112021', 'Memproduksi dan menjual tas rajut dengan kualitas premium', 'Linda Wahyu Intansari', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Sukomoro', 'Bagor Wetan', 'Dan. Bagor wetan, Jl. Basuki rahman', '-7.5743468491488875', '111.94189533586449', '082115096552', 0.00),
(45, 32, 31, 'Beauty Skincare', '24356513211', 'Menyediakan segala jenis kosmetik dan skincare yang terbaru', 'Indah Ismananti', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Nganjuk', 'Bogo', 'Jl. Lurah Surodarmo Kauman, Bogo Kidul, Bogo', '-7.603979317245158', '111.89388197683148', '085608041506', 0.00),
(46, 31, 32, 'Florist Sekar Arum', '216010141178', 'Toko bunga dan bucket handmade yang siap kirim antar kota dan provinsi', 'Mahya Hanoum', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Kertosono', 'Kepuh', 'Jl. Sadewo no 30 RT. 01 / RW. 06', '-7.601427263806812', '112.11204528808595', '081335082069', 0.00),
(47, 30, 26, 'Nafia Cake and Cookies', '297010131517', 'Menyediakan kue basah, kering dan aneka jajanan lebaran', 'Nafiatul Khoiriyah', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Pace', 'Wonoasri', 'Kecubung timur pace, Manding, Purwosari, Kec. Wonoasri', '-7.620611569657669', '111.91830743813719', '085749745034', 0.00),
(49, 26, 23, 'Apotik Nawi', '286010100035', 'Perdagangan farmasi', 'Mochamad Asnawi', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Loceret', 'Kewagean', 'Desa kewagean, Loceret, Nganjuk', '-7.680200785085924', '111.8833825095502', '085785094165', 0.00),
(50, 35, 32, 'Zazkia Kosmetik', '645', 'Menyediakan segala jenis kosmetik dan skincare yang terbaru', 'dhella', 11, 305, 'Jawa Timur', 'Kabupaten Nganjuk', 'Loceret', 'Bagor Wetan', 'Doko Ngasem Nganjuk', '-7.604830307495683', '111.94899739794023', '0897643545765', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `penarikandana`
--

CREATE TABLE `penarikandana` (
  `penarikan_id` int(11) NOT NULL,
  `idPelapak` int(11) UNSIGNED NOT NULL,
  `penarikan_saldo` double NOT NULL,
  `penarikan_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penarikandana`
--

INSERT INTO `penarikandana` (`penarikan_id`, `idPelapak`, `penarikan_saldo`, `penarikan_tanggal`) VALUES
(10, 38, 100000, '2021-07-19 13:32:09'),
(11, 38, 7000000, '2021-07-19 14:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `rekdinas`
--

CREATE TABLE `rekdinas` (
  `idRekening` int(11) UNSIGNED NOT NULL,
  `namaBank` varchar(20) NOT NULL,
  `nomorRek` varchar(20) NOT NULL,
  `namaRek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekdinas`
--

INSERT INTO `rekdinas` (`idRekening`, `namaBank`, `nomorRek`, `namaRek`) VALUES
(11, 'Mandiri', '6234523457322222', 'Binti Nurmawatin'),
(13, 'Mandiri', '12345678901233434423', 'Dhella Ardwian');

-- --------------------------------------------------------

--
-- Table structure for table `rekpelapak`
--

CREATE TABLE `rekpelapak` (
  `idRekening` int(11) UNSIGNED NOT NULL,
  `idPelapak` int(11) UNSIGNED NOT NULL,
  `namaBank` varchar(20) NOT NULL,
  `noRek` varchar(50) NOT NULL,
  `namaRek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekpelapak`
--

INSERT INTO `rekpelapak` (`idRekening`, `idPelapak`, `namaBank`, `noRek`, `namaRek`) VALUES
(44, 38, 'BRI', '654323445445', 'Samidi'),
(45, 39, 'Waluyo', '642312234344', 'Mandiri'),
(48, 50, 'Mandiri', '12334435455', 'dhella');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) UNSIGNED NOT NULL,
  `idPelapak` int(11) UNSIGNED NOT NULL,
  `idPelanggan` int(11) UNSIGNED NOT NULL,
  `noOrder` varchar(30) NOT NULL,
  `tglOrder` datetime NOT NULL,
  `nmPenerima` varchar(30) NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `idProvince` int(11) NOT NULL,
  `idCity` int(11) NOT NULL,
  `provinceName` varchar(30) NOT NULL,
  `cityName` varchar(30) NOT NULL,
  `kodepos` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kurir` varchar(10) NOT NULL,
  `paket_nama` varchar(20) NOT NULL,
  `paket_harga` varchar(50) NOT NULL,
  `paket_etd` varchar(50) NOT NULL,
  `namaBank` varchar(20) NOT NULL,
  `noRek` varchar(20) NOT NULL,
  `namaRek` varchar(50) NOT NULL,
  `statusPembayaran` int(1) NOT NULL,
  `buktiPembayaran` text NOT NULL,
  `statusOrder` int(1) NOT NULL,
  `totalProduk` int(11) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `totalBerat` int(11) NOT NULL,
  `subTotalBayar` varchar(20) NOT NULL,
  `ongkir` varchar(20) NOT NULL,
  `noresi` varchar(50) NOT NULL,
  `totalBayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idPelapak`, `idPelanggan`, `noOrder`, `tglOrder`, `nmPenerima`, `noTelp`, `idProvince`, `idCity`, `provinceName`, `cityName`, `kodepos`, `alamat`, `kurir`, `paket_nama`, `paket_harga`, `paket_etd`, `namaBank`, `noRek`, `namaRek`, `statusPembayaran`, `buktiPembayaran`, `statusOrder`, `totalProduk`, `totalqty`, `totalBerat`, `subTotalBayar`, `ongkir`, `noresi`, `totalBayar`) VALUES
(110, 38, 8, '210713955270001', '2021-07-13 09:55:27', 'Bu Waluyo', '089675656', 6, 152, 'DKI Jakarta', 'Kota Jakarta Pusat', '64182', 'Doko Ngasem Kediri', 'jne', 'OKE', '15000', '14 Jul - 17 Jul', 'Waluyo', '1234', 'Bambang', 1, '0054.jpg', 3, 1, 2, 500, '50000', '15000', 'jne1233', '65000'),
(111, 39, 8, '210713958010001', '2021-07-13 09:58:01', 'Bu Waluyo', '9876', 11, 74, 'Jawa Timur', 'Kabupaten Blitar', '64182', 'Doko Ngasem Kediri', 'pos', 'Paket Kilat Khusus', '24000', '14 Jul - 17 Jul', 'Mandiri', '3456665', 'Bambang', 1, 'CamScanner_04-10-2021_17_31.jpg', 3, 1, 1, 2500, '2500000', '24000', 'jnt123', '2524000'),
(113, 39, 8, '2107131036500001', '2021-07-13 10:36:50', 'Danar', '12324', 11, 178, 'Jawa Timur', 'Kabupaten Kediri', '64182', 'Doko Ngasem Kediri', 'jne', 'OKE', '21000', '14 Jul - 17 Jul', 'Waluyo', '123', 's', 1, '0041.jpg', 3, 1, 1, 2500, '2500000', '21000', '', '2521000'),
(114, 38, 8, '2107131049550001', '2021-07-13 10:49:55', 'Danar', '1323233', 11, 178, 'Jawa Timur', 'Kabupaten Kediri', '64182', 'Doko Ngasem Kediri', 'pos', 'Paket Kilat Khusus', '8000', '14 Jul - 17 Jul', 'Mandiri', '3456665', 'Bambang', 1, 'merah_11.png', 3, 1, 1, 250, '25000', '8000', '111233343df', '33000'),
(115, 38, 8, '2107132319320001', '2021-07-13 23:19:32', 'Bu Waluyo', '089756563', 11, 178, 'Jawa Timur', 'Kabupaten Kediri', '64182', 'Doko Ngasem Kediri', 'jne', 'OKE', '7000', '14 Jul - 17 Jul', 'Mandiri', '6455452', 'Waluyo', 1, 'bukti2.jpg', 3, 1, 2, 500, '50000', '7000', 'JNE12344543', '57000'),
(116, 38, 9, '2107141047290001', '2021-07-14 10:47:29', 'Dhella', '08965423512', 11, 247, 'Jawa Timur', 'Kabupaten Madiun', '64182', 'Doko Ngasem Kediri', 'jne', 'OKE', '7000', '15 Jul - 18 Jul', 'Mandiri', '089756232', 'Dhella', 1, 'somethinc-4500-2689372-1.jpg', 3, 1, 2, 500, '50000', '7000', 'jne1234', '57000'),
(117, 38, 8, '2107191323110001', '2021-07-19 13:23:11', 'Bu Waluyo', '9876', 11, 178, 'Jawa Timur', 'Kabupaten Kediri', '64182', 'Doko Ngasem Kediri', 'jne', 'OKE', '7000', '20 Jul - 23 Jul', 'Mandiri', '34', 's', 1, '11.png', 1, 1, 3, 750, '75000', '7000', '', '82000');

-- --------------------------------------------------------

--
-- Table structure for table `user_2`
--

CREATE TABLE `user_2` (
  `idUser` int(11) UNSIGNED NOT NULL,
  `namaPengguna` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `level` enum('Admin','Pelapak') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_2`
--

INSERT INTO `user_2` (`idUser`, `namaPengguna`, `username`, `pass`, `level`, `foto`) VALUES
(19, 'Admin', 'admin', '1844156d4166d94387f1a4ad031ca5fa', 'Admin', 'merah_12.png'),
(20, 'SMD Trapping', 'samidi', 'db8bc8ceb24a2b76a1f9028ec69f00b4', 'Pelapak', 'umkm12.png'),
(21, 'Toko Bintang Sejahtera', 'sukemi', '5ac05b8383c86e98ffc26229831127a7', 'Pelapak', 'umkm14.png'),
(26, 'Apotik Nawi', 'asnawi', '72a017834ee67dfe507d6d9edb74493a', 'Pelapak', 'umkm16.png'),
(27, 'Cookies Binti', 'binti', '5a993b633cc8ba84976505d464256515', 'Pelapak', 'umkm2.png'),
(28, 'Ar Rahmah', 'ida', '7f78f270e3e1129faf118ed92fdf54db', 'Pelapak', 'umkm21.png'),
(29, 'Elektronik Barokah', 'indra', 'e24f6e3ce19ee0728ff1c443e4ff488d', 'Pelapak', 'umkm18.png'),
(30, 'Nafia Cake and Cookies', 'nafiatul', '56b28e16c4e95951e267d5d0616d8eb4', 'Pelapak', 'umkm22.png'),
(31, 'Florist Sekar Arum', 'wiyani', 'f3c97322578af26280261f0829498b62', 'Pelapak', 'umkm23.png'),
(32, 'Beauty Skincare', 'indah', 'f3385c508ce54d577fd205a1b2ecdfb7', 'Pelapak', 'umkm24.png'),
(33, 'Admin', 'Binti Nurmawatin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'merah_13.png'),
(34, 'Tarrajut', 'putri', '4093fed663717c843bea100d17fb67c8', 'Pelapak', 'umkm26.png'),
(35, 'Zaskia Kosmetik', 'sudaryanti', '3a19c51e504150dc12257dfaa5d4ae96', 'Pelapak', 'umkm27.png'),
(36, 'Toko Barokah', 'dhella12', '0f96bfd2137cb617cc09fae99db406ab', 'Admin', 'umkm28.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataproduk`
--
ALTER TABLE `dataproduk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `dataProduk_FKIndex1` (`idPelapak`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`idDetail`),
  ADD KEY `idTransaksi` (`idTransaksi`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idCart`),
  ADD KEY `idProduk` (`idProduk`),
  ADD KEY `idPelapak` (`idPelapak`),
  ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `pelapakumkm`
--
ALTER TABLE `pelapakumkm`
  ADD PRIMARY KEY (`idPelapak`),
  ADD KEY `idkategori` (`idkategori`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `penarikandana`
--
ALTER TABLE `penarikandana`
  ADD PRIMARY KEY (`penarikan_id`),
  ADD KEY `idPelapak` (`idPelapak`);

--
-- Indexes for table `rekdinas`
--
ALTER TABLE `rekdinas`
  ADD PRIMARY KEY (`idRekening`);

--
-- Indexes for table `rekpelapak`
--
ALTER TABLE `rekpelapak`
  ADD PRIMARY KEY (`idRekening`),
  ADD KEY `rekPelapak_FKIndex1` (`idPelapak`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idPelanggan` (`idPelanggan`),
  ADD KEY `idPelapak` (`idPelapak`);

--
-- Indexes for table `user_2`
--
ALTER TABLE `user_2`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataproduk`
--
ALTER TABLE `dataproduk`
  MODIFY `idProduk` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `idDetail` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `idCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelapakumkm`
--
ALTER TABLE `pelapakumkm`
  MODIFY `idPelapak` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `penarikandana`
--
ALTER TABLE `penarikandana`
  MODIFY `penarikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rekdinas`
--
ALTER TABLE `rekdinas`
  MODIFY `idRekening` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rekpelapak`
--
ALTER TABLE `rekpelapak`
  MODIFY `idRekening` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `user_2`
--
ALTER TABLE `user_2`
  MODIFY `idUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dataproduk`
--
ALTER TABLE `dataproduk`
  ADD CONSTRAINT `dataproduk_ibfk_1` FOREIGN KEY (`idPelapak`) REFERENCES `pelapakumkm` (`idPelapak`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `dataproduk` (`idProduk`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_4` FOREIGN KEY (`idProduk`) REFERENCES `dataproduk` (`idProduk`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pelapakumkm`
--
ALTER TABLE `pelapakumkm`
  ADD CONSTRAINT `pelapakumkm_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelapakumkm_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user_2` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penarikandana`
--
ALTER TABLE `penarikandana`
  ADD CONSTRAINT `penarikandana_ibfk_1` FOREIGN KEY (`idPelapak`) REFERENCES `pelapakumkm` (`idPelapak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekpelapak`
--
ALTER TABLE `rekpelapak`
  ADD CONSTRAINT `rekpelapak_ibfk_1` FOREIGN KEY (`idPelapak`) REFERENCES `pelapakumkm` (`idPelapak`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idPelapak`) REFERENCES `pelapakumkm` (`idPelapak`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
