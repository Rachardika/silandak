<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-center">

        <div class="col-xl-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg card-header">
                            <div class="p-3">
                                <div class="text-center ">
                                    <h3><strong>Upload Dokumen Pengaduan</strong></h3>
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg">
                            <div class="p-4">
                                <?= form_open_multipart('user/dok'); ?>
                                <input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('d-M-Y'); ?>">
                                <input type="hidden" name="jam" id="jam" value="<?php echo date('H:i:s'); ?>">
                                <input type="hidden" name="status" id="Status" value="">

                                <div class="form-group row">
                                    <label for="tujuan" class="col-sm-2 col-form-label"><strong>Tujuan</strong></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="tujuan" name="tujuan" required>
                                            <option selected disabled>Silahkan Pilih... </option>
                                            <option value="Biro Administrasi Akademik">Biro Administrasi Akademik
                                                (BAA)
                                            </option>
                                            <option value="Biro Akuntansi dan Keuangan">Biro Akuntansi dan Keuangan (BAK)
                                            </option>
                                            <option value="Biro Kemahasiswaan">Biro Kemahasiswaan (BiKem)</option>
                                            <option value="Biro Manajemen Kampus">Biro Manajemen Kampus (BMK)</option>
                                            <option value="Biro Pengembangan Sumber Daya Manusia">Biro Pengembangan Sumber
                                                Daya Manusia (BPSDM)</option>
                                            <option value="Biro Promosi, Humas dan Alumni">Biro Promosi, Humas dan Alumni
                                                (BPHA)</option>
                                            <option value="Biro Teknologi dan Sistem Informasi">Biro Teknologi dan Sistem
                                                Informasi (BTSI)</option>
                                            <option value="Lembaga Penjaminan Mutu">Lembaga Penjaminan Mutu (LPM)</option>
                                            <option value="Fakultas Bahasa dan Seni">Fakultas Bahasa dan Seni</option>
                                            <option value="Fakultas Biologi">Fakultas Biologi</option>
                                            <option value="Fakultas Ekonomika dan Bisnis">Fakultas Ekonomika dan Bisnis
                                            </option>
                                            <option value="Fakultas Teknik Elektronika dan Komputer">Fakultas Teknik
                                                Elektronika dan Komputer</option>
                                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                                            <option value="Fakultas Interdisiplin">Fakultas Ilmu Sosial dan Ilmu Komunikasi
                                            </option>
                                            <option value="Fakultas Kedokteran dan Ilmu Kesehatan">Fakultas Kedokteran dan
                                                Ilmu Kesehatan</option>
                                            <option value="Fakultas Pertanian dan Bisnis">Fakultas Keguruan dan Ilmu
                                                Pendidikan</option>
                                            <option value="Fakultas Psikologi">Fakultas Psikologi</option>
                                            <option value="Fakultas Sains dan Matematika">Fakultas Sains dan Matematika
                                            </option>
                                            <option value="Fakultas Teknologi Informasi">Fakultas Teknologi Informasi
                                            </option>
                                            <option value="Fakultas Teologi">Fakultas Teologi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="subjek" class="col-sm-2 col-form-label"><strong>Subjek</strong></label>
                                    <div class="col-sm-10">
                                        <textarea type="text" rows="2" class="form-control" id="Subjek" name="subjek"></textarea>
                                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-2 col-form-label text-bold"><strong>File</strong></div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" class="file_upload" id="file" name="file">
                                                    <?= form_error('rpp', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="pesan" class="col-sm-2 col-form-label"><strong>Pesan</strong></label>
                                    <div class="col-sm-10">
                                        <textarea type="text" rows="3" class="form-control" id="Pesan" name="pesan"></textarea>
                                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-12 mt-5 float-right">
                                    <a href="<?= base_url('user/listdok'); ?>"><button type="button" class="btn btn-secondary col-sm-2"><i class="fas fa-home"></i></button></a>
                                    <a class="btn "></a>
                                    <button type="submit" class="btn btn-success col-sm-9"><i class="fas fa-paper-plane "></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->