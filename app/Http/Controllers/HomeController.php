<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    	if (empty(session('id'))) {
    		return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
    	}
    	return view('home');
    }

    public function vue()
    {
    	return view('prueba_vue');
    }
}
