<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-8 py-5 px-md-5">
                    <div class="row pt-md-4 ">
                        <?php $this->load->view('frontend/list-berita', ['list_berita' => $list_berita]) ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="block-27" style="text-align: center;">
                                <?= $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php $this->load->view('frontend/right-sidebar', [
                    'recents' => $recents,
                    'arsip' => $arsip
                ]) ?>
            </div>
        </div>
    </section>
</div>