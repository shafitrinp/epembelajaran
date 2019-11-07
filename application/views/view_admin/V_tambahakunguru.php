<!DOCTYPE html>

<head>
  <title>Register Guru</title>
  <?php $this->load->view("templates/head.php"); ?>
</head>

<body>


  <!-- Begin Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="container">
            <div class="row text-center  ">
              <div class="col-lg-12">
                <br /><br />
                <h2> Daftar Guru Baru</h2>
                <br />
              </div>
            </div>
            <div class="row justify-content-center">

              <div class="col-lg-12">

                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <?= $this->session->flashdata('message'); ?>
                                    <form action="<?php echo base_url('C_admin/daftar_guru'); ?>" method="post">

                                      <div class="text-center" style="color:red;"> </div>
                                      <div class="form-group input">
                                        <span class="input-group"></i></span>
                                        <label>NIK/NIP</label>
                                        <input type="text" name="id_guru" class="form-control" id="id_guru" placeholder="NIK/NIP" value="" />

                                      </div>
                                      <div class="form-group input">
                                        <span class="input-group"></span>
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="" />

                                      </div>

                                      <div class="form-group input">
                                        <span class="input-group"></span>
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="" />

                                      </div>
                                      <div class="form-group input">
                                        <span class="input-group"></span>
                                        <label>Konfirmasi Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Ulangi Password" value="" />

                                      </div>
                                      <div class="form-group input">
                                        <span class="input-group"></span>
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="" />

                                      </div>

                                      <div class="panel-body">

                                        <button type="submit" class="btn btn-info ">Daftar</button>
                                      </div>
                                    </form>


                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view("templates/js.php"); ?>
</body>

</html>