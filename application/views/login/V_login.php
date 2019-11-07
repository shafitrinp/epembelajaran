<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Pembelajaran</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo site_url('assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css') ?>">
    <link href="<?php echo site_url('assets/fontawesome-free/css/fonts.css" rel="stylesheet') ?>">
    <!-- Custom styles for this template-->
    <link href="<?php echo site_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <!-- <link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> -->
    <link href="<?php echo site_url('assets/css/dataTable.bootstrap.min.css'); ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login E-Pembelajaran</h1>
                                    </div>

                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="user" method="post" action="<?php echo base_url('C_login'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="no_identitas" name="no_identitas" placeholder="Username" value="<?= set_value('no_identitas'); ?>">
                                            <?= form_error('no_identitas', '<small
                                            class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small
                                            class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo site_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo site_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo site_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo site_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo site_url('assets/chart.js/Chart.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo site_url('assets/js/demo/chart-area-demo.js') ?>"></script>
    <script src="<?php echo site_url('assets/js/demo/chart-pie-demo.js') ?>"></script>
</body>

</html>