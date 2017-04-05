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
        'vendedor_id',
        'comprador_id',
        'comprador_rut',
        'comprador_nombre',
        'comprador_apellido_p',
        'comprador_apellido_m',
        'comprador_email',
        'comprador_telefono',
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
        'vendedor_id' => 'integer',
        'comprador_id' => 'integer',
        'comprador_rut' => 'string',
        'comprador_nombre' => 'string',
        'comprador_apellido_p' => 'string',
        'comprador_apellido_m' => 'string',
        'comprador_email' => 'string',
        'cantidad_acciones' => 'integer',
        'comprador_telefono' => 'string',
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
        'vendedor_id' => 'required|exists:users,id',
        'comprador_rut' => 'required',
        'cantidad_acciones' => 'required|numeric',
        'valor_total' => 'required',
        'valor_mas_comision' => 'required'
    ];

    public function Empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class,'empresa_id','id');
    }

    public function Comprador()
    {
        return $this->belongsTo(\App\Models\Comprador::class,'comprador_id','id');
    }

    public function Vendedor()
    {
        return $this->belongsTo(\App\User::class,'vendedor_id','id');
    }
}