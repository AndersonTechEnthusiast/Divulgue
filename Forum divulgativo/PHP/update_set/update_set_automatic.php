<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {
        Class UpdateSet extends Banco
        {
            protected $sql_1;protected $stmt_1;protected $string_transform_1;
            protected $sql_2;protected $stmt_2;protected $string_transform_2;
            protected $sql_3;protected $stmt_3;protected $string_transform_3;
            protected $sql_4;protected $stmt_4;protected $string_transform_4;
            protected $connecting_exporting;
            protected $Dados_propriedades = [];
            protected $tabela_propriedades;
            protected $dados_antigos = [];
            protected $status;
            protected function __construct($Dados_parametros,$tabela_parametros,$parametros_banco_de_dados)
            {
                parent::__construct($parametros_banco_de_dados);
                $Dados = $this->Dados_propriedades = $Dados_parametros;
                $tabela = $this->tabela_propriedades = $tabela_parametros;
                if($this->connecting_exporting = $this->__getConnecting())
                {
                    $this->sql_1 = "SELECT*FROM $tabela";
                    $this->stmt_1 = $this->connecting_exporting->prepare($this->sql_1);
                    if($this->stmt_1->execute())
                    {
                        $this->dados_antigos = $this->stmt_1->fetchAll(PDO::FETCH_ASSOC);
                        if($this->dados_antigos == null)
                        {
                            $coluna = implode('',array_keys($Dados));
                            $parametro = ":".implode('',array_keys($Dados));
                            $this->sql_4 = "INSERT INTO $tabela ($coluna) VALUES ($parametro)";
                            $this->stmt_4 = $this->connecting_exporting->prepare($this->sql_4);
                            foreach($Dados as $keys => $values)
                            {
                                for($i = 0; $i <= 10; $i++)
                                {
                                    $values = base64_encode($values);
                                }
                                $this->stmt_4->bindValue(":".$keys,$values);
                            }
                            if($this->stmt_4->execute())
                            {
                                $this->status = 2;
                            }
                            else
                            {
                                $this->status = "Error na consulta de Inserção";
                            }
                        }
                        else
                        {
                            $id = [];
                            foreach($this->dados_antigos as $lines)
                            {
                                foreach($lines as $keys => $values)
                                {
                                    if($keys == 'id')
                                    {
                                        $id[$keys] = $values;
                                        break;
                                    }
                                }
                            }
                            $condicion_1 = $this->string_transform_1 = implode('',array_map(function($addprefix){return "$addprefix = :$addprefix";},array_keys($id)));
                            $this->sql_2 = "SELECT*FROM $tabela WHERE $condicion_1";
                            $this->stmt_2 = $this->connecting_exporting->prepare($this->sql_2);
                            foreach($id as $keys => $values)
                            {
                                $this->stmt_2->bindValue(":".$keys,$values);
                            }
                            if($this->stmt_2->execute())
                            {
                                if($this->stmt_2->rowCount() > 0)
                                {
                                    $condicion_2 = $this->string_transform_2 = implode('',array_map(function($addprefix){return "$addprefix = :$addprefix";},array_keys($Dados)));
                                    $condicion_3 = $this->string_transform_3 = implode('',array_map(function($addprefix){return "$addprefix = :$addprefix";},array_keys($id)));
                                    $this->sql_3 = "UPDATE $tabela SET $condicion_2 WHERE $condicion_3";
                                    $this->stmt_3 = $this->connecting_exporting->prepare($this->sql_3);
                                    foreach($Dados as $keys => $values)
                                    {
                                        for($i = 0; $i <= 10; $i++)
                                        {
                                            $values = base64_encode($values);
                                        }
                                        $this->stmt_3->bindValue(":".$keys,$values);
                                    }
                                    foreach($id as $keys => $values)
                                    {
                                        $this->stmt_3->bindValue(":".$keys,$values);
                                    }
                                    if($this->stmt_3->execute())
                                    {
                                        $this->status = 1;
                                    }
                                    else
                                    {
                                        $this->status = "Error na consulta de Atualização";
                                    }
                                }
                                else
                                {
                                    $this->status = "Nenhuma Linha Afetada";
                                }
                            }
                        }
                    }
                    else
                    {
                        $this->status = "consulta primaria não foi executada";
                    }
                }
                else
                {
                    $this->status = "Banco de dados não foi exportado";
                }
            }
            public function __getUptade()
            {
                return $this->status;
            }
            public static function AutoIntance($Dados_parametros,$tabela_parametros,$parametros_banco_de_dados)
            {
                return new self($Dados_parametros,$tabela_parametros,$parametros_banco_de_dados);
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
            <!-- foreach($Dados as $keys => $values)
                {
                    $this->stmt_1->bindValue(":".$keys,$values);
                }
                if($this->stmt_1->execute())
                {
                    $valor_antigo = [];
                    foreach($this->stmt_1->fetchAll(PDO::FETCH_ASSOC) as $Rows)
                    {
                        foreach($Rows as $keys => $values)
                        {
                            if($keys == 'id')
                            {
                                $valor_antigo[$keys] = $values;
                                break;
                            }
                        }
                    }
                    if($this->stmt_1->rowCount() > 0)
                    { -->
                        <!-- // $condicion_2 = $this->string_transform_2 = implode('',array_map(function($addprefix){return "$addprefix = :$addprefix";},array_keys($valor_antigo)));
                        // $this->sql_2 = "UPDATE $tabela SET $condicion_1 WHERE $condicion_2";
                        // $this->stmt_2 = $this->connecting_exporting->prepare($this->sql_2);
                        // foreach($valor_antigo as $keys => $values)
                        // {
                        //     $this->stmt_2->bindValue(":".$keys,$values);
                        // }
                        // foreach($Dados as $keys => $values)
                        // {
                        //     $this->stmt_2->bindValue(":".$keys,$values);
                        // }
                        // if($this->stmt_2->execute())
                        // {
                        //     $this->status = "Dados Atualizados com Sucesso !!!";
                        // }
                        // else
                        // {
                        //     $this->status = "Error ao Executar a Consulta de Atualização";
                        // }
                        $this->status = "Uma Linha Afetada";
                    }
                    else
                    {
                        // $coluna = implode('',array_keys($Dados));
                        // $param = ":".implode('',array_keys($Dados));
                        // $this->sql_3 = "INSERT INTO $tabela ($coluna) VALUES ($param)";
                        // $this->stmt_3 = $this->connecting_exporting->prepare($this->sql_3);
                        // foreach($Dados as $keys => $values)
                        // {
                        //     $this->stmt_3->bindValue(":".$keys,$values);
                        // }
                        // if($this->stmt_3->execute())
                        // {
                        //     $this->status = "O Dado Foi Inserido com Sucesso";
                        // }
                        // else
                        // {
                        //     $this->status = "Error ao Executar a Consulta de Inserção";
                        // }
                        $this->status = "Nenhuma Linha Afetada";
                    }
                }
                else
                {
                    $this->status = "a consulta não foi executada (select)";
                } -->