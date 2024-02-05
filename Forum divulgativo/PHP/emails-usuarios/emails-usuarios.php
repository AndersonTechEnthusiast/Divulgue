<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrando seu Email</title>
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
<?php
    require_once("../Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
    require_once("../Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
    require_once("../MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
    require_once("../insert_into/insert_into.php");
    $tabela = CreateTables::iniciar(CreateFunctions(),DatabaseConneting_Params())->__getCreateTablesResult()[6];
    $null = [];
    $condicao = $insert = Insert::AutoIntance(MySQL($_POST,$tabela,$null),DatabaseConneting_Params(),$_POST)->__getResult();
?>
<input type="hidden" id="PopUpStyle" value="<?php echo $condicao;?>">
</body>
<a href=""></a>
<script src="../../JavaScript/PopUp-Encode-User.js"></script>
</html>