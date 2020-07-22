//mostrar y ocultar preview de la imagen
window.toggleImagePreviewVisibility = function(){
    var imagenPreview = document.getElementById('imagen_preview');
    if(imagenPreview.style.display == "none"){
        imagenPreview.style.display = "block";
    }
}

//crear imagen para mostrar
window.setImagePreview = function(e){
    var imagenPreview = document.getElementById('imagen_preview');
    var imagenPreviewURL = URL.createObjectURL(e.target.files[0]);
    imagenPreview.src = imagenPreviewURL;
    toggleImagePreviewVisibility();
     console.log(e.target.files[0]);
}

//toggle visibilidad de password y cambio de icono.
window.togglePasswordVisibility = function(){
    var iconoEye = document.getElementById('icono_eye');
    var passwordInput = document.getElementById('password');

    if(passwordInput.getAttribute('type') == "password"){
        iconoEye.className = "fa fa-eye-slash";
        passwordInput.setAttribute('type', 'text');
    } else{
        iconoEye.className = "fa fa-eye";
        passwordInput.setAttribute('type', 'password');
    }
}

//validar rut
window.rutInput = document.getElementById('rut');
window.rutInput.onblur = function(e){
            if(Fn.validaRut(e.target.value)){
                if(rutInput.classList.contains('is-invalid')){
                    rutInput.classList.remove('is-invalid');
                }
            }else{
                rutInput.classList.add('is-invalid');
            }
        }

//función que valida el rut
window.Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut : function (rutCompleto) {
                if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
                    return false;
                var tmp 	= rutCompleto.split('-');
                var digv	= tmp[1]; 
                var rut 	= tmp[0];
                if ( digv == 'K' ) digv = 'k' ;
                return (Fn.dv(rut) == digv );
            },
            dv : function(T){
                var M=0,S=1;
                for(;T;T=Math.floor(T/10))
                    S=(S+T%10*(9-M++%6))%11;
                return S?S-1:'k';
            }
        }