<!-- html pdf -->
<script src="<?= base_url('assets/js/html2pdf.bundle.min.js') ?>"></script>

<!-- table 2 excel -->
<script src="<?= base_url('assets/js/jquery.table2excel.min.js') ?>"></script>
<script>
    function exportXls() {
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
        let table = `<table id="tableExport" class="small-font" style="margin-top: 40px">
                        <thead>
                            <tr>
                                <th colspan="16" style="text-align: center; padding: 10px; font-size: 18px; font-weight: bold">Data Anggota</th>
                            </tr>
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
                            ${tbody}
                        </tbody>
                    </table>`;

        $('#contentExcel').html(table);
    }

    function exportPdf() {
        $.ajax({
            url: "<?= base_url('anggota/exportPdf'); ?>",
            type: 'post',
            dataType: 'json',
            success: function (data) {
                contentTable(data);
                var element = document.getElementById('tableExport');
                var opt = {
                    margin: 0.1,
                    filename: 'Data_Anggota.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 100 // Set quality to highest
                    },
                    html2canvas: {
                        scale: 2 // Increase scale for higher resolution
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'landscape'
                    }
                };

                // New Promise-based usage:
                html2pdf().set(opt).from(element).save();
            },
            error: function () {
                alert('Terjadi kesalahan');
            }
        })
    }
</script>