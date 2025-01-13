<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Edit Produk<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="mb-4">Edit Produk</h1>

    <form action="<?= base_url('admin/produk/update/' . $produk['id_produk']); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <!-- Input Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $produk['nama']); ?>" placeholder="Masukkan nama produk" required>
        </div>

        <!-- Input Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi produk"><?= old('deskripsi', $produk['deskripsi']); ?></textarea>
        </div>

        <!-- Input Gambar -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label>
            <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>
        <?php if ($produk['gambar']): ?>
            <div class="mb-3">
                <img src="<?= base_url('img/produk/' . $produk['gambar']); ?>" alt="Gambar Produk" class="img-thumbnail" style="max-width: 200px;">
            </div>
        <?php endif; ?>

        <!-- Input Harga -->
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= old('harga', $produk['harga']); ?>" placeholder="Masukkan harga produk" required>
        </div>

        <!-- Input Kategori -->
        <div class="mb-3">
            <label for="kategori">Kategori</label>
            <select name="id_kategori" class="form-control" id="kategori">
                <?php foreach ($Kategori as $kategori) : ?>
                    <option value="<?= $kategori['id_kategori']; ?>" <?= ($kategori['id_kategori'] == $produk['id_kategori']) ? 'selected' : '' ?>><?= $kategori['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="/admin/produk" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>