<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card col-md-9">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <?php for ($x = 1; $x < $beritadetail['img_cnt']; $x++) { ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $x; ?>"></li>
                        <?php } ?>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/img/beritaippat/<?= $beritadetail['id_berita']; ?>_1.jpeg">
                        </div>
                        <?php for ($x = 2; $x <= $beritadetail['img_cnt']; $x++) { ?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="/img/beritaippat/<?= $beritadetail['id_berita']; ?>_<?= $x; ?>.jpeg">
                            </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?= $beritadetail['judul']; ?></h2>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $beritadetail['lokasi']; ?>, <?= date("d M Y", strtotime($beritadetail['created_at'])); ?></h6>
                    <?= $beritadetail['detail']; ?>
                </div>
            </div>
            <div class="card col-md-3">
                <?php foreach ($beritappipat as $bppipat) : ?>
                    <div class="card-body">
                        <img class="card-img-top" src="/img/beritaippat/<?= $bppipat['id_berita']; ?>_1.jpeg">
                        <p class="card-text"><?= $bppipat['caption']; ?></p>
                        <a href="/web/<?= $bppipat['jenis']; ?>/<?= $bppipat['id_berita']; ?>" class="card-link">Baca Selengkapnya</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>