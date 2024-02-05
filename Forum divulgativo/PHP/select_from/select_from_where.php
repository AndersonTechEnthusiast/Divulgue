<?php  
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {  
        Class SelectFromWhere extends Banco
        {
            protected $sql_propriedades = [];
            protected $stmt;
            protected $connecting_exporting;
            protected $dados_propriedades = [];
            protected $status;
            protected function __construct($sql_parametros,$parametros_banco_de_dados,$dados_parametros)
            {
                parent::__construct($parametros_banco_de_dados);
                $this->sql_propriedades = $sql_parametros;
                $this->dados_propriedades = $dados_parametros;
                $this->connecting_exporting = $this->__getConnecting();
                if($this->connecting_exporting)
                {
                    try
                    {
                        $this->stmt = $this->connecting_exporting->prepare($this->sql_propriedades['select']['select_from_with_where']);
                        foreach($this->dados_propriedades as $keys => $values)
                        {
                            $this->stmt->bindValue(":".$keys,$values);
                        }
                        if($this->stmt->execute())
                        {
                            if($this->stmt->rowCount() > 0)
                            {
                                $this->status = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                            }
                            else
                            {
                                $this->status = "Nenhuma Linha foi Afetada";
                            }
                        }
                        else
                        {
                            $this->status = "Consulta Não Executada";
                        }
                    }catch(PDOException $error)
                    {
                        $this->status = $error->getMessage();
                    }
                }
                else
                {
                    $this->status = "Banco de Dados não foi exportado !!!";
                }
            }
            public function __getAllDadosWhere()
            {
                return $this->status;
            }
            public static function GetDados($sql_parametros,$parametros_banco_de_dados,$dados_parametros)
            {
                return new self($sql_parametros,$parametros_banco_de_dados,$dados_parametros);
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