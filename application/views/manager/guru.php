<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="col-lg-12 text-center">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <form action="" method="POST" class="col-md-12 text-right m-2 ">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Pengajar</a>
    </form>
    <table class="table table-hover table-dark" id="user_prin">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIDN</th>
                <th scope="col">NRP</th>
                <th scope="col">NAMA</th>
                <th scope="col">WA</th>
                <th scope="col">PRODI</th>
                <th scope="col">aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pengajar as $m) : ?>
                <tr>
                    <th><?= $i; ?></th>
                    <td><?= $m['nidn'] ?></td>
                    <td><?= $m['nrp'] ?></td>
                    <td><?= $m['nama'] ?></td>
                    <td><?= $m['no_phone'] ?></td>
                    <td><?= $m['prodi'] ?></td>

                    <td>
                        <a href="" class="badge badge-warning mb-2" data-toggle="modal" data-target="#<?= str_replace(' ', '', $m['nama']) ?>">edit</a>
                        <a href="<?= base_url() . 'ui_con/sekolah/delete_guru/' . $m['nrp']; ?>" class="badge badge-danger mb-2">hapus</a>
                    </td>
                    <?php $i++ ?>

                    <div class="modal fade-mb-0" id="<?= str_replace(' ', '', $m['nama']) ?>" tabindex="-1" role="dialog" aria-labelledby="<?= str_replace(' ', '', $m['nama']) ?>Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="<?= str_replace(' ', '', $m['nama']) ?>Label">Add New Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="<?= base_url('ui_con/sekolah/edit_guru'); ?>" method="POST">
                                    <div class="modal-body pb-0">
                                        <div class="col-sm-12 ">
                                            <div class="row">
                                                <div class="col-sm p-0">
                                                    <img src="<?= base_url('assets/foto_user/') . $m['image']; ?>" class="img-thumbnail pb-0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="col-sm-12">nrp</div>
                                        <input type="number" class="form-control" id="nrp" name="nrp" value="<?= $m['nrp'] ?>" readonly>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="col-sm-12">nidn</div>
                                        <input type="number" class="form-control" id="nidn" name="nidn" value="<?= $m['nidn'] ?>" readonly>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="col-sm-12">email</div>
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $m['email'] ?>" readonly>
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="col-sm-12">nama</div>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $m['nama'] ?>">
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="col-sm-12">WA</div>
                                        <input type="text" class="form-control" id="no_phone" name="no_phone" value="<?= $m['no_phone'] ?>">
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="col-sm-12">prodi</div>
                                        <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $m['prodi'] ?>">
                                    </div>
                                    <div class="modal-body pb-0">
                                        <div class="col-sm-12">alamat</div>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $m['alamat'] ?>">
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" id="id" name="id" value="<?= $m['id'] ?>" hidden>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade-mb-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('ui_con/sekolah/guru'); ?>" method="POST">

                    <div class="modal-body pb-0">
                        <input type="number" class="form-control" id="nrp" name="nrp" placeholder="NRP">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="number" class="form-control" id="nidn" name="nidn" placeholder="NIDN">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="no_phone" name="no_phone" placeholder="NO WA / Phone">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->