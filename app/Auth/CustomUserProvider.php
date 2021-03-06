<?php

namespace App\Auth;

use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Auth\GenericUser; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Flash;

class CustomUserProvider implements UserProvider {

/**
 * Retrieve a user by their unique identifier.
 *
 * @param  mixed $identifier
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
public function retrieveById($identifier)
{
    // TODO: Implement retrieveById() method.


    $qry = User::whereNull('deleted_at')->where('id','=',$identifier);

    if($qry->count() >0)
    {
        $user = $qry->select('id','empresa_id', 'perfil_id', 'nombre', 'apellido_paterno', 'apellido_materno', 'email','password','habilitado', 'created_at')->first();

        $attributes = array(
            'id' => $user->id,
            'empresa_id' => $user->empresa_id,
            'perfil_id' => $user->perfil_id,
            'nombre' => $user->nombre,
            'apellido_paterno' => $user->apellido_paterno,
            'apellido_materno' => $user->apellido_materno,
            'email' => $user->email,
            'habilitado' => $user->habilitado,
            'created_at' => $user->created_at
        );

        return $user;
    }
    return null;
}

/**
 * Retrieve a user by by their unique identifier and "remember me" token.
 *
 * @param  mixed $identifier
 * @param  string $token
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
public function retrieveByToken($identifier, $token)
{
    // TODO: Implement retrieveByToken() method.
    $qry = User::whereNull('deleted_at')->where('id','=',$identifier)->where('remember_token','=',$token);

    if($qry->count() >0)
    {
        $user = $qry->select('id','empresa_id', 'perfil_id', 'nombre', 'apellido_paterno', 'apellido_materno', 'email','password','habilitado', 'created_at')->first();

        $attributes = array(
            'id' => $user->id,
            'empresa_id' => $user->empresa_id,
            'perfil_id' => $user->perfil_id,
            'nombre' => $user->nombre,
            'apellido_paterno' => $user->apellido_paterno,
            'apellido_materno' => $user->apellido_materno,
            'email' => $user->email,
            'habilitado' => $user->habilitado,
            'created_at' => $user->created_at
        );

        return $user;
    }
    return null;



}

/**
 * Update the "remember me" token for the given user in storage.
 *
 * @param  \Illuminate\Contracts\Auth\Authenticatable $user
 * @param  string $token
 * @return void
 */
public function updateRememberToken(Authenticatable $user, $token)
{
    // TODO: Implement updateRememberToken() method.
    $user->setRememberToken($token);

    $user->save();

}


/**
 * Retrieve a user by the given credentials.
 *
 * @param  array $credentials
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
public function retrieveByCredentials(array $credentials)
{
    // TODO: Implement retrieveByCredentials() method.

    $qry = User::whereNull('deleted_at')->where('email','=',$credentials['email']);
    if($qry->count() >0)
    {
        $user = $qry->select('id','empresa_id', 'perfil_id', 'nombre', 'apellido_paterno', 'apellido_materno', 'email','password','habilitado', 'created_at')->first();

        return $user;
    }
    return null;


}

/**
 * Validate a user against the given credentials.
 *
 * @param  \Illuminate\Contracts\Auth\Authenticatable $user
 * @param  array $credentials
 * @return bool
 */
public function validateCredentials(Authenticatable $user, array $credentials)
{
    // TODO: Implement validateCredentials() method.
    // we'll assume if a user was retrieved, it's good

    if($user->email == $credentials['email'] && Hash::check($credentials['password'],$user->getAuthPassword()))
    {
        if ($user->habilitado)
            return true;
        else{
            Flash::error('Error, ud. se encuentra deshabilitado. Por favor, contacte al administrador.');
            return false;
        }
        //$user->last_login_time = Carbon::now();
        //$user->save();

        
    }
    return false;


}
}