<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
	use SoftDeletes;
	public $table = 'regiones';

	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
    	'region_nombre',
    	'region_ordinal',
    	'region_cardinal',
    ];

    protected $casts = [
    	'region_nombre' => 'string',
    	'region_ordinal' => 'string',
    	'region_cardinal' => 'string'
    ];

    public static $rules = [
        'region_nombre' => 'required',
        'region_ordinal' => 'required',
        'region_cardinal' => 'required'
    ];
}
