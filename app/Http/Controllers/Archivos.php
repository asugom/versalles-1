<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Archivos extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
    }

    public function borrar_antiguos()
    {       
        $ruta=public_path('adjuntos')."/";
        $dir=opendir(public_path('adjuntos')."/");

        while($f = readdir($dir)){
            //if((time()-filemtime($dir.$f) > 3600*24*7) and !(is_dir($dir.$f)))
            if( (filectime ($ruta.$f) > 3600*24*7) and !(is_dir($dir.$f)) )
                //unlink($ruta.$f);
                echo (filectime ($ruta.$f)." :: ".$dir." ".$f."<br>");
        }
        closedir($dir);
        
    }
}
