<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\twick;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $twicks = twick::latest()->get();
        return view('home',[
            'twicks' => auth()->user()->timeline()
        ]);
    }
}
