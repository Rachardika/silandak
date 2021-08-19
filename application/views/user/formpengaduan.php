<?php date_default_timezone_set("Asia/Jakarta"); ?>
<div class="content-wrapper">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row mb-2 mt-3 ml-5">
                    <div class=" col-md-10 ml-5">
                        <h4 class="card-header card shadow ml-5"><strong>Form Pengaduan</strong></h4>
                        <div class="card-body card shadow ml-5 mb-3">
                            <?= form_open_multipart('user/tambahpengaduan'); ?>

                            <form role="form" action="<?php echo base_url('user/tambahpengaduan'); ?>" method="post">
                                <div class="row">

                                    <input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('d-M-Y'); ?>">
                                    <input type="hidden" name="jam" id="jam" value="<?php echo date('H:i:s'); ?>">
                                    <!-- <input type="hidden" name="email_pengaduan" id="email_pengaduan" value="<?php echo ('hellodeskpengaduan@gmail.com'); ?>"> -->
                                    <input type="hidden" name="status" id="status" value="">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>NIM</strong></label>
                                            <input type="text" class="form-control" name="nim" value="<?= $user['nim']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>Nama</strong></label>
                                            <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>Tanggal</strong></label>
                                            <input type="text" class="form-control" name="waktu" value="<?php echo date('d-M-Y'); ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><strong>Semester</strong></label>
                                            <input type="text" class="form-control" name="semester" id="semester" value="semester" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><strong>Subjek</strong></label>
                                            <textarea class="form-control" rows="2" name="subjek" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tujuan"><strong>Tujuan</strong></label>
                                        <select class="form-control" id="tujuan" name="tujuan" required>
                                            <option selected>Silahkan Pilih..... </option>
                                            <option value="Biro Administrasi Akademik">Biro Administrasi Akademik(BAA)</option>
                                            <option value="Biro Akuntansi dan Keuangan">Biro Akuntansi dan Keuangan (BAK)</option>
                                            <option value="Biro Kemahasiswaan">Biro Kemahasiswaan (BiKem)</option>
                                            <option value="Biro Manajemen Kampus">Biro Manajemen Kampus (BMK)</option>
                                            <option value="Biro Pengembangan Sumber Daya Manusia">Biro Pengembangan Sumber Daya Manusia (BPSDM)</option>
                                            <option value="Biro Promosi, Humas dan Alumni">Biro Promosi, Humas dan Alumni (BPHA)</option>
                                            <option value="Biro Teknologi dan Sistem Informasi">Biro Teknologi dan Sistem Informasi (BTSI)</option>
                                            <option value="Lembaga Penjaminan Mutu">Lembaga Penjaminan Mutu (LPM)</option>
                                            <option value="Fakultas Bahasa dan Seni">Fakultas Bahasa dan Seni</option>
                                            <option value="Fakultas Biologi">Fakultas Biologi</option>
                                            <option value="Fakultas Ekonomika dan Bisnis">Fakultas Ekonomika dan Bisnis</option>
                                            <option value="Fakultas Teknik Elektronika dan Komputer">Fakultas Teknik Elektronika dan Komputer</option>
                                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                                            <option value="Fakultas Interdisiplin">Fakultas Ilmu Sosial dan Ilmu Komunikasi</option>
                                            <option value="Fakultas Kedokteran dan Ilmu Kesehatan">Fakultas Kedokteran dan Ilmu Kesehatan</option>
                                            <option value="Fakultas Pertanian dan Bisnis">Fakultas Keguruan dan Ilmu Pendidikan</option>
                                            <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                                            <option value="Fakultas Sains dan Matematika">Fakultas Sains dan Matematika</option>
                                            <option value="Fakultas Teknologi Informasi">Fakultas Teknologi Informasi</option>
                                            <option value="Fakultas Teologi">Fakultas Teologi</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label><strong>Keluhan</strong></label>
                                            <textarea class="form-control" rows="3" name="pesan" placeholder="Enter ..."></textarea>



                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary col-sm-12 mt-5"><i class="fas fa-send"></i> Kirim</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        var month = new Array();
        month[0] = "Semester 2";
        month[1] = "Semester 2";
        month[2] = "Semester 2";
        month[3] = "Semester 2";
        month[4] = "Semester 3";
        month[5] = "Semester 3";
        month[6] = "Semester 3";
        month[7] = "August";
        month[8] = "Semester 1";
        month[9] = "Semester 1";
        month[10] = "Semester 1";
        month[11] = "Semester 1";

        var d = new Date();
        var n = month[d.getMonth()];
        document.getElementById("semester").value = n + " / " + d.getFullYear();
    </script>

</div>