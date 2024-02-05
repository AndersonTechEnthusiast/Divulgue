<?php
    session_set_cookie_params(3600*24*30,"/");
    session_start();
    if(isset($_SESSION['Administrador']['status']) && !empty($_SESSION['Administrador']['status']))
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
                <title>Verificação - Admininstrador</title>
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
                    $condicao = null;
                    $palavras_chaves = 
                    [
                        "Vai se foder, mermão","Boquete","Adulto", "Armas de fogo", "Intimidação", "Aborto ilegal",
                        "Filho duma égua","Caralho","Pornografia", "Facas automáticas", "Assédio", "Clínicas clandestinas",
                        "Vá cagar, mermão","Do caralho","Cassino", "Armas brancas", "Discriminação de gênero", "Autoteste de HIV",
                        "Enfia no cu essa merda","Foda","Drogas", "Munição", "Discriminação racial", "Compra de exames médicos",
                        "É de foder o cu do palhaço","Foda-se","Armas", "Explosivos", "Discriminação religiosa", "Receitas falsificadas",
                        "Eu quero mais é que se foda","Foder","Violência", "Armas ilegais", "Discriminação de orientação sexual", "Engenharia genética",
                        "Vai chupar um canavial de rola","Nem fodendo","Ódio", "Combustíveis inflamáveis", "Xenofobia", "Clonagem humana",
                        "Enfia um rojão no cu e sai voando","Pau","Discriminação", "Falsificação", "Homofobia", "Manipulação genética",
                        "O que é um peido pra quem já está cagado?","Pica","Racismo", "Documentos falsos", "Transfobia", "Testes em humanos",
                        "bicha","Porra","Extremismo", "Dinheiro falso", "Islamofobia", "Experimentação animal",
                        "boiola","Porra nenhuma","Terrorismo", "Contrafação", "Antissemitismo", "Clonagem de cartões",
                        "viado","Pra caralho","Suicídio", "Roupas falsificadas", "Crime de ódio", "Roubo de identidade",
                        "Mijar","Puta merda","Autolesão", "Perfumes falsificados", "Ideias extremistas", "Fraudes bancárias",
                        "Cagar","Puta que pariu","Jogo", "Medicamentos falsificados", "Conspirações", "Skimming",
                        "Merda","Punheta","Apostas", "Testes antidoping", "Teorias da conspiração", "Phishing bancário",
                        "Monte de merda","Que porra é essa?","Spam", "Trapaça em competições", "Negacionismo", "Cartões clonados",
                        "Saco de merda","Teu cu","Fraude", "Doping", "Falsidades", "Sequestro",
                        "Peido","Trepar","Golpes", "Esteroides", "Notícias falsas", "Homicídio",
                        "Encher o saco","Olho do cú","Pirataria", "Produtos proibidos", "Desinformação", "Assassinato",
                        "Desgraça","Buceta","Torrent", "Eutanásia", "Manipulação de mídia", "Tortura",
                        "Desgrama","Xoxota","Hacker", "Suicídio assistido", "Exploração animal", "Tráfico de órgãos",
                        "Nazismo","Sacanagem","Crack", "Venda de órgãos", "Crueldade contra animais", "Cárcere privado",
                        "Pessoa preta","Cacete","Serial", "Tráfico de pessoas", "Venda ilegal de animais", "Sequestro relâmpago",
                        "Tição","Caceta","Keygen", "Prostituição", "Caça ilegal", "Seqüestro virtual",
                        "Rosca","Siririca","Phishing", "Exploração infantil", "Pesca ilegal", "Sequestro de dados",
                        "Sacana","Insultos em Português","Malware", "Tráfico de seres humanos", "Tráfico de animais", "Extorsão",
                        "Safada","Arrombado","Vírus", "Desvio de verbas", "Poluição ambiental", "Chantagem",
                        "Safado","Babaca","Ransomware", "Corrupção", "Desmatamento ilegal", "Ameaças",
                        "Sapatao","Brocha","Escort", "Suborno", "Pesca predatória", "Violência policial",
                        "Sifilis","Bicha","Viagra", "Lavagem de dinheiro", "Exploração de recursos naturais", "Corrupção policial",
                        "Siririca","Boiola","Emagrecimento rápido", "Evasão fiscal", "Lixo tóxico", "Abuso de autoridade",
                        "Tarada","Cracudo","Dieta extrema", "Fraude fiscal", "Resíduos perigosos", "Excesso de força",
                        "Tarado","Filho da puta","Anabolizantes", "Sonegação", "Contaminação da água", "Perseguição policial",
                        "Testuda","Galinha","Tráfico de influência", "Esquemas de pirâmide", "Contaminação do ar", "Extermínio",
                        "Tezao","Puta","Compra de diploma", "Marketing multinível", "Energia nuclear", "Genocídio",
                        "Tezuda","Piranha","Trapaça acadêmica", "Esquemas Ponzi", "Armas químicas", "Limpeza étnica",
                        "Tezudo","Vagabundo","Plágio", "Investimentos fraudulentos", "Armas biológicas", "Guerras",
                        "Trocha","Viado","Trapaça em jogos", "Fraudes financeiras", "Terrorismo ambiental", "Terrorismo internacional",
                        "Trolha","Chupa meu pau","Trapaça em exames", "Agiotagem", "Tráfico de drogas sintéticas", "Conflitos armados",
                        "Troucha","Vai pro caralho","Compra de seguidores", "Empréstimos ilegais", "Ecstasy", "Armas nucleares",
                        "Trouxa","Vai se foder","Compra de curtidas", "Lavagem de dinheiro", "LSD", "Armas químicas",
                        "Troxa","Vai tomar no cu","Teste de drogas", "Crimes financeiros", "Metanfetaminas", "Armas biológicas",
                        "Vaca","Corno","Substâncias controladas", "Estupro", "Substâncias psicoativas", "Atentados",
                        "Vagabunda","Fodido","Maconha", "Abuso sexual", "Venda de medicamentos sem prescrição", "Guerrilha",
                        "Vagabundo","Cachorro","Cocaína", "Pedofilia", "Compra de medicamentos online", "Ditadura",
                        "Vagina","Canalha","Heroína", "Exploração sexual", "Falsificação de medicamentos", "Totalitarismo",
                        "Veada","Escroto","Metanfetaminas", "Tráfico sexual", "Medicamentos controlados", "Nacionalismo extremo",
                        "Viadao","Trouxa","LSD", "Agressão", "Venda de órgãos", "Extremismo religioso",
                        "Viado","Vaca","Crack", "Violência doméstica", "Tráfico de órgãos", "Anarquia",
                        "Viada","Vai pra puta que pariu","Ecstasy", "Bullying", "Transplantes ilegais", "Apologia ao crime"
                    ];
                    $count = 0;
                    $palavra = null;
                    foreach($palavras_chaves as $palavras)
                    {
                        if(strpos(implode($_POST),$palavras) !== false)
                        {
                            $palavra = $palavras;
                            $condicao = $palavra;
                        }
                        else
                        {
                            $count++;
                            if($count == 300)
                            {
                                require_once("../Connecting_Banco_de_Dados/Connecting_Banco_de_Dados.php");
                                require_Once("../Create_Tables_Banco_de_Dados/Create_Tables_Banco_de_Dados.php");
                                require_once("../MySQL_Banco_de_Dados/MySQL_Banco_de_Dados.php");
                                require_once("../insert_into/insert_into.php");
                                $tabela = CreateTables::iniciar(CreateFunctions(),DatabaseConneting_Params())->__getCreateTablesResult()[0];
                                $null = [];
                                $condicao = $insert = Insert::AutoIntance(MySQL($_POST,$tabela,$null),DatabaseConneting_Params(),$_POST)->__getResult();
                            }
                            else
                            {
                                null;
                            }
                        }
                    }
                ?>
                <input type="hidden" id="ValueIdentify" value="<?php echo $condicao?>">
            </body>
            <script src="../../JavaScript/PopUp-Encode-Mensage.js"></script>
            </html>
        <?php
        "
        ";
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