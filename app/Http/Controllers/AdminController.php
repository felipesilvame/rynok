<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Perfil;
use App\User;
use Auth;
use Flash;
use Hash;

class AdminController extends Controller
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

    public function crearEmpresa(Request $request)
    {
    	if (Auth::user()->isAdmin()){
    		return view('admin.empresa.nuevo');
    	}
    	else{
    		abort(403, 'No autorizado');
    	}
    }

    public function storeEmpresa(Request $request){
    	if (Auth::user()->isAdmin()){
	    	//validacion de datos
	    	$this->validate($request, Empresa::$rules);
	    	$empresa = Empresa::create([
	    		'nombre' => $request->input('nombre'),
	    		'email' => $request->input('email'),
	    		'acciones_disponibles_p_vender' => $request->input('acciones_disponibles_p_vender')
	    		]);
	    	Flash::message('Empresa creada satisfactoriamente');
	    	return redirect(url('/home'));
	    }
	    else{
	    	abort(403, 'No autorizado');
	    }

    }

    public function verEmpresas(Request $request)
    {
    	if (Auth::user()->isAdmin()){
    		$empresas = Empresa::whereNull('deleted_at')
    					->orderBy('acciones_disponibles_p_vender','desc')
    					->get();
    		return view('admin.empresa.ver')->with(compact('empresas'));
    	}else{
    		abort(403,'No autorizado');
    	}

    }

    public function crearUsuario(Request $request)
    {
    	if (Auth::user()->isAdmin()){
    		//obtener empresas y los perfiles
    		$perfiles = Perfil::whereNull('deleted_at')->pluck('descripcion','id');
    		$empresas = Empresa::whereNull('deleted_at')->pluck('nombre','id');
    		$empresas->prepend('(Ninguna)','0');
    		return view('admin.usuario.nuevo')->with(compact('perfiles','empresas'));
    	}
    	else{
    		abort(403, 'No autorizado');
    	}
    }

    public function storeUsuario(Request $request){
    	if (Auth::user()->isAdmin()){
	    	//validacion de datos
	    	$this->validate($request, User::$rules);
	    	$empresa_id = $request->input('empresa_id') == '0' ? null : $request->input('empresa_id');
	    	$usuario = User::create([
	    		'nombre' => $request->input('nombre'),
	    		'email' => $request->input('email'),
	    		'empresa_id' => $empresa_id,
	    		'perfil_id' => $request->input('perfil_id'),
	    		'apellido_paterno' => $request->input('apellido_paterno'),
	    		'apellido_materno' => $request->input('apellido_materno'),
	    		'habilitado' => $request->input('habilitado'),
	    		'password' => Hash::make($request->input('password')),
	    		]);
	    	Flash::message('Usuario creado satisfactoriamente');
	    	return redirect(url('/home'));
	    }
	    else{
	    	abort(403, 'No autorizado');
	    }

    }

    public function verUsuarios(Request $request)
    {
    	if (Auth::user()->isAdmin()){
    		$usuarios = User::whereNull('deleted_at')
    					->orderBy('id','asc')
    					->get();
    		return view('admin.usuario.ver')->with(compact('usuarios'));
    	}else{
    		abort(403,'No autorizado');
    	}

    }
}
