let PopUp_O_que_Temos = document.getElementById("PopUpStyle");
if(PopUp_O_que_Temos.value == 1)
{
    Swal.fire({
        icon: 'success',
        title: 'O link foi Editado',
        text: 'O link foi editado',
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
        title: 'Link Postado com Sucesso!!!',
        text: 'O Link foi postado !!!',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}