<?php
require_once("controller/controller.php");

class produtos
{

  private $cod_cli;
  private $logado;
  private $url;
  private $url_id;

  public function __construct()
  {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
      $cod_cli = $_GET['id'];
      $logado = true;
      $url_id = "?id=" . $cod_cli;
      $url = "editarinfo.php" . $url_id;
      $controller = new controller();
      $cliente = $controller->captar($cod_cli);
    } else {
      $url = "login.php";
      $logado = false;
      $url_id = "";
    }

    if($logado != 0){
      $script = "javascript:document.location='finalizar.php?id=" . $cod_cli . "'";
    }
    else{
      $script = "javascript:alert('Entre na sua conta para visualizar os itens do seu carrinho...');";
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
  <link href="img/MagicHat/icone.ico" rel="icon">
  <link href="img/MagicHat/icone.ico" rel="apple-touch-icon">
  <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
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
          <li><a class="nav-link scrollto" href="index.php<?php echo $url_id; ?>">Home</a></li>
          <li><a class="nav-link scrollto active" href="produtos.php<?php echo $url_id; ?>">Brinquedos</a></li>
          <li><a class="nav-link scrollto" href="index.php<?php echo $url_id; ?>&#flipcard">Porque brincar</a></li>
          <li><a class="nav-link scrollto " href="faleconosco.php<?php echo $url_id; ?>">Fale conosco</a></li>
          <li><a class="nav-link scrollto" href="<?php echo $url; ?>">
              <ion-icon name="person" style="width: 50px; height: 27px;"></ion-icon>
            </a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <button id="cart" class="navbar-toggler" type="button" data-bs-toggle="modal" onclick="<?php echo $script; ?>">
          <span><ion-icon id="cart" name="cart"></ion-icon></span>
      </button>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

  <!-- ====== Pesquisa =======-->
    <div id="header">
      <div class="col">
        <nav class="navbar  container text-center">
          <div class="col order-first"></div>
          <div class="col-9">

            <form method="post" action="search.php<?php echo $url_id; ?>" id="formPesq" name="formPesq">
              <div class="input-group">
                  <input autofocus type="text" placeholder="Com o que vamos brincar?" class="form-control" name="txtPesquisa" required
                    id="txtPesquisa">
                  <button style="background-color: #ED4442;" class="btn btn-outline-secondary" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-search" viewBox="0 0 16 16">
                      <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                  </button>
              </div>
            </form>
            
          </div>
          <div class="col order-last"></div>
        </nav>
      </div>
    </div>


    <!-- ======= Container Section ======= -->
    <section id="cta" class="cta">
      <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <p>Produtos</p>
          <h2>VEJA NOSSO CATÁLOGO DE PRODUTOS</h2>
        </div>

        <center>

          <div id="carouselExampleControls" data-aos-delay="5000" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

              <div class="carousel-item active">
                <img class="animate__animated animate__fadeInLeft ratio ratio-21x9"
                  src="img/bannerCategorias/bonecas.jpg">
              </div>

              <div class="carousel-item active">
                <img class="animate__animated animate__fadeInLeft ratio ratio-21x9"
                  src="img/bannerCategorias/bonecos.jpg">
              </div>

              <div class="carousel-item">
                <img class="animate__animated animate__fadeInLeft ratio ratio-21x9"
                  src="img/bannerCategorias/carrinhos.jpg">
              </div>

              <div class="carousel-item">
                <img class="animate__animated animate__fadeInLeft ratio ratio-21x9"
                  src="img/bannerCategorias/herois.jpg">
              </div>

              <div class="carousel-item">
                <img class="animate__animated animate__fadeInLeft ratio ratio-21x9"
                  src="img/bannerCategorias/jogos.jpg">
              </div>

              <div class="carousel-item">
                <img class="animate__animated animate__fadeInLeft ratio ratio-21x9"
                  src="img/bannerCategorias/princesas.jpg">
              </div>
            </div>


          </div>

        </center>
      </div>
    </section>
    <!-- End Cta Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
          <ul>
            <li data-filter="*">Todos</li>
            <li data-filter=".filter-bonecas">Bonecas</li>
            <li data-filter=".filter-bonecos">Bonecos</li>
            <li data-filter=".filter-jogos">Jogos</li>
          </ul>
          <ul style="margin-left: -20px;">
            <li data-filter=".filter-carrinhos">Carrinhos</li>
            <li data-filter=".filter-herois">Heróis</li>
            <li data-filter=".filter-princesas">Princesas</li>
          </ul>
        </ul>
        <br>
        <br>
        <br>

        <div class="row portfolio-container pricing" data-aos="fade-up">
          <div class="row">

            <?php
              $controller = new controller();
              $produtos = $controller->pesquisar("",0);

              for($i=0; $i < count($produtos); $i++){
                if($logado != 0){
                  $qttd = "var btn = document.getElementById('btnValue" . $produtos[$i]['id'] . "').innerHTML.toString();";
                  $script = "javascript:" . $qttd . "var result = confirm('Deseja adicionar ao carrinho?'); if(result == true){document.location='carrinho.php?id=" . $_GET['id'] . "&produto=" . $produtos[$i]['id'] . "&qttd=' + btn}";
                }
                else{
                  $script = "javascript:alert('Entre na sua conta para adicionar itens ao carrinho...');";
                }
            ?>    

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0 portfolio-item <?php echo $produtos[$i]['filtro']; ?>">
                  <div class="box " data-aos="zoom-in" data-aos-delay="100">
                    <h3 style="height: 105px;"><?php echo $produtos[$i]['nome']; ?></h3>
                    <div><img style="height: 250px; width: 250px;" src="<?php echo $produtos[$i]['img1']; ?>"></div>
                    <h4><sup>R$</sup><?php echo $produtos[$i]['preco']; ?></h4>
                    <div>
                      <div class="btn-group me-2" role="group" aria-label="First group">
                        <button id="btnMenos" type="button" onclick="javascript:var btn = parseInt(document.getElementById('btnValue<?php echo $produtos[$i]['id']; ?>').innerHTML.toString()); if(btn > 1){document.getElementById('btnValue<?php echo $produtos[$i]['id']; ?>').innerHTML = btn - 1}" style="background-color: #ED4442; border-color: #ED4442;" class="btn btn-primary">-</button>
                        <button id="btnValue<?php echo $produtos[$i]['id']; ?>" type="button" style="background-color: white; color:black; border-color: #ED4442;" class="btn btn-primary">1</button>
                        <button id="btnMais" onclick="javascript:var btn = parseInt(document.getElementById('btnValue<?php echo $produtos[$i]['id']; ?>').innerHTML.toString()); if(btn < 20){document.getElementById('btnValue<?php echo $produtos[$i]['id']; ?>').innerHTML = btn + 1}" type="button" style="background-color: #ED4442; border-color: #ED4442;" class="btn btn-primary">+</button>
                      </div>
                    </div>
                    <div class="btn-wrap">
                      <button type="button" class="btn btn-buy btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        style="border: 0px;"
                        onclick="<?php echo $script; ?>">
                          + Carrinho
                      </button>
                    </div>
                    <div class="btn-wrap" style="margin-top: -10px;">
                      <button type="button" class="btn btn-buy btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                      style="border: 0px;">
                        Detalhes
                      </button>
                    </div>
                  </div>
                </div>
                
            <?php
              }
            ?>

          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->



  </main>

  <!-- End #main -->


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
<?php
  }
}
new produtos();
?>