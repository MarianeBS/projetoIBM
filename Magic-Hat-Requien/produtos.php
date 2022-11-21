<?php
require_once("controller/controller.php");

class produtos
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
      $script2 = "javascript:document.location='carrinho.php'";
    } else {
      $script = "javascript:alert('Entre na sua conta para adicionar itens ao seu carrinho...');";
      $script2 = "javascript:alert('Entre na sua conta para visualizar os itens do seu carrinho...');";
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
              <li><a class="nav-link scrollto" href="index.php">Home</a></li>
              <li><a class="nav-link scrollto active" href="produtos.php">Brinquedos</a></li>
              <li><a class="nav-link scrollto" href="index.php#flipcard">Porque brincar</a></li>
              <li><a class="nav-link scrollto " href="faleconosco.php">Fale conosco</a></li>
              <li class="dropdown"><a href="#"><span>
                    <ion-icon id="person" name="person"></ion-icon>
                  </span> </a>
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
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <button id="cart" class="navbar-toggler" type="button" data-bs-toggle="modal" onclick="<?php echo $script2; ?>">
              <span>
                <ion-icon id="cart" name="cart"></ion-icon>
              </span>
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

                <form method="post" action="search.php" id="formPesq" name="formPesq">
                  <div class="input-group">
                    <input autofocus type="text" placeholder="Com o que vamos brincar?" class="form-control" name="txtPesquisa" required id="txtPesquisa">
                    <button style="background-color: #ED4442;" class="btn btn-outline-light" type="submit">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
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
                    <img class="animate__animated animate__fadeInLeft ratio ratio-21x9" src="img/bannercategorias/bonecas.jpg">
                  </div>

                  <div class="carousel-item active">
                    <img class="animate__animated animate__fadeInLeft ratio ratio-21x9" src="img/bannercategorias/bonecos.jpg">
                  </div>

                  <div class="carousel-item">
                    <img class="animate__animated animate__fadeInLeft ratio ratio-21x9" src="img/bannercategorias/carrinhos.jpg">
                  </div>

                  <div class="carousel-item">
                    <img class="animate__animated animate__fadeInLeft ratio ratio-21x9" src="img/bannercategorias/herois.jpg">
                  </div>

                  <div class="carousel-item">
                    <img class="animate__animated animate__fadeInLeft ratio ratio-21x9" src="img/bannercategorias/jogos.jpg">
                  </div>

                  <div class="carousel-item">
                    <img class="animate__animated animate__fadeInLeft ratio ratio-21x9" src="img/bannercategorias/princesas.jpg">
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
                <li data-filter=".Bonecas">Bonecas</li>
                <li data-filter=".Bonecos">Bonecos</li>
                <li data-filter=".Jogos">Jogos</li>
              </ul>
              <ul style="margin-left: -20px;">
                <li data-filter=".Carrinhos">Carrinhos</li>
                <li data-filter=".Heróis">Heróis</li>
                <li data-filter=".Princesas">Princesas</li>
              </ul>
            </ul>
            <br>
            <br>
            <br>

            <div class="row portfolio-container pricing" data-aos="fade-up">
              <div class="row">

                <?php
                  $controller = new controller();
                  $produtos = $controller->pesquisar("", 0);

                  for ($i = 0; $i < count($produtos); $i++) {
                    if ($logado != 0) {
                      $qttd = "var btn = document.getElementById('btnValue" . $produtos[$i]['id'] . "').innerHTML.toString();";
                      $script = "javascript:" . $qttd . "var result = confirm('Deseja adicionar ao carrinho?'); if(result == true){document.location='cart.php?produto=" . $produtos[$i]['id'] . "&qttd=' + btn}";
                    }
                ?>

                  <div class="col-lg-3 col-md-6 mt-4 mt-md-0 portfolio-item <?php echo $produtos[$i]['categoria']; ?>">
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
                        <button type="button" class="btn btn-buy btn-primary" data-bs-target="#staticBackdrop" style="border: 0px;" onclick="<?php echo $script; ?>">
                          + Carrinho
                        </button>
                      </div>
                      <div class="btn-wrap" style="margin-top: -10px;">
                        <button type="button" class="btn btn-buy btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $i; ?>" style="border: 0px;">
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



        <!-- ======= Janela Modal ======= -->
     <section>
      <?php
      for ($i = 0; $i < count($produtos); $i++) {
        if ($logado != 0) {
          $qttd = "var btn = document.getElementById('btnVar" . $produtos[$i]['id'] . "').innerHTML.toString();";
          $script = "javascript:" . $qttd . "var result = confirm('Deseja adicionar ao carrinho?'); if(result == true){document.location='cart.php?produto=" . $produtos[$i]['id'] . "&qttd=' + btn}";
        }
      ?>
      <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog modal-xl">
          <div class="modal-content">

            <!-- Carros de imagens do produto -->
            <div class="products modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div id="carouselExampleIndicators<?php echo $i; ?>" class="carousel-inner" data-aos-delay="5000" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="<?php echo $produtos[$i]['img1']; ?>" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo $produtos[$i]['img2']; ?>" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo $produtos[$i]['img3']; ?>" class="d-block w-100">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators<?php echo $i; ?>"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators<?php echo $i; ?>"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                  </div>
                </div>


                <div class="text-center col-md-6">

                  <div>
                    <h2><?php echo $produtos[$i]['nome']; ?></h2>

                    <p></p>
                  </div>


                  <!-- Acordião -->
                  <div>
                    <!-- Acordião Descrição -->
                    <div class="accordion" id="accordionExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Descrição
                          </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                          data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <?php echo $produtos[$i]['descricao']; ?>
                          </div>
                        </div>
                      </div>


                      <!-- Acordião Detalhe -->
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="Bara-button accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Detalhes
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                          data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th scope="row">Tipo:</th>
                                  <td><?php echo $produtos[$i]['tipo1'] . " e " . $produtos[$i]['tipo2']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Categoria(s):</th>
                                  <td><?php echo $produtos[$i]['categoria']; ?></td>

                                <tr>
                                  <th scope="row">Faixa etária:</th>
                                  <td><?php echo $produtos[$i]['faixa']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Marca</th>
                                  <td><?php echo $produtos[$i]['marca']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Material/Composição</th>
                                  <td><?php echo $produtos[$i]['material']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <br>

                  <!-- parte do Preço do produto -->
                  
                  <div class="row pricing">
                    <div class="col-md-12">
                      <h4 style="color: black"><sup>R$ <?php echo $produtos[$i]['preco']; ?></sup></h4>
                    </div>
                  </div>
                  
                  <br>

                  <div class="product btn-group" role="group" aria-label="Basic example">
                  <button type="button" onclick="javascript:var btn = parseInt(document.getElementById('btnVar<?php echo $produtos[$i]['id']; ?>').innerHTML.toString()); if(btn > 1){document.getElementById('btnVar<?php echo $produtos[$i]['id']; ?>').innerHTML = btn - 1}" style="background-color: #ED4442; border-color: #ED4442;" class="btn btn-primary">-</button>
                  <button id="btnVar<?php echo $produtos[$i]['id']; ?>" type="button" style="background-color: white; color:black; border-color: #ED4442;" class="btn btn-primary">1</button>
                  <button onclick="javascript:var btn = parseInt(document.getElementById('btnVar<?php echo $produtos[$i]['id']; ?>').innerHTML.toString()); if(btn < 20){document.getElementById('btnVar<?php echo $produtos[$i]['id']; ?>').innerHTML = btn + 1}" type="button" style="background-color: #ED4442; border-color: #ED4442;" class="btn btn-primary">+</button>
                  </div>
                  <br>

                  <!-- Botão de compra -->
                  <br>
                  <div class="product text-center">
                    <button type="button" class="btn btn-buy" onclick="<?php echo $script; ?>">+ Carrinho</button>
                    
                    <button type="button" class=" btn-buy btn " data-bs-dismiss="modal">Voltar</button>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </section>
    <!-- End Janela modal -->


      </main>

      <!-- End #main -->


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

            <!-- 3° Coluna -->
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
new produtos();
?>