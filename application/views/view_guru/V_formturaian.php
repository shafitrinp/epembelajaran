<!DOCTYPE html>

<head>
    <title>Buat Tugas</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>
    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="box-body">
                    <h4>
                        Mengelola Soal Tugas Uraian
                        <!-- <small>Mengelola soal berdasarkan modul dan topik</small> -->
                    </h4>

                    <!-- /.box-header -->

                    <a type="button" href="<?php echo base_url('C_guru/tampil_detailsoal'); ?>" class="btn btn-md btn-primary" id="tampil_detailsoal">Lihat Tugas</a>

                    <br></br>
                    <br></br>

                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?php echo base_url('C_guru/add_tessay') ?>" method="post">

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
                                <p>Pilih Topik terlebih dahulu untuk menampilkan dan menambah topik</p>
                            </div>
                        </div>

                        <br></br>

                        <!-- 
                        <?php echo $error; ?> -->
                        <!-- <div class="form-group">
                            <div class="col-md-12">



                                <input type="file" id="image" name="image" /> -->
                        <!-- <input type="hidden" name="old_image" value="<?php echo $tessay->image ?>" /> -->

                        <!-- <br /><br />

                                <div class="box-footer">
                                    <p>Upload gambar jika ada soal yang memerlukan gambar</p>
                                </div>
                            </div>
                        </div> -->

                        <!-- 
                        <br></br> -->

                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="ckeditor" name="pertanyaan" style="width: 100%; height: 150px; font-size: 13px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;" value="<?= set_value('pertanyaan'); ?>"></textarea>
                                <script>
                                    < textarea id = "pertanyaan" >
                                        CKEDITOR.replace("pertanyaan");
                                </script>
                                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                <p class="help-block">File gambar dapat di copy langsung atau di upload terlebih dahulu. File gambar yang didukung adalah jpg dan png.</p>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-12">
                                <button type="button" class="box-body col-md-5 btn btn-secondary" style="float: left;">Batal</button>
                                <input type="hidden" id="id_tEssay" name="id_tEssay" value="id_jTugas">
                                <button class=" box-body col-md-5 btn btn-primary" style="float: right;">Simpan</button>


                            </div>
                        </div>

                    </form>
                </div>


                <br></br>
                <br></br>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Soal <b><?php echo $jt->judul; ?></b></h6>
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
    </div>

    // <script lang="javascript">
        //     function refresh_table() {
        //         $('#table-soal').dataTable().fnReloadAjax();
        //     }

        //     function refresh_table_image() {
        //         $('#table-image').dataTable().fnReloadAjax();
        //     }

        //     function refresh_topik() {
        //         var judul = $('#topik option:selected').text();
        //         $('#judul-daftar-soal').html(judul);
        //         $('#judul-tambah-soal').html(judul);
        //     }
        // 
    </script>

</body>
<script>
    // $(document).ready(function() {
    //     var idjudul = $('#id_jTugas option:select').val() || '';

    //     $('#dataTable').DataTable({
    //         ajax: {
    //             url: "/C_guru/show_soal/",
    //         },
    //         data: function(data) {
    //             data.id_jTugas: idjudul
    //         }
    //     });
    //     $('#id_judul').on('change', function() {
    //         $('#dataTable').DataTable().ajax.reload();
    //     });
    //     $("#id_judul").change(function() {
    //         refresh_topik();
    //         // refresh_table();
    //     });

    // });
    document.getElementById("hide").onclick = function() {
        document.getElementById("data").style.display = "none";
    }
    document.getElementById("show").onclick = function() {
        document.getElementById("data").style.display = "block";
    }
</script>
<?php $this->load->view("templates/js.php"); ?>

</html>