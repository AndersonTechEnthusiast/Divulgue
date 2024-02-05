let PopUp_O_que_Temos = document.getElementById("PopUpStyle");
if(PopUp_O_que_Temos.value == 1)
    {
        Swal.fire({
            icon: 'warning',
            title: 'O telefone ja foi cadastrado',
            text: 'O telefone inserido ja foi cadastrado, caso queira cadastrar o mesmo telefone, delete ele e cadastra ele novamente',
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
            title: 'O telefone foi cadastrado com sucesso',
            text: 'O telefone inserido foi cadastrado com sucesso no sistema',
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