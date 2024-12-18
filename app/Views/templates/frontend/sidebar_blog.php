<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form action="<?php echo site_url('artikel/cari') ?>" method="get">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="q" placeholder="Cari Artikel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Artikel'" />
                        <div class="input-group-append">
                            <button class="btns" type="submit">
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title" style="color: #2d2d2d">Kategori</h4>
            <ul class="list cat-list">
                <?php foreach ($all_kategori as $data) : ?>
                    <li>
                        <a href="<?php echo base_url() . 'artikel/' . $data->kategori_slug; ?>" class="d-flex">
                            <p><?php echo  $data->kategori_nama ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
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
                        <a href="<?php echo site_url() . 'detail_artikel' . '/' . $data->artikel_slug; ?>">
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