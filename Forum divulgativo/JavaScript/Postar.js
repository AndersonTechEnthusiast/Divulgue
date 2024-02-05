let file_input = document.getElementById("Photo-New");
let image_tag = document.getElementById("Image-Preview-Post");

function PostarView(event)
{
    image_tag.src = URL.createObjectURL(event.target.files[0]);
    image_tag.style.width = "622px";
    image_tag.style.height = "415px";
}
file_input.addEventListener("change",PostarView);