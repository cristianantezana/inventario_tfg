@extends('admin.app')
@section('contenido')

  <div class="card card-default">
    <div class="px-6 py-4">
      <section class="section">
        <div class="section-header modal-header-primary">
            <h4 class="page__heading">Nueva compra</h4>
        </div>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card card-primary">
                <div class="card-body">
              
                  <form action="{{ route('compras.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <input type="text" name="id"  @if(session('persona'))value="{{ session('persona.cod_persona')}}" @endif hidden >
                    <div class="row ">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Proveedor<span class="required"></span></label>
                            <select name="proveedor_id" class="form-control selectric">    
                              @foreach($proveedores as $cliente)       
                                  <option value="{{$cliente->cod_proveedor}}">{{$cliente->persona->nombre.' '.$cliente->persona->apellido}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                            <label for="nombre">Fecha<span class="required"></span></label>
                            <input  type="date"   class="form-control" id="fecha" name="fecha" required>
                        </div>
                      </div> 
                      <div class="col-md-2">
                        <div class="form-group">
                            <label for="nombre">N. Factura<span class="required"></span></label>
                            <input type="number" min="0"   class="form-control" id="factura" name="factura"   required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Descripcion<span class="required"></span></label>
                            <input type="text" onkeypress="return soloLetras(event)" class="form-control" id="descripcion" name="descripcion"   required>
                        </div>
                      </div>         
                    </div>
                    <hr>                 
                    <div class="row ">
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="nombre">Productos<span class="required"></span></label>
                            <select name="pedido_id" class="form-control selectric" id="producto">    
                              @foreach($inventario as $cliente)       
                                  <option value="{{$cliente->cod_catalogo}}">{{$cliente->producto->nombre_producto}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                     
                      <div class="col-md-2">
                        <label for="nombre">Precio compra<span class="required"></span></label>
                        <div class="form-group">
                          <input type="number" min="0"   class="form-control" id="precio" name="stock"   required>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <label for="nombre">Cantidad<span class="required"></span></label>
                        <div class="form-group">
                          <input type="number"  min="0"  class="form-control" id="cantidad"   required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label for="nombre">.<span class="required"></span></label>
                        <div class="form-group">
                            
                            <button type="button" style=" color: white; font-weight: bold;" class="btn btn-primary" id="agregar">
                              Agregar producto  <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
                            </button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped table-hover" id="table">
                        <thead class="bg-info">
                            <tr>
                              <th class="text-center"  style="color: #fff; width: 20px;" scope="col">CANTIDAD</th>
                              <th class="text-center"  style="color: #fff;" scope="col">PRODUCTO</th>
                              <th class="text-center"  style="color: #fff; width: 80px;" scope="col">PRECIO U.</th>
                              <th class="text-center"  style="color: #fff;" scope="col">SUBTOTAL</th>
                              <th class="text-center"  style="color: #fff;" scope="col">OPCIONES</th>
                             
                              </tr>
                        </thead>
                  
                        <tbody id="data_persona">
                         
                        </tbody>
                        <tfoot>
                          <th class="text-center" style="color: black" scope="col">TOTAL</th>
                          <th class="text-center"  scope="col"></th>
                          <th class="text-center"  scope="col"></th>
                          <th class="text-center"  scope="col"><h5 style="color: black" id="total">Bs/ 0.00</h5></th>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="col-md-12" id="guardar">
                      
                      <button type="submit"  class="btn btn-primary guardar">Guardar</button>
                      <a class="btn btn-danger" href="{{route('clientes.index')}}">Volver</a>
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
      $("#agregar").click(function(){
        agregar();
        
      });
      $('.selectric').select2({ 
width: '100%',
});    
    
    
  });
  var contador = 0;          
     var total = 0;
     var subtotal = [];

    function agregar(){
      let cantidad = $("#cantidad").val();
      let precio = $("#precio").val();
      
      let producto = $("#producto option:selected").text();
      let producto_id = $("#producto").val();
      if( producto  != "" && precio > 0 && cantidad > 0 ){
        subtotal[contador]=(cantidad*precio);
        total = total+subtotal[contador];
        let fila = `<tr class="selected" id="fila${contador}">
                    
                      <td class="text-center"><input type="hidden"   name="cantidad[]" value="${cantidad}">${cantidad}</td>
                      <td class="text-center"><input  class="form-control text-center" type="hidden" name="idproducto[]" value="${producto_id}">${producto}</td>
                      <td class="text-center"><input type="hidden"   name="precio[]" value="${precio}">${precio}</td>
                      <td class="text-center"><input type="hidden""   name="subtotal[]" value="${subtotal[contador]}">${subtotal[contador]}</td>
                      <td class="text-center"><button class="btn btn-danger btn-sm mx-2" onclick="eliminar(${contador})">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </button>
                      </td>
                    </tr>`;
        contador++;
        $("#total").html("Bs/." + total);
        evaluar();
        $("#table").append(fila);
      }else{
        Swal.fire({
            icon: 'error',
            title: 'Ingrese una cantidad o un precio',
            text: 'Ingresar una cantidad los campos no puede ser 0!',
          })
       
      }
    }

     function evaluar(){
       if(total > 0){
         $("#guardar").show();
       }else{
        $("#guardar").hide();
       }
     }
evaluar();
     function eliminar(index){
       total = total-subtotal[index];
       $("#total").html("Bs/." + total);
       $("#fila" + index).remove();
       evaluar();
     }
</script>
@endsection


   