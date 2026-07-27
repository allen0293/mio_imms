import Swal from 'sweetalert2';

window.deleteConfirm=function(form){

    Swal.fire({

        title:'Archive Department?',

        text:'You can restore it later.',

        icon:'warning',

        showCancelButton:true,

        confirmButtonColor:'#dc3545',

        confirmButtonText:'Archive'

    }).then((result)=>{

        if(result.isConfirmed){

            form.submit();

        }

    });

}