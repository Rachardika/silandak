<div class="content-wrapper">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row mb-2 mt-3 ml-5">
                    <div class=" col-md-10 ml-5">
                        <h4 class="card-header card shadow ml-5"><strong>Form Pengaduan</strong></h4>
                        <div class="card-body card shadow ml-5 mb-3">
                            <?php foreach ($pengaduan as $row) { ?>
                                <form role="form" action="<?php echo base_url('admin/balaspengaduan'); ?>" method="post">
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
                                                <input type="text" class="form-control" name="semester" value="<?php echo ($row->semester); ?> " disabled>
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
                                                <input type="text" class="form-control" name="tujuan" value="<?php echo ($row->tujuan); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Email Tujuan*</label>
                                                <select class="form-control" id="email_tujuan" name="email_tujuan" required>
                                                    <option class="text-danger" selected disabled>Inputkan Email Tujuan dengan Benar! </option>
                                                    //pindah ke value
                                                    <option value="baa@uksw.edu">Biro Administrasi Akademik (BAA)</option>
                                                    <option value="bak@uksw.edu">Biro Akuntansi dan Keuangan (BAK)</option>
                                                    <option value="bikkem@uksw.edu">Biro Kemahasiswaan (BiKem)</option>
                                                    <option value="bmk@uksw.edu">Biro Manajemen Kampus (BMK)</option>
                                                    <option value="bpsdm@uksw.edu">Biro Pengembangan Sumber Daya Manusia (BPSDM)</option>
                                                    <option value="bpha@uksw.edu">Biro Promosi, Humas dan Alumni (BPHA)</option>
                                                    <option value="btsi@uksw.edu">Biro Teknologi dan Sistem Informasi (BTSI)</option>
                                                    <option value="lpm@uksw.edu">Lembaga Penjaminan Mutu (LPM)</option>
                                                    <option value="fbs@uksw.edu">Fakultas Bahasa dan Seni (FBS)</option>
                                                    <option value="fbio@uksw.edu">Fakultas Biologi (FBIO)</option>
                                                    <option value="feb@uksw.edu">Fakultas Ekonomika dan Bisnis (FEB)</option>
                                                    <option value="ftek@uksw.edu">Fakultas Teknik Elektronika dan Komputer (FTEK)</option>
                                                    <option value=">fh@uksw.edu">Fakultas Hukum (FH)</option>
                                                    <option value="fiskom@uksw.edu">Fakultas Ilmu Sosial dan Ilmu Komunikasi (FISKOM)</option>
                                                    <option value="fkik@uksw.edu">Fakultas Kedokteran dan Ilmu Kesehatan (FKIK)</option>
                                                    <option value="fkip@uksw.edu">Fakultas Keguruan dan Ilmu Pendidikan (FKIP)</option>
                                                    <option value="fpsi@uksw.edu">Fakultas Psikologi (FPSI)</option>
                                                    <option value="fsm@uksw.edu">Fakultas Sains dan Matematika (FSM)</option>
                                                    <option value="fti@uksw.edu">Fakultas Teknologi Informasi (FTI)</option>
                                                    <option value="fteol@uksw.edu">Fakultas Teologi (FTEOL)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Subjek</label>
                                                <input type="text" class="form-control" name="subjek" value="<?php echo ($row->subjek); ?>" readonly>
                                                <!-- <textarea type="text" class="form-control" rows="2" name="subjek" placeholder="<?php echo ($row->subjek); ?>" readonly></textarea> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="aksi">Aksi*</label>
                                            <select class="form-control" id="aksi" name="aksi" required>
                                                <option selected>Silahkan Pilih..... </option>
                                                <option value="ditampung">diteruskan</option>
                                                <option value="selesai">selesai</option>

                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Pesan</label>
                                                <textarea type="text" class="form-control" rows="3" name="pesan" placeholder="<?php echo ($row->pesan); ?>" disabled></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Balasan:</label>
                                                <textarea class="form-control" rows="3" name="balasan" placeholder="Enter ..." required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <a href="<?= base_url('admin/pengaduan'); ?>" class="btn btn-danger col-sm-12 mt-3"><i class="fas fa-backspace"></i> Back</a>
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