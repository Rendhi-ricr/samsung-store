<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Edit Galeri Foto<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Edit Galeri</h1>
    <form action="<?= base_url('admin/galeri/update/') ?><?= $galeri['id_galeri']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="nama_galeri" class="form-label">Nama Galeri</label>
            <input type="text" class="form-control" id="nama_galeri" name="nama_galeri" value="<?= $galeri['nama_galeri']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            <p class="mt-2">Gambar saat ini: <img src="/img/galeri/<?= $galeri['gambar']; ?>" width="100"></p>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
<?= $this->endSection() ?>