<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;
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
                // ->join('pago_estado', 'pago.pago_estado_id', '=', 'pago_estado.id_estado')
                ->select('users.name as nombre', 'lotes.nombre as numero', 'pago.pago_fecha as fecha', 'pago.pago_concepto as concepto', 'pago.pago_monto as monto', 'pago.pago_numero as recibo', 'pago_tipo.desc_tipo as tipo', 'pago.pago_id as id_pago')
                ->where('pago_estado_id', '=', Input::get('estado'))->get();
        }else{
           $pagos = DB::table('pago')->join('users', 'pago.pago_usuario_id', '=', 'users.id')
                ->join('lotes', 'users.cod_lote', '=', 'lotes.id')
                ->join('pago_tipo', 'pago.pago_tipo_id', '=', 'pago_tipo.id_tipo')
                // ->join('pago_estado', 'pago.pago_estado_id', '=', 'pago_estado.id_estado')
                ->select('users.name as nombre', 'lotes.nombre as numero', 'pago.pago_fecha as fecha', 'pago.pago_concepto as concepto', 'pago.pago_monto as monto', 'pago.pago_numero as recibo', 'pago_tipo.desc_tipo as tipo', 'pago.pago_id as id_pago')
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
        return view('pagos.reg_pago', ['usuarios'=>$data, 'tipos'=>$tipos]);
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
                    ->select('pago_usuario_id as usuario', 'pago_monto as monto', 'pago_recibo as recibo')
                    ->where('pago_id', '=', Input::get('id'))
                    ->first();

                $config = DB::table('configuracion')->first();
                
                $DateTime = \DateTime::createFromFormat('d/m/Y', Input::get('fecha'));
                $fecha = $DateTime->format('Y-m-d'); //Fecha de Aprobación

                DB::table('pago')->where('pago_id', Input::get('id'))->update(['pago_estado_id' => $aprobado->estado]);

                $saldo = DB::table('saldo')->where('saldo_id_usuario', '=', $pago->usuario)->get();
                if (count($saldo)) {
                    DB::table('saldo')->where('saldo_id_usuario', $pago->usuario)->increment('saldo_monto', $pago->monto);
                    $restante = $saldo->monto + $pago->monto;
                }else{
                    $id =  DB::table('saldo')->insertGetId([
                        'saldo_id_usuario'   => $pago->usuario,
                        'saldo_monto'        => $pago->monto
                    ]);
                    $restante = $pago->monto;
                }
                
                if ($restante < 0) {
                  $mensaje = array(
                    'titulo' => 'Pago Aprobado con saldo restante', 
                    'texto' => 'Su pago #'.$pago->recibo.' por un monto de '.$pago->monto.
                    ' fue aprobado satisfactoriamente pero aun conserva una deuda de: '.$restante.'<br />'
                    .'Puede visualizar su deuda ingresando al sistema.');

                  correo::enviarUsuario(Input::get('id'), $mensaje);
                }
                
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
            // return response()->json(array('msg'=> $rechazado->estado, 'type'=>'success', 200));

            DB::table('pago')->where('pago_id', Input::get('id'))->update(['pago_estado_id' => $rechazado->estado]);

            $DateTime = \DateTime::createFromFormat('d/m/Y', Input::get('fecha'));
            $fecha = $DateTime->format('Y-m-d'); //Fecha de Aprobación

            $mensaje = array(
              'titulo' => 'Pago Rechazado.', 
              'texto' => 'Su pago #'.$pago->recibo.' por un monto de '.$pago->monto.
              ' fue rechazado por las siguientes causas: <br />'
              .Input::get('message'));

            correo::enviarUsuario(Input::get('id'), $mensaje);

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
            DB::beginTransaction();

            $id =  DB::table('pago')->insertGetId(
                [
                    'pago_tipo_id'      => $request->tipo_id,
                    'pago_concepto'     => $request->concepto,
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
