<!DOCTYPE html>
<html>
<!--di cek lagi tag tag tagnya sa, ini tadi tag htmlnya bukanya kurang-->

<head>
    <title>Mata Pelajaran</title>
    <?php $this->load->view("templates/head.php"); ?>
</head>

<body>


    <!-- Begin Page Content -->

    <div id="page-wrapper">
        <div class="container-fluid">


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mata Pelajaran SMA Negeri 1 Bululawang</h6>
                </div>
                <button type="button" class="btn btn-md btn-primary" id="tambahmapel" data-toggle="modal" data-target="#Modal_tambah_mapel">Tambah Mata Pelajaran</button>

                <div class="card-body">
                    <div class="table-responsive">

                        <table id="dataTable" href="<?php echo base_url('C_admin/tampilmapel'); ?>" method="post" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>Kode Mata Pelajaran</th>
                                    <th>Nama Mata Pelajaran </th>

                                    <th>-</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $count = 1; ?>
                                <?php foreach ($data_mapel as $mapel) { ?>

                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $mapel->id_mapel; ?></td>
                                        <td><?php echo $mapel->nama_mapel; ?></td>

                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal_Edit_Mapel<?= $mapel->id_mapel; ?>">
                                                <i class=" fas fa-edit"></i>
                                                <!-- <i>Edit</i> -->
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modalhapusmapel<?= $mapel->id_mapel; ?>">
                                                <i class="fas fa-trash"></i>
                                                <!-- <i>Hapus</i> -->
                                            </button>

                                        </td>
                                    </tr>

                                    <!-- Modal tambah mapel-->

                                    <div class="modal fade" id="Modal_tambah_mapel" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <?= $this->session->flashdata('message'); ?>
                                                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'C_admin/tambahmapel' ?>">
                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 100px; height: 100px;" src="<?php echo base_url('assets/gambar/edit.png'); ?> ">

                                                            <br>
                                                            <h3 style="color: #22bf4c;">Tambah Mata Pelajaran</h3>
                                                            <br>
                                                        </div>
                                                        <div class="box-body col-md-12 col-md-offset-3">
                                                            <div class="form-group">
                                                                <label>Kode Mata Pelajaran</label>
                                                                <input type="text" class="form-control" id="id_mapel" name="id_mapel" required>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama Mata Pelajaran</label>
                                                                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                                                            <input type="hidden" id="id_mapel" name="id_mapel" value="id_mapel">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <!--MODAL SHOW UNTUK EDIT MATA PELAJARAN-->

                                    <div class="modal fade" id="Modal_Edit_Mapel<?= $mapel->id_mapel ?>" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form action="<?php echo base_url('C_admin/updateMataPelajaran'); ?>" method="post">
                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 50px; height: 50px;" src="<?php echo base_url('assets/gambar/edit.png'); ?> ">

                                                            <br>
                                                            <h4 style="color: #22bf4c;">Ubah mata pelajaran</h4>
                                                            <br>
                                                        </div>
                                                        <div class="box-body col-md-12 col-md-offset-3">
                                                            <div class="form-group text_id">
                                                                <label>Kode Mata Pelajaran</label>
                                                                <input type="text" class="form-control" id="id" value="<?= $mapel->id_mapel ?>">
                                                            </div>

                                                            <div class="form-group text_nama_mapel">
                                                                <label>Nama mata pelajaran</label>

                                                                <!--ini ambil name dari inputan, terus dibawa ke controller pakek method post-->
                                                                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?= $mapel->nama_mapel ?>">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                                                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                                            <input type="hidden" name="id_mapel" value="<?= $mapel->id_mapel ?>">

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!--MODAL SHOW UNTUK EDIT MATA PELAJARAN-->

                                    <!--MODAL SHOW UNTUK HAPUS MATA PELAJARAN-->

                                    <div class="modal fade" id="Modalhapusmapel<?= $mapel->id_mapel ?>" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form class="form-inline ml-2" action="<?php echo base_url('C_admin/hapusMataPelajaran') ?>" method="post">
                                                    <div class="modal-body">

                                                        <div class="HEADERMODAL" style="text-align: center;">
                                                            <img style="width: 50px; height: 50px;" src="<?php echo base_url('assets/gambar/error.png'); ?> ">

                                                            <br>
                                                            <h4 style="color: #eb4034;">Apa anda yakin ingin menghapus mata pelajaran ini?</h4>
                                                            <br>
                                                        </div>

                                                        <!-- <div class="form-group text_id_delete">
                                                                <label>ID mata pelajaran</label>
                                                                <input type="text" class="form-control" id="text_id_delete" value="<?= $mapel->id_mapel ?>" readonly>
                                                            </div>

                                                            <div class="form-group text_nama">
                                                                <label>Nama mata pelajaran</label>
                                                                <input type="text" class="form-control" id="text_nama" value="<?= $mapel->nama_mapel ?>" readonly>
                                                            </div> -->

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" id="id_mapel" name="id_mapel" value="<?= $mapel->id_mapel ?>">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>

                                                        <button class="btn btn-danger" type="submit">Ya</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>




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