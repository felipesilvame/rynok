<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
	use SoftDeletes;
	public $table = 'provincias';

	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
    	'provincia_nombre',
    	'region_id',
    ];

    protected $casts = [
    	'provincia_nombre' => 'string',
    	'region_id' => 'integer',
    ];

    public static $rules = [
        'provincia_nombre' => 'required',
        'region_id' => 'required|exists:blobel_states,id',
    ];

    public function Region(){
        return $this->belongsTo(\App\Models\Region::class,'region_id','id');
    }
}
