<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('berita/save'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="hidden" name="is_tambah" value="0">
                                <input type="hidden" name="id" value="<?= $berita['id']; ?>">
                                <div class="form-group">
                                    <label for="judul">Judul Berita</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul']; ?>" required>
                                    <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Berita</label>
                                    <textarea class="form-control tiny" id="deskripsi" name="deskripsi" rows="12">
                                        <?= $berita['deskripsi']; ?>
                                    </textarea>
                                    <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div id="preview" class="mb-3">
                                        <img src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>" alt="<?= $berita['gambar']; ?>" style="width: 100%; height: 300px; object-fit: contain">
                                    </div>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->