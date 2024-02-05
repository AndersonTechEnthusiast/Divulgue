<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {
        require_once("PHP/Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
        require_once("PHP/Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
        require_once("PHP/MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
        require_once("PHP/select_from/select_index.php");
        $create_functions = CreateFunctions();
        $database = DatabaseConneting_Params();
        echo 
        "
        "
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Administrador</title>
                <link rel="stylesheet" href="Css/style-1.css">
                <link rel="stylesheet" href="Css/style-2.css">
                <link rel="stylesheet" href="Css/style-8.css">
                <link rel="stylesheet" href="Css/style-9.css">
                <link rel="stylesheet" href="Css/style-10.css">
                <link rel="stylesheet" href="Css/style-11.css">
                <link rel="stylesheet" href="Css/style-12.css">
                <link rel="stylesheet" href="Css/style-14.css">
                <link rel="stylesheet" href="Css/style-18.css">
                <link rel="stylesheet" href="Css/style-21.css">
                <link rel="stylesheet" href="Css/style-22.css">
                <link rel="icon" href="Image/icon.PNG">
                <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            </head>
            <body>
                <section class="Parallax"></section>
                <nav class="navbar navbar-expand-lg navbar-light new-color">
                    <a class="navbar-brand" href="#"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="icon" id="Icon-Navegador"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                        <a class="new-font-style" href="Ver-Postagens-Adm.php">Ver Minhas Postagens</a>
                        </li>
                        <li class="nav-item">
                        <a class="new-font-style" href="PHP/Create-Tables-for-Administrador/Create-Tables-for-Administrador.php">Criar Tabelas</a>
                        </li>
                        <li class="nav-item">
                        <a class="new-font-style" href="PHP/Drop_Tables/Drop_Tables.php"> Deletar Tabelas do Banco de Dados</a>
                        </li>
                    </ul>
                    </div>
                </nav>
                <br>
                <br>
                <?php
                    if($_SESSION['Administrador']['status'])
                    {
                    echo '<div class="identify-acess">';
                    echo "<p>Bem - Vindo Administrador</p>";
                    echo "<p><a href='index.php' class='redirect-adm'><button>Pagina do Usuario</button></a></p>";
                    echo "</div>";
                    }
                    else
                    {
                    session_destroy();
                    }
                ?>
                <br>
                <br>
                <div class="Apresentation">
                    <p>
                    Mensagem para o Usuario:
                    </p>
                </div>
                <br>
                <br>
                <div class="Container-Div-Style">
                    <form method="POST" action="PHP/Mensagem_pro_usuario/Mensagem_pro_usuario.php" class="Form-MensageForUser">
                        <fieldset class="MensageForUser-Container">
                            <legend class="title-Mensage">
                                <div class="icon-Adm">
                                    <div class="Txt-Text-Adm">
                                        J&L Produtos Naturais - Mensagem de Apresentação para o Usuario
                                    </div>
                                </div>
                            </legend>
                            <textarea class="Container-Text-ForUser" placeholder="Insira Aqui uma Mensagem para o Usuario que Entrar no J&L Produtos Naturais" name="mensagem"></textarea>
                        </fieldset>
                        <input type="submit" value="Enviar/Atualizar">
                    </form>
                </div>
                <br>
                <br>
                <div class="Apresentation">
                    <p>
                    Quantidade de Postagens
                    </p>
                </div>
                <br>
                <br>
                <?php
                    $temperos = [];
                    $castanhas = [];
                    $rapaduras = [];
                    $farinhas = [];
                    $vinagres = [];
                    $piloes = [];
                    $colheres = [];
                    $chás = [];
                    $garrafadas = [];
                    $cápsulas = [];
                    $queijos = [];
                    $panela_de_barro = [];
                    $panela_de_ferro = [];
                    $tabelas_postagens = CreateTables::iniciar($create_functions,$database)->__getCreateTablesResult()[2];
                    $postagens = SelectFrom::AutoIntance($tabelas_postagens,$database)->__getAllDados();
                    if(is_array($postagens))
                    {
                        foreach($postagens as $Dados)
                        {
                            if($Dados['categoria'] == 'Temperos')
                            {
                                array_push($temperos,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Castanhas')
                            {
                                array_push($castanhas,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Rapaduras')
                            {
                                array_push($rapaduras,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Farinhas')
                            {
                                array_push($farinhas,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Vinagres')
                            {
                                array_push($vinagres,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Pilões')
                            {
                                array_push($piloes,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Colheres')
                            {
                                array_push($colheres,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Chas')
                            {
                                array_push($chás,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Garrafadas')
                            {
                                array_push($garrafadas,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Capsulas')
                            {
                                array_push($cápsulas,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Queijo')
                            {
                                array_push($queijos,$Dados);
                            }
                            else
                            if($Dados['categoria'] == 'Panelas_de_Barros')
                            {
                                array_push($panela_de_barro,$Dados);
                            }
                            if($Dados['categoria'] == 'Panela_de_Ferro')
                            {
                                array_push($panela_de_ferro,$Dados);
                            }
                        }
                    }
                    else
                    {
                        echo $postagens;
                    }
                ?>
                <div class="Container-Div-Style">
                    <div class="Container-Posts-Numbers">
                        <a href="#" class="Link-Actived-Translex" id="Link-Temperos"><div class="Container-Actived-Translex" id="Temperos">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Temperos
                                    </b>
                                </div>
                            </div>
                            <div class="Translex-Container-Height" id="Translex_Temperos">
                                <?php echo count($temperos)." Postagens";?>
                            </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Castanhas"><div class="Container-Actived-Translex" id="Castanhas">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Castanhas
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Castanhas">
                                    <?php echo count($castanhas)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Rapaduras"><div class="Container-Actived-Translex" id="Rapaduras">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Rapaduras
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Rapaduras">
                                    <?php echo count($rapaduras)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Farinhas"><div class="Container-Actived-Translex" id="Farinhas">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Farinhas
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Farinhas">
                                    <?php echo count($farinhas)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Vinagres"><div class="Container-Actived-Translex" id="Vinagres">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Vinagres
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Vinagres">
                                    <?php echo count($vinagres)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Pilões"><div class="Container-Actived-Translex" id="Pilões">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Pilões
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Pilões">
                                    <?php echo count($piloes)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Colheres"><div class="Container-Actived-Translex" id="Colheres">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Colheres
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Colheres">
                                    <?php echo count($colheres)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Chás"><div class="Container-Actived-Translex" id="Chás">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Chás
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Chás">
                                    <?php echo count($chás)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Garrafadas"><div class="Container-Actived-Translex" id="Garrafadas">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Garrafadas
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Garrafadas">
                                    <?php echo count($garrafadas)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Cápsulas"><div class="Container-Actived-Translex" id="Cápsulas">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Cápsulas
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Cápsulas">
                                    <?php echo count($cápsulas)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Queijo"><div class="Container-Actived-Translex" id="Queijo">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Queijo
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Queijo">
                                    <?php echo count($queijos)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Panelas de Barros"><div class="Container-Actived-Translex" id="Panelas de Barros">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Panelas de Barros
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Panelas de Barros">
                                    <?php echo count($panela_de_barro)." Postagens";?>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="Link-Actived-Translex" id="Link-Panela de Ferro"><div class="Container-Actived-Translex" id="Panela de Ferro">
                            <div class="View-container-translex">
                                <div class="imagem-icon"><img src="Image/navegacion-icon-PhotoRoom (1).png" alt="" id="Icon-Navegador"></div>
                                <div class="textos">
                                    <b>
                                        Panela de Ferro
                                    </b>
                                </div>
                            </div>
                                <div class="Translex-Container-Height" id="Translex_Panela de Ferro">
                                    <?php echo count($panela_de_ferro)." Postagens";?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <br>
                <br>
                <div class="Apresentation">
                    <p>
                    O que Temos ?
                    </p>
                </div>
                <br>
                <br>
                <div class="Container-Div-Style">
                    <div class="Container-o-que-temos">
                        <div class="Views-Pages">
                        <?php
                            
                            $tabelas_mensagem = CreateTables::iniciar($create_functions,$database)->__getCreateTablesResult()[1];
                            $coluna = [];
                            $null = [];
                            $object = SelectFrom::AutoIntance($tabelas_mensagem,$database)->__getAllDados();
                            if(is_array($object))
                            {
                                $caminho = "Image-From-To-o-que-temos/";
                                foreach($object as $dados)
                                {
                                    echo 
                                    '
                                        <div class="Page" id="1°-Imagem">
                                            <div>
                                                <div class="Imagem-view"><img src="'.htmlspecialchars($caminho.$dados['image_carrousel']).'" alt=""></div>
                                                <div class="Buttons-Acions">
                                                    <form method="POST" action="PHP\Atualizar-O-que-Temos\Captura_de_Nova_Imagem.php"><input type="hidden" name="id" value="'.$dados['id'].'"><input type="submit" value="Editar" id="Editar"></form>
                                                    <form method="POST" action="PHP\Deletar-O-que-Temos\Deletar-O-que-Temos.php"><input type="hidden" name="id" value="'.$dados['id'].'"><input type="submit" value="Excluir" id="Excluir"></form>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                        </div>
                        <div class="New-Pages">
                            <p>
                                ADICIONAR NOVO
                            </p>
                            <form method="POST" action="PHP/o-que-temos/o-que-temos.php" class="new-pages-form" enctype="multipart/form-data">
                                <div class="View-Photo">
                                    <label for="new-page">
                                        <img src="Image/thumbnail-default.jpg" name="Photo-o-que-temos" alt="" id="View-Photo-Selected">
                                        <input type="hidden" name="image_carrousel" value="image_carrousel">
                                    </label>
                                </div>
                                <input type="file" name="image_carrousel" id="new-page">
                                <div class="button-select">
                                    <input type="submit" value="Publicar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="Apresentation">
                    <p>
                    Postar Novo Post
                    </p>
                </div>
                <br>
                <br>
                <div class="Container-Div-Style">
                    <div class="Container-Postar-Novo-Post">
                        <form method="POST" action="PHP/Posts/Posts.php" enctype="multipart/form-data" class="Post">
                        <div class="Preview-Photo-And-Title">
                                <div class="Image-Post">
                                    <label for="Photo-New">
                                        <img src="Image/thumbnail-default.jpg" class="img-Text" name="Image-new-Post" id="Image-Preview-Post">
                                    </label>        
                                </div>
                                <div class="container-inputs">
                                    <div class="inputs">
                                        <input type="text" name="title-post" class="input" placeholder="Insira o Titulo da Novo Postagem">
                                    </div>
                                    <div class="inputs">
                                        <select name="category" id="category-select">
                                            <option value=""> Selecione </option>
                                            <option value="Temperos">Temperos</option>
                                            <option value="Castanhas">Castanhas</option>
                                            <option value="Rapaduras">Rapaduras</option>
                                            <option value="Farinhas">Farinhas</option>
                                            <option value="Vinagres">Vinagres</option>
                                            <option value="Pilões">Pilões</option>
                                            <option value="Colheres">Colheres</option>
                                            <option value="Chas">Chás</option>
                                            <option value="Garrafadas">Garrafadas</option>
                                            <option value="Capsulas">Cápsulas</option>
                                            <option value="Queijo">Queijo</option>
                                            <option value="Panelas_de_Barros">Panelas de Barros</option>
                                            <option value="Panela_de_Ferro">Panela de Ferro</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="file" name="Image-new-Post-Identify" class="hidden" id="Photo-New">
                                <input type="hidden" name="valor_da_foto" value="Image-new-Post-Identify">
                        </div>
                            <div class="buttons">
                                <input type="submit" value="Postar Novo Post">
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <br>
                <div class="Apresentation">
                    <p>
                        Telefone
                    </p>
                </div>
                <br>
                <br>
                <div class="Container-Div-Style">
                    <div class="Container-Tel">
                        <form method="POST" action="PHP/tel/tel.php" class="form-tel">
                            <div class="container-input-tell"id="container-telefone">
                                <div class="icon-tel"><i class="fa-solid fa-phone"></i></div>
                                <div class="inputs-tel"><input type="text" name="telefone" id="telAdm" placeholder="Insira o seu Telefone (99) 99999 - 9999" maxlength="11"></div>
                            </div>
                            <div class="btn-send">
                                <input type="submit" value="Cadastrar Telefone/Atualizar Telefone" id="input-submit-tel-adm">
                            </div>
                        </form>
                        <div id="mensage-Error" style="display: none;">

                        </div>
                    </div>
                    <br>
                    <br>
                    <?php
                        
                        $tabela_telefone = CreateTables::iniciar($create_functions,$database)->__getCreateTablesResult()[4];
                        $tabela_select = SelectFrom::AutoIntance($tabela_telefone,$database)->__getAllDados();
                        if(is_array($tabela_select))
                        {
                            echo '<table class="tabela-nomes-emails">';
                            echo '<tr class="tabela-coluna-nomes-emails">';
                            echo '<th class="titulos-id">id</th>';
                            echo '<th class="titulos-nomes">Telefone</th>';
                            echo '<th class="titulos-emails" id="new-size">Deletar</th>';
                            echo '</tr>';
                            foreach($tabela_select as $Dados)
                            {
                                echo '<tr class="tabela-nomes-emails-usuarios">';
                                echo '<td class="id-do-usuario">'.htmlspecialchars($Dados['id']).'</td>';
                                echo '<td class="nome-do-usuario">'.htmlspecialchars($Dados['telefone']).'</td>';
                                echo 
                                '
                                    <td class="email-do-usuario">
                                        <form method="POST" action="PHP/delete-telefone/delete-telefone.php" class="form-table">
                                            <input type="hidden" name="id" value="'.$Dados['id'].'">
                                            <input type="submit" value="Excluir" class="delete-tel">
                                        </form>
                                    </td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                        }
                        else
                        {
                            echo $tabela_select;
                        }
                    ?>
                </div>
                <br>
                <br>
                <div class="Apresentation">
                    <p>
                        Instagram
                    </p>
                </div>
                <br>
                <br>
                <div class="Container-Tel">
                    <form method="POST" action="PHP/Link/link.php" class="form-tel">
                        <div class="container-input-tell"id="container-telefone">
                            <div class="icon-tel"><i class="fa-brands fa-square-instagram"></i></div>
                            <div class="inputs-tel"><input type="url" name="instagram" id="linkInstagram" placeholder="Insira o Link do seu Instagram"></div>
                        </div>
                        <div class="btn-send">
                            <input type="submit" value="Cadastrar Telefone/Atualizar Telefone" id="input-submit-tel-adm">
                        </div>
                    </form>
                    <div id="mensage-Error" style="display: none;"></div>
                </div>
                <?php
                    $tabela_instagram = CreateTables::iniciar($create_functions,$database)->__getCreateTablesResult()[5];
                    $instagram = SelectFrom::AutoIntance($tabela_instagram,$database)->__getAllDados();
                    if(is_array($instagram))
                    {
                        echo '<div class="Container-Div-Style">';
                        echo '<table class="tabela-nomes-emails">';
                        echo '<tr class="tabela-coluna-nomes-emails">';
                        echo '<th class="titulos-id">#</th>';
                        echo '<th class="titulos-nomes">Instagram - Link</th>';
                        echo '</tr>';
                        echo '<tr class="tabela-nomes-emails-usuarios">';
                        foreach($instagram as $Dados)
                        {
                            
                            for($i = 0; $i <= 10; $i++)
                            {
                                $Dados['instagram'] = base64_decode($Dados['instagram']);
                            }
                            echo '<td class="id-do-usuario">'.htmlspecialchars($Dados['id']).'</td>';
                            echo '<td class="nome-do-usuario">'.htmlspecialchars($Dados['instagram']).'</td>';
                        }
                        echo '</tr>';
                        echo '</table>';
                        echo '</div>';
                    }
                ?>
                <br>
                <br>
                <div class="Apresentation">
                    <p>
                    E-mails Cadastrados 
                    </p>
                </div>
                <br>
                <br>
                <?php
                    $tabela_emails = CreateTables::iniciar($create_functions,$database)->__getCreateTablesResult()[6];
                    $select = SelectFrom::AutoIntance($tabela_emails,$database)->__getAllDados();
                    if(is_array($select))
                    {
                        echo '<div class="Container-Div-Style">';
                        echo '<table class="tabela-nomes-emails">';
                        echo '<tr class="tabela-coluna-nomes-emails">';
                        echo '<th class="titulos-id">id</th>';
                        echo '<th class="titulos-nomes">Nome</th>';
                        echo '<th class="titulos-emails">E-mail</th>';
                        echo '</tr>';
                        foreach($select as $Dados)
                        {
                            echo '<tr class="tabela-nomes-emails-usuarios">';
                            echo '<td class="id-do-usuario">'.$Dados['id'].'</td>';
                            echo '<td class="nome-do-usuario">'.$Dados['nome'].'</td>';
                            echo '<td class="email-do-usuario">'.$Dados['email'].'</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                        echo '</div>';
                    }
                ?>
                <br>
                <br>
                <div class="deslog">
                    <form action="PHP/logout/out.php" method="post">
                        <input type="submit" value="Sair">
                    </form>
                </div>
            </body>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="JavaScript/Translex-quantidade-Postagens.js"></script>
            <script src="JavaScript/Image-Preview.js"></script>
            <script src="JavaScript/Postar.js"></script>
            <script src="JavaScript/Telefone-mask-adm.js"></script>
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
                <title>Acesso Negado - Bloqueado</title>
                <link rel="icon" href="../../Image/icon.PNG">
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap');
                    body
                    {
                        background: #202020;
                        font-family: 'Open Sans',sans-serif;
                    }
                </style>
            </head>
            <body>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Acesso Negado',
                        text: 'Você não Acesso a Essa Parte por favor, saia',
                        didClose: () => {
                            window.location.href = "default.html"
                        }
                    });
                </script>
            </body>
            </html>
        <?php
        "
        ";
    }
?>

