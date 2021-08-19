<!--   Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class=" container-fluid" style="padding-top: 0px">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb shadow" style="background-color:#fff;">
            <li class="breadcrumb-item">
                <a href="<?= base_url("admin/") ?>index">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url("admin/") ?>profil">Profil</a>
            </li>
            <li class="breadcrumb-item active">Edit profil</li>
        </ol>

        <!-- DataTables Example -->
        <div class="col-lg-10" style="display: block; margin-left:auto; margin-right:auto">
            <div class="card mb-3 shadow">
                <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit Profil</div> -->
                <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
                    <h5> <i class="fab fa-wpforms"></i> Form Edit Profil</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" style="display: block; margin-left:auto; margin-right:auto">
                                <?= form_open_multipart('admin/editprofil'); ?>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nim" class="col-sm-2 col-form-label">NIM/NIP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $user['nim']; ?>" readonly>
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bagian" class="col-sm-2 col-form-label">Bagian</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="bagian" name="bagian" value="<?= $user['bagian']; ?>">
                                        <?= form_error('bagian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="username" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" value="<?= $user['password']; ?>">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2 col-form-label text-bold">Foto Profil</div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" class="file_upload" id="Image" name="image">
                                                    <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="<?= base_url('admin/profil'); ?>">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        </a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>


</div>
<!-- /.content-wrapper -->