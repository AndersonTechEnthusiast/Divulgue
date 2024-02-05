if(document.getElementById("PopUpStyle").value == 1)
{
    Swal.fire({
        icon: 'warning',
        title: 'Ja Existe !!!',
        text: 'seus dados ja foram encontrados no sistema',
        didClose: () => {
            window.location.href = "../../index.php";
        }
    });
}
else
if(document.getElementById("PopUpStyle").value == 2)
{
    Swal.fire({
        icon: 'success',
        title: 'Dados Inseridos com Sucesso !!!',
        text: 'Seus Dados foram inseridos com sucesso no sistema',
        didClose: () => {
            window.location.href = "../../index.php";
        }
    });
}
else
{
    Swal.fire({
        icon: 'error',
        title: 'Erro Inesperado',
        text: 'Error: '+document.getElementById("PopUpStyle").value+'',
        didClose: () => {
            window.location.href = "../../index.php";
        }
    })
}