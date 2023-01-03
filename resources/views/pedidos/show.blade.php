@extends('admin.app')
@section('contenido')
  <div class="card card-default">
    <div class="px-6 py-4">
      <section class="section">
        <div class="section-header modal-header-primary">
            <h4 class="page__heading">Detalle del pedido</h4>
        </div>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card card-primary">
                <div class="card-body">    
                    
                    <input type="text" name="id"  @if(session('persona'))value="{{ session('persona.cod_persona')}}" @endif hidden >
                    <div class="row " style="padding-left: 20px;">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Cliente<span class="required"></span></label>
                            @foreach ($pedidos as $pedido)
                              <p>{{$pedido->cliente->persona->nombre.' '.$pedido->cliente->persona->apellido}}</p>
                            @endforeach    
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                            <label for="nombre">Fecha<span class="required"></span></label>
                            @foreach ($pedidos as $pedido)
                            <p>{{$pedido->fecha_pedido}}</p>
                          @endforeach
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                            <label for="nombre">N. de pedido<span class="required"></span></label>
                            @foreach ($pedidos as $pedido)
                            <p>{{$pedido->n_pedido}}</p>
                          @endforeach
                        </div>
                      </div>         
                    </div>  
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped table-hover" id="table">
                        <thead class="bg-primary">
                            <tr>                          
                                <th class="text-center"  style="color: #fff; width: 20px;" scope="col">CANTIDAD</th>
                                <th class="text-center"  style="color: #fff;" scope="col">PRODUCTO</th>
                                <th class="text-center"  style="color: #fff; width: 80px;" scope="col">PRECIO U.</th>
                                <th class="text-center"  style="color: #fff;" scope="col">SUBTOTAL</th> 
                              </tr>
                        </thead> 
                        <?php $total = 0?>
                        <tbody id="data_persona">
                          @foreach ($detalle_pedido as $detalle)
                            <?php $subtotal = $detalle->precio_detalle * $detalle->cantidad_detalle?>
                          <tr>
                            <td class="text-center">{{$detalle->cantidad_detalle}}</td>
                            <td class="text-center">{{$detalle->catalogo->producto->nombre_producto}}</td>
                            <td class="text-center">{{$detalle->precio_detalle}}</td>
                            <td class="text-center"><?php echo $subtotal ?></td>
                          </tr>
                         <?php $total = $total + $subtotal ;?>
                        @endforeach 
                        </tbody>
                        <tfoot>
                          <th class="text-center" style="color: black" scope="col">TOTAL</th>
                          <th class="text-center"  scope="col"></th>
                          <th class="text-center"  scope="col"></th>
                          <th class="text-center"  scope="col"><h5 style="color: black" id="total"> <?php echo $total ?>/Bs</h5> <input type="hidden" name="tota_pedido" id="total_pedido"></th>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="col-md-12" id="guardar">              
                      <a class="btn btn-danger" href="{{route('pedidos.index')}}">Volver</a>
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



   