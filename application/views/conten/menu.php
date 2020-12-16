<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <section class="content">
        <div class="">
            <div class="card bg-secondary mb-8" style="max-width: 1000px;">
                <div class="row no-gutters">
                    <form action="" method="POST" class="col-md-12 text-right ml-5 mt-2 ">
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Menu</a>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Add New Sub-Menu</a>
                    </form>
                    <div class="col-md-5 ml-4 mt-2 bg-secondary">
                        <table class="table table-hover table-dark" id="user_prin">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Menu</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th><?= $i; ?></th>
                                        <td><?= $m['menu'] ?></td>
                                        <td><?= $m['logo'] ?></td>
                                        <td>
                                            <a href="<?= base_url() . 'ui_con/setting/akses_menu/'; ?>" class="badge badge-secondary mb-2">akses</a>
                                            <a href="<?= base_url() . 'ui_con/setting/hapus_menu/' . $m['id']; ?>" class="badge badge-danger mb-2">hapus</a>
                                        </td>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6 m-2 bg-secondary">

                        <table class="table table-hover table-dark" id="user_prin">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sub Menu</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($submenu as $m) : ?>
                                    <tr>
                                        <th><?= $i; ?></th>
                                        <td><?= $m['title'] ?></td>
                                        <td><?= $m['url'] ?></td>
                                        <td>
                                            <a href="<?= base_url() . 'ui_con/setting/hapus_sub_menu/' . $m['id']; ?>" class="badge badge-danger mb-2">hapus</a>
                                        </td>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

                <form action="<?= base_url('ui_con/setting/add_menu'); ?>" method="POST">

                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu (gunakan simbol - atau _ sebagai pemisah)">
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="logo_user" name="logo_user" placeholder="Icon">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade-mb-0" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add New Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('ui_con/setting/add_submenu'); ?>" method="POST">

                    <div class="modal-body pb-0">
                        <select type="text" class="form-control" name="menu_id" id="menu_id">
                            <option selected>Pilih Role</option>
                            <?php foreach ($menu as $j) : ?>
                                <option value="<?= $j['id']; ?>"><?= $j['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="modal-body pb-0">

                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">

                    </div>
                    <div class="modal-body">

                        <input type="text" class="form-control" id="url" name="url" placeholder="URL">

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


</div>
<!-- End of Main Content -->