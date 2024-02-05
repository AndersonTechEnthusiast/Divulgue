<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
    {
        Class Insert extends Banco
        {
            protected $sql = [];
            protected $stmt;
            protected $Dados = [];
            protected $connecting_export;
            protected $status;
            protected function __construct($sql_parametros,$parametros_banco_de_dados,$Dados_parametros)
            {
                parent::__construct($parametros_banco_de_dados);
                $this->sql = $sql_parametros;
                $this->Dados = $Dados_parametros;
                $this->connecting_export = $this->__getConnecting();
                if($this->connecting_export)
                {
                    $this->stmt = $this->connecting_export->prepare($this->sql['select']['select_from_with_where']);
                    foreach($this->Dados as $keys => $values)
                    {
                        $this->stmt->bindValue(":".$keys,$values);
                    }
                    if($this->stmt->execute())
                    {
                        if($this->stmt->rowCount() > 0)
                        {
                            $this->status = 1;
                        }
                        else
                        {
                            $this->stmt = $this->connecting_export->prepare($this->sql['insert']);
                            foreach($this->Dados as $keys => $values)
                            {
                                $this->stmt->bindValue(":".$keys,$values);
                            }
                            if($this->stmt->execute())
                            {
                                $this->status = 2;
                            }
                            else
                            {
                                $this->status = false;
                            }
                        }
                    }
                    else
                    {
                        $this->status = "A Consulta Select não foi executada";
                    }
                }
                else
                {
                    $this->status = "Erro na Consulta de Inserção no Banco de Dados !!!";
                }
            }
            public function __getResult()
            {
                return $this->status;
            }
            public static function AutoIntance($sql_parametros,$parametros_banco_de_dados,$Dados_parametros)
            {
                return new self($sql_parametros,$parametros_banco_de_dados,$Dados_parametros);
            }
        }
    }
    else
    {
        Class Insert extends Banco
        {
            protected $sql = [];
            protected $stmt;
            protected $Dados = [];
            protected $connecting_export;
            protected $status;
            protected function __construct($sql_parametros,$parametros_banco_de_dados,$Dados_parametros)
            {
                parent::__construct($parametros_banco_de_dados);
                $this->sql = $sql_parametros;
                $this->Dados = $Dados_parametros;
                $this->connecting_export = $this->__getConnecting();
                if($this->connecting_export)
                {
                    $this->stmt = $this->connecting_export->prepare($this->sql['select']['select_from_with_where']);
                    foreach($this->Dados as $keys => $values)
                    {
                        $this->stmt->bindValue(":".$keys,$values);
                    }
                    if($this->stmt->execute())
                    {
                        if($this->stmt->rowCount() > 0)
                        {
                            $this->status = 1;
                        }
                        else
                        {
                            $this->stmt = $this->connecting_export->prepare($this->sql['insert']);
                            foreach($this->Dados as $keys => $values)
                            {
                                $this->stmt->bindValue(":".$keys,$values);
                            }
                            if($this->stmt->execute())
                            {
                                $this->status = 2;
                            }
                            else
                            {
                                $this->status = false;
                            }
                        }
                    }
                    else
                    {
                        $this->status = "A Consulta Select não foi executada";
                    }
                }
                else
                {
                    $this->status = "Erro na Consulta de Inserção no Banco de Dados !!!";
                }
            }
            public function __getResult()
            {
                return $this->status;
            }
            public static function AutoIntance($sql_parametros,$parametros_banco_de_dados,$Dados_parametros)
            {
                return new self($sql_parametros,$parametros_banco_de_dados,$Dados_parametros);
            }
        }
    }
?>