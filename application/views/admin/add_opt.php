  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class=" container-fluid" style="padding-top: 0px">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb shadow" style="background-color:#fff;">
              <li class="breadcrumb-item">
                  <a href="<?= base_url("admin/") ?>index">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                  <a href="<?= base_url("admin/") ?>data_opt">Data Operator</a>
              </li>
              <li class="breadcrumb-item active">Tambah Operator</li>
          </ol>

          <!-- DataTables Example -->
          <div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
              <div class="card mb-3 shadow">
                  <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Member</div> -->
                  <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
                      <h5> <i class="fab fa-wpforms"></i> Form Tambah User</h5>
                  </div>
                  <div class="card-body">
                      <?= $this->session->flashdata('message'); ?>
                      <div class="container">
                          <?= form_open_multipart('admin/addOpt'); ?>
                          <div class="form-group row">
                              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
                                  <?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="nim" class="col-sm-2 col-form-label">NIM/NIP</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="nim" name="nim" value="<?= set_value('nim'); ?>" required>
                                  <?= form_error('nim', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="email" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required>
                                  <?= form_error('email', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>


                          <div class="form-group row">
                              <label for="bagian" class="col-sm-2 col-form-label">Bagian</label>
                              <div class="col-sm-10">

                                  <select class="form-control col-sm-12" id="bagian" name="bagian" value="<?= set_value('bagian'); ?>" required>
                                      <option selected disabled>Silahkan Pilih ... </option>
                                      <option value="Biro Administrasi Akademik">Biro Administrasi Akademik(BAA)</option>
                                      <option value="Biro Akuntansi dan Keuangan">Biro Akuntansi dan Keuangan (BAK)</option>
                                      <option value="Biro Kemahasiswaan">Biro Kemahasiswaan (BiKem)</option>
                                      <option value="Biro Manajemen Kampus">Biro Manajemen Kampus (BMK)</option>
                                      <option value="Biro Pengembangan Sumber Daya Manusia">Biro Pengembangan SumberDaya Manusia (BPSDM)</option>
                                      <option value="Biro Promosi, Humas dan Alumni">Biro Promosi, Humas dan Alumni(BPHA)</option>
                                      <option value="Biro Teknologi dan Sistem Informasi">Biro Teknologi dan SistemInformasi (BTSI)</option>
                                      <option value="Lembaga Penjaminan Mutu">Lembaga Penjaminan Mutu (LPM)</option>
                                      <option value="Fakultas Pertanian dan Bisnis">Fakultas Pertanian dan Bisnis</option>
                                      <option value="Fakultas Ekonomika dan Bisnis">Fakultas Ekonomika dan Bisnis</option>
                                      <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
                                      <option value="Fakultas Biologi">Fakultas Biologi</option>
                                      <option value="Fakultas Teknologi Informasi">Fakultas Teknologi Informasi</option>
                                      <option value="Fakultas Sains dan Matematika">Fakultas Sains dan Matematika</option>
                                      <option value="Fakultas Kedokteran dan Ilmu Kesehatan">Fakultas Kedokteran dan Ilmu Kesehatan</option>
                                      <option value="Fakultas Ilmu Sosial dan Ilmu Komunikasi">Fakultas Ilmu Sosial dan Ilmu Komunikasi</option>
                                      <option value="Fakultas Hukum">Fakultas Hukum</option>
                                      <option value="Fakultas Teologi">Fakultas Teologi</option>
                                      <option value="Fakultas Bahasa dan Seni">Fakultas Bahasa dan Seni</option>
                                      <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                                      <option value="Fakultas Teknik Elektronika dan Komputer">Fakultas Teknik Elektronika dan Komputer</option>
                                      <option value="Fakultas Pasca Sarjana">Fakultas Pasca Sarjana</option>
                                  </select>
                              </div>
                          </div>



                          <div class="form-group row">
                              <label for="username" class="col-sm-2 col-form-label">Username</label>
                              <div class="col-sm-10">
                                  <input type="username" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" required>
                                  <?= form_error('username', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>" required>
                                  <?= form_error('password', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>


                          <div class="form-group row justify-content-end">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                  <a href="<?= base_url('admin/data_opt'); ?>">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                  </a>
                              </div>
                          </div>

                          </form>
                          <br>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>