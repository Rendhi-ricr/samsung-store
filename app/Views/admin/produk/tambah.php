<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola Produk<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="mb-4">Tambah Produk</h1>

    <form action="<?= base_url('admin/produk/simpan') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <!-- Input Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Masukkan nama produk" required>
        </div>

        <!-- Input Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi produk"><?= old('deskripsi'); ?></textarea>
        </div>

        <!-- Input Gambar -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label>
            <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*" required>
        </div>

        <!-- Input Harga -->
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>" placeholder="Masukkan harga produk" required>
        </div>

        <!-- Input Stok -->
        <div class="mb-3">
            <label for="stok" class="form-label">Stok Produk</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?= old('stok'); ?>" placeholder="Masukkan jumlah stok produk" required>
        </div>

        <!-- Input Kategori -->
        <div class="mb-3">
            <label for="kategori">Kategori</label>
            <select name="id_kategori" class="form-control" id="kategori">
                <option value="">Pilih Kategori</option>
                <?php foreach ($Kategori as $kategori) : ?>
                    <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/produk" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>