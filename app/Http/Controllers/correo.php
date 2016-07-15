<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;



class correo extends Controller
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
        return view('correo.enviar');
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
        $havfile=false;
        $rutacompleta="";
        if ($request->hasFile('file1')) {
            $havfile=true;
            $nombre = date('s') . ($request->file1->getClientOriginalName());
            $rutacompleta=public_path('adjuntos')."\\".$nombre;
            \Storage::disk('local')->put($nombre, \File::get($request->file1));
        }

        //$emails = DB::table('users')->lists('email');
        $emails=$this->val_correos(DB::table('users')->lists('email'));

		//$emails=["jcedeno@publired24.com","luciano@mundopcsa.com"];
       $r= Mail::send('mail.correo',$request->all(), function ($msj) use($emails, $rutacompleta,$havfile){
            $msj->subject('Correo de Condominio');
            //$msj->to($emails);
			$msj->bcc($emails);
            if ($havfile) $msj->attach($rutacompleta);
        });
        
        if ($r){
            Session::flash('message','Correo Enviado con exito!!');
        }else
            Session::flash('message','No se pudo enviar el correo');

        return Redirect::to('/sndcorreo');

    }

    private function val_correos($correos){
        foreach ($correos as $correo) {
            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$correo)) {
                $validados[]=$correo;
            }
        }
        return $validados;
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
