<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenServicioController extends Controller
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
    public function store(ImagenServicioRequest $request)
    {
        ImagenServicio::create($request->all());
        return redirect('/');
    }
    
}