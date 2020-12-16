<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <section class="content">
        <div class="container-fluid">
            <div class="card bg-secondary mb-8 p-2" style="max-width: 1000px;">
                <div class="row no-gutters">
                    <div class="col-md-6 mr-1">
                        <img src="<?= base_url('assets/foto_user/') . $user['image']; ?>" class="img-thumbnail">
                    </div>

                    <div class="col-md ml-1">
                        <div class="card-header">Name : <?= $user['nama'] ?></div>
                        <?php if ($this->session->userdata('role_id') == 1) : ?>
                            <div class="card-header">No identitas : <?= $user['no_identitas'] ?></div>
                            <div class="card-header">Jabatan : <?= $user['jabatan'] ?></div>

                        <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                            <div class="card-header">nrp : <?= $user['nrp'] ?></div>
                            <div class="card-header">nidn : <?= $user['nidn'] ?></div>
                        <?php endif ?>
                        <div class="card-header">Alamat : <?= $user['alamat'] ?></div>
                        <div class="card-header">WA/No Phone : <?= $user['no_phone'] ?></div>


                        <!-- <div class="card-header">Email : <?= $this->session->userdata('a') ?></div> -->
                        <!-- <div class="card-body">
                        <h5 class="card-title">Primary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>

                        <!-- <button type="button" class="btn btn-danger ml-2 mt-5 ">edit Password</button> -->

                        <a href="<?= base_url('akses/user/data_user') ?>" class="btn btn-success ml-2 mt-5 ">edit profile</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->