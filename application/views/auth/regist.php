<div class="container view">

    <!-- Outer Row -->
    <div class="row justify-content-center my-5">

        <div class="col-xl-9 my-5">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body  p-0 ">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg ">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-5"><em> Silahkan isi Form Registrasi </em><Strong class="text-info">silandak.</strong></h1>
                                </div>
                                <div class="card-body">
                                    <?= $this->session->flashdata('pesan'); ?>
                                    <div class="container">
                                        <?= form_open_multipart('auth/regist'); ?>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
                                                <?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control " id="nim" name="nim" value="<?= set_value('nim'); ?>" required>
                                                <?= form_error('nim', '<small class="text-danger" >', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required>
                                                <?= form_error('email', '<small class="text-danger" >', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                                            <div class="col-sm-10">

                                                <select class="form-control col-sm-12" id="fakultas" name="fakultas" value="<?= set_value('fakultas'); ?>" required>
                                                    <option selected disabled>Silahkan Pilih ...</option>
                                                    <option value="Fakultas Pertanian dan Bisnis">Fakultas Pertanian dan Bisnis</option>
                                                    <option value="Fakultas Ekonomika dan Bisnis">Fakultas Ekonomika dan Bisnis</option>
                                                    <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
                                                    <option value="Fakultas Biologi">Fakultas Biologi</option>
                                                    <option value="Fakultas Teknologi Informasi">Fakultas Teknologi Informasi</option>
                                                    <option value="Fakultas Sains dan Matematika">Fakultas Sains dan Matematika</option>
                                                    <option value="Fakultas Kedokteran dan Ilmu Kesehatan">Fakultas Kedokteran dan Ilmu Kesehatan</option>
                                                    <option value="Fakultas Ilmu Sosial dan Ilmu Komunikasi">Fakultas Ilmu Sosial dan Ilmu Komunikasi</option>
                                                    <option value="Fakultas Hukum">Fakultas Hukum</option>
                                                    <option value="Fakultas Teologi">Fakultas Teologi</option>
                                                    <option value="Fakultas Bahasa dan Seni">Fakultas Bahasa dan Seni</option>
                                                    <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                                                    <option value="Fakultas Teknik Elektronika dan Komputer">Fakultas Teknik Elektronika dan Komputer</option>
                                                    <option value="Fakultas Pasca Sarjana">Fakultas Pasca Sarjana</option>
                                                </select>
                                                <?= form_error('fakultas', '<small class="text-danger" >', '</small>'); ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="progdi" class="col-sm-2 col-form-label">Program Studi</label>
                                            <div class="col-sm-10">

                                                <select class="form-control col-sm-12" id="progdi" name="progdi" value="<?= set_value('progdi'); ?>" required>
                                                    <option selected disabled>Silahkan Pilih ... </option>

                                                    <option disabled>=== Fakultas Pertanian dan Bisnis ===</option>
                                                    <option value="Agroteknologi">Agroteknologi</option>
                                                    <option value="Agribisnis">Agribisnis</option>

                                                    <option disabled>=== Fakultas Ekonomika dan Bisnis ===</option>
                                                    <option value="Manajemen">Manajemen</option>
                                                    <option value="Ilmu Ekonomi">Ilmu Ekonomi</option>
                                                    <option value="Akuntansi">Akuntansi</option>
                                                    <option value="Internasional Class Program (ICMAP)">Internasional Class Program (ICMAP)</option>

                                                    <option disabled>=== Fakultas Keguruan dan Ilmu Pendidikan === </option>
                                                    <option value="Bimbingan Konseling">Bimbingan Konseling</option>
                                                    <option value="Pendidikan Sejarah">Pendidikan Sejarah</option>
                                                    <option value="PPKN">PPKN</option>
                                                    <option value="Pendidikan Ekonomi ">Pendidikan Ekonomi </option>
                                                    <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                                    <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                                                    <option value="Pendidikan Guru Anak Usia Dini">Pendidikan Guru Anak Usia Dini</option>

                                                    <option disabled>=== Fakultas Biologi === </option>
                                                    <option value="Biologi">Biologi</option>
                                                    <option value="Pendidikan Biologi">Pendidikan Biologi</option>

                                                    <option disabled>=== Fakultas Teknologi Informasi === </option>
                                                    <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                                                    <option value="D3 Sistem Informasi Akuntansi">D3 Sistem Informasi Akuntansi</option>
                                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                                    <option value="Pendidikan Teknik Informatika dan Komputer">Pendidikan Teknik Informatika dan Komputer</option>
                                                    <option value="Perpustakaan dan Sains Informasi">Perpustakaan dan Sains Informasi</option>
                                                    <option value="Hubungan Masyarakat">Hubungan Masyarakat</option>

                                                    <option disabled>=== Fakultas Sains dan Matematika === </option>
                                                    <option value="Fisika">Fisika</option>
                                                    <option value="Pendidikan Fisika">Pendidikan Fisika</option>
                                                    <option value="Kimia">Kimia</option>
                                                    <option value="Matematika">Matematika</option>

                                                    <option disabled>=== Fakultas Kedokteran dan Ilmu Kesehatan === </option>
                                                    <option value="Ilmu Keperawatan">Ilmu Keperawatan</option>
                                                    <option value="Gizi">Gizi</option>
                                                    <option value="Pendidikan Jasmani, Kesehatan dan Rekreasi">Pendidikan Jasmani, Kesehatan dan Rekreasi</option>
                                                    <option value="Teknologi Pangan">Teknologi Pangan</option>

                                                    <option disabled>=== Fakultas Ilmu Sosial dan Ilmu Komunikasi === </option>
                                                    <option value="Sosiologi">Sosiologi</option>
                                                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                                    <option value="Hubungan Internasional">Hubungan Internasional</option>

                                                    <option disabled>=== Fakultas Hukum === </option>
                                                    <option value="Ilmu Hukum">Ilmu Hukum</option>

                                                    <option disabled>=== Fakultas Teologi ===</option>
                                                    <option value="Ilmu Teologi">Ilmu Teologi</option>

                                                    <option disabled>=== Fakultas Bahasa dan Seni === </option>
                                                    <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                                    <option value="Sastra Inggris">Sastra Inggris</option>
                                                    <option value="Seni Musik">Seni Musik</option>

                                                    <option disabled>=== Fakultas Psikologi === </option>
                                                    <option value="Psikologi">Psikologi</option>

                                                    <option disabled>=== Fakultas Teknik Elektro dan Komputer === </option>
                                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                                    <option value="Teknik Komputer">Teknik Komputer</option>

                                                    <option disabled>=== Fakultas Pasca Sarjana === </option>
                                                    <option value="S2 Magister Biologi">S2 Magister Biologi</option>
                                                    <option value="S2 Magister Manajemen">S2 Magister Manajemen</option>
                                                    <option value="S2 Magister Akuntansi">S2 Magister Akuntansi</option>
                                                    <option value="S2 Magister Ilmu Hukum">S2 Magister Ilmu Hukum</option>
                                                    <option value="S2 Magister Studi Pembangunan">S2 Magister Studi Pembangunan</option>
                                                    <option value="S2 Magister Manajemen Pendidikan">S2 Magister Manajemen Pendidikan</option>
                                                    <option value="S2 Magister Ilmu Pertanian">S2 Magister Ilmu Pertanian</option>
                                                    <option value="S2 Magister Sains Psikologi">S2 Magister Sains Psikologi</option>
                                                    <option value="S2 Magister Data Sains">S2 Magister Data Sains</option>
                                                    <option value="S2 Magister Sistem Informasi">S2 Magister Sistem Informasi</option>
                                                    <option value="S2 Magister Sosiologi Agama">S2 Magister Sosiologi Agama</option>
                                                    <option value="Bachelor of International Primary Education">Bachelor of International Primary Education</option>
                                                    <option value="S3 Doktor Studi Pembangunan">S3 Doktor Studi Pembangunan</option>
                                                    <option value="S3 Doktor Ilmu Komputer">S3 Doktor Ilmu Komputer</option>
                                                    <option value="S3 Doktor Manajemen">S3 Doktor Manajemen</option>
                                                    <option value="S3 Doktor Sosiologi Agama ">S3 Doktor Sosiologi Agama </option>

                                                </select>
                                                <?= form_error('progdi', '<small class="text-danger" >', '</small>'); ?>

                                            </div>
                                        </div>
                                        <hr>


                                        <div class="form-group row">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="username" class="form-control " id="username" name="username" value="<?= set_value('username'); ?>" required>
                                                <?= form_error('username', '<small class="text-danger" >', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>" required>
                                                <?= form_error('password', '<small class="text-danger" >', '</small>'); ?>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group row justify-content-end mt-5">
                                            <div class="col-sm-6">
                                            </div>
                                            <a href="<?= base_url('auth'); ?>">
                                                <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal"><i class="fas fa-home"></i> Menu</button>
                                            </a>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-rocket"></i> Daftar</button>
                                        </div>

                                        </form>
                                        <br>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>