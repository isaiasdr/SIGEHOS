<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CamasController extends Controller
{
    public function index()
    {
    	if (empty(session('id'))) {
            return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
        }
    	return view('consulta_camas');
    }
}
