<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row gutters">
        <div class="col-lg-8">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="m-0">
                        <a href="<?php echo base_url('/berita/tambah') ?>" class="btn btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Tambah Berita</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" cellpadding="0" cellspacing="0">
                        <table class="table table-bordered font-weight-bold" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 10px !important;">
                            <thead class="thead-light">
                               <tr>
                                    <th width="5%">No</th>
                                    <th>Judul</th>
                                    <th style="text-align: center;" width="20%">#</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php if ($berita) : ?>
                                    <?php foreach ($berita as $i => $p) : ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $p['judul'] ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('berita/edit/' . $p['id']) ?>"
                                                    class="badge badge-primary p-2">Ubah</a> 
                                                <a href="<?= base_url('berita/delete/' . $p['id']) ?>"
                                                    class="badge badge-danger p-2"
                                                    onclick="return confirm('Yakin ingin mendelete data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td class="text-center" colspan="3">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>