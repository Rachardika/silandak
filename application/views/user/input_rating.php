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
                                    <h1><strong class="text-secondary">Berikan Rating Anda!!</strong></h1>
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg">
                            <div class="p-4">
                                <?= form_open_multipart('user/postrate'); ?>
                                <?php foreach ($pengaduan as $row) : ?>

                                    <form role="form" action="<?php echo base_url('user/postrate'); ?>" method="post">
                                        <input type="hidden" name="id_pengaduan" id="id" value="<?= $row->id; ?>">
                                        <input type="hidden" name="nim" id="nim" value="<?= $row->nim; ?>">
                                        <input type="hidden" name="tujuan" id="tujuan" value="<?= $row->tujuan; ?>">
                                        <input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('d-M-Y'); ?>">
                                        <input type="hidden" name="jam" id="jam" value="<?php echo date('H:i:s'); ?>">
                                        <input type="hidden" name="subjek" id="subjek" value="<?= $row->subjek; ?>">
                                        <div class="row">
                                            <table class="table table-borderless " id="tabel_pengaduan">
                                                <thead>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-secondary">Kritik & Saran : </label>
                                                            <textarea class="form-control" rows="3" name="saran" placeholder="Silahkan isi..."></textarea>
                                                        </div>
                                                    </div>

                                                    <link href="<?= base_url('assets/'); ?>css/star-rating.css" rel="stylesheet" type="text/css">
                                                    <link href="<?= base_url('assets/'); ?>css/styles.min.css" rel="stylesheet" type="text/css">
                                                    <script src="<?= base_url('assets/'); ?>js/star-rating.js"></script>
                                                    <div class="col-sm-12">
                                                        <div class="form-group ml-3">
                                                            <span class="gl-star-rating">
                                                                <select id="glsr-prebuilt" name="rate" class="star-rating-prebuilt">
                                                                    <option value="">Select a rating</option>
                                                                    <option value="5">5 Stars</option>
                                                                    <option value="4">4 Stars</option>
                                                                    <option value="3">3 Stars</option>
                                                                    <option value="2">2 Stars</option>
                                                                    <option value="1">1 Star</option>
                                                                </select>
                                                                <span class="gl-star-rating--stars">
                                                                    <span data-value="1" class="pl-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;">
                                                                            <circle class="gl-emote-bg" fill="#FFA98D" cx="12" cy="12" r="10"></circle>
                                                                            <path fill="#393939" d="M12 14.6c1.48 0 2.9.38 4.15 1.1a.8.8 0 01-.79 1.39 6.76 6.76 0 00-6.72 0 .8.8 0 11-.8-1.4A8.36 8.36 0 0112 14.6zm4.6-6.25a1.62 1.62 0 01.58 1.51 1.6 1.6 0 11-2.92-1.13c.2-.04.25-.05.45-.08.21-.04.76-.11 1.12-.18.37-.07.46-.08.77-.12zm-9.2 0c.31.04.4.05.77.12.36.07.9.14 1.12.18.2.03.24.04.45.08a1.6 1.6 0 11-2.34-.38z"></path>
                                                                        </svg></span>
                                                                    <span data-value="2" class="pl-2 ml-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;">
                                                                            <circle class="gl-emote-bg" fill="#FFC385" cx="12" cy="12" r="10"></circle>
                                                                            <path fill="#393939" d="M12 14.8c1.48 0 3.08.28 3.97.75a.8.8 0 11-.74 1.41A8.28 8.28 0 0012 16.4a9.7 9.7 0 00-3.33.61.8.8 0 11-.54-1.5c1.35-.48 2.56-.71 3.87-.71zM15.7 8c.25.31.28.34.51.64.24.3.25.3.43.52.18.23.27.33.56.7A1.6 1.6 0 1115.7 8zM8.32 8a1.6 1.6 0 011.21 2.73 1.6 1.6 0 01-2.7-.87c.28-.37.37-.47.55-.7.18-.22.2-.23.43-.52.23-.3.26-.33.51-.64z"></path>
                                                                        </svg></span>
                                                                    <span data-value="3" class="pl-2 ml-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;">
                                                                            <circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle>
                                                                            <path fill="#393939" d="M15.33 15.2a.8.8 0 01.7.66.85.85 0 01-.68.94h-6.2c-.24 0-.67-.26-.76-.7-.1-.38.17-.81.6-.9zm.35-7.2a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path>
                                                                        </svg></span>
                                                                    <span data-value="4" class="pl-2 ml-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;">
                                                                            <circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle>
                                                                            <path fill="#393939" d="M15.45 15.06a.8.8 0 11.8 1.38 8.36 8.36 0 01-8.5 0 .8.8 0 11.8-1.38 6.76 6.76 0 006.9 0zM15.68 8a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path>
                                                                        </svg></span>
                                                                    <span data-value="5" class="pl-2 ml-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="gl-emote" style="pointer-events: none;">
                                                                            <circle class="gl-emote-bg" fill="#FFD885" cx="12" cy="12" r="10"></circle>
                                                                            <path fill="#393939" d="M16.8 14.4c.32 0 .59.2.72.45.12.25.11.56-.08.82a6.78 6.78 0 01-10.88 0 .78.78 0 01-.05-.87c.14-.23.37-.4.7-.4zM15.67 8a1.6 1.6 0 011.5 1.86A1.6 1.6 0 1115.68 8zM8.32 8a1.6 1.6 0 011.21 2.73A1.6 1.6 0 118.33 8z"></path>
                                                                        </svg></span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>


                                                    </tr>
                                                    <td></td>

                                                </thead>
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary col-sm-12 mt-5"><i class="fas fa-send"></i> Kirim</button>
                                        </div>
                                    </form>
                                <?php endforeach; ?>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/prism.min.js" integrity="sha512-YBk7HhgDZvBxmtOfUdvX0z8IH2d10Hp3aEygaMNhtF8fSOvBZ16D/1bXZTJV6ndk/L/DlXxYStP8jrF77v2MIg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-zc7WDnCM3aom2EziyDIRAtQg1mVXLdILE09Bo+aE1xk0AM2c2cVLfSW9NrxE5tKTX44WBY0Z2HClZ05ur9vB6A==" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>js/star-rating.js"></script>
<script>
    var destroyed = false;
    var starratingPrebuilt = new StarRating('.star-rating-prebuilt', {
        prebuilt: true,
        maxStars: 5,
    });
    var starrating = new StarRating('.star-rating', {
        stars: function(el, item, index) {
            el.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect class="gl-star-full" width="19" height="19" x="2.5" y="2.5"/><polygon fill="#FFF" points="12 5.375 13.646 10.417 19 10.417 14.665 13.556 16.313 18.625 11.995 15.476 7.688 18.583 9.333 13.542 5 10.417 10.354 10.417"/></svg>';
        },
    });
    var starratingOld = new StarRating('.star-rating-old');
    document.querySelector('.toggle-star-rating').addEventListener('click', function() {
        if (!destroyed) {
            starrating.destroy();
            starratingOld.destroy();
            starratingPrebuilt.destroy()
            destroyed = true;
        } else {
            starrating.rebuild();
            starratingOld.rebuild();
            starratingPrebuilt.rebuild()
            destroyed = false;
        }
    });
</script>