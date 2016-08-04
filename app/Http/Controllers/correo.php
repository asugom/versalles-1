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
        $rutacompleta=null;
        if ($request->hasFile('file1')) {
            $havfile=true;
            foreach ($request->file1 as $file){
                $nombre = date('s') . ($file->getClientOriginalName());
                $rutacompleta[]=public_path('adjuntos')."/".$nombre;
                \Storage::disk('local')->put($nombre, \File::get($file));
            }
        }

        $emails =$this->val_correos( DB::select("(SELECT email as email FROM users) UNION (SELECT emailalt_1 as email FROM users) UNION (SELECT emailalt_2 as email FROM users)"));

        //$emails=["jsifontes48@gmail.com","joselincedenno@gmail.com","jcedeno@publired24.com"];

       $r= Mail::send('mail.correo',$request->all(), function ($msj) use($emails, $rutacompleta,$havfile){
            $msj->subject('Correo de Condominio');
            //$msj->to($emails);
			$msj->bcc($emails);
           if ($havfile)
                foreach ($rutacompleta as $ruta) {
                    $msj->attach($ruta);
                }
        });

        if ($r){
            Session::flash('message','Correo Enviado con exito!!');
        }else
            Session::flash('message','No se pudo enviar el correo');

        return Redirect::to('/sndcorreo');

    }

    private function val_correos($correos){
        foreach ($correos as $correo) {
            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$correo->email   )) {
                $validados[]=$correo->email;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_usuario Usuario al que se le va a enviar el texto
     * @param  array $data array('titulo' => 'titulo', 'text' => 'Mensaje');
     */
    public function enviarUsuario($id_usuario, $data)
    {
        $emails =$this->val_correos( DB::select("(SELECT email as email FROM users WHERE id = ".$id.") UNION (SELECT emailalt_1 as email FROM users WHERE id = ".$id.") UNION (SELECT emailalt_2 as email FROM users WHERE id = ".$id.")"));

        $r= Mail::send('mail.correo', $data, function ($msj) use($emails){
            $msj->subject('Correo de Condominio');
            //$msj->to($emails);
            $msj->bcc($emails);
        });
    }

}
