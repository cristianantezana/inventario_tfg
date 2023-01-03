<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Catalogo;
use App\Models\Detalle_compra;
use Barryvdh\DomPDF\Facade\Pdf;
class CompraController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:Compraindex'])->only('index');
    $this->middleware(['permission:Compracreate'])->only('create');
 
  }

  public function index(Request $request)
  {
    $nombre = $request->get('buscar');
    $compras = Compra::where('estado', "=", "1")->where('n_factura', 'like', '%'.$nombre.'%')->orderBy('cod_compra','desc')->get();
    return view('compras.index', compact('compras'));
  }

  public function create()
  {
    $proveedores = Proveedor::where('estado', '=', 1)->orderBy('cod_proveedor', 'desc')->get();
    $inventario = Catalogo::where('estado', '=', 1)->orderBy('cod_catalogo', 'desc')->get();
    return view('compras.create', compact('proveedores','inventario'));
  }

  public function store(Request $request)
  {
    $compra = new Compra();
    $compra->cod_proveedor_com = $request->input('proveedor_id');
    $compra->n_factura = $request->input('factura');
    $compra->descripcion = $request->input('descripcion');
    $compra->fecha = $request->input('fecha');
    $compra->save();

    $id_producto = $request->input('idproducto');
    $cantidad = $request->input('cantidad');
    $precio = $request->input('precio');
    $subtotal = $request->input('subtotal');

    $contador = 0;

    while($contador < count($id_producto)){
      $detalle = new Detalle_compra();
      $detalle->cod_compra_detalle = $compra->cod_compra;
      $detalle->cod_catalogo_detalle = $id_producto[$contador];
      $detalle->cantidad_compra = $cantidad[$contador];
      $detalle->precio_compra = $precio[$contador];
      $detalle->subtotal =   $subtotal[$contador];
      $detalle->save();
      $contador = $contador+1;
    }
    return redirect()->route('compras.index')->with('mensaje', 'ok');
  }

  public function show($id)
  {
    $pedidos = Compra::where("cod_compra","=", $id)->get();
    $detalle_pedido = Detalle_compra::where("cod_compra_detalle","=",$id)->get();
    return view('compras.show', compact('pedidos','detalle_pedido'));
  }
  public function pdfCompra($id)
  {
    $pedidos = Compra::where("cod_compra","=", $id)->get();
    $detalle_pedido = Detalle_compra::where("cod_compra_detalle","=",$id)->get();
    $pdf = PDF::loadView('pdf.pdf_compras', compact('pedidos','detalle_pedido'));
    return $pdf->stream('Detalle_compra');
  }
  public function edit($id)
  {
    
  }

  public function update(Request $request, $id)
  {
    
  }

  public function destroy($id)
  {
    
  }
}
