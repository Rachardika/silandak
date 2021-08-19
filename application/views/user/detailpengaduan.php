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

                                    <?php foreach ($pengaduan as $row) : ?>
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

                                            <span>
                                                <th><a class="btn btn-primary border border-primary" href="<?php echo base_url('user/pengaduan/') ?>"><i class="fas fa-home"></i></a></th>
                                                <th><a class="btn btn-danger border border-danger" href="<?php echo base_url('user/deletepengaduan/' . $row->id) ?>"><i class="fas fa-trash"></i></a></th>
                                                <?php if ($row->status == 'Selesai' && $rating == false) { ?>
                                                    <th><a class="btn btn-warning border border-warning" id="tombol_hide" href="<?php echo base_url('user/rate/' . $row->id) ?>"><i class="fas fa-star"></i></a></th>
                                                <?php }; ?>
                                            <?php endforeach; ?>
                                            <!-- <th> <button type="button" id="tombol_hide">Hide</button></th> -->
                                            </span>
                                        </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#tombol_hide").click(function() {
            $("#tombol_hide").remove();
        });
    });
</script>