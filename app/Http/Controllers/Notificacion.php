<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use App\User;

class Notificacion extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('notificacion')->where('id_usuario', '=', $id)->where('visto', '=', 0)->get();
        return response()->json(array('data'=> $data), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try {
            $id = DB::table('notificacion')->insertGetId([
                'id_usuario'    =>  Input::get('id_usuario'),
                'descripcion'   =>  Input::get('descripcion'),
                'url'           =>  Input::get('url'),
                'visto'         =>  0
            ]);
        return response()->json(array('id'=>$id, 200));

        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(array('id'=> -1, 200));
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

    public function leer()
    {
        DB::table('Notificacion')->where('id', '=', $id)->update(['visto'=>1]);
    }
}
