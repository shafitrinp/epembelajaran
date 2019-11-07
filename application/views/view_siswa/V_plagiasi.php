<!DOCTYPE html>

<head>
    <title>Plagiasi Siswa</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>

    <!-- Begin Page Content -->

    <div id="page-wrapper">
        <div class="container-fluid">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">


                            <form action="<?php echo base_url('C_siswa/plagiasi') ?>" method="post">

                                <div class="box-body col-md-12 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <h6 class="card-title" style="color: #05abbb;"> <input type="file" name="userfile" value=""> </h6>
                                        <h4 class="card-subtitle mb-2"> <input type="submit" name="" value="Send"> </h4>
                                        <!-- <div class="input-group-prepend">
                                            <span class="input-group-text" id="userfile" name="userfile">Upload File</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="userfile" name="userfile" value="">
                                            <label class="custom-file-label" for="userfile">Choose file</label>
                                        </div> -->
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