<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-8">
                    <h2>Daftar Guru</h2>
                </div>
                <div class="col-4">
                    <?= $pager->links('guru', 'guru') ?>
                </div>
            </div>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari nama..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Mapel</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1 + (15 * ($currentPage - 1));
                    foreach ($guru as $g) :
                    ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><b><?= $g['nama']; ?></b></td>
                            <td><b><?= $g['mapel']; ?></b></td>
                            <td>
                                <a href="/guru/<?= $g['id']; ?>" class="btn btn-outline-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>