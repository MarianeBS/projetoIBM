<?php
require_once("controller/controller.php");

class finalizar
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
                    <li><a class="nav-link scrollto" href="login.php">
                            <ion-icon name="person" style="width: 50px; height: 27px;"></ion-icon>
                        </a>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <br><br>
        <section class="cta" id="cta">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <h1>Carrinho</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Qttd.</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
            
                            <?php
                                $controller = new controller();
                                $carrinho = $controller->carrinho($cod_cli, 0, 1);

                                for($i=0; $i < count($carrinho); $i++){
                            ?> 

                                <tr>
                                    <th scope="col"><img style="height: 150px; width: 150px;" src="<?php echo $carrinho[$i]['img']; ?>"></th>
                                    <td scope="col"><?php echo $carrinho[$i]['produto']; ?></td>
                                    <td scope="col"><?php echo $carrinho[$i]['quant']; ?></td>
                                    <td scope="col"><?php echo $carrinho[$i]['preco']; ?></td>
                                    <td scope="col">
                                    <button style="margin-top: 1px;" type="button" class="btn btn-dark" onclick="javascript:var result = confirm('Deseja retirar o produto do carrinho?'); if(result == true){document.location='carrinho.php?funcao=0&id=<?php echo $cod_cli; ?>&produto=<?php echo $carrinho[$i]['id_produto']; ?>'}">X</button>
                                    </td>
                                </tr>     
                            <?php
                                }
                            ?>    
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div> 
        </section>    

        <!-- ======= Finalizar Compra ======= -->
        <section id="Finalizar">
            <div class="container text-center">

                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p>Endereço de Entrega</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Resumo da Compra
                        <p>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">
                                    Cartão
                                </a>
                            </div>
                            <div class="btn-wrap" style="margin-top: -10px;">
                                <a href="#" class="btn-buy">Detalhes</a>
                            </div>
                        </div>

                        <div>
                            <p>Endereço de Entrega</p>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Finalizar Compra -->

        <br><br>

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
                        A Magic Hat é uma loja virtual de brinquedos que visa atender seus clientes de forma rápida,
                        interativa, com qualidade em seu atendimento e produtos e, principalmente, com segurança.
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

    <!-- Template Main JS File -->
    <script src="js/main.js"></script>
    <script src="js/login.js"></script>

</body>

</html>
<?php
  }
}
new finalizar();
?>