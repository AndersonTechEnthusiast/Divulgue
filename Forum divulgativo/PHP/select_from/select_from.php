<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {
        Class SelectFrom extends Banco
        {
            protected $sql_propriedades; 
            protected $stmt;
            protected $AllRows;
            protected $connecting_exports;
            protected $status;
            protected function __construct($sql_parametros,$parametros_banco_de_dados)
            {
                parent::__construct($parametros_banco_de_dados);
                $this->sql_propriedades = $sql_parametros;
                $this->connecting_exports = $this->__getConnecting();
                try
                {
                    if($this->connecting_exports)
                    {
                        $this->stmt = $this->connecting_exports->prepare($this->sql_propriedades);
                        if($this->stmt->execute())
                        {
                            $this->AllRows = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                            $this->status = $this->AllRows;
                        }
                        else
                        {
                            $this->status = "Consulta não foi executada !!!";
                        }
                    }
                    else
                    {
                        $this->status = "Consulta não foi encontrada !!!!";
                    }
                }catch(PDOException $error)
                {
                    $this->status = "MYSQL_ERROR: ".$error->getMessage()."";
                }
            }
            public function __getAllDados()
            {
                return $this->status;
            }
            public static function AutoInstance($sql_parametros,$parametros_banco_de_dados)
            {
                return new self($sql_parametros,$parametros_banco_de_dados);
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