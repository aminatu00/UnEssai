
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>StudentHub</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assetsWel/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assetsWel/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assetsWel/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetsWel/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assetsWel/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assetsWel/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetsWel/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('assetsWel/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Jun 06 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">StudentHub</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li class="dropdown"><a href="#"><span>Forum</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                  <li><a href="#">Categorie</a></li>
              <li><a href="#">Discussion Recente</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>

          <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
        </ul>
        
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
     
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
      <h1>Bienvenue sur Notre Forum !</h1>
      <p>Échangez des idées, posez des questions et enrichissez vos connaissances.</p>
      <div class="d-flex">
        <a href="#about" class="btn-get-started">Commencer</a>
        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Regarder la Vidéo</span></a>
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="{{asset('assetsWel/img/hero-img.png')}}" class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section><!-- /Hero Section -->


    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="zoom-in">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <section id="about" class="about section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
   <h2>A propos de nous</h2>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
      <p>
        Dans le contexte universitaire, les obstacles logistiques et les interruptions fréquentes représentent des défis majeurs pour les étudiants, compromettant leur parcours académique et leur épanouissement professionnel. Ces difficultés peuvent entraîner des lacunes dans la compréhension des matières enseignées, ce qui se traduit par une baisse de la performance académique, une augmentation du stress lié aux études et une diminution de la motivation à poursuivre les études.
      </p>
      <ul>
        <li><i class="bi bi-check2-circle"></i> <span>Créer et gérer un espace de discussion pédagogique en ligne, où les étudiants peuvent interagir, poser des questions et apporter des réponses dans un cadre collaboratif et inclusif.</span></li>
        <li><i class="bi bi-check2-circle"></i> <span>Favoriser la collaboration entre pairs, renforcer la confiance des étudiants dans leur capacité à apprendre et promouvoir un apprentissage continu, indépendamment des contraintes externes.</span></li>
        <li><i class="bi bi-check2-circle"></i> <span>Créer un réseau de tutorat entre les étudiants, favorisant le partage des connaissances et le développement de compétences transversales.</span></li>
      </ul>
    </div>

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
      <p>Dans cette application, les étudiants peuvent créer et gérer leurs propres espaces de discussion, répondre et liker les réponses des autres, signaler les réponses inappropriées et recevoir des notifications en temps réel. Les tuteurs peuvent créer et gérer leurs propres espaces de discussion, répondre et liker les réponses des autres, signaler les réponses inappropriées et recevoir des notifications en temps réel.</p>
      <a href="#" class="read-more"><span>Lire plus</span><i class="bi bi-arrow-right"></i></a>
    </div>

  </div>

</div>

</section><!-- /About Section -->

 <!-- Section Pourquoi nous choisir -->
<section id="why-us" class="section why-us" data-builder="section">

<div class="container-fluid">

  <div class="row gy-4">

    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

      <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
        <h3><span>Notre engagement envers vous</span><strong>Créer un environnement d'apprentissage inclusif et collaboratif</strong></h3>
        <p>
          Notre mission est d'offrir une plateforme où les étudiants peuvent interagir, poser des questions et bénéficier d'un soutien mutuel pour renforcer leur compréhension des cours.
        </p>
      </div>

      <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

        <div class="faq-item faq-active">

          <h3><span>01</span> Besoin d'aide ?</h3>
          <div class="faq-content">
            <p>Nous sommes là pour répondre à toutes vos questions et vous soutenir dans votre parcours académique.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3><span>02</span> Besoin d'échanger avec vos pairs ?</h3>
          <div class="faq-content">
            <p>Notre plateforme facilite les discussions entre étudiants, favorisant ainsi l'échange de connaissances et le soutien mutuel.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3><span>03</span> Besoin d'un environnement d'apprentissage flexible ?</h3>
          <div class="faq-content">
            <p>Accédez à notre plateforme à tout moment et depuis n'importe quel endroit pour un apprentissage continu et adapté à vos besoins.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

      </div>

    </div>

    <div class="col-lg-5 order-1 order-lg-2 why-us-img">
      <img src="{{asset('assetsWel/img/why-us.png')}}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
    </div>
  </div>

</div>

</section><!-- / Section Pourquoi nous choisir -->

<!-- Section Compétences -->
<section id="skills" class="skills section">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row">

    <div class="col-lg-6 d-flex align-items-center">
      <img src="{{asset('assetsWel/img/skills.png')}}" class="img-fluid" alt="">
    </div>

    <div class="col-lg-6 pt-4 pt-lg-0 content">

      <h3>Technologies utilisées</h3>
      <p class="fst-italic">
        Nous avons utilisé plusieurs technologies pour développer notre plateforme, notamment :
      </p>

      <div class="skills-content skills-animation">

        <div class="progress">
          <span class="skill"><span>PHP</span> <i class="val">90%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div><!-- End Skills Item -->

        <div class="progress">
          <span class="skill"><span>JavaScript</span> <i class="val">85%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div><!-- End Skills Item -->

        <div class="progress">
          <span class="skill"><span>CSS</span> <i class="val">80%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div><!-- End Skills Item -->

        <div class="progress">
          <span class="skill"><span>HTML</span> <i class="val">80%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div><!-- End Skills Item -->

      </div>

    </div>
  </div>

</div>

</section><!-- / Section Compétences -->


    <!-- Services Section -->
<section id="services" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Services</h2>
  <p>Découvrez nos services qui répondent à vos besoins</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <!-- Service Item 1 -->
    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
      <div class="service-item position-relative">
        <div class="icon"><i class="bi bi-chat-left-dots icon"></i></div>
        <h4><a href="#" class="stretched-link">Discussions Interactives</a></h4>
        <p>Créez et participez à des discussions avec d'autres étudiants et tuteurs.</p>
      </div>
    </div><!-- End Service Item -->

    <!-- Service Item 2 -->
    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
      <div class="service-item position-relative">
        <div class="icon"><i class="bi bi-question-circle icon"></i></div>
        <h4><a href="#" class="stretched-link">Questions & Réponses</a></h4>
        <p>Posez des questions et obtenez des réponses de la part de vos pairs et de vos tuteurs.</p>
      </div>
    </div><!-- End Service Item -->

    <!-- Service Item 3 -->
    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
      <div class="service-item position-relative">
        <div class="icon"><i class="bi bi-people icon"></i></div>
        <h4><a href="#" class="stretched-link">Tutorat en Ligne</a></h4>
        <p>Devenez tuteur, créez des sessions de mentorat, et aidez les étudiants à atteindre leur plein potentiel académique.</p>
      </div>
    </div><!-- End Service Item -->

    <!-- Service Item 4 -->
    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
      <div class="service-item position-relative">
        <div class="icon"><i class="bi bi-gear icon"></i></div>
        <h4><a href="#" class="stretched-link">Gestion Facile</a></h4>
        <p>Gérez vos contenus, vos discussions et vos réponses avec facilité.</p>
      </div>
    </div><!-- End Service Item -->

  </div>

</div>

</section><!-- /Services Section -->

  
  
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Besoin d'aide ou de renseignements ? Contactez-nous dès maintenant</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>Senegal,Dakar</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Appelez nous</h3>
                  <p>+33 123 45 67</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>joignez nous par mail</h3>
                  <p>StudentHub@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.8157210052927!2d-17.443285485253403!3d14.69268478970508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10bb8188bc2335c7%3A0x8802a165e8d38d41!2sDakar%2C%20Senegal!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

   


    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">StudentHub</strong> <span>All Rights Reserved</span></p>
     
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assetsWel/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('assetsWel/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assetsWel/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assetsWel/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assetsWel/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assetsWel/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assetsWel/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assetsWel/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('assetsWel/js/main.js')}}"></script>

</body>

</html>