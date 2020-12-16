<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="col-lg-12">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="row">

        <?php
        $i = 1;
        foreach ($tugas_kelas as $r) : ?>

            <div class="card m-1" style="width: 22rem;">
                <div class="card-body pb-1">
                    <?php
                    if ($r['tipe'] == 1) {
                        $roleTugas = 'upload';
                    } elseif ($r['tipe'] == 2) {
                        $roleTugas = 'esai';
                    } else {
                        $roleTugas = 'isian';
                    }
                    ?>
                    <h5 class="card-title m-0 p-0"><?= $r['judul'] ?> <sup>(<?= $roleTugas ?>)</sup></h5>
                    <hr class="m-0 p-0">
                    <h7 class="card-subtitle mb-2 text-info m-0 p-0">Rilis : <?= $r['tgl_buat'] ?></h7>
                    <hr class="m-0 p-0">
                    <h7 class="card-subtitle mb-2 text-danger m-0 p-0">Durasi : <?= $r['durasi'] ?> Menit</h7>
                    <hr class="m-0 p-0">
                    <p class="card-text"><?= $r['info'] ?></p>

                    <form class="col-md-12 text-right text-button mt-2">
                        <a href="<?= base_url() . 'ui_con/siswa/kerjakan_' . $roleTugas . '/' . $r['id']; ?>" class="btn btn-warning">Kerjakan</a>
                    </form>

                </div>
            </div>
        <?php endforeach ?>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->