<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BomberoController extends Controller
{
  public function alta()
  {
      return view('bombero/alta');
  }
  public function altaBombero()
  {
      return "hola";
  }
}
