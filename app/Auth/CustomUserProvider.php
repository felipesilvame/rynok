<?php

namespace App\Auth;

use App\Models\Blobel\BlobelUser;
use Carbon\Carbon; 
use Illuminate\Auth\GenericUser; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

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


    $qry = BlobelUser::whereNull('deleted_at')->where('Userid','=',$identifier);

    if($qry->count() >0)
    {
        $user = $qry->select('Userid','UserDNI', 'UserAccountName', 'UserName', 'UserLastName', 'UserPassword', 'Profileid','UserEnabled','UserPriceEnabled', 'created_at')->first();

        $attributes = array(
            'Userid' => $user->Userid,
            'UserAccountName' => $user->UserAccountName,
            'UserPassword' => $user->UserPassword,
            'UserName' => $user->UserName,
            'Profileid' => $user->Profileid,
            'created_at' => $user->created_at,
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
    $qry = BlobelUser::whereNull('deleted_at')->where('Userid','=',$identifier)->where('UserToken','=',$token);

    if($qry->count() >0)
    {
        $user = $qry->select('Userid','UserDNI', 'UserAccountName', 'UserName', 'UserLastName', 'UserPassword', 'Profileid','UserEnabled','UserPriceEnabled', 'created_at')->first();

        $attributes = array(
            'Userid' => $user->Userid,
            'UserAccountName' => $user->UserAccountName,
            'UserPassword' => $user->UserPassword,
            'UserName' => $user->UserName,
            'Profileid' => $user->Profileid,
            'created_at' => $user->created_at,
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

    $qry = BlobelUser::whereNull('deleted_at')->where('UserDNI','=',$credentials['rut']);
    if($qry->count() >0)
    {
        $user = $qry->select('Userid','UserDNI','UserAccountName','UserName','UserLastName','UserPassword', 'Profileid','UserEnabled','UserPriceEnabled' , 'created_at')->first();
        



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

    if($user->UserDNI == $credentials['rut'] && Hash::check($credentials['password'],$user->getAuthPassword()))
    {

        //$user->last_login_time = Carbon::now();
        //$user->save();

        return true;
    }
    return false;


}
}