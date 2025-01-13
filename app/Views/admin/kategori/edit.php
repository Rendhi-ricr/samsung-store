<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola Produk<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h2>Edit Kategori</h2>
    <form action="<?= base_url('admin/kategori/update/' . $kategori['id_kategori']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control <?= (session('validation.nama_kategori')) ? 'is-invalid' : '' ?>" value="<?= old('nama_kategori', $kategori['nama_kategori']) ?>" id="nama_kategori">
            <div class="invalid-feedback">
                <?= session('validation.nama_kategori') ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('admin/kategori') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>