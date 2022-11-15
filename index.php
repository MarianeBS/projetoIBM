<?php
require_once("controller/controller.php");

class index{

  private $cod_cli;

  public function __construct(){
    if(isset($_GET['id'])){
      $cod_cli = $_GET['id'];
      echo $cod_cli;
      $controller = new controller();
      $cliente = $controller->captar($cod_cli);
      echo '<br>' . $cliente[0]['nome'];
    }
  }

}
new index();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Magic Hat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/MagicHat/icone.ico" rel="icon">
  <link href="img/MagicHat/icone.ico" rel="apple-touch-icon">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/footer.css" rel="stylesheet">
  <link href="css/flipcard.css" rel="stylesheet">

</head>

<body>

  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><img src="img/MagicHat/logo.png" height="75" width="45"
            style="margin-right: 10px; margin-bottom: 10px;">
          <a href="index.php">Magic Hat</a></img>
        </h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="produtos.html">Brinquedos</a></li>
          <li><a class="nav-link scrollto" href="#brincar">Porque brincar</a></li>
          <li><a class="nav-link scrollto " href="faleconosco.html">Fale conosco</a></li>
          <li><a class="nav-link scrollto" href="login.html">
              <ion-icon name="person" style="width: 50px; height: 27px;"></ion-icon>
            </a>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
      <div id="heroCarousel" class=" container-fluid  carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide unico -->

        <div class="carousel-inner">
          <img src="img/MagicHat/CortinaNav-v4.png" class="ratio" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="animate__animated animate__fadeInDown"><b>Magic Hat</b></h1>
            <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Navegue</a>
          </div>
        </div>

      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9" fill="#FAF2F7">
        </g>
      </svg>

    </section><!-- End Hero -->



    <main id="main">

      <!-- ======= Services Section ======= -->
      <section id="services" class="services" style="background-color: #FAF2F7;">
        <div class="container">

          <div class="section-title" data-aos="zoom-out">
            <p>Categorias</p>
            <h2>ESCOLHA SUA CATEGORIA FAVORITA</h2>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="icon-box" data-aos="zoom-in-left">
                <div class="icon"><img src="img/categorias/bonecas.png" style="height: 100px; width: 100px; ">
                </div>
                <h4 class="title"><a href="produtos.html?bonecas">Bonecas</a></h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                <div class="icon"><img src="img/categorias/carrinhos.png" style="height: 100px; width: 100px; ">
                </div>
                <h4 class="title"><a href="produtos.html?carrinhos">Carrinhos</a></h4>

              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                <div class="icon"><img src="img/categorias/desenhos.png" style="height: 100px; width: 100px; ">
                </div>
                <h4 class="title"><a href="produtos.html?bonecos">Bonecos</a></h4>

              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-5">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                <div class="icon"><img src="img/categorias/herois.png" style="height: 100px; width: 100px; ">
                </div>
                <h4 class="title"><a href="produtos.html?herois">Heróis</a></h4>

              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-5">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
                <div class="icon"><img src="img/categorias/jogos.png" style="height: 100px; width: 100px; ">
                </div>
                <h4 class="title"><a href="produtos.html?jogos">Jogos</a></h4>

              </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-5">
              <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
                <div class="icon"><img src="img/categorias/princesas.png" style="height: 100px; width: 100px; ">
                </div>
                <h4 class="title"><a href="produtos.html?princesas">Princesas</a></h4>

              </div>
            </div>
          </div>

        </div>

      </section>
      <!-- End Services Section -->

      <!-- ======= Container Section ======= -->
      <section id="cta" class="cta">
        <div class="container">
          <div class="section-title" data-aos="zoom-out">
            <p>Para você</p>
            <h2>CONFIRA PRODUTOS QUE VÃO DE ACORDO COM SUA PREFERÊNCIA</h2>
          </div>
          <center>

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">

                <div class="carousel-item active">
                  <img class="ratio ratio-21x9" src="img/banner/para vc herois.jpeg">
                </div>

                <div class="carousel-item">
                  <img class="ratio ratio-21x9" src="img/banner/para vc princes.jpeg">
                </div>

                <div class="carousel-item">
                  <img class="ratio ratio-21x9" src="img/banner/banner1.png">
                </div>
              </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

          </center>
          <br>
        </div>
      </section>
      <!-- End Cta Section -->

      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio" style="background-color: #FAF2F7;">
        <div class="container">

          <div class="section-title" data-aos="zoom-out">
            <p>Produtos</p>
            <h2>Alguns produtos de nosso catálogo</h2>
          </div>

          <div class="row portfolio-container" data-aos="fade-up">

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/1.png" class="img-fluid"></div>
              <div class="portfolio-info">
                <h4>Pelúcia Capitão América</h4>
                <p>Super-Herói</p>
                <a href="img/produtosIndex/1.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/2.png" class="img-fluid"></div>
              <div class="portfolio-info">
                <h4>Relâmpago McQueen</h4>
                <p>Carrinho</p>
                <a href="img/produtosIndex/2.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/3.png" class="img-fluid"></div>
              <div class="portfolio-info">
                <h4>Quebra-Cabeça da Bela</h4>
                <p>Jogo</p>
                <a href="img/produtosIndex/3.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/4.png" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>Carro de Polícia</h4>
                <p>Carrinho</p>
                <a href="img/produtosIndex/4.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/5.png" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>Conjunto de Jogos dos Vingadores</h4>
                <p>Jogo</p>
                <a href="img/produtosIndex/5.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/6.png" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>Uno Minimalista</h4>
                <p>Jogo</p>
                <a href="img/produtosIndex/6.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/7.png" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>Pantera Negra</h4>
                <p>Super-Herói</p>
                <a href="img/produtosIndex/7.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/8.png" class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>Caiu Perdeu </h4>
                <p>Jogo</p>
                <a href="img/produtosIndex/8.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/9.png" class="img-fluid"></div>
              <div class="portfolio-info">
                <h4>Mega Casa dos Sonhos da Barbie</h4>
                <p>Boneca</p>
                <a href="img/produtosIndex/9.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>


            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-img"><img src="img/produtosIndex/10.png" class="img-fluid"></div>
              <div class="portfolio-info">
                <h4>Hermione Granger</h4>
                <p>Boneca</p>
                <a href="img/produtosIndex/10.png" data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                <a href="produtos.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Section -->


      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials" id="brincar">
        <div class="container">

          <div class="section-title" data-aos="zoom-out">
            <p id="flipCard">Por que Brincar?</p>
            <h2>BRINCAR É UM DOS MAIORES E MAIS IMPORTANTES MARCOS DA INFÂNCIA. VEJA ALGUNS MOTIVOS DO PORQUÊ BRINCAR É ESSENCIAL</h2>

          </div>

          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <div class="swiper-slide">

                <div class="flip-box">
                  <div class="flip-box-front text-center"
                    style="background-image: url(.//img/flipcards/background.png);">
                    <div class="inner">
                      <h3 class="flip-box-header fw-bold">Concentração</h3>
                      <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                    </div>
                  </div>
                  <div class="flip-box-back text-center"
                    style="background-image: url('.//img/flipcards/concentracao.png');">
                  </div>
                </div>

              </div><!-- End testimonial item -->

              <div class="swiper-slide">

                <div class="flip-box">
                  <div class="flip-box-front text-center"
                    style="background-image: url(.//img/flipcards/background.png);">
                    <div class="inner color-black">
                      <h3 class="flip-box-header fw-bold">Expressão</h3>
                      <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                    </div>
                  </div>
                  <div class="flip-box-back text-center"
                    style="background-image: url('.//img/flipcards/expressao.png');">
                  </div>
                </div>

              </div><!-- End testimonial item -->

              <div class="swiper-slide">

                <div class="flip-box">
                  <div class="flip-box-front text-center"
                    style="background-image: url('.//img/flipcards/background.png');">
                    <div class="inner color-black">
                      <h3 class="flip-box-header fw-bold">Felicidade</h3>
                      <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                    </div>
                  </div>
                  <div class="flip-box-back text-center"
                    style="background-image: url('.//img/flipcards/felicidade.png');">
                  </div>
                </div>

              </div><!-- End testimonial item -->

              <div class="swiper-slide">

                <div class="flip-box">
                  <div class="flip-box-front text-center"
                    style="background-image: url('.//img/flipcards/background.png');">
                    <div class="inner color-black">
                      <h3 class="flip-box-header fw-bold">Criatividade</h3>
                      <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                    </div>
                  </div>
                  <div class="flip-box-back text-center"
                    style="background-image: url('.//img/flipcards/criatividade.png');">
                  </div>
                </div>


              </div><!-- End testimonial item -->

              <div class="swiper-slide">

                <div class="flip-box">
                  <div class="flip-box-front text-center"
                    style="background-image: url('.//img/flipcards/background.png');">
                    <div class="inner color-black">
                      <h3 class="flip-box-header fw-bold">Respeito</h3>
                      <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                    </div>
                  </div>
                  <div class="flip-box-back text-center"
                    style="background-image: url('.//img/flipcards/respeito.png');">
                  </div>
                </div>

              </div><!-- End testimonial item -->

              <div class="swiper-slide">

                <div class="flip-box">
                  <div class="flip-box-front text-center"
                    style="background-image: url('.//img/flipcards/background.png');">
                    <div class="inner color-black">
                      <h3 class="flip-box-header fw-bold">Superação</h3>
                      <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                    </div>
                  </div>
                  <div class="flip-box-back text-center"
                    style="background-image: url('.//img/flipcards/superacao.png');">
                  </div>
                </div>

              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section><!-- End Testimonials Section -->


    </main><!-- End #main -->

    <br><br><br>

    <!-- ======= Footer ======= -->
    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="4" fill="rgba(161,30,29, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="70" y="0" fill="rgba(161,30,29, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="7" fill="#A11E1D">
      </g>
    </svg>


    <footer>

      <!-- Seção de Mídias Sociais -->
      <ul class="social_icon">
        <li><a href="https://twitter.com/Vec_Foxtor?t=LErlF9MN4Kwr6xAGfRHRnQ&s=09">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>
        <li><a href="https://www.instagram.com/vik.roma/">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>
        <li><a href="https://www.linkedin.com/in/victor-r-f-de-roma-9b5858211/">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>
        <li><a href="https://github.com/VictorRFdRoma">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>
      </ul>


      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <!-- 1° Coluna -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

            <!-- Conteúdo sobre o Site -->

            <h3 class="fw-bold">
              Magic Hat
            </h3>

            <p>
            A Magic Hat é uma loja virtual de brinquedos que visa atender seus clientes de forma rápida, interativa, com qualidade em seu atendimento e produtos e, principalmente, com segurança.
            </p>
          </div>

          <!-- 3° Coluna -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links Desenvolvedores -->
            <h3 class="fw-bold">
              Desenvolvedores
            </h3>

            <p class="txtCenter">
              <a href="https://github.com/joaopedro2602" target="_blank">João Pedro Cabral</a>
            </p>

            <p class="txtCenter">
              <a href="https://github.com/MarianeBS" target="_blank">Mariane Souza</a>
            </p>

            <p class="txtCenter">
              <a href="https://github.com/TamirisRC" target="_blank">Tamiris Carvalho</a>
            </p>

            <p class="txtCenter">
              <a href="https://github.com/vek03" target="_blank">Victor Cardoso</a>
            </p>

            <p class="txtCenter">
              <a href="https://github.com/VictordRoma" target="_blank">Victor Roma</a>
            </p>

          </div>

          <!-- 4° Coluna -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links Contato -->
            <h3 class="fw-bold">
              Contato
            </h3>
            <p>
            Endereço: Av. Águia de Haia, 2633 - Cidade Antônio Estêvão de Carvalho, São Paulo
            </p>
<p>
CEP: 01311-000
</p>
            <p>
            Atendimento por: magichat@outlook.com
            </p>

            <p>
            Contato: (11) 69318-8308
            </p>

          </div>

        </div>

      </div>
      </div>

      <p>©2022 Copyright <b>Magic Hat</b> | Todos os Direitos Reservados</p>
    </footer>

    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="vendor/aos/aos.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/glightbox/js/glightbox.min.js"></script>
    <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="vendor/swiper/swiper-bundle.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="js/main.js"></script>

</body>

</html>