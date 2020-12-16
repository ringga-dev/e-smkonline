<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="col-lg-12 text-center">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <form action="" method="POST" class="col-md-12 text-right m-2 ">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Soal</a>
    </form>
    <table class="table table-hover table-dark col-lg-12">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">pertanyaan</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 1;

            foreach ($pertanyaan as $r) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $r['soal'] ?></td>
                    <td>
                        <?php
                        $data = [
                            'id' => $r['id'],
                            'id_tugas' => $tugas['id']
                        ]
                        ?>
                        <a href="<?= base_url() . 'ui_con/guru/delete_pertanyaan_upload/?id=' . $r['id'] . '&tugas_id=' . $tugas['id'] ?>" class="badge badge-danger mb-2">hapus</a>
                    </td>
                </tr> <?php endforeach ?> </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade-mb-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Soal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('ui_con/guru/add_pertanyaan_upload/') . $tugas['id']; ?>" method="POST">

                    <div class="modal-body  pb-0">
                        <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Pertanyaan">
                    </div>
                    <div class="modal-body pb-0">
                        <input type="number" class="form-control" id="tugas_id" name="tugas_id" value="<?= $tugas['id'] ?>" hidden>
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