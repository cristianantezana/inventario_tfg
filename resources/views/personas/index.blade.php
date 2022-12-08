@extends('admin.app')
@section('contenido')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <h5 class="modal-title" id="exampleModalLabel">Registrar persona</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('personas/store')}}" method="POST">
            @csrf
          <div class="modal-body">
              <div class="row">
                <div class="form-group col-6"> 
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return soloLetras(event)" required>
                </div>
                <div class="form-group col-6"> 
                  <label for="apaterno">Apellido</label>
                  <input type="text" class="form-control" id="apellido" name="apellido" onkeypress="return soloLetras(event)">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6"> 
                  <label for="nombre">Celular</label>
                  <input type="number"  min="69000000" max="79999999"  class="form-control" id="celular" name="celular" onkeypress="return valideKey(event);" required>
                </div>
                <div class="form-group col-6"> 
                  <label for="apaterno">Celular secundario</label>
                  <input type="number"  min="69000000" max="79999999" class="form-control" id="telefono" name="telefono" onkeypress="return valideKey(event);">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6"> 
                  <label for="nombre">Direccion</label>
                  <input type="text" class="form-control" id="direccion" name="direccion"  required>
                </div>  
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Fin de Modal -->
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
                      <div class="input-group col-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        <input class="form-control" id="buscar" name="buscar" type="text"  onkeypress="return soloLetras(event)" placeholder="Buscar por nombre,apellido....."/>
                      </div>
                      <div class="form-group col-8">      
                        <button type="button" style="float: right; color: white; font-weight: bold;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Registrar persona  <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-hover" id="table">
                        <thead class="bg-primary">
                            <tr>
                              <th class="text-center"  style="color: #fff;" scope="col">ID</th>
                              <th class="text-center"  style="color: #fff;" scope="col">NOMBRE</th>
                              <th class="text-center"  style="color: #fff;" scope="col">APELLIDO</th>
                              <th class="text-center"  style="color: #fff;" scope="col">CELULAR</th>
                              <th class="text-center"  style="color: #fff;" scope="col">TELEFONO</th>
                              <th class="text-center"  style="color: #fff;" scope="col">DIRECCION</th>
                              <th class="text-center"  style="color: #fff;" scope="col">ACCIONES</th>
                              </tr>
                        </thead>
                        <tbody id="data_persona">
                          <?php $contador = 1?>
                          @foreach ($personas as $item)
                            <tr>
                              <td  class="text-center" scope="row"><?php echo $contador;?></td>
                              <td class="text-center">{{$item->nombre}}</td>
                              <td class="text-center">{{$item->apellido}}</td>
                              <td class="text-center">{{$item->celular}}</td>
                              <td class="text-center">{{$item->celular_2}}</td>
                              <td class="text-center">{{$item->direccion}}</td>
                              <td class="text-center">     
                                <center>
                                  <button type="button" " class="btn btn-warning btn-sm mx-2" data-toggle="modal"
                                  data-target="#editarPersona{{$item->cod_persona}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                  </button>
                                  <button class="btn btn-danger btn-sm mx-2 eliminarPersona" action="{{ url('personas/destroy',$item->cod_persona) }}"
                                    method="DELETE" token="{{ csrf_token() }}" pagina="personas">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                </center>
                              </td>
                            </tr>
                                {{-- modal para editar --}}
                                <div class="modal fade" id="editarPersona{{$item->cod_persona}}" tabindex="-1"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header modal-header-warning">
                                        <h4 class="modal-title" id="exampleModalLabel">Editar persona</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form action="{{url('personas/update', $item->cod_persona)}}" method="POST">
                                        @method('PUT')
                                          @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="form-group col-6"> 
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->nombre}}" onkeypress="return soloLetras(event)" required>
                                            </div>
                                            <div class="form-group col-6"> 
                                                <label for="apaterno">Apellido</label>
                                                <input type="text" value="{{$item->apellido}}" class="form-control" id="apellido" name="apellido" onkeypress="return soloLetras(event)" required>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group col-6"> 
                                                <label for="nombre">Celular</label>
                                                <input type="number" min="69000000" max="79999999"  value="{{$item->celular}}" class="form-control" id="celular" name="celular" onkeypress="return valideKey(event);"  required>
                                            </div>
                                            <div class="form-group col-6"> 
                                                <label for="apaterno">Celular secundario</label>
                                                <input type="number" min="69000000" max="79999999"  value="{{$item->celular_2}}" class="form-control" id="telefono" name="telefono" onkeypress="return valideKey(event);">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group col-6"> 
                                                <label for="nombre">Direccion</label>
                                                <input type="text" value="{{$item->direccion}}" class="form-control" id="direccion" name="direccion"  required>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-warning">Editar</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                {{-- fin modal editar --}}
                            <?php  $contador++;?>
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
  </section>
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
    let clase = 'eliminarPersona';
    let mensaje = "De eliminar a este registro!";
    eliminarPorRuta(mensaje,clase);
    $('body').on('keyup', '#buscar', function(){
      let buscar = $(this).val();
      $.ajax
      ({
        method:"POST",
        url: "{{url('personas/buscar')}}",
        dataType:"json",
        data:{'_token':'{{ csrf_token() }}',buscar:buscar},
        success: function(res)
        {
          let tabla = '';
          let contador = 0;
          $('#data_persona').html('');
          $.each(res, function(index, value)
          {
            contador++;
            let cod = value.cod_persona;
            let url = 'action="{{url('/')}}/personas/destroy/'+cod+'"';
            tabla = `<tr>
                      <td class="text-center">${contador}</td>
                      <td class="text-center">${value.nombre}</td>
                      <td class="text-center">${value.apellido}</td>
                      <td class="text-center">${value.celular}</td>
                      <td class="text-center">${value.celular_2}</td>
                      <td class="text-center">${value.direccion}</td>
                      <td class="text-center">
                        <center>
                          <button type="button" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#editarPersona${cod}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                          </button>
                          <button class="btn btn-danger btn-sm mx-2 eliminarPersona" ${url}method="DELETE" token="{{csrf_token()}}" pagina="personas">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </button>
                        </center>
                      </td>
                    </tr>`;
            $('#data_persona').append(tabla);
          })
        }
      });
    });
  </script>
@endsection