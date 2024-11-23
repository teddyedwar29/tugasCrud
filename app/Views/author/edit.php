<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-4"> Edit Data Author</h2 >
            <?php if(session()-> getFlashdata('errors')) : ?>
                <div class="row">
                    <div class="col-md-5">
                        <div class="alert alert-danger" role="danger">
                            <?= session()->getFlashdata('errors'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>    
           
            <form action="<?= site_url('/author/update/' . $author["id_author"]) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3 row">
                    <label for="id_author" 
                    class="col-sm-2 col-form-label">ID Author</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control " id="id_author" name="id_author" autofocus value="<?= $author["id_author"]; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_author" class="col-sm-2 col-form-label">Nama Author</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_author" name="nama_author" value="<?= $author["nama_author"]; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="prodi" value="<?= $author["prodi"]; ?>" name="prodi">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="afiliasi" class="col-sm-2 col-form-label">Afiliasi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="afiliasi" value="<?= $author["afiliasi"]; ?>" name="afiliasi">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" value="<?= $author["email"]; ?>" name="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="wa" class="col-sm-2 col-form-label">Wa</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?= $author["wa"]; ?>" id="wa" name="wa">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>