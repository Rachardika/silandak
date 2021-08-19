<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row mb-2 mt-3 ml-5">
                    <div class=" col-md-10 ml-5">
                        <h4 class="card-header card shadow ml-5"><strong>Form Proses</strong></h4>
                        <div class="card-body card shadow ml-5 mb-3">
                            <?php foreach ($pengaduan as $row) { ?>
                                <form role="form" action="<?php echo base_url('operator/balaspengaduan'); ?>" method="post">
                                    <input type="hidden" name="email_tujuan" class="form-control" value="<?php echo ($row->email); ?>" readonly>
                                    <input type="hidden" name="status" class="form-control" value="Selesai" readonly>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" name="id" class="form-control" value="<?php echo ($row->id); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>NIM</label>
                                                <input type="text" class="form-control" name="nim" value="<?php echo ($row->nim); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" value="<?php echo ($row->nama); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo ($row->email); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Semester</label>
                                                <input type="text" class="form-control" name="semester" value="<?php echo ($row->semester); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Waktu</label>
                                                <input type="text" class="form-control" name="waktu" value="<?php echo ($row->tanggal); ?> , <?php echo ($row->jam); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tujuan</label>
                                                <input type="text" class="form-control" name="tujuan" value="<?php echo ($row->tujuan); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Subjek</label>
                                                <input type="text" class="form-control" name="subjek" value="<?php echo ($row->subjek); ?>" readonly>
                                                <!-- <textarea type="text" class="form-control" for="2" name="subjek" placeholder="<?php echo ($row->subjek); ?>" readonly></textarea> -->
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="aksi">Aksi</label>
                                            <select class="form-control" id="aksi" name="aksi" required>
                                                <option selected>Silahkan Pilih..... </option>
                                                <option value="tunggu">diteruskan</option>
                                                <option value="selesai">selesai</option>

                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Pesan:</label>
                                                <textarea class="form-control" rows="3" name="pesan" placeholder="<?php echo ($row->pesan); ?>" disabled></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Balasan:</label>
                                                <textarea class="form-control" rows="3" name="balasan" placeholder="Masukan Balasan" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <a href="<?= base_url('operator/pengaduan'); ?>" class="btn btn-danger col-sm-12 mt-3"><i class="fas fa-backspace"></i> Back</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary col-sm-12 mt-3"><i class="fas fa-paper-plane"></i> Process</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>