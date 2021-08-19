<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row mb-3 mt-3 ml-5">
                    <div class=" col-md-10 ml-5">
                        <h4 class="card-header card shadow ml-5"><strong>Detail Pengaduan</strong></h4>
                        <div class="card-body card shadow ml-5 mb-3">
                            <form role="form" action="<?php echo base_url('user/tambahpengaduan'); ?>" method="post">
                                <div class="row">

                                    <?php

                                    foreach ($pengaduan as $row) :

                                    ?>
                                        <table class="table table-borderless " id="tabel_pengaduan">
                                            <thead>
                                                <tr>
                                                    <th>Nama </th>
                                                    <td>: <?= $row->nama; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nim </th>
                                                    <td>: <?= $row->nim; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email </th>
                                                    <td>: <?= $row->email; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Semester </th>
                                                    <td>: <?= $row->semester; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Waktu </th>
                                                    <td>: <?= $row->tanggal; ?>, <?= $row->jam; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tujuan </th>
                                                    <td>: <?= $row->tujuan; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Pesan </th>
                                                    <td>: <?= $row->pesan; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Balasan </th>
                                                    <td>: <?= $row->balasan; ?></td>
                                                </tr>
                                                <td></td>
                                                <tr>
                                                    <th>Status </th>
                                                    <td class="btn btn-success"><i class="fas fa-compass"></i> <?= $row->status; ?></td>
                                                </tr>
                                                <td></td>

                                            <?php
                                        endforeach;
                                            ?>

                                            </thead>
                                            </tbody>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>

                                            <span>
                                                <th><a class="btn btn-info border border-info" href="<?php echo base_url('operator/pengaduan/') ?>">Back</a></th>
                                            </span>
                                        </table>
                                </div>
                                <!-- <div class="card-body d-flex flex-column align-items-end"> -->
                                <!-- <span class="btn btn-danger border border-danger" href="<?php echo base_url('user/deletepengaduan/' . $row->id) ?>">Delete</span> -->
                                <!-- <span class="btn btn-danger border border-danger"><a href="<?php echo base_url('user/deletepengaduan/' . $row->id) ?>">Delete</a></span> -->
                                <!-- </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>