<?= $this->extend('layouts/front/base') ?>
<?= $this->section('title') ?>Produk<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="mb-4">Produk Kami</h2>
        <hr class="w-50 mx-auto" style="height: 3px; background-color: #000; border: none;">
    </div>
    <form method="get" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    <?php foreach ($kategori as $kat): ?>
                        <option value="<?= $kat->id_kategori ?>" <?= ($selectedKategori == $kat->id_kategori) ? 'selected' : '' ?>>
                            <?= esc($kat->nama_kategori) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </form>


    <div class="row ">
        <?php if (!empty($produk)): ?>
            <?php foreach ($produk as $pro): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="position-relative">
                            <img src="<?= base_url('img/produk/' . $pro->gambar) ?>" class="card-img-top" alt="<?= esc($pro->nama) ?>">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= esc($pro->nama); ?></h5>
                            <div class="row mt-5">
                                <div class="col-md-6 text-start">
                                    <p class="text-muted mb-2 ">Harga:</p>
                                    <p class="fw-bold">Rp <?= number_format($pro->harga, 0, ',', '.'); ?></p>
                                </div>
                                <div class="col-md-6 text-start"><a href="https://wa.me/6281321281626" class="btn btn-primary">Beli Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada produk yang ditemukan.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>