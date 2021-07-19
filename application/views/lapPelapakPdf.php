<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
        }

        th {
            height: 30px;
            text-align: center;
        }

        table,z
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 3px;
        }

        thead {
            background: lightgray;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <center><b><font size="5" face="arial">UMKM KABUPATEN NGANJUK</font><b></center>
    <center><b><font size="4" face="Courier New">Izin Mikro</font></b></center>    
    <center>Jl. Dermojoyo No.45, Payaman, Kec. Nganjuk, Kabupaten Nganjuk, Jawa Timur 64418</center>
    <hr><width="100" height="75"></hr>       
    <table style="width=100%;" border="1" align="center">
             <tr align="center">
                    <td class="text-center">No</td>
                    <th class="text-center">Nama</th>
                    <th class="text-center">NIB</th>
                    <th class="text-center">Kategori Usaha</th>
                    <th class="text-center">Nama UMKM</th>
                    <th class="text-center">Alamat UMKM</th>
                    <th class="text-center">Kecamatan</th>
                    <th class="text-center">Kelurahan</th>
                    <th class="text-center">No Telepon</th>
                  </tr>
            </tr>
            <?php $no = 1;
                foreach ($pelapakumkm as  $value) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value->namaPmlk?></td>
                    <td><?php echo $value->NIB ?></td>
                    <td><?php echo $value->namaKategori ?></td>
                    <td><?php echo $value->namaUmkm ?></td>
                    <td><?php echo $value->alamat ?></td>
                    <td><?php echo $value->Kecamatan ?></td>
                    <td><?php echo $value->Kelurahan ?></td>
                    <td><?php echo $value->noTelepon ?></td>
                </tr>
            <?php } ?>
    </table>
</body>