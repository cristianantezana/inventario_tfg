<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Catalogo;
class PedidoController extends Controller
{
  public function index()
  {
      $pedidos = Pedido::where('estado', "=", "1")->orderBy('cod_pedido','desc')->get();
      return view('pedidos.index', compact('pedidos'));
  }

  public function create()
  {
    $clientes = Cliente::where('estado', '=', 1)->orderBy('cod_cliente', 'desc')->get();
    $inventario = Catalogo::where('estado', '=', 1)->orderBy('cod_catalogo', 'desc')->get();
    return view('pedidos.create', compact('clientes','inventario'));
  }

  public function store(Request $request)
  {
    
  }

  public function show($id)
  {
    
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
