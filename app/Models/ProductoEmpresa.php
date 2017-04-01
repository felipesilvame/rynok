<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoEmpresa extends Model
{
	use SoftDeletes;

	public $table = 'producto_empresas';

	protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';


    public $fillable = [
        'empresa_id',
        'descripcion',
        'precio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empresa_id' => 'integer',
        'descripcion' => 'string',
        'precio' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'descripcion' => 'required',
        'precio' => 'numeric|required'
    ];

    public function Empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class,'empresa_id','id');
    }
}