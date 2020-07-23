const Swal = require('sweetalert2')

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
if(window.rutInput){
    window.rutInput.onblur = function(e){
        if(Fn.validaRut(e.target.value)){
            if(rutInput.classList.contains('is-invalid')){
                rutInput.classList.remove('is-invalid');
            }
        }else{
            rutInput.classList.add('is-invalid');
        }
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

//funcion para crear usuario

window.formCrearUsuario = document.getElementById('crear_usuario_form');
if(window.formCrearUsuario){
    window.formCrearUsuario.addEventListener('submit', function (event) {
        event.preventDefault();
        let rut = $("#rut").val();
        if(rut.length <= 8 || window.Fn.validaRut(rut) == false ){
            Swal.fire({
                title: 'Error',
                text: 'Ingrese un RUT válido (Eg. 12345678-9).',
                icon: 'error'
            });
            return;
        }

        $("div").remove("#error_form_usuario");
        var userFormData = new FormData();
        userFormData.append('nombres', $("#nombres").val());
        userFormData.append('apellido_paterno', $("#apellido_paterno").val());
        userFormData.append('apellido_materno', $("#apellido_materno").val());
        userFormData.append('rut', rut);
        userFormData.append('email', $("#email").val());
        userFormData.append('fecha_nacimiento', $("#fecha_nacimiento").val());
        userFormData.append('password', $("#password").val());
        userFormData.append('imagen', $("#imagen").prop('files')[0]);

        axios.post('api/users', userFormData)
                        .then(res => {
                           if(res.data.ok){
                                Swal.fire({
                                    text: res.data.message,
                                    icon: 'success',
                                    timer: 2000,
                                }).then(() => window.location.replace("/users"));
                           }
                        })
                        .catch(err => {
                            if(err.response.status == 422){
                                
                                let divError = (id, value) =>  $(`#${id}`).after(`<div id="error_form_usuario" class="invalid-feedback d-block">${value}</div>`);

                                let errores = err.response.data.errors;

                                for(let [key, value] of Object.entries(errores)){
                                    if (key == 'password') {
                                        divError('password_container', value);
                                    } else if (value.length == 1 && key != 'password') {
                                        divError(key, value);
                                    } else {
                                        for (var i = 0; i < value.length; i++) {
                                            divError(key, value[i]);
                                        }
                                    }
                                }

                            }
                        })
});
}
