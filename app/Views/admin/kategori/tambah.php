<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola Produk<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h2>Tambah Kategori</h2>
    <form action="<?= base_url('admin/kategori/simpan') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('nama_kategori') ? 'is-invalid' : '' ?>" id="nama_kategori" name="nama_kategori" value="<?= old('nama_kategori') ?>">
            <?php if (isset($validation) && $validation->hasError('nama_kategori')) : ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_kategori') ?>
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('/admin/kategori') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>