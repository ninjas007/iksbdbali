<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4" id="cardForm">
                <div class="card-header">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Data Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled-tab" data-toggle="tab" href="#tabs-2" role="tab">
                                Data Pasangan  <br><small style="font-style: italic; color: red">Harus status kawin</small>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled-tab" data-toggle="tab" href="#tabs-3" role="tab">
                                Data Anak  <br><small style="font-style: italic; color: red">Harus status kawin</small>
                            </a>
                        </li>
                    </ul>
                </div>
                <form method="post" action="<?= base_url('member/save'); ?>">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <?php include('data-diri-edit.php'); ?>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <!-- <?php include('data-pasangan-edit.php'); ?> -->
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="btnAddAnak">
                                           <i class="fa fa-plus"></i> Tambah Anak
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="table-row">
                                    <?php include('data-anak-edit.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>