<!DOCTYPE html>

<head>
    <title>Kelas</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>

    <!-- Begin Page Content -->

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kelas SMA Negeri 1 Bululawang</h6>
                </div>
                <button type="button" class="btn btn-md btn-primary" id="buatkelas" data-toggle="modal" data-target="#Modal_tambah_kelas">Tambah Kelas</button>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" href="<?php echo base_url('C_admin/buatkelas'); ?>" method="post">
                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>Kode Kelas</th>
                                    <th>Kelas</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kelas</th>
                                    <th>Kelas</th>
                                    <th>-</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $count = 1; ?>
                                <?php foreach ($data_kelas as $k) { ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $k->id_kelas; ?></td>

                                        <td><?php echo $k->nama_kelas; ?></td>


                                        <td style="float: right;">
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal_Edit_Kelas<?= $k->id_kelas; ?>">
                                                <i class=" fas fa-edit"></i>
                                                <!-- <i>Edit</i> -->
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modalhapuskelas<?= $k->id_kelas; ?>">
                                                <i class="fas fa-trash"></i>
                                                <!-- <i>Hapus</i> -->
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal tambah kelas-->
                                    <div class="modal fade" id="Modal_tambah_kelas" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <?= $this->session->flashdata('message'); ?>
                                                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_admin/buatkelas' ?>">
                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 100px; height: 100px;" src="<?php echo base_url('assets/gambar/edit.png'); ?> ">

                                                            <br>
                                                            <h3 style="color: #22bf4c;">Tambah Data Kelas</h3>
                                                            <br>
                                                        </div>
                                                        <div class="box-body col-md-12 col-md-offset-3">
                                                            <div class="form-group">
                                                                <label>Kode Kelas</label>
                                                                <input type="text" class="form-control" id="id_kelas" name="id_kelas" value="<?= set_value('id_kelas'); ?>" required>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Tingkat</label>
                                                                <select class="form-control" name="tingkat" value="<?= set_value('tingkat'); ?>">
                                                                    <option disabled value="">--- Pilih Kelas ---</option>
                                                                    <option value="X">10</option>
                                                                    <option value="XI">11</option>
                                                                    <option value="XII">12</option>

                                                                </select>
                                                            </div> -->
                                                            <div class="form-group">
                                                                <label for="no_kelas">Kelas</label>
                                                                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= set_value('nama_kelas'); ?>" required>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                                                            <input type="hidden" id="id" name="id" value="id_kelas">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--MODAL SHOW UNTUK EDIT KELAS-->

                                    <div class="modal fade" id="Modal_Edit_Kelas<?= $k->id_kelas ?>" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form class="form-group" action="<?php echo base_url('C_admin/updateKelas'); ?>" method="post">
                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 100px; height: 100px;" src="<?php echo base_url('assets/gambar/edit.png'); ?> ">

                                                            <br>
                                                            <h3 style="color: #22bf4c;">Ubah Kelas</h3>
                                                            <br>
                                                        </div>

                                                        <div class="form-group text_id">
                                                            <label>ID Kelas</label>
                                                            <input type="text" class="form-control" id="text_id" value="<?= $k->id_kelas ?>" readonly>
                                                        </div>


                                                        <div class="form-group text_nama_kelas">
                                                            <label>Kelas</label>

                                                            <!--ini ambil name dari inputan, terus dibawa ke controller pakek method post-->
                                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $k->nama_kelas ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="<?= $k->id_kelas ?>">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                                                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <!--MODAL SHOW UNTUK HAPUS KELAS-->
                                    <form class="form-inline ml-2" action="<?php echo base_url('C_admin/hapusKelas') ?>" method="post">
                                        <div class="modal fade" id="Modal_hapus_kelas<?= $k->id_kelas ?>" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 50px; height: 50px;" src="<?php echo base_url('assets/gambar/error.png'); ?> ">

                                                            <br>
                                                            <h3 style="color: #eb4034;">Apa anda yakin ingin menghapus mata pelajaran ini?</h3>
                                                            <br>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                                                            <button class="btn btn-danger" type="submit">Ya</button>
                                                        </div>

                                                        <!--data ini yang dikirim ke controller untuk ID buku-->
                                                        <input type="hidden" id="data_id_kelas" name="data_id_kelas" value="<?= $k->id_kelas ?>">

                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    <!--MODAL SHOW UNTUK HAPUS MATA PELAJARAN-->
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