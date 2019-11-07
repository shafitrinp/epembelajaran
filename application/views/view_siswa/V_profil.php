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

                                            <h3 class="profile-username">Nina Mcintire</h3>
                                            <!--nama user diambil dari database-->

                                            <p class="text-muted">Software Engineer</p>

                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab">Biodata</a></li>
                                </ul>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-pane" id="settings">
                                            <form action="<?php echo base_url('C_siswa/get_profil'); ?>" method="post">
                                                <!-- <div class="form-group row"> -->

                                                <div class="form-group">
                                                    <label for="no_identitas" class="col-4 col-form-label">No Identitas</label>
                                                    <div class="col-sm-10">
                                                        <input id="no_identitas" name="no_identitas" placeholder="No Identitas" value="<?php echo $no_identitas ?>" type="text" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-10">
                                                        <input id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama ?>" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Jurusan" class="col-4 col-form-label">Jurusan</label>
                                                    <div class="col-sm-10">
                                                        <input id="jurusan" name="jurusan" placeholder="Jurusan" value="<?php echo $jurusan ?>" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-4 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input id="email" name="email" placeholder="Email" value="<?php echo $email ?>" type="email" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-0 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Edit Biodata</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


</body>
<?php $this->load->view("templates/js.php"); ?>

</html>