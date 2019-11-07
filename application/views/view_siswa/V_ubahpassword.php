<head>
    <title>Ubah Password</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>





<!-- Begin Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Ubah Password</h1>

        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('messagepass'); ?>
                <form action="<?php echo base_url('C_siswa/ubahpassword_akun'); ?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Kata Sandi Lama</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password1">Kata Sandi Baru</label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password2">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <button type="submit" class="btn btn-primary btn-user btn-block mb-2">
                                Simpan
                            </button>
                        </div>
                        <div class="col-xl-6">
                            <button type="submit" class="btn btn-primary btn-user btn-block mb-2" role="button" href="<?php echo base_url('C_siswa'); ?>">
                                Batal
                            </button>
                        </div>

                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view("templates/js.php"); ?>