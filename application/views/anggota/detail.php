<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card p-3 shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3>Data Diri</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table style="width: 100%;" class="table">
                                <tbody>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="1%">:</td>
                                        <td><?= $anggota['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>:</td>
                                        <td><?= $anggota['tempat_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?= $anggota['tanggal_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?= $anggota['jenis_kelamin']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td><?= $anggota['agama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor HP</td>
                                        <td>:</td>
                                        <td><?= $anggota['nomor_hp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Asal</td>
                                        <td>:</td>
                                        <td><?= $anggota['alamat_asal']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Domisili</td>
                                        <td>:</td>
                                        <td><?= $anggota['alamat_domisili']; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td><?= $anggota['pekerjaan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Tempat Kerja</td>
                                    <td>:</td>
                                    <td><?= $anggota['alamat_tempat_kerja']; ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>:</td>
                                    <td><?= $anggota['pendidikan_id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>:</td>
                                    <td><?= $anggota['pendidikan_jurusan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Hobi</td>
                                    <td>:</td>
                                    <td><?= $anggota['hobi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><?= $anggota['status']; ?></td>
                                </tr>
                                <?php if ($anggota['status'] == 'Kawin') : ?>
                                <tr>
                                    <td>Nama Pasangan</td>
                                    <td>:</td>
                                    <td><?= $anggota['nama_pasangan']; ?></td>
                                </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                    <?php if (count($anak) > 0) : ?>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h3>Data Anak</h3>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table tableAnak">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Nama</th>
                                    <th width="30%">Tempat, Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($anak as $i => $value) : ?>
                                    <tr>
                                        <td><?= $i+1; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['tempat_lahir']; ?>, <?= $value['tanggal_lahir']; ?></td>
                                        <td><?= $value['jenis_kelamin']; ?></td>
                                        <td><?= $value['agama']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>