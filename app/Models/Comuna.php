<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comuna extends Model
{
	use SoftDeletes;
	public $table = 'comunas';

	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
    	'comuna_nombre',
    	'provincia_id',
    ];

    protected $casts = [
    	'comuna_nombre' => 'string',
    	'provincia_id' => 'integer',
    ];

    public static $rules = [
        'comuna_nombre' => 'required',
        'provincia_id' => 'required|exists:blobel_cities,id',
    ];

    public function Provincia()
    {
        return $this->belongsTo(\App\Models\Provincia::class, 'provincia_id','id');
    }
}
