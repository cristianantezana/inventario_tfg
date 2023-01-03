<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Catalogo;
use App\Models\DetallePedido;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
  public function index(Request $request)

  {
      $nombre = $request->get('buscar');
      $pedidos = Pedido::where('estado', "=", "1")->where('n_pedido', 'like', '%'.$nombre.'%')
      ->orderBy('cod_pedido','desc')->get();
      return view('pedidos.index', compact('pedidos'));
  }

  public function create()
  {
    $clientes = Cliente::where('estado', '=', 1)->orderBy('cod_cliente', 'desc')->get();
    $pedidos = Pedido::select('n_pedido')->orderBy('cod_pedido', 'desc')->first();
    $numero_pedido = 1;
    if($pedidos->n_pedido > 0){  
      $numero_pedido = $pedidos->n_pedido +1; 
    }
   
    $inventario = Catalogo::where('estado', '=', 1)->where('stock', '>', 0)->orderBy('cod_catalogo', 'desc')->get();
    return view('pedidos.create', compact('clientes','inventario','numero_pedido'));
    
  }

  public function store(Request $request)
  {
    $pedido = new Pedido();
    $pedido->cod_cliente_ped = $request->input('cliente_id');
   
    $pedido->fecha_pedido = $request->input('fecha');
    $pedido->n_pedido = $request->input('n_pedido');
    $pedido->total_pedido = $request->input('tota_pedido');
    $pedido->save();

    $id_producto = $request->input('idproducto');
    $cantidad = $request->input('cantidad');
    $precio = $request->input('precio');
  
    $contador = 0;

    while($contador < count($id_producto)){
      $detalle = new DetallePedido();
      $detalle->cod_pedido_detalle = $pedido->cod_pedido;
      $detalle->cod_catalogo_detalle = $id_producto[$contador];
      $detalle->cantidad_detalle = $cantidad[$contador];
      $detalle->precio_detalle = $precio[$contador];
      $detalle->save();
      $contador = $contador+1;
    }
    return redirect()->route('pedidos.index')->with('mensaje', 'ok');
  }

  public function show($id)
  {
    $pedidos = Pedido::where("cod_pedido","=", $id)->get();
    $detalle_pedido = DetallePedido::where("cod_pedido_detalle","=",$id)->get();
    return view('pedidos.show', compact('pedidos','detalle_pedido'));
  }

  public function pdfPedido($id)
  {
    $pedidos = Pedido::where("cod_pedido","=", $id)->get();
    $detalle_pedido = DetallePedido::where("cod_pedido_detalle","=",$id)->get();
    //return view('pedidos.show', compact('pedidos','detalle_pedido'));
     $pdf = PDF::loadView('PDF_Example', compact('pedidos','detalle_pedido'));
     return $pdf->stream('Detalle_pedido');
  }

  public function update(Request $request, $id)
  {
    
  }

  public function destroy($id)
  {
    $pedido = Pedido::find($id);
    $pedido->estado ="0";
    $pedido->update();
    return redirect()->route('pedidos.index')->with('mensaje', 'ok');

  }
}
