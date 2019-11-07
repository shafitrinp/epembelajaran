<!DOCTYPE html>

<head>
    <title>Ubah Password</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>

    <!-- Begin Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800">Ubah Password</h1>

            <div class="row">
                <div class="col-lg-6">
                    <div class="box-header with-border">
                        <center><?php echo $this->session->flashdata('ubahpass'); ?></center>
                    </div>
                    <form action="<?= base_url('C_guru/do_ubahpass') ?>" method="post">
                        <div class="box-body col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="lama">Password</label>
                                <input type="password" class="form-control" id="passlama" name="passlama" required>
                            </div>
                            <div class="form-group">
                                <label for="baru">New Password</label>
                                <input type="password" class="form-control" id="passbaru" name="passbaru1" required>
                            </div>
                            <div class="form-group">
                                <label for="baru">Retype New Password</label>
                                <input type="password" class="form-control" id="passbaru1" name="passbaru2" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php $this->load->view("templates/js.php"); ?>
</body>

</html>