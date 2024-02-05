let PopUp_O_que_Temos = document.getElementById("PopUpStyle");
if(PopUp_O_que_Temos.value == 1)
    {
        Swal.fire({
            icon: 'warning',
            title: 'A Imagem ja foi Postada',
            text: 'A Imagem Selecionada Ja se Encontra no Banco de Dados',
            didClose: () => {
                window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
            }
        });
    }
    else
    if(PopUp_O_que_Temos.value == 2)
    {
        Swal.fire({
            icon: 'success',
            title: 'Imagem Postada !!!',
            text: 'A imagem foi Postada !!!',
            didClose: () => {
                window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
            }
        });
    }
    else
    {
        Swal.fire({
            icon: 'error',
            title: 'Error Inesperado',
            text: 'Error'+PopUp_O_que_Temos.value+'',
            didClose: () => {
                window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
            }
        })
    }