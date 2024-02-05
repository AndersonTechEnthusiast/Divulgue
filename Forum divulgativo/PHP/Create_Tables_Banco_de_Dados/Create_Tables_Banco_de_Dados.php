<?php
     function CreateFunctions()
     {
         function DatabaseCreateTable_Mensage()
         {
             $create_table = 
             "
                 CREATE TABLE IF NOT EXISTS MENSAGE_FOR_USER
                 (
                     id int auto_increment primary key,
                     mensagem text not null
                 );
             ";
             return $create_table;
         }
         function DatabaseCreateTable_Carousel()
         {
             $create_table = 
             "
                 CREATE TABLE IF NOT EXISTS CAROUSEL
                 (
                     id int auto_increment primary key,
                     image_carrousel longblob not null
                 );
             ";
             return $create_table;
         }
         function DatabaseCreateTable_Posts()
         {
             $create_table = 
             "
                 CREATE TABLE IF NOT EXISTS POSTS
                 (
                     id int auto_increment primary key,
                     titulo varchar(200) not null,
                     image longblob not null,
                     categoria varchar(200) not null
                 );
             ";
             return $create_table;
         }
         function DatabaseCreateTable_Instagram()
         {
             $create_table = 
             "
                 CREATE TABLE IF NOT EXISTS INSTAGRAM
                 (
                     id int auto_increment primary key,
                     instagram TEXT not null
                 );
             ";
             return $create_table;
         }
         function DatabaseCreateTable_Administrador()
         {
             $create_table = 
             "
                 CREATE TABLE IF NOT EXISTS ADMIN
                 (
                     id int auto_increment primary key,
                     email varchar(200) not null,
                     senha varchar(200) not null
                 );
             ";
             return $create_table;
         }
         function DatabaseCreateTable_telefoneAdm()
         {
             $create_table = 
             "
                 CREATE TABLE IF NOT EXISTS TELEFONE
                 (
                     id int auto_increment primary key,
                     telefone varchar(200) not null
                 );
             ";
             return $create_table;
         }
         function DatabaseCreateTable_SenhasDevs()
         {
             $create_table = 
             "
                 CREATE TABLE IF NOT EXISTS SENHAS 
                 (
                     id int auto_increment primary key,
                     senha_desenvolvedor TEXT not null
                 );
             ";
             return $create_table;
         }
         function DatabaseCreateTable_Emails()
         {
             $create_table = 
             "
                 CREATE TABLE IF NOT EXISTS EMAILS
                 (
                     id int auto_increment primary key,
                     nome varchar(200) not null,
                     email varchar(200) not null
                 );
             ";
             return $create_table;
         }
         $Tables = 
         [
             'Mensage' => DatabaseCreateTable_Mensage(),
             'Carousel' => DatabaseCreateTable_Carousel(),
             'Posts' => DatabaseCreateTable_Posts(),
             'Admin' => DatabaseCreateTable_Administrador(),
             'tel' => DatabaseCreateTable_telefoneAdm(),
             'instagram' => DatabaseCreateTable_Instagram(),
             'emails' => DatabaseCreateTable_Emails(),
             'senha' => DatabaseCreateTable_SenhasDevs()
         ];
         return $Tables;
     }
     // require_once("../Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
     Class CreateTables extends Banco 
     {
         protected $CreatesFunctions_propriedades = [];
         protected $sql_1;
         protected $stmt_1;
         protected $sql_2;
         protected $stmt_2;
         protected $sql_3;
         protected $stmt_3;
         protected $sql_4;
         protected $stmt_4;
         protected $sql_5;
         protected $stmt_5;
         protected $sql_6;
         protected $stmt_6;
         protected $sql_7;
         protected $stmt_7;
         protected $sql_8;
         protected $stmt_8;
         protected $connecting_export;
         protected $status;
         protected $returnValues = [];
         protected function __construct($CreatesFunctions_parametros,$parametros_banco_de_dados)
         {
             $this->CreatesFunctions_propriedades = $CreatesFunctions_parametros;
             parent::__construct($parametros_banco_de_dados);
             $this->connecting_export = $this->__getConnecting();
             if($this->connecting_export)
             {
                 try
                 {
                     $this->sql_1 = $this->CreatesFunctions_propriedades['Mensage'];
                     $this->stmt_1 = $this->connecting_export->prepare($this->sql_1);
                     if($this->stmt_1->execute())
                     {
                         $this->sql_2 = $this->CreatesFunctions_propriedades['Carousel'];
                         $this->stmt_2 = $this->connecting_export->prepare($this->sql_2);
                         if($this->stmt_2->execute())
                         {
                             $this->sql_3 = $this->CreatesFunctions_propriedades['Posts'];
                             $this->stmt_3 = $this->connecting_export->prepare($this->sql_3);
                             if($this->stmt_3->execute())
                             {
                                 $this->sql_4 = $this->CreatesFunctions_propriedades['Admin'];
                                 $this->stmt_4 = $this->connecting_export->prepare($this->sql_4);
                                 if($this->stmt_4->execute())
                                 {
                                     $this->sql_5 = $this->CreatesFunctions_propriedades['tel'];
                                     $this->stmt_5 = $this->connecting_export->prepare($this->sql_5);
                                     if($this->stmt_5->execute())
                                     {
                                         $this->sql_6 = $this->CreatesFunctions_propriedades['senha'];
                                         $this->stmt_6 = $this->connecting_export->prepare($this->sql_6);
                                         if($this->stmt_6->execute())
                                         {
                                             $this->sql_7 = $this->CreatesFunctions_propriedades['instagram'];
                                             $this->stmt_7 = $this->connecting_export->prepare($this->sql_7);
                                             if($this->stmt_7->execute())
                                             {
                                                 $this->sql_8 = $this->CreatesFunctions_propriedades['emails'];
                                                 $this->stmt_8 = $this->connecting_export->prepare($this->sql_8);
                                                 if($this->stmt_8->execute())
                                                 {
                                                     $this->status = $this->returnValues = 
                                                     [
                                                         strtolower('MENSAGE_FOR_USER'),
                                                         strtolower('CAROUSEL'),
                                                         strtolower('POSTS'),
                                                         strtolower('ADMIN'),
                                                         strtolower('TELEFONE'),
                                                         strtolower('INSTAGRAM'),
                                                         strtolower('EMAILS'),
                                                         strtolower('SENHAS')
                                                     ];
                                                 }
                                                 else
                                                 {
                                                     $this->status = "Error ao Criar tabela de Emails";
                                                 }
                                             }
                                             else
                                             {
                                                 $this->status = "Error ao Criar a tabela Instagram";
                                             }
                                         }
                                         else
                                         {
                                             $this->status = "Error ao Criar a tabela senha";
                                         }
                                     }
                                     else
                                     {
                                         $this->status = "Error ao Criar a tabela telefone";
                                     }
                                 }
                                 else
                                 {
                                     $this->status = "Error ao Criar a tabela Admininstrador";
                                 }
                             }
                             else
                             {
                                 $this->status = "Error ao Criar a tabela Posts";
                             }
                         }
                         else
                         {
                             $this->status = "Error ao Criar a Tabela Carousel";
                         }
                     }
                     else
                     {
                         $this->status = "Error ao Criar a Tabela Mensage";
                     }
                 }
                 catch(PDOException $error)
                 {
                     $this->status = "Error SQL:".$error->getMessage()."";
                 }
             }
             else
             {
                 $this->status = "Banco de Dados não foi Exportado corretamente";
             }
         }
         public function __getCreateTablesResult()
         {
             if(is_array($this->status))
             {
                 return $this->status;
             }
             else
             {
                 return $this->status;
             }
         }
         public static function iniciar($CreatesFunctions_parametros,$parametros_banco_de_dados)
         {
             return new self($CreatesFunctions_parametros,$parametros_banco_de_dados);
         }
     }
?>
