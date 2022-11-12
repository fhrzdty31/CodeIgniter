<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <h2>Tambah Data Siswa</h2>
            <hr>
            <form action="/siswa/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row mt-2">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" value="<?= old('nama'); ?>" placeholder="Nama Lengkap" autofocus>
                        <div id="nama" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" name="nis" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : '' ?>" id="nis" value="<?= old('nis'); ?>" placeholder="001/002*******">
                        <div id="nis" class="invalid-feedback">
                            <?= $validation->getError('nis'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">
                        <input type="tel" name="telepon" class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : '' ?>" id="telepon" value="<?= old('telepon'); ?>" placeholder="+62***********">
                        <div id="telepon" class="invalid-feedback">
                            <?= $validation->getError('telepon'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" name="jurusan" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : '' ?>" id="jurusan" value="<?= old('jurusan'); ?>" placeholder="Teknik Informatika">
                        <div id="jurusan" class="invalid-feedback">
                            <?= $validation->getError('jurusan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" id="email" value="<?= old('email'); ?>" placeholder="name@example.com">
                        <div id="email" class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview" alt="foto">
                    </div>
                    <div class="col-sm-8">
                        <input type="file" name="foto" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" onchange="previewImg()">
                        <div id="foto" class="invalid-feedback">
                            <?= $validation->getError('foto'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col">
                        <a href="/siswa" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-outline-success float-end">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>