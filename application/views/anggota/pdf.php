<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
    <style>
        /* make landscape */
        @page { size: landscape; }
        body {
            font-size: 8px !important; /* Mengatur ukuran font */
            margin: 3px; /* Mengatur margin */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Tambahkan ini untuk memastikan sel tabel memiliki lebar tetap */
        }
        th, td {
            border: 1px solid #000;
            padding: 1px;
            text-align: left;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Anggota</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Nomor HP</th>
                <th>Alamat Asal</th>
                <th>Alamat Domisili</th>
                <th>Pekerjaan</th>
                <th>Alamat Tempat Kerja</th>
                <th>Pendidikan Terakhir</th>
                <th>Jurusan</th>
                <th>Hobi</th>
                <th>Status</th>
                <th>Nama Pasangan</th>
                <th>Jumlah Anak</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anggota as $index => $value): ?>
            <tr>
                <td><?php echo $value['nama']; ?></td>
                <td><?php echo $value['tempat_lahir'] . ', ' . $value['tanggal_lahir']; ?></td>
                <td><?php echo $value['jenis_kelamin']; ?></td>
                <td><?php echo $value['agama']; ?></td>
                <td><?php echo $value['nomor_hp']; ?></td>
                <td><?php echo $value['alamat_asal']; ?></td>
                <td><?php echo $value['alamat_domisili']; ?></td>
                <td><?php echo $value['pekerjaan']; ?></td>
                <td><?php echo $value['alamat_tempat_kerja']; ?></td>
                <td><?php echo $value['nama_pendidikan']; ?></td>
                <td><?php echo $value['pendidikan_jurusan']; ?></td>
                <td><?php echo $value['hobi']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['nama_pasangan']; ?></td>
                <td><?php echo $value['jml_anak']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
