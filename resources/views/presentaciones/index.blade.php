@extends('admin.app')
@section('contenido')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <h5 class="modal-title" id="exampleModalLabel">Regitrar presentación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('presentaciones/store')}}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-12"> 
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return soloLetras(event)"  required>
              </div>   
            </div>
            <div class="row">
              <div class="form-group col-12"> 
                <label for="medida_id">Seleccione la medida<span class="required">*</span></label>
                <select name="medida_id" class="form-control selectric">   
                    @foreach($medida as $item)
                      <option value="{{$item->cod_medida}}">{{$item->nombre_medida.' '.'('.$item->sigla_medida.')'}}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- fin del modal --}}
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
                    <button type="button" style="float: right; color: white; font-weight: bold;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Registrar presentación <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
              <div class="card-block table-border-style">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover" >
                    <thead class="bg-primary">
                      <tr>
                        <th class="text-center" style="color: #fff;"  scope="col">ITEMS</th>
                        <th class="text-center" style="color: #fff;"  scope="col">PRESENTACION</th>
                        <th class="text-center" style="color: #fff;"  scope="col">MEDIDA</th>
                        <th class="text-center" style="color: #fff;"  scope="col">SIGLA</th>
                        <th class="text-center" style="color: #fff;"  scope="col">ESTADO</th>
                        <th class="text-center" style="color: #fff;"  scope="col">ACCIONES</th>
                      </tr>
                    </thead>
                    <tbody id="data_persona">
                      <?php $contador = 1?>
                      @foreach ($presentaciones as $item)
                        <tr>
                          <td  class="text-center" scope="row"><?php echo $contador;?></td>
                          <td class="text-center">{{$item->nombre_presentacion}}</td>
                          <td class="text-center">{{$item->medida->nombre_medida}}</td>
                          <td class="text-center">{{$item->medida->sigla_medida}}</td>
                          <td>
                            <center>
                              @if($item->estado == 1)
                                <button  class="btn-sm btn-round btn btn-success" disabled>Activo</button>
                              @elseif($item->estado == 0)
                                <button  class="btn-sm  btn-round btn btn-danger" disabled>Inactivo</button>
                              @endif
                            </center>
                          </td>
                          <td class="text-center">
                            <center>
                              <button type="button" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#editarPresentacion{{$item->cod_presentacion}}">
                                <i class="fa fa-pencil" aria-hidden="true"> </i>
                              </button>
                              <button class="btn btn-danger btn-sm  mx-2 eliminarPresentacion" action="{{ url('presentaciones/destroy',$item->cod_presentacion) }}"
                                method="DELETE" token="{{ csrf_token() }}" pagina="presentaciones">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </button>
                            </center>
                          </td>
                        </tr>
                            {{--modal editar  --}}
                            <div class="modal fade" id="editarPresentacion{{$item->cod_presentacion}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header modal-header-warning">
                                    <h4 class="modal-title" id="exampleModalLabel">Editar presentción</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="{{url('presentaciones/update', $item->cod_presentacion)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="form-group col-12"> 
                                          <label for="nombre">Nombre</label>
                                          <input value="{{$item->nombre_presentacion}}" type="text" class="form-control" id="nombre" name="nombre" onkeypress="return soloLetras(event)"  required>
                                        </div>      
                                      </div>
                                      <div class="row">
                                        <div class="form-group col-12"> 
                                          <label for="medida_id">Seleccione medida<span class="required">*</span></label>
                                          <select name="medida_id" class="form-control selectric">   
                                            @foreach($medida as $producto)
                                              @if($producto->cod_medida==$item->medida->cod_medida)
                                                <option value="{{$producto->cod_medida}}" selected>{{$producto->nombre_medida}}</option>
                                              @else
                                                <option value="{{$producto->cod_medida}}">{{$producto->nombre_medida}}</option>
                                              @endif
                                            @endforeach
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                      <button type="submit" class="btn btn-warning">EDITAR</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            {{-- fin modal --}}
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
    let tabla = 'table';
    let clase = 'eliminarPresentacion';
    let mensaje = "De elimnar a esta Presentación!";
    tableEs(tabla);
    eliminarPorRuta(mensaje,clase);
  </script>
@endsection
      