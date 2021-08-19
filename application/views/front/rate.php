<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 content">
                    <img src="<?= base_url('assets/'); ?>images/content/rate.png" class="img-fluid" alt="">

                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>Penilaian <strong class="text-info">Pengaduan</strong></h3>
                    <div class="mb-3">
                        <select id="glsr-ltr" class="star-rating" data-options='{"tooltip":"Jumlah Penilaian User"}'>
                            <option value=""></option>
                            <option value="5"><?php echo $this->db->where("rate", "5")->from("rating")->count_all_results(); ?> penilaian </option>
                            <option value="4"><?php echo $this->db->where("rate", "4")->from("rating")->count_all_results(); ?> penilaian </option>
                            <option value="3"><?php echo $this->db->where("rate", "3")->from("rating")->count_all_results(); ?> penilaian </option>
                            <option value="2"><?php echo $this->db->where("rate", "2")->from("rating")->count_all_results(); ?> penilaian </option>
                            <option value="1"><?php echo $this->db->where("rate", "1")->from("rating")->count_all_results(); ?> penilaian </option>
                        </select>
                    </div>
                    <?php foreach ($average as $avg) :
                        $dec = $avg['average'];
                    ?>
                        <p class="font-italic text-warning">rata-rata penilaian : <?php echo round($dec, 2); ?></p>
                    <?php endforeach; ?>
                    <p class="font-italic">
                        rating diatas akan menunjukan berapa banyak pengguna yang sudah memberikan rating buruk dan rating baik,
                        data itu dapat anda lihat secara langsung.
                    </p>
                    <p>
                        Kami akan selalu memperbaiki permasalahan anda secara efektif dan tentunya cepat.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->



    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
        <div class="container">

            <div class="row no-gutters">

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="icofont-simple-smile"></i>
                        <span data-toggle="counter-up"><?php echo $this->db->where("id_role", "1")->from("user")->count_all_results(); ?></span>
                        <p><strong>User </strong>yang sudah mendaftar maupun terdaftar di silandak. </p>
                    </div>
                </div>

                <div class="col-lg-1 col-md-6 d-md-flex align-items-md-stretch">
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="icofont-document-folder"></i>
                        <span data-toggle="counter-up"><?php echo $this->db->where("status", "selesai")->from("pengaduan")->count_all_results(); ?></span>
                        <p><strong>Pengaduan</strong> yang sudah diproses oleh pegawai / operator silandak.</p>
                    </div>
                </div>

                <div class="col-lg-1 col-md-6 d-md-flex align-items-md-stretch">
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="icofont-live-support"></i>
                        <span data-toggle="counter-up"><?php echo $this->db->where("id_role", "3")->from("user")->count_all_results(); ?></span>
                        <p><strong>Pegawai / Bagian</strong> yang siap membantu anda di silandak.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->


    <link href="<?= base_url('assets/'); ?>css/star-rating.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>css/styles.min.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/'); ?>js/jquery.fontstar.js"></script>



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