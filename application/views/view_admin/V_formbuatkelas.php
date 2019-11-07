<!DOCTYPE html>

<head>
    <title>Buat Kelas</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>
    <!-- Page Wrapper -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">

                    <form action="<?php echo base_url('C_admin/buatkelas') ?>" method="post">

                        <div class="box-body col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="id_kelas">Kode Kelas</label>
                                <input type="text" class="form-control" id="id_kelas" name="id_kelas" required>
                            </div>
                            <!-- <div class="form-group">
                                <label>Tingkat</label>
                                <select class="form-control" name="tingkat">
                                    <option disabled value="">--- Pilih Kelas ---</option>
                                    <option value="X">10</option>
                                    <option value="XI">11</option>
                                    <option value="XII">12</option>

                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="no_kelas">Kelas</label>
                                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                            </div>


                            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

</body>
<?php $this->load->view("templates/js.php"); ?>

</html>