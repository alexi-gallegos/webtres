window.toggleImagePreviewVisibility = function(){
    var imagenPreview = document.getElementById('imagen_preview');
    if(imagenPreview.style.display == "none"){
        imagenPreview.style.display = "block";
    }
}
     
window.setImagePreview = function(e){
    //validar si es imagen
    var imagenPreview = document.getElementById('imagen_preview');
    var imagenPreviewURL = URL.createObjectURL(e.target.files[0]);
    imagenPreview.src = imagenPreviewURL;
    toggleImagePreviewVisibility();
     console.log(e.target.files[0]);
}
