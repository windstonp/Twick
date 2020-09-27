<?php

namespace App\Http\Controllers;

use App\Models\twick;
use Illuminate\Http\Request;
use App\Models\User;
class TwickController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('twicks.index',[
            'twicks' => auth()->user()->timeline()
        ]);
    }

    public function store(){
        $atributes = request()->validate(['body'=>'required|max:255']);
        twick::create([
            'user_id' => auth()->id(),
            'body' => $atributes['body']
        ]);

        return redirect('/twicks');
    }
    public function destroy($id){
        $twick = twick::find($id);
        $this->authorize('destroy',$twick->user);
        twick::destroy($id);
        return redirect(route('home'));
    }
}
