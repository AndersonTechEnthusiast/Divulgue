<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {
        function Image($file,$method)
        {
            function Document($file,$method)
            {
                if(is_array($method))
                {
                    return $file[implode('',$method)];
                }
                else
                if(is_string($method))
                {
                    return $file[$method];
                }
            }
            function newNames($value)
            {
                $values = array_values($value);
                $novos_nomes = ['nome','caminho_completo','tipo','nome_temporario','erros','tamanho'];
                return array_combine($novos_nomes,$values);
            }
            function verificacionDados($filesnewnomed)
            {
                $status = null;
                if($filesnewnomed['erros'] == 0)
                {
                    if($filesnewnomed['tamanho'] <= 5000000)
                    {
                        if(strtolower(pathinfo($filesnewnomed['nome'],PATHINFO_EXTENSION)) == 'png' || strtolower(pathinfo($filesnewnomed['nome'],PATHINFO_EXTENSION)) == 'jpg')
                        {
                            $status = $filesnewnomed;
                        }
                        else
                        {
                            $status = "A extensão não é Aceita !!!";
                        }
                    }
                    else
                    if($filesnewnomed['tamanho'] > 5000000)
                    {
                        $status = "O tamanho não é aceito";
                    }
                }
                else
                {
                    $status = "Erros Encontrados";
                }
                return $status;
            }
            return verificacionDados(newNames(Document($file,$method)));
        }
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