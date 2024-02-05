let number_phone_Adm = document.getElementById("telAdm");
let container_number_phone_Adm = document.getElementById("container-telefone");
let Mensage_Error_number_phone_Adm = document.getElementById("mensage-Error");
let button_send_number_phone_Adm = document.getElementById("input-submit-tel-adm");
function Mask_Style()
{
    number_phone_Adm.value = number_phone_Adm.value.replace(/^\D/g, '');
    number_phone_Adm.value = number_phone_Adm.value.replace(/^\s/g, '');
    number_phone_Adm.value = number_phone_Adm.value.replace(/^(\d{2})(\d{5})(\d{4})/, '($1) $2 - $3');
}
number_phone_Adm.addEventListener("input",Mask_Style);