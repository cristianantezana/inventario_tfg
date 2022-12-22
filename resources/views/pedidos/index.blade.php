@extends('admin.app')
@section('contenido')
<input type="hidden" id="ruta" value="{{url('/')}}">
<div class="row">
  <div class="col-md-12">
    <div class="full">
      <div class="page-header card">
        <div class="card-block">
          @if (session('status'))
              <div class="alert alert-success">{{session('status') }}</div>
          @endif
          <div class="card-body">
              <div class="row">
                <div class="form-group col-12">      
                    <a type="button" href="{{route('pedidos.create')}}" class="btn btn-primary"  style="float: right; color: white; font-weight: bold;">
                        Registrar pedido <span><i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
              </div>
            <div class="card-block table-border-style">
              <div class="table-responsive"> 
                <table class="table table-bordered table-striped table-hover" >
                    <thead class="bg-primary">
                        <th class="text-center" style="color: #fff;">ID</th>
                        <th class="text-center" style="color: #fff;">CLIENTE</th>
                        <th class="text-center" style="color: #fff;">RECIBO</th>
                        <th class="text-center" style="color: #fff;">FECHA</th>
                        <th class="text-center" style="color: #fff;">ACCIONES</th>
                    </thead>
                    <tbody>
                        <?php $contador = 1?>
                        @foreach ($pedidos as $cliente)
                            <tr>
                                <td class="text-center">{{$contador}}</td>
                                <td class="text-center">{{$cliente->cod_users_ped}}</td>
                                <td class="text-center">{{$cliente->cod_cliente_ped}}</td>
                                <td class="text-center">{{$cliente->nota}}</td>                             
                                <td>
                                    <center>
                                        <a href="{{ route('usuarios.edit', $cliente->cod_pedido) }}" 
                                         class="btn btn-warning btn-sm mx-2 editar" ><i class="fa fa-pencil "></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm  mx-2 eliminarCliente" action="{{ url('usuarios/destroy',$cliente->id) }}"
                                            method="DELETE" token="{{ csrf_token() }}" pagina="usuarios">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        
                                    </center>
                                </td>
                            </tr>
                            <?php $contador++?>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div> 
@endsection
@section('script') 
    @if (session('mensaje') == 'ok')
    <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Realizado correctamente',
        showConfirmButton: false,
        timer: 1500
        })
    </script>    
    @endif 
  <script type="text/javascript">
    let tabla = 'table';
    tableEs(tabla);
    $(document).on("click", ".eliminarCliente",function(){
      var ruta = $("#ruta").val();
      let action = $(this).attr("action");
      let method = $(this).attr("method");
      let token = $(this).attr("token");
      let pagina = $(this).attr("pagina");
      Swal.fire({
        title: 'Estas seguro?',
        text: "De eliminar el usuario!",
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
                  title: 'El registro ha sido eliminado.',
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
  </script>
@endsection