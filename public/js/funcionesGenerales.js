function tableEs(tabla){
  $('#'+tabla+'').DataTable({
    language:
    {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registrossss",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningun dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate:
      {
        sFirst: "Primero",
        sLast: "Ãšltimo",
        sNext: "Siguiente",
        sPrevious: "Anterior"
      },
      oAria:
      {
        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
        sSortDescending: ": Activar para ordenar la columna de manera descendente"
      }
    },
    "bLengthChange" : false, //thought this line could hide the LengthMenu
       
    "order": [[ 0, "asc" ]]
  });
}

function  eliminarPorRuta(mensaje,clase){
  $(document).on('click', '.'+clase+'',function(){
    var ruta = $("#ruta").val();
    let action = $(this).attr("action");
    let method = $(this).attr("method");
    let token = $(this).attr("token");
    let pagina = $(this).attr("pagina");
    Swal.fire({
        title: 'Estas seguro?',
        text: mensaje,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) =>
        {
          if(result.isConfirmed)
          {
            let datos = new FormData();
            datos.append("_method", method);
            datos.append("_token", token);
            $.ajax
            ({
              url:action,
              method: "POST",
              data:datos,
              cache:false,
              contentType:false,
              processData:false,
              success: function(res)
              {
                if(res == "ok")
                {
                  Swal.fire({
                    type: 'success',
                    title: '!El registro ha siddo eliminado...',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = ruta+'/'+pagina;
                        }
                  });
                }
              }
            })
          }
        });
  });
}

    function soloLetras(e) {
      var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        especiales = [46],
        tecla_especial = false;
  
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }
      if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
      }
    }

    function valideKey(evt) {
      // code is the decimal ASCII representation of the pressed key.
      var code = evt.which ? evt.which : evt.keyCode;
  
      if (code == 8) {
        // backspace.
        return true;
      } else if (code >= 48 && code <= 57) {
        // is a number.
        return true;
      } else {
        // other keys.
        return false;
      }
    }
