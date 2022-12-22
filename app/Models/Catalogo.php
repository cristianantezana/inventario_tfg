<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\PedidoCatalogo;

class Catalogo extends Model
{
  use HasFactory;
  protected $primaryKey = 'cod_catalogo';
  protected $table = 'catalogo';
  protected $fillable = [  'cod_catalogo','cod_producto_cata',
                          'cod_promocion_cat','lote','stock','fecha_vencimiento',
                          'precio_venta','estado','created_at','update_at'
                        ];
  //relaciones 

  public function producto(){
    return $this->belongsTo(Producto::class,'cod_producto_cata','cod_producto');
  }
          
}
