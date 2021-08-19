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
                                    <h3><strong>Upload Pengumuman</strong></h3>
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg">
                            <div class="p-4">
                                <?= form_open_multipart('admin/pengumuman'); ?>

                                <div class="form-group row">

                                    <div class="col-sm-2 col-form-label text-bold"><strong>Image</strong></div>
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
                                    <label for="judul" class="col-sm-2 col-form-label"><strong>Judul</strong></label>
                                    <div class="col-sm-10">
                                        <textarea type="text" rows="2" class="form-control" id="Judul" name="judul"></textarea>
                                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="tulisan" class="col-sm-2 col-form-label"><strong>Informasi</strong></label>
                                    <div class="col-sm-10">
                                        <textarea type="text" rows="6" class="form-control" id="Tulisan" name="tulisan"></textarea>
                                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6 mt-5">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
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