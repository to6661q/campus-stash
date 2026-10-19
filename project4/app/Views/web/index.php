<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card col-md-9">
                <div class="card-body">
                    <img src="/img/20220308_PengumumanDiklasar.jpg" width="100%">
                </div>
            </div>
            <div class="card col-md-3">
                <?php foreach ($beritaterkini as $bterkini) : ?>
                    <div class="card-body">
                        <img class="card-img-top" src="/img/beritaippat/<?= $bterkini['id_berita']; ?>_1.jpeg">
                        <p class="card-text"><?= $bterkini['caption']; ?></p>
                        <a href="/web/<?= $bterkini['jenis']; ?>/<?= $bterkini['id_berita']; ?>" class="card-link">Baca Selengkapnya</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>