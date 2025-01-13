<?= $this->extend('layouts/front/base') ?>
<?= $this->section('title') ?>Galeri Foto<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="mb-4">Galeri Foto</h2>
        <hr class="w-50 mx-auto" style="height: 3px; background-color: #000; border: none;">
    </div>
    <div class="row">
        <?php foreach ($galeri as $g) : ?>
            <div class="col-md-3">
                <div class="gallery-item">
                    <img src="<?= base_url('img/galeri/' . $g['gambar']) ?>" alt="<?= $g['nama_galeri'] ?>">
                    <div class="title"><?= $g['nama_galeri']; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>