var Condicion_Mensage = document.getElementById("ValueIdentify");
if(Condicion_Mensage.value == 1)
{
    Swal.fire({
        icon: 'warning',
        title: 'Postagem Repetida !!!',
        text: 'A Postagem já foi Postada',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
if(Condicion_Mensage.value == 2)
{
    Swal.fire({
        icon: 'success',
        title: 'Postagem Postada !!!',
        text: 'A Postagem foi Postada com sucesso',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
if(Condicion_Mensage.value != 1 || Condicion_Mensage.value != 2 || Condicion_Mensage.value != false)
{
    Swal.fire({
        icon: 'warning',
        title: 'Palavra Proibida',
        text: 'Foi encontrada diretrizes palavras não condizentes com o site, tais como:'+Condicion_Mensage.value+'.',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
else
if(Condicion_Mensage.value === false)
{
    Swal.fire({
        icon: 'error',
        title: 'Erro ao tentar Postar',
        text: 'Ocorreu um Erro na Tentativa de Postar',
        didClose: () => {
            window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
        }
    });
}
