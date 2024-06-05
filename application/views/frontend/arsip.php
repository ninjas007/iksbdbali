<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-8 px-md-5 py-5">
                    <div class="row pt-md-4">
                    </div>
                </div>

                <?php $this->load->view('frontend/right-sidebar', [
                    'recents' => $recents,
                    'arsip' => $arsip
                ]) ?>

            </div>
            <div class="row">
                <div class="col">
                    <div class="tag-widget post-tag-container">
                        <div class="tagcloud">
                            <a href="<?= base_url() ?>" class="tag-cloud-link">Kembali ke Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->