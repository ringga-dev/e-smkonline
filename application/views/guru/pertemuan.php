<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="data-notif">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <form action="" method="POST" class="col-md-12 text-right m-2 ">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Tugas</a>
    </form>
    <div class="row">

        <?php

        foreach ($pertemuan as $r) : ?>

            <div class="card p-0" style="width: 22rem;">
                <div class="card-body ">

                    <h5 class="card-title m-0 p-0"><?= $r['mapel'] ?> <sup>(tgl : <?= $r['jadwal'] ?> jam : <?= $r['jam'] ?> )</sup></h5>
                    <hr class="m-0 p-0">
                    <h7 class="card-subtitle mb-2 text-danger m-0 p-0">dosen : <?= $r['nama'] ?></h7>
                    <hr class="m-0 p-0">
                    <h7 class="card-subtitle mb-2 text-danger m-0 p-0">kelas : <?= $r['kelas'] ?></h7>
                    <hr class="m-0 p-0">
                    <h7 class="card-subtitle mb-2 text-info m-0 p-0">info : <?= $r['info'] ?></h7>

                    <form class="col-md-12 text-right">
                        <a href="<?= base_url() . 'ui_con/guru//' . $r['id']; ?>" class="btn btn-danger">Hapus</a>
                    </form>

                </div>
            </div>
        <?php endforeach ?>

    </div>


    <!-- Modal -->
    <div class="modal fade-mb-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('ui_con/guru/pertemuan'); ?>" method="POST">
                    <div class="modal-body pb-0">
                        <select type="text" class="form-control" name="id_mapel" id="id_mapel">
                            <option selected>Pilih Mapel</option>
                            <?php foreach ($mapel as $j) : ?>
                                <option value="<?= $j['id']; ?>">*<?= $j['mapel']; ?>*</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-body pb-0">
                        <select type="text" class="form-control" name="id_kelas" id="id_kelas">
                            <option selected>Pilih Kelas</option>
                            <?php foreach ($kelas as $j) : ?>
                                <option value="<?= $j['id']; ?>">*<?= $j['kelas']; ?> tingkat : <?= $j['tingkat']; ?>*</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="modal-body pb-0">
                        <input type="date" name="jadwal" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="tanggal" value="<?= set_value('tgl'); ?>">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="time" class="form-control" id="jam" name="jam" placeholder="Jam">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="info" name="info" placeholder="Keterangan Pertemuan">
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