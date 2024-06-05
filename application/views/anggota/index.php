<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row gutters">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="m-0">
                        <a href="<?php echo base_url('/anggota/tambah') ?>" class="btn btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Tambah anggota</a>
                        <a href="javascript:void(0)" onclick="exportPdf()" class="btn btn-sm btn-dark">
                            <i class="fa fa-download"></i> Pdf
                        </a>
                        <a href="javascript:void(0)" onclick="exportXls()" class="btn btn-sm btn-success">
                            <i class="fa fa-download"></i> Excel
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" cellpadding="0" cellspacing="0">
                        <table class="table table-bordered font-weight-bold datatable-init" id="tableAnggota" width="100%"
                            cellspacing="0" style="font-size: 10px !important;">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th>Nama</th>
                                    <th>Tempat, <br> Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Nomor HP</th>
                                    <th>Alamat <br> Asal</th>
                                    <th>Alamat <br> Domisili</th>
                                    <th>Pekerjaan</th>
                                    <th>Alamat <br> Tempat Kerja</th>
                                    <th>Pendidikan <br> Terakhir</th>
                                    <th>Jurusan</th>
                                    <th>Hobi</th>
                                    <th>Status</th>
                                    <th>Nama <br> Pasangan</th>
                                    <th>Jumlah Anak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($anggota) : ?>
                                <?php foreach ($anggota as $i => $a) : ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <a href="<?= base_url('anggota/detail/' . $a['id']) ?>"
                                            class="badge badge-info p-2" title="Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <br>
                                        <a href="<?= base_url('anggota/edit/' . $a['id']) ?>"
                                            class="badge badge-primary p-2" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <br>
                                        <a href="<?= base_url('anggota/delete/' . $a['id']) ?>"
                                            class="badge badge-danger p-2"
                                            onclick="return confirm('Yakin ingin mendelete data ini?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('anggota/detail/' . $a['id']) ?>">
                                            <?= $a['nama'] ?>
                                        </a>
                                    </td>
                                    <td><?= $a['tempat_lahir'] ?>, <?= $a['tanggal_lahir'] ?></td>
                                    <td><?= $a['jenis_kelamin'] ?></td>
                                    <td><?= $a['agama'] ?></td>
                                    <td><?= $a['nomor_hp'] ?></td>
                                    <td><?= $a['alamat_asal'] ?></td>
                                    <td><?= $a['alamat_domisili'] ?></td>
                                    <td><?= $a['pekerjaan'] ?></td>
                                    <td><?= $a['alamat_tempat_kerja'] ?></td>
                                    <td><?= $a['nama_pendidikan'] ?></td>
                                    <td><?= $a['pendidikan_jurusan'] ?></td>
                                    <td><?= $a['hobi'] ?></td>
                                    <td><?= $a['status'] ?></td>
                                    <td>
                                        <a
                                            href="<?= base_url('anggota/detail/' . $a['id']) ?>"><?= $a['nama_pasangan'] ?></a>
                                    </td>
                                    <td>
                                        <?= $a['jml_anak'] ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <tr>
                                    <td class="text-center" colspan="17">Tidak ada data</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contentExcel" style="display: none;"></div>

</div>

</div>