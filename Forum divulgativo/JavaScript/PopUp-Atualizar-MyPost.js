let PopUp_situcion = document.getElementById("PopUp");
if(PopUp_situcion.value == 1)
{
    Swal.fire({
        icon: 'success',
        title: 'Imagem Atualizada com Sucesso',
        text: 'A Imagem foi Atualizada',
        didClose: () => {
            window.location.href = "../../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
if(PopUp_situcion.value == 2)
{
    Swal.fire({
        icon: 'warning',
        title: 'Ops...',
        text: 'A Consulta não foi Executada',
        didClose: () => {
            window.location.href = "../../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
if(PopUp_situcion.value == 3)
{
    Swal.fire({
        icon: 'warning',
        title: 'Algo Errado...',
        text: 'Banco de Dados, não foi encontrado',
        didClose: () => {
            window.location.href = "../../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
{
    Swal.fire({
        icon: 'error',
        title: 'Error Inesperado',
        text: 'Error:'+PopUp_situcion.value+'',
        didClose: () => {
            window.location.href = "../../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}