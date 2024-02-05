let Number_View_PHP_Js = document.getElementById("InputsNot");
let Container_View_Number_Whatsapp = document.getElementById("id-Whatsapp");
let Container_View_Number_Contato = document.getElementById("id-Contato");
let Valor = Number_View_PHP_Js.value;
let Mask = Valor.replace(/^(\d{2})(\d{5})(\d{4})/, '($1) $2 - $3');
Container_View_Number_Contato.textContent = Mask;
Container_View_Number_Whatsapp.textContent = Mask;
