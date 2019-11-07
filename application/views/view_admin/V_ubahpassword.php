<!DOCTYPE html>

<head>
    <title>Ubah Password</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>

    <!-- Page Wrapper -->



    <!-- Begin Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">Ubah Password</h1>

            <div class="row">
                <div class="col-lg-6">

                    <?= $this->session->flashdata('messsage'); ?>
                    <form action="<?php echo base_url('C_admin/ubahpassword_akun'); ?>" method=" post">
                        <div class="form-group">
                            <label for="current_password">Kata Sandi Lama</label>
                            <input type="password" class="form-control form-control-user" id="current_password" name="current_password" required>
                            <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password1">Kata Sandi Baru</label>
                            <input type="password" class="form-control form-control-user" id="new_password1" name="new_password1" required>
                            <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password2">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" class="form-control form-control-user" id="new_password2" name="new_password2" required>
                            <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $this->load->view("templates/js.php"); ?>
</body>

</html>