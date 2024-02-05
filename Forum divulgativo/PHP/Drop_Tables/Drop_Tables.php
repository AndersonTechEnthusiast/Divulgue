<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {
        require_once("../Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
        require_once("../Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
        require_once("../MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
        require_once("../select_from/select_index.php");
        $create_functions = CreateFunctions();
        $database = DatabaseConneting_Params();
        $Tabelas_Conjuntos = [];
        for($i = 0; $i <= 6; $i++)
        {
            array_push($Tabelas_Conjuntos,$Tabelas = CreateTables::iniciar($create_functions,$database)->__getCreateTablesResult()[$i]);
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
            <title>Deletar Tabelas</title>
            <link rel="icon" href="../../Image/icon.PNG">
            <link rel="stylesheet" href="../../Css/style-20.css">
        </head>
        <body>
            <div class="backDrop">
                <div class="front">
                    <form action="Delete-table.php" method="post">
                        <div class="img-icon">
                            <img src="../../Image/icon-Adm-PhotoRoom.png">
                            <b><h3>Deletar Tabela</h3></b>
                        </div>
                        <div class="inputs">
                            <select name="name-table" id="select-table">
                                <option value=""> Selecione </option>
                                <?php
                                    for($i = 0; $i <= 6; $i++)
                                    {
                                        echo "<option value='".htmlspecialchars($Tabelas_Conjuntos[$i])."'>".htmlspecialchars($Tabelas_Conjuntos[$i])."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="btn-submit">
                            <input type="submit" value="Deletar">
                        </div>
                    </form>
                </div>
            </div>
        </body>
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