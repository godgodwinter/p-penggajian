<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Baemon Team</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- <link href="{{ asset('/') }}assets/vendor/aos/aos.css" rel="stylesheet"> -->
    <!-- <link href="{{ asset('/') }}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{ asset('/') }}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
    <link href="{{ asset('/') }}assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/css/landing.css">
  <link rel="stylesheet" href="{{ asset('/') }}assets/css/baemon.css">
</head>

<body>

  <div id="app">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.html">Baemon Dev</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.html">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Portofolio</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li class="dropdown"><a href="#"><span>Website</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Laravel</a></li>
                    <li><a href="#">Vue</a></li>
                    <li><a href="#">React</a></li>
                    <li><a href="#">Tailwind</a></li>
                    <li><a href="#">Native</a></li>
                  </ul>
                </li>
              <li><a href="#">Animasi</a></li>
              <li><a href="#">Game</a></li>
            </ul>
          </li>
          <li><a href="#">Contact</a></li>

          <li><a class="getstarted" href="#">Github</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <!-- <h1>Baemon DEV </h1>
      <h2>We Build Everything With Love</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box py-5">
                    <i class="far fa-smile-beam"></i>
                  <span data-purecounter-start="0" data-purecounter-end="14" class="purecounter">0</span>
                  <p>Happy Clients</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box py-5">
                    <i class="fas fa-cubes"></i>
                  <span data-purecounter-start="0" data-purecounter-end="23" class="purecounter">0</span>
                  <p>Projects</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box pb-5 pt-0 pt-lg-5">
                    <i class="fas fa-vial"></i>
                  <span data-purecounter-start="0" data-purecounter-end="2" class="purecounter">0</span>
                  <p>Years of experience</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box pb-5 pt-0 pt-lg-5">
                    <i class="fas fa-user-tag"></i>
                  <span data-purecounter-start="0" data-purecounter-end="22" class="purecounter">0</span>
                  <p>Dev</p>
                </div>
              </div>

            </div>
          </div>
        </div>


      </div>
    </section><!-- End About Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services ">
      <div class="container">

        <div class="section-title pt-5" data-aos="fade-up">
          <h2>Our Services</h2>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="fab fa-laravel"></i></div>
              <h4 class="title"><a href="">Laravel</a></h4>
              <p class="description">Web Application Simple or Complex App, RestFull API, Full Responsive, etc. </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="fab fa-android"></i></div>
              <h4 class="title"><a href="">Game App</a></h4>
              <p class="description">Android and Desktop</p>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-paw"></i></div>
              <h4 class="title"><a href="">Animation</a></h4>
              <p class="description">Story and Character Animation</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Our Skills Section ======= -->
    <section id="skills" class="skills section-bg">
        <div class="container">

          <div class="section-title" data-aos="fade-up">
            <h2>Our Skills</h2>
            <p>Never stop learning.</p>
          </div>

          <div class="row">
            <div class="col-lg-6" data-aos="fade-right">
              <img src="{{ asset('/') }}assets/img/undraw_thought_process_re_om58.svg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
              <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
              </p>

              <div class="skills-content">

                <div class="progress">
                  <span class="skill">HTML <i class="val">100%</i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="progress">
                  <span class="skill">CSS <i class="val">90%</i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="progress">
                  <span class="skill">JavaScript <i class="val">75%</i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="progress">
                  <span class="skill">Photoshop <i class="val">55%</i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </section><!-- End Our Skills Section -->

       <!-- ======= Work Process Section ======= -->
       <section id="work-process" class="work-process">
        <div class="container">

          <div class="section-title" data-aos="fade-up">
            <h2>Work Process</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row content">
            <div class="col-md-5" data-aos="fade-right">
              <img src="{{ asset('/') }}assets/img/undraw_add_information_j2wg.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-4" data-aos="fade-left">
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              </ul>
            </div>
          </div>

          <div class="row content">
            <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
              <img src="{{ asset('/') }}assets/img/undraw_control_panel_re_y3ar.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
              <h3>Corporis temporibus maiores provident</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
            </div>
          </div>

          <div class="row content">
            <div class="col-md-5" data-aos="fade-right">
              <img src="{{ asset('/') }}assets/img/undraw_firmware_re_fgdy.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5" data-aos="fade-left">
              <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
              <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
              <ul>
                <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
              </ul>
            </div>
          </div>

          <div class="row content">
            <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
              <img src="{{ asset('/') }}assets/img/undraw_message_sent_re_q2kl.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
              <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
            </div>
          </div>

        </div>
      </section><!-- End Work Process Section -->


    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Our Clients</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><img src="{{ asset('/') }}assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="{{ asset('/') }}assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="{{ asset('/') }}assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="{{ asset('/') }}assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="{{ asset('/') }}assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="{{ asset('/') }}assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="{{ asset('/') }}assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="{{ asset('/') }}assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section><!-- End Our Clients Section -->



  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Baemon Team Dev</h3>
            <p>We build App, Game and Animation.</p>
          </div>



          <div class="col-lg-3 col-md-6 offset-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Indonesia<br>
              <strong>Phone:</strong> +6285736862399<br>
              <strong>Email:</strong> staff@baemon.web.id<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>BaemonTeamDev</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></a>


  </div>


  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('/') }}assets/js/baemon.js"></script>

  <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
  <!-- <script>
    AOS.init();
  </script> -->

  <script src="{{ asset('/') }}assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('/') }}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('/') }}assets/vendor/purecounter/purecounter.js"></script>
  <script src="{{ asset('/') }}assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('/') }}assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/') }}assets/js/landing.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
