let Imagem = document.getElementById("View-Photo-Selected");
let file = document.getElementById("new-page");

function Preview(event)
{
    Imagem.src = URL.createObjectURL(event.target.files[0]);
    Imagem.style.width = "940px";
    Imagem.style.height = "584px";
}

file.addEventListener("change",Preview);