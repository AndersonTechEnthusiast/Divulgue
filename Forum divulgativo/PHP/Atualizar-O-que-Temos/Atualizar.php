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
                <title>Atualizando - Fotos</title>
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
            <?php
                require_once("../Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
                require_once("../Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
                require_once("../MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
                require_once("../function-image/function-image.php");
                require_once("../update_set/update_set.php");
                $condicao = null;
                $tabela = CreateTables::iniciar(CreateFunctions(),DatabaseConneting_Params())->__getCreateTablesResult()[1];
                $imagem_nova = Image($_FILES,$_POST['image_carrousel_atualizada']);
                if(is_array($imagem_nova))
                {
                    $Pasta = "../../Image-From-To-o-que-temos/";
                    if(move_uploaded_file($imagem_nova['nome_temporario'],$Pasta.$imagem_nova['nome']))
                    {
                        $Dados = [];
                        $Dados_Antigos = [];
                        $Dados_Atualizados = [];
                        foreach($_POST as $keys => $values)
                        {
                            if($keys == "id")
                            {
                                $Dados[$keys] = $values;
                                $Dados_Antigos[$keys] = $values;
                            }
                        }
                        foreach($_POST as $keys => $values)
                        {
                            if($keys == "image_carrousel")
                            {
                                $Dados[$keys] = $imagem_nova['nome'];
                                $Dados_Atualizados[$keys] = $imagem_nova['nome'];
                            }
                        }
                        $update = Update::UpdateGet(MySQL($Dados_Antigos,$tabela,$Dados_Atualizados),DatabaseConneting_Params(),$Dados)->__getUpdate();
                        $condicao = $update;
                    }
                    else
                    {
                        $condicao = "não deu certo";
                    }
                }
                else
                {
                    $condicao = $imagem_nova;
                }
            ?>
            <a href=""></a>
            <input type="hidden" name="" id="PopUp" value="<?php echo $condicao;?>">
            </body>
            <script src="../../JavaScript/PopUp-Encode-Atualizar.js"></script>
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