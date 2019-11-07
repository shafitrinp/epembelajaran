<!DOCTYPE html>

<head>
    <title>Tugas Uraian</title>
    <?php $this->load->view("templates/head.php"); ?>
    <?php $this->load->model('m_guru'); ?>

</head>

<body>

    <!-- Begin Page Content -->

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tugas Siswa</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" href="<?php echo base_url('C_guru/tampil_detailsoal'); ?>" method="post" style="width:100%">

                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Image</th>
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

                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modalhapuskuis<?= $ds->id_tEssay ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- <form method="post" action="<?php echo base_url('C_guru/form_tessay'); ?>">
                                                <button class="btn btn-outline-success" id="tambah">
                                                    Tambah
                                                </button>
                                                <input type="hidden" name="id_jTugas" value="<?= $te->id_jTugas; ?>">
                                            </form> -->
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


</body>
<?php $this->load->view("templates/js.php"); ?>


</html>