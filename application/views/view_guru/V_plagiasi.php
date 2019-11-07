<!DOCTYPE html>

<head>
    <title>Tugas Uraian</title>
    <?php $this->load->view("templates/head.php"); ?>
    <?php $this->load->model('m_guru'); ?>

</head>

<body>

    <!-- Begin Page Content -->

    <div id="page-wrapper">
        <div id="content">
            <div class="container-fluid">

                <div class="row">


                    <div class="col-xl-6 col-md-6 mb-6">
                        <div class="card border-left-default shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        <a href="#" class="text-xl font-weight-bold text-success text-uppercase mb-3">Jawaban Tugas</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 mb-6">
                        <div class="card border-left-default shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        <a class="text-xl font-weight-bold text-success text-uppercase mb-3" href="#">Jawaban Kuis</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br></br>
                <form method="post" action="<?= base_url(); ?>C_guru/Plagiasi">
                    <div class="card shadow mb-4">
                        <br>
                        <h1 class="h3 mb-0 text-gray-800">Cek Plagiasi</h1></br>

                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id_jTugas">Pilih Topik</label>
                                    <select class="form-control input-sm" id="id_jTugas" name="id_jTugas" required>
                                        <option value="">--- Pilih ---</option>
                                        <?php foreach ($judul_tugas as $jt) { ?>

                                            <option value="<?= $jt->id_jTugas; ?>"> <?= $jt->judul; ?></option>


                                        <?php } ?>
                                        <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>
                                <div class="box-footer">
                                    <p>Pilih Topik terlebih dahulu untuk mengecek Plagiasi</p>
                                </div>
                            </div>

                            <div class="col-xl-12 col-md-12 mb-12">
                                <!-- <td width="90">Cek Plagiasi</td>
                        <td>:</td> -->
                                <div class="card shadow mb-6">
                                    <td width="300">
                                        <div>
                                            <div class="card shadow mb-10">
                                                <textarea id="jawaban" name="jawaban" cols="100" rows="6" style="width:100%"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                </div>
                            </div>



                            <!-- <div class="col-xl-6 col-md-6 mb-6">

                            <td width="300">
                                <div>
                                    <textarea id="pertanyaan" name="pertanyaan" cols="100" rows="6" style="width:100%"></textarea>
                                </div>
                            </td>
                        </div> -->
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Cek Plagiat</button></br>

                </form>

                <br></br>
            </div>
        </div>
    </div>
    </div>
</body>
<?php $this->load->view("templates/js.php"); ?>

</html>