<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;
use DateTime;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Notificacion;
use App\Http\Controllers\correo;

class pagos extends Controller
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
            $pagos = DB::table('pago')->join('users', 'pago.pago_usuario_id', '=', 'users.id')
                ->join('lotes', 'users.cod_lote', '=', 'lotes.id')
                ->join('pago_tipo', 'pago.pago_tipo_id', '=', 'pago_tipo.id_tipo')
                ->join('pago_concepto', 'pago.pago_concepto', '=', 'pago_concepto.id_concepto')
                // ->join('pago_estado', 'pago.pago_estado_id', '=', 'pago_estado.id_estado')
                ->select('users.name as nombre', 'lotes.nombre as numero', 'pago.pago_fecha as fecha', 'pago_concepto.desc_concepto as concepto', 'pago.pago_monto as monto', 'pago.pago_numero as recibo', 'pago_tipo.desc_tipo as tipo', 'pago.pago_id as id_pago')
                ->where('pago_estado_id', '=', Input::get('estado'))->get();
        }else{
           $pagos = DB::table('pago')->join('users', 'pago.pago_usuario_id', '=', 'users.id')
                ->join('lotes', 'users.cod_lote', '=', 'lotes.id')
                ->join('pago_tipo', 'pago.pago_tipo_id', '=', 'pago_tipo.id_tipo')
                ->join('pago_concepto', 'pago.pago_concepto', '=', 'pago_concepto.id_concepto')
                // ->join('pago_estado', 'pago.pago_estado_id', '=', 'pago_estado.id_estado')
                ->select('users.name as nombre', 'lotes.nombre as numero', 'pago.pago_fecha as fecha', 'pago_concepto.desc_concepto as concepto', 'pago.pago_monto as monto', 'pago.pago_numero as recibo', 'pago_tipo.desc_tipo as tipo', 'pago.pago_id as id_pago')
                ->where('pago_estado_id', '=', Input::get('estado'))
                ->where('users.id', '=', \Auth::user()->id)->get();
        }
        
        $data = array();
        $result = array();
        if (is_array($pagos)) {
            foreach ($pagos as $value) {
                $data[] = ['nombre' => $value->nombre,
                'numero' => $value->numero,
                'fecha' => $value->fecha,
                'concepto' => $value->concepto,
                'recibo' => $value->recibo,
                'monto' => $value->monto,
                'tipo' => $value->tipo,
                'id_pago' => $value->id_pago ];
            }
            if (is_array($data)) {
                $result = array('data' => $data);
                print_r(json_encode($result));
                die;
            }
        }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (\Auth::user()->id_role == 1 || \Auth::user()->id_role == 2) {

            $users = DB::select('SELECT id, homenumber, name FROM users WHERE id_role = 0 AND name <> "" ');
            $data = array();

            foreach ($users as $value) {
                $data[$value->id] = $value->homenumber." - ".$value->name;
            }

        }else{
            $data = \Auth::user()->id;
        }

        $tipos = DB::table('pago_tipo')
                    ->select('desc_tipo as name', 'id_tipo as id')
                    ->where('desc_tipo', '<>', 'Registro Inicial')
                    ->where('tipo_tipo', '=', 0)
                    ->get();

        $conceptos = DB::table('pago_concepto')
                    ->select('desc_concepto as name', 'id_concepto as id')
                    ->where('tipo_concepto', '=', 1)->get();

        foreach ($conceptos as $concepto) {
                $dat_c[$concepto->id] = $concepto->name;
        }

        return view('pagos.reg_pago', ['usuarios'=>$data, 'tipos'=>$tipos, 'conceptos'=>$dat_c]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $DateTime = \DateTime::createFromFormat('d/m/Y', $request->fecha);
        $fecha = $DateTime->format('Y-m-d');

        try {
            DB::beginTransaction();

            $id =  DB::table('pago')->insertGetId(
                [
                    'pago_tipo_id'      => $request->optradio,
                    'pago_concepto'     => $request->concepto,
                    'pago_numero'       => $request->recibo,
                    'pago_fecha'        => $fecha,
                    'pago_usuario_id'   => $request->usuarios,
                    'pago_monto'        => $request->monto,
                    'pago_estado_id'    => $request->estado_id,
                    'pago_usuario_reg'   => \Auth::user()->id
                ]
            );
            if (\Auth::user()->id_role == 1 || \Auth::user()->id_role == 2) {
              $saldo = DB::table('saldo')->where('saldo_id_usuario', '=', $request->usuarios)->get();
              if (count($saldo)) {
                  DB::table('saldo')->where('saldo_id_usuario', $request->usuarios)->increment('saldo_monto', $request->monto);
              }else{
                  $id =  DB::table('saldo')->insertGetId([
                      'saldo_id_usuario'   => $request->usuarios,
                      'saldo_monto'        => $request->monto
                  ]);
              }
            }
            DB::commit();
            return redirect()->back()->withInput()->with('success', 'Pago registrado con éxito.');

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withInput()->with('danger', $e->errorInfo[2]);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
 
      if (\Auth::user()->id_role == 1 || \Auth::user()->id_role == 2) {
        switch (Input::get('opt')) {
        case '1':
            // Aprobar
            try {

                $aprobado = DB::table('pago_estado')
                    ->select('pago_estado.id_estado as estado')
                    ->where('desc_estado', '=', 'Aprobado')
                    ->first();

                $pago = DB::table('pago')
                    ->select('pago_usuario_id as usuario', 'pago_monto as monto', 'pago_numero as recibo', 'pago_concepto as concepto')
                    ->where('pago_id', '=', Input::get('id'))
                    ->first();

                $concepto_mensualidad = DB::table('pago_concepto')->where('desc_concepto', '=', 'Pago de Mensualidad')->first();
                $config = DB::table('configuracion')->where('conf_status', '=', 1)->first();

                $DateTime = DateTime::createFromFormat('d/m/Y', Input::get('fecha'));
                $fecha = $DateTime->format('Y-m-d'); //Fecha de Aprobación
                $today = (new DateTime('now'))->format('Y-m-d');
                
                // Verificar que el día seleccionado no es mayor al día de la mora
                $dif_dia = intval(substr(Input::get('fecha'), 0, 2)) - intval($config->conf_dia_mora);

                if ($dif_dia < 0) {
                  // El pago se realizó antes de la fecha de mora
                  // Verificar que la fecha de mora no haya pasado
                  $dif_dia = intval(date('j')) - intval($config->conf_dia_mora);
                  
                  // hoy - dia_mora
                  if ($dif_dia >= 0) {
                    // Ya paso o es el día de mora
                    // Eliminar la última mora de este mes y eliminarlo del saldo
                    $primer_dia = (new DateTime('first day of this month'))->format('Y-m-d 00:00:00');
                    
                    // Buscar la deuda de este mes que tenga el concepto mora
                    $mora = DB::table('deuda')
                    ->join('pago_concepto', 'deuda.deuda_concepto', '=', 'pago_concepto.id_concepto')
                    ->select('deuda.deuda_id as id', 'deuda.deuda_monto as monto')
                    ->where('pago_concepto.desc_concepto', '=', 'Mora')
                    ->where('deuda.created_at', '>', $primer_dia)
                    ->where('deuda.deuda_usuario_id', '=', $pago->usuario)
                    ->where('deuda.deuda_borrar', '<>', 'X')
                    ->first();
                    
                    // Validar que el pago sea por mensualidad y sea mayor a la mensualidad y Eliminar la Mora
                    if ($concepto_mensualidad->id_concepto == $pago->concepto && $pago->monto >= $config->conf_monto_mens) {
                      if (count($mora)) {
                        DB::table('deuda')->where('deuda_id', '=', $mora->id)->update(['deuda_borrar' => 'X']);
                        DB::table('saldo')->where('saldo_id_usuario', '=', $pago->usuario)->increment('saldo_monto', $mora->monto);
                      }
                    }
                  }
                }

                // Si el pago se realizó antes o después de la fecha de mora
                // Solo aprobar el pago y restar del saldo
                DB::table('pago')->where('pago_id', Input::get('id'))
                    ->update(['pago_estado_id' => $aprobado->estado, 
                              'pago_fecha_updat' => $fecha,
                              'pago_user_updat'  => \Auth::user()->id]);

                $saldo = DB::table('saldo')->where('saldo_id_usuario', '=', $pago->usuario)->first();
                
                $restante = 0;
                
                if (count($saldo)) {
                    DB::table('saldo')->where('saldo_id_usuario', $pago->usuario)->increment('saldo_monto', $pago->monto);
                    $restante = $saldo->saldo_monto + $pago->monto;
                }else{
                    $id =  DB::table('saldo')->insertGetId([
                        'saldo_id_usuario'   => $pago->usuario,
                        'saldo_monto'        => $pago->monto
                    ]);
                    $restante = $pago->monto;
                }
                
                // if ($restante < 0) {
                $mensaje = array(
                  'titulo' => 'Pago Aprobado', 
                  'texto' => 'Su pago #'.$pago->recibo.' por un monto de '.$pago->monto.
                  ' fue aprobado satisfactoriamente y ahora conserva un saldo de: '.$restante.'<br />'
                  .'Puede visualizar su saldo y dem&aacute;s informaci&oacute;n ingresando al sistema.');

                $correo = new correo;
                $correo->enviarUsuario($pago->usuario, $mensaje);

                // $notificacion = new notificacion;
                // $notificacion->newNotif($pago->usuario, 
                //     'Su pago #: '.$pago->recibo.' por un monto de: '.$pago->monto.'$ fue aprobado', 
                //     'ver_pago');

                   //correo::enviarUsuario(Input::get('id'), $mensaje); //No puedo probar
                // }
                
                return response()->json(array('msg'=>'Pago aprobado con éxito.', 'type'=>'success', 200));

            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(array('msg'=> $e->errorInfo[2], 'type'=> 'danger', 200));
            }

            break;
        case '2':
          try {
//            Rechazar
            $rechazado= DB::table('pago_estado')
              ->select('pago_estado.id_estado as estado')
              ->where('desc_estado', '=', 'Rechazado')
              ->first();

            $pago = DB::table('pago')
              ->select('pago_usuario_id as usuario', 'pago_monto as monto', 'pago_numero as recibo', 'pago_concepto as concepto')
              ->where('pago_id', '=', Input::get('id'))
              ->first();

            $DateTime = new \DateTime('now');
            $fecha = $DateTime->format('Y-m-d'); //Fecha de Rechazo
            $message = Input::get('message') != '' ? Input::get('message') : "Pago rechazado por falta de datos.";

            DB::table('pago')->where('pago_id', Input::get('id'))
            ->update(['pago_estado_id' => $rechazado->estado,
                      'pago_fecha_updat' => $fecha,
                      'pago_user_updat'  => \Auth::user()->id]);

            $mensaje = array(
              'titulo' => 'Pago Rechazado.', 
              'texto' => 'Su pago #'.$pago->recibo.' por un monto de '.$pago->monto.
              ' fue rechazado por las siguientes causas: <br />'.$message
              );
            $correo = new correo;
            $correo->enviarUsuario($pago->usuario, $mensaje);
           //correo::enviarUsuario(Input::get('id'), $mensaje); //No lo puedo probar
            // $notificacion = new notificacion;
            // $notificacion->newNotif($pago->usuario, 
            //     'Su pago #: '.$pago->recibo.' por un monto de: '.$pago->monto.'$ fue rechazado', 
            //     'ver_pago');

            return response()->json(array('msg'=>'Pago Rechazado.', 'type'=>'success', 200));

          } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(array('msg'=> $e->errorInfo[2], 'type'=> 'danger', 200));
          }
          break;

        default:
            return response()->json(array('msg'=>'Ninguna operación realizada', 'type'=>'info', 200));
            break;
        }
      }      

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

    public function listar()
    {
        $estado = DB::table('pago_estado')->select('id_estado as id', 'desc_estado as name')->get();
        return view('pagos.ver_pago',['estado'=>$estado]);
    }

    /**
     * Show the form for creating the starting balance.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicial()
    {

        $users = DB::select('SELECT id, homenumber, name FROM users WHERE id_role = 0 AND name <> "" ');
        $data = array();

        foreach ($users as $value) {
            $data[$value->id] = $value->homenumber." - ".$value->name;
        }

        return view('pagos.reg_saldo', ['usuarios'=>$data]);
    }

    /**
     * Show the form for saving the starting balance.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_inicial(Request $request)
    {

        $DateTime = \DateTime::createFromFormat('d/m/Y', $request->fecha);
        $fecha = $DateTime->format('Y-m-d');

        try {
            $si_concepto = DB::table('pago_concepto')->where('desc_concepto', '=', 'Saldo Inicial')->first();
            $concepto = isset($si_concepto->id_concepto) ? $si_concepto->id_concepto : 0;
            
            DB::beginTransaction();
            $id =  DB::table('pago')->insertGetId(
                [
                    'pago_tipo_id'      => $request->tipo_id,
                    'pago_concepto'     => $concepto,
                    'pago_fecha'        => $fecha,
                    'pago_usuario_id'   => $request->usuarios,
                    'pago_monto'        => $request->monto,
                    'pago_estado_id'    => $request->estado_id,
                    'pago_usuario_reg'   => \Auth::user()->id
                ]
            );

            $saldo = DB::table('saldo')->where('saldo_id_usuario', '=', $request->usuarios)->get();

            if (count($saldo)) {

                DB::table('saldo')->where('saldo_id_usuario', $request->usuarios)->increment('saldo_monto', $request->monto);

            }else{

                $id =  DB::table('saldo')->insertGetId([
                    'saldo_id_usuario'   => $request->usuarios,
                    'saldo_monto'        => $request->monto
                ]);

            }

            DB::commit();
            return redirect()->back()->withInput()->with('success','Saldo inicial registrado con éxito.');

        } catch (\Illuminate\Database\QueryException $e) {

            DB::rollBack();
            return redirect()->back()->withInput()->with('danger', $e->errorInfo[2]);

        }


    }
}
