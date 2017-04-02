<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Flash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$user = Auth::user();
        return view('user.index')->with(compact('user'));
    }

    public function store(Request $request)
    {
    	Validator::make($request->all(), [
			    'email' => 'required|email|max:255',
			    'nombre' => 'required',
			    'apellido_paterno' => 'required',
			    'password' => 'confirmed',
			])->validate();
    	$user = User::find(Auth::user()->id);
    	$user->nombre  = $request->input('nombre');
    	$user->email  = $request->input('email');
    	$user->apellido_paterno  = $request->input('apellido_paterno');
    	$user->apellido_materno  = $request->input('apellido_materno');
    	if ($request->input('password') != "")
    		$user->password  = Hash::make($request->input('password'));
    	$user->save();
    	Flash::message('Perfil actualizado correctamente');
    	return redirect(route('perfil'));
    }
}
