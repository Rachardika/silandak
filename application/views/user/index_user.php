<!-- Begin Page Content -->

<!-- /.container-fluid -->
<div class="container-fluid">

    <h2 class="text-center mt-3 mb-5" style="color:#4682B4">Selamat datang, <span style="font-weight:bold"><?= $user['nama']; ?></span> !</h2>

    <?= $this->session->flashdata('password'); ?>
    <!-- Content Row -->


    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-1 col-md-6 mb-4"></div>

        <!-- Area Chart -->
        <div class="col-xl-10 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaduan Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header text-center">silandak.</div>
                            <a class="dropdown-item" href="<?= base_url('/user/pengaduan'); ?>">Pengaduan</a>
                            <a class="dropdown-item" href="<?= base_url('/user/dok'); ?>">Dokumen Pengaduan</a>
                            <a class="dropdown-item" href="<?= base_url('/user/listdok'); ?>">List Dokumen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center">Semangat!</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="content-wrapper">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-sm-12 mt-3">
                                    <div class="card mb-3">
                                        <div class="card-header">Data Pengaduan | <b class="text-primary">silandak.</b><span class="float-right"></span></div>
                                        <div class="card-body">
                                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                                <div class="table-responsive">
                                                    <table class="table table-hover small" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Nim</th>
                                                                <th>Subjek</th>
                                                                <th>Tujuan</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $nomor = 0;
                                                            foreach ($pengaduan as $row) :
                                                                $nomor++;
                                                                if ($row->status == 'Selesai' || $row->status == 'ditampung') {
                                                            ?>
                                                                    <tr>
                                                                        <td><?= $row->tanggal ?></td>
                                                                        <td><?= $row->nim ?></td>
                                                                        <td><?= $row->subjek ?></td>
                                                                        <td><?= $row->tujuan ?></td>
                                                                        <td><?= $row->status ?></td>
                                                                    </tr>

                                                            <?php
                                                                };
                                                            endforeach;
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-5"></div>
                                <div class="col-xl-5">
                                    <a href="<?= base_url('/user/pengaduan'); ?>" class="btn btn-primary  mb-3"><i class="fas fa-running"></i> Run it!</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
    </div>
</div>
<!-- End of Main Content -->