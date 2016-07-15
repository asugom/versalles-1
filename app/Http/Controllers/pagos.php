<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagos.reg_pago');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

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
                'pago_estado_id'    => $request->estado_id
                ]
            );

            DB::table('saldo')->where('saldo_id_usuario', $request->usuarios)->increment('saldo_monto', $request->monto);
            DB::commit();
            return redirect()->back()->withInput()->with('message','Saldo inicial registrado con éxito.');

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('message',$e->errorInfo[2]);

        }

        
    }
}
