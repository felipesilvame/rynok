<?php

namespace App;

use Eloquent as Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    public $table = 'users';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'nombre',
        'email',
        'password',
        'empresa_id',
        'perfil_id',
        'apellido_paterno',
        'apellido_materno',
        'habilitado'
    ];

    protected $casts = [
        'nombre' => 'string',
        'email' => 'string',
        'empresa_id' => 'integer',
        'perfil_id' => 'integer',
        'apellido_paterno' => 'string',
        'apellido_materno' => 'string',
        'habilitado' => 'boolean'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'nombre' => 'required',
        'email' => 'required|email|unique:users,email',
        'perfil_id' => 'required|exists:perfiles,id',
        'apellido_paterno' => 'required',
        'habilitado' => 'required'
    ];


    public function Perfil()
    {
        return $this->belongsTo(\App\Models\Perfil::class,'perfil_id','id');
    }

    public function Empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class,'empresa_id','id');
    }

        /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }
}
