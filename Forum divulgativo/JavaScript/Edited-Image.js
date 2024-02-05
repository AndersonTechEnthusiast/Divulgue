let Preview_Image = document.getElementById("Preview_Image");
let Proview_Files = document.getElementById("Preview_File");

function Previews(event)
{
    Preview_Image.src = URL.createObjectURL(event.target.files[0]);
}

Proview_Files.addEventListener("change",Previews);