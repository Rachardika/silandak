<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
        <div class="col-xl-12 col-lg-12">
            <ol class="breadcrumb shadow" style="background-color:#fff;">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("admin/") ?>index">Dashboard</a>
                </li>

                <li class="breadcrumb-item active">Pengaduan</li>
            </ol>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 align-items-center justify-content-center">
                    <div class="text-center">
                        <h2 class="m-0 font-weight-bold text-secondary">Tabel Pengaduan</h2>
                    </div>
                    <div id="content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="" class="btn btn-secondary float-right mb-3"><i class="fas fa-undo"></i> Refresh</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card mb-3">
                                        <div class="card-header">New Tasks | <b>Today</b><span class="float-right">Count Processed : <?php echo $this->db->where("status", "")->from("pengaduan")->count_all_results(); ?> </span></div>
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
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $nomor = 0;
                                                            foreach ($pengaduan as $row) :
                                                                $nomor++;
                                                                if ($row->status == '') {
                                                            ?>
                                                                    <tr>
                                                                        <td><?= $row->tanggal ?></td>
                                                                        <td><?= $row->nim ?></td>
                                                                        <td><?= $row->subjek ?></td>
                                                                        <td><?= $row->tujuan ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('admin/detailpengaduan/') . $row->id ?>" class="btn btn-primary"><i class="fas fa-spinner"></i></a>

                                                                            <!-- <button class="btn" onclick="hapus"><i class="fa fa-trash"></i></button> -->
                                                                        </td>
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
                                <div class="col-sm-6">
                                    <div class="card mb-3">
                                        <div class="card-header">Finished Tasks | <b>Today</b><span class="float-right">Count Finished : <?php echo $this->db->where("status", "Selesai")->from("pengaduan")->count_all_results(); ?> </span></div>
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
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $nomor = 0;
                                                            foreach ($pengaduan as $row) :
                                                                $nomor++;
                                                                if ($row->status != '') {
                                                            ?>

                                                                    <tr>
                                                                        <td><?= $row->tanggal ?></td>
                                                                        <td><?= $row->nim ?></td>
                                                                        <td><?= $row->subjek ?></td>
                                                                        <td><?= $row->tujuan ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('admin/pengaduandetail/') . $row->id ?>" class="btn btn-warning"><i class="fas fa-search"></i></a>

                                                                            <!-- <button class="btn" onclick="hapus"><i class="fa fa-trash"></i></button> -->
                                                                        </td>
                                                                    </tr>

                                                            <?php
                                                                }
                                                            endforeach;
                                                            ?>
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
                </div>
                <!-- Card Body -->
                <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; Copyright <strong class="text-secondary"><span>silandak.</span></strong> All Rights Reserved</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('/auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->

    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url('assets/') ?>admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/') ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel_pengaduan').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?= base_url('admin/get_ajax_getpengaduan') ?>",
                    "type": "POST"
                },
                "columnDefs": [{
                    "targets": [3],
                    "orderable": false
                }],
                "order": []

            })
        });
    </script>


    </body>

    </html>