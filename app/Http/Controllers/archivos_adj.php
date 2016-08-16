<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;



class archivos_adj extends Controller
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
        return view('archivos.adjuntar');
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
    public function normaliza ($cadena){
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        $cadena = strtolower($cadena);
        return utf8_encode($cadena);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rutacompleta=null;
        if ($request->hasFile('file1')) {
            $havfile=true;
            $file=$request->file1;
            $nombre = $this->normaliza(date('s') . ($file->getClientOriginalName()));
            
            $rutacompleta=public_path('adjuntos')."/".$nombre;
            $r=\Storage::disk('local')->put($nombre, \File::get($file));
        }

        $id =  \DB::table('documentos')->insertGetId(
            ['titulo' => $request->titulo, 'ruta' =>"adjuntos/".$nombre,'fecha'=>new \DateTime()]
        );

        $mensaje = array(
            'titulo' => 'Nuevo Archivo',
            'texto' => 'Hemos Adjuntado un nuevo archivo ('.$request->titulo.') al sistema de condominio'.'<br>'.'Puede visualizarlo ingresando al sistema');

        $correo = new correo;
        $correo->NotificacionAdjunto($mensaje);

        if ($r){
            Session::flash('message','Documento guardado con exito!!');
        }else
            Session::flash('message','No se pudo guardar el archivo');

        return Redirect::to('/adjuntar_archivo');

    }

    public function listar(Request $request)
    {   if(\Request::ajax())
        {

            $listado = \DB::select("SELECT *
                                    FROM documentos 
                                    ORDER BY fecha desc 
                                    LIMIT 10 ");

            return \Response::json( $listado);
        }else{
             return \Response::json("0");
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

    public function listarAll()
    {   
        $listado = \DB::select('SELECT *
                                FROM documentos 
                                ORDER BY fecha desc 
                                LIMIT 10 ');

        return view('archivos.ver', ['archivos' => $listado]);

    }
    public function borrar(Request $request)
    {
        if(\Request::ajax())
        {

            $listado = \DB::table('documentos')->where('id', '=',  $request->id)->delete();

            return \Response::json( $listado);
        }else{
             return \Response::json("0");
        }
    }

}
