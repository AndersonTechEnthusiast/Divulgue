<?php
    function DatabaseConneting_Params()
    {
        $params = 
        [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => 'seu_banco_de_dados_(senha)',
            'dbts' => 'seu_banco_de_dados_(database)'
        ];
        return $params;
    }
    Class Banco 
    {
        protected $propriedades_bando_de_dados = [];
        protected $dsn;
        protected $connecting_PDO;
        protected $status;
        protected function __construct($parametros_banco_de_dados)
        {
            try
            {
                $this->propriedades_bando_de_dados = $parametros_banco_de_dados;
                $this->dsn = "mysql:host=".$this->propriedades_bando_de_dados['host'].";dbname=".$this->propriedades_bando_de_dados['dbts']."";
                $this->connecting_PDO = new PDO($this->dsn,$this->propriedades_bando_de_dados['user'],$this->propriedades_bando_de_dados['pass']);
                $this->connecting_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $error)
            {
                $this->status = "ErrorSQL:".$error->getMessage()."";
            }
        }
        public function __getConnecting()
        {
            if($this->status == null)
            {
                if($this->connecting_PDO)
                {
                    return $this->connecting_PDO;
                }
                else
                {
                    return "Error no Banco de Dados";
                }
            }
            else
            {
                return $this->status;
            }
        }
    }
?>
