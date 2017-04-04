<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVentaAccionRequest;
use App\Http\Requests\UpdateVentaAccionRequest;
use App\Repositories\VentaAccionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Region;
use App\Models\Comprador;
use App\Models\AccionesComprador;
use Validator;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Redirect;

class VentaAccionController extends AppBaseController
{

    /** @var  VentaAccionRepository */
    private $ventaAccionRepository;

    public function __construct(VentaAccionRepository $ventaAccionRepo)
    {
        $this->middleware('auth');
        $this->ventaAccionRepository = $ventaAccionRepo;
    }

    /**
     * Display a listing of the VentaAccion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ventaAccionRepository->pushCriteria(new RequestCriteria($request));
        $ventaAccions = $this->ventaAccionRepository->all();

        return view('venta_accions.index')
            ->with('ventaAccions', $ventaAccions);
    }

    /**
     * Show the form for creating a new VentaAccion.
     *
     * @return Response
     */
    public function create()
    {
        $Empresas = Empresa::whereNull('deleted_at')->pluck('nombre','id');
        $Regiones = Region::whereNull('deleted_at')->pluck('region_nombre', 'region_cardinal')->all();
        return view('venta_accions.create')->with(compact('Empresas','Regiones'));
    }

    /**
     * Store a newly created VentaAccion in storage.
     *
     * @param CreateVentaAccionRequest $request
     *
     * @return Response
     */
    public function store(CreateVentaAccionRequest $request)
    {
        $input = $request->all();
        //validate info from comprador
        Validator::make($input, [
            'comprador_nombre' => 'required',
            'comprador_rut' => 'required',
            'comprador_apellido_p' => 'required',
            'comprador_apellido_m' => 'required',
            'comprador_email' => 'required|email',
            'comprador_telefono' => 'required',
        ])->validate();
        $Comprador = Comprador::firstOrNew([
            'rut' => $input['comprador_rut']
            ]);

        if ($Comprador->exists) {
            //revisar si excedio el maximo posible por empresa
            $AccionesComprador = AccionesComprador::firstOrNew([
                'empresa_id' => $input['empresa_id'],
                'comprador_id' => $Comprador->id
                ]);
            if ($AccionesComprador->exists) {
                //si tenía acciones de esta empresa anteriormente
                if ($AccionesComprador->acciones_compradas + $input['cantidad_acciones'] > 100) {
                    //y supera ese limite
                    return Redirect::back()->withErrors(['Este comprador supera la cantidad máxima de acciones posibles']);
                }
                else{
                    //si no supera el limite, añadir la suma
                    //$AccionesComprador->acciones_compradas += $input('cantidad_acciones');
                }
            }else{
                //si nunca antes habia comprado
                if ($input['cantidad_acciones'] > 100) {
                    return Redirect::back()->withErrors(['Este comprador supera la cantidad máxima de acciones posibles']);
                }
            }

        } else {
            // user created from 'new'; does not exist in database.
            if ($input['cantidad_acciones'] > 100) {
                    return Redirect::back()->withErrors(['Este comprador supera la cantidad máxima de acciones posibles']);
                }
        }

        //verificar que la empresa tenga las suficientes acciones para vender
        $Empresa = Empresa::findOrFail((integer)$input['empresa_id']);
        if ($Empresa->acciones_disponibles_p_vender - $input['cantidad_acciones'] < 0) {
            return Redirect::back()->withErrors(['La empresa no tiene la cantidad suficiente de acciones para vender']);
        }

        //TODO LISTO! las acciones no superan el limite por persona, y la empresa tiene las acciones para realizar la venta
        //setear el valor por accion y el valor mas comision, por si algun chistosito quiere modificar el javascript
        $acciones = $input['cantidad_acciones'];
        $comision = 2.0/100.0;
        $valor_total = (integer) $acciones * 1000;
        $valor_con_comision = (integer) round($valor_total + $valor_total*$comision);
        $input['valor_total'] = (string) $valor_total;
        $input['valor_mas_comision'] = (string) $valor_con_comision;

        //actualiza los datos en caso de...
        $Comprador->nombre = $input['comprador_nombre'];
        $Comprador->apellido_paterno = $input['comprador_apellido_p'];
        $Comprador->apellido_materno = $input['comprador_apellido_m'];
        $Comprador->email = $input['comprador_email'];
        $Comprador->telefono = $input['comprador_telefono'];
        $Comprador->direccion = $input['comprador_direccion'];
        $Comprador->comuna = $input['comprador_comuna'];
        $Comprador->provincia = $input['comprador_provincia'];
        $Comprador->region = $input['comprador_region'];
        $Comprador->save();
        $input['comprador_id'] = $Comprador->id;
        //dd($input);
        //se genera el registro
        $ventaAccion = $this->ventaAccionRepository->create($input);
        //se descuenta a la empresa
        $Empresa->acciones_disponibles_p_vender -= $input['cantidad_acciones'];
        $Empresa->save();

        //se suma al comprador
        $AccionesComprador->acciones_compradas += $input['cantidad_acciones'];
        $AccionesComprador->save();
        $Comprador->acciones_compradas += $input['cantidad_acciones'];

        $Comprador->save();

        Flash::success('Venta Accion saved successfully.');

        return redirect(route('ventaAccions.index'));
    }

    /**
     * Display the specified VentaAccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ventaAccion = $this->ventaAccionRepository->findWithoutFail($id);

        if (empty($ventaAccion)) {
            Flash::error('Venta Accion not found');

            return redirect(route('ventaAccions.index'));
        }

        return view('venta_accions.show')->with('ventaAccion', $ventaAccion);
    }

    /**
     * Show the form for editing the specified VentaAccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ventaAccion = $this->ventaAccionRepository->findWithoutFail($id);

        if (empty($ventaAccion)) {
            Flash::error('Venta Accion not found');

            return redirect(route('ventaAccions.index'));
        }

        return view('venta_accions.edit')->with('ventaAccion', $ventaAccion);
    }

    /**
     * Update the specified VentaAccion in storage.
     *
     * @param  int              $id
     * @param UpdateVentaAccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVentaAccionRequest $request)
    {
        $ventaAccion = $this->ventaAccionRepository->findWithoutFail($id);

        if (empty($ventaAccion)) {
            Flash::error('Venta Accion not found');

            return redirect(route('ventaAccions.index'));
        }

        $ventaAccion = $this->ventaAccionRepository->update($request->all(), $id);

        Flash::success('Venta Accion updated successfully.');

        return redirect(route('ventaAccions.index'));
    }

    /**
     * Remove the specified VentaAccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ventaAccion = $this->ventaAccionRepository->findWithoutFail($id);

        if (empty($ventaAccion)) {
            Flash::error('Venta Accion not found');

            return redirect(route('ventaAccions.index'));
        }

        $this->ventaAccionRepository->delete($id);

        Flash::success('Venta Accion deleted successfully.');

        return redirect(route('ventaAccions.index'));
    }
}
