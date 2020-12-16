<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <h3 class="h3 mt-2 mb-0 text-gray-800">Role User :</h3>
    <table class="table table-hover table-dark col-lg-6">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">kelas</th>
                <th scope="col">tingkat</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 1;
            foreach ($kelas as $r) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $r['kelas'] ?> </td>
                    <td><?= $r['tingkat'] ?></td>
                    <td>
                        <div class="form-check">
                            <input class="data-kelas" type="checkbox" <?= cek_akses_tugas($tugas_tampil['id'], $r['id']); ?> data-tugas="<?= $tugas_tampil['id']; ?>" data-kelas="<?= $r['id']; ?>">
                        </div>
                    </td>
                </tr> <?php endforeach ?> </tbody>
    </table>



</div> <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->