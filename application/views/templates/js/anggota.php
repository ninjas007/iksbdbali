<!-- table 2 excel -->
<script src="https://cdn.jsdelivr.net/npm/jquery-table2excel@1.1.1/dist/jquery.table2excel.min.js"></script>
<script>
    exportXls = function() {
        $.ajax({
            url: "<?= base_url('anggota/exportXls'); ?>",
            type: 'post',
            dataType: 'json',
            success: function (data) {
                contentTable(data);
                $("#tableExport").table2excel({
                    name: "Data Anggota",
                    filename: "Data Anggota.xls",
                    preserveColors: false
                });
            },
            error: function () {
                alert('Terjadi kesalahan');
            }
        })
    }

    function contentTable(data) {
        let tbody = ``;
        data.forEach((value, index) => {
            tbody += `<tr>
                            <td>${index+1}</td>
                            <td>${value['nama']}</td>
                            <td>${value['tempat_lahir']}, ${value['tanggal_lahir']}</td>
                            <td>${value['jenis_kelamin']}</td>
                            <td>${value['agama']}</td>
                            <td>${value['nomor_hp']}</td>
                            <td>${value['alamat_asal']}</td>
                            <td>${value['alamat_domisili']}</td>
                            <td>${value['pekerjaan']}</td>
                            <td>${value['alamat_tempat_kerja']}</td>
                            <td>${value['nama_pendidikan']}</td>
                            <td>${value['pendidikan_jurusan']}</td>
                            <td>${value['hobi']}</td>
                            <td>${value['status']}</td>
                            <td>${value['nama_pasangan']}</td>
                            <td>${value['jml_anak']}</td>
                        </tr>`;
        })
        let table = `<table id="tableExport" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
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
                            ${tbody}
                        </tbody>
                    </table>`;

        $('#contentExcel').html(table);
    }
</script>