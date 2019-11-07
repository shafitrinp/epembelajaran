<!DOCTYPE html>

<head>
    <title>Buat Kuis</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>
    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">


                            <form action="<?php echo base_url('C_guru/jkuraian') ?>" method="post">

                                <div class="box-body col-md-12 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_mapel">Mata Pelajaran</label>
                                        <select class="form-control" name="id_mapel">
                                            <option>--- Pilih ---</option>
                                            <?php foreach ($data_mapel as $mapel) { ?>

                                                <option value=<?php echo $mapel->id_mapel ?>> <?php echo $mapel->nama_mapel; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_mapel">Kelas</label>
                                        <select class="form-control" name="id_kelas">
                                            <option>--- Pilih ---</option>
                                            <?php foreach ($data_kelas as $k) { ?>

                                                <option value=<?php echo $k->id_kelas ?>> <?php echo $k->nama_kelas; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>


                                    <button type="button" class="box-body col-md-5 btn btn-secondary" style="float: left;">Batal</button>

                                    <button type="submit" class=" box-body col-md-5 btn btn-primary" style="float: right;">Simpan</button>

                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>
<?php $this->load->view("templates/js.php"); ?>

</html>