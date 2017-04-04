<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Models\Comuna;
use App\Http\Requests;
use App\Models\Comprador;

class InformationController extends Controller
{
	    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('get_info_rut');
    }

	public function get_cities(Request $request, $cardinal){
		$Ciudades = Provincia::whereNull('provincias.deleted_at')
					->join('regiones','provincias.region_id','=','regiones.id')
					->where('region_cardinal','LIKE',$cardinal)
					->select('provincias.id as id','provincias.provincia_nombre')
					->get();
		return $Ciudades->toJson();
	}

	public function get_towns(Request $request, $id){
		$Comunas = Comuna::whereNull('comunas.deleted_at')
			->join('provincias','comunas.provincia_id','=','provincias.id')
			->where('provincias.id','=',$id)
			->select('comunas.id as id','comunas.comuna_nombre')
			->get();
		return $Comunas->toJson();
	}

	public function get_info_rut(Request $request, $rut){
		$Comprador = Comprador::whereNull('deleted_at')
						->where('rut','LIKE',$rut)->first();
		if ($Comprador != null)
			return $Comprador->makeHidden('acciones_compradas')->toJson();
		else return response()->json([]);
	}
}
