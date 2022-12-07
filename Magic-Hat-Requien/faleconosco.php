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
      $script = "javascript:document.location='carrinho.php'";
    } else {
      $script = "javascript:alert('Entre na sua conta para adicionar itens ao seu carrinho...');";
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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"/>
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

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
              <li><a class="nav-link scrollto" href="produtos.php">Brinquedos</a></li>
              <li><a class="nav-link scrollto" href="index.php#flipcard">Porque brincar</a></li>
              <li><a class="nav-link scrollto active" href="faleconosco.php">Fale conosco</a></li>
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
            <i class="bi bi-list mobile-nav-toggle"></i>

            <button id="cart" class="navbar-toggler" type="button" data-bs-toggle="modal" onclick="<?php echo $script; ?>">
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
      
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container">

            <div class="section-title" data-aos="zoom-out">
              <p>Contato</p>
              <h2>Fale conosco</h2>
            </div>

            <div class="row mt-5">

              <div class="col-lg-4" data-aos="fade-right">
                <div class="info">
                  <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Localização:</h4>
                    <p>Av. Águia de Haia, 2633 - Cidade Antônio Estêvão de Carvalho, São Paulo</p>
                  </div>

                  <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>magichat@outlook.com</p>
                  </div>

                  <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Telefone:</h4>
                    <p>(11) 69318-8308</p>
                  </div>

                </div>

              </div>

              <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                <form method="post" action="controller/controller.php?funcao=contato" id="formLogin" name="formLogin">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="txtNome" class="form-control" id="txtNome" placeholder="Nome" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="txtAssunto" id="txtAssunto" placeholder="Assunto" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="txtMensagem" id="txtMensagem" rows="5" placeholder="Mensagem" required></textarea>
                  </div>

                  <br>
                  <br>

                  <div class="php-email-form text-center col-12">
                    <button type="submit" id="btnEnviar">Enviar</button>
                  </div>


                </form>

              </div>

            </div>

          </div>
        </section><!-- End Contact Section -->
        <section id="faq" class="faq">
          <div class="container">

            <div class="section-title" data-aos="zoom-out">
              <p>Perguntas Frequentes</p>
              <h2>F.A.Q</h2>
            </div>

            <ul class="faq-list">

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">"Quais as formas de pagamento que a loja utiliza?"<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    A Magic Hat utiliza apenas duas possibilidades de pagamento: via cartão de crédito ou via cartão de débito.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq2">"Como funciona o valor de frete dos produtos?"<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    O valor do frete dos produtos terá o seguinte funcionamento: caso o endereço de entrega do produto seja na cidade de São Paulo, o frete será entre 0 a 20 reais e caso seja fora da cidade, o valor do frete será entre 20 a 35 reais.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq3">"O produto que comprei veio com defeito, o que devo fazer para trocá-lo?"<i class="bi bi-chevron-down icon-"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Para efetuar a troca de produtos com defeitos é simples: entre em contato conosco por telefone ou email e enviaremos um entregador para recolher o produto defeituoso e entregar um novo.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq4">"Não gostei do produto que comprei. Posso trocar por outro brinquedo ou pedir meu dinheiro de volta?"<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Pela política da loja, a troca de produtos só poderá ser feita por dois motivos: produto com defeitos ou caso a loja tenha feito descrição equivocada do item e o objeto não esteja de acordo estas expectativas. Em outros tipos de casos, as trocas não serão efetuadas. Acaso seja uma situação especial, o cliente poderá entrar em contato e explicar seus motivos. Nossa loja dá o melhor para atender e entender o público.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq5">"Posso comprar produtos pelo site e retirar em uma loja física?"<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    A Magic Hat não possui lojas físicas, portanto, não há esta possibilidade.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq6">"Qual o prazo de entrega mínimo e máximo da loja?"<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    O prazo de entrega de nossa loja varia de 2 a 20 dias após a realização da compra. Caso seu produto ainda não tenha chegado após o fim deste prazo, recomendamos que entre em contato conosco, relatando o problema e a quantidade de dias ultrapassados.
                  </p>
                </div>
              </li>

            </ul>

          </div>
        </section>

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

          <p>©2022 Copyright <b>Magic Hat</b> | Todos os Direitos Reservados</p>
      </footer>
      <!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
        <!-- Template Main JS File -->
      <script src="js/main.js"></script>

    </body>

    </html>
<?php
  }
}
new produtos();
?>