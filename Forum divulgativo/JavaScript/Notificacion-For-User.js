let Link_Actived_Notificacion_PopUp = document.getElementById("Button-Cadastrar-Email");
let OverLay_PopUp_Notificacion = document.getElementById("Notificacion-Overlay");
let Transition_PopUp_Notificacion = document.getElementById("Notificacion-Transition");
let Modal_PopUp_Notificacion = document.getElementById("Notificacion-Modal");
let Link_Desactived_Notificacion_PopUp = document.getElementById("fechar-PopUp-Notificacion");
function Link_Activador_Notificacion(event)
{
    event.preventDefault();
    OverLay_PopUp_Notificacion.style.display = "block";
    Transition_PopUp_Notificacion.style.display = "block";
    Modal_PopUp_Notificacion.style.display = "block";
}
function Link_Desactived_Notificacion(event)
{
    event.preventDefault();
    OverLay_PopUp_Notificacion.style.display = "none";
    Transition_PopUp_Notificacion.style.display = "none";
    Modal_PopUp_Notificacion.style.display = "none";
}
function Overlay_Notificacion()
{
    OverLay_PopUp_Notificacion.style.display = "none";
    Transition_PopUp_Notificacion.style.display = "none";
    Modal_PopUp_Notificacion.style.display = "none";
}
Link_Actived_Notificacion_PopUp.addEventListener("click",Link_Activador_Notificacion);
Link_Desactived_Notificacion_PopUp.addEventListener("click",Link_Desactived_Notificacion);
OverLay_PopUp_Notificacion.addEventListener("click",Overlay_Notificacion);
