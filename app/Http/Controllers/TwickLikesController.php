<?php

namespace App\Http\Controllers;

use App\Models\twick;
use Illuminate\Http\Request;

class TwickLikesController extends Controller
{
    public function store(twick $id){
        $id->like(current_user());
        return back();
    }
    public function destroy(twick $id){
        $id->dislike(current_user());
        return back();
    }
}
