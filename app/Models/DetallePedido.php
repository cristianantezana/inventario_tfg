<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogo;

class DetallePedido extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_detalle_pedido';
    protected $table = 'detalle_pedido';
    protected $fillable = [  'cod_detalle_pedido','cod_pedido_detalle',
                            'cod_catalogo_detalle','cantidad_detalle','precio_detalle',
                            'estado','created_at','updated_at'
                          ];
    public function catalogo(){
      return $this->belongsTo(Catalogo::class,'cod_catalogo_detalle','cod_catalogo');
    }
}
