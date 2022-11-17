<?php
require_once("controller/controller.php");

class index
{

  private $cod_cli;
  private $logado = false;
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
      $url_id = "";
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
          <li><a class="nav-link scrollto" href="produtos.php<?php echo $url_id; ?>">Brinquedos</a></li>
          <li><a class="nav-link scrollto" href="index.php<?php echo $url_id; ?>#flipcard">Porque brincar</a></li>
          <li><a class="nav-link scrollto" href="faleconosco.php<?php echo $url_id; ?>">Fale conosco</a></li>
          <li><a class="nav-link scrollto" href="<?php echo $url; ?>">
              <ion-icon name="person" style="width: 50px; height: 27px;"></ion-icon>
            </a>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= About Section ======= -->




    <br><br><br>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <center>
        <div class="container">

          <div class="section-title" data-aos="zoom-out">
            <h2>Editar</h2>
            <p>Edite e visualize as suas informações</p>
          </div>

          <div class="row mt-5">


            <center>
              <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                <?php
                    $controller = new controller();
                    $resultado = $controller->captar($_GET['id']);
                ?>

                <form method="post" action="controller/controller.php?funcao=editar&id=<?php echo $resultado[0]['id']; ?>" id="formEdit" name="formEdit">
                  <div class="row g-3">
                    <div class="txtLeft col-md-6">
                      <label for="inputEmail4" class="form-label">Primeiro Nome</label>
                      <input autofocus type="text" placeholder="ex: Alex" class="form-control" name="txtNome" required
                        id="txtNome" value="<?php echo $resultado[0]['nome']; ?>">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputEmail4" class="form-label">Último Nome</label>
                      <input autofocus type="text" placeholder="ex: Almeida" class="form-control" name="txtSobrenome"
                        required id="txtSobrenome" value="<?php echo $resultado[0]['sobrenome']; ?>">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputEmail4" class="form-label">E-mail</label>
                      <input type="email" placeholder="example@gmail.com" class="form-control" name="txtEmail" required
                        id="txtEmail" value="<?php echo $resultado[0]['email']; ?>">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputSenha4" class="form-label">Senha</label>
                      <div style="float:right;"><label for="inputSenha4" class="form-label test">Exibir senha</label>
                        <input name="checkbox" id="checkbox"
                          style="margin:0 12px 0 0; vertical-align: middle; position: relative; top: -1px;"
                          class="form-check-input mt-0" type="checkbox" aria-label="Checkbox for following text input">
                      </div>
                      <input type="password" minlength="6" maxlength="14" placeholder="De 6 a 14 dígitos"
                        class="form-control" name="txtSenha" required id="txtSenha" value="<?php echo $resultado[0]['senha']; ?>">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputCep4" class="form-label">CEP</label>
                      <input type="text" maxlength="9" class="form-control" name="txtCep" required id="txtCep"
                        placeholder="13483-000" value="<?php echo $resultado[0]['cep']; ?>">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputBairro4" class="form-label">Bairro</label>
                      <input type="text" placeholder="Preenchimento automático" readonly class="form-control"
                        name="txtBairro" required id="txtBairro" value="<?php echo $resultado[0]['bairro']; ?>">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputEndereco4" class="form-label">Endereço</label>
                      <input type="text" placeholder="Preenchimento automático" readonly class="form-control"
                        name="txtEndereco" required id="txtEndereco" value="<?php echo $resultado[0]['endereco']; ?>">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputCidade4" class="form-label">Cidade</label>
                      <input type="text" placeholder="Preenchimento automático" readonly class="form-control"
                        name="txtCidade" required id="txtCidade" value="<?php echo $resultado[0]['cidade']; ?>">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputState" class="form-label">Estado</label>
                      <input type="text" placeholder="Preenchimento automático" readonly class="form-control"
                        name="txtEstado" required id="txtEstado" value="<?php echo $resultado[0]['estado']; ?>">
                    </div>

                    <!-- forms do categoria-->

                    <div class="txtLeft col-md-6">
                      <label for="inputState" class="form-label">Categoria que você procura</label>
                      <select class="form-select" name="cboCategorias" id="cboCategorias" required value>
                        <option disabled>Escolha...</option>
                        <option value="bonecas">Bonecas</option>
                        <option value="bonecos">Bonecos</option>
                        <option value="carrinhos">Carrinhos</option>
                        <option value="herois">Heróis</option>
                        <option selected value="jogos">Jogos</option>
                        <option value="princesas">Princesas</option>
                      </select>
                    </div>

                    <div class="row">
                      <div class="col">
                        <br>
                      </div>
                    </div>

                    <div class="php-email-form text-center col-12">
                      <button type="submit" id="btnEditar" class="btn btn-dark">Editar</button>
                    </div>
                </form>

              </div>
            </center>

          </div>

        </div>
      </center>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



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

  <!-- JQuery Files -->
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>

  <script src="js/main.js"></script>
  <script src="js/cadastro.js"></script>

</body>

</html>
<?php
  }
}
new index();
?>