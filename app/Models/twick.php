<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Likable;

class twick extends Model
{
    protected $guarded = [];
    use HasFactory, Likable;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Likes(){
        return $this->hasMany(Likes::class);
    }
}
