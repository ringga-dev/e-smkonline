<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="col-lg-12">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <form action="" method="POST" class="col-md-12 text-right m-2 ">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Tugas</a>
    </form>
    <div class="row">

        <?php
        $i = 1;
        foreach ($tugas as $r) : ?>

            <div class="card m-1" style="width: 22rem;">
                <div class="card-body">
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

                    <form class="col-md-12 text-right text-button m-2 ">

                        <a href="<?= base_url() . 'ui_con/guru/tampil_tugas/' . $r['id']; ?>" class="btn btn-primary">Tampilkan</a>
                        <a href="<?= base_url() . 'ui_con/guru/add_pertanyaan_' . $roleTugas . '/' . $r['id']; ?>" class="btn btn-warning">Add soal</a>
                        <a href="<?= base_url() . 'ui_con/guru/delete_tugas/' . $r['id']; ?>" class="btn btn-danger">Hapus</a>
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

                <form action="<?= base_url('ui_con/guru/tugas'); ?>" method="POST">

                    <div class="modal-body pb-0">
                        <select type="text" class="form-control" name="id_mapel" id="id_mapel">
                            <option selected>Pilih Mapel</option>
                            <?php foreach ($mapel as $j) : ?>
                                <option value="<?= $j['id']; ?>">*<?= $j['mapel']; ?>*</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="modal-body pb-0">
                        <select type="text" class="form-control" name="tipe" id="tipe">
                            <option selected>Pilih TIpe Tugas</option>
                            <option value="1">*upload*</option>
                            <option value="2">*esai*</option>
                            <option value="3">*isian*</option>
                        </select>
                    </div>
                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="number" class="form-control" id="durasi" name="durasi" placeholder="Durasi (dalam menit)">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="text" class="form-control" id="info" name="info" placeholder="Keterangan Tugas">
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