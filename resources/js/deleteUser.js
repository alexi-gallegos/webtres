const Swal = require('sweetalert2');

$(".alert").alert();
$('.delete-user').click(function(e){
        e.preventDefault();
        var fullName = $(this).prev('input').val();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success ml-2',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: '¿Seguro/a que desea eliminar a <strong>' + fullName + '</strong>?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                $(e.target).closest('form').submit();
            } else if ( result.dismiss === Swal.DismissReason.cancel) {
                return false;
            }
          })
    });