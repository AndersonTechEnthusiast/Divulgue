let PopUp_O_que_Temos = document.getElementById("PopUpStyle");
if(PopUp_O_que_Temos.value == 1)
    {
        Swal.fire({
            icon: 'success',
            title: 'O Telefone foi Deletado',
            text: 'O telefone selecionado foi deletado',
            didClose: () => {
                window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
            }
        });
    }
    else
    if(PopUp_O_que_Temos.value == 2)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Alguma Ação inesperada ocorreu',
            text: 'tente mais tarde, a execução de deletar não ocorreu',
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