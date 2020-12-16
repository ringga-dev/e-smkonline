<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="data-notif">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="row">

        <?php

        foreach ($pertemuan_dihadiri as $r) : ?>

            <div class="card p-0" style="width: 22rem;">
                <div class="card-body ">

                    <h5 class="card-title m-0 p-0"><?= $r['mapel'] ?> <sup>(tgl : <?= $r['tgl'] ?> jam : <?= $r['jam'] ?> )</sup></h5>
                    <hr class="m-0 p-0">
                    <h7 class="card-subtitle mb-2 text-success m-0 p-0">dosen : <?= $r['nama'] ?></h7>
                    <hr class="m-0 p-0">
                    <h7 class="card-subtitle mb-2 text-info m-0 p-0">info : <?= $r['info'] ?></h7>
                </div>
            </div>
        <?php endforeach ?>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->