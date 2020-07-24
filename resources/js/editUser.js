        const Swal = require('sweetalert2');
        window.changePhoto = function(e){
                e.preventDefault();
                var imagenFormData = new FormData();
                imagenFormData.append('imagen', $("#imagen").prop('files')[0]);
                imagenFormData.append('id', idUser);
                axios.post('api/users/change_photo', imagenFormData)
                            .then((res) => {
                                    Swal.fire({
                                        text: res.data.message,
                                        icon: 'success'
                                    });
                            })
                            .catch((err) => {
                                console.log(err);
                                if(err.response.status == 422){
                                    Swal.fire({
                                        text: err.data.message,
                                        icon: 'error'
                                    });
                                }
                            })
        }

    window.changeInputImage = function(e){
            if(e.target.files[0]){
                var imagenPreviewURL = URL.createObjectURL(e.target.files[0]);
                $("#imagen_perfil").attr("src", imagenPreviewURL);
                if(!$("#btnNuevaFoto").length){
                    $("#helpTextImagen").after('<button id="btnNuevaFoto" class="btn btn-success ml-5" onclick="changePhoto(event)">Actualizar Foto</button>');
                }
            }
        }