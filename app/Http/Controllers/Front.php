<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Front extends Controller {

    public function index() {
        if (true)
            return view('login');
        else    
            return view('dashboard');
    }

}
