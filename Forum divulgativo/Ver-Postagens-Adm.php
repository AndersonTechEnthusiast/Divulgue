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
            <title>Minhas Postagens - Administrador</title>
            <link rel="icon" href="Image/icon.PNG">
            <link rel="stylesheet" href="Css/style-1.css">
            <link rel="stylesheet" href="Css/style-2.css">
            <link rel="stylesheet" href="Css/style-15.css">
            <link rel="stylesheet" href="Css/style-16.css">
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
                    <a class="new-font-style" href="Qu@ntumSecur1ty_2X5pA.php">Voltar a Pagina Inicial de Administração</a>
                    </li>
                </ul>
                </div>
        </nav>
            <br>
            <br>
            <div class="icon-Welcome-MyPost">
                <img src="Image/icon-Adm-PhotoRoom.png">
                <b> MINHAS POSTAGENS</b>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="container-Posts">
                <?php
                    require_once("PHP/Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
                    require_once("PHP/Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
                    require_once("PHP/MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
                    require_once("PHP/select_from/select_index.php");
                    $tabela = CreateTables::iniciar(CreateFunctions(),DatabaseConneting_Params())->__getCreateTablesResult()[2];
                    $select = SelectFrom::AutoIntance($tabela,DatabaseConneting_Params())->__getAllDados();
                    if(is_array($select))
                    {
                        foreach($select as $dados)
                        {
                            echo 
                            '
                            <fieldset class="posts-actions-MyPost">
                                <div class="title-MyPost">'.htmlspecialchars($dados['titulo']).'</div>
                                <div class="image-MyPost"><img src="Img-Posted-For-Adm/'.htmlspecialchars($dados['image']).'"></div>
                                <div class="category-MyPost">'.htmlspecialchars($dados['categoria']).'</div>
                                <div class="btns-MyPost">
                                    <form method="POST" action="PHP/My-Posting/Excluir/Excluir.php"><input type="hidden" name="id" value="'.$dados['id'].'"><input type="submit" value="Excluir" id="Form-Excluir"></form>
                                    <form method="POST" action="PHP/My-Posting/Editar/Captura.php"><input type="hidden" name="id" value="'.$dados['id'].'"><input type="submit" value="Editar" id="Form-Editar"></form>
                                </div>
                            </fieldset>
                            ';
                        }
                    }
                    else
                    {
                        echo htmlspecialchars($select);
                    }
                ?>
                <!-- <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset>
                    <fieldset class="posts-actions-MyPost">
                        <div class="title-MyPost">titulo</div>
                        <div class="image-MyPost"><img src="Image/tipos-de-temperos.jpg"></div>
                        <div class="btns-MyPost">
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Excluir" id="Form-Excluir"></form>
                            <form method="GET" action="PHP/"><input type="hidden" name="id" value=""><input type="submit" value="Editar" id="Form-Editar"></form>
                        </div>
                    </fieldset> 
                -->
            </div>
        </body>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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