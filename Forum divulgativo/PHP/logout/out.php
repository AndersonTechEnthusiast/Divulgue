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
                <title>Document</title>
                <link rel="icon" href="Image/icon.PNG">
                <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
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
                session_set_cookie_params(3600*24*30,"/");
                session_start();
                if(session_status() == PHP_SESSION_ACTIVE)
                {
                    session_destroy();
                    echo 
                    "
                    "
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sessão Encerrada com Sucesso',
                                text: 'Até mais...',
                                didClose: () => {
                                    window.location.href = "../../index.php";
                                }
                            });
                        </script>
                    <?php
                    "
                    ";
                }
                else
                {
                    session_destroy();
                    echo 
                    "
                    "
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Sessão Encerrada com Sucesso',
                                text: 'Até mais...',
                                didClose: () => {
                                    window.location.href = "../../index.php";
                                }
                            });
                        </script>
                    <?php
                    "
                    ";
                }
            ?>
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