<?= $this->extend('layout/template'); ?>


<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Author</h1>
            <a href="/author/create" class="btn btn-primary mb-4 mt-3">Tambah Data Baru</a>
            <form action="<?= base_url("author") ?>" method="POST">
                <?= csrf_field(); ?>
                <!-- <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Data" name="keyword" value="<?= $keyword; ?>">
                        <button class="btn btn-outline-info text-dark" type="submit" >Cari</button>
                    </div>
                </div> -->
            </form>
            <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Author</th>
                    <th scope="col">Nama Author</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Afiliasi</th>
                    <th scope="col">Email</th>
                    <th scope="col">WA</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php //$page = $_GET["page_author"]; ?>
                    <?php $i= 1  + (5 * ($currentPage - 1)) ; ?>
                    <?php foreach($author as $a): ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $a["id_author"]; ?></td>
                            <td><?= $a["nama_author"]; ?></td>
                            <td><?= $a["prodi"]; ?></td>
                            <td><?= $a["afiliasi"]; ?></td>
                            <td><?= $a["email"]; ?></td>
                            <td><?= $a["wa"]; ?></td>
                            <td class="d-flex">
                                <a href="<?= base_url('/author/edit/' .$a["id_author"]); ?>" class="btn btn-info mx-2">Edit</a>
                                <form action="<?= base_url('/author/' . $a["id_author"]); ?>" class="d-flex" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapusnya?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $pager->links('author','pagination') ?>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>