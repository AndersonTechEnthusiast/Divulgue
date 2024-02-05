<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {
        Class Drop extends Banco
        {
            protected $sql;
            protected $stmt;
            protected $conneting_exporting;
            protected $tabela_propriedades;
            protected $status;
            protected function __construct($tabela_parametros,$parametros_banco_de_dados)
            {
                parent::__construct($parametros_banco_de_dados);
                $this->tabela_propriedades = $tabela_parametros;
                if($this->conneting_exporting = $this->__getConnecting())
                {
                    $this->sql = "DROP TABLE ".$this->tabela_propriedades;
                    $this->stmt = $this->conneting_exporting->prepare($this->sql);
                    if($this->stmt->execute())
                    {
                        $this->status = 1;
                    }
                    else
                    {
                        $this->status = "Error na Execução da Consulta";
                    }
                }
                else
                {
                    $this->status = "Bando de Dados não exportado";
                }
            }
            public function __getDrop()
            {
                return $this->status;
            }
            public static function AutoInstance($tabela_parametros,$parametros_banco_de_dados)
            {
                return new self($tabela_parametros,$parametros_banco_de_dados);
            }
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