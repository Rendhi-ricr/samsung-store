<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola Kategori<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success text-center" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data Kategori</h1>
        <a href="<?= base_url('admin/kategori/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-500"></i> Tambah</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kategori as $k) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $k['nama_kategori']; ?></td>
                                <td><a href="<?= base_url('admin/kategori/edit/' . $k['id_kategori']) ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('admin/kategori/delete/' . $k['id_kategori']) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>