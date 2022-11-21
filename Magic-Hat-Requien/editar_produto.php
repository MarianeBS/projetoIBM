<?php
require_once("controller/controller.php");
require_once("model/banco.php");

class index
{

  private $cod_cli;
  private $logado;

  public function __construct()
  {
    session_start();

    if (isset($_SESSION['id_admin']) && $_SESSION['id_admin'] > 0) {
      $cod_admin = $_SESSION['id_admin'];
      $cod_prod = $_GET['id'];
      $logado = true;
      $controller = new controller();
      $produto = $controller->getProd($cod_prod);
      $banco = new Banco();
      $admin = $banco->getAdmin($cod_admin);
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
  <link href="img/MagicHat/icone.ico" rel="icon">
  <link href="img/MagicHat/icone.ico" rel="apple-touch-icon">
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
        <h1><img src="img/MagicHat/logo.png">
          <a href="index_gerente.php">Magic Hat</a></img>
        </h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto" href="index_gerente.php">Home</a></li>
            <li><a class="nav-link scrollto" href="cadastro_produto.php">Cadastrar produtos</a></li>
            <li><a class="nav-link scrollto" href="catalogo_editavel.php">Catálogo de produtos</a></li>
            <li class="dropdown">
              <a href="#">
                <span>
                  <ion-icon id="person" name="person"></ion-icon>
                </span> 
              </a>
              <ul>
                <li><a href="model/destroy.php?id=1">Sair da conta</a></li>
              </ul>
            </li>
        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <br><br>
    <section id="contact" class="contact">
      <center>
        <div class="container">
          <div class="section-title" data-aos="zoom-out">
            <p>Editar Produto</p>
            <h2>Edite os produtos em seu catálogo de brinquedos</h2>
          </div>

          <div class="row mt-5">
            <center>
              <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
                <form method="post" action="controller/controller.php?funcao=editarProd&id=<?php echo $produto[0]['id']; ?>" id="formEditProd" name="formEditProd" enctype="multipart/form-data">
                  <div class="row g-3">
                    <div class="txtLeft col-md-6">
                      <label for="inputNomeProd" class="form-label">Título do produto</label>
                      <input autofocus type="text" value="<?php echo $produto[0]['nome']; ?>" placeholder="ex: Casa dos Sonhos da Barbie" class="form-control" name="txtNomeProd" required id="txtNomeProd">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputCategoriaProd" class="form-label">Categoria</label>
                      <select class="form-select" name="cboCategoriaProd" id="cboCategoriaProd" required value>
                        <option value="<?php echo $produto[0]['categoria']; ?>" selected><?php echo $produto[0]['categoria']; ?></option>
                        <option value="Bonecas">Bonecas</option>
                        <option value="Bonecos">Bonecos</option>
                        <option value="Carrinhos">Carrinhos</option>
                        <option value="Heróis">Heróis</option>
                        <option value="Jogos">Jogos</option>
                        <option value="Princesas">Princesas</option>
                      </select>
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputPrimeiroTipo" class="form-label">Desenvolvimento primário</label>
                      <select class="form-select" name="cboPrimeiroTipo" id="cboPrimeiroTipo" required value>
                        <option selected value="<?php echo $produto[0]['tipo1']; ?>"><?php echo $produto[0]['tipo1']; ?></option>
                        <option value="Afetividade">Afetividade</option>
                        <option value="Aprendizado">Aprendizado</option>
                        <option value="Cognição">Cognição</option>
                        <option value="Coordenação Motora">Coordenação Motora</option>
                        <option value="Criatividade">Criatividade</option>
                        <option value="Ideias Divertidas">Ideias Divertidas</option>
                        <option value="Imaginação">Imaginação</option>
                        <option value="Raciocínio Lógico">Raciocínio Lógico</option>
                        <option value="Responsabilidade">Responsabilidade</option>
                      </select>
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputSegundoTipo" class="form-label">Desenvolvimento secundário</label>
                      <select class="form-select" name="cboSegundoTipo" id="cboSegundoTipo" required value>
                        <option selected value="<?php echo $produto[0]['tipo2']; ?>"><?php echo $produto[0]['tipo2']; ?></option>
                        <option value="Afetividade">Afetividade</option>
                        <option value="Aprendizado">Aprendizado</option>
                        <option value="Cognição">Cognição</option>
                        <option value="Coordenação Motora">Coordenação Motora</option>
                        <option value="Criatividade">Criatividade</option>
                        <option value="Ideias Divertidas">Ideias Divertidas</option>
                        <option value="Imaginação">Imaginação</option>
                        <option value="Raciocínio Lógico">Raciocínio Lógico</option>
                        <option value="Responsabilidade">Responsabilidade</option>
                      </select>
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputFaixaEt" class="form-label">Faixa etária</label>
                      <select class="form-select" name="cboFaixaEt" id="cboFaixaEt" required value>
                        <option selected value="<?php echo $produto[0]['faixa']; ?>"><?php echo $produto[0]['faixa']; ?></option>
                        <option value="Criança">Criança</option>
                        <option value="Pré-Adolescente">Pré-Adolescente</option>
                        <option value="Adolescente">Adolescente</option>
                      </select>
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputQuant" class="form-label">Quantidade</label>
                      <input autofocus type="number" value="<?php echo $produto[0]['quant']; ?>" placeholder="000" class="form-control" name="numberQuant" required id="numberQuant">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputMarca" class="form-label">Marca</label>
                      <input type="text" value="<?php echo $produto[0]['marca']; ?>" placeholder="ex: Estrela" class="form-control" name="txtMarca" required id="txtMarca">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputValor" class="form-label">Valor unitário</label>
                      <input type="number" value="<?php echo $produto[0]['preco']; ?>" class="form-control" step="0.01" name="txtValor" min="0.01" required id="txtValor">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputMaterial" class="form-label">Material/Composição</label>
                      <input type="text" value="<?php echo $produto[0]['material']; ?>" placeholder="ex: Plástico" class="form-control" name="txtMaterial" required id="txtMaterial">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputDescr" class="form-label">Descrição</label>
                      <input type="text" value="<?php echo $produto[0]['descricao']; ?>" placeholder="..." class="form-control" name="txtDescr" maxlength="170" required id="txtDescr">

                      <br>

                    </div>


                    <div class="txt-center col-md-12">
                      <h2>Requisitos necessários para o upload das imagens</h2>
                    </div>
                    <div class="txtLeft col-md-12">

                      <ul>
                        <li>
                          <div>
                            <p>
                              A extensão da imagem deverá ser .jpg;
                            </p>
                          </div>
                        </li>

                        <li>
                          <div>
                            <p>
                              O tamanho da imagem deve ser 400x400 pixels;
                            </p>
                          </div>
                        </li>

                        <li>
                          <div>
                            <p>
                              Se possível, utilize imagens de fundo branco;
                            </p>
                          </div>
                        </li>

                        <li>
                          <div>
                            <p>
                              Renomeie a imagem principal como "<?php echo preg_replace("/\D/","", $produto[0]['img1']); ?>.jpg".
                            </p>
                          </div>
                        </li>

                        <li>
                          <div>
                            <p>
                              Renomeie a segunda imagem como "<?php echo preg_replace("/\D/","", $produto[0]['img2']); ?>.jpg".
                            </p>
                          </div>
                        </li>

                        <li>
                          <div>
                            <p>
                              Renomeie a terceira imagem como "<?php echo preg_replace("/\D/","", $produto[0]['img3']); ?>.jpg".
                            </p>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <!-- ============================================================================================================= -->
                    <div class="form-group">
                      <label>Imagem Principal</label>
                      <input type="file" name="img1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Segunda Imagem</label>
                      <input type="file" name="img2" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Terceira Imagem</label>
                      <input type="file" name="img3" class="form-control">
                    </div>
                    <!-- ============================================================================================================= -->


                    <div class="row">
                      <div class="col">
                        <br>
                      </div>
                    </div>

                    <div class="php-email-form text-center col-12">
                      <button type="submit" id="btnCadastrar" name="submit" class="btn btn-dark">Cadastrar Produto</button>
                    </div>
                </form>

              </div>
            </center>
          </div>
        </div>
      </center>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->

  <br><br>

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
  <script src="js/inputFile.js"></script>


</body>

</html>
<?php
  }
}
new index();
?>