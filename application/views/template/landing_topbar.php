 <!-- Navigation -->
 <!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary fixed-top">
     <div class="container">
         <a class="navbar-brand" href="<?= base_url('/front'); ?>"><b>HelloDesk.</b></a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="#">About</a>
                 </li>
                 <li class="nav-item">
                     <div class="ml-4">
                         <a class="btn btn-secondary" href="<?= base_url('/auth/index'); ?>">Login</a>
                     </div>
                 </li>


             </ul>
         </div>
     </div>
 </nav> -->

 <!-- ======= Header ======= -->
 <header id="header">
     <div class="container d-flex">

         <div class="logo mr-auto">

             <h1 class="text-light"><a href="<?= base_url('/front'); ?>"><span class="text-secondary">silandak.</span></a></h1>
             <!-- Uncomment below if you prefer to use an image logo -->


             <!-- <a href="index.html"><img src="<?= base_url('assets/'); ?>img/logo_silandak.png" class="img-fluid"></a> -->
         </div>

         <nav class="nav-menu d-none d-lg-block">
             <ul>
                 <li class="drop-down"><a href="#">Mulai</a>
                     <ul>
                         <li><a class="btn btn-get-started" href="<?= base_url('/auth/index'); ?>">Login</a>
                         </li>
                         <li><a class="btn btn-get-started" href="<?= base_url('/auth/regist'); ?>">Regist</a>

                     </ul>
         </nav><!-- .nav-menu -->
     </div>
 </header><!-- End Header -->