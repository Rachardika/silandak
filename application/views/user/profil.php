  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class="container-fluid" style="padding-top: 0px">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb shadow" style="background-color:#fff;">
              <li class="breadcrumb-item">
                  <a href="<?= base_url("user/index") ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Profil</li>
          </ol>
          <div class="flash-password" data-flashdata="<?= $this->session->flashdata('password'); ?>"></div>
          <div class="card shadow mb-3">
              <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Profil Saya</div> -->
              <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
                  <h5><i class="fas fa-user"></i> PROFIL</h5>
              </div>
              <div class="card-body">
                  <div class="col-lg-12">
                      <!-- <?= $this->session->flashdata('message'); ?> -->
                      <div class="flash-profil" data-flashdata="<?= $this->session->flashdata('profil'); ?>"></div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-4 pt-5 ">
                              <div class="text-center">
                                  <a href="<?= base_url('assets/images/avatar/') . $user['image']; ?>" target="_blank"><img class="img-profile rounded-circle" src="<?= base_url('assets/images/avatar/') . $user['image']; ?>" class="rounded" style="width:250px; height:250px;"></a>
                              </div>
                          </div>
                          <!-- membuat kotak pada informasi pribadi !-->

                          <div class="col-lg-8 pt-2">
                              <div class="card shadow" style="background:#eaf8f9">
                                  <div class="text-align-center">
                                      <table class="table" style="font-weight:600;border:none">
                                          <tr>
                                              <td>Nama</td>
                                              <td>:</td>
                                              <td> <?= $user['nama']; ?> </td>
                                          </tr>
                                          <tr>
                                              <td>NIM</td>
                                              <td>:</td>
                                              <td> <?= $user['nim']; ?></td>
                                          </tr>
                                          <tr>
                                              <td>Email</td>
                                              <td>:</td>
                                              <td> <?= $user['email']; ?></td>
                                          </tr>
                                          <tr>
                                              <td>Fakultas</td>
                                              <td>:</td>
                                              <td> <?= $user['fakultas']; ?></td>
                                          </tr>
                                          <tr>
                                              <td>Program Studi</td>
                                              <td>:</td>
                                              <td> <?= $user['progdi']; ?></td>
                                          </tr>

                                          </td>
                                          </tr>
                                          <tr>
                                              <td colspan="3">
                                                  <div class="text-center">
                                                      <?= anchor('user/editprofil/' . $user['id_user'], '<button class="btn btn-warning" data-toggle="modal" data-target="#"><i class="fas fa-user-edit"></i> Edit</button>');  ?>
                                                  </div>
                                              </td>
                                          </tr>
                                      </table>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- <div class="card-footer small text-muted"></div> -->
          </div>

      </div>
      <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->