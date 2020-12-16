<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="col-lg-12 text-center">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <form action="" method="POST" class="col-md-6 text-right m-2 ">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Pengajar</a>
    </form>
    <table class="table table-hover table-dark col-lg-6">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">kelas</th>
                <th scope="col">tingkat</th>
                <th scope="col">inisial</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 1;
            foreach ($kelas as $r) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $r['kelas'] ?></td>
                    <td><?= $r['tingkat'] ?></td>
                    <td><?= $r['inisial'] ?></td>
                    <td>
                        <a href="<?= base_url() . 'ui_con/sekolah/delete_kelas/' . $r['id']; ?>" class="badge badge-danger mb-2">hapus</a>
                    </td>
                </tr> <?php endforeach ?> </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade-mb-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('ui_con/sekolah/kelas'); ?>" method="POST">

                    <div class="modal-body">
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas">
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Tingkat">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->