<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comprador extends Model
{
	use SoftDeletes;

	public $table = 'compradores';

	protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';


    public $fillable = [
        'nombre',
        'rut',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'telefono',
        'acciones_compradas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'rut' => 'string',
        'apellido_paterno' => 'string',
        'apellido_materno' => 'string',
        'email' => 'string',
        'telefono' => 'string',
        'acciones_compradas' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'rut' => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'email' => 'required|email',
        'telefono' => 'required',
        'acciones_compradas' => 'numeric'
    ];

    public function Acciones()
    {
        return $this->hasMany(\App\Models\AccionesComprador::class,'comprador_id','id');
    }

    //muestra las compras realizadas por el comprador
    public function Compras()
    {
        return $this->hasMany(\App\Models\VentaAccion::class,'comprador_id','id');
    }
}