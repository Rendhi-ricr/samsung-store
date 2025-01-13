<?= $this->extend('layouts/front/base') ?>
<?= $this->section('title') ?>Home<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section>
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('img/banner/1.jpg') ?>" class="d-block w-100" alt="Banner 1">

            </div>
            <div class="carousel-item">
                <img src="<?= base_url('img/banner/2.webp') ?>" class="d-block w-100" alt="Banner 2">

            </div>
            <div class="carousel-item">
                <img src="<?= base_url('img/banner/3.webp') ?>" class="d-block w-100" alt="Banner 3">

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="my-3">
    <div class="container-fluid text-center">
        <h2 class="mb-4">Tentang Kami</h2>
        <hr class="w-50 mx-auto" style="height: 3px; background-color: #000; border: none;">
        <h5>Samsung adalah salah satu perusahaan teknologi terbesar di dunia yang berasal dari Korea Selatan. Didirikan pada 1 Maret 1938 oleh Lee Byung-chul, Samsung awalnya bukanlah perusahaan teknologi, melainkan perusahaan perdagangan kecil di kota Daegu, Korea Selatan. Nama "Samsung" sendiri berarti "tiga bintang," yang melambangkan kebesaran, kekuatan, dan keabadian.</h5>
    </div>
</section>
<section class="my-5">
    <div class="container-fluid text-center">
        <h2 class="mb-4">Produk Terbaru</h2>
        <hr class="w-50 mx-auto" style="height: 3px; background-color: #000; border: none;">
        <div class="owl-carousel owl-theme">
            <?php foreach ($produk as $key => $pro): ?>
                <!-- Item 1 -->
                <div class="item">
                    <div class="card">
                        <img src="<?= base_url('img/produk/' . $pro->gambar) ?>" class="card-img-top" alt="<?= $pro->nama ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $pro->nama; ?></h5>
                            <p class="card-text"><?= substr($pro->deskripsi, 0, 300) ?>...</p> <!-- Membatasi jumlah kata -->
                            <h5 class="card-text text-start">Harga : Rp <?= number_format($pro->harga, 0, ',', '.'); ?></h5> <!-- Membatasi jumlah kata -->
                            <h6 class="card-text text-start">Kategori : <?= $pro->nama_kategori; ?></h6> <!-- Membatasi jumlah kata -->
                            <a href="https://wa.me/6285222258509" class="btn btn-primary mt-3">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="" class="btn btn-primary w-100 my-5">Produk Lainnya</a>
    </div>
</section>
<?= $this->endSection() ?>