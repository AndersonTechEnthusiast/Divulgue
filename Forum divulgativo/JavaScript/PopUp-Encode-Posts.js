let PopUp = document.getElementById("Identify");
if(PopUp.value == 1)
{
    Swal.fire({
        icon: 'warning',
        title: 'Atenção !!!',
        text: 'A Imagem Selecionada ja Foi inserida',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
if(PopUp.value == 2)
{
    Swal.fire({
        icon: 'success',
        title: 'Postada !!!',
        text: 'A imagem foi Postada com sucesso !!!',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
if(PopUp.value == 3)
{
    Swal.fire({
        icon: 'warning',
        title: 'Atenção !!!',
        text: 'A imagem não foi para o servidor local',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
{
    Swal.fire({
        icon: 'error',
        title: 'Error inesperado',
        text: 'Erro em :'+PopUp.value+'',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}