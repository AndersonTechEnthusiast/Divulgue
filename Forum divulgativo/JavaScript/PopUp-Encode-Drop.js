if(document.getElementById("PopUpStyle").value == 1)
{
    Swal.fire({
        icon: 'success',
        title: 'Tabela Deletada',
        text: 'A Tabela foi Deletada com Sucesso',
        footer: '<a href="../Create-Tables-for-Administrador/Create-Tables-for-Administrador.php"> Criar Novamente a Tabela ? </a><br><a href="../../Qu@ntumSecur1ty_2X5pA.php"> Voltar a Pagina de Administração ? </a>',
    });
}
else
if(document.getElementById("PopUpStyle").value != 1)
{
    Swal.fire({
        icon: 'Error',
        title: 'Error inesperado',
        text: 'Error em:'+document.getElementById("PopUpStyle").value+'',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}