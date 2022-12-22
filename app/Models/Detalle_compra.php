<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_compra extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_detalle_compra';
    protected $table = 'detalle_compra';
    protected $fillable = [  'cod_detalle_compra','cod_compra_detalle',
                            'cod_catalogo_detalle','cantidad_compra','precio_compra','subtotal',
                            'estado','created_at','updated_at'
                          ];
}
