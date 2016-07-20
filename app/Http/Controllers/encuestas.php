<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class encuestas extends Controller
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
        return view('encuesta.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            //desactiva las encuentas anteriores; estatus=0
            \DB::table('encuesta')->update(['estatus' => 0]);
            //ingresa la nueva activa
            $id =  \DB::table('encuesta')->insertGetId(
                ['pregunta' => $request->consulta, 'estatus' => 1,'creado'=>new \DateTime()]
            );
            //echo $id;
            foreach ($request->opcion as $opcion){
                \DB::table('encuesta_opcion')->insertGetId(
                    ['opcion' => $opcion, 'cod_encuesta' => $id]
                );
            }
            return view('encuesta.new')->with('status', 'Encuesta Guardada con exito');
        }
        catch (\Illuminate\Database\QueryException $e){

            return view('encuesta.new')->with('status',$e->errorInfo[2]);
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

    public function votar(Request $request)
    {   if(\Request::ajax())
        {
            $data = \Input::all();
            $id_user= \Auth::user()->id;

            //ingresa voto
            $id =  \DB::table('encuesta_votos')->insertGetId(
                ['cod_opcion' => $data["voto"], 'cod_usuario' =>$id_user,'fecha'=>new \DateTime()]
            );

            $votos = \DB::select('SELECT opcion,Count(cod_opcion) as votos
                                    FROM encuesta_votos x  inner join encuesta_opcion y on x.cod_opcion=y.id
                                    WHERE cod_opcion IN (
                                        select b.id from encuesta a inner join encuesta_opcion b on a.id=b.cod_encuesta
                                        where a.estatus=1)
                                    GROUP by cod_opcion');                            

            return \Response::json( $votos);
        }else{
             return \Response::json("0");
        }
    }

    public function validar_voto()
    {
        $id_user= \Auth::user()->id;
        $voto = \DB::select('SELECT opcion
                                FROM encuesta_votos x inner join encuesta_opcion y on x.cod_opcion=y.id
                                WHERE cod_usuario='.$id_user.' and cod_opcion IN (
                                    select b.id from encuesta a inner join encuesta_opcion b on a.id=b.cod_encuesta
                                    where a.estatus=1)');      
        return \Response::json( $voto);         
    }

}
