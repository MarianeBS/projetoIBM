<?php
require_once("controller/controller.php");

class finalizar
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
                            <li><a class="nav-link scrollto" href="faleconosco.php">Fale conosco</a></li>
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

                <br><br>
                <!-- ======= Pricing Section ======= -->
                <section id="pricing" class="pricing">
                    <div class="container">

                        <div class="section-title" data-aos="zoom-out">
                            <p>Carrinho</p>
                            <h2>Esses são os seus itens no carrinho</h2>
                            <h2>Para atualizar a quantidade de um produto, coloque a nova quantidade e clique em atualizar carrinho</h2>
                        </div>

                    </div>
                </section><!-- End Pricing Section -->



                <!-- ======= Portfolio Section ======= -->
                <section id="portfolio" class="portfolio">
                    <div class="container">

                        <div class="row portfolio-container pricing" data-aos="fade-up">
                            <div class="row">

                                <?php
                                    $controller = new controller();
                                    $carrinho = $controller->carrinho($cod_cli, 0, 1);
                                    if ($carrinho == 2) {
                                        echo "<script>alert('Você não possui nenhum item no seu carrinho de compras!');document.location='produtos.php';</script>";
                                    }
                                    for ($i = 0; $i < count($carrinho); $i++) {
                                        if ($logado != 0) {
                                            $qttd = "var btn = document.getElementById('btnValue" . $carrinho[$i]['id_produto'] . "').innerHTML.toString();";
                                            $script = "javascript:" . $qttd . "document.location='cart.php?produto=" . $carrinho[$i]['id_produto'] . "&qttd=' + btn + '&int'";
                                          }
                                ?>

                                <div class="col-lg-3 col-md-6 mt-4 mt-md-0 portfolio-item">
                                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                                        <h3 style="height: 105px;"><?php echo $carrinho[$i]['produto']; ?></h3>
                                        <div><img style="height: 250px; width: 250px;" src="<?php echo $carrinho[$i]['img']; ?>"></div>
                                        <h4><sup>R$</sup><?php echo $carrinho[$i]['preco']; ?></h4>
                                        <div>
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                            <button id="btnMenos" type="button" onclick="javascript:var btn = parseInt(document.getElementById('btnValue<?php echo $carrinho[$i]['id_produto']; ?>').innerHTML.toString()); if(btn > 1){document.getElementById('btnValue<?php echo $carrinho[$i]['id_produto']; ?>').innerHTML = btn - 1}" style="background-color: #ED4442; border-color: #ED4442;" class="btn btn-primary">-</button>
                                            <button id="btnValue<?php echo $carrinho[$i]['id_produto']; ?>" type="button" style="background-color: white; color:black; border-color: #ED4442;" class="btn btn-primary"><?php echo $carrinho[$i]['quant']; ?></button>
                                            <button id="btnMais" onclick="javascript:var btn = parseInt(document.getElementById('btnValue<?php echo $carrinho[$i]['id_produto']; ?>').innerHTML.toString()); if(btn < <?php echo $carrinho[$i]['quant_index']; ?>){document.getElementById('btnValue<?php echo $carrinho[$i]['id_produto']; ?>').innerHTML = btn + 1}" type="button" style="background-color: #ED4442; border-color: #ED4442;" class="btn btn-primary">+</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="btn-wrap" style="margin-top: -10px;">
                                            <button type="button" class="btn btn-buy btn-primary" style="border: 0px;"
                                            onclick="<?php echo $script; ?>">
                                            Atualizar carrinho
                                            </button>
                                        </div>
                                        <div class="btn-wrap" style="margin-top: -10px;">
                                            <button type="button" class="btn btn-buy btn-primary" style="border: 0px;"
                                            onclick="javascript:var result = confirm('Deseja retirar o produto do carrinho?'); if(result == true){document.location='cart.php?funcao=0&id=<?php echo $cod_cli; ?>&produto=<?php echo $carrinho[$i]['id_produto']; ?>'}">
                                            Excluir
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="row pricing">
                            <div class="col">
                                <form class="php-email-form">
                                    <div class="text-center">
                                            <button type="button" onclick="javascript: document.location='finalizar.php'" id="btnFinalizar" class="btn btn-buy php-email-form">Finalizar Compra</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        

                    </div>
                </section><!-- End Portfolio Section -->

                <br><br>

            </main><!-- End #main -->



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
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

            <!-- JQuery Files -->
            <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>

            <!-- Template Main JS File -->
            <script src="js/main.js"></script>

        </body>

        </html>
<?php
    }
}
new finalizar();
?>