var Condicion_CreateTable = document.getElementById("verificacionIdentify");
let Button = document.getElementById("submit");
function AcoesOpcoes(event)
{
    if(Condicion_CreateTable.value == 1)
    {
        event.preventDefault();
        Swal.fire({
            icon: 'sucess',
            title: 'As Tabelas Foram Criadas',
            text: 'As Tabelas Foram criadas com sucesso',
            didClose: () => {
                window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
            }
        });
    }
    else
    if(Condicion_CreateTable.value == 2)
    {
        event.preventDefault();
        Swal.fire({
            icon: "error",
            title: "Error Inesperado",
            text: "Error: " + Condicion_CreateTable.value + "",
            didClose: () => {
                window.location.href = "../../Qu@ntumSecur1ty_2X5pA.php";
            }
        });
    }
    
}
Button.addEventListener("click",AcoesOpcoes);