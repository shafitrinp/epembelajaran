<!DOCTYPE html>

<head>
    <title>Biodata Siswa</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>
    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <section class="content-header">
                <h1>
                    Profilku
                </h1>
                <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
        </ol> -->
            </section>

            <!-- Main content -->
            <section class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info">
                            <!-- Profile Image -->

                            <center>
                                <!-- <nav class="navbar navbar-default"> -->
                                <div class="col-md-12">
                                    <div class="box box-primary">
                                        <div class="box-body box-profile">

                                            <img class="img-responsive img-circle" style="border: 5px solid #666; width: 150px; height: 150px; display: block;">

                                            <h3 class="profile-username"><?= $guru['nama']; ?></h3>
                                            <!--nama user diambil dari database-->

                                            <p class="text-muted">Guru</p>

                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="col-md-1 col-md-offset-8" style="margin-top: -10px; margin-bottom: 10px;">
                                <button id="edit" onclick="edit()">
                                    <i class="fa fa-edit" style="font-size: 30px;"></i>
                                </button>
                            </div>

                            <form enctype="multipart/form-data" action="<?= base_url('index.php/Pelayanan_controller/editprofile/') ?>" class="col s12" method="post">
                                <div class="col-md-9">
                                    <div class="box box-info" id="biodata" style="padding: 10px;">
                                        <?php echo $this->session->flashdata('pesan') ?>
                                        <?php foreach ($biodata as $b) { ?>
                                            <table class="table table-bordered table-hover">

                                                <tbody>

                                                    <tr>
                                                        <input type="file" name="photo" id="uploadphoto" style="visibility: hidden;">
                                                        <td>ID</td>
                                                        <td><input name="id_guru" class="form-control" type="text" value="<?php echo $b->nama; ?>" readonly style="background-color: transparent; border: hidden;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td><input name="nama" class="form-control" type="text" value="<?php echo $nama; ?>" readonly style="background-color: transparent; border: hidden;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input name="email" class="form-control" type="email" value="<?php echo $email; ?>" readonly style="background-color: transparent; border: hidden;"></td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        <?php }; ?>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-9">
                                    <center>
                                        <input type="submit" class="btn btn-primary" style="visibility: hidden;" id="simpan">
                                    </center>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>

</body>

<?php $this->load->view("templates/js.php"); ?>

</html>