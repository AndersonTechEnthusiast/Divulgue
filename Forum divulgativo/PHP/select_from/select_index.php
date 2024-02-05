<?php
   Class SelectFrom extends Banco
   {
       protected $tabela_propriedade;
       protected $conneting_extends;
       protected $status;
       protected function __construct($tabela_parametro,$parametro_banco_de_dados)
       {
           parent::__construct($parametro_banco_de_dados);
           $this->tabela_propriedade = $tabela_parametro;
           $this->connecting_exports = $this->__getConnecting();
           if($this->connecting_exports)
           {
               $sql = "SELECT*FROM ".$this->tabela_propriedade;
               $stmt = $this->connecting_exports->prepare($sql);
               if($stmt->execute())
               {
                   $this->status = $stmt->fetchAll(PDO::FETCH_ASSOC);
               }
               else
               {
                   $this->status = "Consulta não executada";
               }
           }
           else
           {
               $this->status = "Banco de Dados não foi Encontrado";
           }
       }
       public function __getAllDados()
       {
           return $this->status;
       }
       public static function AutoIntance($tabela_parametro,$parametro_banco_de_dados)
       {
           return new self($tabela_parametro,$parametro_banco_de_dados);
       }
   }
?>