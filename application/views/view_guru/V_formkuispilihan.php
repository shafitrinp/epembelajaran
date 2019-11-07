<!DOCTYPE html>

<head>
    <title>Buat Soal</title>
    <?php $this->load->view("templates/head.php"); ?>

</head>

<body>
    <div id="page-wrapper">
        <div class="container-fluid">


            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <div class="box box-info">
                        <fieldset style="width:90%">

                            <legend>Form Buat Tugas</legend>

                            <a href="<?php echo base_url('C_guru/tampil_detailsoal'); ?>" style="float: right;">Detail Soal</a>
                            <br></br>
                            <?= $this->session->flashdata('message'); ?>

                            <form action="<?php echo base_url('C_guru/add_tPilihan') ?>" method="post" id="add_tPilihan" cellpadding="5px">

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

                                <?php echo form_open('countdown/time'); ?>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col s6 offset-s2">
                                            <label for="start">Start</label>
                                            <input type="date" class="datepicker" name="start" id="start">
                                        </div>
                                        <div class="col s2">
                                            <label for="timepicker_ampm_dark">Waktu</label>
                                            <input id="timepicker_ampm_dark" class="timepicker" type="time" name="waktu_start">
                                        </div>

                                        <div class="col s6 offset-s3 center">
                                            <button class="btn waves-effect waves-light #1976d2 blue darken-2 submit" type="submit">Submit</button>
                                            <a href="<?php echo site_url('countdown/lihat_countdown') ?>" class="btn waves-effect waves-light #1976d2 blue darken-2">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>

                                <br></br>

                                <div class="form-group">
                                    <div class="col-md-12">

                                        <!-- <?php echo form_open_multipart('C_guru/aksi_upload'); ?> -->

                                        <input type="file" id="image" name="image" />
                                        <!-- <input type="hidden" name="old_image" value="<?php echo $tessay->image ?>" /> -->

                                        <br /><br />

                                        <!-- <input type="submit" value="Upload" /> -->
                                        <!-- <?php echo form_close() ?> -->


                                        <div class="box-footer">
                                            <p>Upload gambar jika ada soal yang memerlukan gambar</p>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <div class="col-md-12">
                                        <td width="67">Pertanyaan</td>
                                        <td>:</td>
                                        <td width="300">
                                            <div>
                                                <textarea id="pertanyaan" name="pertanyaan" cols="100" rows="7" style="width:90%"></textarea>
                                            </div>
                                        </td>
                                    </div>
                                </tr>

                                <br></br>


                                <br></br>


                                <div class="col-md-12">
                                    <tr>
                                        <td>Pilihan A </td>
                                        <td>:</td>
                                        <td>

                                            <input type=" text" name="pilihan_a" style="width: 90%">

                                        </td>
                                    </tr>

                                    <br></br>



                                    <tr>
                                        <td>Pilihan B </td>
                                        <td>:</td>
                                        <td>
                                            <input type=" text" name="pilihan_b" style="width: 90%"></td>
                                    </tr>

                                    <br></br>


                                    <tr>
                                        <td>Pilihan C </td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="pilihan_c" style="width: 90%"></td>
                                    </tr>

                                    <br></br>


                                    <tr>
                                        <td>Pilihan D </td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="pilihan_d" style="width: 90%"></td>
                                    </tr>
                                </div>
                                <br></br>
                                <br>
                                <tr>

                                    <div class="col-md-12" id="kunci_jawaban">
                                        <td>Jawaban</td>
                                        <td>:</td>
                                        <td>
                                            <input type="radio" value="a" name="jawaban" checked="checked">A
                                            <input type="radio" value="b" name="jawaban" checked="checked">B
                                            <input type="radio" value="c" name="jawaban" checked="checked">C
                                            <input type="radio" value="d" name="jawaban" checked="checked">D
                                        </td>
                                    </div>
                                </tr>
                                </br>
                                <br></br>

                                <!-- <tr>
                                    <div class="col-md-12">
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td width="300"><textarea id="pertanyaan" name="pertanyaan" cols="100" rows="7"></textarea>
                                        </td>
                                    </div>
                                </tr> -->
                                <tr>
                                    <td colspan="3">
                                        <div align="center">
                                            <button type="button" class="box-body col-md-4 btn btn-secondary" style="float: none;">Batal</button>

                                            <button type="submit" name="kirim" class=" box-body col-md-4 btn btn-primary" style="float: none;">Simpan</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>

                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<?php $this->load->view("templates/js.php"); ?>

</html>