<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Administrador - Autenticação</title>
    <link rel="icon" href="Image/icon.PNG">
    <link rel="stylesheet" href="Css/style-13.css">
    <script src="https://kit.fontawesome.com/7bcc76ecaf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap');
        body
        {
            
            font-family: 'Open Sans',sans-serif;
        }
    </style>
</head>
<body>
    <div class="Back-Image">
        <div class="Form">
            <form method="POST" action="3pvsbs.php" class="Autenty">
                <div class="Logo">
                    <img src="Image/icon-Adm-PhotoRoom.png" id="Icon-Adm-Autenty">
                </div>
                <br>
                <br>
                <div class="Container-Forms">
                    <i class="fa-solid fa-key"></i>
                    <input type="text" name="senha_desenvolvedor" id="Senha-Autenty" class="inputs" placeholder="Insira a sua Senha de Administrador">
                </div>
                <br>
                <br>
                <div class="btn">
                    <input type="submit" name="submit" id="autenty" value="Entrar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        
        if(isset($_POST['submit']))
        {
            if(!isset($_SESSION['tentativa']))
            {
                $_SESSION['tentativa'] = 1;
            }
            else
            {
                $_SESSION['tentativa']++;
            }
            $senha = "sua_senha";
            $hash = password_hash($senha,PASSWORD_BCRYPT);
            if(password_verify($_POST['senha_desenvolvedor'],$hash))
            {
                unset($_SESSION['tentativa']);
                session_destroy();
                if(session_status() == PHP_SESSION_ACTIVE)
                {
                    session_destroy();
                }
                else
                if(session_status() != PHP_SESSION_ACTIVE)
                {
                    session_set_cookie_params(3600*24*30,"/");
                    session_start();
                    $_SESSION['Administrador'] = [
                        'status' => true
                    ];
                    echo
                    "
                    "
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Login com Sucesso',
                                text: 'Bem - Vindo Administrador',
                                didClose: () => {
                                    window.location.href = "Qu@ntumSecur1ty_2X5pA.php";
                                }
                            });
                        </script>
                    <?php
                    "
                    ";
                }
            }
            else
            {
                echo 
                "
                "
                ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Senha Incorreta',
                            text: 'Tente Novamente',
                        });
                    </script>
                <?php
                "
                ";
                if($_SESSION['tentativa'] >= 5)
                {
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Senha Incorreta',
                                text: 'Tente Novamente',
                                didClose: () => {
                                    window.location.href = "default.hmtl";
                                }
                            });
                        </script>
                    <?php
                    $_SESSION['tentativa'] = 0;
                }
            }
        }
        else
        {
            return null;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mensage-alert">
        <div class="center">
            <?php echo "Tentativas Restantes: ".(5 - @$_SESSION['tentativa']);?>
        </div>
    </div>
</body>
</html>