<?php
  session_set_cookie_params(3600*24*30,"/");
  session_start();
  if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
  {
    echo 
    "
    "
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>J&L Produtos Naturais</title>
        <link rel="stylesheet" href="Css/style-1.css">
        <link rel="stylesheet" href="Css/style-2.css">
        <link rel="stylesheet" href="Css/style-3.css">
        <link rel="stylesheet" href="Css/style-4.css">
        <link rel="stylesheet" href="Css/style-5.css">
        <link rel="stylesheet" href="Css/style-6.css">
        <link rel="stylesheet" href="Css/style-7.css">
        <link rel="stylesheet" href="Css/style-19.css">
        <link rel="stylesheet" href="Css/style-22.css">
        <link rel="icon" href="Image/icon.PNG">
        <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
      <div class="Parallax"></div>
      <nav class="navbar navbar-expand-lg navbar-light new-color">
            <a class="navbar-brand" href="#"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="icon" id="Icon-Navegador"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="new-font-style" href="#section1">Temperos</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section2">Castanhas</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section3">Rapaduras</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section4">Farinhas</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section5">Vinagres</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section6">Pilões</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section7">Colheres</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section8">Chás</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section9">Garrafadas</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section10">Cápsulas</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section11">Queijo</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section12">Panelas de Barros</a>
                </li>
                <li class="nav-item">
                  <a class="new-font-style" href="#section13">Panela de Ferro</a>
                </li>
              </ul>
            </div>
      </nav>
      <br>
      <br>
      <br>
      <?php
        if($_SESSION['Administrador']['status'])
        {
          echo '<div class="identify-acess">';
          echo "<p>Esta Logado Como Administrador</p>";
          echo "<p><a href='Qu@ntumSecur1ty_2X5pA.php' class='redirect-adm'><button>Painel de Administração</button></a></p>";
          echo "</div>";
        }
        else
        {
          session_destroy();
        }
      ?>
      <br>
      <br>
      <br>
      <div class="Apresentation">
          <p>
            J&L Produtos Naturais
          </p>
      </div>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Item">
            <div class="text">
              <p>
              <?php
                  require_once("PHP/Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
                  require_once("PHP/Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
                  require_once("PHP/MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
                  require_once("PHP/select_from/select_index.php");
                  $Database = DatabaseConneting_Params();
                  $CreateFunctions = CreateFunctions();
                  $tabelas_mensagem = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[0];
                  $coluna = [];
                  $null = [];
                  $mensagem = SelectFrom::AutoIntance($tabelas_mensagem,$Database)->__getAllDados();
                  if(is_array($mensagem))
                  {
                    $newDados = [];
                    foreach($mensagem as $dados)
                    {
                      foreach($dados as $keys => $values)
                      {
                        if($keys == 'mensagem')
                        {
                          array_push($newDados,$values);
                        }
                      }
                    }
                    echo htmlspecialchars(end($newDados));
                  }
                ?>
              </p>
            </div>
          </div>
      </div>
      <br>
      <br>
      <br>
      <div class="Apresentation">
          <p>
            O que Temos:
          </p>
      </div>
      <div id="carouselExample" class="carousel slide position">
          <div class="carousel-inner">
            <?php
              $tabela_carrousel = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[1];
              $carroussel = SelectFrom::AutoIntance($tabela_carrousel,$Database)->__getAllDados();
              if(is_array($carroussel))
              {
                $count = count($carroussel);
                if($count > 0)
                {
                  echo 
                  '
                  <div class="carousel-item active">
                    <img src="Image-From-To-o-que-temos/'.htmlspecialchars($carroussel[0]['image_carrousel']).'" class="d-block w-100 Size" alt="...">
                  </div>
                  ';
                  for($i = 1; $i < $count; $i++)
                  {
                    echo 
                    '
                    <div class="carousel-item">
                      <img src="Image-From-To-o-que-temos/'.htmlspecialchars($carroussel[$i]['image_carrousel']).'" class="d-block w-100 Size" alt="...">
                    </div>
                    ';
                  }
                }
                else
                if($count <= 0)
                {
                  echo "Nenhuma Imagem Postada";
                }
              }
              else
              {
              echo "Nenhuma";
              }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
      </div>
      <br>
      <br>
      <br>
      <?php
        $tabela = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[4];
        $telefones = SelectFrom::AutoIntance($tabela,$Database)->__getAllDados();
        if(is_array($telefones))
        {
            $telefone = [];
            foreach($telefones as $Dados)
            {
            foreach($Dados as $keys => $values)
            {
                if($keys == 'telefone')
                {
                    array_push($telefone,$values);
                }
            }  
            }
            $telefone_end = htmlspecialchars(end($telefone));
        }
      ?>
      <section class="section-nav" id="section1">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> TEMPEROS </div>
          </div>
      </section>
      <div class="Container-Div-Style" id="FromAdmForUser">
        <div class="Itens-View" id="Temperos">
          <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Temperos')
                {
                  echo
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
        </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section2">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> CASTANHAS </div>
          </div>
      </section>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Castanhas">
            <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Castanhas')
                  {
                    echo 
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section3">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> RAPADURAS </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Rapaduras">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Rapaduras')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section4">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> FARINHAS </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Farinhas">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Farinhas')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section5">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> VINAGRES </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Vinagres">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Vinagres')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section6">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> PILÕES </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Pilões">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Pilões')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section7">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> COLHERES </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Colheres">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Colheres')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section8">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> CHÁS </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Chas">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Chas')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section9">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> GARRAFADAS </div>
          </div>
      </section>
      <br>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Garrafadas">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Garrafadas')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section10">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> CÁPSULAS </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Capsulas">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Capsulas')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section11">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> QUEIJOS </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Queijos">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Queijo')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section12">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> PANELAS DE BARRO </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Panelas_De_Barro">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Panelas_de_Barros')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br>
      <br>
      <section class="section-nav" id="section13">
          <div class="background-style">
            <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
            <div class="link-nav"> PANELAS DE FERRO </div>
          </div>
      </section>
      <br>
      <br>
      <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Panelas_De_Ferro">
            <?php
            $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
            $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
            if(is_array($posts))
            {
              foreach($posts as $dados)
              {
                if($dados['categoria'] == 'Panela_de_Ferro')
                {
                  echo
                   
                  '
                    <div class="PostView">
                      <fieldset class="container-Post-View">
                        <legend class="title-Post-View">
                          '.htmlspecialchars($dados['titulo']).'
                        </legend>
                        <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                        <div class="Button-Redirect">
                          <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                        </div>
                      </fieldset>
                    </div>
                  ';
                }
              }
            }
            else
            {
              echo htmlspecialchars($posts);
            }
          ?>
          </div>
      </div>
      <br>
      <br><br>
      <div class="Apresentation">
          <p>
            Notificações
          </p>
      </div>
      <br><br>
      <div class="Container-Div-Style" id="FromAdmForUser">
        <div class="icon-Animation" id="Bells-notificacion">
          <div class="container-icone-bells"><i class="fa-solid fa-bell"></i></div>
            <div class="Text-LinkButton">
              <div class="Container-Text-LinkButton">
                <div class="text-question-for-User"><p>Deseja Receber Notificações do J&L Produtos Naturais ?</p></div>
                <div class="Link-Button-Notificação">
                  <a href="#" id="Button-Cadastrar-Email">
                    <button>
                      Receber Notificações do J&L Produtos Naturais
                    </button>
                  </a>
                </div>
              </div>
            </div>
        </div>
      </div>
      <br><br>
      <div class="Apresentation">
          <p>
            FIM
          </p>
      </div>
      <br><br>
      <?php
        $tabela_instagram = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[5];
        $instagram = SelectFrom::AutoIntance($tabela_instagram,$Database)->__getAllDados();
        if(is_array($instagram))
        {
          $insta = null;
          foreach($instagram as $instagramDados)
          {
            foreach($instagramDados as $keys => $values)
            {
              $insta = $values;
            }
          }
          for($i = 0; $i <= 10; $i++)
          {
            $insta = base64_decode($insta);
          }
        }
      ?>
      <input type="hidden" value="<?php echo $telefone_end;?>" id="InputsNot" readonly>
      <footer class="rodape">
          <div class="Informacoes-Rodape">
            <div class="Informacao-Text">
              <p><b><h3>J&L Produtos Naturais</h3></b></p>
              <p>🌿 Bem-vindo à J&L Produtos Naturais 🌿</p>
              <p>Descubra o poder dos produtos naturais para uma vida mais saudável e equilibrada! Explore nossa seleção de itens cuidadosamente selecionados para você.</p>
              <div>📞 Contato: <div id="id-Contato"></div></div>
              <p>📣 Ficou interessado em algum produto? Entre em contato diretamente com o Dono da Loja pelo WhatsApp! 👇</p>
              <div>📲 WhatsApp: <div id="id-Whatsapp"></div></div>
              <p>📣 Acompanhe as novidades, promoções e dicas de bem-estar! ✨ Siga-nos e participe da nossa comunidade.</p>
              <p>📸 Siga-nos no Instagram: <a href="<?php echo $insta;?>" target="_blank">jlartesanatosprodutosnaturais</a></p>
              </p>
              <p>Estamos aqui para ajudar e proporcionar uma experiência de compra personalizada. Sinta-se à vontade para enviar suas dúvidas, sugestões ou fazer seu pedido diretamente pelo WhatsApp.</p>
              <p>Agradecemos por escolher produtos naturais para o seu bem-estar! 🌱✨</p>
            </div>
      </footer>
      <div class="overlay-PopUp" id="Notificacion-Overlay"></div>
      <div class="transition-PopUp" id="Notificacion-Transition">
        <div class="modal-PopUp" id="Notificacion-Modal">
          <fieldset class="PopUp-Notificacion">
            <legend class="PopUp-Notificacion-Title">
              J&L Produtos Naturais
            </legend>
            <form method="POST" action="PHP/emails-usuarios/emails-usuarios.php" class="Form-PopUp-Notificacion">
              <div class="title-container-PopUp">
                <h4>
                  <b>
                    Insira sua Informações Abaixo:
                  </b>
                </h4>
              </div>
              <br>
              <br>
              <div class="Inputs">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="nome" placeholder="Insira seu Nome" id="Nome-notificacion" class="input">
              </div>
              <div id="Nome-Mensagem" style="display: none;"></div>
              <br>
              <br>
              <div class="Inputs">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="email" placeholder="Insira seu E-mail" id="Email-notificacion" class="input">
              </div>
              <div id="Email-Mensagem" style="display: none;"></div>
              <div class="Btn-Container-Notificacion">
                <a href="#" id="fechar-PopUp-Notificacion">
                  <button>
                    Cancelar
                  </button>
                </a>
                <input type="submit" value="Enviar Dados" id="submit-notificacion">
              </div>
            </form>
          </fieldset>
        </div>
      </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="JavaScript/Notificacion-For-User.js"></script>
    <script src="JavaScript/Php-Js-Mask-Number.js"></script>
    <script src="JavaScript/Protected-Dados-user.js"></script>
    </html>
    <?php
    "
    ";
  }
  else
  {
    echo 
    "
    "
    ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>J&L Produtos Naturais</title>
          <link rel="stylesheet" href="Css/style-1.css">
          <link rel="stylesheet" href="Css/style-2.css">
          <link rel="stylesheet" href="Css/style-3.css">
          <link rel="stylesheet" href="Css/style-4.css">
          <link rel="stylesheet" href="Css/style-5.css">
          <link rel="stylesheet" href="Css/style-6.css">
          <link rel="stylesheet" href="Css/style-7.css">
          <link rel="stylesheet" href="Css/style-19.css">
          <link rel="icon" href="Image/icon.PNG">
          <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      </head>
      <body>
        <div class="Parallax"></div>
        <nav class="navbar navbar-expand-lg navbar-light new-color">
              <a class="navbar-brand" href="#"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="icon" id="Icon-Navegador"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="new-font-style" href="#section1">Temperos</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section2">Castanhas</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section3">Rapaduras</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section4">Farinhas</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section5">Vinagres</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section6">Pilões</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section7">Colheres</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section8">Chás</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section9">Garrafadas</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section10">Cápsulas</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section11">Queijo</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section12">Panelas de Barros</a>
                  </li>
                  <li class="nav-item">
                    <a class="new-font-style" href="#section13">Panela de Ferro</a>
                  </li>
                </ul>
              </div>
        </nav>
        <br>
        <br>
        <br>
        <div class="Apresentation">
            <p>
              J&L Produtos Naturais
            </p>
        </div>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Item">
              <div class="text">
                <p>
                <?php
                    require_once("PHP/Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
                    require_once("PHP/Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
                    require_once("PHP/MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
                    require_once("PHP/select_from/select_index.php");
                    $Database = DatabaseConneting_Params();
                    $CreateFunctions = CreateFunctions();
                    $tabelas_mensagem = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[0];
                    $coluna = [];
                    $null = [];
                    $mensagem = SelectFrom::AutoIntance($tabelas_mensagem,$Database)->__getAllDados();
                    if(is_array($mensagem))
                    {
                      $newDados = [];
                      foreach($mensagem as $dados)
                      {
                        foreach($dados as $keys => $values)
                        {
                          if($keys == 'mensagem')
                          {
                            array_push($newDados,$values);
                          }
                        }
                      }
                      echo htmlspecialchars(end($newDados));
                    }
                  ?>
                </p>
              </div>
            </div>
        </div>
        <?php
          $tabela = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[4];
          $telefones = SelectFrom::AutoIntance($tabela,$Database)->__getAllDados();
          if(is_array($telefones))
          {
              $telefone = [];
              foreach($telefones as $Dados)
              {
              foreach($Dados as $keys => $values)
              {
                  if($keys == 'telefone')
                  {
                      array_push($telefone,$values);
                  }
              }  
              }
              $telefone_end = htmlspecialchars(end($telefone));
          }
        ?>
        <br>
        <br>
        <br>
        <div class="Apresentation">
            <p>
              O que Temos:
            </p>
        </div>
        <div id="carouselExample" class="carousel slide position">
            <div class="carousel-inner">
              <?php
                $tabela_carrousel = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[1];
                $carroussel = SelectFrom::AutoIntance($tabela_carrousel,$Database)->__getAllDados();
                if(is_array($carroussel))
                {
                  $count = count($carroussel);
                  if($count > 0)
                  {
                    echo 
                    '
                    <div class="carousel-item active">
                      <img src="Image-From-To-o-que-temos/'.htmlspecialchars($carroussel[0]['image_carrousel']).'" class="d-block w-100 Size" alt="...">
                    </div>
                    ';
                    for($i = 1; $i < $count; $i++)
                    {
                      echo 
                      '
                      <div class="carousel-item">
                        <img src="Image-From-To-o-que-temos/'.htmlspecialchars($carroussel[$i]['image_carrousel']).'" class="d-block w-100 Size" alt="...">
                      </div>
                      ';
                    }
                  }
                  else
                  if($count <= 0)
                  {
                    echo "Nenhuma Imagem Inserida";
                  }
                }
                else
                {
                echo htmlspecialchars($carroussel);
                }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section1">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> TEMPEROS </div>
            </div>
        </section>
        <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="Itens-View" id="Temperos">
            <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Temperos')
                  {
                    echo
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
          </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section2">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> CASTANHAS </div>
            </div>
        </section>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Castanhas">
              <?php
                $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
                $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
                if(is_array($posts))
                {
                  foreach($posts as $dados)
                  {
                    if($dados['categoria'] == 'Castanhas')
                    {
                      echo 
                      '
                        <div class="PostView">
                          <fieldset class="container-Post-View">
                            <legend class="title-Post-View">
                              '.htmlspecialchars($dados['titulo']).'
                            </legend>
                            <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                            <div class="Button-Redirect">
                              <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                            </div>
                          </fieldset>
                        </div>
                      ';
                    }
                  }
                }
                else
                {
                  echo htmlspecialchars($posts);
                }
              ?>
              
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section3">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> RAPADURAS </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Rapaduras">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Rapaduras')
                  {
                    echo
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section4">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> FARINHAS </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Farinhas">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Farinhas')
                  {
                    echo
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section5">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> VINAGRES </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Vinagres">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Vinagres')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section6">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> PILÕES </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Pilões">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Pilões')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section7">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> COLHERES </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Colheres">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Colheres')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section8">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> CHÁS </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Chas">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Chas')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section9">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> GARRAFADAS </div>
            </div>
        </section>
        <br>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Garrafadas">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Garrafadas')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section10">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> CÁPSULAS </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Capsulas">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Capsulas')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section11">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> QUEIJOS </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Queijos">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Queijo')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section12">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> PANELAS DE BARRO </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Panelas_De_Barro">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Panelas_de_Barros')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="section-nav" id="section13">
            <div class="background-style">
              <div class="icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
              <div class="link-nav"> PANELAS DE FERRO </div>
            </div>
        </section>
        <br>
        <br>
        <div class="Container-Div-Style" id="FromAdmForUser">
            <div class="Itens-View" id="Panelas_De_Ferro">
              <?php
              $tabela_posts = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[2];
              $posts = SelectFrom::AutoIntance($tabela_posts,$Database)->__getAllDados();
              if(is_array($posts))
              {
                foreach($posts as $dados)
                {
                  if($dados['categoria'] == 'Panela_de_Ferro')
                  {
                    echo
                     
                    '
                      <div class="PostView">
                        <fieldset class="container-Post-View">
                          <legend class="title-Post-View">
                            '.htmlspecialchars($dados['titulo']).'
                          </legend>
                          <img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'" alt="" class="Post-Size">
                          <div class="Button-Redirect">
                            <a href="https://api.whatsapp.com/send?phone='.$telefone_end.'&text=Olá%20gostaria%20de%20saber%20mais%20sobre%20'.$dados['titulo'].'%20Estou%20interessado(a)%20e%20gostaria%20de%20obter%20mais%20informações%20sobre%20este%20produto.%20Pode%20me%20fornecer%20detalhes%20sobre%20os%20benefícios,%20preço%20e%20qualquer%20outra%20informação%20relevante?" target="_blank"><button> mais informações sobre </button></a>
                          </div>
                        </fieldset>
                      </div>
                    ';
                  }
                }
              }
              else
              {
                echo htmlspecialchars($posts);
              }
            ?>
            </div>
        </div>
        <br>
        <br><br>
        <div class="Apresentation">
            <p>
              Notificações
            </p>
        </div>
        <br><br>
        <div class="Container-Div-Style" id="FromAdmForUser">
          <div class="icon-Animation" id="Bells-notificacion">
            <div class="container-icone-bells"><i class="fa-solid fa-bell"></i></div>
              <div class="Text-LinkButton">
                <div class="Container-Text-LinkButton">
                  <div class="text-question-for-User"><p>Deseja Receber Notificações do J&L Produtos Naturais ?</p></div>
                  <div class="Link-Button-Notificação">
                    <a href="#" id="Button-Cadastrar-Email">
                      <button>
                        Receber Notificações do J&L Produtos Naturais
                      </button>
                    </a>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <br><br>
        <div class="Apresentation">
            <p>
              FIM
            </p>
        </div>
        <br><br>
        
        <?php
          $tabela_instagram = CreateTables::iniciar($CreateFunctions,$Database)->__getCreateTablesResult()[5];
          $instagram = SelectFrom::AutoIntance($tabela_instagram,$Database)->__getAllDados();
          if(is_array($instagram))
          {
            $insta = null;
            foreach($instagram as $instagramDados)
            {
              foreach($instagramDados as $keys => $values)
              {
                $insta = $values;
              }
            }
            for($i = 0; $i <= 10; $i++)
            {
              $insta = base64_decode($insta);
            }
          }
        ?>
        <input type="hidden" value="<?php echo $telefone_end;?>" id="InputsNot" readonly>
        <footer class="rodape">
            <div class="Informacoes-Rodape">
              <div class="Informacao-Text">
                <p><b><h3>J&L Produtos Naturais</h3></b></p>
                <p>🌿 Bem-vindo à J&L Produtos Naturais 🌿</p>
                <p>Descubra o poder dos produtos naturais para uma vida mais saudável e equilibrada! Explore nossa seleção de itens cuidadosamente selecionados para você.</p>
                <div>📞 Contato: <div id="id-Contato"></div></div>
                <p>📣 Ficou interessado em algum produto? Entre em contato diretamente com o Dono da Loja pelo WhatsApp! 👇</p>
                <div>📲 WhatsApp: <div id="id-Whatsapp"></div></div>
                <p>📣 Acompanhe as novidades, promoções e dicas de bem-estar! ✨ Siga-nos e participe da nossa comunidade.</p>
                <p>📸 Siga-nos no Instagram: <a href="<?php echo $insta;?>" target="_blank">jlartesanatosprodutosnaturais</a></p>
                </p>
                <p>Estamos aqui para ajudar e proporcionar uma experiência de compra personalizada. Sinta-se à vontade para enviar suas dúvidas, sugestões ou fazer seu pedido diretamente pelo WhatsApp.</p>
                <p>Agradecemos por escolher produtos naturais para o seu bem-estar! 🌱✨</p>
              </div>
        </footer>
        <div class="overlay-PopUp" id="Notificacion-Overlay"></div>
        <div class="transition-PopUp" id="Notificacion-Transition">
          <div class="modal-PopUp" id="Notificacion-Modal">
            <fieldset class="PopUp-Notificacion">
              <legend class="PopUp-Notificacion-Title">
                J&L Produtos Naturais
              </legend>
              <form method="POST" action="PHP/emails-usuarios/emails-usuarios.php" class="Form-PopUp-Notificacion">
                <div class="title-container-PopUp">
                  <h4>
                    <b>
                      Insira sua Informações Abaixo:
                    </b>
                  </h4>
                </div>
                <br>
                <br>
                <div class="Inputs">
                  <i class="fa-solid fa-user"></i>
                  <input type="text" name="nome" placeholder="Insira seu Nome" id="Nome-notificacion" class="input">
                </div>
                <div id="Nome-Mensagem" style="display: none;"></div>
                <br>
                <br>
                <div class="Inputs">
                  <i class="fa-solid fa-envelope"></i>
                  <input type="text" name="email" placeholder="Insira seu E-mail" id="Email-notificacion" class="input">
                </div>
                <div id="Email-Mensagem" style="display: none;"></div>
                <div class="Btn-Container-Notificacion">
                  <a href="#" id="fechar-PopUp-Notificacion">
                    <button>
                      Cancelar
                    </button>
                  </a>
                  <input type="submit" value="Enviar Dados" id="submit-notificacion">
                </div>
              </form>
            </fieldset>
          </div>
        </div>
      </body>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="JavaScript/Notificacion-For-User.js"></script>
      <script src="JavaScript/Php-Js-Mask-Number.js"></script>
      <script src="JavaScript/Protected-Dados-user.js"></script>
      </html>
    <?php
    "
    ";
  }
?>