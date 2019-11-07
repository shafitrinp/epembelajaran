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


                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?php echo base_url('C_guru/add_kessay') ?>" method="post">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_jTugas">Pilih Topik</label>
                                <select class="form-control input-sm" id="id_jTugas" name="id_jTugas" required>
                                    <option value="">--- Pilih ---</option>
                                    <?php foreach ($judul_kuis as $jk) { ?>

                                        <option value="<?= $jk->id_jTugas; ?>"> <?= $jk->judul; ?></option>


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

                        <!-- 
                        <?php echo $error; ?> -->
                        <div class="form-group">
                            <div class="col-md-12">



                                <input type="file" id="image" name="image" />
                                <!-- <input type="hidden" name="old_image" value="<?php echo $kessay->image ?>" /> -->

                                <br /><br />




                                <div class="box-footer">
                                    <p>Upload gambar jika ada soal yang memerlukan gambar</p>
                                </div>
                            </div>
                        </div>


                        <br></br>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="ckeditor" name="editor" style="width: 100%; height: 150px; font-size: 13px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;" value="<?= set_value('pertanyaan'); ?>"></textarea>
                                <script>
                                    < textarea id = "editor" >
                                        CKEDITOR.replace("editor");
                                </script>
                                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                <p class="help-block">File gambar dapat di copy langsung atau di upload terlebih dahulu. File gambar yang didukung adalah jpg dan png.</p>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-12">
                                <button type="button" class="box-body col-md-5 btn btn-secondary" style="float: left;">Batal</button>
                                <input type="hidden" id="id_kEssay" name="id_kEssay" value="id_jTugas">
                                <button class=" box-body col-md-5 btn btn-primary" style="float: right;">Simpan</button>


                            </div>
                        </div>

                    </form>



                    <br></br>
                    <br></br>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Soal <b><?php echo $jk->judul; ?></b></h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" href="<?php echo base_url('C_guru/tampil_detailsoal'); ?>" method="post" style="width:100%">

                                    <thead>
                                        <tr>

                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Image</th>
                                            <th>Waktu pengerjaan</th>
                                            <th>Tanggal Buat</th>
                                            <th>-</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Image</th>
                                            <th>Waktu pengerjaan</th>
                                            <th>Tanggal Buat</th>
                                            <th>-</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $count = 1; ?>
                                        <?php foreach ($data_kessay as $ds) { ?>
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
    </div>

    // <script>
        //         $(document).ready(function() {
        //             var idjudul = $('#id_jTugas option:select').val() || '';

        //             $('#dataTable').DataTable({
        //                 ajax: {
        //                     url: "/C_guru/show_soal/",
        //                 },
        //                 data: function(data) {
        //                     data.id_jTugas: idjudul
        //                 }
        //             });
        //             $('#id_judul').on('change', function() {
        //                 $('#dataTable').DataTable().ajax.reload();
        //             });
        //             $("#id_judul").change(function() {
        //                 refresh_topik();
        //                 refresh_table();
        //             });

        //         });
        // 
    </script>
    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
        });
    </script>
    <script>
        $('.timepicker').pickatime({
            default: 'now',
            timeFormat: 'HH:mm:ss',
            twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
            donetext: 'OK',
            autoclose: false,
            vibrate: true // vibrate the device when dragging clock hand
        });
    </script>

    <script>
        CountDownTimer("<?php echo $timer->waktu; ?>", 'hari', 'jam', 'menit', 'detik');

        function CountDownTimer(dt, id1, id2, id3, id4) {
            var end = new Date(dt);

            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;

            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                var distance1 = now - end;
                if (distance1 > 0) {
                    clearInterval(timer);
                    return;
                }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                document.getElementById(id1).innerHTML = days + ' Hari';
                document.getElementById(id2).innerHTML = hours + ' Jam';
                document.getElementById(id3).innerHTML = minutes + ' Menit';
                document.getElementById(id4).innerHTML = seconds + ' Detik';
            }

            timer = setInterval(showRemaining, 1000);
        }
    </script>
</body>

<?php $this->load->view("templates/js.php"); ?>

</html>