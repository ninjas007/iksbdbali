<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
    <div class="sidebar-box pt-md-4">
        <form action="<?= base_url('') ?>" class="search-form">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Cari berita" name="search" value="<?= $this->input->get('search') ?? '' ?>">
            </div>
        </form>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Berita Terbaru</h3>
        <?php if (!empty($recents)) : ?>

            <?php foreach ($recents as $recent) : ?>
                <div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(<?= base_url('assets/img/berita/' . $recent->gambar) ?>);"></a>
                    <div class="text">
                        <h3 class="heading"><a href="<?= base_url('blog/' . $recent->slug) ?>" target="_blank"><?= substr($recent->judul, 0, 50); ?></a>
                        </h3>
                        <div class="meta">
                            <div><span class="icon-calendar"></span> <?= date('d F Y', strtotime($recent->created_at)) ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        <?php else : ?>
            <div class="block-21 mb-4 d-flex">
                <div class="text-center">Tidak ada berita</div>
            </div>
        <?php endif; ?>
    </div>


    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Arsip</h3>
        <ul class="categories">
            <?php if (!empty($arsip)) : ?>

                <?php foreach ($arsip as $row) : ?>
                    <li>
                        <a href="<?= base_url('blog/arsip?year=' . $row->year) . '&month=' . $row->month ?>">
                            <?= $row->month ?> <?= $row->year ?> <span>(<?= $row->total ?>)</span>
                        </a>
                    </li>
                <?php endforeach ?>

            <?php else : ?>
                <li><a href="#">Tidak ada arsip</a></li>
            <?php endif; ?>
        </ul>
    </div>

</div>