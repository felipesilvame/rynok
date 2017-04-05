<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaAccion;
use App\Models\Comprador;
use Carbon\Carbon;

class SaleDayController extends Controller
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

    public function index(Request $request){
    	$fecha = new Carbon($request->input('fecha', Carbon::now()->toDateString()));
    	//dd($fecha);
    	$ventaAcciones = VentaAccion::whereNull('deleted_at')
    	->orderBy('created_at','desc')
    	->whereDate('created_at', $fecha->toDateString())->paginate(10);
    	$ventaAcciones->appends($request->except('page'));
    	return view('ventaDia.index')->with(compact('ventaAcciones','fecha'));
    }
}
