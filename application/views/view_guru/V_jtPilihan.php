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
                <button type="button" class="btn btn-md btn-primary" id="juraian" data-toggle="modal" data-target="#Modaltambahjudul">Tambah Tugas</button>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" href="<?php echo base_url('C_guru/tampil_tPilihan'); ?>" method="post" style="width:100%">

                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>Judul Topik</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran </th>
                                    <th>-</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>

                                    <th>-</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $count = 1; ?>
                                <?php foreach ($data_tEssay as $te) { ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $te->judul; ?></td>
                                        <td><?php echo $te->nama_kelas; ?></td>
                                        <td><?php echo $te->nama_mapel; ?></td>


                                        <td style="float: right;">

                                            <form method="post" action="<?php echo base_url('C_guru/form_tessay'); ?>">
                                                <!-- <button class="btn btn-outline-success btn-sm" id="tambah">
                                                    <i class="fas fa-plus-square"></i>
                                                    <i>Tambah</i>
                                                </button> -->
                                                <input type="hidden" name="id_jTugas" value="<?= $te->id_jTugas; ?>">
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalEditJudul<?= $te->id_jTugas; ?>">
                                                    <i class=" fas fa-edit"></i>
                                                    <!-- <i>Edit</i> -->
                                                </button>
                                                <!-- <a type="button" class="btn btn-outline-secondary btn-sm" id="lihat" href="<?php echo base_url('C_guru/tampil_detailsoal'); ?>">
                                                    <i class="fas fa-eye"></i>
                                                    <i>Lihat</i>
                                                </a> -->
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal_hapus_tugas<?= $te->id_jTugas; ?>">
                                                    <i class="fas fa-trash"></i>
                                                    <!-- <i>Hapus</i> -->
                                                </button>
                                            </form>

                                        </td>
                                    </tr>

                                    <!--MODAL TAMBAH TUGAS-->

                                    <div class="modal fade" id="Modaltambahjudul" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <?= $this->session->flashdata('message'); ?>
                                                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_guru/juraian' ?>">
                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 100px; height: 100px;" src="<?php echo base_url('assets/gambar/edit.png'); ?> ">

                                                            <br>
                                                            <h3 style="color: #22bf4c;">Buat Tugas</h3>
                                                            <br>
                                                        </div>

                                                        <div class="box-body col-md-12 col-md-offset-3">
                                                            <div class="form-group">
                                                                <label for="judul">Judul Topik</label>
                                                                <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>">
                                                                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="id_mapel">Kelas</label>
                                                                <select class="form-control" name="id_kelas" value="<?= set_value('id_kelas'); ?>" required>
                                                                    <option value="">--- Pilih ---</option>
                                                                    <?php foreach ($kelas as $k) { ?>

                                                                        <option value="<?php echo $k->id_kelas ?>"> <?php echo $k->nama_kelas; ?></option>

                                                                    <?php } ?>
                                                                    <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="id_mapel">Mata Pelajaran</label>
                                                                <select class="form-control" id="id_mapel" name="id_mapel" value="<?= set_value('id_mapel'); ?>" required>
                                                                    <option value="">--- Pilih ---</option>
                                                                    <?php foreach ($mapel as $m) { ?>

                                                                        <option value="<?php echo $m->id_mapel ?>"> <?php echo $m->nama_mapel; ?></option>

                                                                    <?php } ?>
                                                                    <?= form_error('nama_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                </select>
                                                            </div>


                                                            <button type="button" class="box-body col-md-5 btn btn-secondary" style="float: left;" data-dismiss="modal">Batal</button>

                                                            <input type="hidden" id="data_id_jtugas" name="data_id_jtugas" value="judul">

                                                            <button type="submit" name="submit" class="box-body col-md-5 btn btn-primary" style="float: right;">Simpan</button>

                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- MODAL EDIT JUDUL TUGAS-->


                                    <div class="modal fade" id="ModalEditJudul<?= $te->id_jTugas ?>" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form class="form-group" action="<?php echo base_url('C_guru/edit_jtugas'); ?>" method="post">
                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 100px; height: 100px;" src="<?php echo base_url('assets/gambar/edit.png'); ?> ">

                                                            <br>
                                                            <h3 style="color: #22bf4c;">Ubah Judul</h3>
                                                            <br>
                                                        </div>

                                                        <div class="form-group text_judul">
                                                            <label>Judul</label>


                                                            <input type="text" class="form-control" name="judul" value="<?= $te->judul ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="id_mapel">Kelas</label>
                                                            <select class="form-control" name="id_kelas" required>
                                                                <option value="">--- Pilih ---</option>
                                                                <?php foreach ($kelas as $k) { ?>

                                                                    <option value="<?= $k->id_kelas; ?>"> <?= $k->nama_kelas; ?></option>

                                                                <?php } ?>
                                                                <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="id_mapel">Mata Pelajaran</label>
                                                            <select class="form-control" name="id_mapel" required>
                                                                <option value="">--- Pilih ---</option>
                                                                <?php foreach ($mapel as $m) { ?>

                                                                    <option value="<?= $m->id_mapel; ?>"> <?= $m->nama_mapel; ?></option>

                                                                <?php } ?>
                                                                <?= form_error('nama_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </select>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_jTugas" value="<?= $te->id_jTugas ?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>


                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                    <!--MODAL SHOW UNTUK HAPUS TUGAS-->

                                    <div class="modal fade" id="Modal_hapus_tugas<?= $te->id_jTugas ?>" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form class="form-horizontal" action="<?php echo base_url() . 'C_guru/hapus_jtugas' ?>" method="post">
                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 100px; height: 100px;" src="<?php echo base_url('assets/gambar/error.png'); ?> ">

                                                            <br>
                                                            <p style="color: #eb4034;">Apa anda yakin ingin menghapus <b><?php echo $te->judul; ?></b>?</p>
                                                            <br>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_jTugas" value="<?= $te->id_jTugas ?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tidak</button>
                                                            <button class="btn btn-primary" type="submit">Ya</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <!--Modal hapus-->
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
<!-- <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script> -->

<?php $this->load->view("templates/js.php"); ?>


</html>