<!DOCTYPE html>

<head>
    <title>Dashboard</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>

    <!-- Page Wrapper -->

    <!-- Begin Page Content -->
    <div id="page-wrapper">
        <div class="col-lg-12">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div> -->
            <header>
                <div class="container">
                    <div class="slider-container">
                        <div class="col-lg-12 text-center">
                            <div class="intro-lead-in">Selamat Datang di Sistem Pembelajaran SMA Negeri 1 Bululawang
                                <i class="far fa-smile-wink"> </i>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <section id="about" class="light-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="section-title">
                                <h2>Selamat Belajar !!!!</h2>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <br></br>

            <!-- main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xl-5 col-md-5 mb-5">
                        <div class="card shadow mb-4">
                            <div class="box box-info">
                                <form action="" method="post">
                                    <p class="box-body col-md-6 col-md-offset-3"><?php echo $this->session->flashdata('reportsubmission'); ?></p>
                                    <div class="box-body col-md-6 col-md-offset-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </section>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="id_jTugas">Pilih Topik</label>
                    <select class="form-control input-sm" id="id_jTugas" name="id_jTugas" required>

                        <option value="">--- Pilih ---</option>
                        <?php foreach ($tugas as $jt) { ?>

                            <td><?php echo $jt->judul; ?></td>


                        <?php } ?>
                        <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </select>
                </div>
                <div class="box-footer">
                    <p>Pilih Topik terlebih dahulu untuk menampilkan dan menambah topik</p>
                </div>
            </div>
        </div>

    </div>
    </div>


</body>
<?php $this->load->view("templates/js.php"); ?>

</html>