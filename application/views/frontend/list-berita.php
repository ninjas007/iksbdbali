<?php if (!empty($list_berita)) { ?>
    <?php foreach ($list_berita as $key => $row) { ?>
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex">
                <a href="<?= base_url('blog/'.$row->slug.'') ?>" class="img img-2"
                    style="background-image: url(<?= base_url('assets/img') ?>/berita/<?= $row->gambar ?>);"></a>
                <div class="text text-2 pl-md-4">
                    <h3 class="mb-2">
                        <a href="<?= base_url('blog/'.$row->slug.'') ?>" target="_blank"><?= $row->judul ?></a>
                    </h3>
                    <div class="meta-wrap">
                        <p class="meta">
                            <span><i class="icon-calendar mr-2"></i><?= date('d F Y', strtotime($row->created_at)) ?></span>
                            <span><i class="icon-user-o mr-2"></i><?= $row->author ?></span>
                        </p>
                    </div>
                    <p class="mb-4">
                        <?= substr(strip_tags($row->deskripsi), 0, 200) ?>
                    </p>
                    <p><a target="_blank" href="<?= base_url('blog/'.$row->slug.'') ?>" class="btn-custom">Read More <span
                                class="ion-ios-arrow-forward"></span></a></p>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } else { ?>
    <div class="col-md-12">
        <div class="blog-entry ftco-animate d-md-flex">
            <p>Tidak ada berita</p>
        </div>
    </div>
<?php } ?>