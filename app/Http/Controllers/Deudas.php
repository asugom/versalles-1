<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Deudas extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       

        if (\Auth::user()->id_role == 1 || \Auth::user()->id_role == 2) {

            $deudores = DB::table('saldo')->join('users', 'saldo.saldo_id_usuario', '=', 'users.id')
                        ->join('lotes', 'users.cod_lote', '=', 'lotes.id')
                        ->select('users.name as nombre', 'lotes.nombre as numero', 'saldo.monto as monto')
                        ->where('saldo.monto', '<', '0')->orderBy('numero', 'asc')->get();

            $al_dia = DB::table('saldo')->join('users', 'saldo.saldo_id_usuario', '=', 'users.id')
                        ->join('lotes', 'users.cod_lote', '=', 'lotes.id')
                        ->select('users.name as nombre', 'lotes.nombre as numero', 'saldo.monto as monto')
                        ->where('saldo.monto', '>=', '0')->orderBy('numero', 'asc')->get();

            return response()->json(array('deudores' => $deudores, 'al_dia' => $al_dia, 200));
        }else{
            return response()->json(array('deudores' => false, 'al_dia' => false, 400));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (\Auth::user()->id_role == 1 || \Auth::user()->id_role == 2) {
            $data = array();
            $data[0] = 'Todos los Usuarios';
            $dat_c = array();

            $users = DB::table('users')->select('id', 'homenumber', 'name')
                ->where('id_role', '=', 0)
                ->where('name', '<>', "" )
                ->get();

            foreach ($users as $value) {
                $data[$value->id] = $value->homenumber." - ".$value->name;
            }
            
            $conceptos = DB::table('pago_concepto')
                ->select('desc_concepto as name', 'id_concepto as id')
                ->where('tipo_concepto', '=', 2)->get();

            foreach ($conceptos as $concepto) {
                $dat_c[$concepto->id] = $concepto->name;
            }

            return view('deudas.reg_deuda', ['usuarios'=>$data, 'conceptos'=>$dat_c]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (\Auth::user()->id_role == 1 || \Auth::user()->id_role == 2) {
            
            $fecha = (new \DateTime('now'))->format('Y-m-d H:i:s');
            if ($request->usuarios == 0) {
                $usuarios = DB::table('users')->select('id')->get();
            }else{
                $usuarios = DB::table('users')->select('id')->where('id', '=', $request->usuarios)->get();
            }

            try {
                DB::beginTransaction();

                if ($request->o_concepto == "") {
                    $concepto = DB::table('pago_concepto')->select('desc_concepto')
                                ->where('id_concepto', '=', $request->concepto)->first();
                    $texto_concepto = $concepto->desc_concepto;
                }else $texto_concepto = $request->o_concepto;
                
                $mensaje = array(
                  'titulo' => 'Cuenta por pagar', 
                  'texto' => 'Se ha registrado una cuenta por pagar a su cuenta de condominio por un monto de: '.$request->monto.
                  '$ por concepto de: <br/>'.$texto_concepto.'<br/>'
                  .'Puede visualizar su saldo y dem&aacute;s informaci&oacute;n ingresando al sistema.');

                foreach ($usuarios as $usuario) {
                    $id =  DB::table('deuda')->insertGetId([
                        'deuda_tipo_id'     => 0,
                        'deuda_concepto'    => $request->concepto,
                        'deuda_ref'         => 0,
                        'deuda_usuario_id'  => $usuario->id,
                        'deuda_monto'       => $request->monto,
                        'deuda_usuario_reg' => \Auth::user()->id,
                        'deuda_otro_concepto'=> $request->o_concepto
                        ]);

                    $saldo = DB::table('saldo')->where('saldo_id_usuario', '=', $request->usuarios)->get();
                    if (count($saldo)) {
                        DB::table('saldo')->where('saldo_id_usuario', $usuario->id)->decrement('saldo_monto', $request->monto);
                    }else{
                        $monto = $request->monto * (-1);
                        $id =  DB::table('saldo')->insertGetId([
                          'saldo_id_usuario'   => $usuario->id,
                          'saldo_monto'        => $monto
                        ]);
                    }
                    // $correo = new correo;
                    // $correo->enviarUsuario($usuario->id, $mensaje);

                    $notificacion = new notificacion;
                    $notificacion->newNotif($usuario->id, 
                        'Nueva cuenta por pagar registrada por: '.$request->monto.'$', 
                        '/');
                }

                DB::commit();
                return redirect()->back()->withInput()->with('success', 'Cuenta por cobrar registrada con éxito.');

            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->withInput()->with('danger', $e->errorInfo[2]);
            }
        }else{
            return redirect()->back()->withInput()->with('danger', 'No posee permisos para realizar la operación.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
