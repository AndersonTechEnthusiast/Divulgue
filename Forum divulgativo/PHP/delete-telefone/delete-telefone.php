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
            <title>Deletar Telefone</title>
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
            $condicao = null;
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                require_once("../Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
                require_once("../Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
                require_once("../MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
                require_once("../delete_from/delete_with_where.php");
                $tabela = CreateTables::iniciar(CreateFunctions(),DatabaseConneting_Params())->__getCreateTablesResult()[4];
                $null = [];
                $delete = DeleteFromWhere::AutoInstance(MySQL($_POST,$tabela,$null)['delete']['delete_with_where'],$_POST,DatabaseConneting_Params())->__getDeleteItem();
                $condicao = $delete;
            }
            else
            {
                $condicao = "Error Metodo não reconhecido";
            }
        ?>
        <input type="hidden" name="nameInput" id="PopUpStyle" value="<?php echo $condicao;?>">
        </body>
        <script src="../../JavaScript/Delete-Encode-Telefone.js"></script>
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
