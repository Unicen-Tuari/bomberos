<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use \DateTimeZone;
use Illuminate\Support\Facades\Auth;

class PlanillaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function create()
  {
    return view('planilla.create');
  }
}
?>