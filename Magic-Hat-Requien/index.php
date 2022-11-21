<?php
require_once("controller/controller.php");

class index
{

  private $cod_cli;
  private $logado;

  public function __construct()
  {
    session_start();

    if (isset($_SESSION['id_cliente']) && $_SESSION['id_cliente'] > 0) {
      $cod_cli = $_SESSION['id_cliente'];
      $logado = true;
      $controller = new controller();
      $cliente = $controller->captar($cod_cli);
    } else {
      $logado = false;
    }

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
      <link href="img/magichat/icone.ico" rel="icon">
      <link href="img/magichat/icone.ico" rel="apple-touch-icon">
      <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
            <h1><img src="img/magichat/logo.png">
              <a href="index.php">Magic Hat</a></img>
            </h1>
          </div>

          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
              <li><a class="nav-link scrollto" href="produtos.php">Brinquedos</a></li>
              <li><a class="nav-link scrollto" href="index.php #flipcard">Porque brincar</a></li>
              <li><a class="nav-link scrollto" href="faleconosco.php">Fale conosco</a></li>
              <li class="dropdown"><a href="#"><span>
                    <ion-icon id="person" name="person"></ion-icon>
                  </span></a>
                <ul>
                  <?php
                    if($logado == 1){
                  ?>
                  
                  <li><a href="editarinfo.php">Editar informações</a></li>
                  <li><a href="model/destroy.php?id=1">Sair da conta</a></li>

                  <?php
                    }else{
                  ?>

                  <li><a href="login.php">Login</a></li>
                  <li><a href="login_gerente.php">Login - Gerente</a></li>
                  <li><a href="cadastro.php">Cadastre-se</a></li>

                  <?php
                    }
                  ?>
                </ul>
              </li>
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
              <img src="img/magichat/cortinanav.png" class="ratio imgteste">
              <div class="carousel-caption d-none d-md-block">
                <h1 class="magichat animate__animated animate__fadeInDown"><b>Magic Hat</b></h1>
                <?php
                  if($logado == true){
                ?>
                <h4 class="magichat animate__animated animate__fadeInDown"><b><?php echo "Olá, " . $cliente[0]['nome'] ?></b></h4>
                <?php
                  }
                ?>
                <h4 class="magich animate__animated animate__fadeInDown">Adquira seus brinquedos em um passe de mágica</h4>
                <a href="#categorias" class="btn-get-started animate__animated animate__fadeInUp scrollto">Navegue</a>
              </div>
            </div>

          </div>

          <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
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
          <section id="categorias" class="services" style="background-color: #FAF2F7;">
            <div class="container">

              <div class="section-title" data-aos="zoom-out">
                <p>Categorias</p>
                <h2>Escolha sua categoria favorita</h2>
              </div>

              <div class="row">
                <div class="col-lg-4 col-md-6 ">
                  <a href="produtos.php?bonecas">
                    <div class="icon-box" data-aos="zoom-in-left">
                      <div class="icon"><img id="categoriaimg" src="img/categorias/bonecas.png">
                      </div>
                      <h4 class="title"><a href="produtos.php?bonecas">Bonecas</a></h4>
                    </div>
                  </a>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
                  <a href="produtos.php?bonecos">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                      <div class="icon"><img src="img/categorias/bonecos.png" id="categoriaimg">
                      </div>
                      <h4 class="title"><a href="produtos.php?bonecos">Bonecos</a></h4>
                    </div>
                  </a>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                  <a href="produtos.php?carrinhos">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                      <div class="icon"><img src="img/categorias/carrinhos.png" id="categoriaimg">
                      </div>
                      <h4 class="title"><a href="produtos.php?carrinhos">Carrinhos</a></h4>
                    </div>
                  </a>
                </div>

                <div class="col-lg-4 col-md-6 mt-5">
                  <a href="produtos.php?herois">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                      <div class="icon"><img src="img/categorias/herois.png" id="categoriaimg">
                      </div>
                      <h4 class="title"><a href="produtos.php?herois">Heróis</a></h4>
                    </div>
                  </a>
                </div>

                <div class="col-lg-4 col-md-6 mt-5">
                  <a href="produtos.php?jogos">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
                      <div class="icon"><img src="img/categorias/jogos.png" id="categoriaimg">
                      </div>
                      <h4 class="title"><a href="produtos.php?jogos">Jogos</a></h4>
                    </div>
                  </a>
                </div>


                <div class="col-lg-4 col-md-6 mt-5">
                  <a href="produtos.php?princesas">
                    <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
                      <div class="icon"><img src="img/categorias/princesas.png" id="categoriaimg">
                      </div>
                      <h4 class="title"><a href="produtos.php?princesas">Princesas</a></h4>
                    </div>
                  </a>
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
                <h2>Confira produtos que vão de acordo com sua preferência</h2>
              </div>
              <center>

                <div id="Banerindex" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                <?php
                $controller = new controller();

                if ($logado == true) {
                  if ($cliente[0]['preferencia'] == "Bonecas") {
                ?>

                    <div class="carousel-item active">
                      <a href="produtos.php?bonecas"><img class="ratio ratio-21x9" src="img/bannerindex/bonecaum.png"></a>
                    </div>

                    <div class="carousel-item">
                      <a href="produtos.php?bonecas"><img class="ratio ratio-21x9" src="img/bannerindex/bonecadois.png"></a>
                    </div>

                  <?php
                  } elseif ($cliente[0]['preferencia'] == "Bonecos") {
                  ?>

                    <div class="carousel-item active">
                      <a href="produtos.php?bonecos"><img class="ratio ratio-21x9" src="img/bannerindex/bonecoum.png"></a>
                    </div>

                    <div class="carousel-item">
                      <a href="produtos.php?bonecos"><img class="ratio ratio-21x9" src="img/bannerindex/bonecodois.png"></a>
                    </div>

                  <?php
                  } elseif ($cliente[0]['preferencia'] == "Carrinhos") {
                  ?>

                    <div class="carousel-item active">
                      <a href="produtos.php?carrinhos"><img class="ratio ratio-21x9" src="img/bannerindex/carrinhoum.png"></a>
                    </div>

                    <div class="carousel-item">
                      <a href="produtos.php?carrinhos"><img class="ratio ratio-21x9" src="img/bannerindex/carrinhodois.png"></a>
                    </div>

                  <?php
                  } elseif ($cliente[0]['preferencia'] == "Heróis") {
                  ?>

                    <div class="carousel-item active">
                      <a href="produtos.php?herois"><img class="ratio ratio-21x9" src="img/bannerindex/heroium.png"></a>
                    </div>

                    <div class="carousel-item">
                      <a href="produtos.php?herois"><img class="ratio ratio-21x9" src="img/bannerindex/heroidois.png"></a>
                    </div>

                  <?php
                  } elseif ($cliente[0]['preferencia'] == "Jogos") {
                  ?>

                    <div class="carousel-item active">
                      <a href="produtos.php?jogos"><img class="ratio ratio-21x9" src="img/bannerindex/jogoum.png"></a>
                    </div>

                    <div class="carousel-item">
                      <a href="produtos.php?jogos"><img class="ratio ratio-21x9" src="img/bannerindex/jogodois.png"></a>
                    </div>

                  <?php
                  } elseif ($cliente[0]['preferencia'] == "Princesas") {
                  ?>

                    <div class="carousel-item active">
                      <a href="produtos.php?princesas"><img class="ratio ratio-21x9" src="img/bannerindex/princesaum.png"></a>
                    </div>

                    <div class="carousel-item">
                      <a href="produtos.php?princesas"><img class="ratio ratio-21x9" src="img/bannerindex/princesadois.png"></a>
                    </div>
                  <?php
                  }
                } else {
                  ?>
                  <div class="carousel-item active">
                    <a href="produtos.php?bonecas"><img class="ratio ratio-21x9" src="img/bannerindex/bonecaum.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?bonecas"><img class="ratio ratio-21x9" src="img/bannerindex/bonecadois.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?bonecos"><img class="ratio ratio-21x9" src="img/bannerindex/bonecoum.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?bonecos"><img class="ratio ratio-21x9" src="img/bannerindex/bonecodois.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?carrinhos"><img class="ratio ratio-21x9" src="img/bannerindex/carrinhoum.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?carrinhos"><img class="ratio ratio-21x9" src="img/bannerindex/carrinhodois.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?herois"><img class="ratio ratio-21x9" src="img/bannerindex/heroium.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?herois"><img class="ratio ratio-21x9" src="img/bannerindex/heroidois.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?jogos"><img class="ratio ratio-21x9" src="img/bannerindex/jogoum.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?jogos"><img class="ratio ratio-21x9" src="img/bannerindex/jogodois.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?princesas"><img class="ratio ratio-21x9" src="img/bannerindex/princesaum.png"></a>
                  </div>

                  <div class="carousel-item">
                    <a href="produtos.php?princesas"><img class="ratio ratio-21x9" src="img/bannerindex/princesadois.png"></a>
                  </div>
                <?php
                }
                ?>
                </div>

                  <button class="carousel-control-prev" type="button" data-bs-target="#Banerindex" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#Banerindex" data-bs-slide="next">
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
          <section id="portfolio" class="portfolio">
            <div class="container">

              <div class="section-title" data-aos="zoom-out">
                <p>Produtos</p>
                <h2>Alguns produtos de nosso catálogo</h2>
              </div>

              <div class="row portfolio-container" data-aos="fade-up">

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/1.png" class="img-fluid"></div>
                  <div class="portfolio-info">
                    <h4>Pelúcia Capitão América</h4>
                    <p>Super-Herói</p>
                    <a href="img/produtosindex/1.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?herois" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/2.png" class="img-fluid"></div>
                  <div class="portfolio-info">
                    <h4>Relâmpago McQueen</h4>
                    <p>Carrinho</p>
                    <a href="img/produtosindex/2.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?carrinhos" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/3.png" class="img-fluid"></div>
                  <div class="portfolio-info">
                    <h4>Quebra-Cabeça da Bela</h4>
                    <p>Princesa</p>
                    <a href="img/produtosindex/3.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?princesas" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/4.png" class="img-fluid" alt=""></div>
                  <div class="portfolio-info">
                    <h4>Carro de Polícia</h4>
                    <p>Carrinho</p>
                    <a href="img/produtosindex/4.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?carrinhos" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/5.png" class="img-fluid" alt=""></div>
                  <div class="portfolio-info">
                    <h4>Conjunto de Jogos dos Vingadores</h4>
                    <p>Heróis</p>
                    <a href="img/produtosindex/5.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?herois" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/6.png" class="img-fluid" alt=""></div>
                  <div class="portfolio-info">
                    <h4>Uno Minimalista</h4>
                    <p>Jogo</p>
                    <a href="img/produtosindex/6.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?jogos" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/7.png" class="img-fluid" alt=""></div>
                  <div class="portfolio-info">
                    <h4>Pantera Negra</h4>
                    <p>Super-Herói</p>
                    <a href="img/produtosindex/7.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?herois" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/8.png" class="img-fluid" alt=""></div>
                  <div class="portfolio-info">
                    <h4>Caiu Perdeu </h4>
                    <p>Jogo</p>
                    <a href="img/produtosindex/8.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?jogos" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/9.png" class="img-fluid"></div>
                  <div class="portfolio-info">
                    <h4>Mega Casa dos Sonhos da Barbie</h4>
                    <p>Boneca</p>
                    <a href="img/produtosindex/9.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?bonecas" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>


                <div class="col-lg-4 col-md-6 portfolio-item">
                  <div class="portfolio-img"><img src="img/produtosindex/10.png" class="img-fluid"></div>
                  <div class="portfolio-info">
                    <h4>Hermione Granger</h4>
                    <p>Boneca</p>
                    <a href="img/produtosindex/10.png" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    <a href="produtos.php?bonecas" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>

              </div>

            </div>
          </section><!-- End Portfolio Section -->


          <!-- ======= Testimonials Section ======= -->
          <section id="testimonials" class="testimonials">
            <div class="container">

              <div id="flipcard" class="section-title" data-aos="zoom-out">
                <p>Por que Brincar?</p>
                <h2>Brincar é um dos maiores e mais importantes marcos da infância. Veja alguns motivos do porquê brincar é essencial</h2>
              </div>

              <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">

                    <div class="flip-box">
                      <div class="flip-box-front text-center" style="background-image: url(.//img/flipcards/background.png);">
                        <div class="inner">
                          <h3 class="flip-box-header">Concentração</h3>
                          <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                        </div>
                      </div>
                      <div class="flip-box-back" style="background-image: url('.//img/flipcards/concentracao.png');">
                      </div>
                    </div>

                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">

                    <div class="flip-box">
                      <div class="flip-box-front text-center" style="background-image: url(.//img/flipcards/background.png);">
                        <div class="inner">
                          <h3 class="flip-box-header">Expressão</h3>
                          <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                        </div>
                      </div>
                      <div class="flip-box-back" style="background-image: url('.//img/flipcards/expressao.png');">
                      </div>
                    </div>

                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">

                    <div class="flip-box">
                      <div class="flip-box-front text-center" style="background-image: url('.//img/flipcards/background.png');">
                        <div class="inner">
                          <h3 class="flip-box-header">Felicidade</h3>
                          <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                        </div>
                      </div>
                      <div class="flip-box-back" style="background-image: url('.//img/flipcards/felicidade.png');">
                      </div>
                    </div>

                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">

                    <div class="flip-box">
                      <div class="flip-box-front text-center" style="background-image: url('.//img/flipcards/background.png');">
                        <div class="inner">
                          <h3 class="flip-box-header">Criatividade</h3>
                          <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                        </div>
                      </div>
                      <div class="flip-box-back" style="background-image: url('.//img/flipcards/criatividade.png');">
                      </div>
                    </div>


                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">

                    <div class="flip-box">
                      <div class="flip-box-front text-center" style="background-image: url('.//img/flipcards/background.png');">
                        <div class="inner">
                          <h3 class="flip-box-header">Respeito</h3>
                          <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                        </div>
                      </div>
                      <div class="flip-box-back" style="background-image: url('.//img/flipcards/respeito.png');">
                      </div>
                    </div>
                    <div class="col-md-12">
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">

                    <div class="flip-box">
                      <div class="flip-box-front text-center" style="background-image: url('.//img/flipcards/background.png');">
                        <div class="inner">
                          <h3 class="flip-box-header">Superação</h3>
                          <img src="img/flipcards/next.png" alt="" class="flip-box-img">
                        </div>
                      </div>
                      <div class="flip-box-back" style="background-image: url('.//img/flipcards/superacao.png');">
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
        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
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
            <li><a href="https://twitter.com/MagicHatOficial">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>
            <li><a href="https://www.instagram.com/magic.hat.of/">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>
            <li><a href="https://www.linkedin.com/in/magic-hat-45bb81257">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>
            <li><a href="https://www.facebook.com/profile.php?id=100088264081232">
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
              <!-- 2° Coluna -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links Desenvolvedores -->
                <h3 class="fw-bold">
                  Desenvolvedores
                </h3>

              <p class="txtCenter">
                <a class="nav-link scrollto" href="https://github.com/joaopedro2602" target="_blank">João Pedro Cabral</a>
              </p>

              <p class="txtCenter">
                <a class="nav-link scrollto" href="https://github.com/MarianeBS" target="_blank">Mariane Souza</a>
              </p>

              <p class="txtCenter">
                <a class="nav-link scrollto" href="https://github.com/TamirisRC" target="_blank">Tamiris Carvalho</a>
              </p>

              <p class="txtCenter">
                <a class="nav-link scrollto" href="https://github.com/vek03" target="_blank">Victor Cardoso</a>
              </p>

              <p class="txtCenter">
                <a class="nav-link scrollto" href="https://github.com/VictordRoma" target="_blank">Victor Roma</a>
              </p>

              </div>
              <!-- 3° Coluna -->
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

          <p>©2022 Copyright <b>Magic Hat</b> | Todos os Direitos Reservados</p>
        </footer>

        <!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
<?php
  }
}
new index();
?>