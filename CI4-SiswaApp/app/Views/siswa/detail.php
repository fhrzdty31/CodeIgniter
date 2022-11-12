<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 68%;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $siswa['foto']; ?>" class="card-img" alt="foto">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="col">
                                <h4 class="card-title"><?= $siswa['nama']; ?></h4>
                            </div>
                            <div class="col">
                                <h6 class="card-subtitle mb-3 text-muted"><?= $siswa['nis']; ?></h6>
                            </div>
                            <ul class="list-group card-text">
                                <li class="list-group-item"><?= $siswa['telepon']; ?></li>
                                <li class="list-group-item"><?= $siswa['jurusan']; ?></li>
                                <li class="list-group-item"><?= $siswa['email']; ?></li>
                            </ul>
                            <div class="mt-3">
                                <a href="/siswa" class="btn btn-outline-secondary">Kembali</a>
                                <form action="/siswa/<?= $siswa['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-outline-danger float-end mx-1" onclick="return confirm('Apakah anda yakin untuk menghapus data <?= $siswa['nama']; ?> ?');">Hapus</button>
                                </form>
                                <a href="/siswa/update/<?= $siswa['id']; ?>" class="btn btn-outline-primary float-end mx-1">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>