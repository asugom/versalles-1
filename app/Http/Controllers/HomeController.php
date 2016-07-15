<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if ((\Auth::user()->email)==""){
            $user=\Auth::user();
            return view('usuario.editar',compact('user'))->with('status',"Por Favor completar la informacion de su usuario para continuar");
        }else{
            $encuesta = \DB::table('encuesta')
                            ->where('estatus', '=', 1)
                            ->get();
            $opciones[]=null;
            if(count($encuesta)>0 )
            $opciones = \DB::table('encuesta_opcion')
                            ->where('cod_encuesta', '=', $encuesta[0]->id)
                            ->get();  

            $encuesta_actual = \DB::select('SELECT opcion,Count(cod_opcion) as votos
                                    FROM encuesta_votos x  inner join encuesta_opcion y on x.cod_opcion=y.id
                                    WHERE cod_opcion IN (
                                        select b.id from encuesta a inner join encuesta_opcion b on a.id=b.cod_encuesta
                                        where a.estatus=1)
                                    GROUP by cod_opcion');                                                

            $encuesta["opciones"]=$opciones;
            $data['encuesta']=$encuesta;
            $data['encuesta_actual']=$encuesta_actual;


            return view('dashboard')->with('data',$data);
        }
    }

}
