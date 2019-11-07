<!DOCTYPE html>

<head>
    <title>Buat Kelas</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <center>
                        <form action="<?php echo base_url('C_admin/tambahmapel') ?>" method="post">

                            <div class="box-body col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Kode Mata Pelajaran</label>
                                    <input type="text" class="form-control" id="id_mapel" name="id_mapel" required>

                                </div>
                                <div class="form-group">
                                    <label for="kuota">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required>
                                </div>

                                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>

                            </div>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view("templates/js.php"); ?>
</body>

</html>