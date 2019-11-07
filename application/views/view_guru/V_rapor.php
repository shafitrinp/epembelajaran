<!DOCTYPE html>

<head>
    <title>Buat Tugas</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>
    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Soal</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" href="<?php echo base_url('C_guru/tampil_rapor'); ?>" method="post" style="width:100%">

                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>-</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Image</th>
                                    <th>-</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $count = 1; ?>
                                <?php foreach ($data_tEssay as $ds) { ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $ds->pertanyaan; ?></td>
                                        <td><?php echo $ds->image; ?></td>

                                        <td style="float: right;">
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modalhapuskuis<?= $ds->id_tEssay ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<?php $this->load->view("templates/js.php"); ?>

</html>