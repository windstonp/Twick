<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\User;
class findUserController extends Controller
{
    public function __construct()
    {
        $this->Middleware('auth');
    }
    public function __invoke(){
        return view('findUser',[
            'users' => User::paginate(50)
        ]);
    }
}
