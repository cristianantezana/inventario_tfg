@extends('admin.app')
@section('contenido')

  <div class="card card-default">
    <div class="px-6 py-4">
      <section class="section">
        <div class="section-header modal-header-primary">
            <h4 class="page__heading">Editar usuario</h4>
        </div>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card card-primary">
                <div class="card-body">                
                  <br>
                  <form action="{{ route('usuarios.update',$usuario->id) }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <input type="text" name="cod_persona" value="{{$usuario->persona->cod_persona}}" hidden >
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre<span class="required">*</span></label>
                            <input value="{{$usuario->persona->nombre}}" onkeypress="return soloLetras(event)" type="text" class="form-control" name="nombre" required="required"  >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="celular">Apellido<span class="required">*</span></label>
                            <input type="text" value="{{$usuario->persona->apellido}}" onkeypress="return soloLetras(event)" class="form-control" name="apellido"  required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="direccion">Dirección<span class="required">*</span></label>
                          <input value="{{$usuario->persona->direccion}}"
                          type="text" class="form-control " name="direccion" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="celular">Celular<span class="required">*</span></label>
                            <input type="number" min="69000000" max="79999999" value="{{$usuario->persona->celular}}"
                              class="form-control" name="celular" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado">Correo<span class="required">*</span></label>
                            <input type="email" value="{{$usuario->email}}" class="form-control" name="email" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                      <a class="btn btn-danger" href="{{route('personas.index')}}">Volver</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
    $(document).ready(function(){                  
      let consulta;
      $("#busqueda_persona").focus();
      $("#busqueda_persona").keyup(function(e){
        if($(this).val().length > 2)
        {
          consulta = $("#busqueda_persona").val();                                
          $.ajax
          ({
              type: "POST",
              url: "{{url('clientes/buscar')}}",
              data:{'_token':'{{ csrf_token() }}',buscar:consulta},
              dataType: "html",
              beforeSend: function(){
                $("#resultado_est").html("<p align='center'><img src='ajax-loader.gif' /></p>");
              },
              success: function(data)
              {                                                    
                $("#resultado_est").empty()
                $("#resultado_est").append(data);
              }
          });                                           
        }else{
            $("#resultado_est").empty();
        }						  
      });
  });
</script>
@endsection


   