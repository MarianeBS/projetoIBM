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
              <li><a class="nav-link scrollto" href="index.php">Home</a></li>
              <li><a class="nav-link scrollto" href="produtos.php">Brinquedos</a></li>
              <li><a class="nav-link scrollto" href="index.php#flipcard">Porque brincar</a></li>
              <li><a class="nav-link scrollto" href="faleconosco.php">Fale conosco</a></li>
              <li class="dropdown"><a href="#"><span>
                    <ion-icon id="person" name="person"></ion-icon>
                  </span> </a>
                <ul>
                  <li><a href="">Editar informações</a></li>
                  <li><a href="model/destroy.php?id=1">Sair da conta</a></li>
                </ul>
              </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->

      <main id="main">
        <br><br><br>
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <center>
            <div class="container">

              <div class="section-title" data-aos="zoom-out">
                 <p>Edite e visualize as suas informações</p>
                 <h2>Editar</h2>
               
              </div>

              <div class="row mt-5">


                <center>
                  <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                    <?php
                    $controller = new controller();
                    $resultado = $controller->captar($cod_cli);
                    ?>

                    <form method="post" action="controller/controller.php?funcao=editar&id=<?php echo $resultado[0]['id']; ?>" id="formEdit" name="formEdit">
                      <div class="row g-3">
                        <div class="txtLeft col-md-6">
                          <label for="inputEmail4" class="form-label">Primeiro Nome</label>
                          <input autofocus type="text" placeholder="ex: Alex" class="form-control" name="txtNome" required id="txtNome" value="<?php echo $resultado[0]['nome']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputEmail4" class="form-label">Último Nome</label>
                          <input autofocus type="text" placeholder="ex: Almeida" class="form-control" name="txtSobrenome" required id="txtSobrenome" value="<?php echo $resultado[0]['sobrenome']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputEmail4" class="form-label">E-mail</label>
                          <input type="email" placeholder="example@gmail.com" class="form-control" name="txtEmail" required id="txtEmail" value="<?php echo $resultado[0]['email']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputSenha4" class="form-label">Senha</label>
                          <div style="float:right;"><label for="inputSenha4" class="form-label test">Exibir senha</label>
                            <input name="checkbox" id="checkbox" type="checkbox" aria-label="Checkbox for following text input">
                          </div>
                          <input type="password" minlength="6" maxlength="14" placeholder="De 6 a 14 dígitos" class="form-control" name="txtSenha" required id="txtSenha" value="<?php echo $resultado[0]['senha']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputCep4" class="form-label">CEP</label>
                          <input type="text" maxlength="9" class="form-control" name="txtCep" required id="txtCep" placeholder="13483-000" value="<?php echo $resultado[0]['cep']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputBairro4" class="form-label">Bairro</label>
                          <input type="text" placeholder="Preenchimento automático" readonly class="form-control" name="txtBairro" required id="txtBairro" value="<?php echo $resultado[0]['bairro']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputEndereco4" class="form-label">Endereço</label>
                          <input type="text" placeholder="Preenchimento automático" readonly class="form-control" name="txtEndereco" required id="txtEndereco" value="<?php echo $resultado[0]['endereco']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputNumCasa" class="form-label">Número da Casa</label>
                          <input type="text" placeholder="Ex: 404" minlength="1" maxlength="10" class="form-control" name="txtNum" required id="txtNum" value="<?php echo $resultado[0]['numero']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputCidade4" class="form-label">Cidade</label>
                          <input type="text" placeholder="Preenchimento automático" readonly class="form-control" name="txtCidade" required id="txtCidade" value="<?php echo $resultado[0]['cidade']; ?>">
                        </div>

                        <div class="txtLeft col-md-6">
                          <label for="inputState" class="form-label">Estado</label>
                          <input type="text" placeholder="Preenchimento automático" readonly class="form-control" name="txtEstado" required id="txtEstado" value="<?php echo $resultado[0]['estado']; ?>">
                        </div>

                        <div class="txtLeft text-center col-md-3">
                        </div>

                        <!-- forms do categoria-->

                        <div class="txtLeft col-md-6">
                          <label for="inputState" class="form-label">Categoria que você procura</label>
                          <select class="form-select" name="cboCategorias" id="cboCategorias" required value>
                            <option selected value="<?php echo $resultado[0]['preferencia']; ?>"><?php echo $resultado[0]['preferencia']; ?></option>
                            <option value="bonecas">Bonecas</option>
                            <option value="bonecos">Bonecos</option>
                            <option value="carrinhos">Carrinhos</option>
                            <option value="herois">Heróis</option>
                            <option value="jogos">Jogos</option>
                            <option value="princesas">Princesas</option>
                          </select>
                        </div>

                        <div class="txtLeft text-center col-md-3">
                        </div>

                        <div class="row">
                          <div class="col">
                            <br>
                          </div>
                        </div>

                        <div class="php-email-form text-center col-12">
                          <button type="submit" id="btnEditar" class="btn btn-dark">Editar</button>
                          <br>
                        </div>

                        <div class="textLeft col-12">
                          <a href="" id="aexcluir" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <p>Deseja excluir sua conta?</p>
                          </a>
                        </div>
                    </form>

                  </div>
                </center>

              </div>

            </div>
          </center>

        </section><!-- End Contact Section -->

      </main><!-- End #main -->


      <!-- ======= Excluir conta MODAL ======= -->
      <div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content text-center">
            <div class="modal-header">
              <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Realmente deseja excluir a sua conta?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Você precisará de um novo cadastro em compras futuras...
            </div>
            <div class="modal-footer">
              <div class="product text-center">
                <button type="button" class="btn btn-buy" data-bs-dismiss="modal">Cancelar</button>
                <button onclick="javascript:document.location='model/destroy.php?id=2'" type="button" class="btn btn-buy2">Excluir conta</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  End MODAL -=>



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