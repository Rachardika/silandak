<div class="container view">

    <!-- Outer Row -->
    <div class="row justify-content-center my-5">

        <div class="col-xl-7 my-5">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body  p-0 ">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg ">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-5"><em> Selamat Datang di </em><Strong class="text-info">silandak.</strong></h1>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" id="username" aria-describedby="usernameHelp" placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6 mb-sm-0">
                                            <a class="btn btn-danger btn-user btn-block " href="<?= base_url("auth/") ?>regist"><strong>Daftar</strong></a>
                                        </div>
                                        <div class="col-sm-6 mb-sm-0">
                                            <button type="submit" class="btn btn-info btn-user btn-block"><strong>Masuk</strong></button>
                                        </div>
                                    </div>
                                    <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                    Login
                                </a> -->
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="btn btn-lg-info" href="<?= base_url('front'); ?>"><i class="fas fa-home"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>