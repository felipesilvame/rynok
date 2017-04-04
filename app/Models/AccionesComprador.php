<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccionesComprador extends Model
{
	use SoftDeletes;

	public $table = 'comprador_acciones_empresas';

	protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';


    public $fillable = [
        'comprador_id',
        'empresa_id',
        'acciones_compradas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empresa_id' => 'integer',
        'comprador_id' => 'integer',
        'acciones_compradas' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'comprador_id' => 'required|exists:compradores,id',
    ];

    public function Empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class,'empresa_id','id');
    }
    public function Comprador()
    {
        return $this->belongsTo(\App\Models\Comprador::class,'comprador_id','id');
    }
}