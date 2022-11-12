<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2>Daftar Siswa</h2>
            <hr>
            <a href="/siswa/create" class="btn btn-outline-primary">Tambah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($siswa as $s) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $s['foto']; ?>" alt="foto" class="rounded foto"></td>
                            <td><b><?= $s['nama']; ?></b></td>
                            <td>
                                <a href="/siswa/<?= $s['id']; ?>" class="btn btn-outline-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>