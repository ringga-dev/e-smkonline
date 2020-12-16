<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/disain/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/disain/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form class="user" action="<?= base_url('auth/user/register_2') ?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Name">
                                        </div>
                                        <div class="form-group row pr-3 pl-3">
                                            <h6 class="mt-3 col-sm-3 mb-1 mb-sm-0">Tanggal Lahir</h6>
                                            <input type="date" class="form-control form-control-user col-sm-9" id="tgl_lahir" name="tgl_lahir" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Phone Address">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="prodi" name="prodi" placeholder="Prodi">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Kelas">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Address">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user ">
                                            next
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/disain/') ?><?= base_url('assets/disain/') ?><?= base_url('assets/disain/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/disain/') ?><?= base_url('assets/disain/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/disain/') ?><?= base_url('assets/disain/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>