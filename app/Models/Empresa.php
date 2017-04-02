<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
	use SoftDeletes;

	public $table = 'empresas';

	protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';


    public $fillable = [
        'nombre',
        'acciones_disponibles_p_vender',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'acciones_disponibles_p_vender' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'acciones_disponibles_p_vender' => 'required|numeric',
        'email' => 'nullable|email'
    ];
}