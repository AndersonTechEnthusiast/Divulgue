<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {
        require_once("../../Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
        require_once("../../Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
        require_once("../../MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
        require_once("../../select_from/select_from_where.php");
        $tabela = CreateTables::iniciar(CreateFunctions(),DatabaseConneting_Params())->__getCreateTablesResult()[2];
        $null = [];
        $selectWhere = SelectFromWhere::GetDados(MySQL($_POST,$tabela,$null),DatabaseConneting_Params(),$_POST)->__getAllDadosWhere();
        if(is_array($selectWhere))
        {
            $id = null;
            $imagem = null;
            foreach($selectWhere as $Dados)
            {
                $id = $Dados['id'];
                $imagem = $Dados['image'];
            }
        }
        else
        {
            echo $selectWhere;
        }
        echo 
        "
        "
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Editar Imagem</title>
                <link rel="icon" href="../../../Image/icon.PNG">
                <link rel="stylesheet" href="../../../Css/style-17.css">
            </head>
            <body>
                <div class="Back">
                    <div class="Front">
                        <form action="Editar.php" method="post" enctype="multipart/form-data">
                            <div class="Icon">
                                <img src="../../../Image/icon-Adm-PhotoRoom.png" alt="logo">
                            </div>
                            <div class="Container-Inputs">
                                <input type="file" name="image" id="Preview_File">
                                <div class="Imagem-Preview">
                                    <label for="Preview_File">
                                        <img src="../../../Img-Posted-For-Adm/<?php echo $imagem;?>" alt="imagem" id="Preview_Image">
                                    </label>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="hidden" name="image" value="">
                                <input type="hidden" name="image_atualizada" value="image">
                                <div class="btn-acion">
                                    <input type="submit" value="Atualizar a Imagem">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </body>
            <script src="../../../JavaScript/Edited-Image.js"></script>
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