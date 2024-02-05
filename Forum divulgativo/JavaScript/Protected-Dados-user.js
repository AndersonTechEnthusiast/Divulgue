let Nome_Notificacion = document.getElementById("Nome-notificacion");
let Email_Notificacion = document.getElementById("Email-notificacion");
let Mensage_Error_Nome = document.getElementById("Nome-Mensagem");
let Mensage_Error_Email = document.getElementById("Email-Mensagem");
let Submit_Notificacion = document.getElementById("submit-notificacion");
function Nome_verificacion()
{
    Nome_Notificacion.value = Nome_Notificacion.value.replace(/[0-9]/g, '');
    if
    (
        Nome_Notificacion.value.length >= 10 ||
        Nome_Notificacion.value.length >= 20 ||
        Nome_Notificacion.value.length >= 30 ||
        Nome_Notificacion.value.length >= 40
    )
    {
        Nome_Notificacion.value = Nome_Notificacion.value.slice(0,40);
        Mensage_Error_Nome.style.display = "none";
        return true;
    }
    else
    {
        Mensage_Error_Nome.style.display = "block";
        Mensage_Error_Nome.style.width = "100%";
        Mensage_Error_Nome.style.textAlign = "center";
        Mensage_Error_Nome.style.color = "red";
        Mensage_Error_Nome.textContent = "O Nome esta Incorreto, nome completo por favor";
        return false;
    }
}
function Email_verificacion()
{
    let email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(email_regex.test(Email_Notificacion.value))
    {
        Mensage_Error_Email.style.display = "none";
        return true;
    }
    else
    {
        Mensage_Error_Email.style.display = "block";
        Mensage_Error_Email.style.width = "100%";
        Mensage_Error_Email.style.textAlign = "center";
        Mensage_Error_Email.style.color = "red";
        Mensage_Error_Email.textContent = "O E-mail esta Incorreto, e-mail completo por favor";
        return false;
    }
}
function Submit(event)
{
    if(Nome_verificacion() == true && Email_verificacion() == true)
    {
        return true;
    }
    else
    {
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Dados Não Aceitos',
            text: 'Por Favor revise seus dados',
        });
    }
}
Nome_Notificacion.addEventListener('input',Nome_verificacion);
Email_Notificacion.addEventListener('input',Email_verificacion);
Submit_Notificacion.addEventListener('click',Submit);