<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <a href="" class="btn btn-primary m-2" data-toggle="modal" data-target="#exampleModal">Add New Role</a>
    <table class="table table-hover table-dark col-lg-6">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 1;
            foreach ($role as $r) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $r['role'] ?></td>
                    <td>
                        <a href="<?= base_url() . 'ui_con/setting/atur_menu/' . $r['id']; ?>" class="badge badge-secondary mb-2">akses</a>
                        <a href="<?= base_url() . 'ui_con/setting/hapus_role/' . $r['id']; ?>" class="badge badge-danger mb-2">hapus</a>
                    </td>
                </tr> <?php endforeach ?> </tbody>
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

                <form action="<?= base_url('ui_con/setting/add_role'); ?>" method="POST">

                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role">
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