@extends('admin.app')
@section('contenido')

  <div class="card card-default">
    <div class="px-6 py-4">
      <section class="section">
        <div class="section-header modal-header-primary">
            <h4 class="page__heading">Nuevo pedido</h4>
        </div>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card card-primary">
                <div class="card-body">            
                  <form action="{{ route('pedidos.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <input type="text" name="id"  @if(session('persona'))value="{{ session('persona.cod_persona')}}" @endif hidden >
                    <div class="row ">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Cliente<span class="required"></span></label>
                            <select name="cliente_id" class="form-control selectric">    
                              @foreach($clientes as $cliente)       
                                  <option value="{{$cliente->cod_cliente}}">{{$cliente->persona->nombre.' '.$cliente->persona->apellido}}</option>
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
                            <label for="nombre">N. de pedido<span class="required"></span></label>
                            <input  type="text" value="{{$numero_pedido}}"  class="form-control" id="n_pedido" name="n_pedido" required>
                        </div>
                      </div>         
                    </div>
                    <hr>                 
                    <div class="row ">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="nombre">Productos<span class="required"></span></label>
                          <select name="pedido_id" class="form-control selectric picker" id="p_inventario">    
                            @foreach($inventario as $cliente)       
                                <option value="{{$cliente->cod_catalogo}}_{{$cliente->stock}}_{{$cliente->precio_venta}}">{{$cliente->producto->nombre_producto}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <label for="nombre">Precio<span class="required"></span></label>
                        <div class="form-group">
                          <input type="text"    class="form-control" id="precio_pedido" name="precio_pedido" disabled     required>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <label for="nombre">Stock<span class="required"></span></label>
                        <div class="form-group">
                          <input type="number"    class="form-control" id="stock" name="stock" disabled   required>
                        </div>
                      </div>   
                      <div class="col-md-2">
                        <label for="nombre">Cantidad<span class="required"></span></label>
                        <div class="form-group">
                          <input type="number" min="1"   class="form-control" id="cantidad" name="cantidad"  required>
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
                          <th class="text-center"  scope="col"><h5 style="color: black" id="total">Bs/ 0.00</h5> <input type="hidden" name="tota_pedido" id="total_pedido"></th>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="col-md-12" id="guardar">             
                      <button type="submit"  class="btn btn-primary guardar">Guardar</button>
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
      evaluar();
      $("#agregar").click(function(){agregar();});
      $('.selectric').select2({ width: '100%',});    
    });
    $("#p_inventario").change(mostrarValores);
    function mostrarValores(){
      let datosProducto = document.getElementById("p_inventario").value.split('_');
      $("#precio_pedido").val(datosProducto[2]);
      $("#stock").val(datosProducto[1]);
    }
    var contador = 0;          
    var total = 0;
    var subtotal = [];
    var ids=[];
    function agregar(){
      let datosProducto = document.getElementById("p_inventario").value.split('_');
      let cantidad = $("#cantidad").val();
      let precio = $("#precio_pedido").val();
      let stock = $("#stock").val();
      let producto = $("#p_inventario option:selected").text();
      let producto_id = datosProducto[0];
      if(cantidad > 0 && producto != "" && precio != ""){    
        if(cantidad <= parseInt(stock)){
          subtotal[contador]=(cantidad*precio);       
          console.log(contador);
          let fila = `<tr class="selected" id="fila${contador}">
                        <td class="text-center">
                          <input type="hidden"  name="cantidad[]" value="${cantidad}">${cantidad}
                        </td>
                        <td class="text-center">
                          <input   id="pepe" type="hidden" name="idproducto[]" value="${producto_id}">${producto}
                        </td>
                        <td class="text-center">
                          <input type="hidden"  name="precio[]" value="${precio}">${precio}
                        </td>
                        <td class="text-center">
                          <input type="hidden" name="subtotal[]" value="${subtotal[contador]}">${subtotal[contador]}
                        </td>
                        <td class="text-center">
                          <button class="btn btn-danger btn-sm mx-2" onclick="eliminar(${contador},${producto_id})">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                      </tr>`;
          let cantidad_ingreso = document.querySelectorAll('input[name="idproducto[]"]');
          if(ids.includes(producto_id))
          {
            Swal.fire({
              icon: 'error',
              title: 'Producto ya existente en la lista',
              text: 'El producto ya se encuentra en la lista de pedido',
            })           
          }
          else
          {
            total = total+subtotal[contador];
            ids.push(producto_id);
            contador++;
            
            $("#total_pedido").val(total);
            $("#total").html("Bs/." + total);
            evaluar();
            $("#table").append(fila);
          } 
        }else{
          Swal.fire({
            icon: 'error',
            title: 'La cantidad es mayor al stock del producto',
            text: 'La cantidad solicitada del producto no hay en almacen  !',
          })
        } 
      }else{
        Swal.fire({
            icon: 'error',
            title: 'Ingrese una cantidad',
            text: 'Ingresar una cantidad en el campo no puede estar vacio!',
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
     function eliminar(index,pepe){
      total = total-subtotal[index];
      $("#total_pedido").val(total);
      $("#total").html("Bs/." + total);
      $("#fila" + index).remove();
      var str = pepe.toString(); 
      var myIndex = ids.indexOf(str);
      if (myIndex !== -1) {
        ids.splice(myIndex, 1);
      }
       evaluar();
     }
</script>
@endsection


   