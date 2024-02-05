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
            <title>Criação de Tabelas - Administrador</title>
            <link rel="icon" href="../../Image/icon.PNG">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap');
                body
                {
                    background: #202020;
                    font-family: 'Open Sans',sans-serif;
                    color: white;
                }
                .center-container
                {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50% , -50%);
                    background: transparent;
                }
                .center-container > form
                {
                    width: 500px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border: none;
                    padding: 0;
                }
                .center-container > form > input[type=submit]
                {
                    padding: 10px;
                    background: rgb(0,255,0);
                    color: #202020;
                    font-family: 'Open sans',sans-serif;
                    font-size: 20px;
                    font-weight: 700;
                    border-radius: 10px;
                    border: none;
                    cursor: pointer;
                }
                input[type=hidden]
                {
                    display: none;
                    visibility: hidden;
                    opacity: 0;
                }
            </style>
        </head>
        <body>
            <div class="center-container">
                <form method="POST" action="../Create-Tables-for-Administrador/Create-Tables-for-Administrador.php">
                    <input type="submit" name="Criar" value="Criar Tabelas" id="submit">
                </form>
            </div>
            <?php
                $condicao = null;
                    if(isset($_POST['Criar']))
                    {
                        require_once("../Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
                        require_once("../Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
                        $Create_Functions = CreateFunctions();
                        if(is_array($Object = CreateTables::iniciar($Create_Functions,DatabaseConneting_Params())->__getCreateTablesResult()))
                        {
                            try
                            {
                                $conn = new PDO("mysql:host=localhost;dbname=jelpn",'root','^rA#oP*7B$g@9i2L1yXc!sQpZnW&5fGhU3mV*tE^jK%8o1bO0dC+lF6JqN!zI$xY');
                                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                if($conn)
                                {
                                    $stmt = $conn->prepare("SHOW TABLES");
                                    if($stmt->execute())
                                    {
                                        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $Dados)
                                        {
                                            if($Dados > 0)
                                            {
                                                $condicao = 1;
                                                break;
                                            }
                                            else
                                            {
                                                $condicao = 2;
                                                break;
                                            }
                                        }
                                    }
                                    else
                                    {
                                        $condicao = 0;
                                    }
                                }
                                else
                                {
                                    $condicao = 00;
                                }
                            }catch(PDOException $error)
                            {
                                $condicao = $error->getMessage();
                            }
                        }
                        else
                        {
                            $condicao = $Object = CreateTables::iniciar($Create_Functions,DatabaseConneting_Params())->__getCreateTablesResult();
                        }
                    }
                    else
                    {
                        return null;
                    }
                ?>
                <input type="hidden" name="Verificacion" id="verificacionIdentify" value="<?php echo $condicao;?>">
                <?php
            ?>
        </body>
        <script src="../../JavaScript/PopUp-Encode-Create-Tables.js"></script>
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