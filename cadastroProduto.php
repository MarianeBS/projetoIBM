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
  <link href="css/inputFile.css" rel="stylesheet">
       
   

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
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="produtos.php">Brinquedos</a></li>
          <li><a class="nav-link scrollto" href="index.php#flipcard">Porque brincar</a></li>
          <li><a class="nav-link scrollto" href="faleconosco.html">Fale conosco</a></li>
          <li><a class="nav-link scrollto" href="login.html">
              <ion-icon name="person" style="width: 50px; height: 27px;"></ion-icon>
            </a>
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
            <p>Cadastro de Produtos</p>
            <h2>Cadastre produtos em seu catálogo de brinquedos</h2>
          </div>

          <div class="row mt-5">
            <center>
              <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
                <form method="post" action="" id="formCadProd" name="formCadProd">
                  <div class="row g-3">
                    <div class="txtLeft col-md-6">
                      <label for="inputNomeProd" class="form-label">Título do produto</label>
                      <input autofocus type="text" placeholder="ex: Casa dos Sonhos da Barbie" class="form-control" name="txtNomeProd" required
                        id="txtNomeProd">
                    </div>

                    <div class="txtLeft col-md-6">
                        <label for="inputCategoriaProd" class="form-label">Categoria</label>
                        <select class="form-select" name="cboCategoriaProd" id="cboCategoriaProd" required value>
                          <option selected disabled>Escolha...</option>
                          <option value="bonecas">Bonecas</option>
                          <option value="bonecos">Bonecos</option>
                          <option value="carrinhos">Carrinhos</option>
                          <option value="herois">Heróis</option>
                          <option value="jogos">Jogos</option>
                          <option value="princesas">Princesas</option>
                        </select>
                      </div>

                    <div class="txtLeft col-md-6">
                        <label for="inputPrimeiroTipo" class="form-label">Desenvolvimento primário</label>
                        <select class="form-select" name="cboPrimeiroTipo" id="cboPrimeiroTipo" required value>
                          <option selected disabled>Escolha...</option>
                          <option value="afetividade">Afetividade</option>
                          <option value="aprendizado">Aprendizado</option>
                          <option value="cognição">Cognição</option>
                          <option value="coordenacaoMotora">Coordenação Motora</option>
                          <option value="criatividade">Criatividade</option>
                          <option value="ideiasDivertidas">Ideias Divertidas</option>  
                          <option value="imaginacao">Imaginação</option>
                          <option value="raciocinioLogico">Raciocínio Lógico</option>
                          <option value="responsabilidade">Responsabilidade</option>
                        </select>
                      </div>

                      <div class="txtLeft col-md-6">
                        <label for="inputSegundoTipo" class="form-label">Desenvolvimento secundário</label>
                        <select class="form-select" name="cboSegundoTipo" id="cboSegundoTipo" required value>
                          <option selected disabled>Escolha...</option>
                          <option value="afetividade">Afetividade</option>
                          <option value="aprendizado">Aprendizado</option>
                          <option value="cognição">Cognição</option>
                          <option value="coordenacaoMotora">Coordenação Motora</option>
                          <option value="criatividade">Criatividade</option>
                          <option value="ideiasDivertidas">Ideias Divertidas</option>  
                          <option value="imaginacao">Imaginação</option>
                          <option value="raciocinioLogico">Raciocínio Lógico</option>
                          <option value="responsabilidade">Responsabilidade</option>
                        </select>
                      </div>

                      <div class="txtLeft col-md-6">
                        <label for="inputFaixaEt" class="form-label">Faixa etária</label>
                        <select class="form-select" name="cboFaixaEt" id="cboFaixaEt" required value>
                          <option selected disabled>Escolha...</option>
                          <option value="crianca">Criança</option>
                          <option value="preAdolescente">Pré-Adolescente</option>
                          <option value="adolescente">Adolescente</option>
                        </select>
                      </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputQuant" class="form-label">Quantidade</label>
                      <input autofocus type="number" placeholder="000" class="form-control" name="numberQuant"
                        required id="numberQuant">
                    </div>

                    <div class="txtLeft col-md-6">
                      <label for="inputMarca" class="form-label">Marca</label>
                      <input type="email" placeholder="ex: Estrela" class="form-control" name="txtMarca" required
                        id="txtMarca">
                    </div>

                    <div class="txtLeft col-md-6">
                        <label for="inputValor" class="form-label">Valor unitário</label>
                        <input type="number" class="form-control" step="0.01" name="quantity" min="0.01" required id="txtMarca">
                    </div>

                    <div class="txtLeft col-md-6">
                        <label for="inputMaterial" class="form-label">Material/Composição</label>
                        <input type="text" placeholder="ex: Plástico" class="form-control" name="txtMaterial" required
                          id="txtMaterial">
                    </div>

                    <div class="txtLeft col-md-6">
                        <label for="inputDescr" class="form-label">Descrição</label>
                        <input type="text" placeholder="..." class="form-control" name="txtDescr" maxlength="170" required
                          id="txtDescr">

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
                                  Renomeie a imagem principal como "nomeDoProduto1.jpg". EXEMPLO: casaDeBonecas1.jpg; 
                              </p>
                          </div>
                      </li>

                      <li>
                          <div>
                              <p>
                                  Renomeie a segunda imagem como "nomeDoProduto2.jpg". EXEMPLO: casaDeBonecas2.jpg; 
                              </p>
                          </div>
                      </li>

                      <li>
                          <div>
                              <p>
                                  Renomeie a terceira imagem como "nomeDoProduto3.jpg". EXEMPLO: casaDeBonecas3.jpg. 
                              </p>
                          </div>
                      </li>
                    </ul>
                </div>

                    <div class="txt-center col-md-12">
                        <label for="inputPictureOne" class="form-label">Adicione a imagem principal do produto</label>
                        <br>
                        <label class="picture" tabindex="0">
                            <input type="file" accept="image/jpg" class="picture__input">
                            <span class="picture__image">Escolha uma imagem</span>
                        </label>
                        <?php
                          if(isset($_FILES['image'])){
                            $errors = array();
                            $file_name= $_FILES['image']['name'];
                            $file_size= $_FILES['image']['size'];
                            $file_tmp = $_FILES['image']['tmp_name'];
                            $file_type= $_FILES['image']['type'];

                            $file_ext =explode(".",  $_FILES['image']['name']);
                            $file_ext =strtolower(array_pop($file_ext));
                            
                            $expensions = array("jpg");

                            if(in_array($file_ext,$expensions)=== false){
                              $errors[]="<br>Extensão não permitida, escolha um arquivo JPG..";
                            }
                            if($file_size>2097152){
                              $errors[]='<br>O tamanho do arquivo deve ser exatamente 2 MB';
                            }
                            if(empty($errors)==true){
                              move_uploaded_file($file_tmp,"img/".$file_name);
                              echo "<h6><br>Imagem importada com sucesso</h6>";
                            }else{
                              print_r($errors);
                            }
                          }
									      ?>
                        <br>
                    </div>
                    
                    <div class="txt-center col-md-6">
                        <label for="inputPictureOne" class="form-label">Adicione a segunda imagem do produto</label>
                        <br>
                        <label class="picture" tabindex="0">
                            <input type="file" accept="image/jpg" class="picture__input">
                            <span class="picture__image">Escolha uma imagem</span>
                        </label>
                        <?php
                          if(isset($_FILES['image'])){
                            $errors = array();
                            $file_name= $_FILES['image']['name'];
                            $file_size= $_FILES['image']['size'];
                            $file_tmp = $_FILES['image']['tmp_name'];
                            $file_type= $_FILES['image']['type'];

                            $file_ext =explode(".",  $_FILES['image']['name']);
                            $file_ext =strtolower(array_pop($file_ext));
                            
                            $expensions = array("jpg");

                            if(in_array($file_ext,$expensions)=== false){
                              $errors[]="<br>Extensão não permitida, escolha um arquivo JPG..";
                            }
                            if($file_size>39000){
                              $errors[]='<br>O tamanho do arquivo deve ser exatamente 0,04 MB';
                            }
                            if(empty($errors)==true){
                              move_uploaded_file($file_tmp,"img/".$file_name);
                              echo "<h6><br>Imagem importada com sucesso</h6>";
                            }else{
                              print_r($errors);
                            }
                          }
									      ?>
                        <br>
                    </div>
                    
                    <div class="txt-center col-md-6">
                        <label for="inputPictureOne" class="form-label">Adicione a terceira imagem do produto</label>
                        <br>
                        <label class="picture" tabindex="0">
                            <input type="file" accept="image/jpg" class="picture__input">
                            <span class="picture__image">Escolha uma imagem</span>
                        </label>
                        <?php
                          if(isset($_FILES['image'])){
                            $errors = array();
                            $file_name= $_FILES['image']['name'];
                            $file_size= $_FILES['image']['size'];
                            $file_tmp = $_FILES['image']['tmp_name'];
                            $file_type= $_FILES['image']['type'];

                            $file_ext =explode(".",  $_FILES['image']['name']);
                            $file_ext =strtolower(array_pop($file_ext));
                            
                            $expensions = array("jpg");

                            if(in_array($file_ext,$expensions)=== false){
                              $errors[]="<br>Extensão não permitida, escolha um arquivo JPG..";
                            }
                            if($file_size>2097152){
                              $errors[]='<br>O tamanho do arquivo deve ser exatamente 2 MB';
                            }
                            if(empty($errors)==true){
                              move_uploaded_file($file_tmp,"img/".$file_name);
                              echo "<h6><br>Imagem importada com sucesso</h6>";
                            }else{
                              print_r($errors);
                            }
                          }
									      ?>
                        <br>
                    </div>
                    
                    <div class="row">
                      <div class="col">
                        <br>
                      </div>
                    </div>

                    <div class="php-email-form text-center col-12">
                      <button type="submit" id="btnCadastrar" class="btn btn-dark">Cadastrar Produto</button>
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
  <script src="js/inputFile.js"></script> 


</body>

</html>