<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VentaAccion extends Model
{
	use SoftDeletes;

	public $table = 'venta_acciones';

	protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';


    public $fillable = [
        'empresa_id',
        'producto_id',
        'comprador_id',
        'comprador_rut',
        'comprador_nombre',
        'comprador_apellido_p',
        'comprador_apellido_m',
        'comprador_email',
        'cantidad_acciones',
        'valor_total',
        'valor_mas_comision'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empresa_id' => 'integer',
        'producto_id' => 'integer',
        'comprador_id' => 'integer',
        'comprador_rut' => 'string',
        'comprador_nombre' => 'string',
        'comprador_apellido_p' => 'string',
        'comprador_apellido_m' => 'string',
        'comprador_email' => 'string',
        'cantidad_acciones' => 'integer',
        'valor_total' => 'integer',
        'valor_mas_comision' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'producto_id' => 'required|exists:productos,id',
        'comprador_id' => 'required|exists:compradores,id',
        'comprador_rut' => 'required',
        'cantidad_acciones' => 'required',
        'valor_total' => 'required',
        'valor_mas_comision' => 'required'
    ];

    public function Empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class,'empresa_id','id');
    }

    public function Producto()
    {
        return $this->belongsTo(\App\Models\Producto::class,'producto_id','id');
    }

    public function Comprador()
    {
        return $this->belongsTo(\App\Models\Comprador::class,'comprador_id','id');
    }
}