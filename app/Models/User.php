<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;
use App\Likable;

use function PHPUnit\Framework\isNull;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable, Likable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username', 'avatar','banner'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAvatarAttribute($value){
        if($value){
            return asset('storage/'.$value);
        }
        return asset('img/default-user.png');
    }
    public function getbannerAttribute($value){
        if($value){
            return asset('storage/'.$value);
        }
        return asset('img/default-banner.png');
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function timeline(){
        $followers = $this->follows()->pluck('id');

        return Twick::whereIn('user_id',$followers)
            ->orWhere('user_id',$this->id)
            ->WithLikes()
            ->latest()
            ->paginate(10);
    }

    public function twicks(){
        return $this->hasMany(Twick::class)->latest();
    }

    public function path($append = ''){
        $path = route('profile',$this->username);

        return $path ? "{$path}/{$append}" : $path;
    }
    public function Likes(){
        return $this->hasMany(Likes::class);
    }

}
