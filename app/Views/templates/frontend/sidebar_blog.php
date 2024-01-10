<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form action="#">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" />
                        <div class="input-group-append">
                            <button class="btns" type="button">
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">
                    Cari
                </button>
            </form>
        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title" style="color: #2d2d2d">Kategori</h4>
            <ul class="list cat-list">
                <li>
                    <a href="#" class="d-flex">
                        <p>Tips</p>
                        <p>(10)</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex">
                        <p>Informasi</p>
                        <p>(3)</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex">
                        <p>Prestasi</p>
                        <p>(5)</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex">
                        <p>Sosial</p>
                        <p>(7)</p>
                    </a>
                </li>
            </ul>
        </aside>
        <?php

        use CodeIgniter\I18n\Time; ?>

        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title" style="color: #2d2d2d">
                Blog Terbaru
            </h3>
            <?php foreach ($latest_artikel as $data) :  ?>
                <?php $latestArtikelTanggal = new DateTime($data->artikel_tanggal); ?>
                <?php $formatDateLatest = $latestArtikelTanggal->format('d-m-Y H:i:s'); ?>
                <?php $latestArtikel = Time::parse($formatDateLatest, 'Asia/Jakarta'); ?>
                <div class="media post_item">
                    <img src="<?php echo base_url() . 'assets/img/artikel/' . $data->artikel_cover ?>" alt="post" width="90" height="90" />
                    <div class="media-body">
                        <a href="blog_details.html">
                            <h3 style="color: #2d2d2d">
                                <?php echo $data->artikel_judul ?>
                            </h3>
                        </a>
                        <p><?php echo $latestArtikel->toLocalizedString('d MMMM yyyy') ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </aside>
    </div>
</div>